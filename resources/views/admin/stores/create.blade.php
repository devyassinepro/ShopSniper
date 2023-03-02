@extends('layouts.admin')

@section('title', '| Niches')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>Add Store</h2>
          @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('admin.stores.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Store store:</strong>
                        <input type="text" name="url" class="form-control" placeholder="Store">
                        @error('store')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Niches</label>
                        <select class="form-control"  name="nicheid">
                          @foreach ($allniches as $niche)
                          <option value="{{ $niche->id }}">{{ $niche->name }}</option>
                          @endforeach
                        </select>
                      </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
          </div>
          <div>
        </div>
        </main>
      </div>
    </div>
    @endsection