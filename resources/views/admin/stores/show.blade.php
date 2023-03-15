@extends('layouts.admin')

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
        </main>
<!-- Dashboard Affiche Store Data -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-2 px-3">

  <div class="row my-4">

 <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card">
          <h5 class="card-header">Revenue</h5>
          <div class="card-body">
            <h5 class="card-title">$ {{ number_format($storesrevenue->first()->products_sum_revenue, 2, ',', ' ') }}</h5>
          </div>
        </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card">
          <h5 class="card-header">Sales</h5>
          <div class="card-body">
            <h5 class="card-title">{{$storesrevenue->first()->products_sum_totalsales}}</h5>
          </div>
        </div>
  </div>
@if($storesrevenue->first()->products_sum_revenue != 0 )
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card">
          <h5 class="card-header">AOV</h5>
          <div class="card-body">
            <h5 class="card-title">$ {{number_format($storesrevenue->first()->products_sum_revenue / $storesrevenue->first()->products_sum_totalsales, 2, ',', ' ')}}</h5>
          </div>
        </div>
  </div>
@endif
  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Products</h5>
          <div class="card-body">
            <h5 class="card-title">{{$storedata->first()->allproducts}}</h5>
          </div>
        </div>
  </div>

  </div>
<!-- ENd Dashboard  -->
      <td><a  class="btn btn-success" href="{{ route('admin.stores.storeproducts',$storedata->first()->id) }}">All products</a></td>


</br></br>
<!-- Table >Top Products  -->
<h5 class="card-header">Top 10 Products</h5>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Start Traking</th>
                    <th>Title</th>
                    <th>Prix</th>
                    <th>Today</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>Weeklysales</th>
                    <th>Totalsales</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a></td>
                        <td>{{ $product->created_at }}</td>
                        <td><a href="{{ route('admin.product.show',$product->id) }}">{{ $product->title }}</a></td>
                        <td>{{ $product->prix }} $</td>
                        <td>{{ $product->todaysales_count }}</td>
                        <td>{{ $product->yesterdaysales_count }}</td>
                        <td>{{ $product->day3sales_count }}</td>
                        <td>{{ $product->day4sales_count }}</td>
                        <td>{{ $product->day5sales_count }}</td>
                        <td>{{ $product->day6sales_count }}</td>
                        <td>{{ $product->weeklysales_count }}</td>
                        <td>{{ $product->montlysales_count }}</td>
                        <td>$ {{number_format($product->revenue, 2, ',', ' ')}}</td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>
          <div>
 
     </main>
        </div>
      
      </div>
    </div>
    
    @endsection