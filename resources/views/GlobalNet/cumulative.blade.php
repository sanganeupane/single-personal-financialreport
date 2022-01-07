@extends('layout/GlobalNet/gncontainer')
    @section('data')
       <!-- selection critera -->
        <div class="summary d-flex text-white ">
            <div class="w-25 m-1 p-1 box1 d-flex justify-content-between"><h4>Net Dr/Cr: </h4><h4>{{$fnet}} </h4></div>
            <div class="w-25 m-1 p-1 box2 d-flex justify-content-between"><h4>Market Value: </h4><h4> {{$fm_value}} </h4></div>
            <div class="w-25 m-1 p-1 box3 d-flex justify-content-between"><h4>Only Loss: </h4><h4>{{$onlyloss}}</h4></div>
            <div class="w-25 m-1 p-1 box4 d-flex justify-content-between"><h4>Profit/Loss:</h4><h4> {{$fpl}} </h4></div>
        </div>
        <!-- Entry data  -->
      <div class="table">
         <table width='100%' border="1">
            <tr class="thead text-white">
            <td>Scrip Code</td>
            <td>Scrip.Name</td>

                <td>(+)Quantity</td>
                <td>(+)Average</td>
                <td>Purchase Value</td>
                <td>(-)Quantity</td>
                <td>(-)Average</td>
                <td>Sales Value</td>
                <td>Net.Qty</td>
                <td>Net.Avg</td>
                <td>Net.Value</td>
                <td>Market</td>
                <td>Market Value</td>
                <td>Today's P/L</td>
                <td>P/L</td>
            </tr>
            @forelse($report as $rep)
            <tr>
                <td>{{$rep->scrip_code}}</td>
                <td>{{$rep->scrip_name}}</td>

                <td>{{$rep->plus_qty}}</td>
                <td>{{$rep->plus_avg}}</td>
                <td>{{$rep->purchase_value}}</td>
                <td>{{$rep->minus_qty}}</td>
                <td>{{$rep->minus_avg}}</td>
                <td>{{$rep->sales_value}}</td>
                <td>{{$rep->net_qty}}</td>
                <td>{{$rep->net_avg}}</td>
                <td>{{$rep->net_value}}</td>
                <td>{{$rep->market}}</td>
                <td>{{$rep->market_value}}</td>
                <td>{{$rep->today_pl}}</td>
                <td>{{$rep->p_l}}</td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="15">No Data</td>
                </tr>
                @endforelse
                <tr class="footer_summary">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$p_value}}</td>
                    <td></td>
                    <td></td>
                    <td>{{$s_value}}</td>
                    <td></td>
                    <td></td>
                    <td>{{$net}}</td>
                    <td></td>
                    <td>{{$m_value}}</td>
                    <td>{{$tpl}}</td>
                    <td>{{$pl}}</td>
                </tr>
        </table>
      </div>
@endsection

