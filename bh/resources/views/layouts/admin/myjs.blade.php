<script>
    $(document).ready(function () {
       // TinyDatePicker(document.querySelector('input'));

        $(document).on("click", ".show_error_message", function (e) {
       // $(".show_error_message").click(function () {
            Lobibox.notify('error', {
                continueDelayOnInactiveTab: true,
                position: 'bottom left',
                size: 'mini',
                msg: '<h5 style="font-family: font2">لا تملك الصلاحية المناسبة </h5>'
            });
        });






        $("#country_id").change(function () {
            var country_id = $("#country_id").val();
            alert("ssss");
             $.ajax({
                beforeSend: function () {
                    Swal.showLoading();
                },
                url: "{{url(app()->getLocale().'/countries')}}/" + country_id,
                type: 'get',
                async: false,
                dataType: 'json',
                success: function (data) {
                    $('#area_id').find('option').remove().end();
                    for (var i = 0; i < data.length; i++) {
                        $('#area_id').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                    $("#area_id").change();
                },
                complete: function () {
                    Swal.close();
                                   }
            });

        });


        $("#area_id").change(function () {
            var area_id = $("#area_id").val();
            $.ajax({
                beforeSend: function () {
                    Swal.showLoading();
                },
                url: "{{url('/dashboard/areas')}}/" + area_id ,
                type: 'get',
                async: false,
                dataType: 'json',
                success: function (data) {
                    $('#area_id').find('option').remove().end();
                    for (var i = 0; i < data.length; i++) {
                        $('#area_id').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                },
                complete: function () {
                    Swal.close();
                }
            });

        });





    });

</script>
