<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <div class="nk-block">

                            <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                 </div>
                            </div>
                                  
                                  <div class="row g-gs">
                                  <div class="col-md-4">
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
                                            <div class="col-md-8">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h6 class="nk-block-title page-title-card">Product Name : {{$products->first()->title}}</h6>
                                                        </div>
                                                        <div class="card-head">
                                                              <div class="limited-text">
                                                                  <p>{!! strip_tags($products->first()->description) !!}</p>
                                                              </div>
                                                              <a href="#" class="read-more">Read More</a>
                                                             </div>
                                                        <div class="nk-ck-sm">
                                                        <a  class="btn btn-primary"  target="_blank" href="{{$products->first()->url}}">View on Shopify</a>
                                                        <a  class="btn btn-primary"   target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($products->first()->title)}}">Search on AliExpress</a>
                                                        <a  class="btn btn-primary"   target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($products->first()->title)}}&search_type=keyword_unordered&media_type=all">Search on Facebook</a>
                                                        <a wire:click="exportToCsv('{{ $products->first()->url }}')" class="btn btn-white btn-dim btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#95bf46}</style><path d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z"/></svg><span>Import product</span></a>                                                     
 
                                                      </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                            </div>
                                                
                                        </div>
                                        <div class="nk-block">
                                    <div class="row g-gs">
                                     
                                        <div class="col-xxl-6">
                                            <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Revenue Overview</h6>
                                                            <p>In 7 days sales of product subscription.</p>
                                                        </div>
                                                      
                                                    </div>
                                                   
                                                    <div class="nk-sales-ck large pt-4">
                                                    <canvas class="line-chart" id="RevenueLineChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->

                                        <div class="col-xxl-6">
                                            <div class="card h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start gx-3 mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Sales Overview</h6>
                                                            <p>In 7 days sales of product subscription.</p>
                                                        </div>
                                                      
                                                    </div>
                                
                                                    <div class="nk-sales-ck large pt-4">
                                                        <canvas class="line-chart" id="SalesLineChart"></canvas>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        
            </div><!-- .col -->
            </div><!-- .col -->


          <!-- ALl Affiche -->

          <div class="col-md-20 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Sales Details
                  </h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Today</th>
                          <th>Yesterday</th>
                          <th>3</th>
                          <th>4</th>
                          <th>5</th>
                          <th>6</th>
                          <th>Weekly</th>
                          <th>Monthly</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="font-weight-bold">
                              <a href="{{ route('account.product.show',$products->first()->id) }}">{{ $products->first()->title }}</a>
                          </td>                          
                          <td>$ {{ $products->first()->prix }}</td>
                             <td>
                              <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->todaysales * $products->first()->prix }}</span>
                              <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->todaysales }}</span>
                            </td>
                          <td>
                          <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->yesterdaysales * $products->first()->prix }}</span>
                          <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->yesterdaysales }}</span>
                          </td>  

                          <td>
                              <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->day3sales * $products->first()->prix }}</span>
                              <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->day3sales }}</span>
                          </td>                          
                        
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->day4sales * $products->first()->prix }}</span>
                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->day4sales }}</span>
                          </td>
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->day5sales * $products->first()->prix }}</span>
                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->day5sales }}</span>
                          </td>  
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->day6sales * $products->first()->prix }}</span>
                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->day6sales }}</span>
                          </td>  
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->weeksales * $products->first()->prix }}</span>
                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->weeksales }}</span>
                          </td>
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->monthysales * $products->first()->prix }}</span>
                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->monthsales }}</span>
                          </td>
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $products->first()->totalsales * $products->first()->prix }}</span>
                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $products->first()->totalsales }}</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

</div>
</div>
</div>    
</div>     

      <script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
      <script src="{{ asset('assets/js/charts/chart-sales.js?ver=3.2.0') }}"></script>

      
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


//   test chart : 

var RevenueLineChart = {
    labels: dates,
    dataUnit: ['$'], // Updated dataUnit values
    lineTension: 0.4,
    legend: true,
    datasets: [{
        label: "Total Revenue ($)", // Removed "$" from the label
        color : "#9d72ff",
        background : NioApp.hexRGB('#9d72ff',.3),
        data: [day7sales_revenue, day6sales_revenue, day5sales_revenue, day4sales_revenue, day3sales_revenue, yesterdaysales_revenue, todaysales_revenue]
    }]
};

var SalesLineChart = {
    labels: dates,
    dataUnit: ['Sales'], // Updated dataUnit values
    lineTension: 0.4,
    legend: true,
    datasets: [{
        label: "Total Sales", // Removed "$" from the label
        color : "#9d72ff",
        background : NioApp.hexRGB('#9d72ff',.3),
        data: [day7sales_count, day6sales_count, day5sales_count, day4sales_count, day3sales_count, yesterdaysales_count, todaysales_count]
    }]
};

  function lineChart(selector, set_data) {
    var $selector = selector ? $(selector) : $('.line-chart');
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
          borderWidth: 4,
          borderColor: _get_data.datasets[i].color,
          pointBorderColor: _get_data.datasets[i].color,
          pointBackgroundColor: '#fff',
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: _get_data.datasets[i].color,
          pointBorderWidth: 2,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 4,
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
              boxWidth: 12,
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
            backgroundColor: '#eff6ff',
            titleFontSize: 16,
            titleFontColor: '#6783b8',
            titleMarginBottom: 6,
            bodyFontColor: '#9eaecf',
            bodyFontSize: 16,
            bodySpacing: 4,
            yPadding: 10,
            xPadding: 10,
            footerMarginTop: 0,
            displayColors: false
          },
          scales: {
            yAxes: [{
              display: true,
              position: NioApp.State.isRTL ? "right" : "left",
              ticks: {
                beginAtZero: false,
                fontSize: 12,
                fontColor: '#9eaecf',
                padding: 10
              },
              gridLines: {
                color: NioApp.hexRGB("#526484", .2),
                tickMarkLength: 0,
                zeroLineColor: NioApp.hexRGB("#526484", .2)
              }
            }],
            xAxes: [{
              display: true,
              ticks: {
                fontSize: 12,
                fontColor: '#9eaecf',
                source: 'auto',
                padding: 5,
                reverse: NioApp.State.isRTL
              },
              gridLines: {
                color: "transparent",
                tickMarkLength: 10,
                zeroLineColor: NioApp.hexRGB("#526484", .2),
                offsetGridLines: true
              }
            }]
          }
        }
      });
    });
  }

  // init line chart
  lineChart();
</script>

<script>
    $(document).ready(function() {
        $(".read-more").on("click", function(e) {
            e.preventDefault();
            $(".limited-text").toggleClass("show");
            $(this).hide();
        });
    });
</script>