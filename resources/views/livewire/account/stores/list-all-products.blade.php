
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
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
                                 <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner">
                                        <!-- <h5 class="card-title">Web Store Setting</h5> -->
                                            <!-- <p>Here is your basic store setting of your website.</p> -->
                                            <h5>Store : {{$storedata->first()->name}}</h5>
                                              <h6>Url : {{$storedata->first()->shopifydomain}}</h6>
                                          
                                       </div>
                                      </div>
                                      </div>
                                            
    
        <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Filtres
      </button> -->
</br></br>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    All Products
                  </h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Today</th>
                          <th>Yesterday</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($products as $product)
                        <tr>
                          <td class="font-weight-bold">
                              <a href="{{ $product->url }}" target="_blank"><img src="{{ $product->imageproduct }}" width="150" height="150"></a>
                          </td>
                          <td class="font-weight-bold">
                              <a href="{{ route('account.productdata.show',['id' =>$product->id]) }}" wire:navigate>{{ $product->title }}</a>
                          </td>
                          <td>$ {{ $product->prix }}</td>
                          <td>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex" style="font-size: 16px; font-weight: bold;">${{ $product->todaysales * $product->prix }}</span>
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
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
                      


        </div>
        </main>
      </div>
    </div>

    </div>
    </div>
      </div>    
    </div>     