<div class="card">
                        @if(session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                                    
                        <div class="card">
                        <div class="alert alert-pro alert-primary">
                            <div class="alert-text">
                                               
                                                <form wire:submit="save" >
                                                   @csrf
                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text"  wire:model="name" placeholder="Niche like Facebook , Beauty ..." class="form-control" >
                                                                </div>
                                                                <div>@error('name') {{ $message }} @enderror</div>

                                                            </div>
                                                        </div>
                                                      @error('niche')
                                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                      @enderror
                                                      
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Save Niche</button>
                                                                <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                <span>Loading...</span>
                                                                </button>

                                                            </div>
                                                           
                                                        </div>


                                                    </div>
                                                </form>
                                                </div>
                            </div>
                            </div>  <!-- card -->
                                             
</div>        <!-- Card -->

                 
                      