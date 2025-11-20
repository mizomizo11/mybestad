@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')

    <div class="container"
         style=";padding-top: 50px;margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
        @include('layouts.site.add_customer_bar')

        <form id="register_form" enctype="multipart/form-data" style="direction: rtl">
            @csrf


            <div class="card">
                <div class="card-header" >
                    <h2 > اضافة اعلان مبوب</h2>
                </div>

                <div class="card-body">

                    <div class="row" >
                        <div class="col-md-12" style="margin:20px auto;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif">
                            <fieldset style="border: 1px solid #dfdfdf;border-radius: 5px;" >
                                <legend style="width: auto;margin-right: 20px;padding: 0px 10px" > صفة الكلاب  </legend>
                                <div class='row' style="padding: 20px">
                                    <div class="col-md-2" >
                                        <div>
                                            <label>الكلاب النقية  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">
                                                <option value="Asia"> السلالة 1</option>
                                                <option value="Africa">السلالة</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <div>
                                            <label>الكلاب المهجنة  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">
                                                <option value="Asia">  ذكور مهجنة</option>
                                                <option value="Africa">اناث مهجنة</option>
                                                <option value="Africa">جراء مهجنة</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <div>
                                            <label> ذكور للتزاوج  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">
                                                <option value="Asia"> السلالة 1</option>
                                                <option value="Africa">السلالة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                    <div class="row" >
                        <div class="col-md-12" style="margin:20px auto;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif">
                            <fieldset style="border: 1px solid #dfdfdf;border-radius: 5px;" >
                                <legend style="width: auto;margin-right: 20px;padding: 0px 10px" > اعلان مبوب مجاني  </legend>
                                <div class='row' style="padding: 20px">
                                    <div class='col-md-2' >
                                        <label style="margin: 0px 20px">
                                        اعرض     <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                        </label>
                                        <label >
                                            ابحث      <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                        </label>
                                    </div>

                                    <div class="col-md-2">
                                        <div>
                                            <label style="">هوية المعلن </label>
                                            <input type="text" name="name" id="name" value="تاجر" disabled class="form-control form-control-sm"
                                                   required=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label style="">نص الاعلان  </label>
                                            <input type="text" name="name" id="name"   class="form-control form-control-sm"
                                                   required=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-12" >
                                        <div>
                                            <label>الوصف  </label>
                                            <textarea
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">

                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <div>
                                            <label>نوع التسعير  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">

                                                <option value="Africa">لا يوجد سعر</option>
                                                <option value="Africa">السعر قابل للتفاوض</option>
                                                <option value="Africa">السعر ثابت</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <label style="">السعر </label>
                                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                                   required=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <div>
                                            <label> العمر  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">

                                                <option value="Africa">فتي</option>
                                                <option value="Africa">بالغ</option>
                                                <option value="Africa">جرو </option>
                                                <option value="Africa">مسن </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <div>
                                            <label> الجنس  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">

                                                <option value="Africa">ذكر</option>
                                                <option value="Africa">انثى</option>
                                                <option value="Africa">ذكور واناث </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <div>
                                            <label> بلد الولادة  </label>
                                            <select id="country_id" name="country_id"
                                                    class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                    required="">

                                                <option value="Africa">المانيا</option>
                                                <option value="Africa">السويد</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6"  style="margin-top: 20px;border:1px solid #f1f1f1">
                                        <div>
                                            <label>سمة الانتاج   </label>
                                            <div>
                                                <label style="margin: 0px 20px">
                                                    انتاج كهواية      <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                    منتسب الى جمعية       <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label style="margin: 0px 20px">
                                                     مع اوراق       <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                    بدون اوراق       <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"  style="margin-top: 20px;border:1px solid #f1f1f1">
                                        <div>
                                            <label> المتابعة الصحية    </label>
                                            <div>
                                                <label style="margin: 0px 20px">
                                                     لا يوجد      <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                    ملفح         <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label style="margin: 0px 20px">
                                                     مع ميكروشب       <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                     اعطي جرع ضد الديدان        <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6"  style="margin-top: 20px;border:1px solid #f1f1f1">
                                        <div>
                                            <label>  زيارة الام    </label>
                                            <div>
                                                <label style="margin: 0px 20px">
                                                    ممكن       <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                    غير ممكن         <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6"  style="margin-top: 20px;border:1px solid #f1f1f1">
                                        <div>
                                            <label>   الاب    </label>
                                            <div>
                                                <label style="margin: 0px 20px">
                                                    موجود       <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                    غير موجود         <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6"  style="margin-top: 20px;border:1px solid #f1f1f1">
                                        <div>
                                            <label>   الجرو    </label>
                                            <div>
                                                <label style="margin: 0px 20px">
                                                    مخصي       <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                    غير مخصي         <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6"  style="margin-top: 20px;border:1px solid #f1f1f1">
                                        <div>
                                            <label>   الجرو جاهز للانتقال    </label>
                                            <div>
                                                <label style="margin: 0px 20px">
                                                    نعم       <input type="radio" name="phone_show" value="yes" class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                </label>
                                                <label >
                                                     بدءا من تاريخ
                                                    <input type="radio" name="phone_show"  class="input-lg bgc-blue"  style="width: 22px;height: 22px">
                                                    <input type="date" name="phone_show"  class="form-control-sm" style="border: 1px solid #f4f4f4" >
                                                </label>

                                            </div>
                                        </div>
                                    </div>


                                    <fieldset style="border: 1px solid #dfdfdf;border-radius: 5px;margin-top: 20px" >
                                        <legend style="width: auto;margin-right: 20px;padding: 0px 10px" > البيدغري - التسلسل العائلي للحيوان </legend>
                                        <div class='row' style="padding: 20px">



                                            <link rel="stylesheet" type="text/css" href="{{ asset('all/css/mindmap.css')}}">


                                            <div class="mindmap" style="direction: ltr !important;text-align: left;margin: auto">

                                                <div class="node node_root " style="width: 150px">
                                                    <div class="node__text"> Father </div>
                                                    <input type="text" class="node__input">
                                                </div>


                                                <ol class="children children_rightbranch">
                                                    <li class="children__item " >
                                                        <div class="node " style="width: 150px">
                                                            <div class="node__text " >1111</div>
                                                            <input type="text" class="node__input">
                                                        </div>
                                                        <ol class="children children_rightbranch">
                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">1111</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children children_rightbranch">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>


                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">node</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>

                                                        </ol>
                                                    </li>


                                                    <li class="children__item" >
                                                        <div class="node" style="width: 150px">
                                                            <div class="node__text">node</div>
                                                            <input type="text" class="node__input">
                                                        </div>
                                                        <ol class="children children_rightbranch">
                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">1111</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children children_rightbranch">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>


                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">node</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>

                                                        </ol>
                                                    </li>

                                                </ol>
                                            </div>
                                            <div class="mindmap" style="direction: ltr !important;text-align: left;margin-top:50px">

                                                <div class="node node_root " style="width: 150px">
                                                    <div class="node__text"> Mother </div>
                                                    <input type="text" class="node__input">
                                                </div>


                                                <ol class="children children_rightbranch">
                                                    <li class="children__item " >
                                                        <div class="node " style="width: 150px">
                                                            <div class="node__text " >1111</div>
                                                            <input type="text" class="node__input">
                                                        </div>
                                                        <ol class="children children_rightbranch">
                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">1111</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children children_rightbranch">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>


                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">node</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>

                                                        </ol>
                                                    </li>


                                                    <li class="children__item" >
                                                        <div class="node" style="width: 150px">
                                                            <div class="node__text">node</div>
                                                            <input type="text" class="node__input">
                                                        </div>
                                                        <ol class="children children_rightbranch">
                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">1111</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children children_rightbranch">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">2222</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>


                                                            <li class="children__item">
                                                                <div class="node" style="width: 150px">
                                                                    <div class="node__text">node</div>
                                                                    <input type="text" class="node__input">
                                                                </div>
                                                                <ol class="children">
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>
                                                                    <li class="children__item">
                                                                        <div class="node" style="width: 150px">
                                                                            <div class="node__text">node</div>
                                                                            <input type="text" class="node__input">
                                                                        </div>
                                                                    </li>

                                                                </ol>
                                                            </li>

                                                        </ol>
                                                    </li>

                                                </ol>
                                            </div>


                                        </div>
                                    </fieldset>



                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"
                             style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif">


                            <div class="tabbable tabs-above">
                                <ul class="nav nav-tabs nav-tabs-color-blue border-1 border-b-0 pt-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">
                                            صور الحيوان
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade text-95 active show" id="home2" role="tabpanel" aria-labelledby="home-tab">
                                        <div class='row' style="padding-top: 20px;">
                                          صور
                                        </div>
                                    </div>
                                 </div>
                            </div>


                            <div class="tabbable tabs-above">
                                <ul class="nav nav-tabs nav-tabs-color-blue border-1 border-b-0 pt-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">
                                            صور الاب
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade text-95 active show" id="home2" role="tabpanel" aria-labelledby="home-tab">
                                        <div class='row' style="padding-top: 20px;">
                                            صور
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabbable tabs-above">
                                <ul class="nav nav-tabs nav-tabs-color-blue border-1 border-b-0 pt-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">
                                            صور الام
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade text-95 active show" id="home2" role="tabpanel" aria-labelledby="home-tab">
                                        <div class='row' style="padding-top: 20px;">
                                            صور
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-12"
                             style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif">


                            <div class="tabbable tabs-above">

                                <ul class="nav nav-tabs nav-tabs-color-blue border-1 border-b-0 pt-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home2-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                                           عنوان الاعلان
                                        </a>
                                    </li>


                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade text-95 active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                                        <div class='row' style="padding-top: 20px;">

                                            <div class="col-md-2">
                                                <div>
                                                    <label style="">القارة</label>
                                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                                           required=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label style="">البلد</label>
                                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                                           required=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label style="">الاقليم</label>
                                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                                           required=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div>
                                                    <label style="">المدينة</label>
                                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                                           required=""/>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>










                </div>
                <div class="card-footer">
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0px;">
                            <input type="submit" class="btn btn-md bgcolor_red color_yellow" name="Submit" id="submit-btn"
                                   value="Add" style="width: 200px;">
                        </div>
                    </div>
                </div>













































            </div>


        </form>


    </div>



@endsection



