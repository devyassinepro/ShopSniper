<x-guest-layout> <div class="main-wrapper">

<div class="main-wrapper">

@if (session('status'))
<div class="mb-3 alert alert-success rounded-0" role="alert">
    {{ session('status') }}
</div>
 @endif
    <!--register section start-->
    <section class="sign-up-in-section bg-dark ptb-60" style="background: url('assets/img/page-header-bg.svg')no-repeat right bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-8 col-12">
                    <a href="/" class="mb-4 d-block text-center"><img src="assets/img/logo.png" alt="logo" class="img-fluid"></a>
                    <div class="register-wrap p-5 bg-light-subtle shadow rounded-custom">
                        <h1 class="h3">Try Weenify.io For Free</h1>
                        <p class="text-muted">Get started - it's quick</p>

                        <div class="action-btns">
                            <a href="#" class="btn google-btn bg-white shadow-sm mt-4 d-block d-flex align-items-center text-decoration-none justify-content-center">
                                <img src="assets/img/google-icon.svg" alt="google" class="me-3">
                                <span>Connect with Google</span>
                            </a>
                        </div>
                        <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                            <span class="divider-bar"></span>
                            <h6 class="position-absolute text-center divider-text bg-light-subtle mb-0">Or</h6>
                        </div>
                        <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row">
                                <div class="col-sm-12">
                                    <label for="name" class="mb-1">Name <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name" required autofocus>
                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                             
                                <div class="col-sm-12">
                                    <label for="email" class="mb-1">Email <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address or username" required>
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <label for="password" class="mb-1">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
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
                                <div class="col-sm-12">
                                    <label for="password" class="mb-1">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
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
                                <div class="col-12">
                                    <div class="form-check d-flex">
                                        <input type="checkbox" class="custom-control-input" id="checkbox" required>
                                        <label class="custom-control-label" for="checkbox">I agree to Weenify <a tabindex="-1" href="/privacypolicy">Privacy Policy</a></label>
                                   
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </div>
                            <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                                <span class="divider-bar"></span>
                                <h6 class="position-absolute text-center divider-text bg-light-subtle mb-0">Or</h6>
                            </div>
                            <div class="action-btns">
                                <a href="#" class="btn google-btn mt-4 d-block bg-white shadow-sm d-flex align-items-center text-decoration-none justify-content-center">
                                    <img src="assets/img/google-icon.svg" alt="google" class="me-3">
                                    <span>Sign up with Google</span>
                                </a>
                            </div>
                            <p class="text-center text-muted mt-4 mb-0 fw-medium font-monospace">Already have an
                                account? <a href="/login" class="text-decoration-none">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--register section end-->
</div>
</x-guest-layout>