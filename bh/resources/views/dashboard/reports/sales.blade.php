@extends('layouts.dashboard.master')

@section('breadcrumb')
    <style>
        @media print {
            .noprint {
                display: none !important;
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
                <li class="breadcrumb-item active text-grey-d1">التقارير</li>
                <li class="breadcrumb-item active text-grey-d1"> تقرير المبيعات</li>
            </ol>

            <button  class="btn btn-sm btn-info noprint" onclick="window.print()"   style="width: 200px;">طباعة التقرير   </button>

        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')




    <form class="noprint" name="form1" method="get"  action="{{url("/dashboard/reports/sales/")}}">
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


<div class='row' style="margin-bottom: 10px;">
    <div class='col-md-4'>
        <img src="{{asset("/all/images/right_logo.jpg")}}" style="width: 100%;height:160px">
    </div>
    <div class='col-md-4' style="text-align: center;padding-top: 30px;">
        <div style="background-color: #fdc62e;border: 2px solid #000;border-radius: 20px;width: 250px;margin: auto;font-weight: bolder;font-size: 23px;padding: 10px;">
            تقرير المبيعات
            <br>
       </div>
    </div>
    <div class='col-md-4'>
        <img src="{{asset("/all/images/left_logo.jpg")}}" style="width: 100%;height:160px">
    </div>
</div>

<div class='row' style="margin-bottom: 10px;">
    <div class='col-md-6' style="">
        <div class='row' style="">
            <div class='col-md-12'>
                <span style="padding: 0px;margin: 0px;width: 150px ;"><b> التاريخ:</b></span>  <?php echo date("Y-m-d") ?>
            </div>
        </div>
        <div class='row' style="padding: 30px;">
            <div class='col-md-12'>
            </div>
       </div>
   </div>
</div>

<table class="table table-hover table-bordered table-striped" style="">
    <thead>
    <tr style="background-color: #57b5da;color:#fff;padding:1px">
        <th >نوع الشحنات </th>
        <th >العدد</th>
        <th >تكلفة الشحنة </th>
    </tr>
    </thead>
    <tr style="">
        <td > الشحنات المعتمدة</td>
        <td >
            {{$shipments_accepted_count}}
        </td>
        <td>
            {{@$shipments_the_record_was_created_ammount}}
        </td>
    </tr>
    <tr style="">
        <td > الشحنات بالعبور</td>
        <td >
              {{$shipments_in_transit_count}}
        <td >
              {{@$shipments_in_transit_ammount}}
        </td>
    </tr>
    <tr style="">
        <td > الشحنات مع السائقين</td>
        <td >
            {{$shipments_with_arabex_driver_count}}
        </td>
        <td >
          {{@$shipments_with_arabex_driver_ammount}}
    </tr>


    <tr style="background-color: #ff000022;">
        <td> الشحنات -المرتجعة</td>
        <td>
            {{$shipments_returned_count}}
        </td>
        <td >
            {{@$shipments_returned_ammount}}
    </tr>
    <tr>
        <td> الشحنات المسلمة</td>
        <td>
            {{$shipments_delivered_count}}
        </td>
        <td >
             {{@$shipments_delivered_ammount}}

    </tr>
    <tr>
        <td> كل الشحنات </td>
        <td>
            {{$shipments_all_count}}

        </td>
        <td >
        {{@$shipments_returned_ammount}}

    </tr>

    <tr style="background-color: #5ceb517d;">
        <td > المجموع الكلي = الدخل الاجمالي للشحنات - الشحنات المرتجعة</td>
        <td>
            {{@$shipments_returned_ammount}}

        </td>
        <td >
        {{@$shipments_returned_ammount}}


    </tr>
</table>


@endsection
