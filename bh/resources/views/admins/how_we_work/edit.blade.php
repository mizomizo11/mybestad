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
    <form method="POST" action="{{ route('howwework-update',['locale'=>app()->getLocale()]) }}"
          enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="id" value="{{ $how_we_work -> id }}" size="44" style=""/>
        <div class='row' style="padding: 10px 30px;">
            <div class='col-md-4'>
                <div>
                    <label style="">رابط الفيديو </label>
                    <input type="text" class="form-control form-control-sm" name="link"
                           style="direction: ltr;text-align: left;" value="{{$how_we_work->link}}" required/>
                </div>
            </div>
            <div class='col-md-1'>
                <div>
                    <label style="">or </label>
                </div>
            </div>
            <div class='col-md-2'>
                <div>
                    <label>فيديو</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm" type="file" name="image_file"/>
                </div>
            </div>
        </div>
        <div class='row' style="padding: 10px 30px;">
            <div class='col-md-6'>
                <label style=""> {{ __('site.details') }}-{{ __('site.arabic') }} </label>
                <textarea rows="4" cols="20" id="contact" name="details_ar"
                          class="form-control">{{$how_we_work -> details_ar}}</textarea>
            </div>
            <div class='col-md-6'>
                <label style=""> {{ __('site.details') }}-{{ __('site.english') }} </label>
                <textarea rows="4" cols="20" id="contact" name="details_en" class="form-control"
                          style="direction: ltr;">{{$how_we_work -> details_en}}</textarea>
            </div>
        </div>
        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button class="btn btn-lg btn-info " name="Submit" type="Submit" style="width: 200px;">Update</button>
            </div>
        </div>
    </form>
@stop
