    @extends('layout/Derivative/container')
    @section('data')
       <div class="summary d-flex text-white ">
            <div class="w-25 m-1 p-1 box1 d-flex justify-content-between"><h4>Net Dr/Cr: </h4><h4>{{$fnet}} </h4></div>
            <div class="w-25 m-1 p-1 box2 d-flex justify-content-between"><h4>Market Value: </h4><h4> {{$fm_value}} </h4></div>
            <div class="w-25 m-1 p-1 box3 d-flex justify-content-between"><h4>Only Loss: </h4><h4>{{$onlyloss}}</h4></div>
            <div class="w-25 m-1 p-1 box4 d-flex justify-content-between"><h4>Profit/Loss:</h4><h4> {{$pl}} </h4></div>
        </div>
        <!-- Entry data  -->
      <div class="table">
         <table width='100%' border="1">
            <tr class="thead text-white">
                <td>Scrip Code</td>
                <td>Scrip Name</td>
                <td>*</td>
                <td>/Price</td>
                <td>OT</td>
                <td>Expiry Dt</td>
                <td>Purchase Qty</td>
                <td>Purchase Value</td>
                <td>Purchase Avg</td>
                <td>Sales Qty</td>
                <td>Sales Value</td>
                <td>Sales Avg</td>
                <td>Net Qty</td>
                <td>Net Value</td>
                <td>Net Avg</td>
                <td>Market_Rate</td>
                <td>Market Value</td>
                <td>Today's P/L</td>
                <td>P/L</td>
                <td>Cross Currency</td>
            </tr>
            @forelse($report as $rep)
            <tr>
                <td>{{$rep->scrip_code}}</td>
                <td>{{$rep->scrip_name}}</td>
                <td>{{$rep->ast}}</td>
                @if(strtolower($rep->ot)=='po')
                <td style="background-color:green;" >{{$rep->price}}</td>
                <td style="background-color:green;">{{$rep->ot}}</td>
                @elseif((strtolower($rep->ot)=='co'))
                <td style="background-color:yellow;" >{{$rep->price}}</td>
                <td style="background-color:yellow;">{{$rep->ot}}</td>
                @else
                <td>{{$rep->price}}</td>
                <td>{{$rep->ot}}</td>
                @endif

                <td>{{$rep->expiry_date}}</td>
                  <td>{{$rep->purchase_qty}}</td>
                  <td>{{$rep->purchase_value}}</td>
                  <td>{{$rep->purchase_avg}}</td>
                  <td>{{$rep->sales_qty}}</td>
                  <td>{{$rep->sales_value}}</td>
                  <td>{{$rep->sales_avg}}</td>
                  <td>{{$rep->net_qty}}</td>
                  <td>{{$rep->net_value}}</td>
                  <td>{{$rep->net_avg}}</td>
                  <td>{{$rep->market_rate}}</td>
                  <td>{{$rep->market_value}}</td>
                  <td>{{$rep->today_pl}}</td>
                  <td>{{$rep->p_l}}</td>
                  <td>{{$rep->cross_currency}}</td>
                </tr>
                @empty
                <tr class="text-center">
                  <td colspan="20">No Data </td>
                </tr>
                @endforelse
                <tr class="footer_summary">
                    <td colspan="7"></td>
                    
                    <td>{{$p_value}}</td>
                    <td colspan="2"></td>
                    <td>{{$s_value}}</td>
                    <td colspan="2"></td>
                    <td>{{$net}}</td>
                    <td colspan="2"></td>
                    <td>{{$m_value}}</td>
                    <td>{{$tpl}}</td>
                    <td colspan="2">{{$pl}}</td>
                    
                    
            </tr>
        </table>
      </div>
@endsection

