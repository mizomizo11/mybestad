@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}"> الصفحة الرئيسية  </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/patients') }}">ادارة  </a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!--breadcrumbs-->
@endsection
@section('content')
    <form id="form1"  method="POST" action="{{url(app()->getLocale()."/admins/patients/update")}}"  enctype="multipart/form-data"  style="">
        @csrf
        <input  type="hidden" name="id"  value="{{$patient -> id}}" />
        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <h2 style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;"> {{ __('site.edit_account_informations') }}</h2>
                    <div class='row' style="padding-top: 20px;">
                        <div class="col-md-4">
                            <label style="font-weight: bold;" >* {{ __('site.name') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" value="{{$patient->name}}" id="name"   class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.mobile') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="mobile" value="{{$patient->mobile}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.email') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="email" value="{{$patient->email}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >*{{ __('site.password') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="password" value="{{$patient->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input  type="text" name="password2" value="{{$patient->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;"  > Country </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="country_id" class="form-control form-control-sm" style="border-radius:5px">
                                @foreach ($countries as $country)
                                    <option value="{{$country -> id}}" @if ($country -> id == $patient -> country_id) selected @endif>{{$country -> {'name_'.app()->getLocale()} }}</option>
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
                        <div class='col-md-2'>
                            <div>
                                <div>  <img class="zoom_it" src="{{url(Config::get('app.upload'))}}/{{  $patient -> image }}" style="width:40px;height:30px"></div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;font-family: font2;;">تحديث</button>
            </div>
        </div>
    </form>
@stop
