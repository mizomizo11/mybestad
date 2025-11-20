@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url(app()->getLocale().'/admins/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/services/') }}">ادارة الخدمات</a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')
 <form  method="POST" action="{{url(app()->getLocale()."/admins/services/update")}}"  enctype="multipart/form-data"  >
@csrf
     <input  type="hidden" name="id"  value="{{$service -> id}}" />
     <div class='row' >
         <div class='col-md-3'>
             <div>
                 <label>الخدمة - عربي </label>
                 <input type="text" class="form-control form-control-sm" name="name_ar" value="{{$service -> name_ar}}"  required="" />
             </div>
         </div>
         <div class='col-md-3'>
             <div >
                 <label>الخدمة - انكليزي</label>
                 <input   class="form-control form-control-sm"  name="name_en"  value="{{$service -> name_en}}" style="direction: ltr;text-align: left" required/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الترتيب</label>
                 <input type="number"   class="form-control form-control-sm"  name="record_order"  value="{{$service -> record_order}}" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الصورة الحالية </label>
                 <div >  <img class="zoom" src="{{asset(Config::get('app.upload'))}}/{{  $service -> image }}" style="width:40px;height:30px"></div>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>صورة</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                 <input class="form-control"  type="file"  name="imagefile"  />
             </div>
         </div>
     </div>
     <div class='row' style="margin-top: 65px;">
         <div class='col-md-6'>
             <label >ملخص - عربي </label>
             <textarea    name="summary_ar" rows="3" maxlength="200"  class="form-control" > {{$service -> summary_ar}}</textarea>
         </div>
                 <div class='col-md-6'>
             <label >ملخص - انكليزي</label>
             <textarea   name="summary_en"  rows="3" maxlength="200"  class="form-control" style="direction: ltr;text-align: left">{{$service ->summary_en}}</textarea>
         </div>
     </div>

     <div class="col-md-12">
         <div>
             <label>تفاصيل عربي  </label>
             <div style="direction: ltr;text-align: left">
                <textarea name="details_ar"
                          class="form-control form-control-sm col-md-12"
                          style="border-radius:5px"
                          >{{$service -> details_ar}}</textarea>
             </div>
         </div>
     </div>

     <div class="col-md-12" >
         <div>
             <label>تفاصيل انكليزي  </label>
             <div style="direction: ltr;text-align: left">
                <textarea name="details_en"
                          class="form-control form-control-sm col-md-12"
                          style="border-radius:5px"
                          >{{$service -> details_en}}</textarea>
             </div>
         </div>
     </div>
     <div class='row' style="margin-top: 25px;">
         <div class='col-sm-12' style="text-align: center;margin: 0px;">
             <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
         </div>
     </div>
 </form>


@stop
