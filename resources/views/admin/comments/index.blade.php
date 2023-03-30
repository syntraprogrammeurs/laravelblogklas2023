@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="d-flex">
            <p class="rounded bg-danger m-0 d-flex align-self-center p-2 text-white">{{$comments->total()}}</p>
            <h1 class="m-0">| Comments</h1>
            <a href="{{route('comments.index')}}" class="btn btn-primary m-2 rounded-pill">All Comments</a>
        </div>
    </div>
 @if (session('alert'))
        <x-alert :type="session('alert')['type']" :message="session('alert')['message']">
            <x-slot name="title">Users</x-slot>
        </x-alert>
    @endif
    <table class="table table-striped shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
        <tr>
            <th>Post_id</th>
            <th>Parent_id</th>
            <th>Id</th>

            <th>Author</th>
            <th>Body</th>

            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>
                    @if($comment->post)
                        <a href="{{route('posts.show', $comment->post->id)}}">
                            {{ $comment->post->id }}
                        </a>

                    @endif
                </td>
                <td>
                    <a href="{{route('comments.show', $comment->id)}}">
                        {{ $comment->parent_id }}
                    </a>

                </td>
                <td>
                    <a href="{{route('comments.show', $comment->id)}}">
                    {{ $comment->id }}
                    </a>
                </td>
                <td>
                    @if ($comment->user_id && $comment->user)
                        <a href="{{route('authors',$comment->user->name)}}">
                            {{$comment->user->name}}
                        </a>
                    @else
                        <p class="text-danger">{{$comment->user()->withTrashed()->first() ? $comment->user()->withTrashed()->first()->name : "no name"}}</p>
                    @endif
                </td>
                <td>{{ $comment->body }}</td>
                <td>{{$comment->created_at ? $comment->created_at->diffForHumans() : ''}}</td>
                <td>{{$comment->updated_at ? $comment->updated_at->diffForHumans() : ''}}</td>
                <td>{{$comment->deleted_at ? $comment->deleted_at->diffForHumans() : ''}}</td>
                <td>
                    <div class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown{{ $comment->id }}" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                            </svg>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu  shadow "
                             aria-labelledby="userDropdown{{ $comment->id }}">
                            <a class="dropdown-item" href="{{route('comments.show', $comment->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                                Show
                            </a>
                            <a class="dropdown-item" href="{{route('comments.edit', $comment->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                                Edit
                            </a>

                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $comments->appends(['search' => Request::get('search'), 'fields' => Request::get('fields')])->links() }}
@endsection



