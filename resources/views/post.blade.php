@extends('layouts.frontend')
@section('content')
<!-- Header Area Start -->
@include('components._frontend_header')
<!-- Header Area End -->

<section class="single-post-area">
    <!-- Single Post Title -->
    <div class="single-post-title bg-img background-overlay" style="background-image: url({{asset('images/imagesfront/bg-img/1.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="single-post-title-content">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            @foreach($post->categories as $category)
                                <a href="#">{{$category->name}}</a>
                            @endforeach
                        </div>
                        <h2 class="font-pt">{{$post->title}}</h2>
                        <time class="text-white font-italic">{{$post->created_at ? $post->created_at->diffForHumans() : now()->diffForHumans()}}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-post-contents">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="single-post-thumb mt-5">
                        <img class="w-100 img-fluid" src="{{asset($post->photo->file)}}" alt="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="single-post-text">
                        {{$post->body}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@auth
<section class="gazette-post-discussion-area section_padding_100 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Comment Area Start -->
                <div class="comment_area section_padding_50 clearfix">
                    <div class="gazette-heading">
                        @if (session('status'))
                            <div>
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ session('status') }}
                                </div>
                            </div>
                        @endif
                        <h4 class="font-bold">Discussion</h4>
                    </div>
                    <ol>
                        @foreach($post->comments->sortByDesc('created_at') as $comment)
                            @if(is_null($comment->parent_id))
                                @include('components._comment', ['comment' => $comment])
                            @endif
                        @endforeach
                    </ol>
                </div>
                <!-- Leave A Comment -->
               @include('components._frontend-comment')
            </div>
        </div>
    </div>
</section>
@endauth
@endsection
