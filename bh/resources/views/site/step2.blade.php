
@if(@!$consultation->appointment->appointment1)
    <div class="row" >
        <div class="col-md-12" style="text-align: center !important;">
            <form id="form1"    >
                @csrf
                <input type="hidden" name="doctor_id" id="doctor_id" value="{{session("the_doctor_id")}}">
                @if($consultation)
                    <h4>     {{ __('site.ask_for_appointment_was_done') }}     </h4>
                    <h5> {{ __('site.within_24_hours_the_doctor_will_send_three_appointments_at_least_to_select_one_of_them') }}    </h5>
                @else
                    <button data_id="{{session("the_consultation_id")}}" class="btn btn-lg btn-light-primary font-bolder letter-spacing-1 mb-2px" id="ask_for_appointment_btn">   {{ __('site.ask_for_appointment') }}</button>
                @endif
{{--                <h6  style="color: #0f9bc0;margin: 10px"> {{ __('site.the_doctor_will_reply_within_24_hours') }}      </h6>--}}


            </form>
            <script>
                $(document).ready(function() {
                    $("#ask_for_appointment_btn").click(function (e) {
                        e.preventDefault();
                      //  var consultation_id = $(this).attr("data-id");
                        var formData = new FormData($("#form1")[0]);
                        formData.append('_token', '{{ csrf_token() }}');
                        $.ajax(
                            {
                                beforeSend: function () {
                                    Swal.showLoading();
                                },
                                type: "post", // replaced from put /patients/appointments/
                                url: "{{url(app()->getLocale()."/patients/appointments/ask-for-appointment")}}",
                                data: formData,
                                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                                processData: false, // NEEDED, DON'T OMIT THIS
                                dataType: 'json',
                                success: function (data) {
                                    console.log(data);
                                    if (data.status === "true") {
                                        Swal.fire({
                                            title:"{{ __('site.ask_for_appointment') }} ",
                                            text: "{{ __('site.successfully') }} ",
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
                });
            </script>
        </div>
    </div>
@else
    <div class="row" >
        <div class="col-md-12" style="text-align: center !important;">
            <h4>  {{ __('site.the_appointment_was_requested_before') }}     </h4>


            <h5>    {{ __('site.the_doctor_has_determine_appointments_to_choose_one') }}   </h5>
            <a id="continue_btn" class="btn btn-smd btn-light-info col-md-2 font-bolder letter-spacing-1 mb-2px">{{ __('site.continue') }}</a>
            <script>
                $(document).ready(function () {
                    $("#continue_btn").click(function (e) {
                        $('#smartwizard').smartWizard("next");
                    });

                });
            </script>
        </div>
    </div>
@endif
