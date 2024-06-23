<div class="nk-content ">
            <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">   </div><!-- .nk-block-head -->
                                <div>
                            </div> 

                            <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                   
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"></h3>
                                        </div>
                                        <!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                         
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">

                                        <div class="dropdown">
                                         <!-- Button to trigger the dropdown -->
                                            <a href="#" 
                                            class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" 
                                            data-bs-toggle="dropdown">
                                            {{ $changestore ? $changestore : 'Change Store' }}
                                            </a>
                                            
                                            <!-- Dropdown menu -->
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <!-- Loop through each store and create a dropdown item -->
                                                    @foreach($stores as $store)
                                                        <li>
                                                            <a href="#" 
                                                            wire:click.prevent="changeStore('{{ $store->store_id }}')" 
                                                            wire:model.live="changestore" 
                                                            class="{{ $store->store_id == $activeStore ? 'active' : '' }}">
                                                            <span>{{ $store->name }} - {{ $store->myshopify_domain }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>


                                            <a href="#" data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Connect Shopify Store</span></a>

                                              
                                                </li>
                                                    
                                                </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                            </div>
    
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Connect Shopify Store</h5>
                                          
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="row g-3">
                                        <form wire:submit.prevent="savesecret" class="gy-3">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Your shop name / store URL</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"  wire:model="urlshopify" class="form-control" id="site-name" placeholder="example.myshopify.com">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="category">Access token</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="urltoken" class="form-control" id="site-name" placeholder="shpat_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Api Key</label>
                                                    <div class="form-control-wrap">
                                                        <!-- <input type="text" class="form-control" id="tags"> -->
                                                        <input type="text" class="form-control" wire:model="apikey" id="site-name" placeholder="Api key">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Api Secret</label>
                                                    <div class="form-control-wrap">
                                                        <!-- <input type="text" class="form-control" id="tags"> -->
                                                        <input type="text" class="form-control" wire:model="apisecret" id="site-name" placeholder="Api Secret">
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-12">
                                                <!-- <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button> -->
                                                <button type="submit" class="btn btn-lg btn-primary">Connect Store</button>

                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                </div>
                       
            <!-- Test Content -->
<!-- content @e -->
<div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Product Importer</h3>
                        </div><!-- .nk-block-head-content -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-grid-fill"></em><span>Import Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabItem6"><em class="icon ni ni-crosshair"></em><span>Import Store</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabItem7"><em class="icon ni ni-setting"></em><span>Settings</span></a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tabItem5">
            <form wire:submit.prevent="importsingleproduct" class="gy-3 form-settings">
                                        @csrf
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="url-single-product">Product URL</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="Url Product">
                                                        <div>@error('urlsingle') {{ $message }} @enderror</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"></label>
                                                    <div class="form-control-wrap">
                                                        <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Import</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
            </div>
            <div class="tab-pane" id="tabItem6">
            <form wire:submit.prevent="importstore" class="gy-3 form-settings">
                                        @csrf
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="url-store">Store URL</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="url-store" wire:model="url" class="form-control" placeholder="Url Store">
                                                        <div>@error('url') {{ $message }} @enderror</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"></label>
                                                    <div class="form-control-wrap">
                                                        <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Import</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
            </div>
            <div class="tab-pane" id="tabItem7">
               
            <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Shopify Stores
                  </h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="font-size: 18px; font-weight: bold;">Myshopify</th>
                          <th style="font-size: 18px; font-weight: bold;">Email</th>
                          <th style="font-size: 18px; font-weight: bold;">Name</th>
                          <th style="font-size: 18px; font-weight: bold;">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($stores as $store)
                        <tr>

                        <td style="font-size: 18px; font-weight: bold;">{{ $store->myshopify_domain }}</td>
                        <td style="font-size: 18px; font-weight: bold;">{{ $store->email }}</td>
                        <td style="font-size: 18px; font-weight: bold;">{{ $store->name }}</td>
                        <td style="font-size: 18px; font-weight: bold;">{{ $store->status }}</td>
     
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
        </div>


    </div>

</div>

</div>
