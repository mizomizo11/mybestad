@extends('layouts.dashboard.content')


@section('content')

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">

                <div class='row'  style="font-family:font2">
                    <div class='col-md-12'>
                        <div class="card  " id="card-1" draggable="" >
                            <div class="card-header  " style="padding: 0.15rem 1.25rem;">
                                <h5 class="card-title" style="text-align: center;">
                                    اضافة منتج
                                </h5>
                                <div class="card-toolbar">

                                    <a href="#" data-action="expand" class="card-toolbar-btn text-orange d-style" draggable="false">
                                        <i class="fa fa-expand d-n-active"></i>
                                        <i class="fa fa-compress d-active"></i>
                                    </a>
                                    <a href="#" data-action="toggle" class="card-toolbar-btn text-grey-m1" draggable="false"><i class="fa fa-chevron-up"></i></a>
                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body p-0 collapse show" >

                                <form id="products_add_form" enctype="multipart/form-data" style="direction: rtl">
                                    @csrf

                                    <fieldset style="border: 1px solid #dfdfdf;border-radius: 5px;" >
                                        <legend style="width: auto;margin-right: 20px;padding: 0px 10px" > معلومات المنتج </legend>
                                        <div class='row' style="padding: 20px">
                                            <div class="col-md-2" style="margin-bottom:10px ">
                                                <div>
                                                    <label> صورة المنتج  </label>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                                    <input class="form-control form-control-sm" type="file" name="imagefile"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="margin-bottom:30px ">
                                                <div>
                                                    <label> اسم المنتج  </label>
                                                    <input type="text" name="name"  class="form-control form-control-sm"  required=""/>
                                                </div>
                                            </div>

                                            <div class="col-md-2" >
                                                <div>
                                                    <label>التصنيف </label>
                                                    <select  name="categories_id"
                                                             class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                             required="">
                                                        <option value="الصنف 1"> الصنف 1</option>
                                                        <option value="الصنف 1">الصنف 2</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-2">
                                                <div>
                                                    <label> السعر </label>
                                                    <input type="text" name="price"  class="form-control form-control-sm"  required=""/>
                                                </div>
                                            </div>

                                            <div class="col-md-2" >
                                                <div>
                                                    <label>متوفر حاليا </label>
                                                    <select  name="is_available"
                                                             class="form-control form-control-sm col-md-12" style="border-radius:5px"
                                                             required="">
                                                        <option value="yes"> نعم</option>
                                                        <option value="no"> لا</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div>
                                                    <label>التفاصيل  </label>
                                                    <textarea name="details" class="form-control form-control-sm col-md-12" style="border-radius:5px" required="">   </textarea>
                                                </div>
                                            </div>





                                        </div>
                                    </fieldset>











                                    <div class="card-footer">
                                        <div class='row' style="margin-top: 25px;">
                                            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                                                <input type="button" class="btn btn-md bgcolor_red color_yellow products_btn_add" name="Submit" id="submit-btn"
                                                       value="Add" style="width: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                </form>




                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>




    <script>
        $(document).ready(function(){

            $(".products_btn_add").click(function(e){
                e.preventDefault()

                // alert("ans");
                var formData = new FormData($("#products_add_form")[0]);
                console.log(formData);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax(
                    {
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        type: "post", // replaced from put
                        url:"/{{app()->getLocale()}}/profile/products/store",
                        data:formData,
                        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                        processData: false, // NEEDED, DON'T OMIT THIS
                        dataType:'json',
                        success: function (data)
                        {



                            if(data.status == "true" )
                            {
                                Lobibox.notify('success', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom left',
                                    size: 'mini',
                                    msg: '<h5>تم الاضافة بنجاح </h5>'
                                });




                                setTimeout(function (){
                                    $(".jsPanel-modal-backdrop").hide();
                                    $(".jsPanel").hide();
                                    location.reload();
                                    //    window.location.href = '/{{App::getLocale()}}';
                                },2000);



                            }else{
                                Lobibox.notify('warning', {
                                    continueDelayOnInactiveTab: true,
                                    position: 'bottom right',
                                    size: 'mini',
                                    msg: '<h5>فشل</h5>'
                                });


                            }


                            Swal.close();
                        },
                        error: function(xhr) {
                            // alert(xhr)
                            // do something here because of error
                        }
                    });






            });





        });
    </script>

