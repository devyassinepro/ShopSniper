<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Weenify , store shopify tracking ,store shopify,product spying, keyword research, search engine optimization, search engine marketing" />
    <meta name="description" content="">

        <!--twitter og-->
    <meta name="twitter:site" content="@themetags">
    <meta name="twitter:creator" content="@themetags">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Weenify - Creative SAAS Technology & IT Solutions Bootstrap 5 HTML Template">
    <meta name="twitter:description" content="Weenify creative Saas, software technology, Saas agency & business Bootstrap 5 Html template. It is best and famous software company and Saas website template.">
    <meta name="twitter:image" content="#">

    <!--facebook og-->
    <meta property="og:url" content="#">
    <meta name="twitter:title" content="Weenify - Creative SAAS Technology & IT Solutions Bootstrap 5 HTML Template">
    <meta property="og:description" content="Weenify creative Saas, software technology, Saas agency & business Bootstrap 5 Html template. It is best and famous software company and Saas website template.">
    <meta property="og:image" content="#">
    <meta property="og:image:secure_url" content="#">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">


        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Track winning stores Shopify</title>

    <!-- Loading Bootstrap -->
    <link href="{{ asset('saas/home/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Loading Template CSS -->
    <!-- <link href="{{ asset('saas/home/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('saas/home/css/animate.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('saas/home/css/pe-icon-7-stroke.css')}}">
    <link href="{{ asset('saas/home/css/style-magnific-popup.css')}}" rel="stylesheet"> -->

    <link rel="stylesheet" href="assets/css/main.css">
    <!--custom css start-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!--custom css end-->

    <!-- Awsome Fonts -->
    <link rel="stylesheet" href="{{ asset('saas/home/css/all.min.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Cabin:700" rel="stylesheet">

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="{{ asset('saas/img/favicon.png') }}">
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">



    @livewireStyles
    @stack('styles')
    <style>
        .card-body{
            border-top:none;
        }
        .navbar-fixed-top .navbar-nav .current a{
            color: #5f6468 !important;
        }
    </style>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '691407819506168');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=691407819506168&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>

<body>

    <!-- ======== End Navbar ======== -->

    <!--preloader start-->
    <!-- <div id="preloader" class="bg-light-subtle">
        <div class="preloader-wrap">
            <img src="assets/img/favicon.png" alt="logo" class="img-fluid preloader-icon">
            <div class="loading-bar"></div>
        </div>
    </div> -->
    <!--preloader end-->
    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header section start-->
        <!--header start-->
        <header class="main-header position-absolute w-100">
            <nav class="navbar navbar-expand-xl navbar-dark z-10">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                @if(Request::is('/'))
                    <a href="/" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white" />
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color" />
                    </a>
                @else 
                    <a class="navbar-brand" href="/">
                    <img src="{{ asset('saas/img/logo.png') }}" class="navbar-brand-img" alt="knine" style="max-height: 3rem;">
                  </a>
                @endif
                    <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                        <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                     data-bs-toggle="offcanvas" role="button"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        @if(Request::is('/'))

                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="#pricing" class="nav-link">{{ __('Pricing') }}</a></li>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>

                        @endif
   
                </ul>
                </div>
                @guest
            <!-- {{-- <a href="/login" role="button" class="btn-1">Login</a> --}} -->
            <!-- <li class="discover-link"><a href="/login" class="external">{{ __('Login') }}</a></li> -->
            <!-- <li class="discover-link"><a href="/register" class="external discover-btn">{{ __('Start Free Trial') }}</a></li> -->
            @else
            <div>
                <span class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="padding-top: 0;" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span class="avatar rounded-circle">
                            <img alt="Image placeholder" class="rounded-circle" width="35" src="{{ Auth::user()->profile_photo_url }}">
                        </span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- User Account Link -->
                        <a class="dropdown-item" href="/dashboard">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-user"></i>
                            </span>
                            {{ __('Dashboard') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('account.password') }}">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-unlock-alt"></i>
                            </span>
                            {{ __('Password') }}
                        </a>
                        @role('admin')
                        <a class="dropdown-item" target="__blank" href="{{ route('admin.index') }}">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-tachometer-alt"></i>
                            </span>
                            {{ __('Admin panel') }}
                        </a>
                        @endrole
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-power-off"></i>
                            </span>
                            {{ __('Logout') }}
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>

                        <div class="dropdown-divider"></div>
                    </div>
                </span>
            </div>
            @endguest
                <div class="hs-unfold">
                    
                  <a class="pr-0 nav-link btn btn-secondary" href="#" role="button" data-toggle="dropdown" style="background-color:transparent; border:0px;"
                      aria-haspopup="true" aria-expanded="false">
                      <div class="media-body d-none d-lg-block">
                        <img src="{{ asset('saas/svg/flags/'.app()->getLocale().'.svg') }}" alt="United States Flag">
                        <span>{{ app()->getLocale()  }}</span>
                      </div>
                  </a>

                  <div id="footerLanguage" class="hs-unfold-content dropdown-menu dropdown-unfold dropdown-menu-bottom mb-2">
                    @foreach (language()->allowed() as $code => $name)
                      <a class="dropdown-item" href="{{ language()->back($code) }}">{{ $name }}</a>
                    @endforeach
                        </div>
                          </div>
                    @guest
                    <div class="action-btns text-end me-5 me-lg-0 d-none d-md-block d-lg-block">
                        <a href="javascript:void(0)" class="btn btn-link p-1 tt-theme-toggle">
                            <div class="tt-theme-light" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Light"><i class="flaticon-sun-1 fs-lg"></i></div>
                            <div class="tt-theme-dark" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Dark"><i class="flaticon-moon-1 fs-lg"></i></div>
                        </a> 
                        <a href="/login" class="btn btn-link text-decoration-none me-2">Sign In</a>
                        <a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                    @endguest

                    
                </div>
            </nav>
            <!--offcanvas menu start-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                <div class="offcanvas-header d-flex align-items-center mt-4">
                    <a href="/" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="saas/img/logo.png" alt="logo" class="img-fluid ps-2" />
                    </a>
                    <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="flaticon-cancel"></i>
                    </button>
                </div>
                <div class="offcanvas-body z-10">

                    @guest
                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           
                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="#pricing" class="nav-link">{{ __('Pricing') }}</a></li>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
                    </ul>
                    <div class="action-btns mt-4 ps-3">
                        <a href="/login" class="btn btn-outline-primary me-2">Sign In</a>
                        <a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                    @else

                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           

                            <li><a href="/dashboard" class="nav-link">{{ __('Dashboard') }}</a></li>
                            <li><a href="{{ route('account.password') }}" class="nav-link">{{ __('Password') }}</a></li>
                            <li>  
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-power-off"></i>
                            </span>
                            {{ __('Logout') }}
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
                    </ul>
                    <!-- start -->
                    @endguest
                    <!-- end -->

                </div>
            </div>
            <!--offcanvas menu end-->
        </header>
<!--begin header -->
<!--end header -->
        {{ $slot }}

    <!--begin footer -->
    <div class="footer">

        <!--begin container -->
        <div class="px-0 container-fluid">

            <!--begin row -->
            @if (\Request::is('/'))
            <div class="mx-0 row no-gutters">

                <!--begin col-md-4 -->
                <!--end col-md-4 -->

                <!--begin col-md-4 -->


                </div>
                <!--end col-md-4 -->

                <!--begin col-md-4 -->


            </div>
            <!--end row -->
            @endif
            <!--begin row -->
            <div class="row">

                <!--end col-md-6 -->

            </div>
            <!--end row -->

        </div>
        <!--end container -->

    </div>
    <!--end footer -->

    @livewireScripts
<script src="{{ asset('saas/home/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('saas/home/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('saas/home/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('saas/home/js/jquery.nav.js')}}"></script>
<script src="{{ asset('saas/home/js/wow.js')}}"></script>
<script src="{{ asset('saas/home/js/plugins.js')}}"></script>
<script src="{{ asset('saas/home/js/custom.js')}}"></script>

  <!--Start of Tawk.to Script-->
  @if (config('saas.demo_mode'))
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5fbb1a42a1d54c18d8ec4a68/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    @endif
    <!--End of Tawk.to Script-->
</body>
</html>
