@extends('layouts.admin')
@section('content')
    <h1>Posts</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
            <td>{{$post->id}}</td>

            <td><img class="img-thumbnail img-fluid" src="{{$post->photo_id ? asset($post->photo->file): "http://via.placeholder.com/62x62"}}" alt="">
                </td>
            <td>{{$post->user_id ? $post->user->name : 'no name'}}</td>
            <td>
                @foreach($post->categories as $category)
                    <span class="badge badge-pill badge-info">
                          {{$category->name}}
                    </span>
                @endforeach
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at ? $post->created_at : ''}}</td>
            <td>{{$post->updated_at ? $post->updated_at : ''}}</td>
            <td>{{$post->deleted_at ? $post->deleted_at : ''}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection
