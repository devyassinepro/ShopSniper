<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Products</h3>
                                            </br></br>
                                            </div><!-- .nk-block-head-content -->

                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ $message }}</p>
                                                </div>
                                              @endif
                                              @if(!currentTeam()->subscribed())
                                    <div class="alert alert-warning" role="alert">
                                    Welcome to Weenify. Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                                    </div>
                                    @endif 

                                  
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
                                                              placeholder="Search products"
                                                              class="form-control"
                                                          >
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="drodown">
                                                           
                                                            <select  id="filtreorder" wire:model="filtreorder" class="form-control">
                                                            <option value="revenue">Total revenue</option>
                                                            <option value="totalsales">Total sales</option>
                                                              <!-- <option value="todaysales">Today sales</option>
                                                              <option value="yesterdaysales">Yesterday sales</option> -->
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
                                

                                <!-- table sales  -->


                                <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                             <th scope="col"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Today</th>
                                            <th scope="col">Yesterday</th>
                                            <th scope="col">Total sales</th>
                                            <th scope="col"></th>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid1">
                                                    <label class="custom-control-label" for="pid1"></label>
                                                </div>
                                            </td>
                                            <td>
                                            <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="100" height="100"></a>
                                                       <a href="{{ route('account.product.show',$product->id) }}"><span class="title">{{ $product->title }} - $ {{ $product->prix }}</span>    </a>
                                                       <a  target="_blank" href="{{$product->url}}"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2068/64/_shopping-512.png" width="30" height="30"></a>
                                                       <a  target="_blank" href="https://www.facebook.com/ads/library/?active_status=all&ad_type=all&country=ALL&q={{urldecode($product->title)}}&search_type=keyword_unordered&media_type=all"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" width="30" height="30"></a>
                                                       <a  target="_blank" href="https://www.aliexpress.com/wholesale?SearchText={{urldecode($product->title)}}"> <img src="https://img.icons8.com/color/512/aliexpress.png" width="30" height="30"></a>
                                                  
                                            </td>
                                            <td> <label class="badgepro badge-success badge-pill">${{ $product->todaysales * $product->prix }}</label>
                                                  <label class="badgepro badge-info badge-pill">{{ $product->todaysales }}</label></td>
                                            <td>  <label class="badgepro badge-success badge-pill">${{ $product->yesterdaysales * $product->prix }}</label>
                                                   <label class="badgepro badge-info badge-pill">{{ $product->yesterdaysales }}</label></td>
                                            <td>     <label class="badgepro badge-success badge-pill">${{ $product->totalsales * $product->prix }}</label>
                                                   <label class="badgepro badge-info badge-pill">{{ $product->totalsales }}</label></td>
                                            <!-- Add more data rows as needed -->
                                            <td>                         
                                                <a  class="btn btn-success" href="{{ route('account.product.show',$product->id) }}" >View </a>
                                            </td>
                                            <!-- Add more data rows as needed -->
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>

                        <div  wire:loading.class="invisible" class="my-4">
                        {{ $products->links() }}
                            </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
                        