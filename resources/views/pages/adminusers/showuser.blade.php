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
            <h2>

                <a href="{{route('adduser')}}">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Add user</button>
                    <hr>
                </a>
            </h2>


        </section>
        <!-- Main content -->

        @include('layouts.message')


        <div class="container-fluid" id="container-wrapper">

            <section class="content">

                <div class="row">
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                            @foreach($userData as $key=>$users)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->username}}</td>
                                    <td>{{$users->address}}</td>
                                    <td>{{$users->phone}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->role}}</td>


                                    <td>
                                        <img src="{{url('uploads/users/'.$users->image)}}" width="28px" alt="">
                                    </td>

                                    <td>
                                        <form action="{{route('updateStatus')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="criteria" value="{{$users->id}}">

                                            @if($users->status==1)
                                                <button class="btn-sm btn-outline-success" name="active"><i
                                                            class="fa fa-check"></i> Active </button>

                                            @else
                                                <button class="btn- btn btn-outline-danger" name="inactive"><i
                                                            class="fa fa-times"></i> Inactive</button>

                                            @endif
                                        </form>
                                    </td>


                                    <td>


                                        <a href="
                            {{route('editUser').'/'.$users->id}}
                                                ">
                                            <button class="btn-xs btn-success" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <a href="
                            {{route('deleteUserAction').'/'.$users->id}}

                                                ">


                                            <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                            </button>

                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $userData->links() }}
                    </div>

                </div>

            </section>
        </div>
    </div>
@endsection
