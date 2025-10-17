@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="form1"  method="POST" action="{{url(app()->getLocale()."/doctors/update-in-site")}}"  enctype="multipart/form-data"  style="">

        <input  type="hidden" name="id"  value="{{$doctor -> id}}" />
        <div class="row">
            <div class="col-md-6" style="margin: auto">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-success">{{ Session::get('error') }}</div>
                @endif
                @csrf
                <h2 class="" style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;"> {{ __('site.edit_account_informations') }}</h2>
                <div class='row' style="padding-top: 20px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.name') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" value="{{$doctor->name}}" id="name"   class="form-control form-control-sm"  required=""  />
                    </div>

                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.age') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="age" id="age" value="{{$doctor->age}}"   class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >* {{ __('site.mobile') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="mobile" value="{{$doctor->mobile}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >* {{ __('site.email') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="email" value="{{$doctor->email}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >*{{ __('site.password') }}</label>
                    </div>
                    <div class='col-md-6'>
                        <input type="password" name="password" value="{{$doctor->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                    </div>
                    <div class='col-md-6'>
                        <input  type="password" name="password2" value="{{$doctor->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 30px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.specialty') }}</label>
                    </div>
                    <div class="col-md-6">
                        <select id="" name="specialty_id" class="form-control form-control-sm" style="border-radius:5px">
                            @foreach ($specialties as $specialty)
                                    <option value="{{$specialty -> id}}"  @if ($specialty -> id == $doctor -> specialty_id) selected  @endif>  {{$specialty->{"name_".App::getLocale()}  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.years_of_experience') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="years_of_experience" id="years_of_experience" value="{{$doctor->years_of_experience}}"    class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.place_of_work') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="place_of_work" id="place_of_work" value="{{$doctor->place_of_work}}"    class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.certificate_issuer') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="certificate_issuer" id="certificate_issuer" value="{{$doctor->certificate_issuer}}"    class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  >* {{ __('site.country') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <select id="" name="countries_id" class="form-control form-control-sm" style="border-radius:5px">
                            @foreach ($countries as $country)
                                    <option value="{{$country -> id}}"  @if ($country -> id == $doctor -> country_id) selected @endif>{{$country -> {"name_".app()->getLocale()}    }}</option>
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
                                    <option value="{{$timezone -> id}}"  @if ($timezone -> id == $doctor -> timezone_id) selected @endif>{{$timezone ->{'name_'.app()->getLocale()} }}
                                        {{ $timezone -> utc_offset }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  > {{ __('site.photo') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input class="form-control form-control-sm"  type="file"   name="personal_image"  />
                    </div>
                    <div class='col-md-2'>
                        <div >
                            <div >
                                @if($doctor->personal_image)
                                    <img
                                        class="zoom_it  radius-round border-2 brc-blue-tp1 mr-2"
                                        src="{{asset(Config::get('app.upload'))}}/{{$doctor->personal_image}}"
                                        alt="" style="width: 40px;height:40px">
                                @else
                                    <img
                                        class=" d-lg-inline-block radius-round border-2 brc-blue-tp1 mr-2"
                                        src="{{asset('/all/img/user.jpg')}}" style="width: 40px;height:40px">
                                @endif


                               </div>
                        </div>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  > {{ __('site.certificate_copy') }}  </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input class="form-control form-control-sm"  type="file"   name="certificate_image"  />
                    </div>
                    <div class='col-md-2'>
                        <div >
                            <div >  <img class="zoom_it border-1 brc-blue-tp1 mr-2" src="{{url(Config::get('app.upload'))}}/{{  $doctor -> certificate_image }}" style="width:40px;height:30px"></div>
                        </div>
                    </div>
                </div>


                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  >  {{ __('site.temporary_deactivate_account') }}   </label>
                        </div>
                        <div class='col-md-6'>
                            <select id="" name="stopped" class="form-control form-control-sm " style="border-radius:5px" >
                                <option value="yes" @if ( $doctor -> stopped=="yes")   selected @endif>Yes</option>
                                <option value="no"  @if ( $doctor -> stopped=="no")   selected @endif>NO</option>
                            </select>

                        </div>
                    </div>




            </div>
        </div>
        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;font-family: font2;;">{{ __('site.update') }}</button>
            </div>
        </div>
    </form>


@endsection



