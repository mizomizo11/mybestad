@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة كيف نعمل</li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')


    <link rel="stylesheet" href="{{  asset('all/richtexteditor/rte_theme_default.css')}}" />
    <script src="{{  asset('all/richtexteditor/rte.js')}}"></script>
    <script src="{{  asset('all/richtexteditor/plugins/all_plugins.js')}}"></script>


    <form method="POST" action="{{ route('video-update',['locale'=>app()->getLocale()]) }}"
          enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="id" value="{{ $video -> id }}" size="44" style=""/>
        <h3>كيف نعمل</h3>
        <div class='row' style="padding: 10px 30px;">
             <div class='col-md-4'>
                <div>
                    <label>فيديو - عربي </label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm" type="file" name="video1"/>
                </div>
                 <video width="250" height="150" controls style="margin: auto">
                     <source src="{{asset(Config::get('app.upload'))}}/{{$video->video_ar }}" type="video/mp4">
                     <source src="movie.ogg" type="video/ogg">
                     Your browser does not support the video tag.
                 </video>
            </div>
            <div class='col-md-4'>
                <div>
                    <label>فيديو - انكليزي </label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm" type="file" name="video2"/>
                </div>
                <video width="250" height="150" controls style="margin: auto">
                    <source src="{{asset(Config::get('app.upload'))}}/{{$video->video_en }}" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class='row' style="padding: 10px 30px;">
            <div class='col-md-12'>
                <label style=""> {{ __('site.details') }}-{{ __('site.arabic') }} </label>

                <textarea id="div_editor1" style="direction: ltr;text-align: left" name="details_ar" class="tinymce" style="height: 300px"
                    >{!! $video -> details_ar !!}</textarea>


{{--                <textarea rows="4" cols="20" id="contact" name="details_ar"--}}
{{--                          class="form-control">{{$video -> details_ar}}</textarea>--}}
            </div>
            <div class='col-md-126'>
                <label style=""> {{ __('site.details') }}-{{ __('site.english') }} </label>

                <textarea id="div_editor2" style="direction: ltr;text-align: left" name="details_en" class="tinymce" style="height: 300px"
                    >{!! $video -> details_en !!}</textarea>




{{--                <textarea rows="4" cols="20" id="contact" name="details_en" class="form-control"--}}
{{--                          style="direction: ltr;">{{$video -> details_en}}</textarea>--}}
            </div>
        </div>


        <h3 style="margin-top: 50px"> الصفحة الرئيسية </h3>
        <div class='row' style="padding: 10px 30px;">
            <div class='col-md-4'>
                <div>
                    <label>فيديو - عربي </label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm" type="file" name="video3"/>
                </div>
                <video width="250" height="150" controls style="margin: auto">
                    <source src="{{asset(Config::get('app.upload'))}}/{{$video->video2_ar }}" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
            </div>
            <div class='col-md-4'>
                <div>
                    <label>فيديو - انكليزي </label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm" type="file" name="video4"/>
                </div>
                <video width="250" height="150" controls style="margin: auto">
                    <source src="{{asset(Config::get('app.upload'))}}/{{$video->video2_en }}" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class='row' style="padding: 10px 30px;">
            <div class='col-md-12'>
                <label style=""> {{ __('site.details') }}-{{ __('site.arabic') }} </label>
                <textarea id="div_editor3" style="direction: ltr;text-align: left" name="details2_ar" class="tinymce" style="height: 300px"
                    >{!! $video -> details2_ar !!}</textarea>
{{--                <textarea rows="4" cols="20" id="contact" name="details2_ar"--}}
{{--                          class="form-control">{{$video -> details2_ar}}</textarea>--}}
            </div>
            <div class='col-md-12'>
                <label style=""> {{ __('site.details') }}-{{ __('site.english') }} </label>
                <textarea id="div_editor4" style="direction: ltr;text-align: left" name="details2_en" class="tinymce" style="height: 300px"
                    >{!! $video -> details2_en !!}</textarea>


{{--                <textarea rows="4" cols="20" id="contact" name="details2_en" class="form-control"--}}
{{--                          style="direction: ltr;">{{$video -> details2_en}}</textarea>--}}
            </div>
        </div>


        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button class="btn btn-lg btn-info " name="Submit" type="Submit" style="width: 200px;">Update</button>
            </div>
        </div>
    </form>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/sre10ewrt23b98iw5f2vjruqeziwnhzasjwnim0j3phecotx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
    tinymce.init({
        selector: '.tinymce',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    </script>
@stop
