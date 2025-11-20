@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة الاعدادات</li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')




            <form method="POST" id="postForm" action="{{url(app()->getLocale().'/admins/settings/update') }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="id" value="{{ $settings -> id }}"/>
                <fieldset
                    style="border: 1px solid #dfdfdf;border-radius: 5px;">
                    <legend
                        style="width: auto;margin:0 10px;padding: 0px 10px;font-size: 18px;border: 1px solid #dfdfdf;background-color: #f6f6f6">
                        خيارات التصميم
                    </legend>


                <div class='row' style="padding: 10px 30px">
                    <div class='col-md-1'>
                        <div>
                            <label> اللوغو - Ar </label>
                            <div><img class="zoom_it"
                                      src="/{{Config::get('app.upload')}}{{  $settings -> logo_ar }}"
                                      style="width:40px;height:30px"></div>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div>
                            <label>صورة</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control" type="file" name="imagefile1"/>
                        </div>
                    </div>
                    <div class='col-md-4'></div>

                    <div class='col-md-1'>
                        <div>
                            <label> اللوغو - En </label>
                            <div><img class="zoom_it"
                                      src="/{{Config::get('app.upload')}}{{  $settings -> logo_en }}"
                                      style="width:40px;height:30px"></div>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div>
                            <label>صورة</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control" type="file" name="imagefile2"/>
                        </div>
                    </div>
                </div>
                <div class='row' style="padding: 10px 30px;margin-top:10px">
                    <div class='col-md-2'>
                        <div>
                            <h6>اللون الرئيسي </h6>
                            <input type="color" class="form-control" name="primary_color"
                                   value="{{ $settings -> primary_color }}"  style=""/>
                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div>
                            <h6>اللون الفرعي </h6>
                            <input type="color" class="form-control" name="secondary_color"
                                   value="{{ $settings -> secondary_color }}" style=""/>
                        </div>
                    </div>

                </div>

                </fieldset>

                <div class='row' style="margin-top: 25px;">
                    <div class='col-sm-12' style="text-align: center;margin: 0px;">
                        <button class="btn btn-lg btn-info " name="Submit" type="Submit" style="width: 200px;">تحديث
                        </button>
                    </div>
                </div>
            </form>





@stop
