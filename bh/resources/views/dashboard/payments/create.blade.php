@extends('layouts.dashboard.master')

@section('breadcrumb')

    <div class="content-nav mb-1 bgc-grey-l4" style="direction: rtl;text-align: right">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2" >
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url("/dashboard/index")}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1"><a href="{{url('/dashboard/payments')}}">  ادارة الدفعات  </a>  </li>

                <li class="breadcrumb-item active text-grey-d1">اضافة دفعة </li>


            </ol>

            <a href="{{ url()->previous() }}" type="button" class="btn  btn-sm" style="font-family: font2;background-color: #57b5da;color:#fff">للخلف   </a>

        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')
    <form   id="form1"  enctype="multipart/form-data"  style="">
         @csrf
        <div class='container' style="margin-bottom: 10px;">
                <div class='row' style="border-bottom: 1px solid #03a9f4;margin-bottom: 10px">
                    <div class='col-md-12'>
                        <h3>حساب عميل او سائق   </h3>
                    </div>
                </div>
                <div class='row' >
                    <div class='col-md-4'>
                        <div>
                            <label>رقم الحساب:</label>
                            <select id="account_id" name="account_id" class="form-control form-control-sm "
                                    style="border-radius:5px" >
                                <option value=""> اختر حساب</option>
                                @foreach ($accounts as $account)
                                    <option value="{{$account -> id}}">{{$account -> account_number}}- {{$account -> owner_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='col-md-1' style="background-color: #eaeced;text-align:center ">
                            <label style="margin-top: 15px">او :</label>
                    </div>
                    <div class='col-md-4'>
                        <div>
                            <label>اسم السائق </label>
                            <select id="driver_id" name="driver_id" class="form-control form-control-sm "
                                    style="border-radius:5px" >
                                <option value="">اختر سائق</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{$driver -> id}}">{{$driver -> name}}- {{$driver -> mobile}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row' style="margin-top: 50px;">
                    <div class='col-md-5'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">قيمة الدفعة :</span>
                            <input name="payment_value"  style="text-align: left;direction: ltr;"  class="form-control form-control-sm  col-md-6" required="" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">طريقة الدفع:</span>
                            <select  name="payment_method" class="form-control form-control-sm col-md-2" style="border-radius:5px" required="">
                                <option value="cash" selected="">كاش </option>
                                <option value="bank">بنك او حوالة </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">صورة</span>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            <input class="form-control form-control-sm" type="file" name="image_file" >
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">تاريخ الاضافة  </span>
                            <input type="date" name="payment_date" value="<?php echo date('Y-m-d');?>"  class="form-control form-control-sm"     />

                        </div>
                    </div>
                </div>


            <div class="row" style="margin-top: 15px">
                <div class="col-md-12">
                    <div class="form-group form-inline" style="margin: 3px;">
                        <span style="width: 150px;text-align: right !important;padding-right: 5px;"> اعتماد الدفعة:</span>
                        <select  name="accepted" class="form-control form-control-sm col-md-2" style="border-radius:5px" required="">

                            <option value="no" selected> لا  </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class='row' >
                <div class='col-md-5'>
                    <div class="form-group form-inline" style="margin: 3px;">
                        <span style="width: 150px;text-align: right !important;padding-right: 5px;"> المرجع :</span>
                        <input name="reference"  style="text-align: left;direction: ltr;"  class="form-control form-control-sm  col-md-6"  />
                    </div>
                </div>
            </div>



                 <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-md btn-warning save_btn"  name="Submit"  type="Submit" style="width: 200px;">اضافة دفعة   </button>
            </div>
        </div>



        </div>
    </form>


    <script type="text/javascript">
        $(document).ready(function () {



            $("#account_id").change(function () {

                $("#driver_id").val("");
            });
            $("#driver_id").change(function () {

                $("#account_id").val("");
            });



            $(".save_btn").click(function(e)  {
                e.preventDefault();

                if( ( $("#account_id").val() =="" ) &&  ( $("#driver_id").val() =="" ))
                {
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: true,
                        position: 'bottom left',
                        size: 'mini',
                        msg: '<h5 style="font-family: font2">الرجاء اختيار حساب او سائق    </h5>'
                    });


                }else{


                    if (document.getElementById("form1").checkValidity())
                    {



                        var formData = new FormData($("#form1")[0]);
                        $.ajax(
                            {
                                type: "post", // replaced from put
                                url :  '{{url("/dashboard/payments/store")}}',
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
                                            msg: '<h5 style="font-family: font2">تمت  العملية  بنجاح </h5>'
                                        });
                                        {{ url()->previous()}}
                                        setTimeout(function () {
                                            //resetForm();
                                            location.href="{{ url()->previous()}}";
                                            //  location.reload();
                                        },2000);
                                    }else{
                                        if(data.status == "true" )
                                        {

                                            Lobibox.notify('Error', {
                                                continueDelayOnInactiveTab: true,
                                                position: 'bottom left',
                                                size: 'mini',
                                                msg: '<h5 style="font-family: font2">تمت  العملية  بنجاح </h5>'
                                            });

                                            setTimeout(function () {
                                                //resetForm();
                                                location.href="{{ url()->previous()}}";
                                                //  location.reload();
                                            },2000);
                                        }
                                    }
                                },
                                // error: function(xhr) {
                                //     console.log(xhr)
                                //     // do something here because of error
                                // }
                            });

                        //  }
                        return 0;


                    }  else
                    {
                        Lobibox.notify('error', {
                            continueDelayOnInactiveTab: true,
                            position: 'bottom left',
                            size: 'mini',
                            msg: '<h5 style="font-family: font2">الرجاء تعبئة الحقول المطلوبة </h5>'
                        });
                    }






                }






            });










        });
    </script>

@endsection
