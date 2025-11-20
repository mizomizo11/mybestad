@extends('layouts.dashboard.master')

@section('breadcrumb')
    <style>
        @media print {
            .noprint {
                display: none;
            }
        }
    </style>
    <div class="content-nav mb-1 bgc-grey-l4 noprint">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url('/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1"> التقارير</li>

                <li class="breadcrumb-item active color1" ><a href="{{url('/dashboard/reports/accounts/')}}" > العملاء </a>  </li>
                <li class="breadcrumb-item active text-grey-d1">تقرير عدد الشحنات للعميل </li>
                <li class="breadcrumb-item active text-grey-d1"> {{$account->owner_name}}  </li>
            </ol>

            <button class="btn btn-sm btn-info noprint" onclick="window.print()" style="width: 200px;">طباعة التقرير
            </button>

        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')
    <form class="noprint" name="form1" method="get"  action="{{url("/dashboard/reports/accounts/$account_number")}}">
        <div class='row ' style="margin: 20px;padding:10px;border:1px solid #e3e3e3;background-color: #f6f7f7;border-radius: 10px">
            <div class="col-md-2">
                <label>من : </label>
                <input type="text" id="from" name="from" value="{{ @$_GET["from"] }}" class="datepicker form-control form-control-sm" autocomplete="off" required>
            </div>
            <div class="col-md-2">
                <label>الى : </label>
                <input type="text" id="to" name="to" value="{{ @$_GET["to"] }}" class="datepicker form-control form-control-sm" autocomplete="off" >
            </div>
            <div class="col-md-2">
                <label>. </label>
                <button class="btn btn-sm btn-info "  style="width: 200px;"> بحث   </button>
            </div>
        </div>

        @csrf
    </form>
    @php
        if(@isset($_GET["from"]))
        {
    @endphp

    <div class='row ' style="margin-bottom: 10px;">
        <div class='col-md-4'>
            <img src="{{asset('/all/images/right_logo.jpg')}}" style="width: 100%;height:160px">
        </div>
        <div class='col-md-4' style="text-align: center;padding-top: 30px;">
            <div
                style="background-color: #fdc62e;border: 2px solid #000;border-radius: 20px;width: 250px;margin: auto;font-weight: bolder;font-size: 23px;padding: 10px;">
                تقرير الشحنات
                <br>
            </div>
        </div>
        <div class='col-md-4'>
            <img src="{{asset('/all/images/left_logo.jpg')}}" style="width: 100%;height:160px">
        </div>
    </div>


    <table class="table table-hover table-bordered table-striped" style="">
        <thead>
        <tr style="background-color: #57b5da;color:#fff;padding:1px">
            <th>الشحنات</th>
            <th>العدد</th>
        </tr>
        </thead>
        <tr style="">
            <td>عدد الشحنات الغير معتمدة</td>
            <td>
                {{$shipments_not_accepted_count}}
            </td>
        </tr>
        <tr style="">
            <td>عدد الشحنات المعتمدة</td>
            <td>
                {{$shipments_accepted_count}}
            </td>
        </tr>
        <tr style="">
            <td>عدد الشحنات بالعبور</td>
            <td>
                {{$shipments_in_transit_count}}
            </td>
        </tr>
        <tr style="">
            <td>عدد الشحنات مع السائقين</td>
            <td>
                {{$shipments_with_arabex_driver_count}}
            </td>
        </tr>
        <tr>
            <td>عدد الشحنات المجدولة</td>
            <td>
                {{$shipments_scheduled_count}}
            </td>
        </tr>
        <tr>
            <td>عدد الشحنات -العميل لا يرد</td>
            <td>
                {{   $shipments_client_not_respond_count }}
            </td>
        </tr>
        <tr>
            <td>عدد الشحنات -المرتجعة</td>
            <td>
                {{$shipments_returned_count}}
            </td>
        </tr>
        <tr>
            <td>عدد الشحنات المسلمة</td>
            <td>
                {{$shipments_delivered_count}}
            </td>
        </tr>
        <tr>
            <td>عدد الشحنات الكلي</td>
            <td>
                {{$shipments_all_count}}
            </td>
        </tr>
    </table>
    @php
      }
    @endphp


@endsection
