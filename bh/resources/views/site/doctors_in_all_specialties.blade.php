@extends('layouts.site.master')

@section('title', 'Medical Specialties')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@if(App::getLocale() == 'ar') الرئيسية @else Home @endif</a></li>
        <li class="breadcrumb-item active" aria-current="page">@if(App::getLocale() == 'ar') التخصصات @else Specialties @endif</li>
    </ol>
</nav>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header bg-primary-custom text-white py-5 mb-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3 text-white" data-aos="fade-up">
                @if(App::getLocale() == 'ar') التخصصات الطبية @else Medical Specialties @endif
            </h1>
            <p class="lead opacity-90" data-aos="fade-up" data-aos-delay="100">
                @if(App::getLocale() == 'ar')
                    اختر التخصص الطبي المناسب لاحتياجاتك
                @else
                    Choose the right medical specialty for your needs
                @endif
            </p>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        @if(isset($specialties) && count($specialties) > 0)
            <div class="row g-4">
                @foreach($specialties as $index => $specialty)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="card border-0 h-100 shadow-sm hover-lift">
                            <div class="card-body p-4">
                                <div class="specialty-icon bg-primary-custom text-white rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                    <i class="fas fa-stethoscope fa-2x"></i>
                                </div>
                                
                                <h5 class="fw-bold mb-3">
                                    @if(App::getLocale() == 'ar')
                                        {{ $specialty->name_ar ?? $specialty->name }}
                                    @else
                                        {{ $specialty->name_en ?? $specialty->name }}
                                    @endif
                                </h5>
                                
                                @if(isset($specialty->description))
                                    <p class="text-muted mb-4">
                                        @if(App::getLocale() == 'ar')
                                            {{ Str::limit($specialty->description_ar ?? $specialty->description, 100) }}
                                        @else
                                            {{ Str::limit($specialty->description_en ?? $specialty->description, 100) }}
                                        @endif
                                    </p>
                                @endif
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted small">
                                        <i class="fas fa-user-md me-1"></i>
                                        {{ $specialty->doctors_count ?? 0 }} 
                                        @if(App::getLocale() == 'ar') طبيب @else Doctors @endif
                                    </span>
                                    <a href="{{ url(app()->getLocale().'/specialties/'.$specialty->id) }}" 
                                       class="btn btn-outline-primary btn-sm rounded-pill">
                                        @if(App::getLocale() == 'ar') عرض الأطباء @else View Doctors @endif
                                        <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if(isset($specialties) && method_exists($specialties, 'links'))
                <div class="mt-5 d-flex justify-content-center">
                    {{ $specialties->links() }}
                </div>
            @endif
        @else
            <!-- No Specialties Found -->
            <div class="text-center py-5">
                <div class="empty-state">
                    <i class="fas fa-briefcase-medical fa-4x text-muted mb-4"></i>
                    <h4 class="fw-bold mb-3">
                        @if(App::getLocale() == 'ar') لا توجد تخصصات متاحة @else No Specialties Available @endif
                    </h4>
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            سنقوم بإضافة المزيد من التخصصات قريباً
                        @else
                            We'll be adding more specialties soon
                        @endif
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0" data-aos="fade-right">
                <h2 class="fw-bold mb-3">
                    @if(App::getLocale() == 'ar')
                        لم تجد التخصص الذي تبحث عنه؟
                    @else
                        Didn't Find the Specialty You're Looking For?
                    @endif
                </h2>
                <p class="text-muted mb-0">
                    @if(App::getLocale() == 'ar')
                        تواصل معنا وسنساعدك في العثور على الطبيب المناسب
                    @else
                        Contact us and we'll help you find the right doctor
                    @endif
                </p>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{{ url(app()->getLocale().'/contacts') }}" class="btn btn-primary btn-lg rounded-pill px-5">
                    <i class="fas fa-envelope me-2"></i>
                    @if(App::getLocale() == 'ar') اتصل بنا @else Contact Us @endif
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<style>
    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    }
    
    .specialty-icon {
        transition: all 0.3s ease;
    }
    
    .card:hover .specialty-icon {
        transform: scale(1.1) rotate(10deg);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }
    
    .empty-state i {
        opacity: 0.3;
    }
</style>
@endsection
