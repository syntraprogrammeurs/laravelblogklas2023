<header class="header-area">
    <div class="top-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Breaking News Area -->
                <div class="col-12 col-md-4">
                    <div class="breaking-news-area">
                        <h5 class="breaking-news-title">Breaking news</h5>
                        <div id="breakingNewsTicker" class="ticker text-white">
                            <ul>
                                @foreach($postsTickers as $postTicker)
                                    <li>{{$postTicker->title}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Stock News Area -->
                <div class="col-12 col-md-4">
                    <div class="stock-news-area">
                        <div id="stockNewsTicker" class="ticker">
                            <ul>
                                <li>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>eur/usd</span>
                                            <span>1.1862</span>
                                        </div>
                                        <div class="stock-index minus-index">
                                            <h4>0.18</h4>
                                        </div>
                                    </div>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>BTC/usd</span>
                                            <span>15.674.99</span>
                                        </div>
                                        <div class="stock-index plus-index">
                                            <h4>8.60</h4>
                                        </div>
                                    </div>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>ETH/usd</span>
                                            <span>674.99</span>
                                        </div>
                                        <div class="stock-index minus-index">
                                            <h4>13.60</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>eur/usd</span>
                                            <span>1.1862</span>
                                        </div>
                                        <div class="stock-index minus-index">
                                            <h4>0.18</h4>
                                        </div>
                                    </div>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>BTC/usd</span>
                                            <span>15.674.99</span>
                                        </div>
                                        <div class="stock-index plus-index">
                                            <h4>8.60</h4>
                                        </div>
                                    </div>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>ETH/usd</span>
                                            <span>674.99</span>
                                        </div>
                                        <div class="stock-index minus-index">
                                            <h4>13.60</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>eur/usd</span>
                                            <span>1.1862</span>
                                        </div>
                                        <div class="stock-index minus-index">
                                            <h4>3.95</h4>
                                        </div>
                                    </div>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>BTC/usd</span>
                                            <span>15.674.99</span>
                                        </div>
                                        <div class="stock-index plus-index">
                                            <h4>4.78</h4>
                                        </div>
                                    </div>
                                    <div class="single-stock-report">
                                        <div class="stock-values">
                                            <span>ETH/usd</span>
                                            <span>674.99</span>
                                        </div>
                                        <div class="stock-index minus-index">
                                            <h4>11.37</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    @if (Route::has('login'))
                        <div class="hidden d-flex justify-content-end">
                            @auth
                                <a class="text-sm text-white" href="{{url('/admin')}}">Backend</a>
                            @else
                                <a class="text-sm text-white pr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                        <a class="text-sm text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- Middle Header Area -->
    <div class="middle-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Logo Area -->
               @include('components._frontend-logo')
                <!-- Header Advert Area -->
                <div class="col-12 col-md-8">
                    <div class="header-advert-area">
                        <a href="#"><img src="{{asset('images/imagesfront/bg-img/top-advert.png')}}" alt="header-add"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Header Area -->
    <div class="bottom-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="main-menu">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false"
                                    aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu
                            </button>
                            <div class="collapse navbar-collapse" id="gazetteMenu">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Today <span class="sr-only">(current)</span></a>
                                    </li>
                                    @foreach($categories as $category)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route("category.category", $category->slug)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Search Form -->
                                <div class="header-search-form mr-auto">
                                    <form action="#">
                                        <input type="search" placeholder="Input your keyword then press enter..." id="search" name="search">
                                        <input class="d-none" type="submit" value="submit">
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div id="searchbtn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
