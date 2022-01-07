<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\FinancialStatement;
use App\ClientClosing;
use App\ClientClosingCharges;
use App\ClientExpired;
use App\ClientExpiredCharges;
use App\GlobalNetPositionCumulative;
use App\GlobalNetPositionCumulativeCharge;
use App\GlobalNetPositionDetails;
use App\GlobalNetPositionDetailsCharge;
use App\Exports\FinancialStatementExport;
use App\Exports\ClientClosingExport;
use App\Exports\ClosingChargesExport;
use App\Exports\ExpiredExport;
use App\Exports\ExpiredChargesExport;
use App\Exports\CumulativeExport;
use App\Exports\DetailsExport;
use App\Exports\CumulativeChargeExport;
use App\Exports\DetailsChargeExport;
use App\FinancialYear;






class SearchController extends Controller
{
    
    public function currency($cur){
        $amt = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $cur);
        return $amt;
       
    }
    public function dr_cr($cur){
        $amt=$this->currency($cur);
        if($cur>0){
            $amt=(string)$amt. "  Dr";

        }
        else if($cur<0){
        $amt= str_replace('-', '', $amt);
        $amt=$amt . " Cr";

        }
        return $amt;
    }
    

    public function search( Request $request){

        $id=Auth::user()->id;

//        dd($id);
        $report=FinancialStatement::query()->where('posted_to',$id);
        $todate = $request->todate;
        $todate = new Carbon($todate);
        //$ftodate=$todate->addDays(1);
        $exchange=$request->exchange;
        if($request->filled('year')){
            $fromdate = $request->year;
            $report->where('fyear',$request->year);
        }
        if($request->filled('fromdate')){
            $fromdate = $request->fromdate;
            $report->where('entry_date','>=',$fromdate);
        }

        if($request->filled('todate')){
            $report->where('entry_date','<=',$todate);
        }
        
        if($request->filled('exchange')){
            $report->where('exchange',$request->exchange);
        }
        $syear=$request->year;
       $op_balance=FinancialStatement::query()->where('posted_to',$id)->where('fyear',$syear)->first('final_dr_cr');
//       dd($op_balance);
       		if($op_balance != null){
		       $op_balance=    $op_balance['final_dr_cr'];
            }
      		else{
            $op_balance = 0.00 ;
            }
        
        $dr_sum = $report->sum('dr_amount');
        $cr_sum = $report->sum('cr_amount');
        $net=round($dr_sum-$cr_sum,2);

        //rupee format for amount
        $fdr_sum= $this->currency($dr_sum);
        // dd($dr_sum);
        $fcr_sum= $this->currency($cr_sum);
        $fnet= $this->dr_cr($net);
        $fop_balance= $this->currency($op_balance);

        if($request->submit=="export")
            {
                $report=$report->get();
                return Excel::download(new FinancialStatementExport([$report,$dr_sum,$cr_sum,$fdr_sum,$fcr_sum,$fnet,$fop_balance,$syear]), 'FinancialStatement.xlsx');
        }
        $fyears=FinancialYear::all()->sortByDesc('id');
        return view('financialreport.search', [
            'dr_sum'=>$fdr_sum,
            'cr_sum'=>$fcr_sum,
            'net'=>$fnet,
            'exchange'=>$request->exchange,
            'syear'=>$syear,
            'fyears'=>$fyears,
            'report'=>$report->get(),
            'op_balance'=>$fop_balance,
          
        
    ]);
    }
    public function searchderi(Request $request){

        $id=Auth::user()->id;

        // $method_type=$request->method_type;
        $todate = $request->todate;
        $todate = new Carbon($todate);
        //$ftodate=$todate->addDays(1);

        $report=ClientClosing::query()->where('posted_to',$id);
        if($request->filled('fromdate')){
            $fromdate = $request->fromdate;
            $report->where('expiry_date','>=',$fromdate);
        }

        if($request->filled('todate')){
            $report->where('expiry_date','<=',$todate);
        }
          // only loss
          $onlyloss=ClientCLosing::query()->where('posted_to',$id)->where('p_l','<',0.00)->sum('p_l');
//        dd($onlyloss);
          $onlyloss=abs($onlyloss);
          $p_value = $report->sum('purchase_value');
          $s_value = $report->sum('sales_value');
          $net = $report->sum('net_value');
          $m_value = $report->sum('market_value');
          $tpl = $report->sum('today_pl');
          $pl = $report->sum('p_l');
  
              //rupee format for amount
              $onlyloss= $this->currency($onlyloss);
              $fm_value= $this->dr_cr($m_value);
              $fnet= $this->dr_cr($net);
              $fpl= $this->dr_cr($net-$m_value);
//        $fyears=FinancialYear::all()->sortByDesc('id')->first();

            // export
            if($request->submit=="export")
            {
                // dd($report);
                $report=$report->get();

                return Excel::download(new ClientClosingExport([$report,$p_value,$s_value,$net,$m_value,$pl,$fnet,$fm_value,$onlyloss,$fpl,$tpl]), 'ClientGlobalDerivativeSegment.xlsx');
            }
            return view('GlobalDerivative.closing', [
            'net'=>$net,
            'p_value'=>$p_value,
            's_value'=>$s_value,
            'm_value'=>$m_value,
            'pl'=>$pl,
            'fm_value'=>$fm_value,
            'fnet'=>$fnet,
            'fpl'=>$fpl,
            'tpl'=>$tpl,
            'onlyloss'=>$onlyloss,
            'report'=>$report->get(),
//            'fyears'=>$fyears,

            ]);
            
    }

    public function searchnet(Request $request){
        $id=Auth::user()->id;


        $todate = $request->todate;
        $todate = new Carbon($todate);
        $ftodate=$todate->addDays(1);

        $report=GlobalNetPositionCumulative::query()->where('posted_to',$id);
        if($request->filled('fromdate')){
            $fromdate = $request->fromdate;
            $report->where('created_at','>=',$fromdate);
        }

        if($request->filled('todate')){
            $report->where('created_at','<=',$ftodate);
        }

        // only loss
        $onlyloss=GlobalNetPositionCumulative::query()->where('posted_to',$id)->where('p_l','<',0.00)->sum('p_l');
        $onlyloss=abs($onlyloss);
        $p_value = $report->sum('purchase_value');
        $net = $report->sum('net_value');
        $m_value = $report->sum('market_value');
        $tpl = $report->sum('today_pl');
        $s_value = $report->sum('sales_value');

//        dd($tpl);
            $pl = $report->sum('p_l');
            //rupee format for amount
            $fp_value= $this->dr_cr($p_value);
            // dd($dr_sum);
            $fm_value= $this->dr_cr($m_value);
            $fnet= $this->dr_cr($net);
            $fpl= $this->dr_cr($net- $m_value);

//        dd($tpl);

        if($request->submit=="export")
        {
            $report=$report->get();
            return Excel::download(new CumulativeExport([$report,$p_value,$net,$m_value,$pl,$fnet,$fm_value,$onlyloss,$fpl,$tpl,$s_value]), 'ClientNetPositionCashSegment.xlsx');
        }

        return view('GlobalNet.cumulative', [
            'net'=>$net,
            'p_value'=>$p_value,
            'm_value'=>$m_value,
            'pl'=>$pl,
            'fp_value'=>$fp_value,
            'fm_value'=>$fm_value,
            's_value'=>$s_value,
            'fnet'=>$fnet,
            'fpl'=>$fpl,
            'tpl'=>$tpl,
            'onlyloss'=>$onlyloss,
            'report'=>$report->get(),

        ]);
      
            
    }

}
