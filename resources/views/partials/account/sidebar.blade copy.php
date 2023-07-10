<nav class="bg-white sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" id="sidenav-main">

    <div class="scrollbar-inner">

        <!-- Brand -->

        <div class="sidenav-header d-flex align-items-center">

            <a class="navbar-brand" href="{{ route('home') }}">

                <img src="{{ asset('saas/img/logo.png') }}" class="navbar-brand-img" alt="knine" style="max-height: 4rem;padding-left: 12px;">

            </a>

            <div class="ml-auto">

                <!-- Sidenav toggler -->

                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"

                    data-target="#sidenav-main">

                    <div class="sidenav-toggler-inner">

                        <i class="sidenav-toggler-line"></i>

                        <i class="sidenav-toggler-line"></i>

                        <i class="sidenav-toggler-line"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="navbar-inner">

            <!-- Collapse -->

            <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                <!-- Nav items -->

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link {{ return_if(on_page('/dashboard'), ' active') }}"

                            href="/dashboard">

                            <i class="fas fa-tachometer-alt"></i>

                            <span class="nav-link-text">{{ __('Dashboard') }}</span>

                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ return_if(on_page('account.tuto.index') OR on_page('account.tuto.index') OR on_page('account.tuto.index'), ' active') }}" href="{{ route('account.topstores.index') }}">
                            <i class="fas fa-store"></i>
                            <span class="nav-link-text">{{ __('Top Stores') }}</span>
                        </a>
                    </li>
                    <hr class="my-2">
                    <li class="nav-item">
                        <a class="nav-link {{ return_if(on_page('account.niches.index') OR on_page('account.niches.create') OR on_page('account.niches.edit'), ' active') }}" href="{{ route('account.niches.index') }}">
                            <i class="fas fa-tag"></i>
                            <span class="nav-link-text">{{ __('Niches') }}</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ return_if(on_page('account.stores.index') OR on_page('account.stores.create') OR on_page('account.stores.edit'), ' active') }}" href="{{ route('account.stores.index') }}">
                            <i class="fas fa-shopping-bag"></i>
                            <span class="nav-link-text">{{ __('Stores') }}</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ return_if(on_page('account.product.index') OR on_page('account.product.create') OR on_page('account.product.edit'), ' active') }}" href="{{ route('account.product.index') }}">
                            <i class="fas fa-database"></i>
                            <span class="nav-link-text">{{ __('Products') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ return_if(on_page('account.subscriptions') or on_page('account.subscriptions.card') or on_page('account.subscriptions.invoices') or on_page('subscription.plans'), ' active') }}" href="#navbar-plans" data-toggle="collapse" role="button"

                        aria-expanded="false" aria-controls="navbar-forms">

                        <i class="fas fa-money-check-alt nav-icon"></i>

                            <span class="nav-link-text">{{ __('Billing') }}</span>

                        </a>

                        <div class="collapse" id="navbar-plans">

                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">

                                        <a class="nav-link {{ return_if(on_page('account.subscriptions'), ' active') }}"

                                            href="{{ route('account.subscriptions') }}">

                                            {{ __('Subscriptions') }}

                                        </a>

                                    </li>

                                    @if(currentTeam()->subscribed())

                                    <li class="nav-item">

                                        <a class="nav-link {{ return_if(on_page('account.subscriptions.card'), ' active') }}" href="{{ route('account.subscriptions.card') }}">

                                        {{ __('Payment') }}

                                        </a>

                                    </li>

                                    <li class="nav-item">

                                        <a href="{{ route('account.subscriptions.invoices') }}" class="nav-link {{ return_if(on_page('account.subscriptions.invoices'), ' active') }}">

                                        {{ __('Invoices') }}

                                        </a>

                                    </li>

                                    @endif

                                    @if(!currentTeam()->subscribed())

                                    <li class="nav-item">

                                        <a href="{{ route('subscription.plans') }}" class="nav-link {{ return_if(on_page('subscription.plans'), ' active') }}">

                                        {{ __('Plans') }}
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @if (currentTeam()->onTrial())
                            <li class="nav-item">
                        <a class="nav-link {{ return_if(on_page('account.subscriptions') OR on_page('account.product.create') OR on_page('account.product.edit'), ' active') }}" href="{{ route('account.subscriptions') }}">
                            <span class="nav-link-text">{{ __('Skip Trial Now ') }}</span>
                        </a>
                        @endif
                    </li>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ return_if(on_page('account.tuto.index') OR on_page('account.tuto.index') OR on_page('account.tuto.index'), ' active') }}" href="{{ route('account.tuto.index') }}">
                            <i class="fas fa-book-open"></i>
                            <span class="nav-link-text">{{ __('Tutorial') }}</span>
                        </a>
                    </li>

                    <!-- End List -->

                    <li class="nav-item">

                        <a class="nav-link{{ return_if(on_page('ticket.index') or on_page('ticket.create'), ' active') }}" href="#navbar-tickets" data-toggle="collapse" role="button"

                            aria-expanded="false" aria-controls="navbar-forms">

                            <i class="fas fa-ticket-alt"></i>

                            <span class="nav-link-text">{{ __('Ticket') }}</span>

                        </a>

                        <div class="collapse" id="navbar-tickets">

                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">

                                    <a class="nav-link{{ return_if(on_page('ticket.index'), ' active') }}"

                                        href="{{ route('ticket.index') }}">

                                        <i class="fas fa-clipboard-check"></i>

                                        {{ __('Support') }}

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link{{ return_if(on_page('ticket.create'), ' active') }}"

                                        href="{{ route('ticket.create') }}">

                                        <i class="far fa-plus-square"></i>

                                        {{ __('New ticket') }}

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </li>



                </ul>

                <!-- Divider -->

                <hr class="my-3">


                <!-- Heading -->

                <!-- Navigation -->

            </div>

        </div>

    </div>

</nav>
