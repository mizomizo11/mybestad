@extends('layouts.site.master')

@section('title', 'Doctor Login')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="doctor-icon bg-primary-custom text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="fas fa-user-md fa-2x"></i>
                            </div>
                            <h3 class="fw-bold">
                                @if(App::getLocale() == 'ar') تسجيل دخول الطبيب @else Doctor Login @endif
                            </h3>
                            <p class="text-muted">
                                @if(App::getLocale() == 'ar')
                                    قم بتسجيل الدخول للوصول إلى لوحة التحكم
                                @else
                                    Log in to access your dashboard
                                @endif
                            </p>
                        </div>
                        
                        <!-- Error Messages -->
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('doctor.login') }}">
                            @csrf
                            
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    @if(App::getLocale() == 'ar') البريد الإلكتروني @else Email @endif
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" 
                                           class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="@if(App::getLocale() == 'ar') أدخل بريدك الإلكتروني @else Enter your email @endif"
                                           required
                                           autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    @if(App::getLocale() == 'ar') كلمة المرور @else Password @endif
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" 
                                           class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password"
                                           placeholder="@if(App::getLocale() == 'ar') أدخل كلمة المرور @else Enter your password @endif"
                                           required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        @if(App::getLocale() == 'ar') تذكرني @else Remember me @endif
                                    </label>
                                </div>
                                <a href="{{ route('doctor.forgot.password.form') }}" class="text-primary-custom text-decoration-none">
                                    @if(App::getLocale() == 'ar') نسيت كلمة المرور؟ @else Forgot Password? @endif
                                </a>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                @if(App::getLocale() == 'ar') تسجيل الدخول @else Login @endif
                            </button>
                            
                            <!-- Divider -->
                            <div class="position-relative text-center my-4">
                                <hr>
                                <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                    @if(App::getLocale() == 'ar') أو @else OR @endif
                                </span>
                            </div>
                            
                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-muted mb-2">
                                    @if(App::getLocale() == 'ar') ليس لديك حساب؟ @else Don't have an account? @endif
                                </p>
                                <a href="{{ url(app()->getLocale().'/doctors/create') }}" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-user-plus me-2"></i>
                                    @if(App::getLocale() == 'ar') انضم كطبيب @else Join as Doctor @endif
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Back to Home -->
                <div class="text-center mt-4">
                    <a href="{{ url(app()->getLocale()) }}" class="text-muted text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>
                        @if(App::getLocale() == 'ar') العودة للصفحة الرئيسية @else Back to Home @endif
                    </a>
                </div>
                
                <!-- Patient Login Link -->
                <div class="text-center mt-3">
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar') مريض؟ @else Patient? @endif
                        <a href="{{ url(app()->getLocale().'/patients/create') }}" class="text-primary-custom fw-semibold">
                            @if(App::getLocale() == 'ar') تسجيل دخول المريض @else Patient Login @endif
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
    .input-group-text {
        border-right: none;
    }
    
    [dir="rtl"] .input-group-text {
        border-right: 1px solid #dee2e6;
        border-left: none;
    }
    
    .form-control.border-start-0 {
        border-left: none;
    }
    
    [dir="rtl"] .form-control.border-start-0 {
        border-left: 1px solid #dee2e6;
        border-right: none;
    }
    
    .doctor-icon {
        transition: all 0.3s ease;
    }
    
    .card:hover .doctor-icon {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
    }
    
    .input-group:focus-within .input-group-text {
        border-color: var(--primary-color);
    }
</style>
@endsection
