
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
    <x-slot name="header">
        <div class="d-none d-lg-block">
            <h1 class="h2 text-white">{{ __('Checkout')  }}</h1>
        </div>
    </x-slot>
    @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
    
                <!-- <x:card-form :action="route('subscriptions.store')">
                    <input type="hidden" name="plan" value="{{ request('plan') }}" <div class="text-center">

                    <div class="form-group">
                        <label for="coupon">{{ __('Coupon') }}</label>
                        <input type="text" name="coupon" id="coupon" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary " id="card-button" data-secret="{{ $intent->client_secret }}"> {{ __('Subscribe') }} </button>
                </x:card-form> -->

    
    @push('styles')
    <script src="https://js.stripe.com/v3/"></script>
    @endpush
    <br> <br>
            <div class="row g-3">

              <div class="col-md-6">  
                
                <span>Payment Method</span>
                <div class="card">

                  <div class="accordion" id="accordionExample">

                    <div class="card">
                      <div class="card-header p-0">
                        <h2 class="mb-0">
                          <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center justify-content-between">

                              <span>Credit card</span>
                              <div class="icons">
               
                                <img src="{{ asset('saas/img/master.png') }}" width="30">
                                <img src="{{ asset('saas/img/visa.png') }}" width="30">
                                <img src="{{ asset('saas/img/stripe.png') }}" width="30">
                                <img src="{{ asset('saas/img/master2.png') }}" width="30">
                              </div>
                              
                            </div>
                          </button>
                        </h2>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body payment-card-body">
                          
                    <x:card-form :action="route('subscriptions.store')">
                    <input type="hidden" name="plan" value="{{ request('plan') }}" <div class="text-center">

                        </div>
                      </div>
                    </div>
                    
                    <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                         
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6">
                  <span>Summary</span>

                  <div class="card">

                    <div class="d-flex justify-content-between p-3">

            @foreach ($plans as $plan)
                      <div class="d-flex flex-column">
                        <span>{{ $plan->title }} - {{ $plan->store_access_count }} Stores(Billed Monthly) <i class="fa fa-caret-down"></i></span>

                      </div>

                      <div class="mt-1">
                        <sup class="super-price">${{ $plan->price }}</sup>
                        <span class="super-month">/Month</span>
                      </div>
                      
                    </div>

                    <hr class="mt-0 line">
                    <div class="form-group">
                        <label for="coupon">{{ __('Coupon') }}</label>
                        <input type="text" name="coupon" id="coupon" class="form-control">
                    </div>

                    <div class="p-3 d-flex justify-content-between">

                      <div class="d-flex flex-column">

                        <span>Today you pay(US Dollars)</span>
                        <small>After 7 days ${{ $plan->price }}</small>
                        
                      </div>
                      <span>$0</span> 
                      @endforeach
                    </div>


                    <div class="p-3">

                    <button  type="submit" class="btn btn-primary btn-block free-button" id="card-button" data-secret="{{ $intent->client_secret }}">Try it free for 7 days (0$)</button> 
                </x:card-form>
                    </div>
                    
                  </div>
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

