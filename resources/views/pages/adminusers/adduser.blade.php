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
    <div class="container-fluid" id="container-wrapper">

        <section class="content-header">
            <div>
                <h3>
                    <a href="{{route('showusers')}}">
                        <button class="btn btn-primary">Show users</button>

                    </a>
                </h3>
                @include('layouts.message')

                <hr>
                <h2>Add user</h2>
            </div>

        </section>
        <section class="content">


            <form action="{{route('adduseraction')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <a style="color:red;">{{$errors->first('name')}}</a>
                        <input type="text" name="name" class="form-control" placeholder="First name"
                               value="{{old('name')}}" id="name">
                    </div>

                    <div class="form-group  col-md-4">
                        <label for="username">Username</label>
                        <a style="color:red;">{{$errors->first('username')}}</a>
                        <input type="text" name="username" class="form-control"
                               placeholder="Enter username" value="{{old('username')}}"
                               id="username">
                    </div>


                    <div class="form-group  col-md-4">
                        <label for="address">Address</label>
                        <a style="color:red;">{{$errors->first('address')}}</a>
                        <input type="text" name="address" class="form-control"
                               placeholder="Enter address" value="{{old('address')}}"
                               id="address">
                    </div>

                    <div class="form-group  col-md-4">
                        <label for="phone">Phone no.</label>
                        <a style="color:red;">{{$errors->first('phone')}}</a>
                        <input type="number" name="phone" class="form-control"
                               placeholder="Enter phone" value="{{old('phone')}}"
                               id="phone">
                    </div>

                    <div class="form-group  col-md-4">
                        <label for="email">Email</label>
                        <a style="color:red;">{{$errors->first('email')}}</a>
                        <input type="text" name="email" class="form-control" placeholder="email"
                               value="{{old('email')}}" id="email">
                    </div>

                    <div class="form-group col-md-5">
                        <label for="password">Password</label>
                        <a style="color:red;">{{$errors->first('password')}}</a>
                        <input type="password" name="password" class="form-control"
                               placeholder="enter password" value="{{old('password')}}"
                               id="password">
                    </div>
                    <div class="form-group  col-md-5">
                        <label for="password_confirmation">Confirm_Password</label>
                        <a style="color:red;">{{$errors->first('password_confirmation')}}</a>
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Confirm your password" value="{{old('password')}}"
                               id="password_confirmation">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="image">Image</label>
                        <a style="color:red;">{{$errors->first('image')}}</a>
                        <input type="file" name="image" class="form-control"
                               placeholder="Your image"
                               value="{{old('image')}}" id="image">

                    </div>


                    <div class="form-group  col-md-6">
                        <label for="role">user role </label>
                        <a style="color:red;">{{$errors->first('role')}}</a>
                        <select name="role" id="deals" class="form-control"
                                aria-label="Default select example">
                            <option disabled selected>-------Select user role--------</option>

{{--                            <option value="admin">Admin</option>--}}
                            <option value="user">User</option>

                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <br>

                        <button class="btn btn-primary">Add Admin User</button>
                    </div>
                </div>
            </form>

        </section>
    </div>



@endsection
