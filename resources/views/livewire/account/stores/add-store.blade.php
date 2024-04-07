<div class="nk-block nk-block-lg">
                                                              
                            <div class="card">
                        <div class="alert alert-pro alert-primary">
                            <div class="alert-text">
                         
                            <form wire:submit="save">
                                                  @csrf
                                                    <div class="row g-6">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Url Store</label>
                                                                <div class="form-control-wrap">
                                                                <input type="text" wire:model="url" class="form-control" placeholder="Url Store Shopify">
                                                                
                                                                 <div>@error('url') {{ $message }} @enderror</div>                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="email-address-1">Niche</label>
                                                                
                                                                    <div class="form-control-wrap">
                                                                    
                                                                        <select wire:model="nicheoption" name='nicheoption'>
                                                                        @foreach($allniches as $niche)
                                                                        <option value="{{ $niche->id }}">{{ $niche->name }} - {{ $niche->id }}</option>
                                                                        @endforeach
                                                                        </select>
       
                                                                    </div>
                                                                </div>
                                                                   
                                                        </div>

                                                        <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="email-address-1"></label>
                                                                
                                                                    <div class="form-control-wrap">
                                                                    
                                                                    <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Start Tracking</button>
                                                                    <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                    <span>Loading...</span>
                                                                    </button>

                                                                    </div>
                                                                </div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="email-address-1"></label>                     
                                                                    <div class="form-control-wrap">
                                                                    <a class="btn btn-lg btn-primary">Stores {{ $totalstores }}/ {{ $storelimit }}</a>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    
                                                    @error('niche')
                                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                     @enderror
                                                              
                                                    <div>@error('nicheid') {{ $message }} @enderror</div>

                                            
                                                       
                                                        </div>
                                                       
                                                    </div>
                                                </form>
                            </div>
                            </div>
                            </div>  <!-- card -->
                                       


</div><!-- .nk-block -->
                
        