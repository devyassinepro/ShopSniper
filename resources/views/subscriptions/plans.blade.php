
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
   <!-- CSS font-awesome Plugins -->
   <link rel="stylesheet" href="{{ asset('saas/admin/vendor/font-awesome/css/all.min.css')}}">
   <link rel="stylesheet" href="{{ asset('saas/vendor/select2/dist/css/select2.min.css') }}">

  <!-- CSS Front Template -->
  <!-- <link rel="stylesheet" href="{{ asset('assets/css/argon.mine209.css?v=1.0.0') }}" type="text/css"> -->
  <link rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.0') }}" type="text/css">

  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">

  <link rel="stylesheet" href="assets/css/main.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Cabin:700" rel="stylesheet">

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="{{ asset('saas/img/favicon.png') }}">
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">


  @livewireStyles
  @stack('styles')
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
    
<nav class="navbar navbar-expand-md">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none" href="#">
    <img  src="{{ asset('images/logo-dark.png') }}" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <a class="navbar-brand d-none d-md-block" href="#">
        <img  src="{{ asset('images/logo-dark.png') }}" >
        </a>
      </ul>
    </div>

  </div>
</nav>

<!-- <x-slot name="header">
        <div class="d-none d-lg-block">
            <h1 class="h2 text-white">{{ __('Plans')  }}</h1>
        </div>
    </x-slot>

    <div class="card">
        <h5 class="card-header">{{ __('Our plans') }}</h5>

        <div class="card-body">
            <livewire:plan-list />
        </div>
    </div> -->


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



