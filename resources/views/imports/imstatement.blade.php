@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{url('/home')}}">
                Home
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="container" style="margin-top: 50px;">
                @if (session('status')=='success')
                 <div class="alert alert-success">
                  {{ session('status') }}
                  </div>
                @endif
                @if (session('status')=='Error')
                 <div class="alert alert-warning">
                     <p>Please select correct file or check the file information</p>
                  </div>
                @endif
                    <h1>Import Financial Statement</h1>
                    <p class=' text-primary p-2'>Check the file is financial statement or not.</p>
                    <form action="report/store" id="frm-create-course" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                                <label >Financial Year</label>
                            <select name="fyear" id="" required='required'>
                                @foreach($fyears as $fyear)
                                <option value="{{$fyear->year}}">{{$fyear->year}}</option>
                                @endforeach
                                
                            </select>                        
                        </div>
                        <div class="form-group">
                                <label for="file">Select Excel File:</label>
                                <input type="file" class="form-control" required id="file" name="file">
                        </div>

                        <div class="form-group">
                            <label>user name</label>
                            <a style="color:red;">{{$errors->first('posted_to')}}</a>

                            <select name="posted_to" id="">
                                @foreach($usernames as $username)
                                    <option value="{{$username->id}}">{{$username->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit-post">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

