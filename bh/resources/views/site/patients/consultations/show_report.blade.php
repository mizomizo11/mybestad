
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

<div class="container" style="">
<div class="row printid" id="printid1" style="max-width: 1000px;margin:auto;border : 0 solid #ccc;padding: 0;display:table;direction:@if(App()->getLocale() == 'ar') rtl @else ltr !important;  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left !important; @endif">
    <div class="col-md-12" style="width: 1000px;margin-top: 30px">





        <div class="col-md-12" style="text-align: center">
            <img  src="{{asset(Config::get('app.upload'))}}/{{ $settings->{'logo_'.app()->getLocale()} }}" style="width: 140px;height:50px">
        </div>
            <h5 class="font-bold" style="color: #0f9bc0;margin: 10px;text-align: center">  {{ __('site.report_for_medical_consultation_through_internet') }} </h5>
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
                    <span>      {{ __('site.consultation_summary') }}:</span>
                </div>
            </div>
            <div style="padding:0 20px">
                <div class="row" >
                    <div class="col-md-12"  >
                        {{ __('site.symptoms') }}
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="background-color: #f8f8f8;" >
                            {{$consultation->symptoms}}
                                          </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        {{ __('site.diagnosis') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="background-color: #f8f8f8;">

                            {{$consultation->diagnosis}}

                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        {{ __('site.recommendations') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="background-color: #f8f8f8;">
                       {{$consultation->recommendations}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        {{ __('site.additional_instructions') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="background-color: #f8f8f8;">
                       {{$consultation->additional_instructions}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        {{ __('site.referrals') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="background-color: #f8f8f8;">
                       {{$consultation->referrals}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        {{ __('site.following_plan') }}:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="background-color: #f8f8f8;">
                       {{$consultation->following_plan}}
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px" >
                <div class="col-md-6" >
                    {{ __('site.notes') }}:
                </div>
            </div>
            <div class="row" style="margin-top: 10px" >
                <div class="col-md-12" style="background-color: #f8f8f8;">
                   {{$consultation->notes}}
                </div>
            </div>
            <div class="row"  style="margin-top: 30px">
                <div class="col-md-6" >
                    {{ __('site.doctor_name') }}:   {{$consultation->doctor->name}}


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

{{--        </form>--}}

    </div>
</div>

</div>
