@extends('layouts.site.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;border-bottom:1px solid #0f9bc0;color: #0f9bc0;padding:10px;">
                    {{ __('site.login_as_patient') }}
                </h3>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        <div class="row">
            <div class="col-md-3">
                <h3 class="" style="text-align: center;border-bottom:1px solid #0f9bc0;padding:10px;color: #0f9bc0;"> {{ __('site.login_as_patient') }}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-warning">{{ Session::get('message') }}</div>
                @endif
                <form  method="POST" action="{{route('patient.login',["locale"=>app()->getLocale()]) }}"    >
                    @csrf
                    <div class='row' >
                        <div class='col-md-12'>
                            <div>
                                <label>* {{ __('site.email') }}</label>
                            </div>
                            <div>
                                <input type="text" name="login_email"  class="form-control form-control-sm"  style="direction: ltr;text-align: left" required=""  />
                            </div>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 10px;">
                        <div class='col-md-12'>
                            <div >
                                <label>* {{ __('site.password') }}</label>
                                <input type="password" name="login_password" class="form-control form-control-sm" style="direction: ltr;text-align: left"  required=""  />
                            </div>
                        </div>
                    </div>
                    <div id="notice">  </div>
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <a href="{{ route('patient.forgot.password.form',['locale'=>App()->getLocale()]) }}"> {{ __('site.forgot_password') }}</a>
                            <button  class="btn btn-md btn-info  "  name="login_btn" id="login_btn"   style="width: 200px">{{ __('site.login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1" style="border-left:1px solid #e5e5e5">
            </div>
            <div class="col-md-1" >
            </div>
            <div class="col-md-6" style="">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="" style="text-align: center;border-bottom:1px solid #0f9bc0;padding:10px;color: #0f9bc0;"> {{ __('site.register_as_patient') }}</h2>
                <form id="register_form"  method="POST" action="{{route('patient.register',["locale"=>app()->getLocale()]) }}"     enctype="multipart/form-data" >
                    @csrf
                    <div class='row' style="padding-top: 20px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;" >* {{ __('site.name') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name"   class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.mobile') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="mobile" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.email') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="email" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >*{{ __('site.password') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input type="password" name="password" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input  type="password" name="password2" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  >*   {{ __('site.country') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="country_id" class="form-control form-control-sm " style="border-radius:5px" required="" >
                                @foreach ($countries as $country)
                                    <option value="{{$country -> id}}">{{$country -> {"name_".app()->getLocale()} }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  >* {{ __('site.timezone') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <select  name="timezone_id" class="form-control form-control-sm js-example-basic-single" style="border-radius:5px;text-align: left">
                                @foreach ($timezones as $timezone)
                                    <option value="{{$timezone -> id}}"  >
                                        {{$timezone ->{'name_'.app()->getLocale()} }} {{ $timezone -> utc_offset }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  >  {{ __('site.photo') }} ( {{ __('site.optional') }} )  </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control form-control-sm"  type="file"   name="image_file"  />
                        </div>
                    </div>

                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-12 '>
                            <label style="font-weight: bold;"  > {{ __('site.using_conditions_and_privacy_policy') }}    </label>
                        </div>
                        <div class='col-md-10'>

                            {{ __('site.when_click_on_create_account_you_have_read_understand_and_agree_on') }}
                            <a href="{{url(app()->getLocale()."/privacy-policy")}}" target="_blank" class="">
                                <b><u>   {{ __('site.using_conditions_and_privacy_policy') }}      </u>   </b>
{{--                                <span style="color: #000">       {{ __('site.read_more') }}...   </span>--}}


                            </a>
                        </div>
                    </div>







                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <input type="submit"  class="btn btn-md btn-info "  name="Submit" id="submit-btn" value="{{ __('site.create_account') }}"  style="width: 200px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            {{--$("#register_form11").submit(function(e){--}}
            {{--    e.preventDefault()--}}
            {{--     //alert("ans");--}}
            {{--    var formData = new FormData($("#register_form")[0]);--}}
            {{--    formData.append('_token', '{{ csrf_token() }}');--}}
            {{--    $.ajax(--}}
            {{--        {--}}
            {{--            beforeSend: function() {--}}
            {{--                Swal.showLoading();--}}
            {{--            },--}}
            {{--            type: "post", // replaced from put--}}
            {{--            url:"{{url(app()->getLocale()."/patients/register")}}",--}}
            {{--            data:formData,--}}
            {{--            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)--}}
            {{--            processData: false, // NEEDED, DON'T OMIT THIS--}}
            {{--            dataType:'json',--}}
            {{--            success: function (data)--}}
            {{--            {--}}
            {{--                if(data.status === "true" )--}}
            {{--                {--}}
            {{--                    Lobibox.notify('success', {--}}
            {{--                        continueDelayOnInactiveTab: true,--}}
            {{--                        position: 'bottom left',--}}
            {{--                        size: 'mini',--}}
            {{--                        msg: '<h5>تم التسجيل بنجاح </h5>'--}}
            {{--                    });--}}

            {{--                    setTimeout(function (){--}}
            {{--                       window.location.href = '/{{App::getLocale()}}/';--}}
            {{--                    },2000);--}}
            {{--                }else{--}}
            {{--                    Lobibox.notify('warning', {--}}
            {{--                        continueDelayOnInactiveTab: true,--}}
            {{--                        position: 'bottom right',--}}
            {{--                        size: 'mini',--}}
            {{--                        msg: '<h5>فشل</h5>'--}}
            {{--                    });--}}
            {{--                }--}}
            {{--                Swal.close();--}}
            {{--            },--}}
            {{--            error: function(xhr) {--}}
            {{--                // alert(xhr)--}}
            {{--                // do something here because of error--}}
            {{--            }--}}
            {{--        });--}}
            {{--});--}}
            {{--$("#login_btn").click(function(e){--}}
            {{--   e.preventDefault();--}}
            {{--    var formData = new FormData($("#login_form")[0]);--}}
            {{--    formData.append('_token', '{{ csrf_token() }}');--}}
            {{--    $.ajax(--}}
            {{--        {--}}
            {{--            beforeSend: function() {--}}
            {{--                Swal.showLoading();--}}
            {{--            },--}}
            {{--            type: "post", // replaced from put--}}
            {{--            url:"{{url(app()->getLocale()."/patients/login")}}",--}}
            {{--            data:formData,--}}
            {{--            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)--}}
            {{--            processData: false, // NEEDED, DON'T OMIT THIS--}}
            {{--            dataType:'json',--}}
            {{--            success: function (data)--}}
            {{--            {--}}
            {{--                if(data.status === "true")--}}
            {{--                {--}}
            {{--                    Lobibox.notify('success', {--}}
            {{--                        continueDelayOnInactiveTab: true,--}}
            {{--                        position: 'bottom left',--}}
            {{--                        size: 'mini',--}}
            {{--                        msg: '<h5>تم الدخول بنجاح</h5>'--}}
            {{--                    });--}}
            {{--                    setTimeout(function (){--}}
            {{--                        window.location.href = '/{{App::getLocale()}}';--}}
            {{--                        Swal.close();--}}
            {{--                    },2000);--}}
            {{--                }else{--}}
            {{--                    Lobibox.notify('error', {--}}
            {{--                        continueDelayOnInactiveTab: true,--}}
            {{--                        position: 'bottom left',--}}
            {{--                        size: 'mini',--}}
            {{--                        msg: '<h5>فشل الدخول</h5>'--}}
            {{--                    });--}}
            {{--                    Swal.close();--}}
            {{--                }--}}
            {{--            },--}}
            {{--            error: function(xhr) {--}}
            {{--                // alert(xhr)--}}
            {{--                // do something here because of error--}}
            {{--            }--}}
            {{--        });--}}






            {{--});--}}

        });


    </script>

@endsection



