@extends('layouts.admin')
@section('content')
    <div>
        <h1><strong class="text-dark">{{$post->title}}</strong></h1>
        <div class="d-flex">
            <img class="img-thumbnail img-fluid" src="{{asset($post->photo->file)}}" alt="">
            <div  class="mx-5">
                <p>Posted on {{$post->created_at ? $post->created_at->diffForHumans() : 'no date'}}</p>
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


