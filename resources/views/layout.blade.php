
<!DOCTYPE html>
<html>
<head>
    @include('head')
</head>
<body>


@include('header')
@yield('title-page')
<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            @include ('left-banner');
        </nav>
    </div>
    <div class="w3l_banner_nav_right">
        @yield('slide')
        @yield('content')
        <!-- //flexSlider -->
    </div>
{{--    <div class="clearfix"></div>--}}
    <div class="clearfix"></div>
</div>

@yield('member')
@yield('service-bottom')
<!-- top-brands -->

<!-- //fresh-vegetables -->
@include('footer')

</body>
</html>
