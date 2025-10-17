<!doctype html>
<html class="rtl" style="font-size: 0.85rem;direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">
@include('layouts.site.head')
<body>
<div class="body-container">
{{--    @include('layouts.site.topbar')--}}
    @include('layouts.site.navbar')
{{--    @include('layouts.site.searchbar')--}}
    @yield('carousel1')
        <div class="main-container">
           <div role="main" class="main-content">
                @section('breadcrumb')
                @show
                <div class="page-content container">
                    <div class="row">
                        <div class="col-12 ">
                            @yield('content')
                        </div>
                    </div>
                </div><!-- /.page-content -->
            </div><!-- /main-content -->
        </div>{{--/main-container--}}
    @yield('carousel2')
    @yield('4_companies')
    @include('layouts.site.footer')
</div>{{--/body-container--}}
</body>
</html>



