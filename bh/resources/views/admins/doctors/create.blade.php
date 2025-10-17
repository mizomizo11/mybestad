@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1"><a href="{{url(app()->getLocale().'/admins/doctors')}}">
                        ادارة الاطباء المشتركين</a></li>
                <li class="breadcrumb-item active text-grey-d1">اضافة</li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')
    <div class="container"
         style=";padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        <form method="POST" action="{{route('doctor.store',["locale"=>app()->getLocale()]) }}"
              enctype="multipart/form-data">
            <div class="row">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="col-md-6" style="margin: auto">

                    @csrf
                    <div class='row' style="padding-top: 20px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;">* {{ __('site.name') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="padding-top: 5px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;">* {{ __('site.age') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="age" id="age" class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;">* {{ __('site.mobile') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="number" name="mobile" style="direction: ltr;text-align: left"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>

                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;">* {{ __('site.email') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="email" style="direction: ltr;text-align: left"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;">*{{ __('site.password') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="password" style="direction: ltr;text-align: left"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;">* {{ __('site.password_confirmation') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="password2" style="direction: ltr;text-align: left"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="padding-top: 30px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;">* {{ __('site.specialty') }}</label>
                        </div>
                        <div class="col-md-6">

                            <select id="" name="specialties_id" class="form-control form-control-sm "
                                    style="border-radius:5px" required="">
                                @foreach ($specialties as $specialty)
                                    <option
                                        value="{{$specialty -> id}}">{{$specialty -> {"name_".app()->getLocale()} }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='row' style="padding-top: 5px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;">* {{ __('site.years_of_experience') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="years_of_experience" id="years_of_experience"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="padding-top: 5px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;">* {{ __('site.place_of_work') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="place_of_work" id="place_of_work"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>
                    <div class='row' style="padding-top: 5px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;">* {{ __('site.certificate_issuer') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="certificate_issuer" id="certificate_issuer"
                                   class="form-control form-control-sm" required=""/>
                        </div>
                    </div>


                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;">* {{ __('site.country') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="country_id" class="form-control form-control-sm "
                                    style="border-radius:5px">
                                @foreach ($countries as $country)
                                    <option
                                        value="{{$country -> id}}">{{$country -> {"name_".app()->getLocale()} }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;">* {{ __('site.timezone') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <select name="timezone_id" class="form-control form-control-sm"
                                    style="border-radius:5px;text-align: left">
                                @foreach ($timezones as $timezone)
                                    <option value="{{$timezone -> id}}">{{$timezone -> name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"> {{ __('site.personal_image') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control form-control-sm" type="file" name="personal_image"/>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"> {{ __('site.cerificate_image') }}  </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control form-control-sm" type="file" name="certificate_image"/>
                        </div>
                    </div>

                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;">مقفل </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="locked" class="form-control form-control-sm " style="border-radius:5px">
                                <option value="yes">Yes</option>
                                <option value="no">NO</option>
                            </select>

                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;">مفعل من الطبيب </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="stopped" class="form-control form-control-sm "
                                    style="border-radius:5px">
                                <option value="yes">Yes</option>
                                <option value="no">NO</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>



            <link rel="stylesheet" href="{{ asset('all/suneditor/suneditor.min.css') }}"/>
            <script src="{{ asset('all/suneditor/suneditor.min.js') }}"></script>
            <script src="{{ asset('all/suneditor/en.js') }}"></script>
            <div class='row' style="margin-top: 5px;">
                <div class='col-md-12'>
                    <label>التفاصيل - عربي</label>
                    <textarea id="details_ar" name="details_ar"
                              style="direction: rtl;text-align: right;height: 150px;width: 100%"></textarea>
                </div>
                <script>
                    const editor = SUNEDITOR.create((document.getElementById('details_ar')),
                        {
                            "mode": "classic",
                            "rtl": false,
                            "katex": "window.katex",
                            "imageGalleryUrl": "https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo",
                            "videoFileInput": false,
                            "tabDisable": false,
                            "buttonList": [
                                [
                                    "undo",
                                    "redo",
                                    "font",
                                    "fontSize",
                                    "formatBlock",
                                    "paragraphStyle",
                                    "blockquote",
                                    "bold",
                                    "underline",
                                    "italic",
                                    "strike",
                                    "subscript",
                                    "superscript",
                                    "fontColor",
                                    "hiliteColor",
                                    "textStyle",
                                    "removeFormat",
                                    "outdent",
                                    "indent",
                                    "align",
                                    "horizontalRule",
                                    "list",
                                    "lineHeight",
                                    "table",
                                    "link",
                                    "image",
                                    "video",
                                    "audio",
                                    "math",
                                    "imageGallery",
                                    "fullScreen",
                                    "showBlocks",
                                    "codeView",
                                    "preview",
                                    "print",
                                    "save",
                                    "template"
                                ]
                            ],
                            "lang": SUNEDITOR_LANG.en,
                            "lang(In nodejs)": "en"
                        }
                    );
                    editor.onChange = (contents, core) => {
                        editor.save();
                    }
                </script>
            </div>
            <div class='row' style="margin-top: 5px;">
                <div class='col-md-12'>
                    <label>التفاصيل - انكليزي</label>
                    <textarea id="details_en" name="details_en"  style="direction: ltr;text-align: left;height: 150px;width: 100%"  ></textarea>
                </div>
                <script>
                    const editor2 = SUNEDITOR.create((document.getElementById('details_en') ),
                        {
                            "mode": "classic",
                            "rtl": false,
                            "katex": "window.katex",
                            "imageGalleryUrl": "https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo",
                            "videoFileInput": false,
                            "tabDisable": false,
                            "buttonList": [
                                [
                                    "undo",
                                    "redo",
                                    "font",
                                    "fontSize",
                                    "formatBlock",
                                    "paragraphStyle",
                                    "blockquote",
                                    "bold",
                                    "underline",
                                    "italic",
                                    "strike",
                                    "subscript",
                                    "superscript",
                                    "fontColor",
                                    "hiliteColor",
                                    "textStyle",
                                    "removeFormat",
                                    "outdent",
                                    "indent",
                                    "align",
                                    "horizontalRule",
                                    "list",
                                    "lineHeight",
                                    "table",
                                    "link",
                                    "image",
                                    "video",
                                    "audio",
                                    "math",
                                    "imageGallery",
                                    "fullScreen",
                                    "showBlocks",
                                    "codeView",
                                    "preview",
                                    "print",
                                    "save",
                                    "template"
                                ]
                            ],
                            "lang": SUNEDITOR_LANG.en,
                            "lang(In nodejs)": "en"
                        }

                    );
                    editor2.onChange = (contents, core) => {
                        editor2.save();
                    }

                </script>
            </div>


            <div class='row' style="margin-top: 25px;">
                <div class='col-sm-12' style="text-align: center;margin: 0px;">
                    <input type="submit" class="btn btn-md btn-primary " name="Submit" id="submit-btn"
                           value="{{ __('site.register') }}" style="width: 200px;">
                </div>
            </div>



    </form>
    </div>




@stop



