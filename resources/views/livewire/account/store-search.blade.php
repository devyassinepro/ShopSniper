<div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner"> 
<div class="nk-content-body">
                                <!--  -->
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

                                    <div class="alert alert-pro alert-primary">

                                                <div class="user-toggle">
                                                    <div class="user-avatar lg">
                                                    <em class="icon ni ni-bag-fill"></em>
                                                </div>

                                                <div class="user-info">
                                                    <h3>Sales Tracker</h3>
                                                    <h6>Track sales of stores</h6>
                                                </div>
                                                </div>

                                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                   
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"></h3>
                                        </div>
                                        <!-- .nk-block-head-content -->
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
                            </div>
                           

                                  
                    @if(!currentTeam()->subscribed())
                    <div class="alert alert-fill alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-alert-circle"></em> 
                        <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                    </div>
                    @endif
                                
                                <!-- start Loading -->
                                <div wire:loading.delay>
                                            <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                                        <div class="la-square-jelly-box la-3x">
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                            </div>
                                    </div>
                                    <!-- end loading -->
                                <div class="nk-block">

                                <!-- test -->

                                <!-- <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Date</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Products</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Sales</span></div>
                                        <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Revenue</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Expand</span></div>
                                        <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Action</span></div> -->

                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Store</span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Currency</span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Date</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Products</span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Sales</span></div>
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Revenue</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                            </div>
                                        </div><!-- .nk-tb-item -->

                                        @foreach ($stores as $store)

                                        <div class="nk-tb-item">
                                             <div class="nk-tb-col">
                                                        <span class="dot bg-success">
                                                        </span>

                                                </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-lead"><a href="{{ route('account.stores.show',$store->id) }}">{{ $store->name }}</a></span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub" style="font-size: 15px; font-weight: bold;">{{ $store->currency }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub" style="font-size: 15px; font-weight: bold;">{{ $store->created_at }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span class="tb-sub" style="font-size: 15px; font-weight: bold;">{{ $store->allproducts }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span class="dot bg-primary d-sm-none"></span>
                                                <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 15px; font-weight: bold;">{{ $store->sales }}</span>
                                            </div>
                                            @if($store->currency == "EUR" )
                                            <div class="nk-tb-col">
                                                    <span class="badge badge-sm badge-dot has-bg bg-success" style="font-size: 15px; font-weight: bold;">{{number_format($store->revenue, 2, ',', ' ')}} €</span>
                                            </div>
                                            @endif
                                            @if($store->currency != "EUR" )
                                            <div class="nk-tb-col">
                                                     <span class="badge badge-sm badge-dot has-bg bg-success" style="font-size: 15px; font-weight: bold;">$ {{number_format($store->revenue, 2, ',', ' ')}}</span>
                                            </div>
                                            @endif

                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden"><a href="{{ route('account.stores.show',$store->id) }}" class="btn btn-icon btn-trigger btn-tooltip" title="Show Charts">
                                                            <em class="icon ni ni-eye"></em></a></li>
                                                    <li>
                                                        <div class="drodown me-n1">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{ route('account.stores.show',$store->id) }}"><em class="icon ni ni-eye"></em><span>Show Charts</span></a></li>
                                                                    <li>
                                                                            <form action="{{ route('account.stores.destroy', $store->id) }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                @if (!currentTeam()->onTrial())
                                                                                    <button type="submit" class="btn btn-danger">
                                                                                        <em class="icon ni ni-trash"></em>
                                                                                        <span>Untrack Store</span>
                                                                                    </button>
                                                                                @endif
                                                                            </form>
                                                                        </li>                                                               
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                    <div class="card">
                                            <div class="card-inner">
                                                <div class="nk-block-between-md g-3">
                                                    <div class="g">
                                                   
                                                    </div>

                                                <div class="g">
                                                           
                                                    <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                                    <ul class="pagination">
                                                                        @if ($stores->currentPage() > 1)
                                                                            <li class="page-item">
                                                                                <a class="page-link" wire:click="previousPage" href="#">
                                                                                    <em class="icon ni ni-back-alt-fill"></em>
                                                                                </a>
                                                                            </li>
                                                                        @else
                                                                            <li class="page-item disabled">
                                                                                <span class="page-link"><em class="icon ni ni-back-alt-fill"></em></span>
                                                                            </li>
                                                                        @endif

                                                                        @if ($stores->currentPage() < $stores->lastPage())
                                                                            <li class="page-item">
                                                                                <a class="page-link" wire:click="nextPage" href="#">
                                                                                    <em class="icon ni ni-forward-alt-fill"></em>
                                                                                </a>
                                                                            </li>
                                                                        @else
                                                                            <li class="page-item disabled">
                                                                                <span class="page-link"><em class="icon ni ni-forward-alt-fill"></em></span>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                    <div>
                                                                         <!-- <select class="form-select js-select2" data-search="on" data-dropdown="xs center" wire:model="page">
                                                                            @for ($i = 1; $i <= $stores->lastPage(); $i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select> -->
                                                                   
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown"> {{ $stores->currentPage()  }} </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <!-- Default option without filter -->
                                                                                <!-- Other pagination options -->

                                                                                @for ($i = 1; $i <= $stores->lastPage(); $i++)
                                                                                <li>
                                                                                    <a class="page-link" wire:click="gotoPage({{ $i }})">
                                                                                        <span>{{ $i }}</span>
                                                                                    </a>
                                                                                </li>

                                                                                @endfor
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div>OF {{ $stores->lastPage() }}</div>

                                                    </div>
                                                </div><!-- .pagination-goto -->
                                            </div>
                                        </div>


                                </div><!-- .nk-block -->

                                </div>
                    </div>
                </div>




<!-- after  -->
