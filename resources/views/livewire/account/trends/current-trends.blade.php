<div class="nk-content ">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <br> 
                <div class="nk-block">
                @if(!currentTeam()->subscribed())                   
                <div class="alert alert-icon alert-warning" role="alert">
                    <em class="icon ni ni-alert-circle"></em> 
                    <strong>Welcome to Weenify.</strong> Visit the <a href="{{ route('subscription.plans') }}">billing page</a> to activate a Trial plan.
                </div>
                @endif
                </div>
<!-- card container  -->

                <div class="container-fluid">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                               
                                <!-- Header -->
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Current Trends</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have top Winning Products.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                            <!-- Loading -->
                            <div wire:loading.delay>
                                    <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                                <div class="la-square-jelly-box la-3x">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                    </div>
                            </div>
                            <!-- End Loading -->



<livewire:account.trends.compcurrenttrends lazy />

</div>