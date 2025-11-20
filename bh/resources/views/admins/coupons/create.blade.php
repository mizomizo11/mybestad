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
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/coupons/') }}"> ادارة الكوبونات</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')
    <form  method="POST" id="form-5"  action="{{url(app()->getLocale()."/admins/coupons/store")}}"  enctype="multipart/form-data"  style="">
      @csrf
        <div class='row' >
            <div class='col-md-3'>
                <div>
                    <label> رقم الكوبون</label>
                    <input type="text" class="form-control form-control-sm" name="number" value="{{$random_number}}" readonly    required/>
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label> قيمة الكوبون </label>
                    <input type="text"  class="form-control form-control-sm" style="direction: ltr;text-align: left"  name="value" required  />
                </div>
            </div>


        </div>



        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">اضافة</button>
            </div>
        </div>
    </form>

@stop
