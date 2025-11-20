@extends('layouts.site.master')

@section('breadcrumb')
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                    {{ __('site.open_consultations') }}
                    <img src="/all/img/logo.png" alt="" style="height: 40px;">
                </h3>
            </div>
        </div>
    </div>


    <table id="example"  class="display nowrap"  width="100%">
        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td > اسم المريض</td >
            <td >تاريخ الميلاد</td >
            <td> البريد الالكتروني </td>

            <td> الدولة</td>
            <td> صورة </td>
            <td> مقفل </td>
            <td data-priority="2">تحديث </td>
            <td data-priority="3" style="background-color: #dd6a57">حذف </td>
        </tr>
        </thead>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td > اسم المريض</td >
            <td >تاريخ الميلاد</td >
            <td> البريد الالكتروني </td>

            <td> الدولة</td>
            <td> صورة </td>
            <td> مقفل </td>
            <td data-priority="2">تحديث </td>
            <td data-priority="3" style="background-color: #dd6a57">حذف </td>
        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                ajax: "/{{app()->getLocale()}}/doctors/open-consultations-json",
                stateSave:true,
                responsive: true,
                "dom": '<"top"lBf>rt<"bottom"ip>',
                "buttons": [
                    'copy',
                    {
                        extend: 'excel',
                        "text": "تصدير الى اكسل",
                        title: 'الدفعات'
                    },
                ],
                "order": [[ 0, "desc" ]],
                "columns": [
                    { "data": "id" ,"title":"ID"},
                    { "data": "doctor_name" ,"title":"Doctor name"},
                    { "data": "patient_name" ,"title":"Patient name"},
                    { "data": "agreement" ,"title":"agreement"},

                    { "data": "status" ,"title":"status"},
                    { "data": "id" ,"title":"صورة"},
                    { "data": "id" ,"title":"مقفل"},
                    { "data": "id" ,"title":"تحديث"},
                    { "data": "id" ,"title":"حذف"},

                ],
                "columnDefs": [
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return " <img class='zoom_it'  src=\"/{{Config::get('app.upload')}}"+ row.image +"\" style='width:40px;height:30px'>";
                        },
                        "targets": -4
                    },
                    {
                        "render": function ( data, type, row ) {
                            return "<a href=/{{app()->getLocale()}}/admins/patients/edit/" + row.id + " class='btn btn-success btn-sm'>تحديث</a>";
                        },
                        "targets": -2
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return "<a href='#' data_id=" + row.id + " class='btn btn-danger btn-sm delete_btn' >حذف</a>";
                        },
                        "targets":-1
                    }
                ],
                language: {
                    url: '{{asset('all/json/Arabic.json')}}'
                }
            } );
            setInterval( function () {
                $('#example').DataTable().ajax.reload();
            }, 10000 );
        });

    </script>




@endsection
