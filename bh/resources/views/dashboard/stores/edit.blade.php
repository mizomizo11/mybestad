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

                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url('/dashboard/stores/') }}">ادارة المتاجر</a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')




 <form id="form1"  method="POST" action="{{route('store-update') }}"  enctype="multipart/form-data"  style="">
@csrf
     <input  type="hidden" name="id"  value="{{$store -> id}}" />



     <div class='row' >
         <div class='col-md-2'>
             <div>
                 <label>اسم المتجر  </label>
                 <input type="text" class="form-control form-control-sm" name="name" value="{{$store -> name}}"  required />
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>الاسم - انكليزي</label>
                 <input   class="form-control form-control-sm"  name="name_eng"  value="{{$store -> name_eng}}" required/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label style="font-size: 13px;color:#951A30">التصنيف</label>

                 <select id="" name="categories_id" class="form-control form-control-sm" style="border-radius:5px">
                     @foreach ($categories as $category)
                         @if ($category -> id == $store -> categories_id)
                             <option value="{{$category -> id}}" selected>{{$category -> name}}</option>
                         @else
                             <option value="{{$category -> id}}" >{{$category -> name}}</option>
                         @endif
                     @endforeach

                 </select>

             </div>
         </div>

         <div class='col-md-2'>
             <div>
                 <label>العنوان </label>
                 <input type="text" class="form-control form-control-sm" name="address"  value="{{$store -> address}}"  required=""/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>العنوان- انكليزي </label>
                 <input type="text"  class="form-control form-control-sm"  name="address_eng" value="{{$store -> address_eng}}" required="" />
             </div>
         </div>


         <div class='col-md-2'>
             <div >
                 <label>Order</label>
                 <input type="number"   class="form-control form-control-sm"  name="record_order"  value="{{$store -> record_order}}" required/>
             </div>
         </div>


         <div class='col-md-2'>
             <div >
                 <label>Login Name</label>
                 <input   class="form-control form-control-sm"  name="login_name"  value="{{$store -> login_name}}" required/>
             </div>
         </div>
         <div class='col-md-2'>
             <div >
                 <label>Password</label>
                 <input   class="form-control form-control-sm"  name="pass"  value="{{$store -> pass}}" required/>
             </div>
         </div>
         <div class='col-md-1'>
             <div >
                 <label></label>
                 <img class="zoom" src="/{{Config::get('app.upload_image_folder')}}{{  $store-> pic }}" style="width:40px;height:30px">


             </div>
         </div>

         <div class='col-md-2'>
             <div >
                 <label></label>
                 <input type="hidden" name="MAX_FILE_SIZE" value="10000000">

                 <input class="form-control"  type="file"  name="store_image"  />

             </div>
         </div>




     </div>





     <div class='row' style="margin-top: 50px;">
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


     <div class='row' >
         <div class='col-md-2'>
             <label>Monday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="monday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> monday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> monday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> monday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> monday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> monday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> monday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> monday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> monday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> monday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> monday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> monday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> monday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> monday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> monday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> monday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> monday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> monday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> monday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> monday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> monday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> monday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> monday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> monday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> monday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="monday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> monday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> monday_close=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> monday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> monday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> monday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> monday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> monday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> monday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> monday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> monday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> monday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> monday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> monday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> monday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> monday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> monday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> monday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> monday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> monday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> monday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> monday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> monday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> monday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> monday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>

     <div class='row' >
         <div class='col-md-2'>
             <label>Tuesday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="tuesday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> tuesday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> tuesday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> tuesday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> tuesday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> tuesday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> tuesday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> tuesday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> tuesday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> tuesday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> tuesday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> tuesday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> tuesday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> tuesday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> tuesday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> tuesday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> tuesday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> tuesday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> tuesday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> tuesday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> tuesday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> tuesday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> tuesday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> tuesday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> tuesday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="tuesday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> tuesday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> tuesday_close=='01') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> tuesday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> tuesday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> tuesday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> tuesday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> tuesday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> tuesday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> tuesday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> tuesday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> tuesday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> tuesday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> tuesday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> tuesday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> tuesday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> tuesday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> tuesday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> tuesday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> tuesday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> tuesday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> tuesday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> tuesday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> tuesday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> tuesday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>
     <div class='row' >
         <div class='col-md-2'>
             <label>Wednesday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="wednesday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> wednesday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> wednesday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> wednesday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> wednesday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> wednesday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> wednesday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> wednesday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> wednesday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> wednesday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> wednesday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> wednesday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> wednesday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> wednesday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> wednesday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> wednesday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> wednesday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> wednesday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> wednesday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> wednesday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> wednesday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> wednesday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> wednesday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> wednesday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> wednesday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="wednesday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> wednesday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> wednesday_close=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> wednesday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> wednesday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> wednesday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> wednesday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> wednesday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> wednesday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> wednesday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> wednesday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> wednesday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> wednesday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> wednesday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> wednesday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> wednesday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> wednesday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> wednesday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> wednesday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> wednesday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> wednesday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> wednesday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> wednesday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> wednesday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> wednesday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>
     <div class='row' >
         <div class='col-md-2'>
             <label>Thursday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="thursday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;;">
                 <option value="00am" <?php if($store -> thursday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> thursday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> thursday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> thursday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> thursday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> thursday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> thursday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> thursday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> thursday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> thursday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> thursday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> thursday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> thursday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> thursday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> thursday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> thursday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> thursday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> thursday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> thursday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> thursday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> thursday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> thursday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> thursday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> thursday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="thursday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> thursday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> thursday_close=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> thursday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> thursday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> thursday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> thursday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> thursday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> thursday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> thursday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> thursday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> thursday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> thursday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> thursday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> thursday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> thursday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> thursday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> thursday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> thursday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> thursday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> thursday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> thursday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> thursday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> thursday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> thursday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>
     <div class='row' >
         <div class='col-md-2'>
             <label>Friday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="friday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> friday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> friday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> friday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> friday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> friday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> friday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> friday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> friday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> friday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> friday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> friday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> friday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> friday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> friday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> friday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> friday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> friday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> friday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> friday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> friday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> friday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> friday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> friday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> friday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="friday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00" <?php if($store -> friday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> friday_close=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> friday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> friday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> friday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> friday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> friday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> friday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> friday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> friday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> friday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> friday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> friday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> friday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> friday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> friday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> friday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> friday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> friday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> friday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> friday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> friday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> friday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> friday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>
     <div class='row' >
         <div class='col-md-2'>
             <label>saturday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="saturday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> saturday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> saturday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> saturday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> saturday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> saturday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> saturday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> saturday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> saturday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> saturday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> saturday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> saturday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> saturday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> saturday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> saturday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> saturday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> saturday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> saturday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> saturday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> saturday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> saturday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> saturday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> saturday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> saturday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> saturday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="saturday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> saturday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> saturday_close=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> saturday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> saturday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> saturday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> saturday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> saturday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> saturday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> saturday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> saturday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> saturday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> saturday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> saturday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> saturday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> saturday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> saturday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> saturday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> saturday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> saturday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> saturday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> saturday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> saturday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> saturday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> saturday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>
     <div class='row' >
         <div class='col-md-2'>
             <label>Sunday</label>
         </div>
         <div class='col-md-1'>
             <select id="" name="sunday_open" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> sunday_open=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> sunday_open=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> sunday_open=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> sunday_open=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> sunday_open=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> sunday_open=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> sunday_open=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> sunday_open=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> sunday_open=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> sunday_open=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> sunday_open=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> sunday_open=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> sunday_open=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> sunday_open=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> sunday_open=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> sunday_open=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> sunday_open=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> sunday_open=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> sunday_open=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> sunday_open=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> sunday_open=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> sunday_open=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> sunday_open=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> sunday_open=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
         <div class='col-md-1'>

             <select id="" name="sunday_close" class="form-control form-control-sm" style="border-radius:5px;padding: 0px;margin: 3px;">
                 <option value="00am" <?php if($store -> sunday_close=='00am') echo"selected";  ?>>00am</option>
                 <option value="01am" <?php if($store -> sunday_close=='01am') echo"selected";  ?>>01am </option>
                 <option value="02am" <?php if($store -> sunday_close=='02am') echo"selected";  ?>>02am</option>
                 <option value="03am" <?php if($store -> sunday_close=='03am') echo"selected";  ?>>03am </option>
                 <option value="04am" <?php if($store -> sunday_close=='04am') echo"selected";  ?>>04am</option>
                 <option value="05am" <?php if($store -> sunday_close=='05am') echo"selected";  ?>>05am </option>
                 <option value="06am" <?php if($store -> sunday_close=='06am') echo"selected";  ?>>06am</option>
                 <option value="07am" <?php if($store -> sunday_close=='07am') echo"selected";  ?>>07am </option>
                 <option value="08am" <?php if($store -> sunday_close=='08am') echo"selected";  ?>>08am</option>
                 <option value="09am" <?php if($store -> sunday_close=='09am') echo"selected";  ?>>09am </option>
                 <option value="10am" <?php if($store -> sunday_close=='10am') echo"selected";  ?>>10am</option>
                 <option value="11am" <?php if($store -> sunday_close=='11am') echo"selected";  ?>>11am </option>
                 <option value="12pm" <?php if($store -> sunday_close=='12pm') echo"selected";  ?>>12pm</option>
                 <option value="13pm" <?php if($store -> sunday_close=='13pm') echo"selected";  ?>>13pm </option>
                 <option value="14pm" <?php if($store -> sunday_close=='14pm') echo"selected";  ?>>14pm</option>
                 <option value="15pm" <?php if($store -> sunday_close=='15pm') echo"selected";  ?>>15pm </option>
                 <option value="16pm" <?php if($store -> sunday_close=='16pm') echo"selected";  ?>>16pm</option>
                 <option value="17pm" <?php if($store -> sunday_close=='17pm') echo"selected";  ?>>17pm </option>
                 <option value="18pm" <?php if($store -> sunday_close=='18pm') echo"selected";  ?>>18pm</option>
                 <option value="19pm" <?php if($store -> sunday_close=='19pm') echo"selected";  ?>>19pm </option>
                 <option value="20pm" <?php if($store -> sunday_close=='20pm') echo"selected";  ?>>20pm</option>
                 <option value="21pm" <?php if($store -> sunday_close=='21pm') echo"selected";  ?>>21pm </option>
                 <option value="22pm" <?php if($store -> sunday_close=='22pm') echo"selected";  ?>>22pm </option>
                 <option value="23pm" <?php if($store -> sunday_close=='23pm') echo"selected";  ?>>23pm </option>
             </select>
         </div>
     </div>








     <div class='row' style="margin-top: 25px;">
         <div class='col-sm-12' style="text-align: center;margin: 0px;">
             <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
         </div>
     </div>
 </form>


@stop
