<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Site Maintenance') }}</title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="{{asset('css/weenifyapp.css?v=').time()}}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset('saas/css/theme.css') }}">
</head>
<body>
  <!-- ========== HEADER ========== -->
  <header id="header" class="header header-bg-transparent header-abs-top py-3">
    <div class="header-section">
      <div id="logoAndNav" class="container">
        <nav class="navbar">
          <a class="navbar-brand" href="../landings/index.html" aria-label="Front">
            <img src="{{ asset('svg/logo.svg') }}" alt="Logo">
          </a>

          <div class="ml-auto">
            <a class="btn btn-sm btn-primary transition-3d-hover" href="status.html">Check for Updates</a>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN ========== -->
  <main id="content" role="main">
    <!-- Hero Section -->
    <div class="d-flex">
      <div class="container d-flex align-items-center vh-100">
        <div class="row justify-content-md-center flex-md-grow-1 text-center">
          <div class="col-md-9 col-lg-6">
            <img class="img-fluid mb-2" src="{{ asset('saas/svg/maintenance-mode.svg') }}" alt="SVG Illustration">
            <h1 class="h2">{{ __("We're just tuning up a few things.") }}</h1>
            <p>{{ __("We apologize for the inconvenience but we are currently undergoing planned maintenance. Stay tuned!") }}</p>
            <p>&mdash; The Team</p>
        </div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->
  </main>
  <!-- ========== END MAIN ========== -->

  <!-- ========== FOOTER ========== -->
  <footer class="position-absolute right-0 bottom-0 left-0">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center space-1">
        <!-- Copyright -->
        <p class="small text-muted mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}</p>
        <!-- End Copyright -->

        <!-- Social Networks -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-google"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-xs btn-icon btn-ghost-secondary" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- JS Global Compulsory -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- JS Front -->
  <script src="{{ asset('saas/js/hs.core.js') }}"></script>
</body>
</html>