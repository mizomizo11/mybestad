@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins/index")}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/carousels/') }}">ادارة الصور المتحركة </a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



 <form  method="POST" action="{{route('carousel-update',["locale"=>app()->getLocale()]) }}"  enctype="multipart/form-data"  >
@csrf
     <input  type="hidden" name="id"  value="{{$carousel -> id}}" />



     <div class='row' >
         <div class='col-md-2'>
             <div>
                 <label>العنوان</label>
                 <input type="text" class="form-control form-control-sm" name="name_ar" value="{{$carousel -> name_ar}}"  />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>العنوان - انكليزي</label>
                 <input   class="form-control form-control-sm"  name="name_en"  value="{{$carousel -> name_en}}" style="text-align: left;direction: ltr;" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الترتيب</label>
                 <input type="number"   class="form-control form-control-sm"  name="record_order"  value="{{$carousel -> record_order}}" />
             </div>
         </div>


         <div class='col-md-2'>
             <div >
                 <label>الصورة الحالية </label>
                 <div >  <img class="zoom_it" src="/{{Config::get('app.upload')}}{{  $carousel -> image }}" style="width:40px;height:30px"></div>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>صورة</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                 <input class="form-control"  type="file"  name="carousel_image"  />
             </div>
         </div>
     </div>
     <div class='row' style="margin-top: 65px;">
         <div class='col-md-6'>
             <label >الوصف</label>
             <textarea   id="" name="details_ar"   class="form-control" > {{$carousel -> details_ar}}</textarea>
         </div>
         <div class='col-md-6'>
             <label >الوصف - انكليزي</label>

             <textarea   id="" name="details_en" style="text-align: left;direction: ltr;" class="form-control" >{{$carousel -> details_en}}</textarea>
         </div>
     </div>

     <div class='row' style="margin-top: 25px;">
         <div class='col-sm-12' style="text-align: center;margin: 0px;">
             <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
         </div>
     </div>
 </form>


@stop
