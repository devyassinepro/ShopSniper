<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Stores</h3>
                                            </br></br>
                            @if ($message = Session::get('success'))
                              <div class="alert alert-success">
                                  <p>{{ $message }}</p>
                              </div>
                          @endif

                          @if ($message = Session::get('error'))
                              <div class="alert alert-danger">
                                  <p>{{ $message }}</p>
                              </div>
                          @endif

                        @if(!currentTeam()->subscribed())
                        <div class="alert alert-warning" role="alert">
                        Welcome to Weenify. Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                        </div>
                        @endif
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
                                                                <!-- <input type="text" class="form-control" id="default-04" placeholder="Quick search by id"> -->
                                                                <input
                                                                        type="search"
                                                                        wire:model.debounce.500ms="search"
                                                                        placeholder="Search Stores"
                                                                        class="form-control"
                                                                    >
                                                            </div>
                                                        </li>
                            
                                                        <li>
                                                            <div class="drodown">
                                                                    <select  id="filtreNiche" wire:model="filtreNiche" class="form-control">
                                                                    <option value="">filter By Niches</option>
                                                                    @foreach ($niches as $niche)
                                                                        <option value="{{$niche->id}}">{{ $niche->name }}</option>
                                                                    @endforeach

                                                                  </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="drodown">
                                                           
                                                            <select  id="filtreorderby" wire:model="filtreorderby" class="form-control">
                                                            <option value="">Order By</option>
                                                                <option value="revenue">Revenue</option>
                                                                <option value="created_at">New Added</option>
                                                            </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="drodown">
                                                            <select  id="filtreCurrency" wire:model="filtreCurrency" class="form-control">
                                                                <option value="">filter By Currency</option>
                                                                <option value="USD">USD</option>
                                                                <option value="EUR">EUR</option>
                                                            </select>
                                                            </div>
                     
                                                        </li>
                                                        <li>
                                                            <div class="drodown">
                                                            <select  id="filtrePagination" wire:model="filtrePagination" class="form-control">
                                                            <option value="">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                        </select>
                                                            </div>
                     
                                                        </li>

                                                        <li >
                                                        <a href="{{ route('account.stores.create') }}" class="btn btn-round btn-primary"><em class="icon ni ni-plus"></em><span>Add Store</span> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                             
                                <div wire:loading.delay>
                                <div class="text-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    </div>
                                </div>

                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid">
                                                    <label class="custom-control-label" for="pid"></label>
                                                </div>
                                            </div>
                                           
                                            <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                            <div class="nk-tb-col"><span>Products</span></div>
                                            <div class="nk-tb-col"><span>Sales</span></div>
                                            <div class="nk-tb-col"><span>Revenue</span></div>
                                            <div class="nk-tb-col tb-col-md"><span>Expand</span></div>
                                          
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($stores as $store)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid1">
                                                    <label class="custom-control-label" for="pid1"></label>
                                                </div>
                                            </div>
                                         
                                            <div class="nk-tb-col tb-col-sm">
                                                <span class="tb-product">
                                                    <!-- <img src="./images/product/a.png" alt="" class="thumb"> -->
                                                    <span  href="{{ route('account.stores.show',$store->id) }}"class="title">{{ $store->name }} - {{ $store->currency }}</span>
                                                    <a  target="_blank" href="{{$store->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>
                                                    
                                                </span>
                                                <span class="tb-product">
                                                <span>{{ $store->created_at }}</span>
                                                </span>
                                               
                                            </div>
                                            <div class="nk-tb-col">
                                                   <span class="title">{{ $store->allproducts }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                  <label class="badgepro badge-info badge-pill">{{ $store->sales }}</label>
                                            </div>
                                            @if($store->currency == "EUR" )
                                            <div class="nk-tb-col">
                                                <label class="badgepro badge-success badge-pill">{{number_format($store->revenue, 2, ',', ' ')}} €</label>
                                            </div>
                                            @endif
                                            @if($store->currency != "EUR" )
                                            <div class="nk-tb-col">
                                                <label class="badgepro badge-success badge-pill">$ {{number_format($store->revenue, 2, ',', ' ')}}</label>
                                            </div>
                                            @endif
                                            <div class="nk-tb-col tb-col-md">
                                                <div class="asterisk tb-asterisk">
                                                <a href="{{ route('account.stores.show',$store->id) }}" class="btn btn-info">Show Charts</a>
                                                <form action="{{ route('account.stores.destroy',$store->id) }}" method="Post">
                                                            @csrf
                                                            @method('DELETE')

                                                            @if (!currentTeam()->onTrial())
                                                            <button type="submit" class="btn btn-danger">Untrack Store</button>
                                                            @endif

                                                        </form>                                              
                                                      </div>
                                            </div>
                                         
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                               
                                </div><!-- .nk-block -->
                        <div  wire:loading.class="invisible" class="my-4">
                            {{ $stores->links() }}
                            </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
                               
