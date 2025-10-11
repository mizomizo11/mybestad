@extends('layouts.site.master')

@section('title', 'Home - Online Medical Consultation')

@section('hero')
<!-- Hero Section -->
<section class="hero-section bg-primary-custom text-white position-relative overflow-hidden" style="padding: 6rem 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-4 text-white">
                    @if(App::getLocale() == 'ar')
                        استشارات طبية احترافية <br>من منزلك
                    @else
                        Professional Medical <br>Consultations from Home
                    @endif
                </h1>
                <p class="lead mb-4 opacity-90">
                    @if(App::getLocale() == 'ar')
                        احصل على استشارة طبية موثوقة من أطباء متخصصين في جميع المجالات الطبية عبر الإنترنت
                    @else
                        Get reliable medical consultation from specialized doctors in all medical fields online
                    @endif
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ url(app()->getLocale().'/patients/create') }}" class="btn btn-light btn-lg rounded-pill px-4">
                        <i class="fas fa-calendar-check me-2"></i>
                        @if(App::getLocale() == 'ar') احجز استشارة @else Book Consultation @endif
                    </a>
                    <a href="{{ url(app()->getLocale().'/specialties') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">
                        <i class="fas fa-user-md me-2"></i>
                        @if(App::getLocale() == 'ar') تصفح الأطباء @else Browse Doctors @endif
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="row mt-5 g-4">
                    <div class="col-4">
                        <div class="text-center">
                            <h3 class="fw-bold mb-0 text-white">500+</h3>
                            <small class="opacity-75">@if(App::getLocale() == 'ar') طبيب @else Doctors @endif</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <h3 class="fw-bold mb-0 text-white">10K+</h3>
                            <small class="opacity-75">@if(App::getLocale() == 'ar') مريض @else Patients @endif</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <h3 class="fw-bold mb-0 text-white">20+</h3>
                            <small class="opacity-75">@if(App::getLocale() == 'ar') تخصص @else Specialties @endif</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=800&fit=crop" 
                         alt="Doctor" 
                         class="img-fluid rounded-4 shadow-lg"
                         style="object-fit: cover; height: 500px; width: 100%;">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Background Decoration -->
    <div class="position-absolute bottom-0 start-0 w-100" style="height: 100px; overflow: hidden;">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#ffffff"></path>
        </svg>
    </div>
</section>
@endsection

@section('content')
<!-- Features Section -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3">
                @if(App::getLocale() == 'ar') لماذا تختارنا؟ @else Why Choose Us? @endif
            </h2>
            <p class="text-muted lead">
                @if(App::getLocale() == 'ar')
                    نقدم أفضل خدمات الاستشارات الطبية عبر الإنترنت
                @else
                    We provide the best online medical consultation services
                @endif
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary-custom text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-user-md fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') أطباء معتمدون @else Certified Doctors @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                جميع أطبائنا معتمدون ولديهم خبرة واسعة في تخصصاتهم
                            @else
                                All our doctors are certified and have extensive experience in their specialties
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') متاح 24/7 @else Available 24/7 @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                نحن متاحون على مدار الساعة لخدمتك في أي وقت
                            @else
                                We are available around the clock to serve you anytime
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') سرية تامة @else Complete Privacy @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                نضمن سرية معلوماتك الطبية بشكل كامل
                            @else
                                We guarantee complete confidentiality of your medical information
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-video fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') استشارات مرئية @else Video Consultations @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                تواصل مع الأطباء عبر الفيديو لتجربة أفضل
                            @else
                                Connect with doctors via video for a better experience
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-file-medical fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') تقارير مفصلة @else Detailed Reports @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                احصل على تقارير طبية مفصلة بعد كل استشارة
                            @else
                                Get detailed medical reports after each consultation
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="card border-0 h-100 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-secondary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-dollar-sign fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') أسعار معقولة @else Affordable Prices @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                استشارات طبية عالية الجودة بأسعار مناسبة للجميع
                            @else
                                High-quality medical consultations at affordable prices for everyone
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3">
                @if(App::getLocale() == 'ar') كيف يعمل؟ @else How It Works? @endif
            </h2>
            <p class="text-muted lead">
                @if(App::getLocale() == 'ar')
                    ثلاث خطوات بسيطة للحصول على استشارة طبية
                @else
                    Three simple steps to get a medical consultation
                @endif
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <div class="step-number bg-primary-custom text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center fw-bold" style="width: 80px; height: 80px; font-size: 2rem;">
                        1
                    </div>
                    <h5 class="fw-bold mb-3">
                        @if(App::getLocale() == 'ar') أنشئ حساب @else Create Account @endif
                    </h5>
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            سجل حساباً جديداً في دقائق معدودة
                        @else
                            Register a new account in just a few minutes
                        @endif
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="step-number bg-primary-custom text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center fw-bold" style="width: 80px; height: 80px; font-size: 2rem;">
                        2
                    </div>
                    <h5 class="fw-bold mb-3">
                        @if(App::getLocale() == 'ar') اختر طبيباً @else Choose Doctor @endif
                    </h5>
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            اختر الطبيب المناسب من قائمة التخصصات
                        @else
                            Choose the right doctor from the list of specialties
                        @endif
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center">
                    <div class="step-number bg-primary-custom text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center fw-bold" style="width: 80px; height: 80px; font-size: 2rem;">
                        3
                    </div>
                    <h5 class="fw-bold mb-3">
                        @if(App::getLocale() == 'ar') ابدأ الاستشارة @else Start Consultation @endif
                    </h5>
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            ابدأ الاستشارة واحصل على التشخيص والعلاج
                        @else
                            Start consultation and get diagnosis and treatment
                        @endif
                    </p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ url(app()->getLocale().'/how-we-work') }}" class="btn btn-primary btn-lg rounded-pill px-5">
                @if(App::getLocale() == 'ar') اعرف المزيد @else Learn More @endif
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-primary-custom text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0" data-aos="fade-right">
                <h2 class="fw-bold mb-3 text-white">
                    @if(App::getLocale() == 'ar')
                        جاهز لبدء رحلتك الصحية؟
                    @else
                        Ready to Start Your Health Journey?
                    @endif
                </h2>
                <p class="lead mb-0 opacity-90">
                    @if(App::getLocale() == 'ar')
                        سجل الآن واحصل على أول استشارة مجانية
                    @else
                        Register now and get your first consultation free
                    @endif
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{{ url(app()->getLocale().'/patients/create') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold">
                    @if(App::getLocale() == 'ar') ابدأ الآن @else Get Started @endif
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@if(isset($video) && $video)
<!-- Video Section -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="fw-bold mb-3">
                        @if(App::getLocale() == 'ar') {!! $video->details2_ar !!} @else {!! $video->details2_en !!} @endif
                    </h2>
                </div>
                
                <div class="ratio ratio-16x9" data-aos="zoom-in">
                    <video controls class="rounded-4 shadow-lg">
                        <source src="{{asset(Config::get('app.upload'))}}/{{$video->{'video2_'.app()->getLocale()} }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
<style>
    .hero-section {
        position: relative;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    }
    
    .feature-icon {
        transition: all 0.3s ease;
    }
    
    .card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    .step-number {
        transition: all 0.3s ease;
    }
    
    .step-number:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }
</style>
@endsection
