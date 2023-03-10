@extends('layouts.account_niche')
@section('content')
<div class="u-body">
    <!-- Doughnut Chart -->
    <div class="row">
            <div class="col-sm-6 col-xl-3 mb-4">
                <div class="card">
                    <div class="card-body media align-items-center px-xl-3">
                        <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                            <i class="fa fa-shopping-bag"></i>
                        </div>

                        <div class="media-body">
                            <h5 class="h6 text-muted text-uppercase mb-2">
                                {{ __('Total Stores') }} <i class="fa fa-arrow-up text-danger ml-1"></i>
                            </h5>
                            <span class="h2 mb-0">{{ $totalstores }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-4">
                <div class="card">
                    <div class="card-body media align-items-center px-xl-3">
                        <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                            <i class="fa fa-database"></i>
                        </div>

                        <div class="media-body">
                            <h5 class="h6 text-muted text-uppercase mb-2">
                                {{ __('Total Products') }} <i class="fa fa-arrow-up text-danger ml-1"></i>
                            </h5>
                            <span class="h2 mb-0">{{ $totalproducts }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-4">
                <div class="card">
                    <div class="card-body media align-items-center px-xl-3">
                        <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                        </div>

                        <div class="media-body">
                            <h5 class="h6 text-muted text-uppercase mb-2">
                                {{ __('Total Sales') }} <i class="fa fa-arrow-up text-danger ml-1"></i>
                            </h5>
                            <span class="h2 mb-0">{{ $totalsales }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-4">
                <div class="card">
                    <div class="card-body media align-items-center px-xl-3">
                        <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                            <i class="fa fa-shopping-cart"></i>
                        </div>

                        <div class="media-body">
                            <h5 class="h6 text-muted text-uppercase mb-2">
                                {{ __('Total Revenue') }} <i class="fa fa-arrow-up text-danger ml-1"></i>
                            </h5>
                            <span class="h2 mb-0">{{number_format($totalRevenue, 2, ',', ' ')}} $</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <h5 class="card-header">Top 5 Products</h5>

<div class="table-responsive">
  <table class="table table-striped table-sm">
  <thead>
      <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Prix</th>
          <th>Today</th>
          <th>Revenue</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($products as $product)
          <tr>
              <td><a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a></td>
          
              <td><a href="{{ $product->url }}" target="_blank">{{ $product->title }}</a></td>
              <td>{{ $product->prix }} $</td>
              <td>{{ $product->todaysales_count }}</td>
              <td>{{ number_format($product->todaysales_count * $product->prix, 2, ',', ' ') }}</td>
              <!-- <td>$ {{number_format($product->revenue, 2, ',', ' ')}}</td> -->
          </tr>
          @endforeach
  </tbody>
  </table>
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
