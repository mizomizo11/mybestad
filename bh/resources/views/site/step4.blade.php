

<link href="/all/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
<form id="form9" action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row"  style="margin:auto;border : 0 solid #ccc;padding: 0;">
        <div class="col-md-12" >
            <h4 style="text-align: center;">{{ __('site.attach_files') }} </h4>
{{--            <input type="hidden" name="patient_id" id="patient_id" value=" {{Auth::guard("patient")->user()->id}}"><br>--}}
{{--            <input type="hidden" name="doctor_id" id="doctor_id" value="{{session("the_doctor_id")}}">--}}
            <input type="hidden" name="id" id="id" value="{{$consultation->id}}">
            <input type="file" name="images_files" data-fileuploader-files='{{$preloadedFiles}}'>
            <div class="col-md-6" style="text-align: center !important;margin: auto;">
                <div class="progress" style="display: none">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                         aria-valuemin="0" aria-valuemax="100" style="width:0%"> 0%
                    </div>
                </div>
                <button class="btn btn-md btn-info " id="save_files_btn" type="button"> {{ __('site.submit') }}</button>
            </div>
        </div>
    </div>
</form>
{{--{{$preloadedFiles}}--}}
<script>
    $(document).ready(function() {
        // enable fileuploader plugin
        $('input[name="images_files"]').fileuploader({
            extensions: null,
            changeInput: ' ',
            theme: 'thumbnails',
            enableApi: true,
            addMore: true,
            thumbnails: {
                box: '<div class="fileuploader-items">' +
                    '<ul class="fileuploader-items-list">' +
                    '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                    '</ul>' +
                    '</div>',
                item: '<li class="fileuploader-item">' +
                    '<div class="fileuploader-item-inner">' +
                    '<div class="type-holder">${extension}</div>' +
                    '<div class="actions-holder">' +
                    '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                    '</div>' +
                    '<div class="thumbnail-holder">' +
                    '${image}' +
                    '<span class="fileuploader-action-popup"></span>' +
                    '</div>' +
                    '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                    '<div class="progress-holder">${progressBar}</div>' +
                    '</div>' +
                    '</li>',
                item2: '<li class="fileuploader-item">' +
                    '<div class="fileuploader-item-inner">' +
                    '<div class="type-holder">${extension}</div>' +
                    '<div class="actions-holder">' +
                    '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                    '<button iddd="${idd}" type="button" class="fileuploader-action fileuploader-action-remove delete_btn" " data_id="${data.idd}"  title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                    '</div>' +
                    '<div class="thumbnail-holder">' +
                    '${image}' +
                    '<span class="fileuploader-action-popup"></span>' +
                    '</div>' +
                    '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                    '<div class="progress-holder">${progressBar}</div>' +
                    '</div>' +
                    '</li>',
                removeConfirmation: false,
                startImageRenderer: true,
                canvasImage: false,
                _selectors: {
                    list: '.fileuploader-items-list',
                    item: '.fileuploader-item',
                    start: '.fileuploader-action-start',
                    retry: '.fileuploader-action-retry',
                    // remove: '.fileuploader-action-remove'
                },
                onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                    if(item.format == 'image') {
                        item.html.find('.fileuploader-item-icon').hide();
                    }
                },
                onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    html.children().animate({'opacity': 0}, 200, function() {
                        html.remove();

                        if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                            plusInput.show();
                    });
                }
            },
            dragDrop: {
                container: '.fileuploader-thumbnails-input'
            },
            afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));

                plusInput.on('click', function() {
                    api.open();
                });

                api.getOptions().dragDrop.container = plusInput;
            },


        });

        $("#save_files_btn").click(function (e) {
            e.preventDefault();
            var formData = new FormData($("#form9")[0]);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax(
                {
                    beforeSend: function () {
                        Swal.showLoading();
                    },

                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                console.log(percentComplete);

                                $('.progress').css('display',"block");

                                $('.progress-bar').width(percentComplete+'%');
                                $('.progress-bar').html(percentComplete+'%');


                                if (percentComplete === 100) {
                                    Swal.close();
                                    //  location.reload();
// alert("100");
                                }

                            }
                        }, false);

                        return xhr;
                    },
                    type: "post", // replaced from put
                    url: "{{url(app()->getLocale()."/consultations-files/save-files-from-modal")}}",
                    data: formData,
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false, // NEEDED, DON'T OMIT THIS
                    dataType: 'json',
                    success: function (data) {
                        //location.reload();
                        console.log(data);
                        if (data.status === "true") {
                            Lobibox.notify('success', {
                                continueDelayOnInactiveTab: true,
                                position: 'bottom left',
                                size: 'mini',
                                msg: '<h5>{{ __('site.successfully') }}</h5>'
                            });
                            //   window.reload();
                            setTimeout(function () {
                                Swal.close();
                                location.reload();
                                {{--//  window.location.reload = '/{{App::getLocale()}}/steps/{{session("the_doctor")->id}}#step-3';--}}
                            }, 2000);

                        } else {
                            Lobibox.notify('error', {
                                continueDelayOnInactiveTab: true,
                                position: 'bottom left',
                                size: 'mini',
                                msg: '<h5> فشلت العملية ...</h5>'
                            });
                            Swal.close();
                        }
                    },
                    error: function (xhr) {
                        // alert(xhr)
                        // do something here because of error
                    }
                });
        });


    });
</script>

<style>
    .fileuploader-popup{
        z-index: 10000000;
    }
    .fileuploader-popup{
        direction: ltr;
        text-align: left;
        /*max-height: 150px !important;*/

    }
    .fileuploader{
        padding: 10px !important;
        border: 1px dashed #ccc;
        text-align: left;
        /*padding-bottom: 10px !important;*/
        /*height: 250px;*/
    }

    .fileuploader-item-inner, .fileuploader-item{
        height: 150px !important;
        width: 150px !important;
        padding:0px !important;
    }

    .fileuploader-thumbnails-input{
        padding: 75px !important;
    }

</style>

<script>
    $(document).ready(function(){

        $(document).on('click', '.delete_btn', function(e){
            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "ِAre you sure?",
                text: "You will not be able to undo this step ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {



                    var data_id = $(this).attr("data_id");
                    $.ajax({
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        {{--url:"{{url(app()->getLocale().'/admins/customers/destroy/')}}/",--}}
                        url:"{{url(app()->getLocale().'/consultations-files/delete-file')}}",
                        method:"GET",
                        data:{"_token": "{{ csrf_token() }}",id:data_id, },
                        success:function(data)
                        {
                            if(data.status === "true" )
                            {
                                swal.close();
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: "Process is done",
                                    icon: "success",
                                    timer: 2000,
                                    timerProgressBar: true,
                                });

                                // Lobibox.notify('success', {
                                //     continueDelayOnInactiveTab: true,
                                //     position: 'bottom left',
                                //     size: 'mini',
                                //     delay: 2000,
                                //     msg: '<h5 >تم الحذف بنجاح..!</h5>'
                                // });
                            }else{
                                // alert("error")
                            }


                            // setTimeout(function() {
                            //    // location.reload()
                            // }, 2000);
                            // $('#example').DataTable().ajax.reload();


                            //setTimeout(function(){ location.reload(); }, 3000);
                        }
                    })


                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancel is done",
                        text: "..",
                        icon: "error"
                    });
                }
            });














        });



    });
</script>
