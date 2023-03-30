@extends('layouts.frontend')

@section('content')
    <!-- Header Area Start -->
    @include('components._frontend_header')
    <!-- Header Area End -->

    <!-- Welcome Blog Slide Area Start -->
    <section class="welcome-blog-post-slide owl-carousel">
        @foreach($posts as $post)
            <!-- Single Blog Post -->
            <div class="single-blog-post-slide bg-img background-overlay-5" style="background-image: url({{asset($post->photo->file)}});">
                <!-- Single Blog Post Content -->
                <div class="single-blog-post-content">
                    <div class="tags">
                        @if($post->categories)
                            @foreach($post->categories as $category)
                            <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                            @endforeach
                        @endif
                    </div>
                    <h3><a href="{{route('frontend.post', $post->slug)}}" class="font-pt">{{$post->title}}</a></h3>
                    <div class="date">
                        <a href="#">{{$post->created_at ? $post->created_at->diffForHumans() : ''}}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
    <!-- Welcome Blog Slide Area End -->

    <!-- Latest News Marquee Area Start -->
    <div class="latest-news-marquee-area">
        <div class="simple-marquee-container">
            <div class="marquee">
                <ul class="marquee-content-items">
                    <li>
                        <a href="#"><span class="latest-news-time">10:40</span> The Facebook Live stream that could presage TV</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">11:02</span> Opinion: It's time to start talking about impeachment</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">12:37</span> Clinton aims to shore up Wisconsin with new TV ads</a>
                    </li>
                    <li>
                        <a href="#"><span class="latest-news-time">13:59</span> Trump signs tax bill before leaving for Mar-a-Lago</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Latest News Marquee Area End -->

    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Gazette Welcome Post -->
                    <div class="gazette-welcome-post">
                       @include('components._frontend-welcomepost')
                    </div>

                    <div class="gazette-todays-post section_padding_100_50">
                        <div class="gazette-heading">
                            <h4>today’s most popular</h4>
                        </div>
                        <!-- Single Today Post -->
                        <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                            <div class="todays-post-thumb">
                                <img src="{{asset('images/imagesfront/blog-img/2.jpg')}}" alt="post-thumb">
                            </div>
                            <div class="todays-post-content">
                                <!-- Post Tag -->
                                <div class="gazette-post-tag">
                                    <a href="#">News</a>
                                </div>
                                <h3><a href="#" class="font-pt mb-2">$250-million mansion is most expensive</a></h3>
                                <span class="gazette-post-date mb-2">March 29, 2016</span>
                                <a href="#" class="post-total-comments">3 Comments</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere.</p>
                            </div>
                        </div>
                        <!-- Single Today Post -->
                        <div class="gazette-single-todays-post d-md-flex align-items-start mb-50">
                            <div class="todays-post-thumb">
                                <img src="{{asset('images/imagesfront/blog-img/3.jpg')}}" alt="post-thumb">
                            </div>
                            <div class="todays-post-content">
                                <!-- Post Tag -->
                                <div class="gazette-post-tag">
                                    <a href="#">Life</a>
                                </div>
                                <h3><a href="#" class="font-pt mb-2">Homeless man steals $350,000 </a></h3>
                                <p class="gazette-post-date mb-2">March 29, 2016</p>
                                <a href="#" class="post-total-comments">3 Comments</a>
                                <p>Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis. Aliquam finibus nulla quam, a iaculis justo finibus non. Suspendisse in fermentum nunc.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sidebar-area">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-widget">
                            <div class="widget-title">
                                <h5>breaking news</h5>
                            </div>
                            <!-- Single Breaking News Widget -->
                            <div class="single-breaking-news-widget">
                                <img src="{{asset('images/imagesfront/blog-img/bn-1.jpg')}}" alt="">
                                <div class="breakingnews-title">
                                    <p>breaking news</p>
                                </div>
                                <div class="breaking-news-heading gradient-background-overlay">
                                    <h5 class="font-pt">China leads new global skyscraper record</h5>
                                </div>
                            </div>
                            <!-- Single Breaking News Widget -->
                            <div class="single-breaking-news-widget">
                                <img src="{{asset('images/imagesfront/blog-img/bn-2.jpg')}}" alt="">
                                <div class="breakingnews-title">
                                    <p>breaking news</p>
                                </div>
                                <div class="breaking-news-heading gradient-background-overlay">
                                    <h5 class="font-pt">Can a zebra crossing change its stripes?</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Don't Miss Widget -->
                        <div class="donnot-miss-widget">
                            <div class="widget-title">
                                <h5>Don't miss</h5>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="{{asset('images/imagesfront/blog-img/dm-1.jpg')}}" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">EU council reunites</a>
                                    <span>Nov 29, 2017</span>
                                </div>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="{{asset('images/imagesfront/blog-img/dm-2.jpg')}}" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">A new way to travel the world</a>
                                    <span>March 29, 2016</span>
                                </div>
                            </div>
                            <!-- Single Don't Miss Post -->
                            <div class="single-dont-miss-post d-flex mb-30">
                                <div class="dont-miss-post-thumb">
                                    <img src="{{asset('images/imagesfront/blog-img/dm-3.jpg')}}" alt="">
                                </div>
                                <div class="dont-miss-post-content">
                                    <a href="#" class="font-pt">Why choose a bank?</a>
                                    <span>March 29, 2016</span>
                                </div>
                            </div>
                        </div>
                        <!-- Advert Widget -->
                        <div class="advert-widget">
                            <div class="widget-title">
                                <h5>Advert</h5>
                            </div>
                            <div class="advert-thumb mb-30">
                                <a href="#"><img src="{{asset('images/imagesfront/bg-img/add.png')}}" alt=""></a>
                            </div>
                        </div>
                        <!-- Subscribe Widget -->
                        <div class="subscribe-widget">
                            <div class="widget-title">
                                <h5>subscribe</h5>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="email" name="email" id="subs_email" placeholder="Your Email">
                                    <button type="submit">subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Area End -->

        <!-- Catagory Posts Area Start -->
        <div class="gazette-catagory-posts-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <div class="single-catagory-post-thumb mb-15">
                                <img src="{{asset('images/imagesfront/blog-img/12.jpg')}}" alt="">
                            </div>
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="#">Video</a>
                            </div>
                            <h5><a href="#" class="font-pt">Save the eniroment with this step</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Protest to be anounced in January</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">10 Bills that the Congress in voting</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">The narcissism of Donald Trump</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    <div class="single-catagory-post-thumb mb-15">
                                        <img src="{{asset('images/imagesfront/blog-img/14.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">Others</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">11 hottest toys for this holiday season</a></h5>
                                    <span>Nov 29, 2017</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    <div class="single-catagory-post-thumb mb-15">
                                        <img src="{{asset('images/imagesfront/blog-img/15.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">Video</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">Get this good feeling about life</a></h5>
                                    <span>Nov 29, 2017</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    <div class="single-catagory-post-thumb mb-15">
                                        <img src="{{asset('images/imagesfront/blog-img/16.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">Interview</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">Get this good feeling about life</a></h5>
                                    <span>Nov 29, 2017</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Single Catagory Post -->
                                <div class="gazette-single-catagory-post">
                                    <div class="single-catagory-post-thumb mb-15">
                                        <img src="{{asset('images/imagesfront/blog-img/17.jpg')}}" alt="">
                                    </div>
                                    <!-- Post Tag -->
                                    <div class="gazette-post-tag">
                                        <a href="#">Video</a>
                                    </div>
                                    <h5><a href="#" class="font-pt">11 hottest toys for this holiday season</a></h5>
                                    <span>Nov 29, 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <div class="single-catagory-post-thumb mb-15">
                                <img src="{{asset('images/imagesfront/blog-img/18.jpg')}}" alt="">
                            </div>
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                <a href="#">Video</a>
                            </div>
                            <h5><a href="#" class="font-pt">10 Bills that the Congress in voting</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Blair can't save Britain from Brexit</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Save the eniroment with this step</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                        <!-- Single Catagory Post -->
                        <div class="gazette-single-catagory-post">
                            <h5><a href="#" class="font-pt">Protest to be anounced in January</a></h5>
                            <span>Nov 29, 2017</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Catagory Posts Area End -->

    <!-- Video Posts Area Start -->
    <section class="gazatte-video-post-area section_padding_100_70 bg-gray">
        <div class="container">
            <div class="row">
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/4.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Show suspended by PBS amid misconduct allegations</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/5.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Parents to Congress</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/6.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Third Buy Alert for This “Millionaire Maker” Stock</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/7.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">The Chicago Mercantile Exchange is set to begin</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/8.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Trading bitcoin futures</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/9.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Are ‘Micro-Mansions’ the Next Big Thing?</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/10.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">McKinney’s target market</a></h5>
                    </div>
                </div>
                <!-- Single Video Post Start -->
                <div class="col-12 col-md-3">
                    <div class="single-video-post">
                        <div class="video-post-thumb">
                            <img src="{{asset('images/imagesfront/blog-img/11.jpg')}}" alt="">
                            <a href="https://youtu.be/dIyXl9ZHEgg" class="videobtn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                        <h5><a href="#">Australian Property Prices Remain Flat</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Posts Area End -->

    <!-- Editorial Area Start -->
    <section class="gazatte-editorial-area section_padding_100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="editorial-post-slides owl-carousel">

                        <!-- Editorial Post Single Slide -->
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        <img src="{{asset('images/imagesfront/blog-img/bitcoin.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Editorial Post Single Slide -->
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        <img src="{{asset('images/imagesfront/blog-img/bitcoin.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Editorial Post Single Slide -->
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        <img src="{{asset('images/imagesfront/blog-img/bitcoin.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Editorial Post Single Slide -->
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        <img src="{{asset('images/imagesfront/blog-img/bitcoin.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            <a href="#">Editorial</a>
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">Move over, bitcoin. <br>Here comes litecoin</a></h2>
                                        <p class="editorial-post-date mb-15">March 29, 2016</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices egestas nunc, quis venenatis orci tincidunt id. Fusce commodo blandit eleifend. Nullam viverra tincidunt dolor, at pulvinar dui. Nullam at risus ut ipsum viverra posuere. Aliquam quis convallis enim. Nunc pulvinar molestie sem id blandit. Nunc venenatis interdum mollis...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Editorial Area End -->

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        {{ __('You are logged in!') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
