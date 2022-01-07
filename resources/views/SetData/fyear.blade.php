@extends('layouts.app')
@section('content')
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
        <div class="col-md-4">
            <div class="card">
                <div class="container" >
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                            Succesfully stored {!! \Session::get('success') !!}
                    </div>
                @endif
                    @if (session('status')=='Error')
                    <div class="alert alert-warning">
                        <p>Please try again!</p>
                    </div>
                    @endif
                    @if (session('status')=='Duplicate')
                    <div class="alert alert-warning">
                        <p>Financial year and time should be different for different year</p>
                    </div>
                    @endif
                
                        <h3>Set Financial Year</h3>
                        <form action="fyear/store" id="frm-create-course" method="post">
                        @csrf
                            <div class="form-group">
                                    <label >Set Year</label>
                                    <input type="text" class="form-control" required  name="year">
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit-post">Submit</button>
                        </form>
                    </div>
            </div>
            <div class=" card mt-5">
                <h3>Financial year and duration</h3>
                <table>
                    <tr>
                        <th>Financial Year</th>
                    </tr>
                    @foreach($fyears as $fyear)
                        <tr>
                            <td>{{$fyear->year}}</td>
                            <td>
                            <form action="deletefinancialyear/{{$fyear->id}}" id="" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" id=""  onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                             </form>
                            </td>


                        </tr>
                    @endforeach

                 
                 
                </table>
            </div>
        </div>
    </div>
@endsection
