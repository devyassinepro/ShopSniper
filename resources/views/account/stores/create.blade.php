@extends('layouts.account_niche')

@section('title', '| Niches')

@section('content')
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h3>Shopify Store URL</h3>
          @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <form action="{{ route('account.stores.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <!-- <strong>Store :</strong> -->
                        <input type="text" name="url" class="form-control" placeholder="Url Store Shopify">
                        @error('store')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Niche</label>
                        <select class="form-control"  name="nicheid">
                          @foreach ($allniches as $niche)
                          <option value="{{ $niche->id }}">{{ $niche->name }}</option>
                          @endforeach
                        </select>
                      </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Add Shop</button>
            </div>
        </form>
          </div>
          <div>
        </div>
        </main>
      </div>
    </div>
    @endsection