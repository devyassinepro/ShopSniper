<!-- version 2 -->

  <!--pricing section start-->
  <section class="pricing-section pt-60 pb-120  position-relative z-2" id="pricing">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-heading text-center">
                            <h4 class="h5 text-primary">Pricing</h4>
                            <h2>{{ __('Find the right plan for your business') }}</h2>
                            <!-- <p>Conveniently mesh cooperative services via magnetic outsourcing. Dynamically grow value whereas accurate e-commerce vectors. </p> -->
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-3">
                        <div class="media d-flex align-items-center py-2 p-sm-2">
                            <div class="icon-box mb-0 bg-primary-soft rounded-circle d-block me-3">
                                <i class="fas fa-credit-card text-primary"></i>
                            </div>
                            <div class="media-body fw-medium h6 mb-0">
                                No credit card required
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media d-flex align-items-center py-2 p-sm-2">
                            <div class="icon-box mb-0 bg-success-soft rounded-circle d-block me-3">
                                <i class="fas fa-calendar-check text-success"></i>
                            </div>
                            <div class="media-body fw-medium h6 mb-0">
                                Get 7 day free trial
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media d-flex align-items-center py-2 p-sm-2">
                            <div class="icon-box mb-0 bg-danger-soft rounded-circle d-block me-3">
                                <i class="fas fa-calendar-times text-danger"></i>
                            </div>
                            <div class="media-body fw-medium h6 mb-0">
                                Cancel anytime
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                @foreach ($plans as $index => $plan)

                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative single-pricing-wrap rounded-custom {{$plan->id == 16 ? 'bg-gradient text-white p-5 mb-4 mb-lg-0' : 'bg-white custom-shadow p-5 mb-4 mb-lg-0'}}">
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
                            <a href="{{ route('subscriptions',['plan' => $plan->slug]) }}" class="btn btn-outline-primary mt-2">{{ __('Start Free Trial') }}</a>

                            <!--pattern start-->
                            <div class="dot-shape-bg position-absolute z--1 left--40 bottom--40">
                                <img src="assets/img/shape/dot-big-square.svg" alt="shape">
                            </div>
                            <!--pattern end-->
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </section> <!--pricing section end-->
<!--end pricing section -->