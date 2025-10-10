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
                <li class="breadcrumb-item active text-grey-d1">ادارة الاعضاء</li>

            </ol>

{{--            @if(in_array("payments_add", session('permissions_array')) or in_array("administrator", session('permissions_array')))--}}
{{--                <a href="{{url('/dashboard/payments/create') }}" type="button" class="btn btn-success  btn-sm" >اضافة دفعة   </a>--}}
{{--            @else--}}
{{--                <a href="#" type="button" class="btn btn-lighter-secondary  btn-sm show_error_message"  >اضافة دفعة   </a>--}}
{{--            @endif--}}


        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')

    <table id="example"  class="display nowrap"  width="100%">

        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td > اسم المشترك</td >
            <td >تاريخ الميلاد</td >
            <td>birthday_show  </td >
            <td>  mobile </td>
            <td> mobile_show </td>
            <td> phone  </td>
            <td> phone_show </td>
            <td> email </td>
            <td> pass </td>
            <td> صورة </td>
            <td data-priority="2">تحديث </td>
            <td data-priority="3" style="background-color: #dd6a57">حذف </td>
        </tr>
        </thead>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td > اسم المشترك</td >
            <td >تاريخ الميلاد</td >
            <td>birthday_show  </td >
            <td>  mobile </td>
            <td> mobile_show </td>
            <td> phone  </td>
            <td> phone_show </td>
            <td> email </td>
            <td> pass </td>
            <td> صورة </td>
            <td data-pririty="2">تحديث </td>
            <td data-pririty="3" style="background-color: #dd6a57">حذف </td>
        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                ajax: "/{{app()->getLocale()}}/dashboard/customers/customers_in_json",
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
                    { "data": "name" ,"title":" اسم المشترك"},
                    { "data": "id" ,"title":" تاريخ الميلاد"},
                    { "data": "id" ,"title":" birthday_show"},
                    { "data": "mobile" ,"title":" mobile"},
                    { "data": "id" ,"title":"mobile_show"},
                    { "data": "phone" ,"title":"phone"},
                    { "data": "id" ,"title":" phone_show"},
                    { "data": "email" ,"title":" email"},
                    { "data": "pass" ,"title":" pass"},
                    { "data": "id" ,"title":"صورة"},
                    { "data": "id" ,"title":"تحديث"},
                    { "data": "id" ,"title":"حذف"},

                ],

                "columnDefs": [

                    {
                         "data": null,
                        "render": function ( data, type, row ) {
                            return " <img class='zoom_it'  src=\"/{{Config::get('app.upload_image_folder')}}"+ row.pic +"\" style='width:40px;height:30px'>";
                        },
                        "targets": -3
                    },
                    {
                        // "data": null,

                        //"className": "show_error_message",
                        "render": function ( data, type, row ) {
{{--                            @if(in_array("payments_update", session('permissions_array')) or in_array("administrator", session('permissions_array')))--}}
{{--                                return "<a href=/dashboard/payments/edit/" + row.id + " class='btn btn-success btn-sm'>تحديث</a>";--}}
{{--                            @else--}}
                                return "<a  class='btn btn-lighter-secondary btn-sm show_error_message' >تحديث</a>";
{{--                            @endif--}}
                        },
                        "targets": -2
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            @if(in_array("payments_delete", session('permissions_array')) or in_array("administrator", session('permissions_array')))
                              return "<a href='#' data_id=" + row.id + " class='btn btn-danger btn-sm delete_btn' >حذف</a>";
                            @else
                               return "<a href='#' class='btn btn-light-danger btn-sm  show_error_message' >حذف</a>";
                            @endif

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


    <script>
        $(document).ready(function(){

            $(document).on('click', '.delete_btn', function(){
                var data_id = $(this).attr("data_id");
                $.ajax({
                    beforeSend: function() {
                        Swal.showLoading();
                    },
                    {{--url:"{{url(app()->getLocale().'/dashboard/customers/destroy/')}}/",--}}
                    url:"{{url(app()->getLocale().'/dashboard/customers/destroy/')}}/data_id",
                    method:"GET",
                    data:{"_token": "{{ csrf_token() }}",id:data_id, },
                    success:function(data)
                    {
                        if(data.status === "true" )
                        {
                        swal.close();
                        Lobibox.notify('success', {
                            continueDelayOnInactiveTab: true,
                            position: 'bottom left',
                            size: 'mini',
                            delay: 2000,
                            msg: '<h5 style="font-family: font2">تم الحذف بنجاح..!</h5>'
                        });
                        }else{
                            alert("error")
                        }

                        $('#example').DataTable().ajax.reload();
                        // alert($('#example').DataTable().data().count());
                        //$('.shipments_not_accpeted_count').text( $('#example').DataTable().data().count() - 1 );
                        //setTimeout(function(){ location.reload(); }, 3000);
                    }
                })
            });



        });
    </script>
@endsection
