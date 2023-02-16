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

            @include('includes.form_error')

            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update',$user->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',$user->name,['class'=>'form-control','placeholder' => 'Name required...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','E-mail:') !!}
                {!! Form::text('email',$user->email,['class'=>'form-control','placeholder' => 'E-mail required...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Select roles: (hou de ctrl toets ingedrukt om meerdere te selecteren') !!}
                {!! Form::select('roles[]',$roles,$user->roles,['class'=>'form-control','placeholder' => 'Pick a role...','multiple'=>'multiple']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),$user->is_active,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=>'form-control','placeholder' => 'Password required...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','Photo_id:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
       <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
           <img class="img-fluid img-thumbnail" src="{{$user->photo ? asset($user->photo->file) : 'http://via.placeholder.com/600'}}" alt="{{$user->name}}">
       </div>
        </div>
    </div>
@endsection
