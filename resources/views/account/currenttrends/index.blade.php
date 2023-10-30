@extends('layouts.account_niche')

@section('title', '| Products')

@section('content')

                      @if (currentTeam()->subscribed('default'))
                      <livewire:current-trends/>  
                      @endif

    @endsection