@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


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
      <form action="{{ route('account.product.index')}}" method="GET">
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
          <!-- affiche Table  -->

          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                 <h2>Products : {{$totalproducts}}</h2> </h4>
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Filtres
      </button> -->
                  </h4>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2" type="button">Day</button>
          <button class="btn btn-primary" type="button">Week</button>
          <button class="btn btn-primary" type="button">Month</button>
        </div>

        <!-- Button trigger modal -->
      
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                    <th width="200" height="100">Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Today</th>
                    <th>Yesterday</th>
                    <th>Total sales</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($products as $product)
                        <tr>
                        <td><a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="500" height="500"></a></td>
                        <td><a href="{{ route('account.product.show',$product->id) }}">{{ $product->title }}</a></td>                     
                          <td>$ {{ $product->prix }}</td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $product->todaysales_count * $product->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->todaysales_count }}</label>
                          </td>
                          <td>
                          <label class="badge badge-success badge-pill">${{ $product->yesterdaysales_count * $product->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->yesterdaysales_count }}</label>
                          </td>
                          <td>
                          <label class="badgepro badge-success badge-pill">${{ $product->totalsales * $product->prix }}</label>
                            <label class="badgepro badge-info badge-pill">{{ $product->totalsales }}</label>
                          </td>
                          <td><a  class="btn btn-success" href="{{ route('account.product.show',$product->id) }}" >View </a></td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <div>
        {{ $products->links() }}


        </div>
        </main>
      </div>
    </div>
    @endsection