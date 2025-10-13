@extends('layouts.site.master')

@section('title', 'Login / Register - Patient')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Left Side - Login Form -->
                            <div class="col-lg-6 p-5 border-end">
                                <h3 class="fw-bold mb-4">
                                    @if(App::getLocale() == 'ar') تسجيل الدخول @else Login @endif
                                </h3>
                                
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('patient.login') }}">
                                    @csrf
                                    
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="login_email" class="form-label">
                                            @if(App::getLocale() == 'ar') البريد الإلكتروني @else Email @endif
                                        </label>
                                        <input type="email" 
                                               class="form-control @error('login_email') is-invalid @enderror" 
                                               id="login_email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               placeholder="@if(App::getLocale() == 'ar') أدخل بريدك الإلكتروني @else Enter your email @endif"
                                               required>
                                        @error('login_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="login_password" class="form-label">
                                            @if(App::getLocale() == 'ar') كلمة المرور @else Password @endif
                                        </label>
                                        <input type="password" 
                                               class="form-control @error('login_password') is-invalid @enderror" 
                                               id="login_password" 
                                               name="password"
                                               placeholder="@if(App::getLocale() == 'ar') أدخل كلمة المرور @else Enter your password @endif"
                                               required>
                                        @error('login_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Remember Me -->
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">
                                            @if(App::getLocale() == 'ar') تذكرني @else Remember me @endif
                                        </label>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary w-100 mb-3">
                                        <i class="fas fa-sign-in-alt me-2"></i>
                                        @if(App::getLocale() == 'ar') تسجيل الدخول @else Login @endif
                                    </button>
                                    
                                    <!-- Forgot Password -->
                                    <div class="text-center">
                                        <a href="{{ route('patient.forgot.password.form') }}" class="text-primary-custom">
                                            @if(App::getLocale() == 'ar') نسيت كلمة المرور؟ @else Forgot Password? @endif
                                        </a>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Right Side - Register Form -->
                            <div class="col-lg-6 p-5 bg-light-custom">
                                <h3 class="fw-bold mb-4">
                                    @if(App::getLocale() == 'ar') إنشاء حساب جديد @else Create New Account @endif
                                </h3>
                                
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('patient.register') }}">
                                    @csrf
                                    
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="register_name" class="form-label">
                                            @if(App::getLocale() == 'ar') الاسم الكامل @else Full Name @endif
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               id="register_name" 
                                               name="name" 
                                               value="{{ old('name') }}"
                                               placeholder="@if(App::getLocale() == 'ar') أدخل اسمك الكامل @else Enter your full name @endif"
                                               required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="register_email" class="form-label">
                                            @if(App::getLocale() == 'ar') البريد الإلكتروني @else Email @endif
                                        </label>
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               id="register_email" 
                                               name="email" 
                                               value="{{ old('email') }}"
                                               placeholder="@if(App::getLocale() == 'ar') أدخل بريدك الإلكتروني @else Enter your email @endif"
                                               required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Phone -->
                                    <div class="mb-3">
                                        <label for="register_phone" class="form-label">
                                            @if(App::getLocale() == 'ar') رقم الهاتف @else Phone Number @endif
                                        </label>
                                        <input type="tel" 
                                               class="form-control @error('phone') is-invalid @enderror" 
                                               id="register_phone" 
                                               name="phone" 
                                               value="{{ old('phone') }}"
                                               placeholder="@if(App::getLocale() == 'ar') أدخل رقم هاتفك @else Enter your phone number @endif"
                                               required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="register_password" class="form-label">
                                            @if(App::getLocale() == 'ar') كلمة المرور @else Password @endif
                                        </label>
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               id="register_password" 
                                               name="password"
                                               placeholder="@if(App::getLocale() == 'ar') أدخل كلمة المرور @else Enter password @endif"
                                               required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <!-- Password Confirmation -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            @if(App::getLocale() == 'ar') تأكيد كلمة المرور @else Confirm Password @endif
                                        </label>
                                        <input type="password" 
                                               class="form-control" 
                                               id="password_confirmation" 
                                               name="password_confirmation"
                                               placeholder="@if(App::getLocale() == 'ar') أعد إدخال كلمة المرور @else Re-enter password @endif"
                                               required>
                                    </div>
                                    
                                    <!-- Terms & Conditions -->
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                        <label class="form-check-label" for="terms">
                                            @if(App::getLocale() == 'ar')
                                                أوافق على <a href="{{ url(app()->getLocale().'/terms-and-conditions') }}" target="_blank">الشروط والأحكام</a>
                                            @else
                                                I agree to the <a href="{{ url(app()->getLocale().'/terms-and-conditions') }}" target="_blank">Terms & Conditions</a>
                                            @endif
                                        </label>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-user-plus me-2"></i>
                                        @if(App::getLocale() == 'ar') إنشاء حساب @else Create Account @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Doctor Login Link -->
                <div class="text-center mt-4">
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            هل أنت طبيب؟
                        @else
                            Are you a doctor?
                        @endif
                        <a href="{{ url(app()->getLocale().'/doctors/login') }}" class="text-primary-custom fw-semibold">
                            @if(App::getLocale() == 'ar') تسجيل دخول الأطباء @else Doctor Login @endif
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<style>
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
    }
    
    .card {
        overflow: hidden;
    }
    
    @media (max-width: 991px) {
        .border-end {
            border-right: none !important;
            border-bottom: 1px solid var(--border-color);
        }
    }
</style>
@endsection
