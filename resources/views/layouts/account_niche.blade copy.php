<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
  <title>{{ config('app.name', 'Weenify') }}</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('saas/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{asset('css/weenifyapp.css?v=').time()}}">
  <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->

   <!-- CSS font-awesome Plugins -->
   <link rel="stylesheet" href="{{ asset('saas/admin/vendor/font-awesome/css/all.min.css')}}">
   <link rel="stylesheet" href="{{ asset('saas/vendor/select2/dist/css/select2.min.css') }}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.mine209.css?v=1.0.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.0') }}" type="text/css">

  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
  @livewireStyles
  @stack('styles')

  <script>(function(w){w.fpr=w.fpr||function(){w.fpr.q = w.fpr.q||[];w.fpr.q[arguments[0]=='set'?'unshift':'push'](arguments);};})(window);
        fpr("init", {cid:"uhjjfvck"});
        fpr("click");
        </script>
{{-- <script src="https://cdn.firstpromoter.com/fpr.js" async></script> --}}
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-975957367"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-975957367');
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
  <!-- Sidenav -->
  @include('partials.read-only')
  @include('partials.account.login_as')
  @include('partials.account.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
      <!-- Topnav -->
          @include('partials.account.topnav')
      <div class="pb-6 header">
          <div class="container-fluid">
              <div class="header-body">
              </div>
          </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--6" style="padding-top: 6px;">
        @yield('content')
      </div>

  </div>
  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<x-livewire-alert::scripts />
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/lavalamp/js/jquery.lavalamp.min.js') }}"></script>
    <!-- Optional JS -->
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.mine209.js?v=1.0.0') }}"></script>
    @stack('scripts')
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
    <script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
</body>
</html>
