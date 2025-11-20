@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')
    <div class="container" style=";padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <h2 class="" style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;"> {{ __('site.edit_account_informations') }}</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form  method="POST" action="{{route('patient.update',["locale"=>app()->getLocale()]) }}"     enctype="multipart/form-data" >
                    @csrf
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
                            <input type="password" name="password" value="{{$patient->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4'>
                            <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                        </div>
                        <div class='col-md-6'>
                            <input  type="password" name="password2" value="{{$patient->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  >* {{ __('site.country') }} </label>
                        </div>
                        <div class='col-md-6'>
                            <select  name="country_id" class="form-control form-control-sm" style="border-radius:5px">
                                @foreach ($countries as $country)
                                        <option value="{{$country -> id}}"  @if ($country -> id == $patient -> country_id) selected @endif>{{$country -> {"name_".app()->getLocale()} }}</option>
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
                                    <option value="{{$timezone -> id}}"  @if ($timezone -> id == $patient -> timezone_id) selected @endif>{{$timezone ->{'name_'.app()->getLocale()} }}
                                        {{ $timezone -> utc_offset }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 5px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  > {{ __('site.photo') }} ( {{ __('site.optional') }} )  </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control form-control-sm"  type="file"   name="imagefile"  />
                        </div>
                        <div class='col-md-2'>
                            <div >
                                <div >
                                    @if($patient->image)
                                        <img
                                            class="zoom_it  radius-round border-2 brc-blue-tp1 mr-2"
                                            src="{{asset(Config::get('app.upload'))}}/{{$patient->image}}"
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

                    <div class='row' style="margin-top: 20px;">
                        <div class='col-md-4 '>
                            <label style="font-weight: bold;"  > {{ __('site.preferences') }} </label>
                        </div>
                        <div class='col-md-6'>

                        </div>
                    </div>



                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <input type="submit"  class="btn btn-md btn-info "  name="Submit" id="submit-btn" value="{{ __('site.edit') }}"  style="width: 200px;">
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
                        url:"{{url(app()->getLocale()."/customers/login")}}",
                       // url :  "ar/customers/login1111111111111111111",
                        data:formData,
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        dataType:'json',
                        success: function (data)
                        {
                            if(data.status == "true")
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



