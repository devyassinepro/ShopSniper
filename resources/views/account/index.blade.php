@extends('layouts.account_niche')
@section('content')

<script>
fpr("referral",{email:"{{ Auth::user()->email }}"})
</script>

<div class="u-body">
    <!-- Doughnut Chart -->
    <div class="row">
                <!-- DAshboard  -->
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

      <!-- ENd Dashboard  -->
        
<!-- Table >Top Products  -->
 <!-- Affiche //// -->

 
 <div class="row">
 @if (currentTeam()->subscribed('default'))
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Top 5 Products (Sales)
                  </h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                        <th><h6>Image</h6></th>
                        <th><h6>Title</h6></th>
                        <th><h6>Price</h6></th>
                        <th><h6>Today Sales</h6></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                        <tr>
                        <td class="font-weight-bold">
                              <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="150" height="150"></a>
                          </td>
                          <td class="font-weight-bold">
                              <a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a>
                          </td>          
                          <td class="font-weight-bold">${{ $product->prix }}</td>  
                          <td>
                        <h5><label class="badgepro badge-success badge-pill">${{ number_format($product->todaysales_count * $product->prix, 2, ',', ' ') }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->todaysales_count }}</label>
                        </h5></td>                
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endif
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
