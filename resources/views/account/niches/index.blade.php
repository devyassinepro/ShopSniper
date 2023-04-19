@extends('layouts.account_niche')

@section('title', '| Niches')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>Niches</h2>
          <a class="btn btn-success" href="{{ route('account.niches.create') }}">Add Niche</a>

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
                    <th><h6>Niches</h6></th>
                    <th><h6>Start Added</h6></th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nicheall as $niche)
                    <tr>
                        <td><h6><a href="{{ route('account.niches.show',$niche->id) }}">{{ $niche->name }}</a></h6></td>
                        <td>{{ $niche->created_at }}</td>
                        <td>
                            <form action="{{ route('account.niches.destroy',$niche->id) }}" method="Post">
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
        {{  $nicheall->links() }}

        </div>
        </main>
      </div>
    </div>
    @endsection