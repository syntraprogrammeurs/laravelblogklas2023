@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex w-100 justify-content-between">
            <h1 class="m-0">Edit | <strong>{{$comment->id}}</strong></h1>
            <a href="{{route('comments.index')}}" class="btn btn-primary m-2 rounded-pill">All Comments</a>
        </div>
    </div>
 @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Users</x-slot>
        </x-alert>
    @endif
    <div class="row my-2">
        <div class="col-12">
            <form action="{{action('App\Http\Controllers\CommentController@update',$comment->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="post_id" value="{{$comment->post->id}}">
                <input type="hidden" name="parent_id" value="{{$comment->parent->id}}">
                <input type="hidden" name="user_id" value="{{$comment->user->id}}">

                <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{($comment->body)}}
            </textarea>
                @error('body')
                <p class="text-danger fs-6">{{$message}}</p>
            @enderror
                <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">UPDATE</button>
            </form>
        </div>
    </div>
@endsection


