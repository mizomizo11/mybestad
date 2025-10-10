@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/specialties/') }}">ادارة الاختصاصات</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')
 <form  method="POST" action="{{url(app()->getLocale().'/admins/specialties/update') }}"  enctype="multipart/form-data"  >
  @csrf
     <input  type="hidden" name="id"  value="{{$specialty -> id}}" />
     <div class='row' >
         <div class='col-md-3'>
             <div>
                 <label>اسم التخصص - عربي </label>
                 <input type="text" class="form-control form-control-sm" name="name_ar" value="{{$specialty -> name_ar}}"  required="" />
             </div>
         </div>
         <div class='col-md-3'>
             <div>
                 <label>اسم التخصص - انكليزي </label>
                 <input type="text" class="form-control form-control-sm" name="name_en" value="{{$specialty -> name_en}}" style="direction: ltr;text-align: left"  required="" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <h6 style="">  سعر المعاينة  :  </h6>
                 <input type="number"  class="form-control" name="price" value="{{$specialty -> price}}"  style="direction: ltr;text-align: left" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الترتيب</label>
                 <input type="number"   class="form-control form-control-sm"  name="record_order"  value="{{$specialty -> record_order}}" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الصورة الحالية </label>
                 <div >  <img class="zoom_it" src="{{asset(Config::get('app.upload'))}}/{{  $specialty -> image }}" style="width:40px;height:30px"></div>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>صورة</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                 <input class="form-control"  type="file"  name="image_file"  />
             </div>
         </div>
     </div>
     <div class='row' style="margin-top: 65px;">
         <div class='col-md-6'>
             <label >الوصف</label>
             <textarea    name="details_ar"  class="form-control" > {{$specialty -> details_ar}}</textarea>
         </div>
         <div class='col-md-6'>
             <label >الوصف</label>
             <textarea   name="details_en"  style="direction: ltr;text-align: left" class="form-control" > {{$specialty -> details_en}}</textarea>
         </div>
     </div>
     <div class="row" style="margin-top: 25px;">
         <div class='col-sm-12' style="text-align: center;margin: 0;">
             <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
         </div>
     </div>

 </form>


@stop
