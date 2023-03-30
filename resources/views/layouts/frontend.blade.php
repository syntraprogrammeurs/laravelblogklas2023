<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TheGazette - News Magazine HTML5 Template | Single Post</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('images/imagesfront/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">

    <!-- Responsive CSS -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

</head>

<body>
<!-- Content Row -->
@yield('content')

<!-- Footer Area Start -->
<footer class="footer-area bg-img background-overlay" style="background-image: url({{asset('images/imagesfront/bg-img/4.jpg')}}">
    <!-- Top Footer Area -->
    <div class="top-footer-area section_padding_100_70">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-footer-widget">
                        <div class="footer-widget-title">
                            <h4 class="font-pt">Regions</h4>
                        </div>
                        <ul class="footer-widget-menu">
                            <li><a href="#">U.S.</a></li>
                            <li><a href="#">Africa</a></li>
                            <li><a href="#">Americas</a></li>
                            <li><a href="#">Asia</a></li>
                            <li><a href="#">China</a></li>
                            <li><a href="#">Europe</a></li>
                            <li><a href="#">Middle</a></li>
                            <li><a href="#">East</a></li>
                            <li><a href="#">Opinion</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-footer-widget">
                        <div class="footer-widget-title">
                            <h4 class="font-pt">Fashion</h4>
                        </div>
                        <ul class="footer-widget-menu">
                            <li><a href="#">Election 2016</a></li>
                            <li><a href="#">Nation</a></li>
                            <li><a href="#">World</a></li>
                            <li><a href="#">Our Team</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-footer-widget">
                        <div class="footer-widget-title">
                            <h4 class="font-pt">Politics</h4>
                        </div>
                        <ul class="footer-widget-menu">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Markets</a></li>
                            <li><a href="#">Tech</a></li>
                            <li><a href="#">Luxury</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-footer-widget">
                        <div class="footer-widget-title">
                            <h4 class="font-pt">Featured</h4>
                        </div>
                        <ul class="footer-widget-menu">
                            <li><a href="#">Football</a></li>
                            <li><a href="#">Golf</a></li>
                            <li><a href="#">Tennis</a></li>
                            <li><a href="#">Motorsport</a></li>
                            <li><a href="#">Horseracing</a></li>
                            <li><a href="#">Equestrian</a></li>
                            <li><a href="#">Sailing</a></li>
                            <li><a href="#">Skiing</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-footer-widget">
                        <div class="footer-widget-title">
                            <h4 class="font-pt">FAQ</h4>
                        </div>
                        <ul class="footer-widget-menu">
                            <li><a href="#">Aviation</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Traveller</a></li>
                            <li><a href="#">Destinations</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Food/Drink</a></li>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Partner Hotels</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-footer-widget">
                        <div class="footer-widget-title">
                            <h4 class="font-pt">+More</h4>
                        </div>
                        <ul class="footer-widget-menu">
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Arts</a></li>
                            <li><a href="#">Autos</a></li>
                            <li><a href="#">Luxury</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Area -->
    <div class="bottom-footer-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12">
                    <div class="copywrite-text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('js/plugins.js')}}"></script>
<!-- Active js -->
<script src="{{asset('js/active.js')}}"></script>

</body>

</html>


