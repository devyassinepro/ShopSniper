@extends('layouts.admin')

@section('title', '| Niches')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>Niches</h2>
          <a class="btn btn-success" href="{{ route('admin.niches.create') }}">Add Niche</a>

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
                    <th>Niches</th>
                    <th>Start Added</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niches as $niche)
                    <tr>
                        <td><a href="{{ route('admin.niches.show',$niche['_id']) }}">{{ $niche['name'] }}</a></td>
                        <td>
                            <form action="{{ route('admin.niches.destroy',$niche['_id']) }}" method="Post">
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

        </div>
        </main>
      </div>
    </div>
    @endsection
