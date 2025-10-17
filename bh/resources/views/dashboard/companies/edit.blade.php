@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="../../../public/index.php">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url('/dashboard/companies/') }}">ادارة الشركات</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



 <form  method="POST" action="{{route('company-update') }}"  enctype="multipart/form-data"  >
@csrf
     <input  type="hidden" name="id"  value="{{$company -> id}}" />



     <div class='row' >
         <div class='col-md-2'>
             <div>
                 <label>الشركة</label>
                 <input type="text" class="form-control form-control-sm" name="name" value="{{$company -> name}}"  required="" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الشركة - انكليزي</label>
                 <input   class="form-control form-control-sm"  name="name_eng"  value="{{$company -> name_eng}}" style="direction: ltr;text-align: left" required/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الترتيب</label>
                 <input type="number"   class="form-control form-control-sm"  name="record_order"  style="direction: ltr;text-align: left" value="{{$company -> record_order}}" />
             </div>
         </div>


         <div class='col-md-2'>
             <div >
                 <label>الصورة الحالية </label>
                 <div >  <img class="zoom" src="/{{Config::get('app.upload_image_folder')}}{{  $company -> pic }}" style="width:40px;height:30px"></div>

             </div>
         </div>

         <div class='col-md-2'>
             <div >
                 <label>صورة</label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="10000000">

                 <input class="form-control"  type="file"  name="company_image"  />

             </div>
         </div>



     </div>




     <div class='row' style="margin-top: 65px;">
         <div class='col-md-6'>
             <label >الوصف</label>
             <textarea   id="details" name="details"  class="form-control" > {{$company -> details}}</textarea>

         </div>
         <div class='col-md-6'>
             <label >الوصف - انكليزي</label>
             <textarea   id="details_eng" name="details_eng"  class="form-control" style="direction: ltr;text-align: left">{{$company -> details_eng}}</textarea>
         </div>
     </div>





     <div class='row' style="margin-top: 25px;">
         <div class='col-sm-12' style="text-align: center;margin: 0px;">
             <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
         </div>
     </div>
 </form>


@stop
