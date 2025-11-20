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
                            <a  href="{{url(app()->getLocale()."/")}}">   الصفحة الرئيسية   </a>
                        </li>
                        <li class="breadcrumb-item active text-grey-d1">
                            <a   href="{{url(app()->getLocale()."/services")}}"> الخدمات </a></li>
                        <li class="breadcrumb-item active text-grey-d1">   اضافة خدمة  </li>
                    </ol>
                </div>
                <div class="container"    style="border:1px solid #e3e3e3;background-color: #f6f7f7;border-radius: 10px;padding: 10px">




                            <form  method="POST" action="{{url(app()->getLocale()."/services/store")}}"  enctype="multipart/form-data"  style="">
                                @csrf
                                <div class='row' >
                                    <div class='col-md-2'>
                                        <div>
                                            <label >نوع الحيوان  *</label>
                                            <select  name="animals_cats_id" class="form-control form-control-sm " style="border-radius:5px" required="" >
                                                  <option value="1">كلب</option>
                                                  <option value="2">قطط</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div>
                                            <label >نوع الخدمة  *</label>
                                            <select  name="services_cats_id" class="form-control form-control-sm " style="border-radius:5px" required="" >
                                                @foreach ($services_cats as $services_cat)
                                                    <option value="{{$services_cat -> id}}">{{$services_cat -> name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div>
                                            <label>الاسم  </label>
                                            <input type="text"  name="name" class="form-control form-control-sm"    required/>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div>
                                            <label>العنوان  </label>
                                            <input type="text"  name="address" class="form-control form-control-sm"    required/>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div>
                                            <label>الهاتف  </label>
                                            <input type="text"  name="phone" class="form-control form-control-sm"    required/>
                                        </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div>
                                            <label>الايميل  </label>
                                            <input type="text" name="email" class="form-control form-control-sm"     required/>
                                        </div>
                                    </div>


                                    <div class='col-md-2'>
                                        <div >
                                            <label>صورة</label>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                            <input type="file" name="imagefile" class="form-control form-control-sm"    required   />
                                        </div>
                                    </div>
                                </div>





                                <div class='row' style="margin-top: 25px;">
                                    <div class='col-sm-12' style="text-align: center;margin: 0px;">
                                        <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">اضافة</button>
                                    </div>
                                </div>
                            </form>




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
