@extends('layouts.site.master')

@section('breadcrumb')
@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;font-family: font2;">   services </h3>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 10px;">
        <div class="row d-flex justify-content-between align-items-center">
            <img src="{{asset('all/img/banner1.jpg')}}" style="width: 100%;height: 200px;">
        </div>
    </div>


    @include('layouts.site.show_navbar')


    <div class="container" style="margin-top: 10px;border: 1px solid #dbdfe2">
        <div class="row">
            <div class="col-md-2 " style="padding: 0px">

                <div style="" id="sidebar" class="sidebar  expandable sidebar-default">
                    <div class="sidebar-inner">
                        <div class="flex-grow-1 ace-scroll" ace-scroll="">


                            <ul class="nav has-active-border" role="navigation" aria-label="Main">


                                @foreach ($services_cats as $service)
                                    <li class="nav-item">
                                        <a href="{{url(app()->getLocale()."/services")}}/{{$service -> id}}" class="nav-link ">
                                            <i class="nav-icon fa fa-circle"></i>
                                            <span class="nav-text fadeable">
                                           <span>{{$service -> name}}</span>
                                         </span>

                                        </a>
                                    </li>

                                @endforeach




                            </ul>

                        </div><!-- /.sidebar scroll -->


                    </div>
                </div>
            </div>
            <div class="col-md-10">

                <div class="d-flex justify-content-between align-items-center bgc-grey-l4"
                     style="margin: 5px 0px;border-radius:5px">
                    <ol class="breadcrumb pl-2">
                        <li class="breadcrumb-item active text-grey">
                            <i class="fa fa-home text-dark-m3 mr-1"></i>
                            <a class=" color_red" href="{{url(app()->getLocale()."/")}}">   الصفحة الرئيسية   </a>
                        </li>
                        <li class="breadcrumb-item active text-grey-d1">
                            <a   href="{{url(app()->getLocale()."/services")}}"> الخدمات </a></li>

                    </ol>

                    <a href="{{url(app()->getLocale().'/services/create') }}" type="button" class="btn btn-success  btn-sm" >اضافة خدمة </a>
                </div>



                <div class="container "  style="border:1px solid #e3e3e355;background-color: #f6f7f7;border-radius: 10px;margin:30px 5px">

                        <div class="row "  >
                            <div class="form-group col-md-2 ">
                                <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                 حقول البحث
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">

                                <button class="btn btn-md btn-info " style="margin: auto"> بحث</button>
                                <button class="btn btn-md btn-info" type="button" style="margin: auto">
                                    <i class="fa fa-check mr-1"></i>
                                    اعادة تهيئة
                                </button>
                                <button class="btn btn-md  btn-info " type="reset" style="margin: auto">
                                    <i class="fa fa-undo mr-1"></i>
                                    الغاء
                                </button>
                            </div>
                        </div>
                </div>
                <div class="container "  >


                            @foreach ($services as $service)
                        <div class="row"  style="border:1px solid #e3e3e355;background-color: #f6f7f7;border-radius: 10px;margin:30px 5px">
                                <div class="col-md-2" style="text-align: center">
                                    <img class='zoom_it'  src="/{{Config::get('app.upload_image_folder')}}/{{$service -> pic}}" style='width:100px;height:100px;border-radius: 50%;margin: auto'>
                                    <h3 style="text-align: center">{{$service -> name}}</h3>
                                    <h5 style="text-align: center">{{$service -> phone}}</h5>
                                    <h5 style="text-align: center">{{$service -> email}}</h5>


                                </div>
                            <div class="col-md-2" style="text-align: right;padding-top: 50px">
{{--                                    <h5>{{$service -> animals_cats_id}}</h5>--}}
                                </div>
                            <div class="col-md-4" style="text-align: right;padding-top: 50px">
                                   نوع الخدمة :  <h5>{{$service -> cat_name}}</h5>
                                </div>

                                <div class="col-md-2" style="text-align: right;padding-top: 50px">
                                    العنوان : <h5>{{$service -> address}}</h5>
                                </div>
                                <div class="col-md-2" style="text-align: right;padding-top: 50px">
{{--                                    <a href=/{{app()->getLocale()}}/dashboard/services_cats/edit/{{$service -> id}}"  class='btn btn-success btn-sm'>تحديث</a>--}}
                                    <a href='/{{app()->getLocale()}}/services/destroy/{{$service -> id}}'  class='btn btn-success btn-sm'>حذف</a>


                                </div>
                        </div>
                            @endforeach


                </div>






            </div>

        </div>
    </div>






    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="dd add-to-cart"
                    style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #141d86;font-family: font2;font-size: 33px;font-weight: bold;;">
                    <img src="images/logo.png" alt="" style="height: 40px;">
                    {{ __('site.stores') }}
                    <img src="images/logo.png" alt="" style="height: 40px;">
                </h1>
            </div>
        </div>
    </div>


    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row">
            @foreach ($stores as $store)
                <div class="col-md-3 col-sm-6" style="text-align: center;margin-bottom: 20px">
                    <a href='{{url(app()->getLocale()."/stores/$store->id")}}'>
                        <img class="pic-1" src="{{asset("images/$store->pic")}}" style='height:200px;width: 100%'>
                        <h5 style="margin: 10px">
                            @if(App::getLocale() == 'ar')
                                {{$store->name}}
                            @else
                                {{$store->name_eng}}
                            @endif
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>





@endsection
