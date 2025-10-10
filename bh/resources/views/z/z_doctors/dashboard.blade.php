
{{--<h1>Dashboard Admin</h1>--}}
{{--<a href="{{url(app()->getLocale()."/admins/logout/")}}">logout</a>--}}
{{--<div>{{ Auth::guard('admin')->user()->name_ar }}--{{ Auth::guard('admin')->user()->email }}</div>--}}


@extends('layouts.doctor.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url(app()->getLocale().'/doctors/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection


@section('content')

    <style>
        .div_hover:hover {
            box-shadow: 0px 0px  5px grey !important;
            background-color:#ffca0888 !important;
        }
    </style>



    <h3 class="color_red text-center" >احصائيات الشحنات  </h3>
    <div class="container">
        <div class="row">

            <div class="col-lg-2 col-xs-4 col-sm-4 col-md-2 " style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/draft')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fab fa-firstdraft color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_draft_count}}</div>
                            <div class="color_red text-110" >المسودات </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2 " style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/not_accepted')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-window-close color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_not_accepted_count}}</div>
                            <div class="color_red text-110">الشحنات غير المعتمدة </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2 " style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/accepted')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-check-circle color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_accepted_count}}</div>
                            <div class="color_red text-110">الشحنات المعتمدة </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/in_transit')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-plane-departure color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_in_transit_count}}</div>
                            <div class="color_red text-110">الشحنات بالعبور </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/with_arabex_driver')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-shipping-fast color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_with_arabex_driver_count}}</div>
                            <div class="color_red text-110">مع سائق ارابيكس </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/client_not_respond')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-phone-slash color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_client_not_respond_count}}</div>
                            <div class="color_red text-110">العميل لا يرد </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/scheduled')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-calendar-alt  color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_scheduled_count}}</div>
                            <div class="color_red text-110">الشجنات المجدولة  </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/returned')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-reply-all  color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_returned_count}}</div>
                            <div class="color_red text-110">الشجنات المعادة  </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/delivered')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-check-double color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_delivered_count}}</div>
                            <div class="color_red text-110">الشجنات المسلمة  </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/stores')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="fas fa-check-double color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_returned_count}}</div>
                            <div class="color_red text-110">شحنات المتاجر </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-xs-6 col-sm-6  col-md-2" style="padding: 20px">
                <div class=" text-center  px-2 py-3  radius-2  shadow-sm h-100 bgcolor_yellow div_hover" >
                    <a  class="" href="{{url(app()->getLocale().'/dashboard/shipments/all')}}" >
                        <div class="mb-1 ">
                <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                    <i class="far fa-circle color_red text-200 w-4"></i>
                </span>
                        </div>
                        <div class="mt-2px">
                            <div class="color_black text-180">{{@$shipments_all_count}}</div>
                            <div class="color_red text-110">كل الشحنات </div>
                        </div>
                    </a>
                </div>
            </div>







        </div>
    </div>

{{--    @php--}}



{{--        if (in_array("stores_statistics",  explode(',', Auth::user()->permissions)) or in_array("administrator",  explode(',', Auth::user()->permissions)))--}}

{{--             {--}}
{{--    @endphp--}}

    <h3 class="color_red text-center" style="margin-top: 30px">احصائيات المتجر </h3>

    <div class="row radius-1 shadow-md overflow-hidden" style="">

        <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
            <div class="pos-rel bgc-warning py-3 c-pointer">
            <span class="opacity-4 position-rc mr-2 d-none">
                <i class="mr-3 mt-n2 fa fa-dollar-sign text-dark-tp5 opacity-4 w-5 h-5 text-center pt-1 radius-round fa-5x"></i>
            </span>

                <div class="d-flex align-items-center">
                    <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                        <i class="pos-abs mt-n2px ml-n3px fa fa-dollar-sign text-dark-tp5 opacity-4 w-5 h-5 text-center pt-1 radius-round text-170"></i>
                        <i class="pos-rel fa fa-dollar-sign text-white w-5 h-5 text-center pt-1 radius-round text-170"></i>
                    </div>

                    <div class="text-white">
                        <div>
                        <span class="text-160 text-600">
                            {{@$shipment_count}}
                         </span>

                        </div>
                        <div class="text-uppercase text-85 text-600 letter-spacing">
                            شحنة
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
            <div class="pos-rel bgc-info-d1 py-3 border-l-3 brc-white-tp3 c-pointer">
            <span class="opacity-4 position-rc mr-45 d-none">
                <i class="mr-4 mt-n4 fa fa-signal text-dark-tp5 opacity-4 w-5 h-5 text-center pt-1 radius-round fa-6x"></i>
            </span>

                <div class="d-flex align-items-center">
                    <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                        <i class="pos-abs mt-n1 ml-n1 fa fa-shopping-basket text-blue opacity-3 w-5 h-5 text-center pt-1 radius-round text-170"></i>
                        <i class="pos-rel fa fa-shopping-basket text-white w-5 h-5 text-center pt-1 radius-round text-170"></i>
                    </div>

                    <div class="text-white">
                        <div>
                        <span class="text-160 text-600">
                          {{ @$stores_count}}
                         </span>

                        </div>
                        <div class="text-uppercase text-85 text-600 letter-spacing">
                            متجر
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
            <div class="bgc-danger-d1 py-3 border-l-3 brc-white-tp3 c-pointer">
                <div class="d-flex align-items-center">
                    <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                        <i class="pos-abs mt-n1 fa fa-clipboard text-purple-d3 opacity-4 w-5 h-5 text-center pt-1 radius-round fa-2x"></i>
                        <i class="pos-rel fa fa-check text-white w-5 h-5 text-center pt-1 radius-round text-170"></i>
                    </div>

                    <div class="text-white">
                        <div>
                        <span class="text-160 text-600">
                              {{ @$customers_count}}

                        </span>

                        </div>
                        <div class="text-uppercase text-85 text-600 letter-spacing">
                            مشترك
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 my-1 my-lg-0 px-sm-1 px-lg-0">
            <div class="bgc-success-d1 py-3 border-l-3 brc-white-tp3 c-pointer">
                <div class="d-flex align-items-center">
                    <div class="pos-rel p-3 bgc-white-tp8 radius-round ml-3 mr-3 shadow-md">
                        <i class="pos-abs mt-n2px ml-n3px fa fa-retweet text-default-d2 opacity-3 w-5 h-5 text-center pt-1 radius-round text-170"></i>
                        <i class="pos-rel fa fa-retweet text-white w-5 h-5 text-center pt-1 radius-round text-170"></i>
                    </div>

                    <div class="text-white">
                        <div>
                        <span class="text-160 text-600">
                       {{ @$products_count}}
                        </span>

                        </div>
                        <div class="text-uppercase text-85 text-600 letter-spacing">
                            منتج
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    @php--}}
{{--        }--}}
{{--    @endphp--}}





    {{--    <script>--}}
    {{--        $(document).ready( function () {--}}
    {{--            $('#example').DataTable({--}}
    {{--                    "order": [[ 0, "desc" ]],--}}
    {{--                    language: {--}}
    {{--                        url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json'--}}
    {{--                    }--}}
    {{--                }--}}

    {{--            );--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
