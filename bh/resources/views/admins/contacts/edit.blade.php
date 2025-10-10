@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" >ادارة معلومات الاتصال </li>

            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



<form  method="POST"  id="postForm"  action="{{route('contacts-update',['locale'=>app()->getLocale()]) }}"  enctype="multipart/form-data"      >
         @csrf
    <input  type="hidden" class="form-control" name="id" value="{{ $contacts -> id }}"   size="44" style="" />
         <div class='row' style="padding: 10px 30px;">
             <div class='col-md-6'>
                 <h6 style="">لمحة  </h6>
                 <textarea rows="4" cols="20"  id="contact" name="info_ar"  class="form-control" >{{ $contacts -> info_ar }}</textarea>
             </div>
             <div class='col-md-6'>
                 <h6 style="">لمحة بالانكليزي </h6>
                 <textarea rows="4" cols="20"  id="contact" name="info_en"  class="form-control" style="text-align: left;direction: ltr;" >{{ $contacts -> info_en }}</textarea>
             </div>
         </div>



         <div class='row' style="padding: 10px 30px;">
             <div class='col-md-3'>
                 <div >
                     <h6 style="">الدولة :  </h6>
                     <input  class="form-control" name="country_ar" value="{{ $contacts -> country_ar }}"   size="44" style="" />
                 </div>

             </div>
             <div class='col-md-3'>
                 <div >
                     <h6 style="">المدينة  :   </h6>
                     <input  class="form-control" name="city_ar" value="{{ $contacts -> city_ar }}"   size="44" style="" />
                 </div>

             </div>
             <div class='col-md-6'>
                 <div >
                     <h6 style="">العنوان :  </h6>
                     <input  class="form-control" name="address_ar" value="{{ $contacts -> address_en }}"   size="44" style="" />
                 </div>

             </div>
         </div>

         <div class='row' style="padding: 10px 30px;">
             <div class='col-md-3'>
                 <div >
                     <h6 style="">الدولة - انكليزي</h6>
                     <input  class="form-control" name="country_en" value="{{ $contacts -> country_en }}"   size="44" style="text-align: left;direction: ltr;" />
                 </div>

             </div>
             <div class='col-md-3'>
                 <div >
                     <h6 style="">المدينة - انكليزي </h6>
                     <input  class="form-control" name="city_en" value="{{ $contacts -> city_en }}"   size="44" style="text-align: left;direction: ltr;"/>
                 </div>

             </div>
             <div class='col-md-6'>
                 <div >
                     <h6 style="">العنوان - انكليزي </h6>
                     <input  class="form-control" name="address_en" value="{{ $contacts -> address_en }}"   size="44" style="text-align: left;direction: ltr;"/>
                 </div>

             </div>
         </div>
         <div class='row' style="padding: 10px 30px;">

             <div class='col-md-3'>
                 <h6 >موبايل 1</h6>
                 <input class="form-control" name="mobile1" value="{{ $contacts -> mobile1 }}" style="text-align: left;direction: ltr;"/>

             </div>

             <div  class='col-md-3'>
                 <h6 >موبايل 2 </h6>
                 <input class="form-control"  name="mobile2" value="{{ $contacts -> mobile2 }}" style="text-align: left;direction: ltr;"/>
             </div>
             <div class='col-md-3'>
                 <h6 >Mobile 3</h6>
                 <input class="form-control"  name="mobile3" value="{{ $contacts -> mobile3 }}" style="text-align: left;direction: ltr;"/>
             </div>
             <div class='col-md-3'>
                 <h6 >واتس اب </h6>
                 <input class="form-control"  name="whatsup" value="{{ $contacts -> whatsup }}" style="text-align: left;direction: ltr;"/>
             </div>
         </div>
         <div class='row' style="padding: 10px 30px;">
             <div class='col-md-3'>
                 <h6 >هاتف 1 </h6>
                 <input class="form-control" name="tel1" value="{{ $contacts -> tel1 }}" style="text-align: left;direction: ltr;" />
             </div>
             <div class='col-md-3'>
                 <h6 >هاتف 2</h6>
                 <input class="form-control" name="tel2" value="{{ $contacts -> tel2 }}" style="text-align: left;direction: ltr;" />
             </div>
             <div class='col-md-3'>
                 <h6 >هاتف 3</h6>
                 <input class="form-control" name="tel3" value="{{ $contacts -> tel3 }}" style="text-align: left;direction: ltr;" />
             </div>
         </div>
         <div class='row' style="padding: 10px 30px;">
             <div class='col-md-3'>
                 <h6 >الرمز البريدي </h6>
                 <input class="form-control" name="postal_code" value="{{ $contacts -> postal_code }}" style="text-align: left;direction: ltr;" />
             </div>
             <div class='col-md-3'>
                 <h6 >الفاكس  </h6>
                 <input class="form-control" name="fax" value="{{ $contacts -> fax }}" style="text-align: left;direction: ltr;" />
             </div>
             <div class='col-md-3'>
                 <h6 >موقع الويب  </h6>
                 <input class="form-control" name="url" value="{{ $contacts -> url }}"  style="text-align: left;direction: ltr;"/>
             </div>
         </div>
         <div class='row' style="padding: 10px 30px;">
             <div class='col-md-3'>
                 <h6 >الايميل 1 </h6>
                 <input class="form-control" name="email1" value="{{ $contacts -> email1 }}" style="text-align: left;direction: ltr;" />
             </div>
             <div class='col-md-3'>
                 <h6 >الايميل 2 </h6>
                 <input class="form-control" name="email2" value="{{ $contacts -> email2 }}" style="text-align: left;direction: ltr;" />
             </div>
             <div class='col-md-3'>
                 <h6 >الايميل 3 </h6>
                 <input class="form-control" name="email3" value="{{ $contacts -> email3 }}" style="text-align: left;direction: ltr;" />
             </div>
         </div>

         <div class='row' style="padding: 10px 30px;text-align: left;direction: ltr;">
             <div class='col-md-2'>
                 <h6 >خط الطول </h6>
                 <input class="form-control" name="longitude" value="{{ $contacts -> longitude }}"  />
             </div>
             <div class='col-md-2'>
                 <h6 >خط العرض  </h6>
                 <input class="form-control" name="latitude" value="{{ $contacts -> latitude }}"  />
             </div>
         </div>


         <div class='row' style="padding: 10px 30px;text-align: left;direction: ltr;">
             <div class='col-sm-2'>
                 <div >
                     <label>www.facebook.com/</label>
                     <input class="form-control"   name="facebook" value="{{ $contacts -> facebook }}"  />
                 </div>
             </div>
             <div class='col-sm-2'>
                 <div >
                     <label >www.twitter.com/</label>
                     <input class="form-control"  name="twitter" value="{{ $contacts -> twitter }}" />
                 </div>
             </div>
             <div class='col-sm-2'>
                 <div >
                     <label>www.linkedin.com/</label>
                     <input class="form-control"  name="linkedin" value="{{ $contacts -> linkedin }}"  />
                 </div>
             </div>
             <div class='col-sm-2'>
                 <div >
                     <label>www.instagram.com/</label>
                     <input class="form-control"   name="instagram" value="{{ $contacts -> instagram }}"  />
                 </div>
             </div>
             <div class='col-sm-2'>
                 <div >
                     <label>www.youtube.com/</label>
                     <input  class="form-control"  name="youtube" value="{{ $contacts -> youtube }}"  />
                 </div>
             </div>
         </div>







         </div>
         </div>



         <div class='row' style="margin-top: 25px;">
             <div class='col-sm-12' style="text-align: center;margin: 0px;">
                 <input    class="btn btn-lg btn-info " value="تحديث"  name="Submit"  type="Submit" style="width: 200px;" />
             </div>
         </div>
     </form>



@stop
