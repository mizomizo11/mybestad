
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
                <form id="login_form"  method="POST" action="{{ route('admin_login_form', ['locale' => app()->getLocale()]) }}"   >
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
                                <input type="text" name="login_password" class="form-control form-control-sm" style="direction: ltr;text-align: left"  required=""  />
                            </div>
                        </div>
                    </div>
                    <div id="notice">  </div>
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
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
                            <input type="text" name="password" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input  type="text" name="password2" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  > Country </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="country_id" class="form-control form-control-sm " style="border-radius:5px" required="" >
                                @foreach ($countries as $country)
                                    <option value="{{$country -> id}}">{{$country -> name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  > صورة </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control form-control-sm"  type="file"   name="imagefile"  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <input type="submit"  class="btn btn-md btn-info "  name="Submit" id="submit-btn" value="{{ __('site.register') }}"  style="width: 200px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $("#login_btn").click(function(e){
                e.preventDefault();
                var formData = new FormData($("#login_form")[0]);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax(
                    {
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        type: "post", // replaced from put
                        url:"{{url(app()->getLocale()."/patients/login")}}",
                        data:formData,
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        dataType:'json',
                        success: function (data)
                        {
                            if(data.status === "true")
                            {
                                Lobibox.notify('success', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom left',
                                    size: 'mini',
                                    msg: '<h5>تم الدخول بنجاح</h5>'
                                });
                                setTimeout(function (){
                                    window.location.href = '/{{App::getLocale()}}';
                                    Swal.close();
                                },2000);
                            }else{
                                Lobibox.notify('error', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom left',
                                    size: 'mini',
                                    msg: '<h5>فشل الدخول</h5>'
                                });
                                Swal.close();
                            }
                        },
                        error: function(xhr) {
                            // alert(xhr)
                            // do something here because of error
                        }
                    });






            });

        });


    </script>

@endsection



{{--<x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}
{{--doctor login--}}
{{--    <form method="POST" action="{{url(app()->getLocale().'/doctors/login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">--}}
{{--                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{url(app()->getLocale().'/doctors/forgot-password') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ml-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}
