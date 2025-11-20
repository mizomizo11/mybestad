
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

<div class="container" style="direction: rtl !important;text-align: right !important;">
<div class="row printid" id="printid1" style="max-width: 1000px;margin:auto;border : 0 solid #ccc;padding: 0;display:table;direction: rtl !important;text-align: right !important;">
    <div class="col-md-12" style="width: 1000px;margin-top: 30px">




        <form id="form6"   style="max-width: 800px;margin: auto;border: 1px solid #e3e3e3;padding: 10px; box-shadow: 0 0 5px 2px #d3d3d3;" >
            @csrf
            <input type="hidden" name="patient_id" id="patient_id"  value="{{@$consultation->patient->id}}"><br>
            <input type="hidden" name="doctor_id" id="doctor_id" value="{{@$consultation->doctor->id}}">
            <input type="hidden" name="consultation_id"  value="{{@$consultation->id}}">
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
                            {{$consultation->symptoms}}
                                          </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        التشخيص / الانطباع:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">

                            {{$consultation->diagnosis}}

                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        التوصيات
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                       {{$consultation->recommendations}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        تعليمات اضافية
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                       {{$consultation->additional_instructions}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        الاحالات اذا لزم الامر
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                       {{$consultation->referrals}}
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        خطة المتابعة اذا لزم الامر
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                       {{$consultation->following_plan}}
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
                   {{$consultation->notes}}
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

        </form>

    </div>
</div>

</div>
