
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
                                            <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Store : {{$storedata->first()->name}}</h3>
                                            <h3>{{$storedata->first()->shopifydomain}}</h3>
                                            <h5>{{$storedata->first()->url}}</h5>
                                            <h5>{{$storedata->first()->city}} - {{$storedata->first()->country}}</h5>
                                            <h5>{{$storedata->first()->currency}}</h5>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt"><a  class="btn btn-primary"  target="_blank" href="{{$storedata->first()->url}}">View on Shopify</a></li>
                                                    <li class="nk-block-tools-opt"><a  class="btn btn-primary"  href="{{ route('account.liststore.show',['id' =>$storedata->first()->id]) }}" wire:navigate>All products</a></li>
                                                    <li class="nk-block-tools-opt"><a wire:click="exportToCsv('{{ $storedata->first()->id }}')" class="btn btn-white btn-dim btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><style>svg{fill:#95bf46}</style><path d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z"/></svg><span> Import Store</span></a></li>
                                                    <li class="nk-block-tools-opt"><a wire:click="trackstore('{{ $storedata->first()->id }}')"  class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"><span>Untrack Store</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                   
                                                <div class="row g-3 align-center">
                                                
                                                    <div class="col-lg-10">
                                                        <div class="form-group"> </div>  
                                                    </div>
                                                </div>
                                  </div>
                                  </div>
                                  </div>

                                             
                                                                    
@if($storedata->first()->currency == "EUR" )
<div class="nk-block">
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Revenue"></em>
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Sales"></em>
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="AOV"></em>
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Products"></em>
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
     
                        <!-- Test Chart  -->
                      
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <div class="nk-ck">
                                    <canvas class="line-chart" id="solidLineChart"></canvas>
                                </div>
                            </div>
                        </div><!-- .card-preview -->
               

</br>
        <livewire:account.stores.top10products :storeId="$storeId" />

@endif
@if($storedata->first()->currency != "EUR" )

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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Revenue"></em>
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Sales"></em>
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="AOV"></em>
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
                                                                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Products"></em>
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

                        <div class="card card-bordered card-preview">
                            <div class="card-inner">
                                <div class="nk-ck">
                                    <canvas class="line-chart" id="solidLineChart"></canvas>
                                </div>
                            </div>
                        </div><!-- .card-preview -->

                    </br>

                    <!-- Fin chart -->
                
                                <div class="col-xxl-6">
                                          
                                        </div><!-- .col -->

                                        
            <!-- Table >Top Products  -->
            <!-- Affiche //// -->
         
                <!-- top 10 products -->
            <livewire:account.stores.top10products :storeId="$storeId" />

                @endif
                             
              </div>
              <div wire:loading.delay>
                    <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                <div class="la-square-jelly-box la-3x">
                                    <div></div>
                                    <div></div>
                                </div>
                    </div>
            </div>   
                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true close-btn">×</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">
                                                            <p>Are you sure want to delete?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                                            <button type="button" wire:click.prevent="untrackstore()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                                        </div>
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
<script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>


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


//   test chart : 

var solidLineChart = {
    labels: dates,
    dataUnit: ['$', 'sales'], // Updated dataUnit values
    lineTension: 0.4,
    legend: true,
    datasets: [{
        label: "Total Revenue ($)", // Removed "$" from the label
        color: "#5ce0aa",
        background: 'transparent',
        data: [day7sales_revenue, day6sales_revenue, day5sales_revenue, day4sales_revenue, day3sales_revenue, yesterdaysales_revenue, todaysales_revenue]
    }, {
        label: "Total Sales (sales)", // Updated label
        color: "#9d72ff",
        background: 'transparent',
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
