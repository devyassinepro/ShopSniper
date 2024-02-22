
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
          @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
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

        <div class="nk-block nk-block-lg">
                                       
                                       <div class="card">
                                           <div class="card-inner">
                                               <div class="card-head">
                                                   <h5 class="card-title">Store</h5>
                                               </div>
                                               <form wire:submit="save">
                                                  @csrf
                                                   <div class="row g-4">
                                                       <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <div class="form-control-wrap">
                                                                   <input type="text" wire:model="url" class="form-control" placeholder="Url Store Shopify">
                                                                 
                                                                      <div>@error('url') {{ $message }} @enderror</div>
                                                                  </div>
                                                                </div>
                                                       </div>
                                                     @error('niche')
                                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                     @enderror

                                                     <div class="col-lg-6">
                                                           <div class="form-group">
                                                               <div class="form-control-wrap">
                                                               <select wire:model="nicheid" class="form-control">
                                                                  @foreach ($allniches as $niche)
                                                                  <option value="{{ $niche->id }}" >{{ $niche->name }}</option>
                                                                  @endforeach
                                                                </select>
                                                                </div>
                                                       </div>
                                                       <div>@error('nicheid') {{ $message }} @enderror</div>

                                                     
                                                       <div class="col-12">
                                                           <div class="form-group">
                                                               <button type="submit" class="btn btn-lg btn-primary">Add Shop</button>
                                                               
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