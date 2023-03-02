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
