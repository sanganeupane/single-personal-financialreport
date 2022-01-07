@extends('layout.app')
@section('title','Market Pundit Investment Holdings')
@section('body')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/apps.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <div class="app">
        <br>
        @include('layouts.message')


        <div class='d-flex align-items-center justify-content-around'>
            <div class="text-center text-white d-flex align-items-center justify-content-between">
                <div>
                    <span><i class="far fa-newspaper"></i></span>
                    Welcome :
                    @if(\Illuminate\Support\Facades\Auth::user()){{\Illuminate\Support\Facades\Auth::user()->username}}
                    @else
                    @endif
                </div>
{{--                <div class='ml-2'>--}}

{{--                    @if(\Illuminate\Support\Facades\Auth::guard('web')->user())--}}
{{--                        <button class="btn btn-outline-info" href="{{ route('logout') }}"--}}
{{--                                onclick="event.preventDefault();--}}
{{--                       document.getElementById('logout-form').submit();">--}}
{{--                            {{ __('Logout') }}--}}
{{--                        </button>--}}

{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                            @csrf--}}
{{--                        </form>--}}

{{--                    @else--}}

{{--                        <button class="btn btn-outline-info">--}}
{{--                            <a class="btn btn-outline-success" href="{{route('login')}}">login</a>--}}

{{--                        </button>--}}
{{--                    @endif--}}


{{--                </div>--}}

            </div>

            <div class="text-center text-white"> CIRCULAR</div>
            <div class="text-center text-white"> RESEARCH REPORT</div>
            <div class="text-center text-white"> SEBI complaint(SCORES)</div>
        </div>

        <div class="d-flex p-md-5 p-0 home align-items-start">

            <div class="container-fluid p-0  text-grey">


                <h2>Daily Reports</h2>
                <div class="d-flex p-2 flex-wrap">
                    <a href="#"><img src="{{ asset('/icon/1.png') }}" alt=""></a>
                    <a href="{{route('home')}}"><img src="{{ asset('/icon/2.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/3.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/4.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/5.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/6.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/7.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/8.png') }}" alt=""></a>
                </div>
            </div>
            <div class="container-fluid p-0 text-grey">


                <h2>Global Reports</h2>
                <div class="d-flex p-2 flex-wrap">

                    <a href="{{route('home')}}"><img src="{{ asset('/icon/9.png') }}" alt=""></a>
                    <a href="{{route('home')}}"><img src="{{ asset('/icon/10.png') }}"
                                                                 alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/11.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/12.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/13.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/14.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/15.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/16.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/17.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/18.png') }}" alt=""></a>


                </div>


            </div>
            <div class="container-fluid p-0 text-grey">

                <h2>Demat Stock</h2>
                <div class="d-flex p-2 flex-wrap">
                    <a href="#"><img src="{{ asset('/icon/19.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('/icon/20.png') }}" alt=""></a>
                </div>
            </div>


        </div>

        <div class="fs-1">


            @if(\Illuminate\Support\Facades\Auth::guard('web')->user())
                <button type="button" class="btn btn-secondary m-2" data-toggle="tooltip" data-placement="right" title="Logout" class="btn btn-outline-info" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
{{--                    {{ __('Logout') }}--}}  <i class="fa fa-power-off" aria-hidden="true"></i>
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            @else

            <a href="{{route('login')}}" type="button" class="btn btn-secondary m-2" data-toggle="tooltip" data-placement="right" title="login">
                <i class="fa fa-power-off" aria-hidden="true"></i>

            </a>
            @endif
            <br>
            <a href="#" type="button" class="btn btn-secondary m-2" data-toggle="tooltip" data-placement="right" title="Settings">
                <i class="fa fa-cog" aria-hidden="true"></i>

            </a>


        </div>


    </div>

@endsection