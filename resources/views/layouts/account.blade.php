<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
  <title>{{ config('app.name', 'Weenify') }} - Winning Products For Dropshipping</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('saas/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
  <!-- Styles -->
   <!-- CSS font-awesome Plugins -->
   <link rel="stylesheet" href="{{ asset('saas/admin/vendor/font-awesome/css/all.min.css')}}">
   <link rel="stylesheet" href="{{ asset('saas/vendor/select2/dist/css/select2.min.css') }}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.0') }}" type="text/css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

  @vite(['resources/css/app.css','resources/js/app.js'])

<!-- Scripts -->

  @stack('styles')
  @livewireStyles
</head>

<body>
@livewireScripts
@livewireScriptConfig 

  <!-- Sidenav -->
  @include('partials.read-only')
  @include('partials.account.login_as')
  
  <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
        <livewire:account.navigator />
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('partials.account.topnav')
                <!-- main header @e -->
                   <!-- Page content -->
                   {{ $slot }}

   <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2023 <a href="https://weenify.io" target="_blank">Weenify</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
                </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
         
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
            <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/lavalamp/js/jquery.lavalamp.min.js') }}"></script>
            <script src="{{ asset('assets/js/argon.mine209.js?v=1.0.0') }}"></script>
            // <!-- Optional JS -->
            // <!-- Argon JS -->
                // <!--Start of Tawk.to Script-->
            // <!--End of Tawk.to Script-->
            <script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
            <script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
            <script src="{{ asset('assets/js/example-toastr.js?ver=3.2.0') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

 
<!-- {{-- Connect component files js --}} -->
    @stack('scripts')
</body>
</html>
