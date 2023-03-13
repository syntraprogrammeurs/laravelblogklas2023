@extends('layouts.admin')
@section('content')
    <div>
        <div class="d-flex justify-content-between shadow-lg p-3 mb-2 bg-body-tertiary rounded">
            <h1><strong class="text-dark">{{$post->id}} | {{$post->title}}</strong></h1>
            <div class="d-flex">
                <a class="btn btn-primary mx-1 my-2 rounded-pill " href="{{route('posts.index')}}">All Posts</a>
                <a class="btn btn-primary mx-1 my-2 rounded-pill" href="{{route('posts.create')}}">Create Post</a>
            </div>

        </div>

        <div class="d-flex">
            <img class="img-thumbnail img-fluid" src="{{asset($post->photo->file)}}" alt="">
            <div class="mx-5">
                <p>Posted on {{$post->created_at ? $post->created_at->diffForHumans(): 'no date'}}</p>
                @foreach($post->categories as $category)
                    <span class="badge badge-pill badge-dark">
                        {{$category->name}}
                    </span>
                @endforeach
                <p class="mt-3">{{$post->body}}</p>
            </div>
        </div>
    </div>
@endsection
