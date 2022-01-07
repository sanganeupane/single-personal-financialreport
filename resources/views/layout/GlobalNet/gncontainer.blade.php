@extends('layout/app')

@section('title','Global Net Position Cash Segment')

@section('body')
       <!-- selection critera -->
    <div>
       <div class=" border border-primary c-bg w-100">
       <div class="d-flex header">
                <a href="{{route('home')}}" class= " m-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                </svg></a>
                <p class=" ml-2 pt-2">Selection Criteria</p>
            </div>
                <form class=" d-flex p-2" action="/searchnet">
                <div class="d-flex flex-wrap w-75">
                  <div class="inputs d-flex flex-wrap">
                  <div class="form-group  ">
                            <label  class="m-1">Firm Details:  </label>
                            <select name="" id=""  class="rounded">
                                <option value="">All</option>
                                <option value="">MASTER CAPITAL SERVICES LTD</option>
                                <option value="">MASTER COMMODITY SERVICES LIMITED</option>
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
                        <label class="m-1">Pickup Ltp </label>
                            <input type="checkbox" name="" id="" class="rounded h-50">
                            

                    </div>
                    <div class="form-group  ">
                            <label class="m-1">Market Dt  </label>
                            <input type="date" name="" id=""  class="rounded">
                    </div>
                    
                    <div class="form-group">
                            <label class="m-1">Exch:  </label>
                            <select name="" id=""  class="rounded">
                                <option value="">BCOM,BS</option>
                                <option value="NSE">NSE</option>
                                <option value="NSEF">NSEF</option>
                            </select>
                    </div>
                    <div class="form-group">
                            <label class="m-1">Book Type  </label>
                            <select name="" id=""  class="rounded">
                                <option value="">AUCTION,</option>
                                <option value="">AUCTION</option>
                                <option value=""></option>
                            </select>
                    </div>
                    <div class="form-group">
                            <label class="m-1">Product </label>
                            <select name="" id=""  class="rounded">
                                <option value="">0-DEFAULT</option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                    </div>
                    <div class="form-group  ">
                            <label class="m-1">Settlement  </label>
                            <input type="number" name="" id=""  class="rounded" value="1">
                    </div>
                    <div class="form-group  ">
                            <label class="m-1">To  </label>
                            <input type="number" name="" id=""  class="rounded" value="99999999">
                    </div>
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
      @yield('data')
   </div>
@endsection

