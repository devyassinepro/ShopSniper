
<div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="/" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('images/logo.png') }}" srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}" srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-search ms-3 ms-xl-0">
                                <em class="icon ni ni-search"></em>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything">
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="quick-icon border border-light">
                                            <img src="{{ asset('saas/svg/flags/'.app()->getLocale().'.svg') }}" alt="United States Flag">
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                                            <ul class="language-list">
                                            @foreach (language()->allowed() as $code => $name)
                                                <li>
                                                    <a href="#" class="language-item">
                                                        <span class="language-name">{{ $name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                             
                                            </ul>
                                        </div>
                                    </li><!-- .dropdown -->
                                                   <!-- Search form -->
                                    <ul class="navbar-nav align-items-center ml-md-auto">
                                        <li class="nav-item d-xl-none">
                                            <!-- Sidenav toggler -->
                                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                                                <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                <i class="sidenav-toggler-line"></i>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                        <livewire:notifications>
                                        </li>
                                        <!-- End Language -->

                                    </ul>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                <img alt="Image placeholder" src="{{ Auth::user()->profile_photo_url }}">
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('profile.show') }}"><em class="icon ni ni-user-alt"></em><span> {{ __('Profile') }}</span></a></li>
                                                    <li><a href="{{ route('account.password') }}"><em class="icon ni ni-setting-alt"></em><span>{{ __('Password') }}</span></a></li>
                                                    @role('admin')
                                                    <li><a href="{{ route('admin.index') }}"><em class="icon ni ni-activity-alt"></em><span> {{ __('Admin panel') }}</span></a></li>
                                                    @endrole
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                    <a class="px-0 dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <span class="dropdown-item-icon">
                                                        <i class="fas fa-power-off"></i>
                                                    </span>
                                                    {{ __('Logout') }}
                                                    </a>
                                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                        @csrf
                                                    </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>