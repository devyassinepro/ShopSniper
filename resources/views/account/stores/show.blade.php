@extends('layouts.account')

@section('title', '| Stores')

@section('content')

<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                              
                                      @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    

                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner">
                                        <!-- <h5 class="card-title">Web Store Setting</h5> -->
                                            <!-- <p>Here is your basic store setting of your website.</p> -->
                                            <h5>Store : {{$storedata->first()->name}}</h5>
                                              <h6>{{$storedata->first()->shopifydomain}}</h6>
                                            <form action="#" class="gy-3 form-settings">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                        <!-- <h5>Store : {{$storedata->first()->name}}</h5>
                                              <h6>{{$storedata->first()->shopifydomain}}</h6> -->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                            <a  class="btn btn-primary" href="{{ route('account.stores.storeproducts',$storedata->first()->id) }}">All products</a>
                                                            <a href="{{ route('account.stores.importstore',$storedata->first()->id) }}" class="btn btn-white btn-dim btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#95bf46}</style><path d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z"/></svg><span> Import Store</span></a></li>
                                                            <!-- <a href="#" class="btn btn-primary">Primary</a> -->
                                                              <form action="{{ route('account.stores.destroy',$storedata->first()->id) }}" method="Post">
                                                                      @csrf
                                                                      @method('DELETE')
                                                                      @if (!currentTeam()->onTrial())
                                                                      <button type="submit" class="btn btn-warning">Untrack Store</button>
                                                                      @endif
                                                                  </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                  </div>
                                  </div>
                                  </div>

                                  
                                                                    
      @if($storedata->first()->currency == "EUR" )
<div class="nk-block">
<!-- DAshboard  -->
<!-- <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Revenue
                        </p>
                        <h2 class="revenue"> {{ number_format($storedata->first()->revenue, 2, ',', ' ') }} €</h2>

                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Sales
                        </p>
                        <h2 class="sales">{{$storedata->first()->sales}}</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      @if($storedata->first()->revenue != 0 )
                  <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          AOV
                        </p>
                         <h2 class="revenue"> {{number_format($storedata->first()->revenue / $storedata->first()->sales, 2, ',', ' ')}} €</h2>
                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                      </div>
                      @endif
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          <a href="{{ route('account.stores.storeproducts',$storedata->first()->id) }}">Products</a>
                        </p>
                        <h2 class="revenue">{{$storedata->first()->allproducts}}</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
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
                                                                            <h6 class="title"> Revenue</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total active Stores"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount"> {{ number_format($storedata->first()->revenue, 2, ',', ' ') }} €</span>
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
                                                                            <h6 class="title">Sales</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Products"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{$storedata->first()->sales}}</span>
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
                                                    @if($storedata->first()->revenue != 0 )
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">AOV</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Sales"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{number_format($storedata->first()->revenue / $storedata->first()->sales, 2, ',', ' ')}} €</span>
                                                                            <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->

                                                        @endif
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">Products</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Revenue"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{$storedata->first()->allproducts}}</span>
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

      <!-- <canvas id="product-sales-chart"  height="50px"></canvas> -->
     
      <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Revenue Chart ($)</h6>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sales-ck large pt-4">
                                                        <canvas class="sales-overview-chart" id="revenueOvervieweenify"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                            </div>
                                            <div class="col-md-6">
                                            <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Sales Overview</h6>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sales-ck large pt-4">
                                                        <canvas class="sales-overview-chart" id="salesOvervieweenify"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                            </div>
                                          
                                           
                                        </div>
                                           
                                        </div>
                                        </div>

</br></br>
<!-- Table >Top Products  -->
 <!-- Affiche //// -->
 <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Top 10 Products
                  </h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Today</th>
                          <th>Yesterday</th>
                          <th>Total</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($products as $product)
                        <tr>
                          <td class="font-weight-bold">
                              <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="200" height="200"></a>
                          </td>
                          <td class="font-weight-bold">
                              <a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a>
                          </td>
                          <td>{{ $product->prix }} €</td>
                          <td>
                              <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales_count * $product->prix }}€</span>
                              <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales_count }}</span>          
                          </td>
                          <td>
                                <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales_count * $product->prix }}€</span>
                                <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales_count }}</span>          
                          
                          </td>
                          <td>
                              <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales * $product->prix }}€</span>
                              <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales }}</span>          
                          </td>

                          <td><a  class="btn btn-success" href="{{ route('account.product.show',$product->id) }}" >View </a></td>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

     @endif
@if($storedata->first()->currency != "EUR" )

<!-- DAshboard  -->
<!-- <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">

                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Revenue
                        </p>
                        <h2 class="revenue">${{ number_format($storedata->first()->revenue, 2, ',', ' ') }}</h2>

                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Sales
                        </p>
                        <h2 class="revenue">{{$storedata->first()->sales}}</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      @if($storedata->first()->revenue != 0 )
                  <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          AOV
                        </p>
                         <h2 class="revenue">$ {{number_format($storedata->first()->revenue / $storedata->first()->sales, 2, ',', ' ')}}</h2>
                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                      </div>
                      @endif
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          <a href="{{ route('account.stores.storeproducts',$storedata->first()->id) }}">Products</a>
                        </p>
                        <h2 class="revenue">{{$storedata->first()->allproducts}}</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
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
                                                                            <h6 class="title"> Revenue</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total active Stores"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">${{ number_format($storedata->first()->revenue, 2, ',', ' ') }}</span>
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
                                                                            <h6 class="title">Sales</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Products"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{$storedata->first()->sales}}</span>
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
                                                    @if($storedata->first()->revenue != 0 )
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">AOV</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Sales"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">$ {{number_format($storedata->first()->revenue / $storedata->first()->sales, 2, ',', ' ')}}</span>
                                                                            <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                                                        </div>
                                                                        <div class="nk-sales-ck">
                                                                            <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card -->
                                                        </div><!-- .col -->

                                                        @endif
                                                        <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                            <div class="card">
                                                                <div class="card-inner">
                                                                    <div class="card-title-group align-start mb-2">
                                                                        <div class="card-title">
                                                                            <h6 class="title">Products</h6>
                                                                        </div>
                                                                        <div class="card-tools">
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Revenue"></em>
                                                                        </div>
                                                                    </div>
                                                                    <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                                        <div class="nk-sale-data">
                                                                            <span class="amount">{{$storedata->first()->allproducts}}</span>
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

                              <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Revenue Chart ($)</h6>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sales-ck large pt-4">
                                                        <canvas class="sales-overview-chart" id="revenueOvervieweenify"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                            </div>
                                            <div class="col-md-6">
                                            <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Sales Overview</h6>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sales-ck large pt-4">
                                                        <canvas class="sales-overview-chart" id="salesOvervieweenify"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                            </div>
                                          
                                           
                                        </div>
  <div></div>
                                <div class="col-xxl-6">
                                          
                                        </div><!-- .col -->

                                        
            <!-- Table >Top Products  -->
            <!-- Affiche //// -->
               <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">
                                <i class="fas fa-table"></i>
                                Top 10 Products
                              </h4>
                       
                            <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                          
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Today</th>
                                            <th scope="col">Yesterday</th>
                                            <th scope="col">Total</th>
                                            <th scope="col"></th>
                                          
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                    <tr>
                                      <td class="font-weight-bold">
                                          <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="200" height="200"></a>
                                      </td>
                                      <td class="font-weight-bold">
                                          <a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a>
                                      </td>
                                      <td>$ {{ $product->prix }}</td>
                                      <td>
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">$ {{ $product->todaysales * $product->prix }}</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales }}</span>          
                                      </td>
                                      <td>
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->yesterdaysales * $product->prix }}</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales }}</span>          
                                    
                                      </td>
                                      <td>
                                        <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->totalsales * $product->prix }}</span>
                                        <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales }}</span>          
                                    
                                      </td>
                                      <td><a  class="btn btn-success" href="{{ route('account.product.show',$product->id) }}" >View </a></td>
                          </td>
                                    </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
                                    </div>



                            </div>
                          </div>
                        </div>
                      </div>

                @endif
                             
              </div>

              

                    </div>
                </div>
            </div>    
          </div>     

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/example-chart.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/charts/chart-sales.js?ver=3.2.0') }}"></script>



<!-- storesrevenue Chart -->
<script>
              var todaysales_count =  {!! json_encode($storedata->first()->todaysales)!!};
              var yesterdaysales_count =   {!! json_encode($storedata->first()->yesterdaysales)!!};
              var day3sales_count =  {!! json_encode($storedata->first()->day3sales)!!};
              var day4sales_count =   {!! json_encode($storedata->first()->day4sales)!!};
              var day5sales_count =   {!! json_encode($storedata->first()->day5sales)!!};
              var day6sales_count =  {!! json_encode($storedata->first()->day6sales)!!};
              var day7sales_count =   {!! json_encode($storedata->first()->day7sales)!!};

              var todaysales_revenue =  {!! json_encode($storedata->first()->todaysales * $products->first()->prix )!!};
              var yesterdaysales_revenue =  {!! json_encode($storedata->first()->yesterdaysales * $products->first()->prix )!!};
              var day3sales_revenue =  {!! json_encode($storedata->first()->day3sales * $products->first()->prix )!!};
              var day4sales_revenue =   {!! json_encode($storedata->first()->day4sales * $products->first()->prix )!!};
              var day5sales_revenue =  {!! json_encode($storedata->first()->day5sales * $products->first()->prix)!!};
              var day6sales_revenue =   {!! json_encode($storedata->first()->day6sales * $products->first()->prix)!!};
              var day7sales_revenue =  {!! json_encode($storedata->first()->day7sales * $products->first()->prix)!!};
            var dates =   {!! json_encode($dates)!!};
    var lineChartCanvas = document.getElementById('revenue-chartaffiche').getContext('2d');
      var data = {
         labels: dates,
        datasets: [
          {
            label: 'Revenue',
            data: [day7sales_revenue,day6sales_revenue,day5sales_revenue,day4sales_revenue,day3sales_revenue,yesterdaysales_revenue,todaysales_revenue],
            borderColor: [
              '#6465f1'
            ],
            borderWidth: 3,
            fill: false
          }
        ]
      };
      var options = {
        scales: {
          yAxes: [{
            gridLines: {
              drawBorder: false
            },
            ticks: {
              stepSize: 2000,
              fontColor: "#686868"
            }
          }],
          xAxes: [{
            display: false,
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 3
          }
        },
        stepsize: 1
      };
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: data,
        options: options
      });


</script>

<script>

              var todaysales_count =  {!! json_encode($storedata->first()->todaysales)!!};
              var yesterdaysales_count =   {!! json_encode($storedata->first()->yesterdaysales)!!};
              var day3sales_count =  {!! json_encode($storedata->first()->day3sales)!!};
              var day4sales_count =   {!! json_encode($storedata->first()->day4sales)!!};
              var day5sales_count =   {!! json_encode($storedata->first()->day5sales)!!};
              var day6sales_count =  {!! json_encode($storedata->first()->day6sales)!!};
              var day7sales_count =   {!! json_encode($storedata->first()->day7sales)!!};

    var salesOvervieweenify = {
      labels: dates,
    dataUnit: 'Sales',
    lineTension: 0.1,
    datasets: [{
      label: "Sales Overview",
      color: "#9d72ff",
      background: NioApp.hexRGB('#9d72ff', .3),
      data: [day7sales_count,day6sales_count,day5sales_count,day4sales_count,day3sales_count,yesterdaysales_count,todaysales_count],

    }]
  };
  function lineSalesOverview(selector, set_data) {
    var $selector = selector ? $(selector) : $('.sales-overview-chart');
    $selector.each(function () {
      var $self = $(this),
        _self_id = $self.attr('id'),
        _get_data = typeof set_data === 'undefined' ? eval(_self_id) : set_data;
      var selectCanvas = document.getElementById(_self_id).getContext("2d");
      var chart_data = [];
      for (var i = 0; i < _get_data.datasets.length; i++) {
        chart_data.push({
          label: _get_data.datasets[i].label,
          tension: _get_data.lineTension,
          backgroundColor: _get_data.datasets[i].background,
          borderWidth: 2,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: "transparent",
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 3,
          pointHoverBorderWidth: 2,
          pointRadius: 3,
          pointHitRadius: 3,
          data: _get_data.datasets[i].data
        });
      }
      var chart = new Chart(selectCanvas, {
        type: 'line',
        data: {
          labels: _get_data.labels,
          datasets: chart_data
        },
        options: {
          legend: {
            display: _get_data.legend ? _get_data.legend : false,
            rtl: NioApp.State.isRTL,
            labels: {
              boxWidth: 30,
              padding: 20,
              fontColor: '#6783b8'
            }
          },
          maintainAspectRatio: false,
          tooltips: {
            enabled: true,
            rtl: NioApp.State.isRTL,
            callbacks: {
              title: function title(tooltipItem, data) {
                return data['labels'][tooltipItem[0]['index']];
              },
              label: function label(tooltipItem, data) {
                return data.datasets[tooltipItem.datasetIndex]['data'][tooltipItem['index']] + ' ' + _get_data.dataUnit;
              }
            },
            backgroundColor: '#1c2b46',
            titleFontSize: 13,
            titleFontColor: '#fff',
            titleMarginBottom: 6,
            bodyFontColor: '#fff',
            bodyFontSize: 12,
            bodySpacing: 4,
            yPadding: 10,
            xPadding: 10,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: true,
              stacked: _get_data.stacked ? _get_data.stacked : false,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                beginAtZero: true,
                fontSize: 11,
                fontColor: '#9eaecf',
                padding: 10,
                callback: function callback(value, index, values) {
                  return ' ' + value;
                },
                min: 0,
                stepSize: 3000
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: true,
              stacked: _get_data.stacked ? _get_data.stacked : false,
              ticks: {
                fontSize: 9,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 10,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 0,
                zeroLineColor: 'transparent'
              }
            }]
          }
        }
      });
    });
  }

  // init chart
  NioApp.coms.docReady.push(function () {
    lineSalesOverview();
  });
</script>

<script>

              var todaysales_count =  {!! json_encode($storedata->first()->todaysales)!!};
              var yesterdaysales_count =   {!! json_encode($storedata->first()->yesterdaysales)!!};
              var day3sales_count =  {!! json_encode($storedata->first()->day3sales)!!};
              var day4sales_count =   {!! json_encode($storedata->first()->day4sales)!!};
              var day5sales_count =   {!! json_encode($storedata->first()->day5sales)!!};
              var day6sales_count =  {!! json_encode($storedata->first()->day6sales)!!};
              var day7sales_count =   {!! json_encode($storedata->first()->day7sales)!!};

              var todaysales_revenue =  {!! json_encode($storedata->first()->todaysales * $products->first()->prix )!!};
              var yesterdaysales_revenue =  {!! json_encode($storedata->first()->yesterdaysales * $products->first()->prix )!!};
              var day3sales_revenue =  {!! json_encode($storedata->first()->day3sales * $products->first()->prix )!!};
              var day4sales_revenue =   {!! json_encode($storedata->first()->day4sales * $products->first()->prix )!!};
              var day5sales_revenue =  {!! json_encode($storedata->first()->day5sales * $products->first()->prix)!!};
              var day6sales_revenue =   {!! json_encode($storedata->first()->day6sales * $products->first()->prix)!!};
              var day7sales_revenue =  {!! json_encode($storedata->first()->day7sales * $products->first()->prix)!!};
            var dates =   {!! json_encode($dates)!!};

    var revenueOvervieweenify = {
      labels: dates,
    dataUnit: '$',
    lineTension: 0.1,
    datasets: [{
      label: "Revenue Overview",
      color: "#9d72ff",
      background: NioApp.hexRGB('#9d72ff', .3),
      data: [day7sales_revenue,day6sales_revenue,day5sales_revenue,day4sales_revenue,day3sales_revenue,yesterdaysales_revenue,todaysales_revenue],


    }]
  };
  // init chart
  NioApp.coms.docReady.push(function () {
    lineSalesOverview();
  });
</script>


    @endsection
