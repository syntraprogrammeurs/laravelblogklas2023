@extends('errors::minimal')
@section('title', __('Not Found'))
@section('code', '404')
@section('content')
            <div class="text-center text-gray-500">
                <h1 class="display-4">Page Not Found</h1>
                <p class="lead">The requested URL was not found on this server.</p>
                <a href="/" class="btn btn-primary">Back to Homepage</a>
            </div>
    </div>
@endsection
@section('message', __('Not Found'))

