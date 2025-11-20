@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url('/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة الشحنات - كل الشحنات  </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')



        <table id="example"  class="display nowrap" style="width:100%">
        <thead>
        <tr style="background-color: #57b5da;color:#fff">
            <td data-priority="1"></td>

            <td style="background-color: #ffc107;" ></td>
            <td style="background-color: #ffc107;" ></td>
            <td style="background-color: #ffc107;"></td>

            <td style="background-color: #d94939;"></td>
            <td style="background-color: #d94939;"></td>
            <td style="background-color: #d94939;"></td>

            <td style="background-color: #28a745;" data-priority="2"></td>
            <td style="background-color: #28a745;"></td>

            <td style="background-color: #db6296;"></td>

            <td style=""> </td>
            {{--            <td style=""> </td>--}}
            <td style="" data-priority="3"> </td>
            <td style="" data-priority="4"> </td>
            <td style="" data-priority="5"> </td>
            <td style="" data-priority="6"> </td>
            <td style="" data-priority="7"> </td>
        </tr>

        </thead>
            <tbody></tbody>
            <tfoot>
            <tr style="background-color: #57b5da;color:#fff">
                <td data-priority="1"></td>

                <td style="background-color: #ffc107;" ></td>
                <td style="background-color: #ffc107;" ></td>
                <td style="background-color: #ffc107;"></td>

                <td style="background-color: #d94939;"></td>
                <td style="background-color: #d94939;"></td>
                <td style="background-color: #d94939;"></td>

                <td style="background-color: #28a745;" data-priority="2"></td>
                <td style="background-color: #28a745;"></td>

                <td style="background-color: #db6296;"></td>

                <td style=""> </td>
                {{--            <td style=""> </td>--}}
                <td style="" data-priority="3"> </td>
                <td style="" data-priority="4"> </td>
                <td style="" data-priority="5"> </td>
                <td style="" data-priority="6"> </td>
                <td style="" data-priority="7"> </td>
            </tr>

                </tfoot>
        </table>



    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                lengthMenu: [
                    [10, 25, 50,100,500, 100000],
                    [10, 25, 50,100,500, "ALL"],
                ],
                "order": [[ 0, "desc" ]],
                "serverSide": true,
                "processing": true,
                "responsive":true,
                "stateSave":true,
                "ajax":{

                    "url": "{{ route('all_in_json') }}",
                    "dataType": "json",
                    "type": "get",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                fnServerParams: function(data) {
                    data['order'].forEach(function(items, index) {
                        data['order'][index]['column'] = data['columns'][items.column]['data'];
                       // data['order'][index]['dir'] =    data['columns'][items.dir]['data'];
                    });
                },
                "dom": '<"top"lBf>rt<"bottom"ip>',
                    "buttons": [
                        'copy',
                        {
                            extend: 'excel',
                            "text": "تصدير الى اكسل",
                            title: 'الشحنات '
                        },


                    ],
                "columns": [

                    { "data": "id" ,"title":"ID"},
                    { "data": "user_name" ,"title":"المستخدم"},
                    { "data": "barcode" ,"title":"باركود"},
                    { "data": "created_at" ,"title":"التاريخ"},

                    { "data": "sender_account_number","title":"حساب المرسل" },
                    { "data": "sender_name","title":"المرسل" },
                    { "data": "sender_country_name" ,"title":"دولة المرسل"},


                    { "data": "receiver_name","title":"المستقبل" },
                    { "data": "receiver_country_name" ,"title":"دولة المستقبل"},

                    { "data": "state" ,"title":"الحالة "},

                    { "data": "bill_to" ,"title":"الحساب "},
                    // { "data": "receiver_city_name" ,"title":" التفاصيل "},


                    { "data": "id" ,"title":"تتبع الشحنة"},
                    { "data": "id" ,"title":"تحديث"},
                    { "data": "id" ,"title":"الفاتورة"},
                    { "data": "id" ,"title":"الايصال"},
                    { "data": "id" ,"title":"البوليصة"},


                ],

                "columnDefs": [


                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            // return "<a href=shipment_update_form.php?id=" + row.id + " class='btn btn-info btn-sm' > تتبع الشحنة </a>";
                            return "<a href=/dashboard/shipments/tracking/" + row.barcode + " class='btn btn-info btn-sm ' >تتبع الشحنة </a>";
                        },
                        "targets": -5
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            @if(in_array("shipments_update", session('permissions_array')) or in_array("administrator", session('permissions_array')))
                                return "<a href=/dashboard/shipments/edit/" + row.id + " class='btn btn-info btn-sm ' >تحديث</a>";
                            @else
                                return "<a href='#' class='btn btn-lighter-secondary btn-sm show_error_message ' >تحديث</a>";
                            @endif
                            // return "<a href=/dashboard/shipments/edit/" + row.id + " class='btn btn-info btn-sm ' >تحديث</a>";
                        },
                        "targets": -4
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return "<a  data-id=" + row.id + "   class='btn btn-info btn-sm tradebill_btn'  style='color:#fff'>الفاتورة</a>";
                        },
                        "targets":-3
                    },
                    {
                        "data": null,
                        "render": function ( data, type, row ) {
                            return "<a  data-id=" + row.id + "   class='btn btn-info btn-sm receipt_btn'  style='color:#fff'>الايصال</a> ";
                        },
                        "targets":-2
                    },

                    {
                        "data": null,

                        "render": function ( data, type, row ) {
                            return "<a  data-id=" + row.id + "   class='btn btn-info btn-sm waybill_btn' style='color:#fff'>البوليصة</a>";
                        },
                        "targets":-1
                    },




                ],

            createdRow: (row, data, dataIndex, cells) => {
                    //28a745


                    $(cells[1]).css('background-color', "#ffc10715");
                    $(cells[2]).css('background-color', "#ffc10715");
                    $(cells[3]).css('background-color', "#ffc10715");

                    $(cells[4]).css('background-color', "#d9493915");
                    $(cells[5]).css('background-color', "#d9493915");
                    $(cells[6]).css('background-color', "#d9493915");

                    $(cells[7]).css('background-color', "#28a74522");
                    $(cells[8]).css('background-color', "#28a74522");

                    $(cells[9]).css('background-color', "#db629622");
                    //


                    $(cells[10]).css('background-color', "#57b5da22");
                },

                language: {
                    url: '{{asset('all/json/Arabic.json')}}'
                }


            });


                        setInterval( function () {
                            $('#example').DataTable().ajax.reload(null,false);
                        }, 15000 );

        });
    </script>




    <style>
        .jsPanel{z-index: 100000 !important;}
        .jsPanel-hdr-toolbar{
            background-color: #f1f1f1;
        }
    </style>
    <script>
        $(document).ready(function(){
            $(document).on('click','.waybill_btn',function(e){

                var idd = $(this).attr("data-id");
                // alert(idd);
                var panel = jsPanel.modal.create({
                    show: 'fadeIn',
                    container: "body",
                    // container: '.page-content'
                    theme: 'info',
                    borderRadius: '5px',
                    headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: '<span style="margin: 0px;font-family:font2">بوليصة التامين</span>',
                    headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة بوليصة الشحن  </button>'+
                        '+<button id="saveWaybillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",

                    footerToolbar: 'بوليصة التامين',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.9);},
                        height: () => { return Math.min(800, window.innerHeight*0.9);}
                        //  width:  window.innerWidth * 0.6,
                        //  height: window.innerHeight * 0.8
                    },
                    position: 'center 0 -50',
                    //animateIn: 'jsPanelFadeIn',
                    contentAjax: {
                        method: 'get',
                        url :  "/dashboard/shipments/show_waybill/"+idd,
                        //data: {id:idd}, // note that data type is set with setRequestHeader()
                        // data:{"id":idd },
                        beforeSend: function() {
                            this.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

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
            $(document).on('click','.tradebill_btn',function(e){
                var idd = $(this).attr("data-id");

                var panel = jsPanel.modal.create({

                    theme: 'info',
                    borderRadius: '5px',
                    //headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: 'الفاتورة التجارية ',
                    //headerToolbar: '',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة الفاتورة </button> '+
                        '+<button id="saveTradebillPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',

                    footerToolbar: '',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.9);},
                        height: () => { return Math.min(800, window.innerHeight*0.9);}
                    },

                    position: 'center 0 -50',

                    //animateIn: 'jsPanelFadeIn',

                    contentAjax: {
                        method: 'get',
                        //url :  "ajax/shipment_show_tradebill.php",
                        url :  "/dashboard/shipments/show_tradebill/"+idd,
                        //data: "id="+idd, // note that data type is set with setRequestHeader()
                        beforeSend: function() {
                            this.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

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
            $(document).on('click','.receipt_btn',function(e){
                var idd = $(this).attr("data-id");

                var panel = jsPanel.modal.create({

                    theme: 'info',
                    borderRadius: '5px',
                    //headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: 'وصل الاستلام',
                    //headerToolbar: '',
                    headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",
                    headerToolbar: '<button  class="btn btn-xs btn-info " onclick="Printdiv()" style="margin: 0px;font-family:font2;margin:auto">طباعة الوصل </button>  '+
                        '+<button id="savereceiptPdfbtn" class="btn btn-xs btn-info " style="margin: 3px;font-family:font2;margin:auto">حفظ كملف PDF</button>  ',

                    footerToolbar: '',
                    panelSize: {
                        width: () => { return Math.min(1200, window.innerWidth*0.9);},
                        height: () => { return Math.min(800, window.innerHeight*0.9);}
                    },

                    position: 'center 0 -50',

                    //animateIn: 'jsPanelFadeIn',

                    contentAjax: {
                        method: 'get',
                        url :  "/dashboard/shipments/show_receipt/"+idd,
                        //  url :  "ajax/shipment_show_receipt.php",
                        // data: "id="+idd, // note that data type is set with setRequestHeader()
                        beforeSend: function() {
                            this.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

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





@stop
