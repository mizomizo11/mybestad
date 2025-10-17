@extends('layouts.site.master')

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;border-bottom:1px solid #ccc;padding:10px">
                    {{ __('site.closed_consultations') }}
                </h3>
            </div>
        </div>
    </div>

    <style>.my_scroll_div{
            overflow-x: auto;
            max-width: 100%;
        }</style>
    <div class="my_scroll_div">


    <table id="example"  class="display nowrap"  width="100%">
        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td></td >
            <td></td >
            <td></td >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td data-priority="2"> </td>
            <td data-priority="3" style="">{{ __('site.report') }} </td>
        </tr>
        </thead>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td data-priority="2"> </td>
            <td data-priority="3" style=""> </td>
        </tr>
        </tfoot>
    </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                ajax: "/{{app()->getLocale()}}/patients/consultations/closed/json",
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
                    { "data": "appointment_request_by_patient" ,"title":"{{ __('site.ask_for_appointment') }}"},
                    { "data": "appointment_reply_by_doctor" ,"title":" {{ __('site.doctor_reply') }}"},
                    { "data": "appointment_confirm_by_patient","title":"{{ __('site.confirm_patient') }}"},
                    { "data": "appointment_selected_by_patient" ,"title":"{{ __('site.final_appointment') }} - ( {{Auth::guard('patient')->user()->timezone->name_en}})"},
                    { "data": "id" ,"title":" {{ __('site.attached_files') }} "},
                    { "data": "status" ,"title":" {{ __('site.status') }}"},
                    { "data": "id" ,"title":"{{ __('site.the_report') }}"},
                ],
                "columnDefs": [
                    {
                        "data": null,
                        "render": function ( data, type, row ) {

                                return "<a href='#' data_id=" + row.id + "  class='btn btn-info btn-sm show_uploaded_btn' > {{ __('site.attached_files') }} </a>";

                        },
                        "targets":-3
                    },

                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return "<a href='#' data_id=" + row.id + " class='btn btn-info btn-sm report_btn' >{{ __('site.the_report') }}</a>";
                        },
                        "targets":-1
                    }
                ],
                language: {
                    url: '{{ (app()->getLocale()=="ar")?asset('all/json/Arabic.json'):asset('all/json/en.json')}}'
                }
            } );
            setInterval( function () {
                $('#example').DataTable().ajax.reload();
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
                    headerTitle: '<span style="margin: 0">{{ __('site.the_report') }} </span>',
                    headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">  {{ __('site.print') }}  </button>'+
                        '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">{{ __('site.save_as_pdf') }}</button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    footerToolbar: '{{ __('site.the_report') }}',
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
                        url :  "{{url(app()->getLocale()."/patients/consultations/show-report") }}/"+consultation_id,
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


            $(document).on('click','.show_uploaded_btn',function(e){
                var consultation_id = $(this).attr("data_id");
                //alert(consultation_id);
                var panel =      jsPanel.modal.create({
                    show: 'fadeIn',
                    // container: "body",
                    //   contentSize: "auto",
                    onwindowresize: true,
                    container: '.page-content',
                    theme: 'info',
                    borderRadius: '5px',
                    //headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: '<span style="margin: 0">   {{ __('site.attached_files') }} </span>',
                    // headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة  التقرير  </button>'+
                    //     '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    footerToolbar: '{{ __('site.attached_files') }}',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.9);},
                        height: window.innerHeight * 0.6
                    },
                    // contentSize: 'auto auto',
                    position: 'center 0 -50',
                    //animateIn: 'jsPanelFadeIn',
                    contentAjax: {
                        method: 'get',
                        url :  "{{url(app()->getLocale()."/patients/consultations/show-uploaded-files") }}/"+consultation_id,
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


        });

    </script>






@endsection
