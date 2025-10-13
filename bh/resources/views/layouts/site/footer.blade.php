<footer class="bg-dark text-white mt-5">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row py-5">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-stethoscope me-2 text-primary-custom"></i>
                    @if(App::getLocale() == 'ar') استشر طبيبنا @else Ask Our Doctor @endif
                </h5>
                <p class="text-light opacity-75">
                    @if(App::getLocale() == 'ar')
                        منصة احترافية للاستشارات الطبية عبر الإنترنت. نوفر لك الوصول إلى أطباء متخصصين من مختلف المجالات الطبية.
                    @else
                        Professional online medical consultation platform. We provide you access to specialized doctors from various medical fields.
                    @endif
                </p>
                <div class="social-links mt-3">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="fw-bold mb-3">@if(App::getLocale() == 'ar') روابط سريعة @else Quick Links @endif</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url(app()->getLocale()) }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') الرئيسية @else Home @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/whous') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') من نحن @else About Us @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/specialties') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') التخصصات @else Specialties @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/how-we-work') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') كيف نعمل @else How We Work @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/contacts') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') اتصل بنا @else Contact @endif</a></li>
                </ul>
            </div>
            
            <!-- For Doctors -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h6 class="fw-bold mb-3">@if(App::getLocale() == 'ar') للأطباء @else For Doctors @endif</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/doctors/login') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') تسجيل دخول الطبيب @else Doctor Login @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/doctors/create') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') انضم كطبيب @else Join as Doctor @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/doctors/dashboard') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') لوحة تحكم الطبيب @else Doctor Dashboard @endif</a></li>
                </ul>
            </div>
            
            <!-- Legal & Support -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h6 class="fw-bold mb-3">@if(App::getLocale() == 'ar') الدعم والقانون @else Legal & Support @endif</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/privacy-policy') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') سياسة الخصوصية @else Privacy Policy @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/terms-and-conditions') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') الشروط والأحكام @else Terms & Conditions @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/refund-policy') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') سياسة الاسترداد @else Refund Policy @endif</a></li>
                    <li class="mb-2"><a href="{{ url(app()->getLocale().'/contacts') }}" class="text-light opacity-75 text-decoration-none"><i class="fas fa-chevron-right me-2" style="font-size: 0.7rem;"></i>@if(App::getLocale() == 'ar') الدعم الفني @else Support @endif</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-top border-secondary py-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0 text-light opacity-75">
                        &copy; {{ date('Y') }} 
                        @if(App::getLocale() == 'ar')
                            جميع الحقوق محفوظة.
                        @else
                            All rights reserved.
                        @endif
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="text-light opacity-75">
                        @if(App::getLocale() == 'ar')
                            صُنع بـ 
                        @else
                            Made with 
                        @endif
                        <i class="fas fa-heart text-danger"></i>
                        @if(App::getLocale() == 'ar')
                            في السعودية
                        @else
                            in Saudi Arabia
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    footer {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    }
    
    footer h5, footer h6 {
        color: white;
        position: relative;
        padding-bottom: 0.5rem;
    }
    
    footer h5::after, footer h6::after {
        content: '';
        position: absolute;
        left: 0;
        @if(App()->getLocale() == 'ar')
            right: 0;
            left: auto;
        @endif
        bottom: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
        border-radius: 2px;
    }
    
    footer a {
        transition: all 0.3s ease;
    }
    
    footer a:hover {
        color: var(--primary-color) !important;
        opacity: 1 !important;
        transform: translateX(5px);
        @if(App()->getLocale() == 'ar')
            transform: translateX(-5px);
        @endif
    }
    
    .social-links .btn {
        width: 40px;
        height: 40px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .social-links .btn:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        transform: translateY(-3px);
    }
</style>
