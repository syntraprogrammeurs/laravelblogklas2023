@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="d-flex col-lg-4 p-0">
                <div class="card h-100 shadow-lg  mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <h3><strong>Comment {{$comment->id}}</strong></h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Comment Body:</strong> {{$comment->body}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="m-0"><strong>Author:</strong> {{$comment->user->name}}</p>

                    </div>
                </div>
                <div class="m-2 my-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-right-square-fill text-primary" viewBox="0 0 16 16">
                        <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                    </svg>
                </div>
            </div>
            <div class="d-flex col-lg-4 p-0">
                @if($comment->parent_id)
                    <div class="card h-100">
                        <div class="card-header">
                            <h3>Parent Comment {{$comment->parent_id}}</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Parent Body:</strong> {{$comment->parent->body}}</p>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p class="m-0"><strong>Author:</strong> {{$comment->user->name}}</p>
                            <a href="{{route('comments.show', $comment->parent_id)}}" class="btn btn-primary">Go</a>
                        </div>
                    </div>
                    <div class="m-2 my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-right-square-fill text-primary" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg>
                    </div>
                @else
                    <div class="card h-100 w-100 d-flex justify-content-center align-items-center">
                        <p>No Parent Comment</p>
                    </div>
                    <div class="m-2 my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-right-square-fill text-primary" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"/>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="d-flex col-lg-4 p-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h3>Post {{$comment->post->id}}: <small>{{$comment->post->title}}</small></h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Post Body:</strong> {{$comment->post->body}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="m-0"><strong>Author:</strong> {{$comment->post->user->name}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-5 p-0 shadow-lg  mb-5 bg-body-tertiary rounded">
                @if($comment->children->count() > 0)
                    <div class="rounded p-3" style="border:1px solid #e3e6f0;">
                        <h3>Child Comments</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comment->children as $child)
                                <tr>
                                    <td><a href="{{route('comments.show', $child->id)}}">{{$child->id}}</a></td>
                                    <td>{{$child->user->name}}</td>
                                    <td>{{$child->body}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>No child comments found.</p>
                        @endif
                        <a href="{{route('comments.index')}}" class="btn btn-primary">All Comments</a>
                    </div>
            </div>
        </div>
    </div>
@endsection
