<div class="nk-content-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @endif
                            <div class="nk-block">
                            @if(!currentTeam()->subscribed())
                                                
                            <div class="alert alert-icon alert-warning" role="alert">
                                <em class="icon ni ni-alert-circle"></em> 
                                <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                            </div>
                            @endif
                            </div>
                                    <div class="alert alert-pro alert-primary">

                                                <div class="user-toggle">
                                                        <div class="user-avatar lg">
                                                        <em class="icon ni ni-package-fill"></em>
                                                        </div>

                                                <div class="user-info">
                                                    <h3>Sales Tracker</h3>
                                                    <h6>Track sales of products</h6>
                                                </div>
                                                </div>

                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"></h3>
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
                                                                        wire:model.live.debounce.500ms="search"
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
                                                                <a href="#" wire:click.prevent="updateOrderBy('revenue')" wire:model.live="filtreorderby">
                                                                    <span>Total revenue</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('totalsales')" wire:model.live="filtreorderby">
                                                                    <span>Total sales</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('todaysales')" wire:model.live="filtreorderby">
                                                                    <span>Today sales</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updateOrderBy('yesterdaysales')" wire:model.live="filtreorderby">
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
                                                                <a href="#" wire:click.prevent="updatePagination('25')" wire:model.live="filtrePagination">
                                                                    <span>25</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updatePagination('50')" wire:model.live="filtrePagination">
                                                                    <span>50</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" wire:click.prevent="updatePagination('100')" wire:model.live="filtrePagination">
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

                            </div>
                                  
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
                                
                                <!-- new TAB -->
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Product</span></div>
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span></span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span class="d-none d-sm-block">Price</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Today</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Yesterday</span></div>
                                            <div class="nk-tb-col tb-col-sm" style="font-size: 16px; font-weight: bold;"><span>Total sales</span></div>
                                            <!-- <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Expand</span></div> -->

                                            <div class="nk-tb-col nk-tb-col-tools">  </div>
                                          
                                        </div><!-- .nk-tb-item -->

                                        @foreach ($products as $product)

                                        <div class="nk-tb-item">

                                            <div class="nk-tb-col">
                                                <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                                            </div>
                                            <div class="nk-tb-col">
                                                    <a href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate><h6>{{ $product->title }}</h6></a>
                                                    <a target="_blank" href="{{ $product->url }}">{{ parse_url($product->url, PHP_URL_HOST) }}</a>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <a  target="_blank" href="{{$product->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($product->title)}}&search_type=keyword_unordered&media_type=all"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" width="30" height="30"></a>
                                                <a  target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($product->title)}}"> <img src="https://img.icons8.com/color/512/aliexpress.png" width="30" height="30"></a>
                                      
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                       <h6>$ {{ $product->prix }}</h6> 
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                      <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->todaysales * $product->prix }}</span>
                                                      <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales }}</span>
                                            </div>

                                            <div class="nk-tb-col tb-col-sm">
                                                        <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->yesterdaysales * $product->prix }}</span>
                                                        <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales }}</span>
                                            </div>

                                            <div class="nk-tb-col tb-col-sm">
                                                    <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->totalsales * $product->prix }}</span>
                                                    <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales }}</span>
                                            </div>

        
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate class="btn btn-icon btn-trigger btn-tooltip" title="Show Charts">
                                                            <em class="icon ni ni-eye"></em></a></li>
                                                    <li>
                                                        <div class="drodown me-n1">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate><em class="icon ni ni-eye"></em><span>Show Charts</span></a></li>
                                                                    <li><a wire:click="exportToCsv('{{ $product->url }}')" class="btn btn-white btn-dim btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#95bf46}</style><path d="M388.32,104.1a4.66,4.66,0,0,0-4.4-4c-2,0-37.23-.8-37.23-.8s-21.61-20.82-29.62-28.83V503.2L442.76,472S388.72,106.5,388.32,104.1ZM288.65,70.47a116.67,116.67,0,0,0-7.21-17.61C271,32.85,255.42,22,237,22a15,15,0,0,0-4,.4c-.4-.8-1.2-1.2-1.6-2C223.4,11.63,213,7.63,200.58,8c-24,.8-48,18-67.25,48.83-13.61,21.62-24,48.84-26.82,70.06-27.62,8.4-46.83,14.41-47.23,14.81-14,4.4-14.41,4.8-16,18-1.2,10-38,291.82-38,291.82L307.86,504V65.67a41.66,41.66,0,0,0-4.4.4S297.86,67.67,288.65,70.47ZM233.41,87.69c-16,4.8-33.63,10.4-50.84,15.61,4.8-18.82,14.41-37.63,25.62-50,4.4-4.4,10.41-9.61,17.21-12.81C232.21,54.86,233.81,74.48,233.41,87.69ZM200.58,24.44A27.49,27.49,0,0,1,215,28c-6.4,3.2-12.81,8.41-18.81,14.41-15.21,16.42-26.82,42-31.62,66.45-14.42,4.41-28.83,8.81-42,12.81C131.33,83.28,163.75,25.24,200.58,24.44ZM154.15,244.61c1.6,25.61,69.25,31.22,73.25,91.66,2.8,47.64-25.22,80.06-65.65,82.47-48.83,3.2-75.65-25.62-75.65-25.62l10.4-44s26.82,20.42,48.44,18.82c14-.8,19.22-12.41,18.81-20.42-2-33.62-57.24-31.62-60.84-86.86-3.2-46.44,27.22-93.27,94.47-97.68,26-1.6,39.23,4.81,39.23,4.81L221.4,225.39s-17.21-8-37.63-6.4C154.15,221,153.75,239.8,154.15,244.61ZM249.42,82.88c0-12-1.6-29.22-7.21-43.63,18.42,3.6,27.22,24,31.23,36.43Q262.63,78.68,249.42,82.88Z"/></svg><span>Import product</span></a></li>                                                         
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                    </div> <!-- .END nk-block -->  
                            <!-- .pagination Start -->

                                <div class="card">
                                    <div class="card-inner">
                                     <div class="nk-block-between-md g-3">
                                                <div class="g"> </div>

                                            <div class="g">
                                                           
                                                    <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                                    <ul class="pagination">
                                                                        @if ($products->currentPage() > 1)
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

                                                                        @if ($products->currentPage() < $products->lastPage())
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
                                                                         <!-- <select class="form-select js-select2" data-search="on" data-dropdown="xs center" wire:model.live="page">
                                                                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select> -->
                                                                   
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown"> {{ $products->currentPage()  }} </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <!-- Default option without filter -->
                                                                <!-- Other pagination options -->

                                                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                                <li>
                                                                    <a class="page-link" wire:click="gotoPage({{ $i }})">
                                                                        <span>{{ $i }}</span>
                                                                    </a>
                                                                </li>

                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                 </div><!-- g -->
                                                                    <div>OF {{ $products->lastPage() }}</div>
                                                    </div>
                                                </div>
                                            </div>
                            <!-- .pagination END -->

                      
</div>     <!-- . END nk-content-body --> 
                    
                        