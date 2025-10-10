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

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/dashboard/users/') }}">ادارة المستخدمين</a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


 <form  method="POST" action="{{url(app()->getLocale())}}/dashboard/users/update"  enctype="multipart/form-data" >
@csrf
     <input  type="hidden" name="id"  value="{{$user->id}}" />
     <div class='row' >
         <div class='col-md-2'>
             <div>
                 <label>الاسم </label>
                 <input type="text" class="form-control form-control-sm" name="name" value="{{$user->name}}"
                   @if($user->id =='1') readonly @endif
     />
             </div>
         </div>

         <div class='col-md-2'>
             <div >
                 <label>الموبايل</label>
                 <input type="text"   class="form-control form-control-sm"  name="mobile" style="direction: ltr;text-align: left;"   value="{{$user->mobile}}" required/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الايميل </label>
                 <input type="text"   class="form-control form-control-sm"  name="email" style="direction: ltr;text-align: left;"   value="{{$user->email}}" required/>
             </div>
         </div>

         <div class='col-md-2'>
             <div >
                 <label>كلمة المرور</label>
                 <input type="text"   class="form-control form-control-sm"  name="password" style="direction: ltr;text-align: left;"   value="{{$user->password}}" />
             </div>
         </div>

         <div class='col-md-1'>
             <label>الصورة الحالية </label>
             <div >
                 @if($user->image)
                     <td><img class="zoom_it" src="/images/{{$user->image}}" style="width: 50px;height:50px;border-radius: 50%""></td>
                 @else
                     <td><img class="zoom_it" src="{{asset('/all/img/user.jpg')}}" style="width: 50px;height: 50px;border-radius: 50%"></td>
                 @endif
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>صورة جديدة </label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
                 <input class="form-control"  type="file"  name="image_file"   />

             </div>
         </div>

         <div class='col-md-2'>
             <div >
                 <label>تاريخ الاضافة</label>
                 <input type="text"   class="form-control form-control-sm"  name=""   value="{{$user->created_at}}" disabled/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>تاريخ اخر تحديث</label>
                 <input type="text"   class="form-control form-control-sm"  name=""   value="{{$user->updated_at}}" disabled/>
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
