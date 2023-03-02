@extends('layouts.admin')

@section('title', '| Niches')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>List Stores</h2>
          <a class="btn btn-success" href="{{ route('admin.dns.create') }}">Add Dns</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->

        </br></br>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>DNS</th>
                    <th>Start Added</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dnsall as $dns)
                    <tr>
                        <td><a href="{{ route('admin.product.show',$dns->id) }}">{{ $dns->url }}</a></td>
                        <td>{{ $dns->url }}</td>
                        <td>{{ $dns->created_at }}</td>
                        <td>{{ $dns->status }}</td>
                        <td>
                            <form action="{{ route('admin.dns.destroy',$dns->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
          </div>

          <div>
        {{  $dnsall->links() }}

        </div>
        </main>
      </div>
    </div>
    @endsection