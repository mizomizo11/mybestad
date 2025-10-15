@extends('layouts.app')

@section('title', 'الرئيسية - الاستشارات الطبية عبر الإنترنت')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="jumbotron bg-light p-5 rounded-3 mb-5">
        <h1 class="display-4">مرحباً بكم في الاستشارات الطبية عبر الإنترنت</h1>
        <p class="lead">نقدم أفضل الخدمات الطبية والاستشارات الصحية</p>
        <hr class="my-4">
        <p>فريقنا من الأطباء المتخصصين جاهز لخدمتكم على مدار الساعة</p>
    </div>

    <!-- Customer Reviews Section -->
    <section class="reviews-section mb-5">
        <h2 class="text-center mb-4">
            <i class="fas fa-star text-warning"></i> آراء عملائنا
        </h2>
        
        @if($reviews->count() > 0)
            <!-- Carousel for Reviews -->
            <div id="reviewsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($reviews as $index => $review)
                        <button type="button" data-bs-target="#reviewsCarousel" 
                                data-bs-slide-to="{{ $index }}" 
                                class="{{ $index === 0 ? 'active' : '' }}">
                        </button>
                    @endforeach
                </div>
                
                <div class="carousel-inner">
                    @foreach($reviews as $index => $review)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card mx-auto" style="max-width: 600px;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $review->name }}</h5>
                                    <div class="mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="card-text">{{ $review->comment }}</p>
                                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#reviewsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
            <!-- Reviews Grid (Alternative View) -->
            <div class="row mt-4">
                @foreach($reviews->take(3) as $review)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review->name }}</h5>
                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="card-text">{{ Str::limit($review->comment, 100) }}</p>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> لا توجد تقييمات حالياً
            </div>
        @endif
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <h2 class="text-center mb-4">خدماتنا</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-stethoscope fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">الفحوصات الطبية</h5>
                        <p class="card-text">فحوصات شاملة مع أحدث الأجهزة الطبية</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-user-md fa-3x text-success mb-3"></i>
                        <h5 class="card-title">الاستشارات الطبية</h5>
                        <p class="card-text">استشارات مع أفضل الأطباء المتخصصين</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-ambulance fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">الطوارئ</h5>
                        <p class="card-text">خدمة طوارئ متوفرة على مدار الساعة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
