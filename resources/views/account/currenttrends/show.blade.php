@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')  
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <div class="nk-block">
                                  
                                  <div class="row g-gs">
                                            
                                            <div class="col-md-5">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-inner">
                 
                                                        <div id="carouselExConInd" class="carousel slide" data-bs-ride="carousel">
                                                                  <ol class="carousel-indicators">
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="0" class="active"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="1"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="2"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="3"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="4"></li>
                                                                      <li data-bs-target="#carouselExConInd" data-bs-slide-to="5"></li>

                                                                  </ol>
                                                                  <div class="carousel-inner">
                                                                      <div class="carousel-item active">
                                                                          <img src="{{ $products->first()->imageproduct }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image2 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image3 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image4 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      <div class="carousel-item">
                                                                          <img src="{{ $products->first()->image5 }}" class="d-block w-80" alt="carousel">
                                                                      </div>
                                                                      
                                                                  </div>
                                                                  <a class="carousel-control-prev" href="#carouselExConInd" role="button" data-bs-slide="prev">
                                                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                      <span class="visually-hidden">Previous</span>
                                                                  </a>
                                                                  <a class="carousel-control-next" href="#carouselExConInd" role="button" data-bs-slide="next">
                                                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                      <span class="visually-hidden">Next</span>
                                                                  </a>
                                                              </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                            </div>
                                            <!-- screen2 -->
                                            <div class="col-md-7">
                                                <div class="card card-bordered card-preview">
                                                      <div class="card-inner">
                                                            <div class="card-head">
                                                                <h4 class="title">{{$products->first()->title}}</h4>
                                                            </div>
                                                            
                                                            
                                                            <div class="card-head">
                                                              <div class="limited-text">
                                                                  <p>{!! strip_tags($products->first()->description) !!}</p>
                                                              </div>
                                                              <a href="#" class="read-more">Read More</a>
                                                          </div>


                                            <div class="card-inner pt-0">
                                                <div class="rounded px-2 py-4 bg-primary">
                                                    
                                                    <div class="d-flex">
                                                        <div class="w-50 px-4">
                                                            <div class="fs-14px text-white text-opacity-75">Product Cost</div>
                                                            <span class="fs-2 lh-1 mb-1 text-white">${{$products->first()->price_aliexpress}}</span>
                                                        </div>
                                                        <div class="border-start opacity-50"></div>
                                                        <div class="w-50 px-4">
                                                            <div class="fs-14px text-white text-opacity-75">Selling Price</div>
                                                            <span class="fs-2 lh-1 mb-1 text-white">${{$products->first()->prix}}</span>
                                                        </div>
                                                        <div class="border-start opacity-50"></div>
                                                        <div class="w-50 px-4">
                                                            <div class="fs-14px text-white text-opacity-75">Profit per Sale</div>
                                                            <span class="fs-2 lh-1 mb-1 text-white">${{$products->first()->prix - $products->first()->price_aliexpress}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <!-- button part  -->
                                                         <div class="nk-ck-sm">

                                                               <ul class="">
                                                                    <li>
                                                                          <a  class="btn btn-primary"  target="_blank" href="{{$products->first()->url}}"><em class="icon ni ni-eye-fill"></em>Go to Shopify</a>
                                                                          <a  class="btn btn-primary"   target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($products->first()->title)}}"><em class="icon ni ni-eye-fill"></em>Go to AliExpress</a>
                                                                    </li>
                                                                     <br>
                                                                    <li>
                                                                          <a  class="btn btn-primary"   target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($products->first()->title)}}&search_type=keyword_unordered&media_type=all"><em class="icon ni ni-facebook-circle"></em>Go to FB Ads</a>
                                                                          <a href="{{ route('account.product.importproduct',$products->first()->id) }}" class="btn btn-primary"><em class="icon ni ni-download-cloud"></em><span>Import product</span></a></li>
                                                                    </li>
                                                                  
                                                                </ul>
                                                   
                                              <!-- <li><a href="#" class="btn btn-success eg-swal-success">Success</a></li> -->
                                             
                                        </div><!-- .card -->
                                                              
                                                              
                                                              </div>
                                                      </div>
                                                </div><!-- .card-preview -->
                                                                 
                                        </div>

          <!-- ALl Affiche -->

          <div class="col-md-20 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Sales Tracking
                    <div class="nk-tb-col tb-col-md">
                                        <form method="POST" action="{{ route('account.stores.trackstore', $products->first()->stores->id) }}">
                                        @csrf
                                        <!-- Your form content here -->
                                        <button type="submit" class="btn btn-white btn-dim btn-outline-primary">
                                            <em class="icon ni ni-crosshair"></em>
                                            <span>Track product</span>
                                        </button>
                                            </form>                                         
                                      </div> 
                  </h4>
                                 <img src="{{ asset('assets/images/trackingsales.png') }}" width="1500" height= "300">
                </div>
              </div>
            </div>


          </div>

          </div>
                </div>
            </div>    
          </div>     

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="{{ asset('assets/js/example-chart.js?ver=3.2.0') }}"></script> -->
<script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/charts/chart-sales.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/example-sweetalert.js?ver=3.2.0') }}"></script>


<style>
.limited-text {
    max-height: 70px;
    overflow: hidden;
}

.read-more {
    display: none;
    color: #007BFF;
    cursor: pointer;
}

.read-more.show {
    display: block;
}

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".read-more").on("click", function(e) {
            e.preventDefault();
            $(".limited-text").toggleClass("show");
            $(this).hide();
        });
    });
</script>

<!-- storesrevenue Chart -->
<script>
              var todaysales_count =  {!! json_encode($products->first()->todaysales)!!};
              var yesterdaysales_count =   {!! json_encode($products->first()->yesterdaysales)!!};
              var day3sales_count =  {!! json_encode($products->first()->day3sales)!!};
              var day4sales_count =   {!! json_encode($products->first()->day4sales)!!};
              var day5sales_count =   {!! json_encode($products->first()->day5sales)!!};
              var day6sales_count =  {!! json_encode($products->first()->day6sales)!!};
              var day7sales_count =   {!! json_encode($products->first()->day7sales)!!};

              var todaysales_revenue =  {!! json_encode($products->first()->todaysales * $products->first()->prix )!!};
              var yesterdaysales_revenue =  {!! json_encode($products->first()->yesterdaysales * $products->first()->prix )!!};
              var day3sales_revenue =  {!! json_encode($products->first()->day3sales * $products->first()->prix )!!};
              var day4sales_revenue =   {!! json_encode($products->first()->day4sales * $products->first()->prix )!!};
              var day5sales_revenue =  {!! json_encode($products->first()->day5sales * $products->first()->prix)!!};
              var day6sales_revenue =   {!! json_encode($products->first()->day6sales * $products->first()->prix)!!};
              var day7sales_revenue =  {!! json_encode($products->first()->day7sales * $products->first()->prix)!!};
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

              var todaysales_count =  {!! json_encode($products->first()->todaysales)!!};
              var yesterdaysales_count =   {!! json_encode($products->first()->yesterdaysales)!!};
              var day3sales_count =  {!! json_encode($products->first()->day3sales)!!};
              var day4sales_count =   {!! json_encode($products->first()->day4sales)!!};
              var day5sales_count =   {!! json_encode($products->first()->day5sales)!!};
              var day6sales_count =  {!! json_encode($products->first()->day6sales)!!};
              var day7sales_count =   {!! json_encode($products->first()->day7sales)!!};

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
                  return '' + value;
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

    var todaysales_count =  {!! json_encode($products->first()->todaysales)!!};
    var yesterdaysales_count =   {!! json_encode($products->first()->yesterdaysales)!!};
    var day3sales_count =  {!! json_encode($products->first()->day3sales)!!};
    var day4sales_count =   {!! json_encode($products->first()->day4sales)!!};
    var day5sales_count =   {!! json_encode($products->first()->day5sales)!!};
    var day6sales_count =  {!! json_encode($products->first()->day6sales)!!};
    var day7sales_count =   {!! json_encode($products->first()->day7sales)!!};

    var todaysales_revenue =  {!! json_encode($products->first()->todaysales * $products->first()->prix )!!};
    var yesterdaysales_revenue =  {!! json_encode($products->first()->yesterdaysales * $products->first()->prix )!!};
    var day3sales_revenue =  {!! json_encode($products->first()->day3sales * $products->first()->prix )!!};
    var day4sales_revenue =   {!! json_encode($products->first()->day4sales * $products->first()->prix )!!};
    var day5sales_revenue =  {!! json_encode($products->first()->day5sales * $products->first()->prix)!!};
    var day6sales_revenue =   {!! json_encode($products->first()->day6sales * $products->first()->prix)!!};
    var day7sales_revenue =  {!! json_encode($products->first()->day7sales * $products->first()->prix)!!};
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
              // data: [day7sales_count,day6sales_count,day5sales_count,day4sales_count,day3sales_count,yesterdaysales_count,todaysales_count],

  // init chart
  NioApp.coms.docReady.push(function () {
    lineSalesOverview();
  });
</script>

    @endsection