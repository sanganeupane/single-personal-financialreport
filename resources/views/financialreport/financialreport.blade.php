@extends('layout/app')

@section('title','Financial Statement')

@section('body')
       <!-- selection critera -->
    <div>
       <div class="c-bg w-100">
       <div class="d-flex header">
                <a href="{{route('home')}}" class= " m-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                </svg></a>
                <p class=" ml-2 pt-2">Selection Criteria</p>
            </div>
                <form class=" d-flex p-2 align-items-center" action="/search">
                   <div class="d-flex flex-wrap w-75">
                    <div class="form-group  ">
                                <label  class="m-1">Firm Details:  </label>
                                <select name="" id=""  class="rounded">
                                    <option value="">All</option>
                                    <option value="">MASTER CAPITAL SERVICES LTD</option>
                                    <option value="">MASTER COMMODITY SERVICES LIMITED</option>
                                </select>
                        </div>
                        <div class="form-group  fyear">
                                <label class="m-1">F.Y  </label>
                                <select name="year" id=""  class="rounded">
                                @foreach($fyears as $fyear)
                                    <option value="{{$fyear->year}}">{{$fyear->year}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group  ">
                                <label class="m-1">From Date  </label>
                                <input type="date" name="fromdate" id=""  class="rounded">
                        </div>
                        <div class="form-group  ">
                                <label class="m-1">To Date </label>
                                <input type="date" name="todate" id=""  class="rounded">
                        </div>
                        <div class="form-group  ">
                                <label class="m-1">Incl Mar. </label>
                                <input type="checkbox" name="" id=""  class="rounded h-50">
                        </div>
                        <div class="form-group  ">
                            <label class="m-1">Margin Ac. </label>
                                <input type="checkbox" name="" id="" class="rounded h-50">
                        </div>
                        <div class="form-group">
                                <label class="m-1">Exch:  </label>
                                <select name="exchange" id=""  class="rounded">
                                    <option value="">BCOM,BS</option>
                                    <option value="NSE">NSEF</option>
                                    <option value="NSEF">NSEF</option>
                                </select>
                        </div>
                   </div>
                   
                    <div class=" ml-3 w-25 iconcontainer">
                        <button type="submit" name="submit" value="load" class=" rounded-pill icon">
                       <img src="{{asset('/icons2/load.png')}}" alt="">
                        </button>
                        <button type="submit" name="submit" value="export" class="btn btn-light rounded-pill icon">
                        <img src="{{asset('/icons2/excel.png')}}" alt="">
                        <button type="button" class="btn btn-light rounded-pill  icon" >
                        <img src="{{asset('/icons2/print.png')}}" alt="">
                        </button>
                        <button type="button" class="btn btn-light rounded-pill  icon" >
                        <img src="{{asset('/icons2/info.png')}}" alt="">
                        </button>
                        <button type="button" class="btn btn-light rounded-pill  icon" >
                        <img src="{{asset('/icons2/search.png')}}" alt="">
                        </button>
                    </div>
                </form>
        </div>
       <!-- selection critera -->
        <div class="summary d-flex text-white ">
            <div class="w-25 m-1 p-1 box1"><h5>Opening:</h5></div>
            <div class="w-25 m-1 p-1 box2"><h5>Debit Total:</h5></div>
            <div class="w-25 m-1 p-1 box3"><h5>Credit Total:</h5></div>
            <div class="w-25 m-1 p-1 box4"><h5>Net Total:</h5></div>
        </div>

        <!-- Entry data  -->
      <div class="table">
      <table width='100%' border="1">
            <tr class="thead text-white">
                <td>Entry Date</td>
                <td>Voucher No.</td>
                <td>Bank</td>
                <td>Cheque</td>
                <td>Exchange</td>
                <td>BookType</td>
                <td>Settlement <br> No</td>
                <td>Transaction Dt</td>
                <td>Description Narration</td>
                <td>Dr. Amount</td>
                <td> Cr. Amount</td>
                <td>Final Dr.Cr</td>
            </tr>
            <tr align="center">
                <td colspan="12"> No data</td>
            </tr>
        </table>
      </div>
   </div>
@endsection

