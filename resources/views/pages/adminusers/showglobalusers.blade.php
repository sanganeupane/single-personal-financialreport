{{--@extends('layouts.app')--}}
{{--@section('content')--}}


{{--    <div class="container-fluid" id="container-wrapper">--}}
{{--        <section class="content-header">--}}
{{--            <h2>--}}

{{--                <a href="{{route('adduser')}}">--}}
{{--                    <button class="btn btn-primary"><i class="fa fa-plus"></i>  Add user</button>--}}
{{--                    <hr>--}}
{{--                </a>--}}
{{--            </h2>--}}


{{--        </section>--}}
{{--        <!-- Main content -->--}}

{{--        @include('layouts.message')--}}


{{--        <div class="container-fluid" id="container-wrapper">--}}

{{--            <section class="content">--}}

{{--                <div class="row">--}}
{{--                    <div class="table-responsive">--}}

{{--                        <table class="table table-hover">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>S.N.</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Username</th>--}}
{{--                                <th>Email</th>--}}
{{--                                <th>Role</th>--}}
{{--                                <th>Image</th>--}}
{{--                                <th>Status</th>--}}
{{--                                <th>Action</th>--}}

{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($userData as $key=>$users)--}}
{{--                                <tr>--}}
{{--                                    <td>{{++$key}}</td>--}}
{{--                                    <td>{{$users->name}}</td>--}}
{{--                                    <td>{{$users->username}}</td>--}}
{{--                                    <td>{{$users->email}}</td>--}}
{{--                                    <td>{{$users->role}}</td>--}}


{{--                                    <td>--}}
{{--                                        <img src="{{url('uploads/users/'.$users->image)}}" width="28px" alt="">--}}
{{--                                    </td>--}}

{{--                                    <td>--}}
{{--                                        <form action="{{route('updateStatus')}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="criteria" value="{{$users->id}}">--}}

{{--                                            @if($users->status==1)--}}
{{--                                                <button class="btn-xs btn-success" name="active"><i--}}
{{--                                                            class="fa fa-check"></i></button>--}}

{{--                                            @else--}}
{{--                                                <button class="btn-xs bnt btn-danger" name="inactive"><i--}}
{{--                                                            class="fa fa-times"></i></button>--}}

{{--                                            @endif--}}
{{--                                        </form>--}}
{{--                                    </td>--}}


{{--                                    <td>--}}


{{--                                        <a href="--}}
{{--                            {{route('editUser').'/'.$users->id}}--}}
{{--                                                ">--}}
{{--                                            <button class="btn-xs btn-success" name="criteria"><i--}}
{{--                                                        class="fa fa-edit"></i>--}}
{{--                                            </button>--}}
{{--                                        </a>--}}


{{--                                        <a href="--}}
{{--                            {{route('deleteUserAction').'/'.$users->id}}--}}

{{--                                                ">--}}


{{--                                            <button class="btn-xs btn-danger" name="criteria"><i--}}
{{--                                                        class="fa fa-trash"></i>--}}
{{--                                            </button>--}}

{{--                                        </a>--}}

{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        {{ $userData->links() }}--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--            </section>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
