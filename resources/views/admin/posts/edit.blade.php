@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex w-100 justify-content-between">
            <h1 class="m-0">Edit | <strong>{{$post->title}}</strong></h1>
            <a href="{{route('posts.index')}}" class="btn btn-primary m-2 rounded-pill">All Posts</a>
        </div>
    </div>
 @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Users</x-slot>
        </x-alert>
    @endif
    <div class="row my-2">
        <div class="col-6">
            <form action="{{action('App\Http\Controllers\AdminPostsController@update',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <input name="title" type="text" class="form-control" id="floatingInputValue" placeholder="Title" value="{{$post->title}}">
                    @error('title')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb3">
                    <label>Categories</label>
                    @foreach($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category{{$category->id}}" name="categories[]"
                            @if($post->categories->contains($category->id))
                                checked
                            @endif>
                            <label class="form-check-label" for="category{{$category->id}}">{{$category->name}}</label>
                        </div>
                    @endforeach
                    @error('categories')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
            <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{($post->body)}}
            </textarea>
                    @error('body')
                    <p class="text-danger fs-6">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" name="photo_id" id="ChooseFile">
                </div>
                <button type="submit" class="ml-auto btn btn-dark d-flex justify-content-end me-3">UPDATE</button>
            </form>
        </div>
        <div class="col-6">
            <img class="img-fluid img-thumbnail"
                 src="{{$post->photo ? asset($post->photo->file) : 'http://via.placeholder.com/400'}}" alt="{{$post->title}}">
        </div>
    </div>
@endsection


