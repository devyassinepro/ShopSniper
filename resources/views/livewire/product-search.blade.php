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

                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Products</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-search"></em>
                                                                </div>
                                                                <input
                                                                        type="search"
                                                                        wire:model.debounce.500ms="search"
                                                                        placeholder="Search by Product"
                                                                        class="form-control"
                                                                    >
                                                        </div>
                                                        </li>

                                                           <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown"> {{ $filtreorderby ? ucfirst($filtreorderby) : 'Order By' }}</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <!-- Default option without filter -->
                        
                                                            <!-- Other order options -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('revenue')" wire:model="filtreorderby">
                                                                    <span>Total revenue</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('totalsales')" wire:model="filtreorderby">
                                                                    <span>Total sales</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('todaysales')" wire:model="filtreorderby">
                                                                    <span>Today sales</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('yesterdaysales')" wire:model="filtreorderby">
                                                                    <span>Yesterday sales</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">{{ $filtrePagination ? $filtrePagination : 'Items Per Page' }}</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <!-- Default option without filter -->
                                                
                                                            <!-- Other pagination options -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updatePagination('25')" wire:model="filtrePagination">
                                                                    <span>25</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updatePagination('50')" wire:model="filtrePagination">
                                                                    <span>50</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updatePagination('100')" wire:model="filtrePagination">
                                                                    <span>100</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            
                                              
                                            </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                  
                            @if(!currentTeam()->subscribed())
                            <div class="alert alert-fill alert-icon alert-warning" role="alert">
                                <em class="icon ni ni-alert-circle"></em> 
                                <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                            </div>
                            @endif
                               
                        <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                        </div>
                                
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                    <!-- after  -->
                                    <div  wire:loading.class="invisible" class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="oid">
                                                <label class="custom-control-label" for="oid"></label>
                                            </div>
                                        </div>

                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Product</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Price</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Today</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Yesterday</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Total sales</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block"></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Expand</span></div>

                                    </div><!-- .nk-tb-item -->

                                    @foreach ($products as $product)
                                    <div wire:loading.class="invisible" class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="oid01">
                                                <label class="custom-control-label" for="oid01"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                                        </div>
                                        <div class="nk-tb-col">
                                            <a href="{{ route('account.product.show',$product->id) }}"><h6>{{ $product->title }}</h6></a>
                                            <a target="_blank" href="{{ $product->url }}">{{ parse_url($product->url, PHP_URL_HOST) }}</a>

                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                                <a  target="_blank" href="{{$product->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($product->title)}}&search_type=keyword_unordered&media_type=all"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($product->title)}}"> <img src="https://img.icons8.com/color/512/aliexpress.png" width="30" height="30"></a>
                                         </div>

                                         <div class="nk-tb-col tb-col-md">
                                           <h6>$ {{ $product->prix }}</h6> 
                                         <!-- <span class="badge badge-sm badge-dot has-bg bg-info d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">$ {{ $product->prix }}</span> -->

                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->todaysales * $product->prix }}</span>

                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales }}</span>
                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                             <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->yesterdaysales * $product->prix }}</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales }}</span>

                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->totalsales * $product->prix }}</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales }}</span>

                                        </div>

                                        <div class="nk-tb-col tb-col-md">
                                            <li><a href="{{ route('account.product.show',$product->id) }}" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>View</span></a></li>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <li><a wire:click="exportToCsv('{{ $product->url }}')" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Import product</span></a></li>
                                        </div>
                                       
                                    </div><!-- .nk-tb-item -->
                                    @endforeach
                                </div>

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
                        