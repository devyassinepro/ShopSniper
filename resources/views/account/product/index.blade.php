@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')

<!-- 
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-12">

          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif
          @if(!currentTeam()->subscribed())
<div class="alert alert-warning" role="alert">
Welcome to Weenify. Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
</div>
@endif -->

<!-- Modal -->
          <!-- affiche Table  -->
 
          <!-- <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> -->
                 <!-- <h2>Products : {{$totalproducts}}</h2> </h4> -->
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Filtres
      </button> -->
                  <!-- </h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-primary me-md-2" type="button">Day</button>
                  <button class="btn btn-primary" type="button">Week</button>
                  <button class="btn btn-primary" type="button">Month</button>
                </div>
                </div> -->

                      @if (currentTeam()->subscribed('default'))
                      <livewire:account.product-search/>  
                      @endif
        <!-- </main>
      </div>
    </div>
   -->
    @endsection