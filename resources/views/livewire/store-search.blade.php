<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Stores</h3>
                                            </br></br>
                            <!-- filters -->
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('account.stores.create') }}" class="btn btn-round btn-primary"><em class="icon ni ni-plus"></em><span>Add Store</span> </a>
                                </div>
                                            <!-- affiche message -->
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

                          <br> 
                    <div class="nk-block">
                    @if(!currentTeam()->subscribed())
                                        
                    <div class="alert alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-alert-circle"></em> 
                        <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                    </div>
                    @endif
                    </div>
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
                                                                        placeholder="Search"
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

                                                        <!-- <li >
                                                        <a href="{{ route('account.stores.create') }}" class="btn btn-round btn-primary"><em class="icon ni ni-plus"></em><span>Add Store</span> </a>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                             <!-- End filters -->
                                <div wire:loading.delay>
                                <div class="text-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                </div>
    <!-- new table -->

                             <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                             <th scope="col"></th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Products</th>
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
                                            <span class="tb-product">
                                                    <!-- <img src="./images/product/a.png" alt="" class="thumb"> -->
                                                    <span  href="{{ route('account.stores.show',$store->id) }}"class="title">{{ $store->name }} - {{ $store->currency }}</span>
                                                    <a  target="_blank" href="{{$store->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>             
                                                </span>
                                                <span class="tb-product">
                                                <span>{{ $store->created_at }}</span>
                                                </span>  
                                            </td>
                                                <td>                                                    
                                                    <span class="title">{{ $store->allproducts }}</span>
                                                </td>
                                                <td> 
                                                    <label class="badgepro badge-info badge-pill">{{ $store->sales }}</label>
                                                </td>
                                          
                                            @if($store->currency == "EUR" )
                                             <td>
                                                <label class="badgepro badge-success badge-pill">{{number_format($store->revenue, 2, ',', ' ')}} €</label>
                                          
                                             </td> 
                                              @endif

                                              @if($store->currency != "EUR" )
                                             <td>
                                                <label class="badgepro badge-success badge-pill">$ {{number_format($store->revenue, 2, ',', ' ')}}</label>
                                          
                                             </td> 
                                              @endif

                                            <!-- Add more data rows as needed -->
                                            <td>                         
                                            <a href="{{ route('account.stores.show',$store->id) }}" class="btn btn-info">Show Charts</a>
                                                <form action="{{ route('account.stores.destroy',$store->id) }}" method="Post">
                                                            @csrf
                                                            @method('DELETE')

                                                            @if (!currentTeam()->onTrial())
                                                            <button type="submit" class="btn btn-danger">Untrack Store</button>
                                                            @endif

                                                </form>                                             </td>
                                            <!-- Add more data rows as needed -->
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>

                        <div  wire:loading.class="invisible" class="my-4">
                            {{ $stores->links() }}
                            </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
                               
