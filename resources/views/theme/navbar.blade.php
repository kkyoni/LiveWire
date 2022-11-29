<header id="page-header">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout"
                data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
        </div>
        <div class="d-flex align-items-center">
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->first_name }}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                        <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                        <p class="mb-0 text-muted fs-sm fw-medium">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="{{ route('users.updateProfile') }}">
                            <span class="fs-sm fw-medium">{{ __('messages.Profile') }}</span>
                        </a>
                    </div>
                    <div role="separator" class="dropdown-divider m-0"></div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="{{ route('signout') }}">
                            <span class="fs-sm fw-medium">{{ __('messages.Log Out') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
