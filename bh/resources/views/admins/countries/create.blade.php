@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}"> الصفحة الرئيسية  </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/countries') }}">ادارة الدول</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')
    <form  method="POST" action="{{url(app()->getLocale()."/admins/countries/store")}}"  enctype="multipart/form-data"  style="">
    @csrf
        <div class='row' >
            <div class='col-md-3'>
                <div>
                    <label  style="font-family: font2;">اسم الدولة- عربي </label>
                    <input type="text" class="form-control form-control-sm" name="name_ar"    required=""/>
                </div>
            </div>
            <div class='col-md-3'>
                <div>
                    <label  style="font-family: font2;">اسم الدولة- انكليزي </label>
                    <input type="text" class="form-control form-control-sm" name="name_en" style="direction: ltr;text-align: left"    required=""/>
                </div>
            </div>
            <div class='col-md-1'>
                <div>
                    <label  style="font-family: font2;">الترتيب </label>
                    <input type="number" style="direction: ltr;text-align: left"  class="form-control form-control-sm" name="record_order"    required=""/>
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>صورة</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm"  type="file"   name="image_file"  />
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
