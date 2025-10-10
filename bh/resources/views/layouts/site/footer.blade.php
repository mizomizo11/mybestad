<div class="container-fluid" style="background-color: {{ $settings->primary_color }};color: #fff;padding: 15px;direction:@if(App()->getLocale() == 'ar') rtl @else ltr @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">
    <div class="container">
        <div class="row">
            <div class="col-md-6" >
                <h3 style="border-bottom: 1px solid #ff8c0b;;font-size: 22px;font-weight: normal;padding-bottom:15px;">
                        {{ __('site.contactinfo') }}
                </h3>
                <ul class="list-unstyled">
                    @if($contacts->country_ar)    <li style="padding: 10px;"><i class="fas fa-home" style="font-size:20px;"></i>{{$contacts->country_ar}} </li>@endif
                    @if($contacts->url)   <li style="padding: 10px;"><i class="fab fa-wordpress" style="font-size:20px;color:#fff"></i> {{$contacts->url}}  </li>@endif
                    @if($contacts->email1)<li style="padding: 10px; color:#fff !important;"><i class="fas fa-at" style="font-size:20px;color:#fff"></i> {{$contacts->email1}} </li>@endif
                    @if($contacts->mobile1) <li style="padding: 10px;"><i class="fas fa-mobile-alt" style="font-size:20px;color:#fff"></i> {{$contacts->mobile1}}  </li>@endif
                </ul>
                <div>
                     @if($contacts->facebook)   <a href="{{$contacts->facebook}}" target="_blank"><img src="/all/images/so_icons/facebook.png" alt="" style="width: 55px;" /></a>@endif
                     @if($contacts->twitter)   <a href="{{$contacts->twitter}}" target="_blank"><img src="/all/images/so_icons/twitter.png" alt="" style="width: 55px;" /></a>@endif
                     @if($contacts->youtube)   <a href="{{$contacts->youtube}}" target="_blank"><img src="/all/images/so_icons/youtube.png" alt="" style="width: 55px;" /></a>@endif
                     @if($contacts->linkedin)   <a href="{{$contacts->linkedin}}" target="_blank"> <img src="/all/images/so_icons/linkedin.png" alt="" style="width: 55px;" /></a>@endif
                     @if($contacts->instagram)   <a href="{{$contacts->instagram}}"   target="_blank"> <img src="/all/images/so_icons/instagram.png" alt="" style="width: 55px;" /></a>@endif
                </div>
            </div>
{{--            <div class="col-md-3" >--}}
{{--                <h3 style="border-bottom: 1px solid #ff8c0b;;font-size: 22px;font-weight: normal;padding-bottom:15px;">--}}
{{--                    {{ __('site.about_us') }}--}}
{{--                </h3>--}}
{{--                <div  >--}}
{{--                 <img   src="{{asset(Config::get('app.upload'))}}/{{ $settings->{'logo_'.app()->getLocale()} }}"     style='width:64px;height:64px;margin:2px;border-radius: 50px;' />--}}
{{--                   &nbsp {{$contacts->{("info_").app()->getLocale()} }}--}}
{{--                </div>--}}
{{--            </div>--}}
           <div class="col-md-6" >
                <h3 style="border-bottom: 1px solid #ff8c0b;;font-size: 22px;font-weight: normal;padding-bottom:15px;color:#fff">
                    {{ __('site.last_services') }}
                </h3>
                @foreach ($last_services as $service)
                    <img class="img-thumbnail" src="{{asset(Config::get('app.upload'))}}/{{$service->image}}"  alt="" style='width:120px;height:120px;margin:2px'/>
                @endforeach
            </div>
        </div>
        <div class="row" style="text-align: center;padding: 5px;color:#fff;border-top: 1px solid #fff">
            <div class="col-md-12">
               <a href="{{url(app()->getLocale()."/terms-and-conditions")}}" target="_blank" style="color: #fff;margin: 0 10px">   {{ __('site.terms_and_conditions') }}</a>
                <a href="{{url(app()->getLocale()."/privacy-policy")}}" target="_blank" style="color: #fff;margin: 0 10px"> {{ __('site.privacy_policy') }}   </a>
                <a href="{{url(app()->getLocale()."/refund-policy")}}" target="_blank" style="color: #fff;margin: 0 10px">    {{ __('site.refund_policy') }} </a>
            </div>
        </div>
        <div class="row" style="text-align: center;padding: 0;color:#fff">
            <div class="col-md-12">
                Copyright &copy; 2024 askourdoctor <span>Design by : <a href="https://www.askourdoctor.com/" target="_blank" style="color: #fff;">askourdoctor.com</a></span>
            </div>
        </div>
    </div>
</div>

<!-- include common vendor scripts used in demo pages -->
<script type="text/javascript" src="{{  asset('all/node_modules/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/node_modules/popper.js/dist/umd/popper.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/node_modules/sweetalert2/dist/sweetalert2.all.js')}}"></script>

<!-- include Ace script -->
<script type="text/javascript" src="{{  asset('all/dist/js/ace.js')}}"></script>
<script type="text/javascript" src="{{  asset('all/assets/js/demo.js')}}"></script>

<link rel="stylesheet" href="{{  asset('all/jspanel-4.11.2/dist/jspanel.css')}}" />
<script src="{{  asset('all/jspanel-4.11.2/dist/jspanel.js')}}"></script>
<!-- optionally load jsPanel extensions -->
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/contextmenu/jspanel.contextmenu.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/hint/jspanel.hint.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/modal/jspanel.modal.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/tooltip/jspanel.tooltip.js')}}"></script>
<script src="{{  asset('all/jspanel-4.11.2/dist/extensions/dock/jspanel.dock.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{  asset('all/css/datatables.css')}}" />
<script  src="{{ asset('all/js/datatables.js')}} "></script>


<script src="{{ asset('all/js/view-image.js')}}"></script>
<script>
    // initialize the library and done
    window.ViewImage && ViewImage.init('.zoom_it');
</script>


<script src="{{ asset('all/js/html2pdf.bundle.min.js') }}"></script>



<link href="{{  asset('all/css/smart_wizard_all.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{  asset('all/js/jquery.smartWizard.min.js')}}" type="text/javascript"></script>

<script src="{{ asset('all/js/jquery.fileuploader.min.js')}}"></script>
<script>var exports = {};</script>
{{--<script>var exports = {};</script>--}}


{{--<script src="{{ asset('all/js/jquery.fileuploader.min.js')}}"></script>--}}
{{--<script>var exports = {};</script>--}}

<script src="{{ asset('all/js/jquery.simple-dtpicker.js')}}"></script>
<script>
    $(document).ready(function() {
        $('*[name=date]').appendDtpicker();



        $(document).on('click','.read_btn',function(e){
           // e.preventDefault();

            var note_id = $(this).attr("note_id");
           // alert(note_id);
            $.ajax(
                {
                    beforeSend: function () {
                        Swal.showLoading();
                    },
                    type: "get", // replaced from put /patients/appointments/
                    url: "{{url(app()->getLocale()."/notifications/update")}}/"+note_id ,
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false, // NEEDED, DON'T OMIT THIS
                    dataType: 'json',
                    success: function (data) {
                       // console.log(data);
                        if (data.status === "true") {
                            // Swal.fire({
                            //     title:"طلب موعد",
                            //     text: "تمت عملية  طلب موعد بنجاح ",
                            //     icon: "success",
                            //     position: "bottom-end",
                            //     showConfirmButton:"false",
                            //     timer: 3000,
                            //     timerProgressBar: true,
                            // });
                            setTimeout(function () {
                                Swal.close();
                                location.reload();
                            }, 3000);

                        } else {
                            // Lobibox.notify('error', {
                            //     continueDelayOnInactiveTab: true,
                            //     position: 'bottom left',
                            //     size: 'mini',
                            //     msg: '<h5> فشلت العملية ...</h5>'
                            // });
                            Swal.close();
                        }
                    },
                    // error: function (xhr) {
                    //     // alert(xhr)
                    //     // do something here because of error
                    // }
                });

        });


    });
</script>



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
                timer: notification.time,
                timerProgressBar: true,
            });
            // To prevent showing the notification when on browser back  we can do:
            @php
                session()->forget('swal');
            @endphp


        });
    </script>
@endif
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
<script type="text/javascript" src="{{ asset('all/node_modules/select2/dist/js/select2.js') }}"></script>
<script>
    $(document).ready(function() {

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            // const select2Default = {
            //     dir: "ltr"
            // };
            $('.js-example-basic-single').select2({
                dir: "ltr"
            });
        });
        // const select2Default = {
        //     dir: "ltr"
        // };
        //
        // $("select:visible").select2(select2Default);

    });
</script>
{{--<script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.3.31/rtc-js-prebuilt.js"></script>--}}
@yield('javascripts')
