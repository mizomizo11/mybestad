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
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>



        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')



    <form  method="POST" action="{{url(app()->getLocale().'/dashboard/products/store') }}"  enctype="multipart/form-data"  style="">
@csrf




        <div class="card " style="border: 1px solid #ddd;">
            <div class="card-body" style="padding: 10px;">
                <div class='row' style="margin-top: 0px;">

                    <div class='col-md-2'>
                        <div>
                            <label style="font-size: 14px">اسم الكتاب </label>
                            <input type="text" class="form-control form-control-sm" name="name"   required="" />
                        </div>
                    </div>



                    <div class='col-md-2'>
                        <div >
                            <label style="font-size: 14px;">التصنيف </label>

                            <select id="" name="categories_id" class="form-control form-control-sm" style="border-radius:5px">
                                @foreach ($categories as $category)
                                   <option value="{{$category -> id}}">{{$category -> name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div >
                            <label style="font-size: 13px;"> السعر </label>
                            <input type="number"  min="0"   class="form-control form-control-sm"  name="price"  required=""  />
                        </div>
                    </div>

                    <div class='col-md-2'>
                        <div >
                            <label style="font-size: 14px;color:#951A30">الصورة </label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                            <input class="form-control form-control-sm"  type="file"   name="userfile" style="border: 1px solid red;"  required/>

                        </div>
                    </div>
                    <div class='col-md-2'>
                        <div >
                            <label style="font-size: 14px;color:#951A30">متوفر </label>
                            <select id="" name="is_available" class="form-control form-control-sm" style="border-radius:5px">

                                <option value="yes">نعم</option>
                                <option value="no"> لا </option>

                            </select>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div >
                            <label style="font-size: 14px;color:#951A30">عرض على الصفحة الرئيسية- قائمة المنتجات مميزة </label>
                            <select id="" name="special_products" class="form-control form-control-sm" style="border-radius:5px">

                                <option value="yes">Yes </option>
                                <option value="no">No </option>

                            </select>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div >
                            <label style="font-size: 14px;color:#951A30">عرض على الصفحة الرئيسية - قائمة الاكثر طلبا </label>
                            <select id="" name="most_ordered" class="form-control form-control-sm" style="border-radius:5px">

                                <option value="yes">Yes </option>
                                <option value="no">No </option>

                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
























        <div class='row' style="margin-top: 50px;">


            <div class='col-md-12'>
                <label style="font-size: 14px;color:#951A30">تفاصيل  </label>

                <textarea  id="details" name="details"  class="form-control" ></textarea>

            </div>

        </div>





        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">ADD</button>
            </div>
        </div>
    </form>


@stop
