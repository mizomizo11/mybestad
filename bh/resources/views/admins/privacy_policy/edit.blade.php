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

                <li class="breadcrumb-item active text-grey-d1" >ادارة سياسة الخصوصية </li>

            </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection

@section('content')

{{--    <link rel="stylesheet" href="{{  asset('all/richtexteditor/rte_theme_default.css')}}" />--}}
{{--    <script src="{{  asset('all/richtexteditor/rte.js')}}"></script>--}}
{{--    <script src="{{  asset('all/richtexteditor/plugins/all_plugins.js')}}"></script>--}}

<link rel="stylesheet" href="{{ asset('all/suneditor/suneditor.min.css') }}" />
<script src="{{ asset('all/suneditor/suneditor.min.js') }}"></script>
<script src="{{ asset('all/suneditor/en.js') }}"></script>



<form  method="POST"  id="postForm"  action="{{route('privacy_policy_update',['locale' => app()->getLocale()]) }}"  enctype="multipart/form-data"  style="">
    @csrf
    <input  type="hidden" class="form-control" name="id" value="{{ $privacy_policy -> id }}"   size="44" style="" />

    <div class='row' style="margin-top: 20px;">
        <div class='col-md-12'>
            <h6 style="">سياسة الخصوصية - عربي  </h6>
            <textarea id="details_ar"  name="details_ar" style="height: 300px;width: 100%">
                    {!! $privacy_policy -> details_ar !!}
            </textarea>
{{--            <script>--}}
{{--                var editor1 = new RichTextEditor("#div_editor1", { editorResizeMode: "none" });--}}
{{--            </script>--}}

            <script>
                /**
                 * ID : 'suneditor_sample'
                 * ClassName : 'sun-eidtor'
                 */

                const editor = SUNEDITOR.create((document.getElementById('details_ar') ),
                    {
                        "mode": "classic",
                        "rtl": false,
                        "katex": "window.katex",
                        "imageGalleryUrl": "https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo",
                        "videoFileInput": true,
                        "audioFileInput": true,
                        "tabDisable": true,
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
        <div class='col-md-12' style="margin-top: 50px">
            <h6 style="">سياسة الخصوصية - انكليزي </h6>
            <textarea id="details_en" style="width: 100%;height: 300px" name="details_en">
                    {{$privacy_policy -> details_en}}
            </textarea>
{{--            <script>--}}
{{--                var editor2 = new RichTextEditor("#div_editor2");--}}
{{--            </script>--}}

            <script>
                /**
                 * ID : 'suneditor_sample'
                 * ClassName : 'sun-eidtor'
                 */

                const editor2 = SUNEDITOR.create((document.getElementById('details_en') ),
                    {
                        "mode": "classic",
                        "rtl": false,
                        "katex": "window.katex",
                        "imageGalleryUrl": "https://etyswjpn79.execute-api.ap-northeast-1.amazonaws.com/suneditor-demo",
                        "videoFileInput": true,
                        "audioFileInput": true,
                        "tabDisable": true,
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
    <div class='row' style="margin-top: 25px;">
        <div class='col-sm-12' style="text-align: center;margin: 0px;">
            <button  class="btn btn-lg btn-info "  name="Submit"  type="Submit" style="width: 200px;">Update</button>
        </div>
    </div>
</form>



@stop
