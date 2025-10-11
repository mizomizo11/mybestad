<!-- Admin Topbar -->
<div class="admin-topbar d-flex align-items-center px-4">
    <div class="container-fluid">
        <div class="row align-items-center w-100">
            <div class="col-auto">
                <!-- Mobile Menu Toggle -->
                <button class="btn btn-link text-dark d-lg-none p-0" id="sidebarToggle">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>
            
            <div class="col">
                <!-- Page Title -->
                <h5 class="mb-0 fw-semibold">
                    @yield('page_title', 'Dashboard')
                </h5>
            </div>
            
            <div class="col-auto ms-auto">
                <div class="d-flex align-items-center gap-3">
                    <!-- Language Switcher -->
                    <div class="dropdown">
                        <button class="btn btn-light rounded-pill btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-globe me-1"></i>
                            @if(App::getLocale() == 'ar') العربية @else English @endif
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="{{ url('ar/admins/dashboard') }}"><i class="fas fa-language me-2"></i>العربية</a></li>
                            <li><a class="dropdown-item" href="{{ url('en/admins/dashboard') }}"><i class="fas fa-language me-2"></i>English</a></li>
                        </ul>
                    </div>
                    
                    <!-- Notifications (placeholder) -->
                    <div class="dropdown">
                        <button class="btn btn-light rounded-circle position-relative" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" style="width: 40px; height: 40px;">
                            <i class="fas fa-bell"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                                3
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown" style="min-width: 300px;">
                            <li class="dropdown-header fw-bold">
                                @if(App::getLocale() == 'ar') الإشعارات @else Notifications @endif
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">
                                <small class="text-muted">
                                    @if(App::getLocale() == 'ar') لا توجد إشعارات جديدة @else No new notifications @endif
                                </small>
                            </a></li>
                        </ul>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="dropdown">
                        <button class="btn btn-light rounded-pill dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>
                            @if(Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->name }}
                            @else
                                Admin
                            @endif
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ url(app()->getLocale().'/admins/edit/'.Auth::guard('admin')->id()) }}">
                                    <i class="fas fa-user-edit me-2"></i>
                                    @if(App::getLocale() == 'ar') الملف الشخصي @else Profile @endif
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url(app()->getLocale()) }}" target="_blank">
                                    <i class="fas fa-external-link-alt me-2"></i>
                                    @if(App::getLocale() == 'ar') الموقع @else View Site @endif
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ url(app()->getLocale().'/admins/logout') }}">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    @if(App::getLocale() == 'ar') تسجيل الخروج @else Logout @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 0.75rem;
    }
    
    .dropdown-item {
        border-radius: 0.5rem;
        margin: 0.25rem 0.5rem;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
        background-color: var(--bg-light);
    }
    
    .btn-light {
        border: 1px solid #e2e8f0;
    }
</style>
