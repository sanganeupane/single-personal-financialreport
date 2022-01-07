<table >
    <thead>
    <tr>
            <td colspan='20' style="font-size:20px;">MASTER CAPITAL SERVICES LTD.</td>
        </tr>
        <tr>
            <td colspan='20'>
            A-852-A BASEMENT, SUSHANT LOK PHASE-I, GURUGRAM HARYANA 122002 PH 0124-4601275, helpdesk@mastertrust.co.in
            </td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td>
            Client Code: {{\Illuminate\Support\Facades\Auth::user()->username}}
            </td>
        </tr>
        <tr>
            <td>
            Client Name:{{\Illuminate\Support\Facades\Auth::user()->name}}
            </td>
        </tr>
        <tr>
            <td>
            Client Address: {{\Illuminate\Support\Facades\Auth::user()->address}}
            </td>
        </tr>
        <tr>
            <?php

                $ffdate=\App\FinancialYear::select('year')->latest()->first();
            ?>

            <td>Client Global Derivatives Segment for the Financial Year: {{$ffdate->year}}</td>
        </tr>
        <tr>
            <td>
              Net Dr. Cr: {{$fnet}}      Market Value: {{$fm_value}}   Only Loss: {{$onlyloss}}    Profit/Loss: {{$fpl}}
            </td>
        </tr>
        <tr>

        </tr>
    <tr>
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
    </thead>
    <tbody>

   @foreach ($statement as $rep)
        <tr>
        <td>{{$rep->scrip_code}}</td>
                <td>{{$rep->scrip_name}}</td>
                <td>{{$rep->ast}}</td>
                <td>{{$rep->price}}</td>
                <td>{{$rep->ot}}</td>
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
    @endforeach
    <tr >
                    <td colspan="7"></td>
                    <td>{{$p_value}}</td>
                    <td colspan="2"></td>
                    <td>{{$s_value}}</td>
                    <td colspan="2"></td>
                    <td>{{$net}}</td>
                    <td colspan="2"></td>
                    <td>{{$m_value}}</td>
                    <td>{{$tpl}}</td>
                    <td>{{$pl}}</td>
            </tr>
    </tbody>
   </table>
