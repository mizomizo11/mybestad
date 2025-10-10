@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')


    <div class="container" style=";padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        <div class="row">
            <div class="col-md-4" style="margin: auto;margin-top: 40px">
                <h3 class="" style="text-align: center;border-bottom:1px solid #df424c;padding:10px;"> {{ __('site.login_as_doctor') }}</h3>

                @if (Session::has('message'))
                    <div class="alert alert-warning">{{ Session::get('message') }}</div>
                @endif
                <form  method="POST" action="{{route('doctor.login',["locale"=>app()->getLocale()]) }}">
                    @csrf
                    <div class='row' >
                        <div class='col-md-12'>
                            <div>
                                <label>*{{ __('site.email') }}</label>
                            </div>
                            <div>
                                <input type="text" name="email"  class="form-control form-control-sm"  style="direction: ltr;text-align: left" required=""  />
                            </div>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 10px;">
                        <div class='col-md-12'>
                            <div>
                                <label>* {{ __('site.password') }}</label>
                                <input type="password" name="password" class="form-control form-control-sm" style="direction: ltr;text-align: left"  required=""  />
                            </div>
                        </div>
                    </div>

                    <div id="notice">  </div>
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <a href="{{ route('doctor.forgot.password.form',['locale'=>App()->getLocale()]) }}"> {{ __('site.forgot_password') }}</a>

                            <button  class="btn btn-md  btn-info "  name="login_btn" id="login_btn"   style="width: 200px">{{ __('site.login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



