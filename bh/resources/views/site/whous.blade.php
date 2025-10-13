@extends('layouts.site.master')

@section('title', 'About Us')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@if(App::getLocale() == 'ar') الرئيسية @else Home @endif</a></li>
        <li class="breadcrumb-item active" aria-current="page">@if(App::getLocale() == 'ar') من نحن @else About Us @endif</li>
    </ol>
</nav>
@endsection

@section('content')
<!-- Page Header -->
<section class="page-header bg-primary-custom text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-4 fw-bold mb-3 text-white">
                    @if(App::getLocale() == 'ar') من نحن @else About Us @endif
                </h1>
                <p class="lead opacity-90">
                    @if(App::getLocale() == 'ar')
                        نحن منصة طبية رائدة تقدم استشارات طبية عبر الإنترنت
                    @else
                        We are a leading medical platform providing online medical consultations
                    @endif
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600&h=400&fit=crop" 
                     alt="About Us" 
                     class="img-fluid rounded-4 shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="section-padding">
    <div class="container">
        @if(isset($whous))
            <div class="row mb-5">
                <div class="col-12" data-aos="fade-up">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-lg-5">
                            @if(App::getLocale() == 'ar')
                                {!! $whous->details_ar !!}
                            @else
                                {!! $whous->details_en !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Default About Content -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=400&fit=crop" 
                         alt="Medical Team" 
                         class="img-fluid rounded-4 shadow-lg">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <h2 class="fw-bold mb-4">
                        @if(App::getLocale() == 'ar') مهمتنا @else Our Mission @endif
                    </h2>
                    <p class="text-muted mb-4">
                        @if(App::getLocale() == 'ar')
                            مهمتنا هي توفير رعاية صحية عالية الجودة ويمكن الوصول إليها لكل مريض من خلال الاستفادة من التكنولوجيا. نحن نؤمن بأن كل شخص يستحق الوصول إلى الرعاية الطبية المهنية بغض النظر عن موقعه.
                        @else
                            Our mission is to provide high-quality, accessible healthcare to every patient through the power of technology. We believe that everyone deserves access to professional medical care regardless of their location.
                        @endif
                    </p>
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            من خلال منصتنا، نربط المرضى بأطباء مؤهلين ومتخصصين من مختلف المجالات الطبية، مما يتيح لهم الحصول على استشارات طبية موثوقة من منازلهم المريحة.
                        @else
                            Through our platform, we connect patients with qualified and specialized doctors from various medical fields, allowing them to receive reliable medical consultations from the comfort of their homes.
                        @endif
                    </p>
                </div>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&h=400&fit=crop" 
                         alt="Our Vision" 
                         class="img-fluid rounded-4 shadow-lg">
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                    <h2 class="fw-bold mb-4">
                        @if(App::getLocale() == 'ar') رؤيتنا @else Our Vision @endif
                    </h2>
                    <p class="text-muted mb-4">
                        @if(App::getLocale() == 'ar')
                            رؤيتنا هي أن نكون المنصة الطبية الرائدة في المنطقة، حيث نضع معايير جديدة للرعاية الصحية عبر الإنترنت ونجعل الخدمات الطبية متاحة للجميع.
                        @else
                            Our vision is to be the leading medical platform in the region, setting new standards for online healthcare and making medical services accessible to everyone.
                        @endif
                    </p>
                    <p class="text-muted">
                        @if(App::getLocale() == 'ar')
                            نسعى لبناء نظام رعاية صحية أكثر كفاءة وشفافية، حيث يمكن للمرضى الحصول على الرعاية التي يحتاجونها بسرعة وسهولة.
                        @else
                            We strive to build a more efficient and transparent healthcare system where patients can get the care they need quickly and easily.
                        @endif
                    </p>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Values Section -->
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold mb-3">
                @if(App::getLocale() == 'ar') قيمنا @else Our Values @endif
            </h2>
            <p class="text-muted lead">
                @if(App::getLocale() == 'ar')
                    القيم التي توجه عملنا وخدماتنا
                @else
                    The values that guide our work and services
                @endif
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 h-100 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="value-icon bg-primary-custom text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-heart fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') الرعاية @else Care @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                نضع صحة وراحة مرضانا في المقام الأول
                            @else
                                We put the health and comfort of our patients first
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 h-100 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="value-icon bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-award fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') الجودة @else Quality @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                نلتزم بتقديم خدمات طبية عالية الجودة
                            @else
                                We are committed to providing high-quality medical services
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 h-100 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="value-icon bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">
                            @if(App::getLocale() == 'ar') الثقة @else Trust @endif
                        </h5>
                        <p class="text-muted mb-0">
                            @if(App::getLocale() == 'ar')
                                نبني علاقات قائمة على الثقة والشفافية
                            @else
                                We build relationships based on trust and transparency
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding">
    <div class="container">
        <div class="card border-0 bg-primary-custom text-white shadow-lg" data-aos="zoom-in">
            <div class="card-body p-5 text-center">
                <h2 class="fw-bold mb-3 text-white">
                    @if(App::getLocale() == 'ar') جاهز للبدء؟ @else Ready to Get Started? @endif
                </h2>
                <p class="lead mb-4 opacity-90">
                    @if(App::getLocale() == 'ar')
                        انضم إلى آلاف المرضى الذين يثقون بنا لرعايتهم الصحية
                    @else
                        Join thousands of patients who trust us for their healthcare
                    @endif
                </p>
                <a href="{{ url(app()->getLocale().'/patients/create') }}" class="btn btn-light btn-lg rounded-pill px-5">
                    <i class="fas fa-user-plus me-2"></i>
                    @if(App::getLocale() == 'ar') سجل الآن @else Register Now @endif
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
    
    .value-icon {
        transition: all 0.3s ease;
    }
    
    .card:hover .value-icon {
        transform: scale(1.1) rotate(10deg);
    }
</style>
@endsection
