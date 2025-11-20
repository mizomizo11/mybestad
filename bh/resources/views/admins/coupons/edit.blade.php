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

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/coupons/') }}">ادارة الكوبونات</a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')
 <form  method="POST" action="{{url(app()->getLocale()."/admins/coupons/update")}}"  enctype="multipart/form-data"  >
@csrf
     <input  type="hidden" name="id"  value="{{$coupon -> id}}" />
     <div class='row' >
         <div class='col-md-3'>
             <div>
                 <label>  رقم الكوبون </label>
                 <input type="text" class="form-control form-control-sm" name="number" value="{{$coupon -> number}}" readonly  required="" />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>  قيمة الكوبون</label>
                 <input   class="form-control form-control-sm"  name="value"  value="{{$coupon -> value}}" style="direction: ltr;text-align: left" required/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>المريض </label>
                 <select  name="used" class="form-control form-control-sm "
                         style="border-radius:5px">
                     <option value='no' @if($coupon->used == "no") selected @endif>No</option>
                     <option value='yes' @if($coupon->used == "yes") selected @endif>Yes</option>
                 </select>
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
