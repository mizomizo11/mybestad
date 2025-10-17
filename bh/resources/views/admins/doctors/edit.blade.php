@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}"> الصفحة الرئيسية  </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/doctors') }}">ادارة الاطباء المشتركين</a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')
    <form  method="POST" action="{{url(app()->getLocale()."/admins/doctors/update")}}"  enctype="multipart/form-data"  style="">
        @csrf
        <input  type="hidden" name="id"  value="{{$doctor -> id}}" />
        <div class="row">
            <div class="col-md-6" style="margin: auto">

                <div class='row' style="padding-top: 20px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.name') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="name" value="{{$doctor->name}}" id="name"   class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.age') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="age" id="age" value="{{$doctor->age}}"   class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >* {{ __('site.mobile') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="mobile" value="{{$doctor->mobile}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >* {{ __('site.email') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="email" value="{{$doctor->email}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >*{{ __('site.password') }}</label>
                    </div>
                    <div class='col-md-6'>
                        <input type="text" name="password" value="{{$doctor->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm" required=""    />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4'>
                        <label style="font-weight: bold;" >* {{ __('site.password_confirmation') }}</label>
                    </div>
                    <div class='col-md-6'>
                        <input  type="text" name="password2" value="{{$doctor->password}}" style="direction: ltr;text-align: left" class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 30px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.specialty') }}</label>
                    </div>
                    <div class="col-md-6">
                        <select id="" name="specialty_id" class="form-control form-control-sm" style="border-radius:5px">
                            @foreach ($specialties as $specialty)
                                @if ($specialty -> id == $doctor -> specialty_id)
                                    <option value="{{$specialty -> id}}" selected>{{$specialty -> name_ar}}</option>
                                @else
                                    <option value="{{$specialty -> id}}" >{{$specialty -> name_ar}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.years_of_experience') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="years_of_experience" id="years_of_experience" value="{{$doctor->years_of_experience}}"    class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.place_of_work') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="place_of_work" id="place_of_work" value="{{$doctor->place_of_work}}"    class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="padding-top: 5px;">
                    <div class="col-md-4">
                        <label style="font-weight: bold;" >* {{ __('site.certificate_issuer') }}</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="certificate_issuer" id="certificate_issuer" value="{{$doctor->certificate_issuer}}"    class="form-control form-control-sm"  required=""  />
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  >* الدولة </label>
                    </div>
                    <div class='col-md-6'>
                        <select name="country_id" class="form-control form-control-sm" style="border-radius:5px">
                            @foreach ($countries as $country)
                              <option value="{{$country -> id}}" @if ($country -> id == $doctor -> country_id)   selected @endif>{{$country ->{'name_'.app()->getLocale()} }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  >* {{ __('site.timezone') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <select  name="timezone_id" class="form-control form-control-sm" style="border-radius:5px;text-align: left">
                            @foreach ($timezones as $timezone)
                                <option value="{{$timezone -> id}}"  @if ($timezone -> id == $doctor -> timezone_id) selected @endif>{{$timezone -> name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  > {{ __('site.personal_image') }} </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input class="form-control form-control-sm"  type="file"   name="personal_image"  />
                    </div>
                    <div class='col-md-2'>
                        <div >
                              <div >
                                  <img class="zoom_it" src="{{url(Config::get('app.upload'))}}/{{  $doctor -> personal_image }}" style="width:40px;height:30px">
                                  <a  class="btn btn-xs btn-danger delete_image_btn" data-id="{{  $doctor -> id }}" data-name="personal_image" data-url="{{url(app()->getLocale()."/admins/doctors/delete-image")}}"  style="width: 30px;">
                                      <i class="fa fa-trash-alt text-110 text-white mr-1"></i>
                                  </a>



                              </div>
                        </div>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  > {{ __('site.certificate_image') }}  </label>
                    </div>
                    <div class='col-md-6'>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                        <input class="form-control form-control-sm"  type="file"   name="certificate_image"  />
                    </div>
                    <div class='col-md-2'>
                        <div >

                            <img class="zoom_it" src="{{url(Config::get('app.upload'))}}/{{  $doctor -> certificate_image }}" style="width:40px;height:30px">


                            <a  class="btn btn-xs btn-danger delete_image_btn" data-id="{{  $doctor -> id }}" data-name="certificate_image" data-url="{{url(app()->getLocale()."/admins/doctors/delete-image")}}"  style="width: 30px;">
                                <i class="fa fa-trash-alt text-110 text-white mr-1"></i>
                            </a>


                        </div>
                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  >مقفل  </label>
                    </div>
                    <div class='col-md-6'>
                        <select id="" name="locked" class="form-control form-control-sm " style="border-radius:5px" >
                            <option value="yes" @if ( $doctor -> locked=="yes")   selected @endif>Yes</option>
                            <option value="no"  @if ( $doctor -> locked=="no")   selected @endif>NO</option>
                        </select>

                    </div>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-4 '>
                        <label style="font-weight: bold;"  >ايقاف مؤقت  من الطبيب  </label>
                    </div>
                    <div class='col-md-6'>
                        <select id="" name="stopped" class="form-control form-control-sm " style="border-radius:5px" >
                            <option value="yes" @if ( $doctor -> stopped=="yes")   selected @endif>Yes</option>
                            <option value="no"  @if ( $doctor -> stopped=="no")   selected @endif>NO</option>
                        </select>

                    </div>
                </div>


            </div>
            <div class="col-md-6" style="margin: auto">
            </div>
        </div>
                <link rel="stylesheet" href="{{ asset('all/suneditor/suneditor.min.css') }}"/>
                <script src="{{ asset('all/suneditor/suneditor.min.js') }}"></script>
                <script src="{{ asset('all/suneditor/en.js') }}"></script>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-12'>
                        <label>التفاصيل - عربي</label>
                        <textarea id="details_ar" name="details_ar"
                                  style="direction: rtl;text-align: right;height: 150px;width: 100%">{{$doctor -> details_ar}}</textarea>
                    </div>
                    <script>
                        const editor = SUNEDITOR.create((document.getElementById('details_ar')),
                            {
                                "mode": "classic",
                                "rtl": false,
                                "katex": "window.katex",
                                "imageGalleryUrl": "https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo",
                                "videoFileInput": false,
                                "tabDisable": false,
                                "buttonList": [
                                    [
                                        "undo",
                                        "redo",
                                        "font",
                                        "fontSize",
                                        "formatBlock",
                                        "paragraphStyle",
                                        "blockquote",
                                        "bold",
                                        "underline",
                                        "italic",
                                        "strike",
                                        "subscript",
                                        "superscript",
                                        "fontColor",
                                        "hiliteColor",
                                        "textStyle",
                                        "removeFormat",
                                        "outdent",
                                        "indent",
                                        "align",
                                        "horizontalRule",
                                        "list",
                                        "lineHeight",
                                        "table",
                                        "link",
                                        "image",
                                        "video",
                                        "audio",
                                        "math",
                                        "imageGallery",
                                        "fullScreen",
                                        "showBlocks",
                                        "codeView",
                                        "preview",
                                        "print",
                                        "save",
                                        "template"
                                    ]
                                ],
                                "lang": SUNEDITOR_LANG.en,
                                "lang(In nodejs)": "en"
                            }
                        );
                        editor.onChange = (contents, core) => {
                            editor.save();
                        }
                    </script>
                </div>
                <div class='row' style="margin-top: 5px;">
                    <div class='col-md-12'>
                        <label>التفاصيل - انكليزي</label>
                        <textarea id="details_en" name="details_en"  style="direction: ltr;text-align: left;height: 150px;width: 100%"  >{{$doctor -> details_en}}</textarea>
                    </div>
                    <script>
                        const editor2 = SUNEDITOR.create((document.getElementById('details_en') ),
                            {
                                "mode": "classic",
                                "rtl": false,
                                "katex": "window.katex",
                                "imageGalleryUrl": "https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo",
                                "videoFileInput": false,
                                "tabDisable": false,
                                "buttonList": [
                                    [
                                        "undo",
                                        "redo",
                                        "font",
                                        "fontSize",
                                        "formatBlock",
                                        "paragraphStyle",
                                        "blockquote",
                                        "bold",
                                        "underline",
                                        "italic",
                                        "strike",
                                        "subscript",
                                        "superscript",
                                        "fontColor",
                                        "hiliteColor",
                                        "textStyle",
                                        "removeFormat",
                                        "outdent",
                                        "indent",
                                        "align",
                                        "horizontalRule",
                                        "list",
                                        "lineHeight",
                                        "table",
                                        "link",
                                        "image",
                                        "video",
                                        "audio",
                                        "math",
                                        "imageGallery",
                                        "fullScreen",
                                        "showBlocks",
                                        "codeView",
                                        "preview",
                                        "print",
                                        "save",
                                        "template"
                                    ]
                                ],
                                "lang": SUNEDITOR_LANG.en,
                                "lang(In nodejs)": "en"
                            }

                        );
                        editor2.onChange = (contents, core) => {
                            editor2.save();
                        }

                    </script>
                </div>





            </div>
        </div>
        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;font-family: font2;;">تحديث</button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.delete_image_btn', function(e){
                e.preventDefault();


                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "هل انت متاكد؟",
                    text: "لن تستطيع التراجع عن هذه الخطوة ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        var data_id = $(this).attr("data-id");
                        var data_name = $(this).attr("data-name");
                        var url = $(this).attr("data-url");
                        //  var final_url=data_url+"/"+data_id
                        $.ajax({
                            beforeSend: function() {
                                Swal.showLoading();
                            },
                            url:url,
                            method:"POST",
                            data:{"_token": "{{ csrf_token() }}" ,id:data_id,col_name:data_name,},
                            success:function(data)
                            {
                                if(data.status === "true" )
                                {
                                    swal.close();
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success",
                                        timer: 2000,
                                        timerProgressBar: true,
                                    });
                                   // window.history.back();
                              //      window.navigate("{{url(app()->getLocale()."/admins/doctors")}}")
                                 //   setTimeout(function(){ ; }, 3000);
                                    // Lobibox.notify('success', {
                                    //     continueDelayOnInactiveTab: true,
                                    //     position: 'bottom left',
                                    //     size: 'mini',
                                    //     delay: 2000,
                                    //     msg: '<h5 >تم الحذف بنجاح..!</h5>'
                                    // });
                                }else{
                                     console.log(data)
                                }

                                //$('#example').DataTable().ajax.reload();

                               setTimeout(function(){ location.reload(); }, 3000);
                            }
                        })


                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "تم الالغاء",
                            text: "..",
                            icon: "error"
                        });
                    }
                });


            });
        });
    </script>

@stop
