<h2>Hello, This Message from askourdoctor.com </h2>

<div class="row" style="margin-top: 20px;direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">
    <div class="col-md-12" style="">
        <form id="form6"   style="max-width: 800px;margin: auto;border: 1px solid #e3e3e3;padding: 10px; box-shadow: 0 0 5px 2px #d3d3d3;" >
            @csrf
            <input type="hidden" name="patient_id" id="patient_id"  value="{{$consultation->patient->id}}"><br>
            <input type="hidden" name="doctor_id" id="doctor_id" value="{{$consultation->doctor->id}}">
            <input type="hidden" name="consultation_id"  value="{{$consultation->id}}">
            <h1 class="font-bold" style="color: #0f9bc0;margin: 10px;text-align: center">تقرير استشارة طبية عبر الانترنت  </h1>
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
                        <div  class="form-control" style="width: 100%">
                            {{ $consultation->symptoms }}
                        </div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        التشخيص / الانطباع:
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <div   style="width: 100%"> {{ $consultation->diagnosis }}</div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12" >
                        التوصيات
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <div  style="width: 100%">{{$consultation->recommendations}}</div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        تعليمات اضافية
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <div  style="width: 100%">{{$consultation->additional_instructions}}</div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        الاحالات اذا لزم الامر
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <div  style="width: 100%">{{$consultation->referrals}}</div>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6" >
                        خطة المتابعة اذا لزم الامر
                    </div>
                </div>
                <div class="row" style="margin-top: 10px" >
                    <div class="col-md-12" style="">
                        <div  style="width: 100%">{{$consultation->following_plan}}</div>
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
                    <div style="width: 100%">{{$consultation->notes}}</div>
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


