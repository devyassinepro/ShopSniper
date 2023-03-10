@extends('layouts.admin')

@section('title', '| Products')

@section('content')  <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
        <div><h4>View Product</h4></div>
        <div><h5>Store Name : {{$products->first()->title}}</h5></div>

        <td><img src="{{ $products->first()->imageproduct }}" width="300" height="300"></a></td>
        <td><a  class="btn btn-success" href="{{$products->first()->url}}" target="_blank">View </a></td>

                   

                        
          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Today</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>Weeklysales</th>
                    <th>Monthlysales</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <td>{{ $products->first()->todaysales_count }}</td>

                    <td>{{ $products->first()->yesterdaysales_count }}</td>
                        <td>{{ $products->first()->day3sales_count }}</td>
                        <td>{{ $products->first()->day4sales_count }}</td>
                        <td>{{ $products->first()->day5sales_count }}</td>
                        <td>{{ $products->first()->day6sales_count }}</td>
                        <td>{{ $products->first()->weeklysales_count }}</td>
                        <td>{{ $products->first()->montlysales_count }}</td>

                    </tr>
            </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    
    @endsection