<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Weenify , store shopify tracking ,store shopify,product spying, keyword research, search engine optimization, search engine marketing" />
    <meta name="description" content="">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Track winning stores Shopify</title>
    
    <!-- Loading Bootstrap -->
    <link href="{{ asset('saas/home/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Loading Template CSS -->
    <link href="{{ asset('saas/home/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('saas/home/css/animate.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('saas/home/css/pe-icon-7-stroke.css')}}">
    <link href="{{ asset('saas/home/css/style-magnific-popup.css')}}" rel="stylesheet">

    <!-- Awsome Fonts -->
    <link rel="stylesheet" href="{{ asset('saas/home/css/all.min.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Cabin:700" rel="stylesheet">

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="{{ asset('saas/img/favicon.png') }}">
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

<script>(function(w){w.fpr=w.fpr||function(){w.fpr.q = w.fpr.q||[];w.fpr.q[arguments[0]=='set'?'unshift':'push'](arguments);};})(window);
fpr("init", {cid:"uhjjfvck"}); 
fpr("click");
</script>
<script src="https://cdn.firstpromoter.com/fpr.js" async></script>
<!-- Google tag (gtag.js) -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-975957367"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-975957367');
</script> -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11151238615"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11151238615');
</script>
<!-- Hotjar Tracking Code for my site -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3424765,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

</head>

<body>

    <!-- ======== End Navbar ======== -->
<!--begin header -->
<header class="header">
      <div class="alert bg-primary text-white fade show rounded-0 mb-1 text-center  text-capitalize" role="alert">
        <div class="container">
          <a href="/register" class="alert-inner d-flex justify-content-center align-items-center p-0 text-light">
            <span class="badge badge-lg  rounded-pill bg-white text-primary text-uppercase rounded me-2">weenify30</span>Special Offer 30% discount! </a>
          <!-- /.alert-inner -->
        </div>
        <!-- /.container -->
      </div>
    <!--begin navbar-fixed-top -->
    <nav class="navbar navbar-default navbar-fixed-top">
        
        <!--begin container -->
        <div class="container">

            <!--begin navbar -->
            <nav class="navbar navbar-expand-lg">

                <!--begin logo -->
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('saas/img/logo.png') }}" class="navbar-brand-img" alt="knine" style="max-height: 3rem;">
                </a>
                <!--end logo -->

                <!--begin navbar-toggler -->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <!--end navbar-toggler -->

                <!--begin navbar-collapse -->
                <div class="navbar-collapse collapse" id="navbarCollapse" style="">
                    
                    <!--begin navbar-nav -->
                    <ul class="ml-auto navbar-nav">
                        @if(Request::is('/'))
                            <li class="link"><a href="/">{{ __('Home') }}</a></li>

                            <!-- <li class="link"><a href="#about">{{ __('About') }}</a></li> -->
                            <li class="link"><a href="#faq">{{ __('FAQ') }}</a></li>

                            <li class="link"><a href="#pricing">{{ __('Pricing') }}</a></li>

                            <li class="link"><a href="/contact">{{ __('Contact') }}</a></li>
                        @endif

            @guest
            {{-- <a href="/login" role="button" class="btn-1">Login</a> --}}
            <li class="discover-link"><a href="/login" class="external">{{ __('Login') }}</a></li>
            <li class="discover-link"><a href="/register" class="external discover-btn">{{ __('Start Free Trial') }}</a></li>
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
                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-user"></i>
                            </span>
                            {{ __('Profile') }}
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
            <li class="nav-item dropdown mr-4">
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
              </li>
                    </ul>
                    <!--end navbar-nav -->

                </div>
                <!--end navbar-collapse -->

            </nav>
            <!--end navbar -->

        </div>
        <!--end container -->
        
    </nav>
    <!--end navbar-fixed-top -->
    
</header>
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