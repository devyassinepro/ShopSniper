<x-guest-layout>
<div class="nk-main">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
        <!-- content @s -->
        <div class="nk-content">
            <div class="nk-split nk-split-page nk-split-lg">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                        <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                    </div>
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <div class="brand-logo pb-5">
                           
                        </div>
                        <x-jet-validation-errors class="mb-4" />

                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Register</h5>
                                <div class="nk-block-des">
                                    <p>Create New Weenify Account</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name" required autofocus>
                                </div>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email or Username</label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address or username" required>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Passcode</label>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your passcode" required>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="repassword">Confirm Password</label>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="repassword">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" class="form-control form-control-lg" id="repassword" name="password_confirmation" placeholder="Renter your passcode" required>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-control-xs custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox" required>
                                    <label class="custom-control-label" for="checkbox">I agree to Weenify <a tabindex="-1" href="/privacypolicy">Privacy Policy</a></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                            </div>
                        </form><!-- form -->
                        <div class="form-note-s2 pt-4">Already have an account? <a href="{{ route('login') }}"><strong>Sign in </strong></a></div>
                        <!-- <div class="text-center pt-4 pb-3">
                            <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                        </div>
                        <ul class="nav justify-center gx-8">
                            <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                        </ul> -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-auth-footer">
                        <div class="nk-block-between">
                            <ul class="nav nav-sm">
                                <li class="nav-item">
                                    <a class="nav-link" href="/TermsandConditions">Terms & Condition</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/privacypolicy">Privacy Policy</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Help</a>
                                </li>
                              -->
                            </ul><!-- nav -->
                        </div>
                        <div class="mt-3">
                            <p>&copy; 2024 Weenify. All Rights Reserved.</p>
                        </div>
                    </div><!-- nk-block -->
                </div><!-- nk-split-content -->

                <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="./images/slides/promo-a.png" srcset="./images/slides/promo-a2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Weenify</h4>
                                                <p>Unlock Real-Time Access to Store Product Offerings and Revenue Data with Dropship, Empowering You to Identify Winning Products and Mitigate the Risk of Selling Low-Performing Items.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
</x-guest-layout>