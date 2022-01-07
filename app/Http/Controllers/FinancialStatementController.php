<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\FinancialStatementImport;
use App\FinancialStatement;
use App\FinancialYear;


class FinancialStatementController extends Controller
{

    public function showadmin()
    {
        if (\Illuminate\Support\Facades\Auth::user()->id) {


            $fyears = FinancialYear::all()->sortByDesc('id');

            $usernames = User::select('*')->where('status', 1)->orderby('name', 'asc')->get();

            return view('imports.imstatement', compact('fyears', 'usernames'));
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

    public function showclient()
    {
        if (\Illuminate\Support\Facades\Auth::user()->id) {

            $fyears = FinancialYear::all()->sortByDesc('id');

            $usernames = User::select('*')->where('status', 1)->orderby('name', 'asc')->get();

            return view('financialreport.financialreport', compact('fyears', 'usernames'));

        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

    public function store(Request $request)
    {

        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $file = $request->file('file');
            $fileName = "f-" . $file->getClientOriginalName();
            $savePath = public_path('upload/');

            $fyear = $request->fyear;
            $posted_to = $request->posted_to;

            try {

                $file->move($savePath, $fileName);

                $getPath = $savePath . $fileName;


                FinancialStatement::where('fyear', $fyear)->where('posted_to', $posted_to)->delete();
                $data = Excel::import(new FinancialStatementImport($fyear, $posted_to), $savePath . $fileName);


            } catch (\Exception $ex) {
//		dd($ex);
                return back()->withStatus('Error');

            } catch (\Illuminate\Database\QueryException $ex) {
                return back()->withStatus('Error');
            }

            return back()->withStatus('success');

        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }
}
