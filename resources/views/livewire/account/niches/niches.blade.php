
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                  
                                </div><!-- .nk-block-head -->
          <a class="btn btn-primary" href="{{ route('account.AddNiches.index') }}" wire:navigate>Add Niche</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->

        </br></br>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div>
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
    </div>

                        <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                         </div>

                            <div class="table-responsive">
                                    <table class="table table-fixed">
                                        <thead>
                                        <tr>
                                            <th scope="col">Niche</th>
                                            <th scope="col">Start Added</th>
                                            <th scope="col"></th>

                                          
                                            <!-- Add more columns as needed -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($nicheall as $niche)
                                        <tr>
                                            <td>
                                                 <span class="tb-odr-id"><a href="#">{{ $niche->name }}</a></span>
                                            </td>
                                           
                                            <td> 
                                            <span class="amount">{{ $niche->created_at }}</span>
                                            </td>
                                            
                                            <td>   
                                            <td>
                                            <button type="button" wire:click="Remove({{ $niche->id }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

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
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>