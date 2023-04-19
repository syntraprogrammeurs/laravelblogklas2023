@extends('layouts.admin')
@section('title')
    Users
@endsection
@section('content')
    <h1>USERS</h1>
    @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Users</x-slot>
        </x-alert>
    @endif

   <livewire:data-tables/>

@endsection
