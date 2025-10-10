@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')

    <div class="container" style=";padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        <div class="row">
            <div class="col-md-3">
                <h3 class="color_red" style="text-align: center;border-bottom:1px solid #df424c;padding:10px;"> {{ __('site.login') }}</h3>
                <form id="login_form"    >
                    @csrf
                    <div class='row' >
                        <div class='col-md-12'>
                            <div>
                                <label>* {{ __('site.email') }}</label>
                            </div>
                            <div>
                                <input type="text" name="email"  class="form-control form-control-sm"  style="direction: ltr;text-align: left" required=""  />
                            </div>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 10px;">
                        <div class='col-md-12'>
                            <div >
                                <label>* {{ __('site.password') }}</label>
                                <input type="text" name="password" class="form-control form-control-sm" style="direction: ltr;text-align: left"  required=""  />
                            </div>
                        </div>
                    </div>
                    <div id="notice">  </div>
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <button  class="btn btn-md  bgcolor_red color_yellow"  name="login_btn" id="login_btn"   style="width: 200px">{{ __('site.login') }}</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-md-1" style="border-left:1px solid red">
            </div>
            <div class="col-md-1" >
            </div>


            <div class="col-md-6" style="">
                <h2 class="color_red" style="text-align: center;color: #ce8728;border-bottom:1px solid #df424c;padding:10px;"> {{ __('site.register') }}</h2>
                <form id="register_form"     enctype="multipart/form-data" >
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
                            <label style="font-weight: bold;" >* phone </label>
                        </div>
                        <div class='col-md-6'>
                            <input type="text" name="phone" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
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
                            <select id="country_idd" name="countries_id" class="form-control form-control-sm " style="border-radius:5px" required="" >

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
                            <input type="submit"  class="btn btn-md bgcolor_red color_yellow"  name="Submit" id="submit-btn" value="{{ __('site.register') }}"  style="width: 200px;">
                        </div>
                    </div>

                </form>


            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        $(document).ready(function () {

            $("#register_form").submit(function(e){
                e.preventDefault()

                 //alert("ans");
                var formData = new FormData($("#register_form")[0]);

                formData.append('_token', '{{ csrf_token() }}');
                $.ajax(
                    {
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        type: "post", // replaced from put
                        url:"{{url(app()->getLocale()."/customers/register")}}",
                        //url :  "ajax/register.php",
                        data:formData,
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        dataType:'json',
                        success: function (data)
                        {
                            if(data.status == "true" )
                            {
                                Lobibox.notify('success', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom left',
                                    size: 'mini',
                                    msg: '<h5>تم التسجيل بنجاح </h5>'
                                });

                                setTimeout(function (){
                                   window.location.href = '/{{App::getLocale()}}/';
                                },2000);



                            }else{
                                Lobibox.notify('warning', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom right',
                                    size: 'mini',
                                    msg: '<h5>فشل</h5>'
                                });


                            }


                            Swal.close();
                        },
                        error: function(xhr) {
                            // alert(xhr)
                            // do something here because of error
                        }
                    });






            });







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



