@extends('layouts.account_niche')

@section('title', '| Stores')

@section('content')
<div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

        <div><h5>Store Name : {{$storedata->first()->name}}</h5></div>
        <div><h6>{{$storedata->first()->shopifydomain}}</h6></div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a  class="btn btn-success" href="{{ route('account.stores.storeproducts',$storedata->first()->id) }}">All products</a>
              <form action="{{ route('account.stores.destroy',$storedata->first()->id) }}" method="Post">
                      @csrf
                      @method('DELETE')
                      @if (!currentTeam()->onTrial())
                      <button type="submit" class="btn btn-warning">Untrack Store</button>
                      @endif
                  </form>
           </div>

        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        </main>
<!-- Dashboard Affiche Store Data -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-2 px-3">
<!-- For EUR Stores -->
@if($storedata->first()->currency == "EUR" )

<!-- DAshboard  -->
<div class="row grid-margin">
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
          </div>

      <!-- ENd Dashboard  -->

      <!-- <canvas id="product-sales-chart"  height="50px"></canvas> -->
      <canvas id="sales-chartaffiche"  height="100px"></canvas>
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
     </main>
     @endif
@if($storedata->first()->currency != "EUR" )

<!-- DAshboard  -->
<div class="row grid-margin">
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
          </div>

      <!-- ENd Dashboard  -->

      <!-- <canvas id="product-sales-chart"  height="50px"></canvas> -->
      <canvas id="sales-chartaffiche"  height="100px"></canvas>
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
     </main>
     @endif
        </div>

      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    var lineChartCanvas = document.getElementById('sales-chartaffiche').getContext('2d');
      var data = {
         labels: dates,
        datasets: [
          {
            label: 'Revenue',
            data: [day7sales_revenue,day6sales_revenue,day5sales_revenue,day4sales_revenue,day3sales_revenue,yesterdaysales_revenue,todaysales_revenue],
            borderColor: [
              '#392c70'
            ],
            borderWidth: 3,
            fill: false
          },
          {
            label: 'Sales',
            data: [day7sales_count,day6sales_count,day5sales_count,day4sales_count,day3sales_count,yesterdaysales_count,todaysales_count],
            borderColor: [
              '#d1cede'
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

    @endsection
