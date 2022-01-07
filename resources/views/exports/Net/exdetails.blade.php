<table width="100%">
    <thead style="font-weight:900">
    <tr>
            <td colspan='20' style="font-size:20px; ">MASTER CAPITAL SERVICES LTD.</td>
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
            Client Code:  {{\Illuminate\Support\Facades\Auth::user()->username}}
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
            <td>Global Net Position Cash Segment for the Financial Year</td>
        </tr>
        <tr>
             <td>Net Total:{{$net}} Market Value: {{$m_value}} Profit Loss: {{$pl}} Cr </td>
        </tr>
        <tr>

        </tr>
    <tr style="background-color:blue;color:white;">
        <td>Scrip Code</td>
            <td>Scrip Name</td>
            <td>Exch Code</td>
            <td>Book Type</td>
            <td>Settlement</td>
            <td>Transaction Date</td>
                <td>(+)Quantity</td>
                <td>(+) Average</td>
                <td>Purchase Value</td>
                <td>(-)Quantity</td>
                <td>(-)Average</td>
                <td>Sales Value</td>
                <td>Net Qty</td>
                <td>Net Avg</td>
                <td>Net Value</td>
                <td>Market</td>
                <td>Market Value</td>
                <td>P/L</td>
    </tr>
    </thead>
    <tbody>
        
   @foreach ($statement as $rep)
        <tr>
        <td>{{$rep->scrip_code}}</td>
            <td>{{$rep->scrip_name}}</td>
            <td>{{$rep->exch_code}}</td>
            <td>{{$rep->book_type}}</td>
            <td>{{$rep->settlement_no}}</td>
            <td>{{$rep->transaction_date}}</td>
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
                <td>{{$rep->p_l}}</td>

        </tr>
    @endforeach
    <tr  class="footer_summary">
                    <td colspan="14"></td>
                    <td>{{$net}}</td>
                    <td></td>
                    <td>{{$m_value}}</td>
                    <td>{{$pl}}</td>
                </tr>
    </tbody>
   </table>
