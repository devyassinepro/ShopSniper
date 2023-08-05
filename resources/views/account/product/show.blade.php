@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')  
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <div class="nk-block">
                                  
                                  <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h6 class="title">Image</h6>
                                                        </div>
                                                        <div class="nk-ck-sm">
                                                        <td><img src="{{ $products->first()->imageproduct }}" width="200" height="200"></a></td>

                                                        </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card-bordered card-preview">
                                                    <div class="card-inner">
                                                        <div class="card-head">
                                                            <h6 class="title">Product Name : {{$products->first()->title}}</h6>
                                                        </div>
                                                        <div class="nk-ck-sm">
                                                        <a  class="btn btn-primary"  target="_blank" href="{{$products->first()->url}}">View on Shopify</a>
                                                        <a  class="btn btn-primary"   target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($products->first()->title)}}">Search on AliExpress</a>
                                                        <a  class="btn btn-primary"   target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($products->first()->title)}}&search_type=keyword_unordered&media_type=all">Search on Facebook</a>
   
                                                        </div>
                                                    </div>
                                                </div><!-- .card-preview -->
                                            </div>
                                          
                                           
                                        </div>


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
                            <label class="badgepro badge-success badge-pill">${{ $products->first()->todaysales_count * $products->first()->prix }}</label>
                              <label class="badgepro badge-info badge-pill">{{ $products->first()->todaysales_count }}</label>
                            </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->yesterdaysales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->yesterdaysales_count }}</label>
                          </td>  

                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->day3sales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->day3sales_count }}</label>
                          </td>                          
                        
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->day4sales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->day4sales_count }}</label>
                          </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->day5sales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->day5sales_count }}</label>
                          </td>  
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->day6sales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->day6sales_count }}</label>
                          </td>  
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->weeklysales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->weeklysales_count }}</label>
                          </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->montlysales_count * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->montlysales_count }}</label>
                          </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $products->first()->totalsales * $products->first()->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $products->first()->totalsales }}</label>
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
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/example-chart.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
		<!-- Plugins -->
      <script>  
        
              var todaysales_revenue =  {!! json_encode($products->first()->todaysales_count * $products->first()->prix )!!};
              var yesterdaysales_revenue =  {!! json_encode($products->first()->yesterdaysales_count * $products->first()->prix )!!};
              var day3sales_revenue =  {!! json_encode($products->first()->day3sales_count * $products->first()->prix )!!};
              var day4sales_revenue =   {!! json_encode($products->first()->day4sales_count * $products->first()->prix )!!};
              var day5sales_revenue =  {!! json_encode($products->first()->day5sales_count * $products->first()->prix)!!};
              var day6sales_revenue =   {!! json_encode($products->first()->day6sales_count * $products->first()->prix)!!};
              var day7sales_revenue =  {!! json_encode($products->first()->day7sales_count * $products->first()->prix)!!};
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
              var todaysales_count =  {!! json_encode($products->first()->todaysales_count)!!};
              var yesterdaysales_count =   {!! json_encode($products->first()->yesterdaysales_count)!!};
              var day3sales_count =  {!! json_encode($products->first()->day3sales_count)!!};
              var day4sales_count =   {!! json_encode($products->first()->day4sales_count)!!};
              var day5sales_count =   {!! json_encode($products->first()->day5sales_count)!!};
              var day6sales_count =  {!! json_encode($products->first()->day6sales_count)!!};
              var day7sales_count =   {!! json_encode($products->first()->day7sales_count)!!};

              var dates =   {!! json_encode($dates)!!};
              var lineChartCanvas = document.getElementById('sales-chartaffiche').getContext('2d');
      var data = {
         labels: dates,
        datasets: [
          {
            label: 'Sales',
            data: [day7sales_count,day6sales_count,day5sales_count,day4sales_count,day3sales_count,yesterdaysales_count,todaysales_count],
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

              var todaysales_count =  {!! json_encode($products->first()->todaysales_count)!!};
              var yesterdaysales_count =   {!! json_encode($products->first()->yesterdaysales_count)!!};
              var day3sales_count =  {!! json_encode($products->first()->day3sales_count)!!};
              var day4sales_count =   {!! json_encode($products->first()->day4sales_count)!!};
              var day5sales_count =   {!! json_encode($products->first()->day5sales_count)!!};
              var day6sales_count =  {!! json_encode($products->first()->day6sales_count)!!};
              var day7sales_count =   {!! json_encode($products->first()->day7sales_count)!!};

              var dates =   {!! json_encode($dates)!!};

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
    return '$ ' + value;
  },
  min: 100,
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
             var todaysales_revenue =  {!! json_encode($products->first()->todaysales_count * $products->first()->prix )!!};
              var yesterdaysales_revenue =  {!! json_encode($products->first()->yesterdaysales_count * $products->first()->prix )!!};
              var day3sales_revenue =  {!! json_encode($products->first()->day3sales_count * $products->first()->prix )!!};
              var day4sales_revenue =   {!! json_encode($products->first()->day4sales_count * $products->first()->prix )!!};
              var day5sales_revenue =  {!! json_encode($products->first()->day5sales_count * $products->first()->prix)!!};
              var day6sales_revenue =   {!! json_encode($products->first()->day6sales_count * $products->first()->prix)!!};
              var day7sales_revenue =  {!! json_encode($products->first()->day7sales_count * $products->first()->prix)!!};
              var dates =   {!! json_encode($dates)!!};
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