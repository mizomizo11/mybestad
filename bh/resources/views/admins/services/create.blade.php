@extends('layouts.admin.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/services/') }}"> ادارة الخدمات</a></li>
                <li class="breadcrumb-item  text-grey-d1" >اضافة   </li>
            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')
    <form  method="POST" id="form-5"  action="{{url(app()->getLocale()."/admins/services/store")}}"  enctype="multipart/form-data"  style="">
      @csrf
        <div class='row' >
            <div class='col-md-3'>
                <div>
                    <label>الخدمة  - عربي</label>
                    <input type="text" class="form-control form-control-sm" name="name_ar"    required/>
                </div>
            </div>
            <div class='col-md-3'>
                <div >
                    <label>الخدمة  - انكليزي</label>
                    <input type="text"  class="form-control form-control-sm"  name="name_en" required  />
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>الترتيب</label>
                    <input type="number" value="0"  class="form-control form-control-sm"  name="record_order"    />
                </div>
            </div>
            <div class='col-md-2'>
                <div >
                    <label>صورة</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input class="form-control form-control-sm"  type="file"   name="image_file"  />
                </div>
            </div>
        </div>
        <div class='row' style="margin-top: 65px;">
            <div class='col-md-6'>
                <label >ملخص - عربي</label>
                <textarea   id="summary" name="summary_ar" maxlength="200"  class="form-control" ></textarea>
            </div>
            <script>
                $(document).ready(function () {
                    $('#summary').maxlength({
                        alwaysShow: true,
                        allowOverMax: false,
                        warningClass: "badge badge-danger",
                        limitReachedClass: "badge badge-warning",
                        placement: 'bottom-left-inside'
                    });
                })
            </script>
            <div class='col-md-6'>
                <label >ملخص - انكليزي</label>
                <textarea  id="summary_eng" name="summary_en" maxlength="200" style="direction: ltr;text-align: left" class="form-control" ></textarea>
            </div>
            <script>
                $(document).ready(function () {
                    $('#summary_eng').maxlength({
                        alwaysShow: true,
                        allowOverMax: false,
                        warningClass: "badge badge-danger",
                        limitReachedClass: "badge badge-warning",
                        placement: 'bottom-right-inside'
                    });
                })
            </script>
        </div>


        <div class="col-md-12">
            <div>
                <label>تفاصيل عربي  </label>
                <div style="direction: ltr;text-align: left">
                <textarea name="details" id="details"
                          class="form-control form-control-sm col-md-12"
                          style="border-radius:5px"
                          required="" ></textarea>
                </div>
            </div>
        </div>

        <div class="col-md-12" >
            <div>
                <label>تفاصيل انكليزي  </label>
                <div style="direction: ltr;text-align: left">
                <textarea name="details_eng" id="details_eng"
                          class="form-control form-control-sm col-md-12"
                          style="border-radius:5px"
                          required="" ></textarea>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                //update icons
                $.extend($.summernote.options.icons, {
                    'align': 'fa fa-align',
                    'alignCenter': 'fa fa-align-center',
                    'alignJustify': 'fa fa-align-justify',
                    'alignLeft': 'fa fa-align-left',
                    'alignRight': 'fa fa-align-right',
                    'indent': 'fa fa-indent',
                    'outdent': 'fa fa-outdent',
                    'arrowsAlt': 'fa fa-arrows-alt',
                    'bold': 'fa fa-bold',
                    'caret': 'fa fa-caret-down text-grey-m3 ml-1',
                    'circle': 'fa fa-circle',
                    'close': 'fa fa fa-close',
                    'code': 'fa fa-code',
                    'eraser': 'fa fa-eraser',
                    'font': 'fa fa-font',
                    'italic': 'fa fa-italic',
                    'link': 'fa fa-link text-success-m1',
                    'unlink': 'fas fa-unlink',
                    'magic': 'fa fa-magic text-brown-m3',
                    'menuCheck': 'fa fa-check',
                    'minus': 'fa fa-minus',
                    'orderedlist': 'fa fa-list-ol text-blue',
                    'pencil': 'fa fa-pencil',
                    'picture': 'far fa-image text-purple',
                    'question': 'fa fa-question',
                    'redo': 'fa fa-repeat',
                    'square': 'fa fa-square',
                    'strikethrough': 'fa fa-strikethrough',
                    'subscript': 'fa fa-subscript',
                    'superscript': 'fa fa-superscript',
                    'table': 'fa fa-table text-danger-m2',
                    'textHeight': 'fa fa-text-height',
                    'trash': 'fa fa-trash',
                    'underline': 'fa fa-underline',
                    'undo': 'fa fa-undo',
                    'unorderedlist': 'fa fa-list-ul text-blue',
                    'video': 'far fa-file-video text-pink-m2'
                });

                $('#details').summernote({
                    height: 150,
                    minHeight: 150,
                    maxHeight: 400
                });
                $('#details_eng').summernote({
                    height: 150,
                    minHeight: 150,
                    maxHeight: 400,

                });
            });
        </script>




        <div class='row' style="margin-top: 25px;">
            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">اضافة</button>
            </div>
        </div>
    </form>

@stop
