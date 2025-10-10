@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}"> الصفحة الرئيسية </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1"><a
                        href="{{url(app()->getLocale().'/admins/patients') }}">ادارة المشتركين المرضى</a></li>
                <li class="breadcrumb-item  text-grey-d1">تحديث</li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')
    <form id="form1" method="POST" action="{{url(app()->getLocale()."/admins/patients/update")}}"
          enctype="multipart/form-data" style="">
        @csrf
        <input type="hidden" name="id" value="{{$patient -> id}}"/>
        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <h2 class=""
                    style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;"> {{ __('site.edit_account_informations') }}</h2>

                <div class='row' style="padding-top: 20px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;">* {{ __('site.name') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" value="{{$patient->name}}" id="name"
                               class="form-control form-control-sm" required=""/>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;">* {{ __('site.mobile') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="mobile" value="{{$patient->mobile}}"
                               style="direction: ltr;text-align: left" class="form-control form-control-sm"
                               required=""/>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;">* {{ __('site.email') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="email" value="{{$patient->email}}"
                               style="direction: ltr;text-align: left" class="form-control form-control-sm"
                               required=""/>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;">*{{ __('site.password') }}</label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="password" value="{{$patient->password}}"
                               style="direction: ltr;text-align: left" class="form-control form-control-sm"
                               required=""/>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;">* {{ __('site.password_confirmation') }}</label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="password2" value="{{$patient->password}}"
                               style="direction: ltr;text-align: left" class="form-control form-control-sm"
                               required=""/>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;">* Country </label>
                    </div>
                    <div class='col-md-6'>
                        <select id="" name="country_id" class="form-control form-control-sm" style="border-radius:5px">
                            @foreach ($countries as $country)
                                <option value="{{$country -> id}}"
                                        @if ($country -> id == $patient -> country_id) selected @endif>{{$country -> {'name_'.app()->getLocale()} }}</option>
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
                                <option value="{{$timezone -> id}}"
                                        @if ($timezone -> id == $patient -> timezone_id) selected @endif>{{$timezone -> name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"> صورة </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input class="form-control form-control-sm" type="file" name="imagefile"/>
                    </div>
                    <div class='col-md-2'>
                        <div>
                            <div><img class="zoom_it" src="{{url(Config::get('app.upload'))}}/{{  $patient -> image }}"
                                      style="width:40px;height:30px">
                                <a class="btn btn-xs btn-danger delete_image_btn" data-id="{{  $patient -> id }}"
                                   data-name="image"
                                   data-url="{{url(app()->getLocale()."/admins/patients/delete-image")}}"
                                   style="width: 30px;">
                                    <i class="fa fa-trash-alt text-110 text-white mr-1"></i>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  >دفع مجاني  </label>
                    </div>
                    <div class='col-md-6'>
                        <select id="" name="free_payment" class="form-control form-control-sm " style="border-radius:5px" >
                            <option value="no"  @if ( $patient -> free_payment=="no")   selected @endif>NO</option>
                            <option value="yes" @if ( $patient -> free_payment=="yes")   selected @endif>Yes</option>

                        </select>

                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;">مقفل </label>
                    </div>
                    <div class='col-md-6'>
                        <select id="" name="locked" class="form-control form-control-sm " style="border-radius:5px">
                            <option value="yes" @if ( $patient -> locked=="yes")   selected @endif>Yes</option>
                            <option value="no" @if ( $patient -> locked=="no")   selected @endif>NO</option>
                        </select>

                    </div>
                </div>


            </div>
        </div>
        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button class="btn btn-lg btn-info " name="Submit" type="Submit"
                        style="width: 200px;font-family: font2;;">تحديث
                </button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete_image_btn', function (e) {
                e.preventDefault();


                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "هل انت متاكد؟",
                    text: "لن تستطيع التراجع عن هذه الخطوة ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        var data_id = $(this).attr("data-id");
                        var data_name = $(this).attr("data-name");
                        var url = $(this).attr("data-url");
                        //  var final_url=data_url+"/"+data_id
                        $.ajax({
                            beforeSend: function () {
                                Swal.showLoading();
                            },
                            url: url,
                            method: "POST",
                            data: {"_token": "{{ csrf_token() }}", id: data_id, col_name: data_name,},
                            success: function (data) {
                                if (data.status === "true") {
                                    swal.close();
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success",
                                        timer: 2000,
                                        timerProgressBar: true,
                                    });
                                    // Lobibox.notify('success', {
                                    //     continueDelayOnInactiveTab: true,
                                    //     position: 'bottom left',
                                    //     size: 'mini',
                                    //     delay: 2000,
                                    //     msg: '<h5 >تم الحذف بنجاح..!</h5>'
                                    // });
                                } else {
                                    // alert("error")
                                }

                                //$('#example').DataTable().ajax.reload();

                                setTimeout(function () {
                                    location.reload();
                                }, 3000);
                            }
                        })


                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "تم الالغاء",
                            text: "..",
                            icon: "error"
                        });
                    }
                });


            });
        });
    </script>
@stop
