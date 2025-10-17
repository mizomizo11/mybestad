<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;">

{{--                {{ __('site.login_as_patient') }}--}}
                تحديد موعد جديد

            </h3>
        </div>



    </div>
    <div class="row">
        <div class="col-md-12">
            <h3  style="color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;">
                <form id="new_app_form"    >
                    @csrf
                    <div class='row' >
                        <div class='col-md-6'>
                            <div>
                                <label>* {{ __('site.date') }}</label>
                            </div>
                            <div>
                                <input type="datetime-local" name="date_time"  class="form-control form-control-sm"  style="direction: ltr;text-align: left" required=""  />
                            </div>
                        </div>
                        <div class='col-md-6' style="text-align: center;margin: 0px;">
                            <div>
                                <label>.</label>
                            </div>
                            <button  class="btn btn-primary btn-sm  "  name="login_btn" id="save_btn"   style="width: 200px">{{ __('site.save') }}</button>
                        </div>
                    </div>


                </form>
            </h3>
        </div>



    </div>

</div>
<script>
    $(document).ready(function () {

        $("#save_btn").click(function(e){
            e.preventDefault()

            //alert("ans");
            var formData = new FormData($("#new_app_form")[0]);

            formData.append('_token', '{{ csrf_token() }}');
            $.ajax(
                {
                    beforeSend: function() {
                        Swal.showLoading();
                    },
                    type: "post", // replaced from put
                    url:"{{url(app()->getLocale()."/appointments/store")}}",
                    //url :  "ajax/register.php",
                    data:formData,
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false, // NEEDED, DON'T OMIT THIS
                    dataType:'json',
                    success: function (data)
                    {
                        if(data.status === "true" )
                        {
                            Lobibox.notify('success', {
                                continueDelayOnInactiveTab: true,
                                position: 'bottom left',
                                size: 'mini',
                                msg: '<h5>تم التسجيل بنجاح </h5>'
                            });

                            setTimeout(function (){
                                window.location.href = '/{{App::getLocale()}}/steps/105#step-3';
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
