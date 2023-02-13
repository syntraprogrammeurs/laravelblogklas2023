@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('content')
    <h1>USERS</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo_id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role_id</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                   <td>{{$user->id}}</td>
                    <td>{{$user->photo_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
{{--                    <td>{{$user->role_id?$user->role->name:'User without role'}}</td>--}}
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge badge-pill badge-info">
                                {{$role->name}}
                            </span>
                        @endforeach
                    </td>
                    <td class="{{$user->is_active == 1?'bg-success':'bg-danger'}}">{{$user->is_active == 1?'Active':'Not Active'}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
