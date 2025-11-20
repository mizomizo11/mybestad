@extends('layouts.site.master')
@section('breadcrumb')
@endsection
@section('content')

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            line-height: normal;
            background-color: #fff;

            margin: 0;
        }

        form {
            margin: 15px;
        }

        .fileuploader {
            max-width: 800px;
            margin: auto;
            text-align: left;
            direction: ltr;
        }
    </style>




    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;border-bottom:1px solid #ccc;padding:10px">
                    {{ __('site.open_consultations') }}
                </h3>
            </div>
        </div>
    </div>
    <style>.my_scroll_div{
            overflow-x: auto;
            max-width: 100%;
        }</style>
<div class="my_scroll_div">
    <table id="example"  class="display nowrap "  width="100%">
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
            <td></td>
            <td data-priority="2"> </td>
            <td data-priority="3" style=""> </td>
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
            <td></td>
            <td data-priority="2"> </td>
            <td data-priority="3" style=""> </td>
        </tr>
        </tfoot>
    </table>
</div>

    <script>
        $(document).ready(function() {

            // enable fileuploader plugin
            $('input[name="files2"]').fileuploader({
                extensions: null,
                changeInput: ' ',
                theme: 'thumbnails',
                enableApi: true,
                addMore: true,
                thumbnails: {
                    box: '<div class="fileuploader-items">' +
                        '<ul class="fileuploader-items-list">' +
                        '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                        '</ul>' +
                        '</div>',
                    item: '<li class="fileuploader-item">' +
                        '<div class="fileuploader-item-inner">' +
                        '<div class="type-holder">${extension}</div>' +
                        '<div class="actions-holder">' +
                        '<button type="button" class="fileuploader-action fileuploader-action-remove delete_btn" data_id="${data.idd}" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                        '</div>' +
                        '<div class="thumbnail-holder">' +
                        '${image}' +
                        '<span class="fileuploader-action-popup"></span>' +
                        '</div>' +
                        '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                        '<div class="progress-holder">${progressBar}</div>' +
                        '</div>' +
                        '</li>',
                    item2: '<li class="fileuploader-item">' +
                        '<div class="fileuploader-item-inner">' +
                        '<div class="type-holder">${extension}</div>' +
                        '<div class="actions-holder">' +
                        '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                        '<button type="button" class="fileuploader-action fileuploader-action-remove delete_btn" data_id="${data.idd}" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                        '</div>' +
                        '<div class="thumbnail-holder">' +
                        '${image}' +
                        '<span class="fileuploader-action-popup"></span>' +
                        '</div>' +
                        '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                        '<div class="progress-holder">${progressBar}</div>' +
                        '</div>' +
                        '</li>',
                    startImageRenderer: true,
                    canvasImage: false,
                    _selectors: {
                        list: '.fileuploader-items-list',
                        item: '.fileuploader-item',
                        start: '.fileuploader-action-start',
                        retry: '.fileuploader-action-retry',
                        remove: '.fileuploader-action-remove'
                    },
                    onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                            api = $.fileuploader.getInstance(inputEl.get(0));

                        plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                        if(item.format == 'image') {
                            item.html.find('.fileuploader-item-icon').hide();
                        }
                    },
                    onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                            api = $.fileuploader.getInstance(inputEl.get(0));

                        html.children().animate({'opacity': 0}, 200, function() {
                            html.remove();

                            if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                                plusInput.show();
                        });
                    }
                },
                dragDrop: {
                    container: '.fileuploader-thumbnails-input'
                },
                afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    plusInput.on('click', function() {
                        api.open();
                    });

                    api.getOptions().dragDrop.container = plusInput;
                },


            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                ajax: "/{{app()->getLocale()}}/patients/consultations/open/json",
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
                    { "data": "doctor_name" ,"title":"{{ __('site.doctor_name') }}"},
                    { "data": "patient_name" ,"title":"{{ __('site.patient_name') }}"},
                    { "data": "appointment_request_by_patient" ,"title":"{{ __('site.appointment_request') }}"},
                    { "data": "appointment_reply_by_doctor" ,"title":"{{ __('site.doctor_reply') }}"},
                    { "data": "appointment_confirm_by_patient","title":"{{ __('site.confirm_appointment') }}"},
                    { "data": "appointment_selected_by_patient" ,"title":"{{ __('site.final_appointment') }} - ({{Auth::guard('patient')->user()->timezone->name_en}})"},
                    { "data": "id" ,"title":"{{ __('site.upload_files') }}"   },
                    { "data": "id" ,"title":"{{ __('site.enter_video') }}"},
                    { "data": "status" ,"title":"{{ __('site.consultation_status') }}"},
                    { "data": "id" ,"title":"{{ __('site.final_report') }}"},
                ],
                "columnDefs": [
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            if( (row.appointment_request_by_patient==='no')  )
                                return "<a href='#' data_id=" + row.id + "  class='btn btn-info btn-sm ask_for_appointment_btn' > {{ __('site.appointment_request') }}</a>";
                            else
                                return  row.appointment_request_by_patient ;
                        },
                        "targets":3
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            if( (row.appointment_reply_by_doctor==='yes') &&  (row.appointment_confirm_by_patient==='no')  )
                                return "<a href='#' data-id=" + row.id + "  class='btn btn-info btn-sm choose_one_btn' >{{ __('site.confirm_final_appointment') }}</a>";
                            else
                                return row.appointment_confirm_by_patient ;
                        },
                        "targets":4
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            if( (row.appointment_selected_by_patient)   )
                                return "<a href='#' data_id=" + row.id + "  class='btn btn-info btn-sm upload_btn' >{{ __('site.upload_files') }}  </a>";
                            else
                                return "-" ;
                        },
                        "targets":-4
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            // if( (row.appointment_reply_by_doctor==='yes') &&  (row.appointment_confirm_by_patient==='no')  )
                            {{--                              //  return "<a href='{{url(app()->getLocale()."/patients/steps#step-5")}}'   class='btn btn-info btn-sm enter_video_btn' > دخول الفيديو</a>";--}}
                                return "<a href='{{url(app()->getLocale()."/show_video")}}/"+ row.id +"'   class='btn btn-info btn-sm enter_video_btn' >  {{ __('site.enter_video') }}</a>";
                            {{--// return "<a href='{{url(app()->getLocale()."/patients/steps#step-5")}}'   class='btn btn-info btn-sm enter_video_btn' > دخول الفيديو</a>";--}}
                            // else
                            //  return row.appointment_confirm_by_patient ;
                        },
                        "targets":-3
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return "<a href='#' data_id=" + row.id + " class='btn btn-info btn-sm report_btn' >{{ __('site.the_report') }}</a>";
                        },
                        "targets":-1
                    },


                ],
                language: {
                    url: '{{ (app()->getLocale()=="ar")?asset('all/json/Arabic.json'):asset('all/json/en.json')}}'
                }
            } );
            setInterval( function () {
                $('#example').DataTable().ajax.reload();
            }, 10000 );
        });

    </script>

    <style>
        /*.jsPanel{z-index: 100000 !important;}*/
        .jsPanel-hdr-toolbar{
            background-color: #f1f1f1;
        }

    </style>
    <script>
        $(document).ready(function(){

            $(document).on('click','.choose_one_btn',function(e){
                var consultation_id = $(this).attr("data-id");
                var panel =      jsPanel.modal.create({
                    show: 'fadeIn',
                    // container: "body",
                    //   contentSize: "auto",
                    onwindowresize: true,
                    container: '.page-content',
                    theme: 'info',
                    borderRadius: '5px',
                    //headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: '<span style="margin: 0"> {{ __('site.confirm_final_appointment') }}  </span>',
                    // headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة بوليصة الشحن  </button>'+
                    //     '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    footerToolbar: '{{ __('site.confirm_final_appointment') }} ',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.9);},
                       // height: () => { return Math.min(800, window.innerHeight*0.9);}
                        //  width:  window.innerWidth * 0.6,
                        height: window.innerHeight * 0.6
                    },
                   // contentSize: 'auto auto',
                    position: 'center 0 -50',
                    //animateIn: 'jsPanelFadeIn',
                    contentAjax: {
                        method: 'get',
                        url :  "{{url(app()->getLocale()."/patients/appointments/create-choose-one-appointment") }}/"+consultation_id,
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
            $(document).on('click','.ask_for_appointment_btn',function(e){
                e.preventDefault();
                var consultation_id = $(this).attr("data_id");
                $.ajax(
                    {
                        beforeSend: function () {
                            Swal.showLoading();
                        },
                        type: "get", // replaced from put /patients/appointments/
                        url: "{{url(app()->getLocale()."/patients/appointments/ask-for-appointment2")}}/"+consultation_id ,
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status === "true") {
                                Swal.fire({
                                    title:"{{ __('site.ask_for_appointment') }}",
                                    text: "تمت عملية  طلب موعد بنجاح ",
                                    icon: "success",
                                    position: "bottom-end",
                                    showConfirmButton:"false",
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                setTimeout(function () {
                                    Swal.close();
                                    location.reload();
                                }, 3000);

                            } else {
                                Lobibox.notify('error', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom left',
                                    size: 'mini',
                                    msg: '<h5> فشلت العملية ...</h5>'
                                });
                                Swal.close();
                            }
                        },
                        error: function (xhr) {
                            // alert(xhr)
                            // do something here because of error
                        }
                    });

            });


            $(document).on('click','.upload_btn',function(e){
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
                    headerTitle: '<span style="margin: 0">   {{ __('site.upload_files') }}  </span>',
                    // headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة  التقرير  </button>'+
                    //     '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    // footerToolbar: 'اختيار موعد',
                    panelSize: {
                      //  width: () => { return Math.min(1200, window.innerWidth*0.8);},
                      //  height: () => { return Math.min(800, window.innerHeight*0.9);}
                        //  width:  window.innerWidth * 0.6,
                        //  height: window.innerHeight * 0.6

                        width: () => { return Math.min(1200, window.innerWidth*0.9);},
                        // height: () => { return Math.min(800, window.innerHeight*0.9);}
                        //  width:  window.innerWidth * 0.6,
                        height: window.innerHeight * 0.6

                    },
                    // contentSize: 'auto auto',
                    position: 'center 0 -50',
                    //animateIn: 'jsPanelFadeIn',
                    contentAjax: {
                        method: 'get',
                        url :  "{{url(app()->getLocale()."/patients/consultations/upload-files") }}/"+consultation_id,
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
                    headerTitle: '<span style="margin: 0"> {{ __('site.final_report') }} </span>',
                    headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">{{ __('site.print') }}</button>'+
                        '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto"> {{ __('site.save_as_pdf') }} </button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    footerToolbar: ' {{ __('site.final_report') }} ',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.8);},
                        height: window.innerHeight * 0.7
                       // height: () => { return Math.min(800, window.innerHeight*0.9);}
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


        });
    </script>



@endsection
