@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')
    <form id="form11">
        @csrf
    <div class="container" style=";padding-top: 50px;margin-bottom: 50px;text-align: right    ;direction:  rtl  ">
        <div class="row">


            <div class="modal-body cc">
            </div>


            <div class="container">
                <div class="row " style="margin: auto;background-color: #f6f7f7;border: 1px solid #153ea455;border-radius: 5px;
                    text-align: right;direction: rtl;width: 700px">
                    <div class="col-md-4  hoverdiv" style="">
                        <hr class="d-sm-none">
                        <div class="text-grey-m2">

                            <div class="my-2">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span> تاريخ الطلب
                                :</span> <?php date("d/m/Y H:i:sa"); ?>
                            </div>
                            <div class="my-2 text-danger ">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                    class="text-600 text-danger"> طريقة الدفع :</span>



                                <select  name="payment_method" class="form-control form-control-sm col-md-8 " style="border-radius:5px" required="" >


                                    <option value="كاش">كاش</option>
                                    <option value="سيريتل كاش">سيريتل كاش</option>
                                    <option value="فيزا كارد">فيزا كارد</option>
                                    <option value="الهرم">الهرم</option>


                                </select>




                            </div>

                            <div class="my-2">
                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90"> حالة الطلب   : </span>
                                <span class="badge badge-warning badge-pill px-25">not send</span>
                            </div>
                        </div>


                    </div><!-- /.col -->

                    <div class=" col-md-8  " style="padding: 10px;border-left:1px solid #eee;">
                        <div class='row' style="">
                            <div class="col-md-6">
                                الاسم :
                            </div>
                            <div class="col-md-4">
                                <label style="font-weight: bold;"> {{session("customer_name")}}</label>
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class="col-md-4">
                                <label style="font-weight: bold;"> الموبايل</label>
                            </div>
                            <div class="col-md-6">
                                {{session("customer_mobile")}}
                            </div>
                        </div>
                        <div class='row' style="margin-top: 5px;">
                            <div class='col-md-4'>
                                <label> الايميل : </label>
                            </div>
                            <div class='col-md-3'>
                                {{session("customer_email")}}
                            </div>
                        </div>

                    </div><!-- /.col -->

                </div>
            </div>


            <div class="container">

                    <div class='row' >
                        <div class='col-md-6' style="margin: auto">
                            <div>
                                <label>عنوان الشحن </label>
                            </div>
                            <div>
                                <input type="text" name="address" class="form-control form-control-sm"
                                       style="direction: rtl;text-align: right" required=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:20px">
                        <a href="#" class="btn btn-lg btn-success order_insert_btn " style="margin: auto;">ارسال
                            الطلب</a>
                    </div>

            </div>

            </form>
            <script>
                $(document).ready(function () {


                    load_cart_data();

                    function load_cart_data() {

                        $.ajax({
                            url: "{{url(app()->getLocale()."/cart/fetch")}}",
                            method: "get",
                            dataType: "json",
                            success: function (data) {
                                // console.log(data);
                                //alert(data.cart_details);
                                $('#cart_details').html(data.cart_details);
                                $('.total_price').text(data.total_price);
                                $('.my-cart-icon').text(data.total_item);

                                $('.modal-body.cc').html(data.cart_details);

                                // show modal
                                //  $('#exampleModal').modal('show');


                            }
                        });
                    }

                    $('#cart-popover').popover({
                        html: true,
                        container: 'body',
                        content: function () {
                            return $('#popover_content_wrapper').html();

                        }
                    });

                    $(document).on('click', '.add_to_cart', function () {


                        var product_id = $(this).attr("data-id");
                        //	var product_name = $('#name'+product_id+'').val();
                        //	var product_price = $('#price'+product_id+'').val();
                        var product_quantity = $('#quantity' + product_id).val();
                        var action = "add";

                        if (product_quantity == undefined) {
                            product_quantity = 1;
                        }
                        //    alert(product_quantity);
                        var product_id = $(this).attr("product_id");
                        var product_name = $(this).attr("product_name");
                        var product_price = $(this).attr("product_price");

                        var store_id = $(this).attr("store_id");
                        var store_name = $(this).attr("store_name");
                        //var product_name = $(this).attr("product_price");


                        //alert(product_name);
                        //  alert(store_id);
                        // alert(store_name);


                        if (product_quantity > 0) {
                            $.ajax({

                                url: "{{url(app()->getLocale()."/cart/add")}}",
                                method: "post",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    product_id: product_id,
                                    product_name: product_name,
                                    product_price: product_price,
                                    product_quantity: product_quantity,
                                    action: action,
                                    store_id: store_id,
                                    store_name: store_name
                                },
                                success: function (data) {


                                    load_cart_data();

                                    Lobibox.notify('success', {
                                        continueDelayOnInactiveTab: true,
                                        position: 'bottom left',
                                        size: 'mini',
                                        msg: '<h5 style="font-family:font2">تم الاضافة بنجاح</h5>'
                                    });

                                    //alert("Item has been Added into Cart");
                                }
                            });
                        } else {
                            alert("lease Enter Number of Quantity");
                        }
                    });

                    $(document).on('click', '.delete', function () {

                        var product_id = $(this).attr("id");
                        alert(product_id);
                        if (confirm("Are you sure you want to remove this product?")) {
                            $.ajax({
                                url: "{{url(app()->getLocale()."/cart/delete_item")}}",
                                // url:"cart_action.php",
                                method: "POST",
                                data: {"_token": "{{ csrf_token() }}", product_id: product_id,},
                                success: function () {
                                    load_cart_data();
                                    // $('#cart-popover').popover('hide');
                                    // alert("Item has been removed from Cart");
                                }
                            })
                        } else {
                            return false;
                        }
                    });

                    $(document).on('click', '#clear_cart', function () {

                        $.ajax({
                            url: "{{url(app()->getLocale()."/cart/empty_cart")}}",
                            method: "get",
                            // data:{action:action},
                            success: function () {
                                load_cart_data();
                                $('#cart-popover').popover('hide');
                                alert("Your Cart has been clear");
                            }
                        });
                    });


                });

            </script>

            <script>
                $(document).ready(function () {

                    $(".order_insert_btn").click(function (e) {
                        e.preventDefault()

                        //alert("ans");
                        var formData = new FormData($("#form11")[0]);

                        formData.append('_token', '{{ csrf_token() }}');
                        $.ajax(
                            {
                                beforeSend: function () {
                                    Swal.showLoading();
                                },
                                type: "post", // replaced from put
                                url: "{{url(app()->getLocale()."/orders/store")}}",
                                //url :  "ajax/register.php",
                                data: formData,
                                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                                processData: false, // NEEDED, DON'T OMIT THIS
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status == "true") {
                                        Lobibox.notify('success', {
                                            continueDelayOnInactiveTab: true,
                                            position: 'bottom left',
                                            size: 'mini',
                                            msg: '<h5>تم التسجيل بنجاح </h5>'
                                        });

                                        setTimeout(function () {
                                            window.location.href = '/{{App::getLocale()}}/';
                                        }, 2000);


                                    } else {
                                        Lobibox.notify('warning', {
                                            continueDelayOnInactiveTab: true,
                                            position: 'bottom right',
                                            size: 'mini',
                                            msg: '<h5>فشل</h5>'
                                        });


                                    }


                                    Swal.close();
                                },
                                error: function (xhr) {
                                    // alert(xhr)
                                    // do something here because of error
                                }
                            });


                    });


                });


            </script>

@endsection



