@extends('layouts.dashboard.master')

@section('breadcrumb')

    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="../../../public/index.php">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1">ادارة المتاجر</li>
            </ol>

            <a href="{{url('/dashboard/stores/create') }}" type="button" class="btn  btn-sm" style="font-family: font2;background-color: #57b5da;color:#fff">اضافة    </a>

        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')




    <table id="example" class="table table-hover table-bordered table-striped responsive nowrap"  style="width: 100%">

        <thead>
            <tr style="background-color: #57b5da;color:#fff;">
                <td >ID</td >
                <td style="">المتجر </td >
                <td> المتجر - انكليزي	 </td>
                <td style="">عنوان </td >
                <td> عنوان - انكليزي	 </td>

                <td> الترتيب </td>
                <td> صورة </td>
                <td style="background-color: #efae43">تحديث </td>
                <td style="background-color: #dd6a57">حذف </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
                <tr style="font-size: 0.85rem;">
                    <td >{{ $store->id }}</td >
                    <td >{{ $store->name }}</td >
                    <td>{{ $store->name_eng }}  </td>
                    <td >{{ $store->address }}</td >
                    <td>{{ $store->address_eng }}  </td>
                    <td>{{ $store->record_order }}  </td>
                    <td> <img class="zoom" src="/{{Config::get('app.upload_image_folder')}}{{  $store -> pic }}" style="width:40px;height:30px"> </td>

                    <td style="background-color: #efae4322"> <a   href="/dashboard/stores/edit/{{$store->id}}"  class='btn btn-warning btn-sm tradebill_btn'  style='color:#fff'>تحديث</a></td>
                    <td style="background-color: #dd6a5722"> <a   href="/dashboard/stores/destroy/{{$store->id}}"   class='btn btn-danger btn-sm tradebill_btn'  style='color:#fff'>حذف</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff">
            <td >ID</td >
            <td style="">اسم التصنيف </td >
            <td> التصنيف - انكليزي	 </td>
            <td style="">عنوان </td >
            <td> عنوان - انكليزي	 </td>
            <td> الترتيب </td>
            <td> صورة </td>

            <td style="background-color: #efae43">تحديث </td>
            <td style="background-color: #dd6a57">حذف </td>

        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready( function () {
            $('#example').DataTable({
                "order": [[ 0, "desc" ]],
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json'
                    }
                }

            );
        });
    </script>
@endsection
