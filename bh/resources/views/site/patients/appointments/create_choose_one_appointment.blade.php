<?php
use Carbon\Carbon;
?>
<fieldset
    style="margin-top: 20px;
        direction: @if(App::getLocale() == 'ar') rtl @else ltr @endif;text-align : @if(App::getLocale() == 'ar') right @else left @endif;
        border: 1px solid #dfdfdf;border-radius: 5px;">
    <legend
        style="width: auto;margin:0 10px;padding: 0px 10px;font-size: 18px;border: 1px solid #dfdfdf;background-color: #fff">
        {{ __('site.confirm_final_appointment') }}
    </legend>
    <form id="form111">
        <input type="hidden" name="patient_id" id="patient_id" value=" {{session("patient_id")}}"><br>
        <input type="hidden" name="doctor_id" id="doctor_id" value="{{session("the_doctor_id")}}">
        <div class='container'>
            <div class='row' style="">
                <div class='col-md-12' style="text-align: center">
                    <input type="hidden" name="appointment_id" id="" value="{{$consultation->appointment->id}}"><br>
                    <div class=" btn-group-toggle " style="width: 100% !important;" data-toggle="buttons">
                    @if(@$consultation->appointment->appointment1)
                        <label
                            class="d-style btn btn-md col-md-2   radius-0 @if($consultation->appointment->appointment1_confirm == 'yes') active @endif ">
                            <input type="radio" name="confirm" value="1" autocomplete="off"
                                   @if($consultation->appointment->appointment1_confirm == 'yes') checked
                                   @endif  style="display: none">


                            <div class="d-active"
                                 style="border:1px solid #9cdbf7;background-color: #DAF1FF;padding: 2px;text-align: center">
                                    {{
                                    $consultation->app1
                                     }}
                            </div>
                            <div class="d-n-active"
                                 style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                {{
                                    $consultation->app1
                                }}
                            </div>
                        </label>
                    @endif
                    @if(@$consultation->appointment->appointment2)
                        <label
                            class="d-style btn btn-md col-md-2   radius-0 @if($consultation->appointment->appointment2_confirm=="yes") active @endif "
                            style="">
                            <input type="radio" name="confirm" value="2" id="" autocomplete="off"
                                   @if($consultation->appointment->appointment2_confirm == 'yes') checked
                                   @endif   style="display: none">
                            <div class="d-active"
                                 style="border:1px solid #9cdbf7;background-color: #DAF1FF;padding: 2px;text-align: center">
                                {{
                                     $consultation->app2
                                }}
                            </div>
                            <div class="d-n-active"
                                 style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                {{
                                       $consultation->app2
                                }}
                            </div>
                        </label>
                    @endif
                    @if(@$consultation->appointment->appointment3)
                        <label
                            class="d-style btn btn-md col-md-2   radius-0  @if(@$consultation->appointment->appointment3_confirm=="yes") active @endif"
                            style="">
                            <input type="radio" name="confirm" value="3" id="" autocomplete="off"
                                   @if($consultation->appointment->appointment3_confirm == 'yes') checked
                                   @endif   style="display: none">
                            <div class="d-active"
                                 style="border:1px solid #9cdbf7;background-color: #DAF1FF;padding: 2px;text-align: center">
                                {{
                                        $consultation->app3
                                 }}
                            </div>
                            <div class="d-n-active"
                                 style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                {{
                                       $consultation->app3
                                }}
                            </div>
                        </label>
                    @endif
                    @if(@$consultation->appointment->appointment4)
                        <label
                            class="d-style btn btn-md col-md-2   radius-0 @if(@$consultation->appointment->appointment4_confirm=="yes") active @endif "
                            style="">
                            <input type="radio" name="confirm" value="4" id="" autocomplete="off"
                                   @if($consultation->appointment->appointment4_confirm == 'yes') checked
                                   @endif    style="display: none">
                            <div class="d-active"
                                 style="border:1px solid #9cdbf7;background-color: #DAF1FF;padding: 2px;text-align: center">
                                {{
                                        $consultation->app4
                                 }}
                            </div>
                            <div class="d-n-active"
                                 style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                {{
                                       $consultation->app4
                                }}
                            </div>
                        </label>
                    @endif
                    @if(@$consultation->appointment->appointment5)
                        <label
                            class="d-style btn btn-md col-md-2   radius-0 @if(@$consultation->appointment->appointment5_confirm=="yes") active @endif "
                            style="">
                            <input type="radio" name="confirm" value="5" id="" autocomplete="off"
                                   @if($consultation->appointment->appointment5_confirm == 'yes') checked
                                   @endif  style="display: none">
                            <div class="d-active"
                                 style="border:1px solid #9cdbf7;background-color: #DAF1FF;padding: 2px;text-align: center">
                                {{
                                       $consultation->app5
                                }}
                            </div>
                            <div class="d-n-active"
                                 style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                {{
                                        $consultation->app5
                                 }}

                            </div>
                        </label>
                    @endif


                    <div class="col-md-3" style="padding: 5px;margin: auto">
                        <span style="font-size: 12px">

                        [{{ __('site.timezone') }} : {{Auth::guard('patient')->user()->timezone->name_ar}} {{Auth::guard('patient')->user()->timezone->utc_offset}}]

                        </span>
                        <a class="btn btn-info btn-sm " id="confirm_appointment_btn2"
                           style="color: #fff;margin: auto;padding: 5px;font-family: font2"> {{ __('site.confirm_final_appointment') }} </a>

{{--                        تثبيت الموعد بشكل نهائي--}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $("#confirm_appointment_btn2").click(function (e) {
                e.preventDefault();

                $confirm = $('input[name="confirm"]:checked').val();
                // alert($confirm);
                var form2Data = new FormData($("#form111")[0]);
                form2Data.append('_token', '{{ csrf_token() }}');

                $.ajax(
                    {
                        beforeSend: function () {
                            Swal.showLoading();
                        },
                        type: "post", // replaced from put
                        url: "{{url(app()->getLocale()."/patients/appointments/store-choose-one-appointment")}}",
                        data: form2Data,
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        dataType: 'json',
                        success: function (data) {
                              console.log(data);
                            if (data.status === "true") {
                                Swal.fire({
                                    title: "{{ __('site.confirm_final_appointment') }}",
                                    text: "{{ __('site.successfully') }} ",
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
                                    location.reload();
                                    {{--//  window.location.reload = '/{{App::getLocale()}}/steps/{{session("the_doctor")->id}}#step-3';--}}
                                }, 2000);

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
                            console.log(xhr);
                            // alert(xhr)
                            // do something here because of error
                        }
                    });

            });


        });
    </script>


</fieldset>
