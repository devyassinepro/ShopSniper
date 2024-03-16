<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                            
                            </div><!-- .nk-block-head -->
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
                            timer: 5000,
                            timerProgressBar: true,
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Niche Added Successfuly',
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
                            timer: 5000,
                            timerProgressBar: true,
                            })
                            Toast.fire({
                                icon: 'error',
                                title: 'Niche Deleted',
                            })
                       </script>
                    @endif

                    
                    <div>
    </div>

                        <!-- <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                         </div> -->
                         <livewire:account.niches.niche-add />
                         <br><br>
                            <!-- new one  -->
                            <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Niche</span></div>
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Start Added</span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span></span></div>

                                        </div><!-- .nk-tb-item -->

                                        @foreach ($nicheall as $niche)

                                        <div class="nk-tb-item">

                                            <div class="nk-tb-col">{{ $niche->name }}   </div>
                                         
                                            <div class="nk-tb-col">{{ $niche->created_at }} </div>
                                           
                                            <div class="nk-tb-col tb-col-md">
                                            <button class="btn btn-lg btn-danger" wire:click="Remove({{ $niche->id }})" type="button" data-toggle="modal" data-target="#exampleModal" wire:loading.remove>
                                            DELETE
                                            </button>
                                            <button class="btn btn-lg btn-danger" type="button" wire:loading.delay >
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span>Loading...</span>
                                            </button>
                                            </div>
                                        
                                   
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                    </div> <!-- .END nk-block -->  

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true close-btn">×</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">
                                                            <p>Are you sure want to delete?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                                            <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <!-- EndModal --> 


                        </div>
                    </div>
                </div>