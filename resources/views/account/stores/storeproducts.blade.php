@extends('layouts.account_niche')

@section('title', '| Stores')

@section('content')
<div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
        <div><h2>View Products</h2></div>
        <div><h5>Store Name : {{$storedata->first()->name}}</h5></div>
   
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
        </main>
        <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Filtres
      </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Filtres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('admin.product.index')}}" method="GET">
          <!-- <h3>Advanced Search</h3><br> -->
          <input type="text" name="title" class="form-control" placeholder="Title"><br>
          <label>Price Range</label>
          <div class="input-group">
          <input type="text" name="min_prix" class="form-control" placeholder="Start price">
          <input type="text" name="max_prix" class="form-control" placeholder="End of Price">
          </div><br>
          <label>Revenue Range</label>
          <div class="input-group">
          <input type="text" name="min_revenue" class="form-control" placeholder="Start revenue">
          <input type="text" name="max_revenue" class="form-control" placeholder="End of revenue">
          </div><br>
          <label>Totalsales Range</label>
          <div class="input-group">
          <input type="text" name="min_sales" class="form-control" placeholder="Start sales">
          <input type="text" name="max_sales" class="form-control" placeholder="End of sales">
          </div><br>
          <label>Ordre By</label>
          <select  class="form-control" name="ordreby" >
          <option value="revenue">Revenue</option>
          <option value="totalsales">Total Sales</option>
          <option value="todaysales">Best Selling Today</option>
          <option value="sales2">Best Selling Yesterday</option>
         </select>         

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Search" class="btn btn-secondary">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
        <div>       
        </div>
</br></br>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Prix</th>
                    <th>Today</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>Weeklysales</th>
                    <th>Monthlysales</th>
                    <!-- <th>Monthlysales</th> -->
                    <th>Totalsales</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="150" height="150"></a></td>
                        <td><a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a></td>
                        <td>{{ $product->prix }} $</td>
                        <td>{{ $product->todaysales_count }}</td>
                        <td>{{ $product->yesterdaysales_count }}</td>
                        <td>{{ $product->day3sales_count }}</td>
                        <td>{{ $product->day4sales_count }}</td>
                        <td>{{ $product->day5sales_count }}</td>
                        <td>{{ $product->day6sales_count }}</td>
                        <td>{{ $product->weeklysales_count }}</td>
                        <td>{{ $product->montlysales_count }}</td>
                        <td>{{ $product->totalsales }}</td>
                        <td>{{number_format($product->revenue, 2, ',', ' ')}} $</td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>
          <div>
        {{ $products->links() }}


        </div>
        </main>
      </div>
    </div>
    
    
    @endsection