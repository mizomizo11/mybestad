@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="../../../public/index.php">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url('/dashboard/stores/') }}"> ادارة المتاجر</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>



        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')




    <form  method="POST" action="{{route('store-store') }}"   enctype="multipart/form-data"  style="">
@csrf



        <div class='row' >
            <div class='col-md-2'>
                <div>
                    <label>اسم المتجر  </label>
                    <input type="text" class="form-control form-control-sm" name="name"    required=""/>
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>اسم المتجر-انكليزي </label>
                    <input type="text"  class="form-control form-control-sm"  name="name_eng"  required="" />
                </div>
            </div>


            <div class='col-md-2'>
                <div >
                    <label style="font-size: 14px;color:#951A30">التصنيف </label>

                    <select id="" name="category_id" class="form-control form-control-sm" style="border-radius:5px">
                        @foreach ($categories as $category)
                            <option value="{{$category -> id}}">{{$category -> name}}</option>
                        @endforeach

                    </select>

                </div>
            </div>
            <div class='col-md-2'>
                <div>
                    <label>العنوان </label>
                    <input type="text" class="form-control form-control-sm" name="address"    required=""/>
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>العنوان- انكليزي </label>
                    <input type="text"  class="form-control form-control-sm"  name="address_eng"  required="" />
                </div>
            </div>


            <div class='col-md-1'>
                <div >
                    <label>الترتيب </label>

                    <input type="number" value="0"  class="form-control form-control-sm"  name="record_order"   />
                </div>
            </div>



            <div class='col-md-2'>
                <div >
                    <label>اسم الدخول</label>
                    <input type="text"  class="form-control form-control-sm"  name="loginname"  required=""/>
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>كلمة المرور</label>
                    <input  type="text" class="form-control form-control-sm"  name="pass"  required=""/>
                </div>
            </div>


            <div class='col-md-2'>
                <div >
                    <label>صورة</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm"  type="file"   name="store_image"   required/>

                </div>
            </div>



        </div>







        <div class='row' >
            <div class='col-md-2'>

                <label>Day</label>

            </div>

            <div class='col-md-1'>
                <label>Open </label>

            </div>
            <div class='col-md-1'>
                <label>Close </label>

            </div>
        </div>


        <div class='row' style="">
            <div class='col-md-2'>
                <label>Monday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="monday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="monday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>

        <div class='row' >
            <div class='col-md-2'>
                <label>Tuesday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="tuesday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="tuesday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>
        <div class='row' >
            <div class='col-md-2'>
                <label>Wednesday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="wednesday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="wednesday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>
        <div class='row' >
            <div class='col-md-2'>
                <label>Thursday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="thursday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="thursday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>
        <div class='row' >
            <div class='col-md-2'>
                <label>Friday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="friday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="friday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>
        <div class='row' >
            <div class='col-md-2'>
                <label>Saturday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="saturday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am" >11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="saturday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>
        <div class='row' >
            <div class='col-md-2'>
                <label>Sunday</label>
            </div>
            <div class='col-md-1'>
                <select id="" name="sunday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am" selected="">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
            <div class='col-md-1'>

                <select id="" name="sunday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                    <option value="00am">00am</option>
                    <option value="01am">01am </option>
                    <option value="02am">02am</option>
                    <option value="03am">03am </option>
                    <option value="04am">04am</option>
                    <option value="05am">05am </option>
                    <option value="06am">06am</option>
                    <option value="07am">07am </option>
                    <option value="08am">08am</option>
                    <option value="09am">09am </option>
                    <option value="10am">10am</option>
                    <option value="11am">11am </option>
                    <option value="12pm">12pm</option>
                    <option value="13pm">13pm </option>
                    <option value="14pm">14pm</option>
                    <option value="15pm">15pm </option>
                    <option value="16pm">16pm</option>
                    <option value="17pm" selected="">17pm </option>
                    <option value="18pm">18pm</option>
                    <option value="19pm">19pm </option>
                    <option value="20pm">20pm</option>
                    <option value="21pm">21pm </option>
                    <option value="22pm">22pm </option>
                    <option value="23pm">23pm </option>
                </select>
            </div>
        </div>




        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Add</button>
            </div>
        </div>
    </form>


@stop
