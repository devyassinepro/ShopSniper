@extends('layouts.account_niche')

@section('title', '| Stores')

@section('content')

<script>
fpr("referral",{email:"{{ Auth::user()->email }}"})
</script>

<div class="nk-content" >
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">

                            @if(!currentTeam()->subscribed())
                    <div class="alert alert-warning" role="alert">
                    Welcome to Weenify. Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                    </div>
                    @endif
                    <div></div>   <br> <br>

                              
                <!-- DAshboard  -->
                <!-- <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                       <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-shopping-bag"></i>
                           {{ __('Total Stores') }}
                        </p>
                        <h2 class="revenue">{{ $totalstores }} / {{ $storelimit }}</h2>
                        <label class="badge badge-outline-success badge-pill">100% increase</label>
                      </div>
                      
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-database"></i>
                          {{ __('Total Products') }}
                        </p>
                        <h2 class="revenue">{{ $totalproducts }}</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>
                      
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          {{ __('Total Sales') }}
                        </p>
                        <h2 class="revenue">{{ $totalsales }}</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-shopping-cart"></i>
                          {{ __('Total Revenue') }}
                        </p>
                        <h2 class="revenue">$ {{number_format($totalRevenue, 2, ',', ' ')}}</h2>
                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          </div> -->
       
          <div class="nk-block">
                 <div class="row g-gs">
                       <div class="col-xxl-6">
                                            <div class="row g-gs">
                                                <div class="col-lg-6 col-xxl-12">
                                                    <div class="row g-gs">
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title"> {{ __('Total Stores') }}</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total active Stores"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{ $totalstores }} / {{ $storelimit }}</span>
                                                                            <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title"> {{ __('Total Products') }}</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Products"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{ $totalproducts }}</span>
                                                                            <span class="sub-title"><span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>2.45%</span>since last week</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="totalSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->
                                                    </div><!-- .row -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-6">
                                            <div class="row g-gs">
                                                <div class="col-lg-6 col-xxl-12">
                                                    <div class="row g-gs">
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">{{ __('Total Sales') }}</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Sales"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{ $totalsales }}</span>
                                                                            <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title"> {{ __('Total Revenue') }}</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Revenue"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">$ {{number_format($totalRevenue, 2, ',', ' ')}}</span>
                                                                            <span class="sub-title"><span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>2.45%</span>since last week</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="totalSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->
                                                    </div><!-- .row -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div><!-- .col -->

                                        </div>
                                        </div>
      <!-- ENd Dashboard  -->

<!-- Table >Top Products  -->
 <!-- Affiche //// -->


 <div class="row">
 @if (currentTeam()->subscribed('default'))
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Top 5 Products (Sales)
                  </h4>
                 
                  <div class="table-responsive">
                  <table class="table table-fixed">
                      <thead>
                        <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Today Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                        <tr>
                        <td>
                              <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                          </td>
                          <td>
                              <a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a>
                          </td>
                          <td>${{ $product->prix }}</td>
                          <td>
                        <h5><label class="badgepro badge-success badge-pill">${{ number_format($product->todaysales * $product->prix, 2, ',', ' ') }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->todaysales }}</label>
                        </h5></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


                </div>
              </div>
            </div>
            @endif
            </div>
                </div>
            </div>    
          </div>     

@endsection
@push('styles')
    <style>
        .icon{
            font-size:26px;
            color:slategrey;
        }
        .u-doughnut--70 {
            width: 40px;
            height: 50px;
        }
    </style>
@endpush

@push('scripts')
   {{-- <!-- Charting library -->
   <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
   <!-- Chartisan -->
   <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
@endpush
