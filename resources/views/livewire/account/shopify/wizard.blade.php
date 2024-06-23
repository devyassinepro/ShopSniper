<div>
    <br> <br>
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
                                                <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Connect Store</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                            </div>
                                        </div>
</div><!-- .nk-block -->

</div>
