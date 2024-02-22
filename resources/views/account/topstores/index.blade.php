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
                                        <h3 class="nk-block-title page-title">Top Stores</h3>
                                        </div><!-- .nk-block-head-content -->
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                            <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sales</th>
                                            <th scope="col">Revenue</th>
                                            <th scope="col">Expand</th>
                                          
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($stores as $store)
                                        <tr>
                                            <td>
                                                
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid1">
                                                    <label class="custom-control-label" for="pid1"></label>
                                                </div>
                                            </td>
                                            <td>
                                            <span class="title">{{ $store->name }}</span>
                                            </td>
                                           
                                            <td> 
                                                 <span class="title">   {{ $store->sales }}</span>
                                            </td>
                                            
                                            <td> {{number_format($store->revenue, 2, ',', ' ')}} $</td>

                                            <td>                   
                                            <a  class="btn btn-primary" href="{{ route('account.topstores.show',$store->id) }}">Start Tracking</a></span>
                                            </td>
                                            <!-- Add more data rows as needed -->
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

    @endsection
