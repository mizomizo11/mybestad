@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" >ادارة من نحن  </li>

            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



<form  method="POST"    action="{{ route('whous-update',['locale' => app()->getLocale()]) }}"  enctype="multipart/form-data" >
    @csrf

    <input  type="hidden" class="form-control" name="id" value="{{ $whous -> id }}"   size="44" style="" />
    <div class='row' style="padding: 10px 30px;">
        <div class='col-md-6'>
            <h6 style="">كلمة رئيس مجلس الادارة  </h6>
            <textarea rows="4" cols="20"  id="contact" name="chairman"  class="form-control" >{{$whous -> chairman}}</textarea>
        </div>
        <div class='col-md-6'>
            <h6 style="">كلمة رئيس مجلس الادارة - انكليزي </h6>
            <textarea rows="4" cols="20"  id="contact" name="chairman_eng"  class="form-control"style="direction: ltr;" >{{$whous -> chairman_eng}}</textarea>
        </div>
    </div>
    <div class='row' style="padding: 10px 30px;">
        <div class='col-md-6'>
            <h6 style="">من نحن  </h6>
            <textarea rows="4" cols="20"  id="contact" name="whous"  class="form-control" >{{$whous -> whous}}</textarea>
        </div>
        <div class='col-md-6'>
            <h6 style="">من نحن - انكليزي </h6>
            <textarea rows="4" cols="20"  id="contact" name="whous_eng"  class="form-control" style="direction: ltr;">{{$whous -> whous_eng}}</textarea>
        </div>
    </div>
    <div class='row' style="padding: 10px 30px;">
        <div class='col-md-6'>
            <h6 style="">المهمة  </h6>
            <textarea rows="4" cols="20"  id="contact" name="mission"  class="form-control" >{{$whous -> mission}}</textarea>
        </div>
        <div class='col-md-6'>
            <h6 style="">المهمة - انكليزي </h6>
            <textarea rows="4" cols="20"  id="contact" name="mission_eng"  class="form-control" style="direction: ltr;">{{$whous -> mission_eng}}</textarea>
        </div>
    </div>
    <div class='row' style="padding: 10px 30px;">
        <div class='col-md-6'>
            <h6 style="">الرؤيا   </h6>
            <textarea rows="4" cols="20"  id="contact" name="vision"  class="form-control" >{{$whous -> vision}}</textarea>
        </div>
        <div class='col-md-6'>
            <h6 style="">الرؤيا انكليزي </h6>
            <textarea rows="4" cols="20"  id="contact" name="vision_eng"  class="form-control" style="direction: ltr;">{{$whous -> vision_eng}}</textarea>
        </div>
    </div>
    <div class='row' style="margin-top: 25px;">
        <div class='col-sm-12' style="text-align: center;margin: 0px;">
            <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
        </div>
    </div>
</form>



@stop
