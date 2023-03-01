@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('content')
    <h1>Edit User</h1>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">

                {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update',$user->id],'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name','Name:') !!}
                    {!! Form::text('name',$user->name,['class'=>'form-control','placeholder' => 'Name required...']) !!}
                    @error('name')
                    <p class="text-danger fs-6">Naam invullen aub</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email','E-mail:') !!}
                    {!! Form::text('email',$user->email,['class'=>'form-control','placeholder' => 'E-mail required...']) !!}
                    @error('email')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('Select roles: (hou de ctrl toets ingedrukt om meerdere te selecteren') !!}
                    {!! Form::select('roles[]',$roles,$user->roles,['class'=>'form-control','placeholder' => 'Pick a role...','multiple'=>'multiple']) !!}
                    @error('roles')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),$user->is_active,['class'=>'form-control']) !!}
                    @error('is_active')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password:') !!}
                    {!! Form::password('password',['class'=>'form-control','placeholder' => 'Password required...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo_id','Photo_id:') !!}
                    {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
                </div>

                <div class="d-flex justify-content-end">
                    <div class="form-group mr-1">
                        {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                    {!! Form::open(['method'=>'DELETE', 'action'=>['\App\Http\Controllers\AdminUsersController@destroy',$user->id]]) !!}
                    <div class="form-group mr-1">
                        {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

                @include('includes.form_error')
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                <img class="img-fluid img-thumbnail"
                     src="{{$user->photo ? asset($user->photo->file) : 'http://via.placeholder.com/600'}}"
                     alt="{{$user->name}}">
            </div>
        </div>
    </div>
@endsection
