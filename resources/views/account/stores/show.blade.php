@extends('layouts.account_niche')

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
                          <label class="badgepro badge-success badge-pill">{{ $product->todaysales_count * $product->prix }}€</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->todaysales_count }}</label>
                          </td>
                          <td>
                          <label class="badge badge-success badge-pill">{{ $product->yesterdaysales_count * $product->prix }}€</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->yesterdaysales_count }}</label>
                          </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">{{ $product->totalsales * $product->prix }}€</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->totalsales }}</label>
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
                                      <label class="badgepro badge-success badge-pill">${{ $product->todaysales * $product->prix }}</label>
                                        <label class="badgepro badge-info badge-pill">{{ $product->todaysales }}</label>
                                      </td>
                                      <td>
                                      <label class="badge badge-success badge-pill">${{ $product->yesterdaysales * $product->prix }}</label>
                                        <label class="badgepro badge-info badge-pill">{{ $product->yesterdaysales }}</label>
                                      </td>
                                      <td>
                                      <label class="badgepro badge-success badge-pill">${{ $product->totalsales * $product->prix }}</label>
                                        <label class="badgepro badge-info badge-pill">{{ $product->totalsales }}</label>
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
