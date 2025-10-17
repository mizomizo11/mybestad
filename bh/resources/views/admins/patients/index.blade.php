@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة المرضى المشتركين</li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')
    <table id="example"  class="display nowrap"  width="100%">
        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >
            <td > اسم المريض</td >
            <td >تاريخ الميلاد</td >
            <td> البريد الالكتروني </td>
            <td> كلمة المرور </td>
            <td> الدولة</td>
            <td> دفع مجاني  </td>
            <td> صورة </td>

            <td> مقفل </td>
            <td> timezone </td>
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
            <td> كلمة المرور </td>
            <td> الدولة</td>
            <td> دفع مجاني  </td>
            <td> صورة </td>

            <td> مقفل </td>
            <td> timezone </td>
            <td data-priority="2">تحديث </td>
            <td data-priority="3" style="background-color: #dd6a57">حذف </td>
        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                ajax: "/{{app()->getLocale()}}/admins/patients/json",
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
                    { "data": "name" ,"title":" اسم المريض"},
                    { "data": "mobile" ,"title":"الموبايل"},
                    { "data": "email" ,"title":"البريد الالكتروني"},
                    { "data": "password" ,"title":" كلمة المرور"},
                    { "data": "country_name" ,"title":"الدولة"},
                    { "data": "timezone_name" ,"title":"timezone"},
                    { "data": "free_payment" ,"title":"دفع مجاني"},
                    { "data": "id" ,"title":"صورة"},
                    { "data": "locked" ,"title":"مقفل"},
                    { "data": "id" ,"title":"تحديث"},
                    { "data": "id" ,"title":"حذف"},                ],
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
                              return "<a  data_id=" + row.id + " class='btn btn-danger btn-sm delete_btn' >حذف</a>";
                        },
                        "targets":-1
                    }
                ],
                language: {
                    url: '{{asset('all/json/Arabic.json')}}'
                }
            } );
            // setInterval( function () {
            //     $('#example').DataTable().ajax.reload();
            // }, 10000 );

            setInterval( function () {
                $('#example').DataTable().ajax.reload(null,false);
            }, 10000 );

        });

    </script>
    <script>
        $(document).ready(function(){

            $(document).on('click', '.delete_btn', function(e){
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



                        var data_id = $(this).attr("data_id");
                        $.ajax({
                            beforeSend: function() {
                                Swal.showLoading();
                            },
                            {{--url:"{{url(app()->getLocale().'/admins/customers/destroy/')}}/",--}}
                            url:"{{url(app()->getLocale().'/admins/patients/destroy/')}}/data_id",
                            method:"GET",
                            data:{"_token": "{{ csrf_token() }}",id:data_id, },
                            success:function(data)
                            {
                                if(data.status === "true" )
                                {
                                    swal.close();
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "تم الحذف بنجاح",
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
                                }else{
                                    // alert("error")
                                }

                                $('#example').DataTable().ajax.reload();
                                // alert($('#example').DataTable().data().count());
                                //$('.shipments_not_accpeted_count').text( $('#example').DataTable().data().count() - 1 );
                                //setTimeout(function(){ location.reload(); }, 3000);
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

@endsection
