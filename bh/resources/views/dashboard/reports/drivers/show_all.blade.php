@extends('layouts.dashboard.master')

@section('breadcrumb')

    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url('/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1"> التقارير</li>
                <li class="breadcrumb-item active text-grey-d1">تقرير عدد الشحنات لسائق</li>
            </ol>




        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')

    <table id="example"  class="display nowrap" style="width:100%;">
        <thead>
        <tr style="background-color: #57b5da;color:#fff">
            <td data-priority="1" ></td>
            <td class="bgcolor_yellow color_red" ></td>
            <td style="" data-priority="5"> </td>
        </tr>
        </thead>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff">
            <td data-priority="1" ></td>
            <td class="bgcolor_yellow color_red" ></td>
            <td style="" data-priority="5"> </td>
        </tfoot>
    </table>


    <script>
        $(document).ready(function() {

            $('#example').DataTable( {
                ajax: "{{route('drivers_in_json')}}",
                stateSave:true,
                responsive:true,
                "dom": '<"top"lBf>rt<"bottom"ip>',
                "buttons": [
                    'copy',
                    {
                        extend: 'excel',
                        "text": "تصدير الى اكسل",
                        title: 'الشحنات المعتمدة'
                    },
                    // {
                    //     extend: 'print',
                    //     "text": "طباعة",
                    //     "title": 'الشحنات المعتمدة'
                    // },
                    // {
                    //     "extend": "pdf",
                    //     "title": 'الشحنات المعتمدة',
                    //     "text": "تصدير الى PDF",
                    //     "filename": "shipment_in_transit",
                    //     "charset": "utf-8",
                    //     //"className": "btn btn-green",
                    //     "bom": "true",
                    //     customize: function(doc){
                    //         doc.defaultStyle.font = 'Roboto'
                    //     },
                    // },
                ],
                "order": [[ 0, "desc" ]],
                "columns": [

                    { "data": "id" ,"title":"ID"},
                    { "data": "name" ,"title":"اسم السائق "},
                    { "data": "id" ,"title":"  تقرير شحنات السائق "},

                ],
                "columnDefs": [

                    {
                        "data": null,

                        "render": function ( data, type, row ) {
                            return "<a href=\"/dashboard/reports/drivers/" + row.id + "\"  data-id=" + row.id + "   class='btn btn-info btn-sm waybill_btn' style='color:#fff'>تقرير شحنات السائق</a>";
                        },
                        "targets":-1
                    },
                ],
                createdRow: (row, data, dataIndex, cells) => {
                    $(cells[1]).css('background-color', "#ffca0815");
                    $(cells[2]).css('background-color', "#ffca0815");
                    $(cells[3]).css('background-color', "#ffca0815");
                    $(cells[4]).css('background-color', "#ffca0815");
                    $(cells[5]).css('background-color', "#ffca0815");
                },
                language: {
                    url: '{{asset('all/json/Arabic.json')}}'
                }
            } );

            setInterval( function () {
                $('#example').DataTable().ajax.reload(null,false);
            }, 5000 );


        });

    </script>


@endsection
