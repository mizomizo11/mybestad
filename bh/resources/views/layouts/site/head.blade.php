
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title> Ask Our Doctor</title>

    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('all/css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('all/dist/css/ace.css')}}">--}}

        <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('all/dist/css/rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all/dist/css/rtl/ace.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('all/node_modules/@fortawesome/fontawesome-free/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all/node_modules/@fortawesome/fontawesome-free/css/regular.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all/node_modules/@fortawesome/fontawesome-free/css/brands.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('all/node_modules/@fortawesome/fontawesome-free/css/solid.css')}}">


    <link rel="stylesheet" type="text/css" href="{{ asset('all/dist/css/ace-font.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('all/favicon.png')}}"/>
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <!-- "Dashboard" page styles specific to this page for demo purposes -->
    <script type="text/javascript" src="{{ asset('all/node_modules/jquery/dist/jquery.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{  asset('all/css/jquery.simple-dtpicker.css')}}" />



    <style type="text/css">
        @font-face {
            font-family: font2;
            {{--src: '{{asset('all/fonts/droid.ttf')}}';--}}
            src: url({{  asset('all/fonts/droid.ttf')}});
        }
        html, body {
            font-family: font2;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('all/css/lobibox.css')}}">
    <script src="{{ asset('all/js/lobibox.js')}}"></script>
    <script src="{{ asset('all/js/lobibox-demo.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('all/css/aos.css')}}">
    <script src="{{ asset('all/js/aos.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('all/css/animate.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('all/css/jquery.fileuploader.min.css')}}">



    <script>
        $(document).ready(function(){
            $('.tooltip-1').tooltip();
           AOS.init({duration: 1200,});
        });
    </script>

    @yield('style')
</head>









