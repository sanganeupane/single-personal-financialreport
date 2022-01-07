

<table width="100%">
    <thead >
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
            <td>Financial Statement for the Financial Year: {{$syear}}</td>
        </tr>
        <tr>
            <td>
             Opening: {{$op_balance}}   Debit Total: {{$fdr_sum}}      Credit Total:{{$fcr_sum}}       Net Total:{{$fnet}} 
            </td>
        </tr>
        <tr>

        </tr>
    <tr class="thead">
        <th>Entry Date</th>
        <th>Voucher No</th>
        <th>Bank</th>
        <th>Cheque</th>
        <th>Exchange</th>
        <th>BookType</th>
        <th>Settlement No</th>
        <th>Transaction Dt</th>
        <th>Description Narration</th>
        <th>Dr. Amount</th>
        <th>Cr. Amoount</th>
        <th>FInal Dr. Cr</th>
    </tr>
    </thead>
    <tbody>
        
   @foreach ($statement as $st)
        <tr>
           <td >{{ $st->entry_date }}</td>
           <td >{{ $st->voucher_no}}</td>
           <td >{{ $st->bank}}</td>
           <td >{{ $st->cheque}}</td>
           <td >{{ $st->exchange}}</td>
           <td >{{ $st->book_type}}</td>
           <td >{{ $st->settlement_no}}</td>
           <td >{{ $st->transaction_date}}</td>
           <td >{{ $st->description_narration}}</td>
           <td >{{ $st->dr_amount}}</td>
           <td >{{ $st->cr_amount}}</td>
           <td >{{ $st->final_dr_cr}}</td>

        </tr>
    @endforeach
    <tr class="footer_summary">
        <td colspan="9"></td>
        <td>{{$dr_sum}}</td>
        <td>{{$cr_sum}}</td>
    </tr>
    </tbody>
   </table>
