<!doctype html>
<html class="rtl" style="font-size: 0.85rem;">
{{--@include('layout.head')--}}
<body>
<div class="body-container">
{{--    @include('layout.navbar')--}}
<div class="main-container">

{{--    @include('layout.sidebar')--}}
    <div role="main" class="main-content">
{{--       @include('layout.breadcrumb')--}}
{{--        @section('breadcrumb')--}}


        <div class="page-content container">
            <div class="row">
                <div class="col-12 ">


                    @yield('content')



                </div>
            </div>
        </div><!-- /.page-content -->
    </div><!-- /main-content -->

</div>{{--/main-container--}}

</div>{{--/body-container--}}

{{--@include('layout.footer')--}}
</body>
</html>
