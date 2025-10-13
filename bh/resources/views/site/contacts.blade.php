@extends('layouts.site.master')

@section('title', 'Contact Us')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@if(App::getLocale() == 'ar') الرئيسية @else Home @endif</a></li>
        <li class="breadcrumb-item active" aria-current="page">@if(App::getLocale() == 'ar') اتصل بنا @else Contact @endif</li>
    </ol>
</nav>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header bg-primary-custom text-white py-5 mb-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3 text-white" data-aos="fade-up">
                @if(App::getLocale() == 'ar') اتصل بنا @else Contact Us @endif
            </h1>
            <p class="lead opacity-90" data-aos="fade-up" data-aos-delay="100">
                @if(App::getLocale() == 'ar')
                    نحن هنا لمساعدتك. تواصل معنا في أي وقت
                @else
                    We're here to help. Reach out to us anytime
                @endif
            </p>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-4" data-aos="fade-right">
                <div class="sticky-top" style="top: 100px;">
                    <h3 class="fw-bold mb-4">
                        @if(App::getLocale() == 'ar') معلومات التواصل @else Contact Information @endif
                    </h3>
                    
                    @if(isset($contacts))
                        @if($contacts->phone)
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon bg-primary-custom text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">
                                            @if(App::getLocale() == 'ar') الهاتف @else Phone @endif
                                        </h6>
                                        <p class="text-muted mb-0">
                                            <a href="tel:{{ $contacts->phone }}" class="text-muted">{{ $contacts->phone }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @if($contacts->email)
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">
                                            @if(App::getLocale() == 'ar') البريد الإلكتروني @else Email @endif
                                        </h6>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:{{ $contacts->email }}" class="text-muted">{{ $contacts->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @if($contacts->address)
                            <div class="contact-item mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="contact-icon bg-warning text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">
                                            @if(App::getLocale() == 'ar') العنوان @else Address @endif
                                        </h6>
                                        <p class="text-muted mb-0">
                                            @if(App::getLocale() == 'ar')
                                                {{ $contacts->address_ar ?? $contacts->address }}
                                            @else
                                                {{ $contacts->address_en ?? $contacts->address }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <!-- Default Contact Info -->
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-start">
                                <div class="contact-icon bg-primary-custom text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        @if(App::getLocale() == 'ar') الهاتف @else Phone @endif
                                    </h6>
                                    <p class="text-muted mb-0">+966 XX XXX XXXX</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-start">
                                <div class="contact-icon bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        @if(App::getLocale() == 'ar') البريد الإلكتروني @else Email @endif
                                    </h6>
                                    <p class="text-muted mb-0">info@mybestad.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-4">
                            <div class="d-flex align-items-start">
                                <div class="contact-icon bg-warning text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; flex-shrink: 0;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        @if(App::getLocale() == 'ar') العنوان @else Address @endif
                                    </h6>
                                    <p class="text-muted mb-0">
                                        @if(App::getLocale() == 'ar')
                                            الرياض، المملكة العربية السعودية
                                        @else
                                            Riyadh, Saudi Arabia
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Social Media -->
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') تابعنا @else Follow Us @endif
                        </h6>
                        <div class="social-links d-flex gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px; padding: 0; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-left">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="fw-bold mb-4">
                            @if(App::getLocale() == 'ar') أرسل لنا رسالة @else Send Us a Message @endif
                        </h3>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ url(app()->getLocale().'/send-to-mail') }}" class="contact-form">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">
                                        @if(App::getLocale() == 'ar') الاسم @else Name @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           placeholder="@if(App::getLocale() == 'ar') أدخل اسمك @else Enter your name @endif"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">
                                        @if(App::getLocale() == 'ar') البريد الإلكتروني @else Email @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="@if(App::getLocale() == 'ar') أدخل بريدك الإلكتروني @else Enter your email @endif"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">
                                        @if(App::getLocale() == 'ar') رقم الهاتف @else Phone Number @endif
                                    </label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           placeholder="@if(App::getLocale() == 'ar') أدخل رقم هاتفك @else Enter your phone @endif">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Subject -->
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">
                                        @if(App::getLocale() == 'ar') الموضوع @else Subject @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('subject') is-invalid @enderror" 
                                           id="subject" 
                                           name="subject" 
                                           value="{{ old('subject') }}"
                                           placeholder="@if(App::getLocale() == 'ar') موضوع الرسالة @else Message subject @endif"
                                           required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label">
                                        @if(App::getLocale() == 'ar') الرسالة @else Message @endif
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" 
                                              id="message" 
                                              name="message" 
                                              rows="6"
                                              placeholder="@if(App::getLocale() == 'ar') اكتب رسالتك هنا @else Write your message here @endif"
                                              required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        @if(App::getLocale() == 'ar') إرسال الرسالة @else Send Message @endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
@if(isset($contacts) && isset($contacts->map_url))
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h3 class="fw-bold text-center mb-4">
                    @if(App::getLocale() == 'ar') موقعنا @else Our Location @endif
                </h3>
                <div class="map-container rounded-4 overflow-hidden shadow-lg">
                    <iframe src="{{ $contacts->map_url }}" 
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
<style>
    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    }
    
    .contact-icon {
        transition: all 0.3s ease;
    }
    
    .contact-item:hover .contact-icon {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    
    .social-links a {
        transition: all 0.3s ease;
    }
    
    .social-links a:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3);
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15);
    }
</style>
@endsection
