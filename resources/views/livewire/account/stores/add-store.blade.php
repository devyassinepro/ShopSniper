<div class="nk-block nk-block-lg">

        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif

@if ($message = Session::get('success'))
                       <script>
                       const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Success',
                            })
                       </script>
                    @endif
                    @if ($message = Session::get('deleted'))
                       <script>
                       const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            })
                            Toast.fire({
                                icon: 'error',
                                title: 'Deleted',
                            })
                       </script>
                    @endif
                                                              
                            <div class="card">
                                            <div class="card-inner">
                                               
                                                <form wire:submit="save">
                                                  @csrf
                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name-1">Url Store</label>
                                                                <div class="form-control-wrap">
                                                                <input type="text" wire:model="url" class="form-control" placeholder="Url Store Shopify">
                                                                 
                                                                 <div>@error('url') {{ $message }} @enderror</div>                                                                </div>
                                                            </div>
                                                        </div>
                                                    @error('niche')
                                                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                     @enderror
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email-address-1">Niche</label>
                                                                <div class="form-control-wrap">
                                                                <select wire:model="nicheid" class="form-control">
                                                                  @foreach ($allniches as $niche)
                                                                  <option value="{{ $niche->id }}" >{{ $niche->name }}</option>
                                                                  @endforeach
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>@error('nicheid') {{ $message }} @enderror</div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no-1"></label>
                                                                <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">Add Shop</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                       
                                                        
                                                        
                                                        <div class="col-12">
                                                           
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                  

                    </div>


</div><!-- .nk-block -->
                
        