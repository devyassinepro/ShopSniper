@extends('layouts.account_niche')

@section('title', '| Stores')

@section('content')

                @if (currentTeam()->subscribed('default'))
                <livewire:store-search />  
                @endif

  @endsection