<div class="nk-content ">

                                    @if ($message = Session::get('success'))
                                        
                                        <div class="alert alert-fill alert-icon alert-success" role="alert">
                                            <em class="icon ni ni-alert-circle"></em> 
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif

                                    @if ($message = Session::get('error'))
                                        
                                        <div class="alert alert-fill alert-icon alert-danger" role="alert">
                                            <em class="icon ni ni-alert-circle"></em> 
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif

                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Stores</h3>
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
                                                                        placeholder="Search by Store"
                                                                        class="form-control"
                                                                    >
                                                        </div>
                                                        </li>
                                            
                                                         
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">{{ $filtreNiche ? $niches->where('id', $filtreNiche)->first()->name : 'Select Niche' }}</a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <!-- Default option without filter -->
                                                                        <li>
                                                                            <a href="#" wire:click.prevent="updateNiche('')" wire:model="filtreNiche">
                                                                                <span>ALL Niches</span>
                                                                            </a>
                                                                        </li>

                                                                        <!-- Other niche options from the loop -->
                                                                        @foreach ($niches as $niche)
                                                                            <li>
                                                                                <a href="#" wire:click.prevent="updateNiche({{ $niche->id }})" wire:model="filtreNiche">
                                                                                    <span>{{ $niche->name }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>

                                                            <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown"> {{ $filtreorderby ? ucfirst($filtreorderby) : 'Order By' }}</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <!-- Default option without filter -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('')" wire:model="filtreorderby">
                                                                    <span>All Orders</span>
                                                                </a>
                                                            </li>

                                                            <!-- Other order options -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('revenue')" wire:model="filtreorderby">
                                                                    <span>Revenue</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('created_at')" wire:model="filtreorderby">
                                                                    <span>New Added</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">{{ $filtreCurrency ? $filtreCurrency : 'Filter By Currency' }}</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <!-- Default option without filter -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateCurrency('')" wire:model="filtreCurrency">
                                                                    <span>All Currencies</span>
                                                                </a>
                                                            </li>

                                                            <!-- Other currency options -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateCurrency('USD')" wire:model="filtreCurrency">
                                                                    <span>USD</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateCurrency('EUR')" wire:model="filtreCurrency">
                                                                    <span>EUR</span>
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
                                                            <!-- <li>
                                                                <a href="#" wire:click.prevent="updatePagination('')" wire:model="filtrePagination">
                                                                    <span>All Items</span>
                                                                </a>
                                                            </li> -->

                                                            <!-- Other pagination options -->
                                                            <li>
                                                                <a href="#" wire:click.prevent="updatePagination('10')" wire:model="filtrePagination">
                                                                    <span>10</span>
                                                                </a>
                                                            </li>
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
                                                        </ul>
                                                    </div>
                                                </div>
                                
                                                        </li>
                                                        <li class="nk-block-tools-opt">
                                                            <a href="{{ route('account.stores.create') }}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a href="{{ route('account.stores.create') }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Store</span></a>
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
                                <div wire:loading.delay class="text-center">
                                                <div class="d-flex align-items-center">
                                                <strong>Loading...</strong>
                                                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                                                </div>
                                </div>
                                
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="oid">
                                                <label class="custom-control-label" for="oid"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Store</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Currency</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Date</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Products</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Sales</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Revenue</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Expand</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Action</span></div>
                                    </div><!-- .nk-tb-item -->
                                    @foreach ($stores as $store)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="oid01">
                                                <label class="custom-control-label" for="oid01"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <a  target="_blank" href="{{$store->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>             
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">{{ $store->name }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">{{ $store->currency }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                        <span class="tb-sub" style="font-size: 13px; font-weight: bold;">{{ $store->created_at }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="dot bg-warning d-sm-none"></span>
                                            <span class="tb-sub" style="font-size: 21px; font-weight: bold;">{{ $store->allproducts }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $store->sales }}</span>
                                        </div>
                                        @if($store->currency == "EUR" )
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{number_format($store->revenue, 2, ',', ' ')}} €</span>
                                        </div>
                                        @endif
                                        @if($store->currency != "EUR" )
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">$ {{number_format($store->revenue, 2, ',', ' ')}}</span>
                                        </div>
                                        @endif
                                        <div class="nk-tb-col tb-col-sm">
                                            <a href="{{ route('account.stores.show',$store->id) }}" class="btn btn-info">Show Charts</a>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <form action="{{ route('account.stores.destroy',$store->id) }}" method="Post">
                                                @csrf
                                                @method('DELETE')
                                                @if (!currentTeam()->onTrial())
                                                <button type="submit" class="btn btn-danger">Untrack Store</button>
                                                @endif
                                            </form>
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    @endforeach
                                </div>

                                <div class="card">
                                    <div class="card-inner">
                                        <div wire:loading.class="invisible" class="my-4">
                                            {{ $stores->links() }}
                                        </div>
                                    </div>
                                </div>



                        </div>
                    </div>
                </div>

<!-- after  -->
