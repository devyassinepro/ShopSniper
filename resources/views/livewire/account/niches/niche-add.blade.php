<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                @if(session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
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
                        <div class="nk-block nk-block-lg">
                                       
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="card-head">
                                                    <h5 class="card-title">Niche</h5>
                                                </div>
                                                <form wire:submit="save" >
                                                   @csrf
                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text"  wire:model="name" placeholder="like Facebook , Beauty ..." class="form-control" >
                                                                </div>
                                                                <div>@error('name') {{ $message }} @enderror</div>

                                                            </div>
                                                        </div>
                                                      @error('niche')
                                                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                      @enderror
                                                      
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                 
                        </div>
                      </div>
                        </div>
                          </div>