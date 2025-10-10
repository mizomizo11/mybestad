@extends('layouts.dashboard.master')


@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url(app()->getLocale().'/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1"><a href="{{url('/dashboard/shipments/draft')}}"> ادارة الشحنات</a>  </li>
                <li class="breadcrumb-item active text-grey-d1">اضافة الشحنة  </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection


@section('content')




    <form method="POST" action="" id="form1" enctype="multipart/form-data" style="direction: ltr;">
        @csrf
        <div class='row' style="margin-bottom: 10px;">
            <div class='col-md-6'>

                <div class='row' style="border-bottom: 1px solid #ffca08;margin: 10px;text-align: left;">
                    <div class='col-md-12'>
                        <b>Sender Info معلومات المرسل </b>  </span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">

                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Sender Account ID:</span>
                            <div class="input-group-prepend">
                                <span id="dd">.</span>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="">
                                    <label class="btn btn-light-danger btn-xs btn-bgc-white btn-a-green active "
                                           id="cash_radio_btn" style="border-radius: 0px;margin: 0px !important;padding-top: 7px">
                                        <input type="radio" name="options" autocomplete="off" checked>    <span style="font-size: 11px">مرسل كاش</span>
                                    </label>

                                    <label class="sender_account_number_btn btn  btn-light-danger btn-xs btn-bgc-white btn-a-green "
                                           id="account_radio_btn" style="border-radius: 0px;margin: 0px !important;padding-top: 7px">
                                        <input type="radio" name="options" autocomplete="off"><span style="font-size: 11px">  مرسل اجل</span>
                                    </label>
                                    <label class="btn  btn-light-danger btn-xs btn-bgc-white btn-a-green "
                                           id="cod_radio_btn" style="border-radius: 0px;margin: 0px !important;padding-top: 7px">
                                        <input type="radio" name="options" autocomplete="off"> <span style="font-size: 11px">مستقبل</span>
                                    </label>
                                </div>


                            </div>
                            <input type="text" name="sender_account_number" id="sender_account_number"
                                   class="form-control form-control-sm  col-md-3" required/>
                            <div class="input-group-append">
                                <button class="btn btn-sm sender_account_number_btn"  type="button"
                                        style="border-radius: 0px 5px 5px 0px ;background-color: #d5d5d5 ">
                                    <i class="fa fa-search"  style="font-size: 15px;color:#000;margin-top: 1px"></i></button>
                            </div>

                            <a class="btn btn-xs btn-lighter-warning mb-2px" style="margin-left: 2px;margin-top: 2px">
                                <i class=' account_number_open_modal_btn color_red' id="account_number_open_modal_btn"
                                   style='font-size:15px;font-weight: bold'>Accounts</i></a>

                            {{--//far fa-address-card--}}
                        </div>
                    </div>


                </div>




                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Name:</span>
                            <input name="sender_name" id="sender_name" class="form-control form-control-sm  col-md-8"
                                   placeholder='Company name or Name' required=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Contact Person:</span>
                            <input name="sender_contact_person" id="sender_contact_person"
                                   class="form-control form-control-sm  col-md-8" style="" required=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Address Line 1 </span>
                            <input name="sender_address_line_one" id="sender_address_line_one"
                                   class="form-control form-control-sm  col-md-8" style="" required=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Address Line 2:</span>
                            <input name="sender_address_line_two" id="sender_address_line_two"
                                   class="form-control form-control-sm  col-md-8" style=""/>
                        </div>
                    </div>
                </div>


                <div class='row'>
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Country:</span>
                            <select id="sender_country_id" name="sender_country_id"
                                    class="form-control form-control-sm col-md-3" style="border-radius:5px" required>
                                <option value=''>اختر الدولة</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country -> id}}">{{$country -> name}}</option>
                                @endforeach
                            </select>
                            <select name="sender_city_id" id="sender_city_id"
                                    class="form-control form-control-sm col-md-3 "
                                    style="padding: 0px !important;margin: 0px;" required>
                                <option value="">اختر الدولة اولا</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city -> id}}" style="display: none">{{$city -> name}}</option>
                                @endforeach

                            </select>
                            <select name="sender_area_id" id="sender_area_id"
                                    class="form-control form-control-sm col-md-3 "
                                    style="padding: 0px !important;margin: 0px;" >
                                <option value="">اختر المدينة اولا</option>
                                @foreach ($areas as $area)
                                    <option value="{{$area -> id}}" style="display: none">{{$area -> name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>


                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Mobile:</span>
                            <input type="text" name="sender_mobile" id="sender_mobile"
                                   class="form-control form-control-sm  col-md-6" style="" required=""/>

                            <div class="input-group-append">
                                <button class="btn btn-sm btn-secondary " id="sender_mobile_btn" type="button"
                                        style="border-radius: 0px 5px 5px 0px ;background-color: #d5d5d5 ">
                                    <i class="fa fa-search" style="font-size: 15px;color:#000"></i></button>
                            </div>
                            <div class="input-group-append">
                                <i class='far fa-address-book mobile_open_modal_btn'
                                   style='font-size:30px;margin-left: 10px'></i>
                            </div>

                        </div>

                    </div>

                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Phone:</span>
                            <input name="sender_phone" id="sender_phone" class="form-control form-control-sm  col-md-8"
                                   style=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Email:</span>
                            <input name="sender_email" id="sender_email" class="form-control form-control-sm  col-md-8"
                                   style=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>

                <div class='row' style="border-bottom: 1px solid #ffca08;margin: 10px">
                    <div class='col-md-12'>
                        <b style="float: left;">Receiver Info معلومات المستقبل </b>

                    </div>
                </div>


                <div class='row'>
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Receiver Account ID:</span>
                            <input type="text" name="receiver_account_number" id="receiver_account_number"
                                   class="form-control form-control-sm  col-md-6" />
                            <div class="input-group-append">


                                <button class="btn btn-sm " id="receiver_account_number_btn" type="button"
                                        style="border-radius: 0px 5px 5px 0px ;background-color: #d5d5d5 "><i
                                        class="fa fa-search" style="font-size: 15px;color:#000;margin-top: 1px"></i>
                                </button>


                                <a class="btn btn-xs btn-lighter-warning mb-2px"
                                   style="margin-left: 2px;margin-top: 2px"> <i
                                        class='account_number_open_modal_btn color_red'
                                        id="account_number_open_modal_btn" style='font-size:15px;font-weight: bold'>
                                        Accounts

                                        <i id="tooltip-1" class="fas fa-info-circle  text-info radius-round  "
                                           style="margin-top:0px;font-size:17px;" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="لا تدخل في الحسابات فقط للاكمال التلقائي"></i>


                                    </i></a>


                            </div>

                            <script>
                                $(document).ready(function () {
                                    $('#tooltip-1').tooltip({
                                        template: '<div class="tooltip" role="tooltip"><div class="brc-info arrow"></div><div class="bgc-info tooltip-inner"></div></div>'
                                    });
                                });
                            </script>
                        </div>
                    </div>


                </div>


                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Name:</span>
                            <input name="receiver_name" id="receiver_name"
                                   class="form-control form-control-sm  col-md-8" style=""
                                   placeholder='Company name or Name' required=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Contact Person:</span>
                            <input name="receiver_contact_person" id="receiver_contact_person"
                                   class="form-control form-control-sm  col-md-8" style="" required=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Address Line 1 </span>
                            <input name="receiver_address_line_one" id="receiver_address_line_one"
                                   class="form-control form-control-sm  col-md-8" style="" required=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Address Line 2:</span>
                            <input name="receiver_address_line_two" id="receiver_address_line_two"
                                   class="form-control form-control-sm  col-md-8" style=""/>
                        </div>
                    </div>
                </div>


                <div class='row'>
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Country:</span>


                            <select id="receiver_country_id" name="receiver_country_id"
                                    class="form-control form-control-sm col-md-3" style="border-radius:5px" required="">
                                <option value=''>اختر الدولة</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country -> id}}">{{$country -> name}}</option>
                                @endforeach

                            </select>

                            <select name="receiver_city_id" id="receiver_city_id"
                                    class="form-control form-control-sm col-md-3 "
                                    style="padding: 0px !important;margin: 0px;" required>
                                <option value="">اختر الدولة اولا</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city -> id}}" style="display: none">{{$city -> name}}</option>
                                @endforeach

                            </select>
                            <select name="receiver_area_id" id="receiver_area_id"
                                    class="form-control form-control-sm col-md-3 "
                                    style="padding: 0px !important;margin: 0px;" >
                                <option value="">اختر المدينة اولا</option>
                                @foreach ($areas as $area)
                                    <option value="{{$area -> id}}" style="display: none">{{$area -> name}}</option>
                                @endforeach

                            </select>



                        </div>
                    </div>
                </div>
{{--                <div class='row'>--}}
{{--                    <div class='col-md-10'>--}}
{{--                        <div class="form-group form-inline" style="margin: 3px;">--}}
{{--                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">City:</span>--}}


{{--                            <select name="receiver_city_id" id="receiver_city_id"--}}
{{--                                    class="form-control form-control-sm col-md-5 "--}}
{{--                                    style="padding: 0px !important;margin: 0px;" required="">--}}
{{--                                <option value="">اختر الدولة اولا</option>--}}
{{--                                @foreach ($cities as $city)--}}
{{--                                    <option value="{{$city -> id}}">{{$city -> name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <div id="receiver_loading" class="spinner-border text-warning " role="status"--}}
{{--                                 style="display: none">--}}
{{--                                <span class="sr-only">Loading...</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Mobile:</span>
                            <input type="number" name="receiver_mobile" id="receiver_mobile"
                                   class="form-control form-control-sm  col-md-6" style="" required=""/>


                            <div class="input-group-append">
                                <button class="btn btn-sm btn-secondary " id="receiver_mobile_btn"
                                        type="button"
                                        style="border-radius: 0px 5px 5px 0px ;background-color: #d5d5d5 ">
                                    <i class="fa fa-search" style="font-size: 15px;color:#000"></i></button>
                            </div>
                            <div class="input-group-append">
                                <i class='far fa-address-book mobile_open_modal_btn'
                                   style='font-size:30px;margin-left: 10px'></i>
                            </div>


                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Phone:</span>
                            <input name="receiver_phone" id="receiver_phone"
                                   class="form-control form-control-sm  col-md-8" style=""/>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Email:</span>
                            <input name="receiver_email" id="receiver_email"
                                   class="form-control form-control-sm  col-md-8" style=""/>
                        </div>
                    </div>
                </div>


            </div>


        </div>


        <div class='row' style="margin-top: 10px;">
            <div class='col-md-6'>


                <div class='row' style="border-bottom: 1px solid #ffca08;margin: 10px;text-align: left;">
                    <div class='col-md-12'>
                        <b>Shipment Details تفاصيل الشحنة </b>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-md-7'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">تاريخ الشحن :</span>
                            <input type="date" name="created_at" value="<?php echo date("Y-m-d") ?>"
                                   class="form-control form-control-sm  col-md-6" style=""/>
                        </div>
                    </div>
                    <div class='col-md-1'>
                        <div class="form-group form-inline" style="margin: 3px;">


                        </div>
                    </div>
                    <div class='col-md-5'>

                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">نوع الخدمة :</span>
                            <select name="service" class="form-control form-control-sm col-md-5 "
                                    style="padding: 0px !important;margin: 0px;">
                                <option value="vip">VIP</option>
                                <option value="priority1">priority 1</option>
                                <option value="priority2">priority 2</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">الشركة :</span>
                            <select id="company_id" name="company_id" class="form-control form-control-sm col-md-3"
                                    style="border-radius:5px;height: 30px;">
                                @foreach ($companies as $company)
                                    <option value="{{$company -> id}}">{{$company -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">المرجع :</span>
                            <input name="reference" id="reference" class="form-control form-control-sm  col-md-6"
                                   style=""/>

                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">ملاحظات :</span>
                            <input name="company_note" id="company_note" class="form-control form-control-sm  col-md-6"
                                   style=""/>

                        </div>
                    </div>
                </div>




            </div>


            <div class='col-md-6'>


                <div class='row' style="border-bottom: 1px solid #ffca08;margin: 10px;text-align: left;">
                    <div class='col-md-12'>
                        <b>Billing Info معلومات الدفع </b>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">الحساب لصالح:</span>
                            <select class="form-control form-control-sm col-md-7 " name="bill_to" id="bill_to"
                                    style="padding: 0px !important;margin: 0px;">
                                <option value="cash_sender">المرسل - كاش</option>
                                <option value="postpaid_sender">المرسل - اجل</option>
                                <option value="receiver_driver">المستقبل-الدفع عند الاستلام</option>
                            </select>
                        </div>
                    </div>

                    <div class='col-md-5'>

                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">COD </span>

                            <input type="number" step="any" id="cod" name="cod" class="form-control form-control-sm  col-md-2"
                                   style=""/>
                            <select id="cod_currency" name="cod_currency" class="form-control form-control-sm "
                                    style="border-radius:5px" required>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                                @endforeach
                            </select>
                            <input type="text" id="cod_ratio" name="cod_ratio" value="0.04"
                                   class="form-control form-control-sm  col-md-1" style="" readonly=""/>
                            <input type="number" step="any" id="cod_final" name="cod_final" value=""
                                   class="form-control form-control-sm  col-md-2" style="" readonly=""/>


                            <script type="text/javascript">

                            </script>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">رسوم اضافية </span>
                            <input type="number" step="any" id="other_fees" name="other_fees"
                                   class="form-control form-control-sm  col-md-2" style=""/>
                            <select id="other_fees_currency" name="other_fees_currency" class="form-control form-control-sm "
                                    style="border-radius:5px" required>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">التامين </span>
                            <input type="number" step="any" id="insurance" name="insurance"
                                   class="form-control form-control-sm  col-md-2" style=""/>
                            <select id="insurance_currency" name="insurance_currency" class="form-control form-control-sm "
                                    style="border-radius:5px" required>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                                @endforeach
                            </select>
                            <span style="text-align: right !important;padding-right: 5px;"></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">اجور الجمارك </span>
                            <input type="number" step="any" id="customs_charges" name="customs_charges" readonly
                                   class="form-control form-control-sm  col-md-2" style=""/>
                            <select id="customs_charges_currency" name="customs_charges_currency" class="form-control form-control-sm "
                                    style="border-radius:5px" required>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                                @endforeach
                            </select>
                            <span style="text-align: right !important;padding-right: 5px;"></span>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-md-10'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">Total  </span>
                            <input type="number" step="any" id="total" name="total" readonly
                                   class="form-control form-control-sm  col-md-2" style=""/>
                            <select id="total_currency" name="total_currency" class="form-control form-control-sm "
                                    style="border-radius:5px" required>

                                @foreach ($currencies as $currency)
                                    <option value="{{$currency -> id}}">{{$currency -> name}}</option>
                                @endforeach
                            </select>
                            <span style="text-align: right !important;padding-right: 5px;"></span>
                        </div>
                    </div>
                </div>












            </div>

        </div>


        <div class="row col-md-11" style="margin: auto;margin-top:5px;direction: ltr;text-align: left;background-color: #00000011;border-radius: 5px;padding: 5px">
            <div class="col-md-2">
                <label >الوزن الفعلي   * </label>
                <div class="input-group">

                    <input type="number" step="any" id="actual_weight" name="actual_weight"
                           class="form-control form-control-sm  col-md-8" style="" required="" />
                    <div style="padding-top: 5px">
                        <span >KG</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    <label>الوزن الحجمي    *</label>
                    <input type="number" step="any" id="volume_weight" name="volume_weight" value="0" readonly
                           class="form-control form-control-sm  col-md-10" style="" required=""/>
                </div>
            </div>

            <div class="col-md-2">
                <div>
                    <label>الوزن النهائي    *</label>
                    <input type="text" id="final_weight" name="final_weight" value=""
                           class="form-control form-control-sm col-md-10 "
                           style="border: 1px solid green;height: 25px;" readonly=""/>
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    <label>الباقة : </label>
                    <select id="prices_packages_id" name="prices_packages_id"
                            class="form-control form-control-sm " style="border-radius:5px" required>
                        @foreach ($prices_packages as $prices_package)
                            <option value="{{$prices_package -> id}}">{{$prices_package -> name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div>
                    <label> تكلفة الشحنة :
                    </label>

                    <input type="checkbox" name="final_price_on_waybill" id="final_price_on_waybill"   class=" ace-switch input-md ace-switch-bars bgc-success">
                    <i id="tooltip-2" class="fas fa-info-circle  text-info radius-round  " style="margin-top:0px;font-size:17px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="اظهار تكلفة الشحنة على البوليصة"></i>
                    <script>
                        $(document).ready(function () {
                            $('#tooltip-2').tooltip({
                                template: '<div class="tooltip" role="tooltip"><div class="brc-info arrow"></div><div class="bgc-info tooltip-inner"></div></div>'
                            });
                        });
                    </script>

                    <input type="text" id="final_price" name="final_price" value=""
                           class="form-control form-control-sm  " required=""
                           />
{{--                            style="background-color: #f5f5f5;" onkeydown="event.preventDefault()"/>--}}
                </div>
            </div>

            <div class="col-md-2">
                <div>
                    <label>العملة  : </label>
                    <select id="currency" name="currency" class="form-control form-control-sm "
                            style="border-radius:5px" required>
                        @foreach ($currencies as $currency)
                            <option value="{{$currency -> code}}">{{$currency -> name}}</option>
                        @endforeach
                    </select>
{{--                    <select class="form-control form-control-sm col-md-10 " name="currency"--}}
{{--                            style="padding: 0px !important;margin: 0px;">--}}
{{--                        <option value="KD"> Kuwaiti dinar</option>--}}
{{--                    </select>--}}
                </div>
            </div>
        </div>





        <div class='row' style="border-top: 2px solid #ffca08;margin-top: 25px;padding-top:5px ;">
            <div class='col-md-6'>
                        <div class='row' style="">
                            <div class='col-md-10'>
                                <div class="form-group form-inline" style="margin: 3px;">
                                    <span style="width: 150px;text-align: right !important;padding-right: 5px;"></span>
                                    <div class="custom-control custom-radio" style="padding-right: 25px;">
                                        <input class="custom-control-input" type="radio" id="bag_btn" value="bag"
                                               name="box_or_bag" <?php if (empty(session('boxes_cart'))) echo "checked";?>>
                                        <label for="bag_btn" class="custom-control-label">كيس</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input box_btn" type="radio" id="box_radio_btn" value="box"
                                               name="box_or_bag" <?php if (session('boxes_cart')) echo "checked";?>>
                                        <label for="box_radio_btn" class="custom-control-label">صندوق</label>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row bag_area' style="<?php if (session('boxes_cart')) echo "display:none";?>">
                            <div class='col-md-10'>
                                <div class="form-group form-inline" style="margin: 3px;">
                                            <span
                                                style="width: 150px;text-align: right !important;padding-right: 5px;">حجم الكيس  </span>
                                    <select id="bag_id" name="bag_id" class="form-control form-control-sm col-md-5"
                                            style="border-radius:5px" required>
                                        @foreach ($bags as $bag)
                                            <option value="{{$bag -> id}}">{{$bag -> name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='row box_area' style="<?php if (!session('boxes_cart')) echo "display:none";?> ">
            <div class='col-md-10'>
                <div class="form-group form-inline" style="margin: 3px;">
                            <span
                                style="width: 150px;text-align: right !important;padding-right: 5px;">عدد الصناديق </span>
                    <input type="text" readonly name="boxes_count"
                           value="<?php if (session('boxes_cart')) echo count(session('boxes_cart'));?>"
                           class="form-control form-control-sm  col-md-2 boxes_count" style=""/>
                </div>
            </div>
        </div>
            </div>
            <div class='col-md-6'>
                <div class='row' style="">
                    <div class='col-md-12'>
                        <div class="form-group form-inline" style="margin: 3px;">
                            <span style="width: 150px;text-align: right !important;padding-right: 5px;">Shipment Contains</span>
                            <div class="custom-control custom-radio" style="padding-right: 25px;">
                                <label for="documents_btn">
                                    <input type="radio" class="input-lg bgc-blue documents_btn" id="documents_btn"
                                           value="documents"
                                           name="shipment_contains" <?php if (!session('tradebill_cart')) echo "checked";?> >
                                    &nbsp Documents Only
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <label for="commoditeis_btn">
                                    <input type="radio" class="input-lg bgc-blue commoditeis_btn" id="commoditeis_btn"
                                           value="commodities"
                                           name="shipment_contains" <?php if (session('tradebill_cart')) echo "checked";?> >
                                    &nbsp Commoditeis :
                                    <input type="text"  name="content_description" id="content_description" readonly
                                           value="<?php if (session('content_description')) echo session('content_description');?>"
                                           class="form-control form-control-sm  col-md-7 " style=""/>

                                </label>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
















        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button class="btn btn-md btn-warning save_and_back_btn" style="width: 200px;">حفظ ورجوع</button>
                <button class="btn btn-md btn-warning save_and_print_btn" style="width: 200px;">حفظ وطباعة</button>
                <button class="btn btn-md btn-warning save_as_draft_btn" style="width: 200px;">حفظ كمسودة
                </button>
                <button class="btn btn-md btn-warning " onclick="javascript:document.getElementById('form1').reset();"
                        style="width: 200px;">حذف المعلومات
                </button>
            </div>
        </div>


    </form>

    <style type="text/css">
        .jsPanel-hdr-toolbar {
            background-color: #f1f1f1;
        }
    </style>


    <div class='row' style="margin-top: 150px;">
        <div class='col-sm-12' style="text-align: center;margin: 0px;">
            Arabex
        </div>
    </div>













    <style>


        .input-disabled, .readonly {
            background-color: #edeaea !important;
            border: 1px solid #ed6e7677;
            color: #df424c !important;
            /*padding-left: 10px;*/
            /*font-size: 13px;*/
            font-weight: bold;
            /*font-style: italic;*/
            border-radius: 3px;


        }
    </style>



    <style>.jsPanel {
            z-index: 100000 !important;
        }</style>




    <script type="text/javascript">
        $(document).ready(function () {



            $(".save_and_back_btn").click(function (e) {
                if (document.getElementById("form1").checkValidity()) {
                    e.preventDefault();
                    ff_total_weight = $("#total_weighteee").val();
                    ff_actual_weight = $("#actual_weight").val();
                    if (ff_actual_weight < ff_total_weight) {
                        Lobibox.notify('error', {
                            continueDelayOnInactiveTab: true,
                            position: 'bottom left',
                            size: 'mini',
                            msg: '<h5 style="font-family: font2">يجب ان يكون الوزن الفعلي اكبر من الوزن الاجمالي  </h5>'
                        });
                    } else {
                      //  var formData = new FormData($("#form1")[0]);

                        var final_price_on_waybill = $("#final_price_on_waybill").prop('checked');
                        var formData = new FormData($("#form1")[0]);
                        formData.append('final_price_on_waybill', final_price_on_waybill);
                        $.ajax(
                            {

                                beforeSend: function() {
                                    Swal.showLoading();
                                },
                                type: "post", // replaced from put
                                url: "{{route('shipment_store') }}",
                                data: formData,
                                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                                processData: false, // NEEDED, DON'T OMIT THIS
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status == "true") {
                                        Swal.close();
                                        Lobibox.notify('success', {
                                            continueDelayOnInactiveTab: true,
                                            position: 'bottom left',
                                            size: 'mini',
                                            msg: '<h5 style="font-family: font2">تمت  العملية  بنجاح </h5>'
                                        });
                                        // var trade_bill = $.parseJSON($.cookie("trade_bill"));
                                        // trade_bill.splice(0,trade_bill.length);
                                        // $.cookie("trade_bill", JSON.stringify(trade_bill));

                                        setTimeout(function () {
                                            document.getElementById("form1").reset();
                                            //resetForm();
                                            // location.reload();
                                        }, 500);


                                    } else {
                                        alert("not return success")
                                    }
                                },
                                error: function (xhr) {
                                    alert(xhr)
                                    // do something here because of error
                                }
                            });

                    }

                } else {
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: true,
                        position: 'bottom left',
                        size: 'mini',
                        msg: '<h5 style="font-family: font2">الرجاء تعبئة الحقول المطلوبة </h5>'
                    });
                }


            });
            $(".save_and_print_btn").click(function (e) {
                if (document.getElementById("form1").checkValidity()) {
                    e.preventDefault();
                    ff_total_weight = $("#total_weighteee").val();
                    ff_actual_weight = $("#actual_weight").val();
                    if (ff_actual_weight < ff_total_weight) {
                        Lobibox.notify('error', {
                            continueDelayOnInactiveTab: true,
                            position: 'bottom left',
                            size: 'mini',
                            msg: '<h5 style="font-family: font2">يجب ان يكون الوزن الفعلي اكبر من الوزن الاجمالي  </h5>'
                        });
                    } else {


                        var final_price_on_waybill = $("#final_price_on_waybill").prop('checked');
                        var formData = new FormData($("#form1")[0]);
                        formData.append('final_price_on_waybill', final_price_on_waybill);
                        $.ajax(
                            {
                                beforeSend: function() {
                                    Swal.showLoading();
                                },
                                type: "post", // replaced from put
                                //url :  "ajax/shipment_insert.php",
                                url: "{{route('shipment_store') }}",
                                data: formData,
                                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                                processData: false, // NEEDED, DON'T OMIT THIS
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status == "true") {


                                        $('#example').DataTable().ajax.reload();
                                        //  $('.shipments_accpeted_count').text( $('#example').DataTable().data().count() - 1 );
                                        var countt2 = parseInt($(".shipments_not_accpeted_count ").text());
                                        $('.shipments_not_accpeted_count ').text( countt2 + 1 );


                                        Swal.close();
                                        Lobibox.notify('success', {
                                            continueDelayOnInactiveTab: true,
                                            position: 'bottom left',
                                            size: 'mini',
                                            msg: '<h5 style="font-family: font2">تمت  العملية  بنجاح </h5>'
                                        });


                                        var idd = data.last_id;
                                      //  alert(data.boxes_countt);
                                        var panel = jsPanel.modal.create({
                                            show: 'fadeIn',
                                            container: "body",
                                            // container: '.page-content'
                                            theme: 'info',
                                            borderRadius: '5px',
                                            headerLogo: '<i class="fad fa-home-heart ml-2"></i>',

                                            headerTitle: '<span style="margin: 0px;font-family:font2">بوليصة الشحن - الفاتورة التجارية - ايصال التسليم</span>',
                                            headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printall()" style="margin: 0px;font-family:font2;margin:auto">طباعة الكل  </button>'+
                                              '+<button id="saveallPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto"> حفظ كملف PDF</button>  ',
                                            headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",

                                            footerToolbar: '<span style="padding: 3px;font-family:font2;text-align: center">بوليصة الشحن - الفاتورة التجارية - ايصال التسليم</span>',
                                            panelSize: {
                                                width: () => {
                                                    return Math.min(1200, window.innerWidth * 0.9);
                                                },
                                                height: () => {
                                                    return Math.min(800, window.innerHeight * 0.9);
                                                }

                                                //  width:  window.innerWidth * 0.6,
                                                //  height: window.innerHeight * 0.8
                                            },


                                            position: 'center 0 -50',

                                            //animateIn: 'jsPanelFadeIn',

                                            contentAjax: {
                                                method: 'GET',
                                                url :  "/dashboard/shipments/show_waybill_tradebill_receipt/"+idd,
                                               // show_waybill_tradebill_receipt/{id}
                                               {{--// url: "{{route('show_waybill_tradebill_receipt')}}",--}}
                                                data: "id=" + idd, // note that data type is set with setRequestHeader()
                                                beforeSend: function () {
                                                    this.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                                },
                                                done: (xhr, panel) => {
                                                    // panel.content.innerHTML = xhr.responseText;
                                                    panel.contentRemove();
                                                    panel.content.append(jsPanel.strToHtml(xhr.responseText));
                                                    $('.fa-spinner').hide();


                                                    //Prism.highlightAll();
                                                }
                                            },

                                            //onwindowresize: true,

                                        }).headertoolbar.style.border = '1px solid #fff';


                                        //});


                                        // setTimeout(function () {
                                        //     document.getElementById("form1").reset();
                                        //       }, 500);


                                    }
                                },
                                error: function (xhr) {
                                    alert(xhr)
                                    // do something here because of error
                                }
                            });


                    }

                } else {
                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: true,
                        position: 'bottom left',
                        size: 'mini',
                        msg: '<h5 style="font-family: font2">الرجاء تعبئة الحقول المطلوبة </h5>'
                    });
                }


            });
            $(".save_as_draft_btn").click(function (e) {

                var box_or_bag = $("input[name='box_or_bag']:checked").val();
                var boxes_count = $(".boxes_count").val()
                if ((box_or_bag == 'box') && (boxes_count == '0')) {
                    Swal.fire(
                        'لا يمكن ان تختار صندوق ويكون عدد الصناديق صفر !',
                        '',
                        'success'
                    )
                    return false;
                }


                ff_total_weight = $("#total_weighteee").val();
                ff_actual_weight = $("#actual_weight").val();
                if (ff_actual_weight < ff_total_weight) {
                    Swal.fire(
                        'يجب ان يكون الوزن الفعلي اكبر من الوزن الاجمالي  !',
                        '',
                        'success'
                    )
                    return false;
                    // Lobibox.notify('error', {
                    //     continueDelayOnInactiveTab: true,
                    //     position: 'bottom left',
                    //     size: 'mini',
                    //     msg: '<h5 style="font-family: font2">يجب ان يكون الوزن الفعلي اكبر من الوزن الاجمالي  </h5>'
                    // });
                }


                if (document.getElementById("form1").checkValidity()) {
                    e.preventDefault();
                    //{
                    var final_price_on_waybill = $("#final_price_on_waybill").prop('checked');
                    var formData = new FormData($("#form1")[0]);
                    formData.append('state', 'draft');


                  //  var formData = new FormData($("#form1")[0]);
                    formData.append('final_price_on_waybill', final_price_on_waybill);



                    $.ajax(
                        {
                            beforeSend: function() {
                                Swal.showLoading();
                            },
                            type: "post",
                            url: "{{route('shipment_store') }}",
                            //url :  "ajax/shipment_insert.php?draft=yes",
                            data: formData,
                            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                            processData: false, // NEEDED, DON'T OMIT THIS
                            dataType: 'json',
                            success: function (data) {
                                if (data.status == "true") {


                                    Swal.close();
                                    Lobibox.notify('success', {
                                        continueDelayOnInactiveTab: true,
                                        position: 'bottom left',
                                        size: 'mini',
                                        msg: '<h5 style="font-family: font2">تم حفظ المسودة بنجاح</h5>'
                                    });



                                   // $('#example').DataTable().ajax.reload();
                                   // $('.shipments_draft_count').text( $('#example').DataTable().data().count() + 1  );

                                    $('#example').DataTable().ajax.reload();
                                  //  $('.shipments_accpeted_count').text( $('#example').DataTable().data().count() - 1 );
                                    var countt = parseInt($(".shipments_draft_count").text());
                                    $('.shipments_draft_count').text( countt + 1 );

                                    // setTimeout(function () {
                                    //    // document.getElementById("form1").reset();
                                    //    // location.reload();
                                    // }, 4000);
                                }
                            },
                            error: function (xhr) {
                                alert(xhr)
                                // do something here because of error
                            }
                        });
                    //}

                } else {

                    Swal.fire(
                        'الرجاء تعبئة الحقول المطلوبة!',
                        '',
                        'danger'
                    )


                    // const swalWithBootstrapButtons = Swal.mixin({
                    //     customClass: {
                    //         confirmButton: 'btn btn-danger',
                    //         cancelButton: 'btn btn-danger'
                    //     },
                    //     buttonsStyling: false
                    // })
                    // swalWithBootstrapButtons.fire({
                    //     icon: 'error',
                    //     title: 'خطأ!',
                    //     text: 'الرجاء تعبئة الحقول المطلوبة',
                    // })


                    Lobibox.notify('error', {
                        continueDelayOnInactiveTab: true,
                        position: 'bottom left',
                        size: 'mini',
                        msg: '<h5 style="font-family: font2">الرجاء تعبئة الحقول المطلوبة </h5>'
                    });
                }


            });
        });
    </script>









<script>
    $(document).ready(function(){
        $(".nav-link").click(function(){
            dd=$(this)[0].href;
            $("#continue_btn").attr("href", dd);
        });
    });
</script>
<div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-width-0 border-t-4 brc-warning-m2 px-3">

            <div class="modal-header py-2">
                <i class="bgc-white fas fa-exclamation-circle mb-n4 mx-auto fa-3x text-orange-m2"></i>
            </div>

            <div class="modal-body text-center">
                <p class="text-warning-d1 text-130 mt-3">
                    لم يتم حفظ البيانات
                </p>
                <p class="text-secondary-m2 text-105">
                    قبل الخروج
                </p>
            </div>

            <div class="modal-footer bg-white  " style="text-align: center;margin: auto;">
                <a href="admin.php" id="continue_btn"
                   class=" btn btn-md btn-light-secondary btn-h-light-warning btn-a-light-danger">
                    <i class="fas fa-home mr-1 text-danger-m2"></i>
                    استمرار
                </a>
                <a type="button"
                   class="save_as_draft_btn btn btn-md  btn-light-secondary btn-h-light-success btn-a-light-success"
                   data-dismiss="modal">
                    حفظ كمسودة
                    <i class="fa fa-arrow-right ml-1 text-success-m2"></i>
                </a>
                <button type="button" class="btn btn-md  btn-light-secondary btn-h-light-warning btn-a-light-danger"
                        data-dismiss="modal">
                    <i class="fas fa-undo-alt mr-1 text-danger-m2"></i>
                    الغاء
                </button>


            </div>

        </div>
    </div>
</div>



@stop



