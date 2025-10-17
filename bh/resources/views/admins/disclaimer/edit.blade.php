@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" >ادارة اخلاء المسؤولية  </li>

            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



<form  method="POST"    action="{{url(app()->getLocale().'/admins/disclaimer/update') }}"  enctype="multipart/form-data" >
    @csrf

    <input  type="hidden" class="form-control" name="id" value="{{ $disclaimer -> id }}"   size="44" style="" />
    <div class='row' style="padding: 10px 30px;">
        <div class='col-md-6'>
            <h6 style="">التفاصيل - عربي  </h6>
            <textarea rows="30" cols="20"   name="details_ar"  class="form-control" >{{$disclaimer -> details_ar}}</textarea>
        </div>
        <div class='col-md-6'>
            <h6 style="">التفاصيل  - انكليزي </h6>
            <textarea rows="30" cols="20"   name="details_en"  class="form-control"style="direction: ltr;" >{{$disclaimer -> details_en}}</textarea>
        </div>
    </div>
        <div class='col-sm-12' style="text-align: center;margin: 0px;">
            <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
        </div>
    </div>
</form>



@stop
