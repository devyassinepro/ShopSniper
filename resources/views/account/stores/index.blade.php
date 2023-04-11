@extends('layouts.account_niche')

@section('title', '| Stores')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>Stores</h2>
          <a class="btn btn-success" href="{{ route('account.stores.create') }}">Add Shop</a>

            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Filtres
            </button> -->
        </br></br>
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

        @if(!currentTeam()->subscribed())
<div class="alert alert-warning" role="alert">
Welcome to Weenify. Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
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
      <form action="{{ route('account.stores.index')}}" method="GET">
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


        @if (currentTeam()->subscribed('default'))
        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th><h6>Name</h6></th>
                    <th><h6>Products</h6></th>
                    <th><h6>Sales</h6></th>
                    <th><h6>Revenue</h6></th>
                    <th><h6>Expand</h6></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td><p><a href="{{ route('account.stores.show',$store->id) }}">{{ $store->name }}</a></p></td>
                        <td><p>{{ $store->allproducts }}</p></td>
                        <td><p>{{ $store->products_sum_totalsales }}</p></td>
                        <td><p>{{number_format($store->products_sum_revenue, 2, ',', ' ')}} $</p></td>
                        <td><a  class="btn btn-primary" href="{{ route('account.stores.show',$store->id) }}">Show Charts</a></td>
                        <td>
                            <form action="{{ route('account.stores.destroy',$store->id) }}" method="Post">
                                @csrf
                                @method('DELETE')

                                @if (!currentTeam()->onTrial())
                                <button type="submit" class="btn btn-warning">Untrack Store</button>
                                @endif
                              
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>

          <div>
        {{  $stores->links() }}

        </div>
        @endif
        </main>
      </div>
    </div>
    @endsection