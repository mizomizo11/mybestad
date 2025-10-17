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
                <li class="breadcrumb-item active text-grey-d1">ادارة  الاستشارات</li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')
    <table id="example"  class="display nowrap"  width="100%">
        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td></td >
            <td></td >
            <td></td >
            <td></td>
            <td></td>
            <td></td>
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td >--}}
{{--            <td></td >--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
            <td></td>
            <td></td>
            <td data-priority="1"></td>
            <td data-priority="2"> </td>
            <td data-priority="3" style="background-color: #dd6a57"> </td>
        </tr>
        </thead>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff;">
            <td></td >
            <td></td >
            <td></td >
            <td></td>
            <td></td>
            <td></td>
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td >--}}
{{--            <td></td >--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
{{--            <td></td>--}}
            <td></td>
            <td></td>
            <td></td>
            <td data-priority="2"> </td>
            <td data-priority="3" style="background-color: #dd6a57"> </td>
        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                ajax: "/{{app()->getLocale()}}/admins/consultations/json",
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
                    { "data": "status" ,"title":"status"},
                    { "data": "appointment_request_by_patient" ,"title":"طلب موعد"},
                    { "data": "appointment_reply_by_doctor" ,"title":"رد الطبيب "},
                    { "data": "appointment_confirm_by_patient" ,"title":" اعتماد الموعد "},
                    { "data": "appointment_selected_by_patient" ,"title":"  الموعد النهائي "},

                    // { "data": "symptoms" ,"title":"  symptoms  "},
                    // { "data": "diagnosis" ,"title":"  diagnosis  "},
                    // { "data": "recommendations" ,"title":"  recommendations  "},
                    // { "data": "additional_instructions" ,"title":"  additional_instructions  "},
                    // { "data": "referrals" ,"title":"  referrals  "},
                    // { "data": "following_plan" ,"title":"  following_plan  "},
                    // { "data": "notes" ,"title":"  notes  "},


                    { "data": "id" ,"title":"  عرض املفات المرفقة   "},
                    { "data": "id" ,"title":"  التقرير  "},
                    // { "data": "id" ,"title":"تحديث"},
                    { "data": "id" ,"title":"حذف"},

                ],
                "columnDefs": [
                    {{--{--}}
                    {{--     "data": null,--}}
                    {{--    "render": function ( data, type, row ) {--}}
                    {{--        return " <img class='zoom_it'  src=\"/{{Config::get('app.upload')}}"+ row.image +"\" style='width:40px;height:30px'>";--}}
                    {{--    },--}}
                    {{--    "targets": -4--}}
                    {{--},--}}
                        {
                            "render": function ( data, type, row ) {
                                      return "<a href=/{{app()->getLocale()}}/admins/consultations/show-files/" + row.id + " class='btn btn-success btn-sm'>عرض الملفات المرفقة </a>";
                            },
                            "targets": -3
                        },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return "<a href='#' data_id=" + row.id + " class='btn btn-info btn-sm report_btn' >التقرير</a>";
                        },
                        "targets":-2
                    },

                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                              {{--return "<a href={{url(app()->getLocale())}}/admins/consultations/destroy/" + row.id + "  data_id=" + row.id + " class='btn btn-danger btn-sm delete_btn' >حذف</a>";--}}

                                  return "<a data_id=" + row.id + "  class='btn btn-danger delete_btn btn-sm' style='color:#fff' >حذف</a>";
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


            $(document).on('click','.report_btn',function(e){
                var consultation_id = $(this).attr("data_id");
                var panel =      jsPanel.modal.create({
                    show: 'fadeIn',
                    // container: "body",
                    //   contentSize: "auto",
                    onwindowresize: true,
                    container: '.page-content',
                    theme: 'info',
                    borderRadius: '5px',
                    //headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: '<span style="margin: 0">  التقرير النهائي </span>',
                    headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة  التقرير  </button>'+
                        '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    footerToolbar: 'اختيار موعد',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.8);},
                        height: () => { return Math.min(800, window.innerHeight*0.9);}
                        //  width:  window.innerWidth * 0.6,
                        //  height: window.innerHeight * 0.6
                    },
                    // contentSize: 'auto auto',
                    position: 'center 0 -50',
                    //animateIn: 'jsPanelFadeIn',
                    contentAjax: {
                        method: 'get',
                        url :  "{{url(app()->getLocale()."/admins/consultations/show-report") }}/"+consultation_id,
                        beforeSend: function() {
                            this.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            // this.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
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
            });





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
                            url:"{{url(app()->getLocale().'/admins/consultations/destroy/')}}/data_id",
                            method:"GET",
                            data:{"_token": "{{ csrf_token() }}",id:data_id, },
                            success:function(data)
                            {
                                if(data.status === "true" )
                                {
                                    swal.close();
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
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
