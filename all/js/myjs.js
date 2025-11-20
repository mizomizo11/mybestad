$(document).ready(function(){

    $("#sender_mobile_btn").click(function () {
        var sender_mobile = $("#sender_mobile").val();
        // alert(sender_mobile);
        if (sender_mobile == '') {
            Lobibox.notify('error', {
                continueDelayOnInactiveTab: true,
                position: 'bottom left',
                size: 'mini',
                msg: '<h5 style="font-family: font2">الرجاء ادخال رقم موبايل </h5>'
            });
        } else {
            $.ajax({
                beforeSend: function() {
                    Swal.showLoading();
                },
                type: 'get',
                // '{{ url('/') }}/'
                url: '{{ url("/dashboard/address_book/get_one_in_json") }}' + sender_mobile ,
                // data:  {sender_mobile:sender_mobile},
                async: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if (data["status"] == "true") {
                        $("#sender_name").val(data["arr"].name);
                        $("#sender_contact_person").val(data["arr"].contact_person);
                        $("#sender_address_line_one").val(data["arr"].address);
                        $("#sender_mobile").val(data["arr"].mobile);
                        $("#sender_country_id").val(data["arr"].country_id);
                        $("#sender_city_id").val(data["arr"].city_id);
                        $("#sender_phone").val(data["arr"].phone);
                        $("#sender_email").val(data["arr"].email);

                        $('#bill_to').find('option').remove().end();
                        $('#bill_to').append('<option value="cash_sender">المرسل - كاش</option>');
                        $('#bill_to').addClass('input-disabled');
                        $('#bill_to').attr('readonly', true);


                    } else {
                        Lobibox.notify('error', {
                            continueDelayOnInactiveTab: true,
                            position: 'bottom left',
                            size: 'mini',
                            msg: '<h5 style="font-family: font2">رقم الموبايل المدخل غير صحيح</h5>'
                        });

                        $("#sender_name").val("");
                        $("#sender_contact_person").val("");
                        $("#sender_address_line_one").val("");
                        $("#sender_mobile").val("");
                        $("#sender_country_id").val("");
                        $("#sender_city_id").val("");
                        $("#sender_phone").val("");
                        $("#sender_email").val("");

                    }



                    Swal.close();



                },

            });

        }


    });



});

