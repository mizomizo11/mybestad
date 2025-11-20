
@if($consultation->appointment_reply_by_doctor=="yes")

    @if ($consultation->appointment_confirm_by_patient=="no")
        <div class='row' >
            <div class='col-md-12' style="text-align: center" >
                <h4 style="text-align: center"> {{ __('site.choose_appointment') }} </h4>
                <form id="form2">
                    <input type="hidden" name="patient_id" id="patient_id" value=" {{session("patient_id")}}"><br>
                    <input type="hidden" name="doctor_id" id="doctor_id" value="{{session("the_doctor_id")}}">
                    <input type="hidden" name="appointment_id" id="" value="{{$consultation->appointment->id}}"><br>
                    <div class=" btn-group-toggle " style="width: 100% !important;margin: auto" data-toggle="buttons">
{{--                      ====  {{$consultation}}===--}}
                        @if(@$consultation->appointment->appointment1)
                            <label
                                class="d-style btn btn-md col-md-2   radius-0 @if($consultation->appointment->appointment1_confirm == 'yes') active @endif ">
                                <input type="radio" name="confirm" value="1" autocomplete="off"
                                       @if($consultation->appointment->appointment1_confirm == 'yes') checked
                                       @endif  style="display: none">
                                <div class="d-active"
                                     style="border:1px solid #9cdbf7;background-color: #DAF1FF;padding: 2px;text-align: center">
                                    {{$consultation->app1}}
                                </div>
                                <div class="d-n-active"
                                     style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                    {{$consultation->app1}}
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

                                    {{@$consultation->app2}}
                                </div>
                                <div class="d-n-active"
                                     style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                    {{@$consultation->app2}}
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
                                    {{@$consultation->app3}}
                                </div>
                                <div class="d-n-active"
                                     style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                    {{@$consultation->app3}}
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
                                    {{@$consultation->app4}}
                                </div>
                                <div class="d-n-active"
                                     style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                    {{@$consultation->app4}}
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
                                    {{@$consultation->app5}}
                                </div>
                                <div class="d-n-active"
                                     style="border:1px solid #96B6C5;padding: 2px;text-align: center">
                                    {{@$consultation->app5}}
                                </div>
                            </label>
                        @endif
                        <div class='row' style="text-align: center">
                            <a class="btn btn-info btn-sm col-md-2" id="confirm_appointment_btn"
                               style="color: #fff;margin: auto;padding: 5px">  {{ __('site.confirm_appointment') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class='row' style="text-align: center;">
            <div class='col-md-12'>
                <h4>{{ __('site.final_appointment') }}  </h4>
{{--                /{{ __('site.according_to_greenwich_mean_time') }}--}}
                <h2 style="color: red;margin: 20px 0">{{$consultation->final_appointment}}<span style="font-size:12px; "> [  {{Auth::guard('patient')->user()->timezone->name_en}} {{ __('site.timezone') }}  ] </span> </h2>
                <h6 style=";margin: 10px">

                    {{ __('site.3') }}
                    </h6>
            </div>

    @endif
@else

                <div class='row' style="text-align: center;">
                    <div class='col-md-12'>
                        <h4>{{ __('site.the_doctor_doesnt_reply_until_now') }}  </h4>

                    </div>
@endif


                    <script>
                        $(document).ready(function () {
                            $("#confirm_appointment_btn").click(function (e) {
                                e.preventDefault();

                                $confirm = $('input[name="confirm"]:checked').val();
                                // alert($confirm);
                                var form2Data = new FormData($("#form2")[0]);
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
                                            //    console.log(data);
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
                                            // alert(xhr)
                                            // do something here because of error
                                        }
                                    });

                            });


                        });
                    </script>


</div>
        </div>
