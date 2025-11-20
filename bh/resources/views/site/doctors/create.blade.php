@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')


    <div class="container" style=";padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        <div class="row">
            <div class="col-md-5" style="margin: auto;margin-top: 40px">
                <h3 class="" style="text-align: center;border-bottom:1px solid #df424c;padding:10px;"> {{ __('site.doctor_registration') }}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
{{--                @if (Session::has('message'))--}}
{{--                    <div class="alert alert-warning">{{ Session::get('message') }}</div>--}}
{{--                @endif--}}
                <div class="col-md-12" style="margin: auto">
                    <form   method="POST" action="{{route('site.doctor.store',["locale"=>app()->getLocale()]) }}"   enctype="multipart/form-data" >
                        @csrf
                        <div class='row' style="padding-top: 20px;">
                            <div class="col-md-3">
                                <label style="font-weight: bold;" >* {{ __('site.name') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name"   class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>
                        <div class='row' style="padding-top: 5px;">
                            <div class="col-md-3">
                                <label style="font-weight: bold;" >* {{ __('site.age') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="age" id="age"   class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3'>
                                <label style="font-weight: bold;" >* {{ __('site.mobile') }} </label>
                            </div>
                            <div class='col-md-9'>
                                <input type="number" name="mobile" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>

                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3'>
                                <label style="font-weight: bold;" >* {{ __('site.email') }} </label>
                            </div>
                            <div class='col-md-9'>
                                <input type="text" name="email" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3'>
                                <label style="font-weight: bold;" >*{{ __('site.password') }}</label>
                            </div>
                            <div class='col-md-9'>
                                <input type="password" name="password" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3'>
                                <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                            </div>
                            <div class='col-md-9'>
                                <input  type="password" name="password2" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>
                        <div class='row' style="padding-top: 30px;">
                            <div class="col-md-3">
                                <label style="font-weight: bold;" >* {{ __('site.specialty') }}</label>
                            </div>
                            <div class="col-md-9">

                                <select id="" name="specialties_id" class="form-control form-control-sm " style="border-radius:5px" required="" >
                                    @foreach ($specialties as $specialty)
                                        <option value="{{$specialty -> id}}">{{$specialty -> {"name_".app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='row' style="padding-top: 5px;">
                            <div class="col-md-3">
                                <label style="font-weight: bold;" >* {{ __('site.years_of_experience') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="years_of_experience" id="years_of_experience"   class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>
                        <div class='row' style="padding-top: 5px;">
                            <div class="col-md-3">
                                <label style="font-weight: bold;" >* {{ __('site.place_of_work') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="place_of_work" id="place_of_work"   class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>
                        <div class='row' style="padding-top: 5px;">
                            <div class="col-md-3">
                                <label style="font-weight: bold;" >* {{ __('site.certificate_issuer') }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="certificate_issuer" id="certificate_issuer"   class="form-control form-control-sm"  required=""  />
                            </div>
                        </div>


                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3'>
                                <label style="font-weight: bold;"  >* {{ __('site.country') }} </label>
                            </div>
                            <div class='col-md-9'>
                                <select id="" name="countries_id" class="form-control form-control-sm " style="border-radius:5px" >
                                    @foreach ($countries as $country)
                                        <option value="{{$country -> id}}">{{$country -> {'name_'.app()->getLocale()} }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3 '>
                                <label style="font-weight: bold;"  >* {{ __('site.timezone') }} </label>
                            </div>
                            <div class='col-md-9'>
                                <select  name="timezone_id" class="form-control form-control-sm js-example-basic-single" style="border-radius:5px;text-align: left">
                                    @foreach ($timezones as $timezone)
                                        <option value="{{$timezone -> id}}"  >
                                            {{$timezone ->{'name_'.app()->getLocale()} }} {{ $timezone -> utc_offset }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3 '>
                                <label style="font-weight: bold;"  > {{ __('site.photo') }} </label>
                            </div>
                            <div class='col-md-9'>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                <input class="form-control form-control-sm"  type="file"   name="personal_image"  />
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-3 '>
                                <label style="font-weight: bold;"  > {{ __('site.cerificate_image') }}  </label>
                            </div>
                            <div class='col-md-9'>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                <input class="form-control form-control-sm"  type="file"   name="certificate_image"  />
                            </div>
                        </div>



                        <div class='row' style="margin-top: 25px;">
                            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                                <input type="submit"  class="btn btn-md btn-primary "  name="Submit" id="submit-btn" value="{{ __('site.register') }}"  style="width: 200px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection



