

<!-- include common vendor scripts used in demo pages -->
<script type="text/javascript" src="{{  asset('all/node_modules/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/node_modules/popper.js/dist/umd/popper.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/node_modules/sweetalert2/dist/sweetalert2.all.js')}}"></script>


<script src="{{ asset('all/js/view-image.js')}}"></script>
<script>
    // initialize the library and done
    window.ViewImage && ViewImage.init('.zoom_it');
</script>



<script src="{{ asset('all/html5lightbox/html5lightbox.js')}}"></script>
<!-- include vendor scripts used in "Dashboard" page. see "application/views/default/pages/partials/dashboard/@vendor-scripts.hbs"
<script type="text/javascript" src="node_modules/chart.js/dist/Chart.js"></script>
<script type="text/javascript" src="node_modules/sortablejs/Sortable.js"></script>
-->

<!-- include Ace script -->
<script type="text/javascript" src="{{  asset('all/dist/js/ace.js')}}"></script>


<script type="text/javascript" src="{{  asset('all/assets/js/demo.js')}}"></script>



<script type="text/javascript" src="{{  asset('all/js/JsBarcode.all.js')}}"></script>

<script src="{{  asset('all/js/html2pdf.bundle.min.js')}}" ></script>




<!--
  <link href="summernote-0.8.16/summernote-bs4.css" rel="stylesheet">
  <script src="summernote-0.8.16/summernote-bs4.js"></script>
-->





<link rel="stylesheet" href="{{  asset('all/jspanel-4.11.2/dist/jspanel.css')}}" />
<script src="{{  asset('all/jspanel-4.11.2/dist/jspanel.js')}}"></script>
<!-- optionally load jsPanel extensions -->
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/contextmenu/jspanel.contextmenu.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/hint/jspanel.hint.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/modal/jspanel.modal.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/tooltip/jspanel.tooltip.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/dock/jspanel.dock.js')}}"></script>




{{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.css"/>--}}
{{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.js"></script>--}}

<script src="{{  asset('all/js/datatables.js')}}"></script>

<link rel="stylesheet" href="{{  asset('all/css/buttons.dataTables.min.css')}}" />

<script src="{{ asset('all/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('all/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('all/js/jszip.min.js')}}"></script>
{{--<script src="{{  asset('all/js/pdfmake.min.js')}}"></script>--}}
<script src="{{  asset('all/js/pdfmake.js')}}"></script>
<script src="{{  asset('all/js/vfs_fonts.js')}}"></script>
<script src="{{  asset('all/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('all/js/buttons.print.min.js')}}"></script>



<script src="{{  asset('all/js/mindmap.min.js')}}"></script>
<script>

    $(function(){
        $('.mindmap').mindmap();
    });

</script>



{{--@yield('script')--}}
<link rel="stylesheet" href="{{  asset('all/css/jquery-ui.css')}}" />
{{--<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"  rel = "stylesheet">--}}
{{--<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>--}}
<script src="{{  asset('all/js/jquery-ui.js')}}"></script>
{{--<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>--}}
<script>
    $(function() {
    //    var localToday = new Date();
       // localToday.setDate(tomorrow.getDate()+1); // tomorrow
        $( ".datepicker" ).datepicker(
            {
                //defaultDate: -1,
                dateFormat: 'yy-mm-dd',
               // currentText: "Now",  // Todayボタンテキストを置換
                showButtonPanel: true,
               // localToday: localToday    // This option determines the highlighted today date
            });
      //  $( "#datepicker-to" ).datepicker({ dateFormat: 'dd-mm-yy' });
    });
</script>


{{--<link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />--}}
{{--<script type="text/javascript" src="/richtexteditor/rte.js"></script>--}}
{{--<script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>--}}



{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js" type="text/javascript"></script>--}}



<!-- this is only for Ace's demo and you don't need it -->

<!-- "Dashboard" page script to enable its demo functionality -->
{{--@include('sweetalert::alert')--}}
<script src="{{ asset('all/js/sweetalert2.all.min.js')}}"></script>

@if (session()->has('swal'))
    <script>
        $(document).ready(function() {
            notification = @json(session()->pull("swal"));
            Swal.fire({
                title: notification.title,
                text: notification.message,
                icon: notification.icon,
                position: notification.position,
                showConfirmButton:notification.showConfirmButton,
                timer: 3000,
                timerProgressBar: true,
            });
            // To prevent showing the notification when on browser back  we can do:
            @php
                session()->forget('swal');
            @endphp
        });
    </script>


@endif
@include('layouts.dashboard.myjs')
