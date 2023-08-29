<x-account-layout>
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
            
</x-account-layout>
