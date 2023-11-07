@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')

                      @if (currentTeam()->subscribed('default'))
                      <livewire:account.product-research />  
                      @endif
    @endsection