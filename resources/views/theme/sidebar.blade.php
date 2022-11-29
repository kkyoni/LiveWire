<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="fw-semibold text-dual" href="{{ route('dashboard') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">FEEI</span>
        </a>
        <div>
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link @if (Request::segment('1') == 'dashboard') active @endif"
                        href="{{ route('dashboard') }}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">{{ __('messages.Dashboard') }}</span>
                    </a>
                </li>

                @if (\App\Helpers\Helper::checkPermission(['organisations.show']))
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'organisations') active @endif"
                            href="{{ route('organisations.index') }}">
                            <i class="nav-main-link-icon fa fa-building"></i>
                            <span class="nav-main-link-name">{{ __('messages.Organisations') }}</span>
                        </a>
                    </li>
                @endif

                @if (\App\Helpers\Helper::checkPermission(['branchoffice.show']))
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'branchoffice') active @endif"
                            href="{{ route('branchoffice.index') }}">
                            <i class="nav-main-link-icon fa fa-code-branch"></i>
                            <span class="nav-main-link-name">{{ __('messages.Branchoffice') }}</span>
                        </a>
                    </li>
                @endif

                @if (\App\Helpers\Helper::checkPermission(['persons.show']))
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'persons') active @endif"
                            href="{{ route('persons.index') }}">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">{{ __('messages.Persons') }}</span>
                        </a>
                    </li>
                @endif

                @if (\App\Helpers\Helper::checkPermission(['networkpartners.show']))
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'networkpartners') active @endif"
                            href="{{ route('networkpartners.index') }}">
                            <i class="nav-main-link-icon fa fa-paw"></i>
                            <span class="nav-main-link-name">{{ __('messages.Network Partners') }}</span>
                        </a>
                    </li>
                @endif

                @if (\App\Helpers\Helper::checkPermission(['notes.show']))
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'notes') active @endif"
                            href="{{ route('notes.index') }}">
                            <i class="nav-main-link-icon fa fa-paper-plane"></i>
                            <span class="nav-main-link-name">{{ __('messages.Notes') }}</span>
                        </a>
                    </li>
                @endif

                {{--  only show for admins and feei admins --}}
                @if (in_array(auth()->user()->role_id, [4, 5]))
                    <li class="nav-main-heading">Administration</li>
                    <li
                        class="nav-main-item  @if (Request::segment('1') == 'cities') open @endif @if (Request::segment('1') == 'topic') open @endif @if (Request::segment('1') == 'salutation') open @endif @if (Request::segment('1') == 'titleprefix') open @endif @if (Request::segment('1') == 'titlesuffix') open @endif @if (Request::segment('1') == 'titleawarded') open @endif @if (Request::segment('1') == 'federalstate') open @endif @if (Request::segment('1') == 'functions') open @endif @if (Request::segment('1') == 'status') open @endif @if (Request::segment('1') == 'statusperson') open @endif @if (Request::segment('1') == 'category') open @endif @if (Request::segment('1') == 'country') open @endif">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-energy"></i>
                            <span class="nav-main-link-name">{{ __('messages.Taxonomies') }}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            @if (\App\Helpers\Helper::checkPermission(['city.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'cities') active @endif"
                                        href="{{ route('cities.index') }}">
                                        {{-- <i class="nav-main-link-icon fa fa-city"></i> --}}
                                        <span class="nav-main-link-name">{{ __('messages.Cities') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['topic.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'topic') active @endif"
                                        href="{{ route('topic.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Topic') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['salutation.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'salutation') active @endif"
                                        href="{{ route('salutation.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Salutation') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['titleprefix.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'titleprefix') active @endif"
                                        href="{{ route('titleprefix.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Title prefix') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['titlesuffix.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'titlesuffix') active @endif"
                                        href="{{ route('titlesuffix.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Title suffix') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['titleawarded.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'titleawarded') active @endif"
                                        href="{{ route('titleawarded.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Title awarded') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['federalstate.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'federalstate') active @endif"
                                        href="{{ route('federalstate.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Federal State') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['functions.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'functions') active @endif"
                                        href="{{ route('functions.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Functions') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['status.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'status') active @endif"
                                        href="{{ route('status.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Status') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['statusperson.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'statusperson') active @endif"
                                        href="{{ route('statusperson.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Status Person') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['category.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'category') active @endif"
                                        href="{{ route('category.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.Category') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (\App\Helpers\Helper::checkPermission(['country.show']))
                                <li class="nav-main-item">
                                    <a class="nav-main-link @if (Request::segment('1') == 'country') active @endif"
                                        href="{{ route('country.index') }}">
                                        <span class="nav-main-link-name">{{ __('messages.country') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'roles') active @endif"
                            href="{{ route('roles.index') }}">
                            <i class="nav-main-link-icon fa fa-tasks"></i>
                            <span class="nav-main-link-name">{{ __('messages.Roles') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @if (Request::segment('1') == 'users') active @endif"
                            href="{{ route('users.index') }}">
                            <i class="nav-main-link-icon fa fa-user"></i>
                            <span class="nav-main-link-name">{{ __('messages.Users') }}</span>
                        </a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
