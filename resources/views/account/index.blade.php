@extends('layouts.account_niche')

@section('title', '| Stores')

@section('content')

<script>
fpr("referral",{email:"{{ Auth::user()->email }}"})
</script>

<div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
<br>
                    <div class="nk-block">
                        @if(!currentTeam()->subscribed())                  
                        <div class="alert alert-icon alert-warning" role="alert">
                            <em class="icon ni ni-alert-circle"></em> 
                            <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                        </div>
                        @endif

                    </div>                              
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
       
              <!-- ENd Dashboard  -->
                            <!-- <div class="nk-block-head nk-page-head nk-block-head-sm">
                                <div class="nk-block-head-between">
                                    <div class="nk-block-head-content">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                        <h3 class="nk-block-title page-title">Welcome Back    {{ Auth::user()->name }}!</h3>
                                    </div>
                                </div>
                            </div>.nk-page-head -->

                            <div class="alert alert-pro alert-primary">

                                    <div class="user-toggle">
                                            <div class="user-avatar lg">
                                            <img alt="Image placeholder" src="{{ Auth::user()->profile_photo_url }}">
                                          </div>
                                    
                                    <div class="user-info">
                                    <h3>Welcome Back, {{ Auth::user()->name }}!</h3>
                                        <h6>Here’s an overview of your account </h6>
                                    </div>
                             </div>
                             </div>

                                <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Stores</div>
                                                    <a href="/account/stores" class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">{{ $totalstores }} <small class="fs-3">Stores</small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">{{ $totalstores }}/ {{ $storelimit }}</span> Total Stores</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Products</div>
                                                    <a href="/account/product" class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">{{ $totalproducts }} <small class="fs-3">Products</small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">{{ $totalproducts }}</span> Tracked Product</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Sales</div>
                                                    <a href="/account/product" class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">{{number_format($totalsales)}} <small class="fs-3">Sales</small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">{{number_format($totalsales)}}</span> Tracked Sales</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Revenue</div>
                                                    <a href="/account/product" class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">$ {{number_format($totalRevenue, 0, ',', ' ')}}<small class="fs-3"></small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">$ {{number_format($totalRevenue, 2, ',', ' ')}}</span> Tracked Revenue</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->

                            <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title page-title">Browse our tools</h4>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-6">
                                            <div class="nk-download">
                                                <div class="data">
                                                    <div class="thumb"><img src="./images/icons/product-pp.svg" alt=""></div>
                                                    <div class="info">
                                                        <h6 class="title"><span class="name">Sales tracking</span></h6>
                                                        <div class="meta">
                                                            <span class="version">
                                                                <span class="text-soft">Version: </span> <span>1.3.1</span>
                                                            </span>
                                                            <span class="release">
                                                                <span class="text-soft">Status: </span> <span>Active</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <a href="/account/stores" class="btn btn-primary">Sales tracking</a>
                                                </div>
                                            </div><!-- .sp-pdl-item -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-6">
                                            <div class="nk-download">
                                                <div class="data">
                                                    <div class="thumb"><img src="./images/icons/product-ee.svg" alt=""></div>
                                                    <div class="info">
                                                        <h6 class="title"><span class="name">Current Trends (New)</span><span class="badge badge-dim bg-primary rounded-pill">New</span></h6>
                                                        <div class="meta">
                                                            <span class="version">
                                                                <span class="text-soft">Version: </span> <span>1.3.1</span>
                                                            </span>
                                                            <span class="release">
                                                                <span class="text-soft">Status: </span> <span>Active</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <a href="{{ route('account.trends.index') }}" class="btn btn-primary">Current Trends</a>
                                                </div>
                                            </div><!-- .sp-pdl-item -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-6">
                                            <div class="nk-download">
                                                <div class="data">
                                                    <div class="thumb"><img src="./images/icons/product-cc.svg" alt=""></div>
                                                    <div class="info">
                                                        <h6 class="title"><span class="name">Competitors Research</span> <span class="badge badge-dim bg-primary rounded-pill">New</span></h6>
                                                        <div class="meta">
                                                            <span class="version">
                                                                <span class="text-soft">Version: </span> <span>1.7.2</span>
                                                            </span>
                                                            <span class="release">
                                                                <span class="text-soft">Status: </span> <span>Active</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <a href="/account/researchproduct" class="btn btn-primary">Competitors Research</a>
                                                </div>
                                            </div><!-- .sp-pdl-item -->
                                        </div><!-- .col -->

                                        </div>
                                    </div>
                                    <div class="nk-block">
                                    <div class="row g-gs">

                                    <div class="col-xxl-4 col-md-8 col-lg-6">
                                            <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-2">
                                                        <div class="card-title">
                                                            <h6 class="title">Top products Today</h6>
                                                        </div>       
                                                    </div>
                                                    <ul class="nk-top-products">
                                                    @foreach ($products as $product)
                                                        <li class="item">
                                                            <div class="thumb">
                                                                <img src="{{ $product->imageproduct }}" alt="">
                                                            </div>
                                                            <div class="info">
                                                                <div class="title"><a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a></div>
                                                                <div class="price">${{ $product->prix }}</div>
                                                            </div>
                                                            <div class="total">
                                                                <div class="amount">${{ number_format($product->todaysales * $product->prix, 2, ',', ' ') }}</div>
                                                                <div class="count">{{ $product->todaysales }} Sold</div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    </ul>
                                                </div><!-- .card-inner -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-8">
                                            <div class="card card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Limited Time Offer</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="nk-tb-list mt-n2">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span></span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span></span></div>
                                                        <div class="nk-tb-col tb-col-md"><span></span></div>
                                                        <div class="nk-tb-col"><span></span></div>
                                                        <div class="nk-tb-col"><span class="d-none d-sm-inline"></span></div>
                                                    </div>
                                                    <!-- offer 1 -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                                <div class="thumb">
                                                                         <img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="40" height="40" alt="">
                                                                </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-name">
                                                                    <span class="tb-lead">Launch Your Store on Shopify for Only $1</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub"> </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <a href="https://shopify.pxf.io/MmW3NY"  target="_blank" class="btn btn-primary">Claim Offer</a>
                                                        </div>
                                                    </div>
                                                    <!-- offer 2 -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                                <div class="thumb">
                                                                         <img src="https://static-00.iconduck.com/assets.00/tiktok-icon-1890x2048-ihin0vop.png" width="40" height="40" alt="">
                                                                </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-name">
                                                                    <span class="tb-lead">TikTok Ads Limit offer: Spend $1.5K, Get $1.5K.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="tb-sub"> </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"> </span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <a href="https://getstarted.tiktok.com/smbcoupon2023?lang=en_US"  target="_blank" class="btn btn-primary">Claim Offer</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div>

                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Table >Top Products  -->
        <!-- Affiche //// -->

 <!-- @if (currentTeam()->subscribed('default'))

        <div class="row">
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
                        <td class="w-25">
                              <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                          </td>
                          <td>
                              <a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a>
                          </td>
                          <td>${{ $product->prix }}</td>
                          <td>
                        <h5><label class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ number_format($product->todaysales * $product->prix, 2, ',', ' ') }}</label>
                            <label class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales }}</label>
                        </h5></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>


                </div>
              </div>
              </div>  row -->
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
 <!-- Charting library -->
   <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
   <!-- Chartisan -->
   <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
@endpush
