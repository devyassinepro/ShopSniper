@extends('layouts.account')

@section('title', '| Stores')

@section('content')

                @if (currentTeam()->subscribed('default'))
                <livewire:account.store-search />  
                @endif
                      
  @endsection