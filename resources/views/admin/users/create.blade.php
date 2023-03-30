@extends('layouts.admin')
@section('title')
    Create User
@endsection
@section('content')
    <x-heading heading="Create user"></x-heading>
    <hr>
    @include('includes.form_error')

    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Name required...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','E-mail:') !!}
        {!! Form::text('email',null,['class'=>'form-control','placeholder' => 'E-mail required...']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Select roles: (hou de ctrl toets ingedrukt om meerdere te selecteren') !!}
        {!! Form::select('roles[]',$roles,null,['class'=>'form-control','placeholder' => 'Pick a role...','multiple'=>'multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}
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

@endsection
