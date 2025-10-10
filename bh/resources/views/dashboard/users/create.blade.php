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

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/dashboard/users/') }}"> ادارة المستخدمين</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
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



<form  method="POST" action="{{url(app()->getLocale())}}/dashboard/users/store"  enctype="multipart/form-data"  >
@csrf
        <div class='row' >
            <div class='col-md-2'>
                <div>
                    <label>*الاسم</label>
                    <input type="text" class="form-control form-control-sm" name="name"   required />
                </div>
            </div>

            <div class='col-md-2'>
                <div >
                    <label>*الموبايل</label>

                    <input type="mobile"   class="form-control form-control-sm"  name="mobile" style="direction: ltr;text-align: left;"   required />
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>*الايميل</label>

                    <input type="email"   class="form-control form-control-sm"  name="email" style="direction: ltr;text-align: left;"   required />
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>*كلمة المرور </label>
                    <input type="text"  class="form-control form-control-sm"  name="password" style="direction: ltr;text-align: left;"   required />
                </div>
            </div>

            <div class='col-md-2'>
                <div >
                    <label>صورة</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm"  type="file"   name="image_file" required />
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>تاريخ الاضافة </label>
                    <input type="text"  class="form-control form-control-sm"  name="created_at" value="<?php echo date('Y-m-d H:i:s');?>" style="direction: ltr;text-align: left;"  disabled  required />
                </div>
            </div>


        </div>





        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 300px;">اضافة مستخدم جديد</button>
            </div>
        </div>

    </form>


@stop
