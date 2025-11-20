<script type="text/javascript">
    function Printdiv()
    {
        data=$(".printid").html();
        var mywindow = window.open('', '',);
        mywindow.document.write('<html style="direction: rtl !important;text-align: right !important;"><head><title>Final Report</title>');
        mywindow.document.write('</head><body style="padding:0px;margin:0px">');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        setTimeout(function() {
            mywindow.print();
            mywindow.close();
        }, 250);
        return false;

    }
    $('#saveWaybillPdfbtn').click( function ()
    {
        const elementToPrint = document.getElementById('printid1');
        const opt = {
            margin:       0,
            filename:     'final_report.pdf',
            image:        { type: 'png' },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'p' }
        };
        html2pdf(elementToPrint, opt);
    });

</script>


<div class="container" style="direction: rtl;text-align: right">
<div  class="row printid" id="printid1" style="max-width: 1000px;margin:auto;border : 0 solid #ccc;padding: 0;display:table;direction:@if(App()->getLocale() == 'ar') rtl @else ltr !important;  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left !important; @endif">
    <div class="col-md-12"  style="width: 1000px;margin-top: 30px">

        <form id="form6"   style="max-width: 800px;margin: auto;border: 1px solid #e3e3e3;padding: 10px; box-shadow: 0 0 5px 2px #d3d3d3;" >
            @csrf
            <input type="hidden" name="patient_id" id="patient_id"  value="{{@$consultation->patient->id}}"><br>
            <input type="hidden" name="doctor_id" id="doctor_id" value="{{@$consultation->doctor->id}}">
            <input type="hidden" name="consultation_id"  value="{{@$consultation->id}}">
            <div class="col-md-12" style="text-align: center">
                <img  src="{{asset(Config::get('app.upload'))}}/{{ $settings->{'logo_'.app()->getLocale()} }}" style="width: 140px;height:50px">
            </div>
            <h5 class="font-bold" style="color: #0f9bc0;margin: 10px;text-align: center">{{ __('site.report_for_medical_consultation_through_internet') }}  </h5>
            <div class="row" >
                <div class="col-md-12 font-bold" >
                    {{ __('site.patient_name') }}
                    :
                    {{$consultation->patient->name}}


                </div>
            </div>
            <div class="row" >
                <div class="col-md-6 font-bold" >
                    {{ __('site.consultation_date') }} :
                    {{now()->format('Y-m-d H:i:s')}}
                </div>
            </div>
            <div class="row" style="margin-top: 30px" >
                <div class="col-md-6 font-bold" >
                    <span>   {{ __('site.consultation_summary') }}:</span>
                </div>
            </div>
            <div style="padding:0 20px">
                <div class="row" >
                    <div class="col-md-12" >
                        {{ __('site.symptoms') }}
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        @if($consultation->status=="open")
                            <textarea id="symptoms" name="symptoms" class="form-control" style="width: 100%">
                                {{$consultation->symptoms}}
                            </textarea>
                        @else
                            <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                                {{$consultation->symptoms}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >

                        {{ __('site.diagnosis') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
{{--                        <textarea id="diagnosis" name="diagnosis" class="form-control" style="width: 100%"> {{$consultation->diagnosis}}</textarea>--}}
                        @if($consultation->status=="open")
                            <textarea id="diagnosis" name="diagnosis" class="form-control" style="width: 100%">
                                {{$consultation->diagnosis}}
                            </textarea>
                        @else
                            <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                                {{$consultation->diagnosis}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        {{ __('site.recommendations') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
{{--                        <textarea id="recommendations"  name="recommendations" class="form-control" style="width: 100%">{{$consultation->recommendations}}</textarea>--}}
                        @if($consultation->status=="open")
                            <textarea id="recommendations" name="recommendations" class="form-control" style="width: 100%">
                                {{$consultation->recommendations}}
                            </textarea>
                        @else
                            <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                                {{$consultation->recommendations}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        {{ __('site.additional_instructions') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
{{--                        <textarea id="additional_instructions" name="additional_instructions" class="form-control" style="width: 100%">{{$consultation->additional_instructions}}</textarea>--}}
                        @if($consultation->status=="open")
                            <textarea id="additional_instructions" name="additional_instructions" class="form-control" style="width: 100%">
                                {{$consultation->additional_instructions}}
                            </textarea>
                        @else
                            <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                                {{$consultation->additional_instructions}}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        {{ __('site.referrals') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
{{--                        <textarea id="referrals" name="referrals" class="form-control" style="width: 100%">{{$consultation->referrals}}</textarea>--}}
                        @if($consultation->status=="open")
                            <textarea id="referrals" name="referrals" class="form-control" style="width: 100%">
                                {{$consultation->referrals}}
                            </textarea>
                        @else
                            <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                                {{$consultation->referrals}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        {{ __('site.following_plan') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
{{--                        <textarea id="following_plan" name="following_plan" class="form-control" style="width: 100%">{{$consultation->following_plan}}</textarea>--}}
                        @if($consultation->status=="open")
                            <textarea id="following_plan" name="following_plan" class="form-control" style="width: 100%">
                                {{$consultation->following_plan}}
                            </textarea>
                        @else
                            <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                                {{$consultation->following_plan}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px" >
                <div class="col-md-6" >
                    {{ __('site.notes') }}:
                </div>
            </div>
            <div class="row" style="margin-top: 10px" >
                <div class="col-md-12" style="">
{{--                    <textarea id="notes" name="notes" class="form-control" style="width: 100%">{{$consultation->notes}}</textarea>--}}
                    @if($consultation->status=="open")
                        <textarea id="notes" name="notes" class="form-control" style="width: 100%">
                                {{$consultation->notes}}
                            </textarea>
                    @else
                        <div id="symptoms"  class="" style="width: 100%;background-color: #f8f8f8;height: 50px">
                            {{$consultation->notes}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row"  style="margin-top: 30px">
                <div class="col-md-6" >
                    {{ __('site.doctor_name') }}:
                    :
                    {{$consultation->doctor->name}}


                </div>
                <div class="col-md-6" style="text-align: center !important;">
                </div>
            </div>

            <div class="row" >
                <div class="col-md-6" >
                    {{ __('site.specialty') }}:
                    :
                    {{$specialty->{"name_".app()->getLocale()} }}
{{--                    {{$consultation->specialty->name}}--}}
{{--                    {{session("the_specialty_name")}}--}}

                </div>

            </div>
            @if(@Auth::guard('doctor')->user()->id )
                @if($consultation->status=="open")
                <div class="row" >
                    <div class="col-md-12" style="text-align: center" >
                        <a class="btn btn-info btn-md " id="save_consultation_btn" style="color: #fff;margin: auto">{{ __('site.send') }} </a>
                    </div>
                </div>
                @endif
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
                                        msg: '<h5>{{ __('site.the_process_was_succeeded') }} </h5>'
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

</div>
