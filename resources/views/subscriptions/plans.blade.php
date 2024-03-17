@extends('layouts.accountsubscribe')
@section('title', 'Checkout Plans')
@section('content')
<nav class="navbar navbar-expand-md">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none" href="#">
    <img  src="{{ asset('images/logo-dark.png') }}" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <a class="navbar-brand d-none d-md-block" href="#">
        <img  src="{{ asset('images/logo-dark.png') }}" >
        </a>
      </ul>
    </div>

  </div>
</nav>
    <div class="card">
        <div class="card-body">
            <livewire:plan-list />
        </div>
    </div>

@endsection


