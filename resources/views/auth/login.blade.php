<x-guest-layout>
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
                        <h1 class="h3">Login</h1>
                        <p class="text-muted">Please log in to access your account web-enabled methods of innovative
                            niches.</p>
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
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="email" class="mb-1">Email <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                        placeholder="Enter your email" name="email" :value="old('email')" required />
                                      <x-jet-input-error for="email"></x-jet-input-error>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <div class="input-group mb-3">
                                        <x-jet-input type="password" class="form-control form-control-lg" required id="password"
                                        placeholder="Enter your passcode" name="password" required autocomplete="current-password" />
                                        <x-jet-input-error for="password"></x-jet-input-error>                                        </div>
                                </div>
                                <div class="col-12">
                                    <x-jet-button>
                                        {{ __('Sign in') }}
                               </x-jet-button>
                                </div>
                        </div>
                            <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">Don’t have an
                                account? <a href="/register" class="text-decoration-none">Try 7 days free</a>
                                <br>
                                @if (Route::has('password.request'))
                                <a class="link link-primary link-sm" tabindex="-1" href="{{ route('password.request') }}">Forgot password?</a>
                                @endif
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--register section end-->
</div>
  
</x-guest-layout>