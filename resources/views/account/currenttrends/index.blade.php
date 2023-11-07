@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')

                      @if (currentTeam()->subscribed('default'))
                      <livewire:account.current-trends/>  
                      @endif

    @endsection