@extends('layouts.admin')

@section('title', '| Stores')

@section('content')
<div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2> Stores</h2>
          <a class="btn btn-success" href="{{ route('admin.stores.create') }}">Add</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           Filtres
      </button>
        </br></br>
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
      <form action="{{ route('admin.stores.index')}}" method="GET">
          <!-- <h3>Advanced Search</h3><br> -->
          <input type="text" name="url" class="form-control" placeholder="Store"><br>
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
          <option value="products_sum_revenue">Revenue</option>
          <option value="products_sum_totalsales">Sales</option>
          <!-- <option value="stasc">Start Traking ASC</option> -->
          <option value="created_at">Start Tracking Desc</option>
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
        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Store</th>
                    <th>Products</th>
                    <!-- <th>Start Tracking</th> -->
                    <!-- <th>Status</th> -->
                    <th>Sales</th>
                    <th>Revenue</th>
                    <!-- <th>Show</th> -->
                    <!-- <th>Tracking</th> -->
                    <th>Show Details</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td><a href="{{ route('admin.stores.show',$store->id) }}">{{ $store->name }}</a></td>
                        <td>{{ $store->allproducts }}</td>
                        <!-- <td>{{ $store->status }}</td> -->
                        <td>{{ $store->sales }}</td>
                        <td>$ {{ number_format($store->revenue, 2, ',', ' ') }}</td>
                        <td><a  class="btn btn-success" href="{{ route('admin.stores.show',$store->id) }}">Show Details</a></td>

                            <form action="{{ route('admin.stores.destroy',$store->id) }}" method="Post">

                                @csrf
                                @method('DELETE')
                                <td>  <button type="submit" class="btn btn-danger">Delete</button> </td>
                            </form>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>

          <div>
        {{  $stores->links() }}

        </div>
        </main>
      </div>
    </div>
    
    @endsection