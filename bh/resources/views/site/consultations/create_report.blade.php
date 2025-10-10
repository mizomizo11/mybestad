<div class="row" style="margin-top: 20px">
    <div class="col-md-12" style="">
        <form id="form6"   style="max-width: 800px;margin: auto;border: 1px solid #e3e3e3;padding: 10px; box-shadow: 0 0 5px 2px #d3d3d3;" >
            @csrf
            <input type="hidden" name="patient_id" id="patient_id"  value="{{$consultation->patient->id}}"><br>
            <input type="hidden" name="doctor_id" id="doctor_id" value="{{$consultation->doctor->id}}">
            <input type="hidden" name="consultation_id"  value="{{$consultation->id}}">
            <h5 class="font-bold" style="color: #0f9bc0;margin: 10px;text-align: center">تقرير استشارة طبية عبر الانترنت  </h5>
            <div class="row" >
                <div class="col-md-12 font-bold" >
                    اسم المريض
                    :
                    {{$consultation->patient->name}}
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6 font-bold" >
                    تاريخ الاستشارة :
                    {{now()->format('Y-m-d H:i:s')}}
                </div>
            </div>
            <div class="row" style="margin-top: 30px" >
                <div class="col-md-6 font-bold" >
                    <span>  ملخص الاستشارة</span>
                </div>
            </div>
            <div style="padding:0 20px">
                <div class="row" >
                    <div class="col-md-12" >
                        الاعراض والقصة المرضية
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <textarea id="symptoms" name="symptoms" class="form-control" style="width: 100%">
                            {{$consultation->symptoms}}
                        </textarea>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        التشخيص / الانطباع:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <textarea id="diagnosis" name="diagnosis" class="form-control" style="width: 100%"> {{$consultation->diagnosis}}</textarea>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        التوصيات
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <textarea id="recommendations" name="recommendations" class="form-control" style="width: 100%">{{$consultation->recommendations}}</textarea>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        تعليمات اضافية
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <textarea id="additional_instructions" name="additional_instructions" class="form-control" style="width: 100%">{{$consultation->additional_instructions}}</textarea>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        الاحالات اذا لزم الامر
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <textarea id="referrals" name="referrals" class="form-control" style="width: 100%">{{$consultation->referrals}}</textarea>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        خطة المتابعة اذا لزم الامر
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <textarea id="following_plan" name="following_plan" class="form-control" style="width: 100%">{{$consultation->following_plan}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px" >
                <div class="col-md-6" >
                    ملاحظات
                </div>
            </div>
            <div class="row" style="margin-top: 10px" >
                <div class="col-md-12" style="">
                    <textarea id="notes" name="notes" class="form-control" style="width: 100%">{{$consultation->notes}}</textarea>
                </div>
            </div>
            <div class="row"  style="margin-top: 30px">
                <div class="col-md-6" >
                    اسم الدكتور
                    :
                    {{$consultation->doctor->name}}


                </div>
                <div class="col-md-6" style="text-align: center !important;">
                </div>
            </div>

            <div class="row" >
                <div class="col-md-6" >
                    التخصص
                    :
{{--                    {{$consultation->specialty->name}}--}}
{{--                    {{session("the_specialty_name")}}--}}

                </div>

            </div>
            @if(@Auth::guard('doctor')->user()->id)
                <div class="row" >
                    <div class="col-md-12" style="text-align: center" >
                        <a class="btn btn-info btn-md " id="save_consultation_btn" style="color: #fff;margin: auto">حفظ </a>
                    </div>
                </div>
            @endif
        </form>
        <script>
            $(document).ready(function() {
                $("#save_consultation_btn").click(function (e) {
                    e.preventDefault();
                    var formData = new FormData($("#form6")[0]);
                    formData.append('_token', '{{ csrf_token() }}');
                    $.ajax(
                        {
                            beforeSend: function () {
                                Swal.showLoading();
                            },
                            type: "post", // replaced from put
                            url: "{{url(app()->getLocale()."/doctors/consultations/update-report")}}",
                            data: formData,
                            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                            processData: false, // NEEDED, DON'T OMIT THIS
                            dataType: 'json',
                            success: function (data) {
                                console.log(data);
                                if (data.status === "true") {
                                    Lobibox.notify('success', {
                                        continueDelayOnInactiveTab: true,
                                        position: 'bottom left',
                                        size: 'mini',
                                        msg: '<h5>تمت العملية بنجاااح</h5>'
                                    });
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


