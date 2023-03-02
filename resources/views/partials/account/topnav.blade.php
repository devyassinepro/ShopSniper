<nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="hs-unfold">
                <a class="pr-0 nav-link btn btn-outline-info" href="#" role="button" data-toggle="dropdown" style="background-color:transparent; border:0px;"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="media-body d-none d-lg-block">
                      <img src="{{ asset('saas/svg/flags/'.app()->getLocale().'.svg') }}" alt="United States Flag">
                      <span>{{ app()->getLocale()  }}</span>
                    </div>
                </a>

                <div id="footerLanguage" class="hs-unfold-content dropdown-menu dropdown-unfold dropdown-menu-bottom mb-2">
                  @foreach (language()->allowed() as $code => $name)
                    <a class="dropdown-item" href="{{ language()->back($code) }}">{{ $name }}</a>
                  @endforeach
                </div>
              </div>
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
                <ul class="ml-auto navbar-nav align-items-center ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="pr-0 nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ Auth::user()->profile_photo_url }}">
                                </span>
                                <div class="ml-2 media-body d-none d-lg-block">
                                    <span class="mb-0 text-sm font-weight-bold">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                    <div class="py-3 card-body">
                        <a class="px-0 dropdown-item" href="{{ route('profile.show') }}">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-user"></i>
                          </span>
                          {{ __('Profile') }}
                        </a>
                        <a class="px-0 dropdown-item" href="{{ route('account.password') }}">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-unlock-alt"></i>
                          </span>
                          {{ __('Password') }}
                        </a>
                        @role('admin')
                        <a class="px-0 dropdown-item" target="__blank" href="{{ route('admin.index') }}">
                          <span class="dropdown-item-icon">
                            <i class="fas fa-tachometer-alt"></i>
                          </span>
                          {{ __('Admin panel') }}
                        </a>
                        @endrole
                        @auth
                        @if (Request::is('/'))
                          <!-- Team Switcher -->
                          <h6 class="px-0 dropdown-item">
                            <span class="dropdown-item-icon">
                              <i class="fas fa-users"></i>
                            </span>
                              {{ __('SWITCH TEAMES') }}
                          </h6>
                          @foreach (Auth::user()->allTeams() as $team)
                              <x-jet-switchable-team :team="$team" />
                          @endforeach
                        @endif
                        @endauth
                        <div class="dropdown-divider"></div>
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
        </div>
    </nav>
