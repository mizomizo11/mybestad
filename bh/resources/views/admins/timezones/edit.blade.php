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

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/timezones/') }}">ادارة  المناطق الزمنية  </a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



 <form  method="POST" action="{{route('timezone-update',["locale"=>app()->getLocale()]) }}"  enctype="multipart/form-data"  >
@csrf
     <input  type="hidden" name="id"  value="{{$timezone -> id}}" />


     <div class='row' >
         <div class='col-md-3'>
             <div>
                 <label>اسم المنطقة الزمنية - عربي  </label>
                 <input type="text" class="form-control form-control-sm" name="name_ar" value="{{$timezone -> name_ar}}"    />
             </div>
         </div>
         <div class='col-md-3'>
             <div >
                 <label>اسم المنطقة الزمنية - انكليزي   </label>
                 <input   class="form-control form-control-sm"  name="name_en" value="{{$timezone -> name_en}}"  style="text-align: left;direction: ltr;"  />
             </div>
         </div>
         <div class='col-md-3'>
             <div >
                 <label>utc_offset </label>
                 <input   class="form-control form-control-sm"  name="utc_offset" value="{{$timezone -> utc_offset}}"  style="text-align: left;direction: ltr;"  />
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
