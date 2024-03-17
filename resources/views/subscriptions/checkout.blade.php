@extends('layouts.accountsubscribe')
@section('title', 'Checkout')
@section('content')

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
   <!-- wrap @s -->
   <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                <h4>2-Start Trial</h4>

                                </div>
                             
                          <!-- checkout -->
                        
                          <h5>Card Information</h5>
                          <p>All transactions are secure and encrypted.</p>
                          <div class="icons">
               
               <img src="{{ asset('saas/img/master.png') }}" width="30">
               <img src="{{ asset('saas/img/visa.png') }}" width="30">
               <img src="{{ asset('saas/img/stripe.png') }}" width="30">
               <img src="{{ asset('saas/img/master2.png') }}" width="30">
             </div>
                  
                          @push('styles')
                          <script src="https://js.stripe.com/v3/"></script>
                          @endpush
                                  <x:card-form :action="route('subscriptions.store')">
                                      <input type="hidden" name="plan" value="{{ request('plan') }}" <div class="text-center">

                                      <div class="form-group">
                                          <label for="coupon">{{ __('Coupon') }}</label>
                                          <input type="text" name="coupon" id="coupon" class="form-control">
                                      </div>
                                      
                                      <button type="submit" class="btn btn-primary " id="card-button" data-secret="{{ $intent->client_secret }}"> Try it free for 7 days (0$) </button>
                                  </x:card-form>
                         
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/TermsandConditions">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/privacypolicy">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/RefundPolicy">Privacy Policy</a>
                                        </li>
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2023 Weenify. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->

                        <!-- right -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                            @foreach ($plans as $plan)
                                              <div class="position-relative single-pricing-wrap rounded-custom bg-gradient text-white p-5 mb-4 mb-lg-0">
                                                  <div class="pricing-header mb-32">
                                                      <h3 class="package-name text-primary d-block">{{$plan->name}}</h3>
                                                      <h4 class="display-6 fw-semi-bold">${{round($plan->price,0)}}<span>/month</span></h4>
                                                  </div>
                                                  <div class="pricing-info mb-4">
                                                      <ul class="pricing-feature-list list-unstyled">
                                                          <li><i class="fas fa-circle fa-2xs text-warning me-2"></i>{{$plan->store_access_count}} Tracked Stores</li>
                                                          <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Top 100 Stores</li>
                                                          <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Top 500 Products</li>
                                                          <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Real Time Sales</li>
                                                          <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Product Filters</li>
                                                          <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Change Store Any Time</li>
                                                          <!-- <li><i class="fas fa-circle fa-2xs text-warning me-2"></i> Every Minute</li> -->
                                                      </ul>
                                                  </div>
                                                  <!--pattern start-->
                                                  <div class="dot-shape-bg position-absolute z--1 left--40 bottom--40">
                                                      <img src="assets/img/shape/dot-big-square.svg" alt="shape">
                                                  </div>
                                                  <!--pattern end-->
                                              @endforeach                                           
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Weenify</h4>
                                                <ul class="nav justify-content-center subscribe-feature-list mt-4">
                                    <li class="nav-item">
                                        <span><i class="far fa-check-circle text-primary me-2"></i>Free 7-day trial</span>
                                    </li>
                                    <li class="nav-item">
                                        <span><i
                                            class="far fa-check-circle text-primary me-2"></i>No credit card required</span>
                                    </li>
                                    <li class="nav-item">
                                        <span><i class="far fa-check-circle text-primary me-2"></i>Support 24/7</span>
                                    </li>
                                </ul>
                                              </div>
                                        </div>
                                    </div><!-- .slider-item -->

                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                    <!-- end right -->
                </div>
                <!-- wrap @e -->
            </div>
    
@endsection
