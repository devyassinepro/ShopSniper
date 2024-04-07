<div class="row">
            <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                        </div>   
                        <div class="col-md-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body"> 
                                <div class="card-title-group pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Top 10 Products</h6>
                                        <p>Sales trending Products.</p>
                                    </div>
                                    <div class="card-tools shrink-0 d-none d-sm-block">
                                         <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                            <li class="nav-item"><a href="#" wire:click.prevent="updateOrderBy('yesterdaysales')" wire:model.live="filtreorderby" class="nav-link">Yesteday</a></li>
                                            <li class="nav-item"><a href="#"  wire:click.prevent="updateOrderBy('todaysales')" wire:model.live="filtreorderby" class="nav-link">Today</a></li>
                                            <li class="nav-item"><a href="#" wire:click.prevent="updateOrderBy('totalsales')" wire:model.live="filtreorderby" class="nav-link">Total</a></li>
                                        </ul>
                                    </div>
                                </div>
                            <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                          
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Today</th>
                                            <th scope="col">Yesterday</th>
                                            <th scope="col">Total</th>
                                            <th scope="col"></th>
                                          
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($products as $product)

                                        @if($storedata->first()->currency != "EUR" )
                                    <tr>
                                      <td class="font-weight-bold">
                                          <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="200" height="200"></a>
                                      </td>
                                      <td class="font-weight-bold">
                                          <a href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate>{{ $product->title }}</a>
                                      </td>
                                      <td>$ {{ $product->prix }}</td>
                                      <td>
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">$ {{ $product->todaysales * $product->prix }}</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales }}</span>          
                                      </td>
                                      <td>
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->yesterdaysales * $product->prix }}</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales }}</span>          
                                    
                                      </td>
                                      <td>
                                        <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->totalsales * $product->prix }}</span>
                                        <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales }}</span>          
                                    
                                      </td>
                                      <td><a  class="btn btn-success" href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate >View </a></td>
                          </td>
                                    </tr>
                                    @endif
                                    @if($storedata->first()->currency == "EUR" )
                                        <tr>
                                        <td class="font-weight-bold">
                                            <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="200" height="200"></a>
                                        </td>
                                        <td class="font-weight-bold">
                                            <a href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate>{{ $product->title }}</a>
                                        </td>
                                        <td>{{ $product->prix }} €</td>
                                        <td>
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales_count * $product->prix }}€</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->todaysales_count }}</span>          
                                        </td>
                                        <td>
                                                <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales_count * $product->prix }}€</span>
                                                <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->yesterdaysales_count }}</span>          
                                        
                                        </td>
                                        <td>
                                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales * $product->prix }}€</span>
                                            <span class="badge badge-sm badge-dot has-bg bg-primary d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">{{ $product->totalsales }}</span>          
                                        </td>

                                        <td><a  class="btn btn-success" href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate >View </a></td>
                                        </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                        </tbody>
                                    </table>
                                    </div>



                </div>
            </div>
        </div>
</div>