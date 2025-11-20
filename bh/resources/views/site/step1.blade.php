@if(session()->get('the_consultation_id'))
    <div class='row' style="">
        <div class="col-md-12" style="margin: auto;text-align: center;">
            <h4>   {{ __('site.payment_for_this_consultation_is_completed_before') }}  </h4>
            <h4>  {{ __('site.this_consultation_is_still_open') }}</h4>
            <a id="continue_btn2"
               class="btn btn-smd btn-light-info col-md-2 font-bolder letter-spacing-1 mb-2px">{{ __('site.continue') }}</a>
        </div>
    </div>
@else
    <div class='row' style="padding:10px 20px">
        <div class="col-md-12">
            <h1 class="" style="text-align: center">
                {{ __('site.make_payment') }}
            </h1>
            <form method="post" action="{{url(app()->getLocale()."/stripe/create-checkout-session")}}" enctype="multipart/form-data"
                  style="text-align: center">
                @csrf
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <h3 style="text-align: center">[ {{ __('site.consultation_cost') }} - {{session("the_specialty_price")}}
                    $ ]</h3>
                <div class="row" style="padding: 20px;">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-2">
                        <label style="font-weight: bold;"> {{ __('site.coupon_number') }} ( {{ __('site.if_existed') }}
                            ) </label>
                    </div>
                    <div class="col-md-3">
                        {{--                                                <input type="number" name="coupon_number" value="" id="name" class="form-control form-control-md" style="direction: ltr;text-align: left" required="">--}}
                        <div class="input-group">
                            <input type="text" name="number" id="number"
                                   class="form-control form-control-md" inputmode="text">
                            <a href="" class="input-group-prepend" id="coupon_number_btn" style="cursor: hand !important;">
                                <span class="input-group-text" style="cursor: hand !important;"s>{{ __('site.coupon_test') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>

                </div>

                <div class='row' style="">
                    <div class='col-sm-6' style="text-align: center;margin:auto;">
                        <div class="alert bgc-info-l3 brc-info-m3 border-1 border-l-4 my_panel" role="alert" style="display: none">
                            <span id="my_number_div">         {{ __('site.coupon_number') }} :   <span class="text-info-d1 text-140 text-600 opacity-1" id="my_number"></span><br></span>
                            <span id="my_value_div">    {{ __('site.coupon_value') }} :  <span class="text-info-d1 text-140 text-600 opacity-1" id="my_value"></span><br></span>
                            <span class="text-info-d1 text-140 text-600 opacity-1" id="message"></span><br>
                       </div>

                    </div>
                </div>
                {{--                                        <a href="{{ route('make.payment') }}" class="btn btn-success btn-md  col-md-4"--}}
                {{--                                           style="margin: auto">Pay with PayPal </a>--}}
                <div class='row' style="">
                    <div class='col-sm-12' style="text-align: center;margin:auto;">
                        <button class="btn btn-sm btn-success " name="Submit" type="Submit" style="width: 200px;">Pay Now</button>
                        <button class="btn btn-sm btn-success " name="Submit" type="Submit" style="width: 200px;" formmethod="GET"
                            formaction="{{url(app()->getLocale()."/paypal/handle-payment")}}">PayPal</button>
                    </div>
                </div>




                {{--                                @endif--}}

            </form>

            <div class="row">
                <div class="col-md-12 " style="text-align: center;margin-top: 20px">
                    <!--<p style="color: #edafc9">-->
                    <!--    {{ __('site.payment_now_is_just_by_paypal_and_soon_will_be_active_on_other_ways') }}-->
                    <!--</p>-->
                    @if( Auth::guard('patient')->user()->free_payment=='yes')
                        <p class="col-md-6"
                           style="text-align: center;direction: ltr;background-color: #edafc9;margin: auto">
                            <br>
                            <a href="#" id="payment_testing_btn" class="btn btn-success btn-lg  col-md-6"
                               style="margin: auto;margin-bottom: 20px">
                                الدفع لاغراض الاختبار </a>

                        </p>
                    @endif
                </div>
            </div>


        </div>
        @endif


        <script>
            $(document).ready(function () {
                $("#continue_btn2").click(function (e) {
                    $('#smartwizard').smartWizard("next");


                });


                $("#coupon_number_btn").click(function (e) {
                    e.preventDefault();
                    var number = $("#number").val();


                    if(number==="")
                    {
                        $("#my_number_div").css("display","none");
                        $("#my_value_div").css("display","none");
                        $(".my_panel").css("display","block");
                        $("#message").html("{{ __('site.please_fill_coupon_number') }}");

                    }

                  //  alert(number);
                    $.ajax(
                        {
                            // beforeSend: function () {
                            //     Swal.showLoading();
                            // },
                            type: "get", // replaced from put
                            url:"{{url(app()->getLocale()."/coupon/test")}}/"+number ,
                            // data: form2Data,
                            data: {
                                {{--'_token': '{{csrf_token()}}',--}}
                                'number': number // method and token not needed in data
                            },
                            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                            processData: false, // NEEDED, DON'T OMIT THIS
                            dataType: 'json',
                            success: function (data) {
                                    console.log(data);

                                if (data.status === "used") {
                                    $("#my_number_div").css("display","none");
                                    $("#my_value_div").css("display","none");
                                    $(".my_panel").css("display","block");
                                    $("#message").html(data.message);
                                    Swal.fire({
                                        title: "{{ __('site.coupon') }}",
                                        text: data.message,
                                        icon: "success",
                                        position: "bottom-end",
                                        showConfirmButton: "false",
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });
                                    setTimeout(function () {
                                        Swal.close();
                                    }, 2000);
                                   // Swal.close();
                                } else if((data.status === "true")) {
                                    $(".my_panel").css("display","block");
                                    $("#my_number_div").css("display","block");
                                    $("#my_value_div").css("display","block");
                                    $("#my_number").html(data.number);
                                    $("#my_value").html(data.value);
                                    $("#message").html(data.message);
                                    Swal.fire({
                                        title: "{{ __('site.coupon') }}",
                                        text: data.message,
                                        icon: "success",
                                        position: "bottom-end",
                                        showConfirmButton: "false",
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });
                                    setTimeout(function () {
                                        Swal.close();
                                    }, 2000);
                                   // Swal.close();
                                }
                                else if((data.status === "false")) {
                                    $("#my_number_div").css("display","none");
                                    $("#my_value_div").css("display","none");
                                    $(".my_panel").css("display","block");
                                    $("#message").html(data.message);
                                 //   Swal.close();
                                    setTimeout(function () {
                                        Swal.close();
                                    }, 2000);
                                }

                            },
                            error: function (xhr) {
                                 console.log(xhr)
                                // do something here because of error
                            }
                        });



                });

                $("#payment_testing_btn").click(function (e) {
                    e.preventDefault();
                    $agreement = $('input[name="agreement"]:checked').val();
                    //  alert($confirm);
                    var form2Data = new FormData($("#form1")[0]);
                    form2Data.append('_token', '{{ csrf_token() }}');
                    $.ajax(
                        {
                            // beforeSend: function () {
                            //     Swal.showLoading();
                            // },
                            type: "get", // replaced from put
                           url: "/paypal/payment-testing",
                           //url:"{{url(app()->getLocale().'/paypal/payment-testing')}}",
                            {{--// url:"{{url(app()->getLocale()."/consultations/update-payment")}}",--}}
                            data: form2Data,
                            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                            processData: false, // NEEDED, DON'T OMIT THIS
                            dataType: 'json',
                            success: function (data) {
                                //    console.log(data);
                                if (data.status === "true") {
                                    Swal.fire({
                                        title: "{{ __('site.payment') }}",
                                        text: "  {{ __('site.payment_is_done') }}",
                                        icon: "success",
                                        position: "bottom-end",
                                        showConfirmButton: "false",
                                        timer: 3000,
                                        timerProgressBar: true,
                                    });
                                    // Lobibox.notify('success', {
                                    //     continueDelayOnInactiveTab: true,
                                    //     position: 'bottom left',
                                    //     size: 'mini',
                                    //     msg: '<h5>تمت العملية بنجاااح</h5>'
                                    // });
                                    //   window.reload();
                                    setTimeout(function () {
                                        Swal.close();
                                        setTimeout(function () {
                                            $('#smartwizard').data('smartWizard')._showStep(1); // go to step 3....
                                        }, 50);
                                        {{--// var url = "{{url(app()->getLocale()."/patients/steps#step-3")}}";--}}
                                        //  $(location).attr('href',url);
                                        {{--location({{url(app()->getLocale()."/")}});--}}

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


            });
        </script>
