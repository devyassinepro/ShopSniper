<div class="nk-content ">
                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                                @endif
                                <br> 
                        <div class="nk-block">
                        @if(!currentTeam()->subscribed())
                                            
                        <div class="alert alert-icon alert-warning" role="alert">
                            <em class="icon ni ni-alert-circle"></em> 
                            <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                        </div>
                        @endif
                        </div>
<!-- card container  -->

<div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Current Trends</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total 50000 Products.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <!-- <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Open</span></a></li>
                                                                        <li><a href="#"><span>Closed</span></a></li>
                                                                        <li><a href="#"><span>Onhold</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                                            <a href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Project</span></a>
                                                        </li>
                                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                                            <a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                        
                            <div wire:loading.delay>
                                    <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                                <div class="la-square-jelly-box la-3x">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                    </div>
                            </div>
                            <!-- later -->
                                <div class="nk-block">
                                    <div class="row g-gs">

                                    @foreach ($products as $product)
                                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="project">
                                                    <!-- <a href="{{ $product->url }}" target="_blank"></a> -->
                                                    <div class="project-details">
                                                      <a href="{{ route('account.product.show',$product->id) }}"> <img src="{{ $product->imageproduct }}" width="300" height="300"></a>
                        
                                                    </div>
                                                    <div class="project-head">
                                                            <a href="{{ $product->url }}" target="_blank" class="project-title">
                                                                <div class="project-info">
                                                                    <h6 class="title">{{ $product->title }}</h6>
                                                                    <span class="sub-text">{{ parse_url($product->url, PHP_URL_HOST) }}</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                            
                                                        <div class="project-meta">
                                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">$ {{ $product->prix }}</span>
                                                            <span class="badge badge-dim bg-warning"><em class="icon ni ni-clock"></em><span>5 Days Left</span></span>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="{{ route('account.product.show',$product->id) }}"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Import Product</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>

                    <!-- end Card -->
                                <!-- <div class="card">
                                    <div class="card-inner">
                                        <div wire:loading.class="invisible" class="my-4">
                                            {{ $products->links() }}

                                        </div>
                                    </div>
                                </div> -->

                                <div wire:loading.class="invisible" class="card">
                                    <div class="card-inner">
                                        <div wire:loading.class="invisible" class="my-4">
                                            <div>
                                                    @if ($products->hasPages())
                                                        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                                                            <span>
                                                                {{-- Previous Page Link --}}
                                                                @if ($products->onFirstPage())
                                                                    <span class="btn btn-primary">
                                                                       <
                                                                    </span>
                                                                @else
                                                                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="btn btn-primary">
                                                                    <
                                                                    </button>
                                                                @endif
                                                            </span>
                                                
                                                              <!-- Page Input and "Go" Button -->
                                                            {{ $products->links() }}

                                                            <span>
                                                                {{-- Next Page Link --}}
                                                                @if ($products->hasMorePages())
                                                                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="btn btn-primary">
                                                                       >
                                                                    </button>
                                                                @else
                                                                    <span class="btn btn-primary">
                                                                    >
                                                                    </span>
                                                                @endif
                                                            </span>
                                                        </nav>
                                                    @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
</div>
                        