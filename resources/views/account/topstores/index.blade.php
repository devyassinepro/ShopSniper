@extends('layouts.account_niche')

@section('title', '| Niches')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>Top Stores</h2>
        </br></br>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th><h6>Name</h6></th>
                    <th><h6>Sales</h6></th>
                    <th><h6>Revenue</h6></th>
                    <th><h6>Expand</h6></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <td><p>{{ $store->name }}</p></td>
                        <td><p>{{ $store->sales }}</p></td>
                        <td><p>{{number_format($store->revenue, 2, ',', ' ')}} $</p></td>
                        <td><a  class="btn btn-primary" href="{{ route('account.topstores.show',$store->id) }}">Start Tracking</a></td>

                    </tr>
                    @endforeach
            </tbody>
            </table>
          <div>

        </div>
        </main>
      </div>
    </div>
    @endsection
