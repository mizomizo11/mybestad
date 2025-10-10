@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">

            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url("/dashboard/index")}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url('/dashboard/carousels/') }}"> ادارة الصور المتحركة</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>

        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')




    <form  method="POST" action="{{route('carousel-store') }}"  enctype="multipart/form-data"  style="">

@csrf


        <div class='row' >
            <div class='col-md-3'>
                <div>
                    <label>الاسم </label>
                    <input type="text" class="form-control form-control-sm" name="name"    />
                </div>
            </div>
            <div class='col-md-3'>
                <div >
                    <label>الاسم - انكليزي</label>
                    <input   class="form-control form-control-sm"  name="name_eng"  style="text-align: left;direction: ltr;"  />
                </div>
            </div>



            <div class='col-md-2'>
                <div >
                    <label>صورة </label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
                    <input class="form-control form-control-sm"  type="file"   name="carousel_image" style="border: 1px solid red;"  required/>

                </div>
            </div>
            <div class='col-md-1'>
                <div >
                    <label>الترتيب </label>
                    <input type="number"  class="form-control form-control-sm"  name="record_order"   />
                </div>
            </div>
        </div>




        <div class='row' style="margin-top: 65px;">


            <div class='col-md-6'>
                <label >التفاصيل</label>

                <textarea   id="details" name="details"  class="form-control" ></textarea>

            </div>
            <div class='col-md-6'>
                <label >التفاصيل انكليزي</label>

                <textarea  id="details_eng" name="details_eng"  style="text-align: left;direction: ltr;"  class="form-control" ></textarea>
            </div>
        </div>





        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Add</button>
            </div>
        </div>
    </form>





@stop
