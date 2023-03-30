@extends('layouts.frontend')

@section('content')
    <!-- Header Area Start -->
    @include('components._frontend_header')
    <!-- Header Area End -->

    <!-- Breadcumb Area Start -->
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breacumb-content d-flex align-items-center justify-content-between">
                        <!-- Post Tag -->
                        <div class="gazette-post-tag">
                            <a href="#">{{$category->name}}</a>
                        </div>
                        <p class="editorial-post-date text-dark mb-0">{{date('F j, Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->

    <!-- Editorial Area Start -->
    <section class="gazatte-editorial-area section_padding_100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="editorial-post-slides owl-carousel">
                        @foreach($sliderPosts as $slidePost)
                            <!-- Editorial Post Single Slide -->
                            <div class="editorial-post-single-slide">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <div class="editorial-post-thumb">
                                            <img src="{{asset($slidePost->photo ? $slidePost->photo->file : '')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="editorial-post-content">
                                            <!-- Post Tag -->
                                            <div class="gazette-post-tag">
                                                @foreach($slidePost->categories as $category)
                                                    <a href="">{{$category->name}}</a>
                                                @endforeach
                                            </div>
                                            <h2><a href="#" class="font-pt mb-15">{{$slidePost->title}}</a></h2>
                                            <p class="editorial-post-date mb-15">{{$slidePost->created_at ?$slidePost->created_at->diffForHumans : date('F j, Y')}}</p>
                                            <p>{{Str::limit($slidePost->body,300)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Editorial Area End -->

    <section class="catagory-welcome-post-area section_padding_100">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                        <!-- Gazette Welcome Post -->
                        <div class="d-flex flex-column justify-content-between h-100">
                            <!-- Post Tag -->
                            <div>
                                <div class="gazette-post-tag mt-5">
                                    @foreach($post->categories as $category)
                                        <a href="{{route('category.category',$category->slug)}}">{{$category->name}}</a>
                                    @endforeach
                                </div>
                                <h2 class="font-pt">{{$post->title}}</h2>
                                <p class="gazette-post-date">{{$post->created_at ?$post->created_at->diffForHumans : date('F j, Y')}}</p>
                            </div>
                            <div>
                                <!-- Post Thumbnail -->
                                <div class="blog-post-thumbnail my-5">
                                    <img src="{{asset($post->photo ? $post->photo->file : '')}}" alt="post-thumb">
                                </div>
                                <!-- Post Excerpt -->
                                <p>{{Str::limit($post->body,200)}}</p>
                                <!-- Reading More -->
                                <div class="post-continue-reading-share mt-30">
                                    <div class="post-continue-btn">
                                        <a href="{{route('frontend.post', $post->slug)}}" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                                                              aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-5">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </section>


