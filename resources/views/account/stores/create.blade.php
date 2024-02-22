@extends('layouts.account')

@section('title', '| Niches')

@section('content')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Store</h3>
                                        </div><!-- .nk-block-head-content -->
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
          @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
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

        <div class="nk-block nk-block-lg">
                                       
                                       <div class="card">
                                           <div class="card-inner">
                                               <div class="card-head">
                                                   <h5 class="card-title">Store</h5>
                                               </div>
                                               <form action="{{ route('account.stores.store') }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                   <div class="row g-4">
                                                       <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <div class="form-control-wrap">
                                                                   <input type="text" name="url" class="form-control" placeholder="Url Store Shopify">
                                                                  @error('store')
                                                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                                  @enderror
                                                                  </div>
                                                                </div>
                                                       </div>
                                                     @error('niche')
                                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                     @enderror

                                                     <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <div class="form-control-wrap">
                                                               <select class="form-control"  name="nicheid">
                                                                  @foreach ($allniches as $niche)
                                                                  <option value="{{ $niche->id }}">{{ $niche->name }}</option>
                                                                  @endforeach
                                                                </select>
                                                                </div>
                                                       </div>
                                                     
                                                       <div class="col-12">
                                                           <div class="form-group">
                                                               <button type="submit" class="btn btn-lg btn-primary">Add Shop</button>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div><!-- .nk-block -->
                
                       </div>
                     </div>
                       </div>
                         </div>
    @endsection