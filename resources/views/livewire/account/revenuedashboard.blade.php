<div class="row g-gs">
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Stores</div>
                                                    <a href="{{ route('account.storesearch.index') }}" wire:navigate class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">{{ $totalstores }} <small class="fs-3">Stores</small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">{{ $totalstores }}/ {{ $storelimit }}</span> Total Stores</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Products</div>
                                                    <a href="{{ route('account.productsearch.index') }}" wire:navigate class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">{{ $totalproducts }} <small class="fs-3">Products</small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">{{ $totalproducts }}</span> Tracked Product</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Sales</div>
                                                    <a href="{{ route('account.productsearch.index') }}" wire:navigate class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">{{number_format($totalsales)}} <small class="fs-3">Sales</small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">{{number_format($totalsales)}}</span> Tracked Sales</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-sm-6 col-xxl-3">
                                        <div class="card card-full bg-primary">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div class="fs-6 text-white text-opacity-75 mb-0">Total Revenue</div>
                                                    <a href="{{ route('account.productsearch.index') }}" wire:navigate class="link link-white">See All</a>
                                                </div>
                                                <h5 class="fs-1 text-white">$ {{number_format($totalRevenue, 0, ',', ' ')}}<small class="fs-3"></small></h5>
                                                <div class="fs-7 text-white text-opacity-75 mt-1"><span class="text-white">$ {{number_format($totalRevenue, 2, ',', ' ')}}</span> Tracked Revenue</div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->