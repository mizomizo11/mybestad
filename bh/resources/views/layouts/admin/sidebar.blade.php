<!-- Admin Sidebar -->
<div class="admin-sidebar" id="adminSidebar">
    <!-- Logo/Brand -->
    <div class="sidebar-header p-4 border-bottom border-secondary">
        <div class="d-flex align-items-center">
            <i class="fas fa-stethoscope fa-2x text-primary-custom me-3"></i>
            <div>
                <h5 class="mb-0 fw-bold text-white">Admin Panel</h5>
                <small class="text-white-50">@if(App::getLocale() == 'ar') لوحة التحكم @else Dashboard @endif</small>
            </div>
        </div>
    </div>
    
    <!-- Navigation Menu -->
    <nav class="sidebar-nav p-3">
        <ul class="nav flex-column">
            <!-- Dashboard -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/dashboard') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/dashboard') || Request::is(app()->getLocale().'/admins') ? 'active' : '' }}">
                    <i class="fas fa-th-large me-2"></i>
                    @if(App::getLocale() == 'ar') لوحة التحكم @else Dashboard @endif
                </a>
            </li>
            
            <!-- Consultations -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/consultations') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/consultations*') ? 'active' : '' }}">
                    <i class="fas fa-file-medical me-2"></i>
                    @if(App::getLocale() == 'ar') الاستشارات @else Consultations @endif
                </a>
            </li>
            
            <!-- Doctors -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/doctors') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/doctors*') ? 'active' : '' }}">
                    <i class="fas fa-user-md me-2"></i>
                    @if(App::getLocale() == 'ar') الأطباء @else Doctors @endif
                </a>
            </li>
            
            <!-- Patients -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/patients') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/patients*') ? 'active' : '' }}">
                    <i class="fas fa-users me-2"></i>
                    @if(App::getLocale() == 'ar') المرضى @else Patients @endif
                </a>
            </li>
            
            <!-- Specialties -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/specialties') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/specialties*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase-medical me-2"></i>
                    @if(App::getLocale() == 'ar') التخصصات @else Specialties @endif
                </a>
            </li>
            
            <!-- Services -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/services') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/services*') ? 'active' : '' }}">
                    <i class="fas fa-concierge-bell me-2"></i>
                    @if(App::getLocale() == 'ar') الخدمات @else Services @endif
                </a>
            </li>
            
            <!-- Coupons -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/coupons') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/coupons*') ? 'active' : '' }}">
                    <i class="fas fa-ticket-alt me-2"></i>
                    @if(App::getLocale() == 'ar') الكوبونات @else Coupons @endif
                </a>
            </li>
            
            <!-- Carousels -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/carousels') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/carousels*') ? 'active' : '' }}">
                    <i class="fas fa-images me-2"></i>
                    @if(App::getLocale() == 'ar') السلايدر @else Carousel @endif
                </a>
            </li>
            
            <!-- Divider -->
            <li><hr class="my-3 border-secondary"></li>
            
            <!-- Settings Section -->
            <li class="nav-item mb-1">
                <small class="text-white-50 text-uppercase px-3 d-block mb-2">
                    @if(App::getLocale() == 'ar') الإعدادات @else Settings @endif
                </small>
            </li>
            
            <!-- Settings -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/settings') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/settings*') ? 'active' : '' }}">
                    <i class="fas fa-cog me-2"></i>
                    @if(App::getLocale() == 'ar') الإعدادات العامة @else General Settings @endif
                </a>
            </li>
            
            <!-- Contacts -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/contacts') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/contacts*') ? 'active' : '' }}">
                    <i class="fas fa-address-book me-2"></i>
                    @if(App::getLocale() == 'ar') معلومات الاتصال @else Contact Info @endif
                </a>
            </li>
            
            <!-- About Us -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/whous') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/whous*') ? 'active' : '' }}">
                    <i class="fas fa-info-circle me-2"></i>
                    @if(App::getLocale() == 'ar') من نحن @else About Us @endif
                </a>
            </li>
            
            <!-- Privacy Policy -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/privacy-policy') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/privacy-policy*') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt me-2"></i>
                    @if(App::getLocale() == 'ar') سياسة الخصوصية @else Privacy Policy @endif
                </a>
            </li>
            
            <!-- Terms & Conditions -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/terms-conditions') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/terms-conditions*') ? 'active' : '' }}">
                    <i class="fas fa-file-contract me-2"></i>
                    @if(App::getLocale() == 'ar') الشروط والأحكام @else Terms & Conditions @endif
                </a>
            </li>
            
            <!-- Divider -->
            <li><hr class="my-3 border-secondary"></li>
            
            <!-- Admins -->
            <li class="nav-item mb-2">
                <a href="{{ url(app()->getLocale().'/admins/admins') }}" 
                   class="nav-link {{ Request::is(app()->getLocale().'/admins/admins*') ? 'active' : '' }}">
                    <i class="fas fa-user-shield me-2"></i>
                    @if(App::getLocale() == 'ar') المسؤولون @else Admins @endif
                </a>
            </li>
        </ul>
    </nav>
</div>

<style>
    .sidebar-nav .nav-link {
        color: rgba(255, 255, 255, 0.8);
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }
    
    .sidebar-nav .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        @if(App()->getLocale() == 'ar')
            transform: translateX(-5px);
        @else
            transform: translateX(5px);
        @endif
    }
    
    .sidebar-nav .nav-link.active {
        background-color: var(--primary-color);
        color: white;
    }
    
    .sidebar-nav .nav-link i {
        width: 20px;
        text-align: center;
    }
    
    /* Custom Scrollbar */
    .admin-sidebar::-webkit-scrollbar {
        width: 6px;
    }
    
    .admin-sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }
    
    .admin-sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 3px;
    }
    
    .admin-sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
</style>
