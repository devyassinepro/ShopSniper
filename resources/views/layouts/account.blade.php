<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
  <title>{{ config('app.name', 'Weenify') }} - Winning Products For Dropshipping</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

  <style>
  .limited-text {
    max-height: 70px;
    overflow: hidden;
}

.read-more {
    display: none;
    color: #007BFF;
    cursor: pointer;
}

.read-more.show {
    display: block;
}
    .colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #f8bb86 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

.colored-toast.swal2-icon-question {
  background-color: #87adbd !important;
}

.colored-toast .swal2-title {
  color: white;
}

.colored-toast .swal2-close {
  color: white;
}

.colored-toast .swal2-html-container {
  color: white;
}

</style>
  @vite(['resources/css/app.css','resources/js/app.js'])

<!-- Scripts -->

  @stack('styles')
  @livewireStyles
</head>

<body>

@if(Route::is('subscriptions'))

<!-- Sidenav -->

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
<div class="nk-app-root">
      <!-- main @s -->
      <div class="nk-main ">

          <!-- wrap @s -->
          <div class="nk-wrap ">

              <!-- main header @s -->
              <!-- main header @e -->
                 <!-- Page content -->
                 {{ $slot }}

              <!-- footer @s -->
              <!-- footer @e -->
          </div>
          <!-- wrap @e -->
      </div>
      <!-- main @e -->

@else 

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

                   <br> <br>
                   {{ $slot }}

   <!-- footer @s -->
               
                <!-- footer @e -->
                </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->

        @endif
    </div>
    @livewireScripts
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <x-livewire-alert::scripts />
          <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
            <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/lavalamp/js/jquery.lavalamp.min.js') }}"></script>
            <script src="{{ asset('assets/js/argon.mine209.js?v=1.0.0') }}"></script>
             <!-- Optional JS -->
             <!-- Argon JS -->
             <!--Start of Tawk.to Script-->

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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
                    <!-- sweet alert  -->
            <script>

            window.addEventListener('show-delete-confirmation', event =>{
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Delete"
                    }).then((result) => {
                    if (result.isConfirmed) {
                      Livewire.emit('deleteConfirmed')
                    }
                    });
            });

            window.addEventListener('NicheDeleted', event =>{
                  Swal.fire({
                      title: "Deleted!",
                      text: "Your Niche has been deleted.",
                      icon: "success"
                    });
            });

      
</script>


</body>
</html>
