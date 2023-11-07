 <!-- sidebar @s -->
 <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="/" class="logo-link nk-sidebar-logo">
                            <!-- <img class="logo-small logo-img logo-img-small" src="{{ asset('images/logo-small.png') }}" srcset="{{ asset('images/logo-small2x.png ') }}" alt="logo-small"> -->
                            <img class="logo-light logo-img" src="{{ asset('images/logo.png') }}"  srcset="{{ asset('images/logo2x.png 2x') }}" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}"  srcset="{{ asset('images/logo-dark2x.png 2x') }}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{ asset('images/logo-small.png') }}"  srcset="{{ asset('images/logo-small2x.png 2x') }}" alt="logo-small">
                          </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="/dashboard" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Dashboard') }}</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <!-- <li class="nk-menu-item">
                                    <a href="{{ route('account.topstores.index') }}" class="nk-menu-link {{ return_if(on_page('account.tuto.index') OR on_page('account.tuto.index') OR on_page('account.tuto.index'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chart-up"></em></span>
                                        <span class="nk-menu-text">{{ __('Top Stores') }}</span>
                                    </a>
                                </li>.nk-menu-item -->

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-crosshair"></em></span>
                                        <span class="nk-menu-text">Sales Tracker</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                                <a href="{{ route('account.stores.index') }}" class="nk-menu-link {{ return_if(on_page('account.stores.index') OR on_page('account.stores.create') OR on_page('account.stores.edit'), ' active') }}">
                                                <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                                <span class="nk-menu-text">{{ __('Stores') }}</span>
                                                </a>
                                        </li>
                                      <li class="nk-menu-item">
                                            <a href="{{ route('account.product.index') }}" class="nk-menu-link {{ return_if(on_page('account.product.index') OR on_page('account.product.create') OR on_page('account.product.edit'), ' active') }}">
                                                <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                                                <span class="nk-menu-text">{{ __('Products') }}</span>
                                            </a>
                                      </li>
                                      <li class="nk-menu-item">
                                            <a href="{{ route('account.niches.index') }}" class="nk-menu-link {{ return_if(on_page('account.niches.index') OR on_page('account.niches.create') OR on_page('account.niches.edit'), ' active') }}">
                                            <span class="nk-menu-icon"><em class="icon ni ni-tag-fill"></em></span>
                                            <span class="nk-menu-text">{{ __('Niches') }}</span>
                                            </a>                                        
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <!-- <li class="nk-menu-item">
                                    <a href="{{ route('account.niches.index') }}" class="nk-menu-link {{ return_if(on_page('account.niches.index') OR on_page('account.niches.create') OR on_page('account.niches.edit'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tag-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Niches') }}</span>
                                    </a>
                                </li> -->
                                <!-- .nk-menu-item -->
                                <!-- <li class="nk-menu-item">
                                    <a href="{{ route('account.stores.index') }}" class="nk-menu-link {{ return_if(on_page('account.stores.index') OR on_page('account.stores.create') OR on_page('account.stores.edit'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Stores') }}</span>
                                    </a>
                                </li> -->
                                <!-- .nk-menu-item -->
                                <!-- <li class="nk-menu-item">
                                    <a href="{{ route('account.product.index') }}" class="nk-menu-link {{ return_if(on_page('account.product.index') OR on_page('account.product.create') OR on_page('account.product.edit'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Products') }}</span>
                                    </a>
                                </li> -->
                                <!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('account.trends.index') }}" class="nk-menu-link {{ return_if(on_page('account.trends.index') OR on_page('account.currenttrends.create') OR on_page('account.trends.edit'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Current Trends') }} <span class="badge badge-dim bg-primary rounded-pill">New</span></span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('account.researchproduct.index') }}" class="nk-menu-link {{ return_if(on_page('account.researchproduct.index'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-search"></em></span>
                                        <span class="nk-menu-text">{{ __('Product Research') }}</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-credit-card"></em></span>
                                        <span class="nk-menu-text">{{ __('Billing') }}</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions') }}" class="nk-menu-link  {{ return_if(on_page('account.subscriptions'), ' active') }}"><span class="nk-menu-text">  {{ __('Subscriptions') }}</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions.card') }}" class="nk-menu-link {{ return_if(on_page('account.subscriptions.card'), ' active') }}"><span class="nk-menu-text">  {{ __('Payment') }}</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions.invoices') }}" class="nk-menu-link {{ return_if(on_page('account.subscriptions.invoices'), ' active') }}"><span class="nk-menu-text">{{ __('Invoices') }}</span></a>
                                        </li>
                                        @if(!currentTeam()->subscribed())
                                        <li class="nk-menu-item">
                                            <a href="{{ route('subscription.plans') }}" class="nk-menu-link {{ return_if(on_page('subscription.plans'), ' active') }}"><span class="nk-menu-text">    {{ __('Plans') }}</span></a>
                                        </li>
                                        @endif
                                        @if (currentTeam()->onTrial())
                                        <li class="nk-menu-item">
                                            <a href="{{ route('account.subscriptions') }}" class="nk-menu-link {{ return_if(on_page('account.subscriptions') OR on_page('account.product.create') OR on_page('account.product.edit'), ' active') }}"><span class="nk-menu-text"> {{ __('Skip Trial Now ') }}</span></a>
                                        </li>
                                        @endif
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Return to</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('account.tuto.index') }}" class="nk-menu-link {{ return_if(on_page('account.tuto.index') OR on_page('account.tuto.index') OR on_page('account.tuto.index'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                                        <span class="nk-menu-text">{{ __('Tutorial') }}</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="{{ route('ticket.index') }}" class="nk-menu-link nk-menu-toggle {{ return_if(on_page('ticket.index') or on_page('ticket.create'), ' active') }}">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                                        <span class="nk-menu-text">  {{ __('Ticket') }}</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('ticket.index') }}" class="nk-menu-link"><span class="nk-menu-text"> {{ __('Support') }}</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('ticket.create') }}" class="nk-menu-link"><span class="nk-menu-text"> {{ __('New ticket') }}</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->