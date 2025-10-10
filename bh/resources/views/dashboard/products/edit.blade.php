@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url(app()->getLocale().'/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/dashboard/products/') }}">ادارة الكتب</a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')





 <form  method="POST" action="{{url(app()->getLocale().'/dashboard/products/update') }}"  enctype="multipart/form-data"  style="">
@csrf


     <input  type="hidden" name="id"  value="{{$product -> id}}" />


     <div class="card " style="border: 1px solid #ccc;">
         <div class="card-body" style="padding: 10px;">
             <div class='row' style="margin-top: 0px;">

                 <div class='col-md-2'>
                     <div>
                         <label style="font-size: 13px;">اسم الكتاب  </label>
                         <input type="text" class="form-control form-control-sm" name="name" value="{{$product -> name}}"    required="" />
                     </div>
                 </div>


                 <div class='col-md-2'>
                     <div >
                         <label style="font-size: 13px;">التصنيف</label>

                         <select id="" name="categories_id" class="form-control form-control-sm" style="border-radius:5px">
                             @foreach ($categories as $category)
                                 @if ($category -> id == $product -> categories_id)
                                     <option value="{{$category -> id}}" selected>{{$category -> name}}</option>
                                 @else
                                     <option value="{{$category -> id}}" >{{$category -> name}}</option>
                                 @endif
                             @endforeach
                             <?php


                             ?>
                         </select>

                     </div>
                 </div>
                 <div class='col-md-2'>
                     <div >
                         <label style="font-size: 13px;"> السعر </label>
                         <input type="number" min="0"   class="form-control form-control-sm"  name="price" value="{{$product -> price}}"  required="" />
                     </div>
                 </div>

                 <div class='col-md-1'>
                     <div >
                         <h1 style="font-size: 13px;">..</h1>

                         <img class="zoom" src="/{{Config::get('app.upload_image_folder')}}{{  $product-> pic }}" style="width:40px;height:30px">
                     </div>
                 </div>
                 <div class='col-md-2'>
                     <div >
                         <label style="font-size: 13px;color:#951A30">الصورة</label>
                         <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                         <input class="form-control form-control-sm"  type="file"   name="userfile" style="border: 1px solid red;"  />

                     </div>
                 </div>







                 <div class='col-md-2'>
                     <div >
                         <label style="font-size: 13px;">متوفر</label>
                         <select id="" name="is_available" class="form-control form-control-sm" style="border-radius:5px">

                             <option value="yes"  <?php if ($product -> available == 'yes') echo "selected"; ?>>نعم </option>
                             <option value="no" <?php if ($product -> available == 'no') echo "selected"; ?>>لا  </option>

                         </select>
                     </div>
                 </div>
                 <div class='col-md-2'>
                     <div >
                         <label style="font-size: 14px;">قائمة المنتجات المميزة </label>
                         <select id="" name="special_products" class="form-control form-control-sm" style="border-radius:5px">

                             <option value="yes" <?php if ($product -> home_page == 'yes')   echo "selected"; ?>>نعم </option>
                             <option  value="no" <?php  if ($product -> home_page == 'no')   echo "selected"; ?>>لا </option>

                         </select>
                     </div>
                 </div>
                 <div class='col-md-2'>
                     <div >
                         <label style="font-size: 14px;">قائمة الاكثر طلبا</label>
                         <select id="" name="most_ordered" class="form-control form-control-sm" style="border-radius:5px">

                             <option value="yes" <?php   if ($product -> most_ordered == 'yes')  echo "selected"; ?>>نعم </option>
                             <option value="no" <?php     if ($product -> most_ordered == 'no')  echo "selected"; ?>>لا </option>

                         </select>
                     </div>
                 </div>
             </div>
         </div>
     </div>





















     <div class='row' style="margin-top: 50px;">


         <div class='col-md-12'>
             <label style="font-size: 14px;color:#951A30">وصف  </label>

             <textarea   name="details"  class="form-control" >{{$product -> details}}</textarea>

         </div>


     </div>







     <div class='row' style="margin-top: 25px;">
         <div class='col-sm-12' style="text-align: center;margin: 0px;">
             <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
         </div>
     </div>
 </form>



@stop
