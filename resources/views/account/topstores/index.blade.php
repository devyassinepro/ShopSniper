@extends('layouts.account_niche')

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
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                         <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Sales</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Revenue</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Expand</span></div>
                                            
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($stores as $store)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col tb-col-sm">
                                                <span class="tb-product">
                                                    <!-- <img src="./images/product/a.png" alt="" class="thumb"> -->
                                                    <span class="title">{{ $store->name }}</span>
                                                </span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-product">
                                            <span class="title">   {{ $store->sales }}</span></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-product">
                                            <span class="title">  {{number_format($store->revenue, 2, ',', ' ')}} $</span></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-product">
                                                  <a  class="btn btn-primary" href="{{ route('account.topstores.show',$store->id) }}">Start Tracking</a></span>
                                            </div>
                                          
                                           
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

    @endsection
