<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand fw-bold text-primary-custom" href="{{ url(app()->getLocale()) }}">
            <i class="fas fa-stethoscope me-2"></i>
            @if(config('app.name'))
                {{ config('app.name') }}
            @else
                Ask Our Doctor
            @endif
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is(app()->getLocale()) ? 'active text-primary-custom' : '' }}" href="{{ url(app()->getLocale()) }}">
                        @if(App::getLocale() == 'ar') الرئيسية @else Home @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is(app()->getLocale().'/whous') ? 'active text-primary-custom' : '' }}" href="{{ url(app()->getLocale().'/whous') }}">
                        @if(App::getLocale() == 'ar') من نحن @else About Us @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is(app()->getLocale().'/specialties*') ? 'active text-primary-custom' : '' }}" href="{{ url(app()->getLocale().'/specialties') }}">
                        @if(App::getLocale() == 'ar') التخصصات @else Specialties @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is(app()->getLocale().'/how-we-work') ? 'active text-primary-custom' : '' }}" href="{{ url(app()->getLocale().'/how-we-work') }}">
                        @if(App::getLocale() == 'ar') كيف نعمل @else How We Work @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is(app()->getLocale().'/contacts') ? 'active text-primary-custom' : '' }}" href="{{ url(app()->getLocale().'/contacts') }}">
                        @if(App::getLocale() == 'ar') اتصل بنا @else Contact @endif
                    </a>
                </li>
            </ul>
            
            <!-- Right Side Navigation -->
            <div class="d-flex align-items-center gap-2">
                <!-- Language Switcher -->
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle rounded-pill" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe me-1"></i>
                        @if(App::getLocale() == 'ar') العربية @else English @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ url('ar') }}"><i class="fas fa-language me-2"></i>العربية</a></li>
                        <li><a class="dropdown-item" href="{{ url('en') }}"><i class="fas fa-language me-2"></i>English</a></li>
                    </ul>
                </div>
                
                <!-- User Menu / Auth Buttons -->
                @auth('patient')
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light dropdown-toggle rounded-pill" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ Auth::guard('patient')->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ url(app()->getLocale().'/patients/edit') }}"><i class="fas fa-user-edit me-2"></i>@if(App::getLocale() == 'ar') الملف الشخصي @else Profile @endif</a></li>
                            <li><a class="dropdown-item" href="{{ url(app()->getLocale().'/patients/consultations/open') }}"><i class="fas fa-file-medical me-2"></i>@if(App::getLocale() == 'ar') الاستشارات @else Consultations @endif</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{ url(app()->getLocale().'/patients/logout') }}"><i class="fas fa-sign-out-alt me-2"></i>@if(App::getLocale() == 'ar') تسجيل الخروج @else Logout @endif</a></li>
                        </ul>
                    </div>
                @elseauth('doctor')
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light dropdown-toggle rounded-pill" type="button" id="doctorDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-md me-1"></i>
                            {{ Auth::guard('doctor')->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="doctorDropdown">
                            <li><a class="dropdown-item" href="{{ url(app()->getLocale().'/doctors/dashboard') }}"><i class="fas fa-th-large me-2"></i>@if(App::getLocale() == 'ar') لوحة التحكم @else Dashboard @endif</a></li>
                            <li><a class="dropdown-item" href="{{ url(app()->getLocale().'/doctors/edit-in-site') }}"><i class="fas fa-user-edit me-2"></i>@if(App::getLocale() == 'ar') الملف الشخصي @else Profile @endif</a></li>
                            <li><a class="dropdown-item" href="{{ url(app()->getLocale().'/doctors/consultations/open') }}"><i class="fas fa-file-medical me-2"></i>@if(App::getLocale() == 'ar') الاستشارات @else Consultations @endif</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{ url(app()->getLocale().'/doctors/logout') }}"><i class="fas fa-sign-out-alt me-2"></i>@if(App::getLocale() == 'ar') تسجيل الخروج @else Logout @endif</a></li>
                        </ul>
                    </div>
                @elseauth('admin')
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light dropdown-toggle rounded-pill" type="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-shield me-1"></i>
                            {{ Auth::guard('admin')->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="{{ url(app()->getLocale().'/admins/dashboard') }}"><i class="fas fa-th-large me-2"></i>@if(App::getLocale() == 'ar') لوحة التحكم @else Dashboard @endif</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{ url(app()->getLocale().'/admins/logout') }}"><i class="fas fa-sign-out-alt me-2"></i>@if(App::getLocale() == 'ar') تسجيل الخروج @else Logout @endif</a></li>
                        </ul>
                    </div>
                @else
                    <!-- For non-authenticated users -->
                    <a href="{{ url(app()->getLocale().'/patients/create') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="fas fa-sign-in-alt me-1"></i>
                        @if(App::getLocale() == 'ar') تسجيل الدخول @else Login @endif
                    </a>
                    <a href="{{ url(app()->getLocale().'/patients/create') }}" class="btn btn-sm btn-primary rounded-pill">
                        <i class="fas fa-user-plus me-1"></i>
                        @if(App::getLocale() == 'ar') إنشاء حساب @else Sign Up @endif
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    .navbar {
        transition: all 0.3s ease;
        padding: 1rem 0;
    }
    
    .navbar-brand {
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover {
        transform: scale(1.05);
    }
    
    .nav-link {
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .nav-link:hover {
        background-color: var(--bg-light);
        color: var(--primary-color) !important;
    }
    
    .nav-link.active {
        background-color: var(--bg-light);
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 0.75rem;
        padding: 0.5rem;
    }
    
    .dropdown-item {
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
        background-color: var(--bg-light);
        color: var(--primary-color);
    }
    
    @media (max-width: 991px) {
        .navbar-nav {
            margin-top: 1rem;
            padding: 1rem 0;
            border-top: 1px solid var(--border-color);
        }
        
        .navbar .d-flex {
            flex-direction: column;
            align-items: stretch;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }
        
        .navbar .d-flex .btn {
            width: 100%;
        }
    }
</style>
