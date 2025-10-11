<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="@if(App()->getLocale() == 'ar')rtl @else ltr @endif">
@include('layouts.site.head')

<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar -->
        @include('layouts.site.navbar')
        
        <!-- Hero/Carousel Section (if needed) -->
        @yield('carousel1')
        @yield('hero')
        
        <!-- Breadcrumb (optional) -->
        @if(View::hasSection('breadcrumb'))
            <div class="bg-light-custom py-3">
                <div class="container">
                    @yield('breadcrumb')
                </div>
            </div>
        @endif
        
        <!-- Main Content -->
        <main class="flex-grow-1">
            @yield('content')
        </main>
        
        <!-- Additional Sections -->
        @yield('carousel2')
        @yield('4_companies')
        @yield('additional_sections')
        
        <!-- Footer -->
        @include('layouts.site.footer')
    </div>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>
    
    <!-- Custom JS -->
    <script>
        // CSRF Token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Add active state to current page nav link
        const currentLocation = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentLocation) {
                link.classList.add('active', 'text-primary-custom');
            }
        });
        
        // Bootstrap tooltip initialization
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Bootstrap popover initialization
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    </script>
    
    @yield('scripts')
</body>
</html>
