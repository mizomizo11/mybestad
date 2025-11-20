@extends('layouts.dashboard.master')

@section('breadcrumb')

    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url("/dashboard/index")}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة الدفعات</li>

            </ol>

            @if(in_array("payments_add", session('permissions_array')) or in_array("administrator", session('permissions_array')))
                <a href="{{url('/dashboard/payments/create') }}" type="button" class="btn btn-success  btn-sm" >اضافة دفعة   </a>
            @else
                <a href="#" type="button" class="btn btn-lighter-secondary  btn-sm show_error_message"  >اضافة دفعة   </a>
            @endif


        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')

    <table id="example"  class="display nowrap"  width="100%">

        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td >رقم الحساب</td >
            <td >اسم السائق</td >
            <td>قيمة الدفعة </td >
            <td> طريقة الدفع </td>
            <td> اعتماد </td>
            <td> تاريخ الدفعة </td>
            <td> المرجع </td>
            <td> اعتماد </td>
            <td> صورة </td>
            <td >تحديث </td>
            <td style="background-color: #dd6a57">حذف </td>
        </tr>
        </thead>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td >رقم الحساب</td >
            <td >اسم السائق</td >
            <td>قيمة الدفعة </td >
            <td> طريقة الدفع </td>
            <td> اعتماد </td>
            <td> تاريخ الدفعة </td>
            <td> اعتماد </td>
            <td> المرجع </td>
            <td> صورة </td>
            <td >تحديث </td>
            <td style="background-color: #dd6a57">حذف </td>
        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                // "ajax": "ajax/shipments_get_not_accepted.php",href='/dashboard/accounting/accounts/payments/" + row.account_number + "'
                ajax: "/dashboard/payments/payments_in_json",
                // processing: true,
                // serverSide: true,
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
                    { "data": "account_number" ,"title":"رقم الحساب"},
                    { "data": "driver_name" ,"title":"اسم السائق"},
                    { "data": "payment_value" ,"title":"قيمة الدفعة"},
                    { "data": "payment_method" ,"title":"طريقة الدفع"},
                    { "data": "accepted" ,"title":"اعتماد الدفعة"},
                    { "data": "created_at" ,"title":"تاريخ الدفعة"},
                    { "data": "reference" ,"title":" المرجع"},
                    { "data": "id" ,"title":" اعتماد"},
                    { "data": "pic" ,"title":"صورة"},
                    { "data": "id" ,"title":"تحديث"},
                    { "data": "id" ,"title":"حذف"},

                ],
                // "fnDrawCallback": function () {
                //     $(".html5lightbox").html5lightbox();
                //    // $(".show_error_message").show_error_message();
                // },
                "columnDefs": [
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return ""+ row.owner_name +"-"+ row.account_number +"";
                        },
                        "targets": 1
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            if(row.accepted=='yes')
                                return "<input type='checkbox' data_idd=" + row.id + " class='unaccept_btn ace-switch input-md ace-switch-bars bgc-success' checked >";
                             else
                                 return "<input type='checkbox' data_idd=" + row.id + " class='accept_btn ace-switch input-md ace-switch-bars bgc-success'  >";
                        },
                        "targets": -4
                    },

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
                            @if(in_array("payments_update", session('permissions_array')) or in_array("administrator", session('permissions_array')))
                                return "<a href=/dashboard/payments/edit/" + row.id + " class='btn btn-success btn-sm'>تحديث</a>";
                            @else
                                return "<a  class='btn btn-lighter-secondary btn-sm show_error_message' >تحديث</a>";
                            @endif
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

                // createdRow: (row, data, dataIndex, cells) => {
                //     // $(cells[0]).css('background-color', "#ffc10715");
                //     $(cells[1]).css('background-color', "#ffc10715");
                //     $(cells[2]).css('background-color', "#ffc10715");
                //     $(cells[3]).css('background-color', "#ffc10715");
                //     $(cells[4]).css('background-color', "#ffc10715");
                //     $(cells[5]).css('background-color', "#d9493915");
                //     $(cells[6]).css('background-color', "#d9493915");
                //     $(cells[7]).css('background-color', "#d9493915");
                //     $(cells[8]).css('background-color', "#d9493915");
                //     $(cells[9]).css('background-color', "#28a74522");
                //     $(cells[10]).css('background-color', "#28a74522");
                //     $(cells[11]).css('background-color', "#57b5da22");
                //     $(cells[12]).css('background-color', "#28a74522");
                //     $(cells[13]).css('background-color', "#57b5da44");
                // },
                language: {
                    url: '{{asset('all/json/Arabic.json')}}'
                }
            } );



            setInterval( function () {
                $('#example').DataTable().ajax.reload();
            }, 10000 );

            // $('#example').dataTable({
            //
            // });

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
                    url:"{{url('/dashboard/payments/destroy/')}}/data_id",
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

            $(document).on('change', '.accept_btn', function(){
                var data_id = $(this).attr("data_idd");
                $.ajax({
                    beforeSend: function() {
                        Swal.showLoading();
                    },
                    url:"{{route('payment_set_accepted')}}",
                    method:"POST",
                    data:{"_token": "{{ csrf_token() }}",payment_id:data_id, },
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
                                msg: '<h5 style="font-family: font2">تم الاعتماد-  </h5>'
                            });

                            $('#example').DataTable().ajax.reload();


                        }else{
                            alert("error")
                        }
                    }
                })
            });
            $(document).on('change', '.unaccept_btn', function(){
                var data_id = $(this).attr("data_idd");
                $.ajax({
                    beforeSend: function() {
                        Swal.showLoading();
                    },
                    url:"{{route('payment_set_unaccepted')}}",
                    method:"POST",
                    data:{"_token": "{{ csrf_token() }}",payment_id:data_id, },
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
                                msg: '<h5 style="font-family: font2"> تم الغاء الاعتماد  </h5>'
                            });

                            $('#example').DataTable().ajax.reload();


                        }else{
                            alert("error")
                        }
                    }
                })
            });



        });
    </script>
@endsection
