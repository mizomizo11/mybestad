
<link rel="stylesheet" type="text/css" href="{{ asset('all/css/jquery.fileuploader.min.css')}}">
<link href="/all/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
<link href="/all/css/font-fileuploader.css" rel="stylesheet">




<div class="container" style="text-align: center !important;">
    <div class='row'>

        <div class="col-md-12">
            <h2 style="text-align: center;margin: 20px">    {{ __('site.attached_files') }} </h2>
            <div class="row "  style="margin:auto;border : 0 solid #ccc;padding: 0;text-align: left;direction: ltr">
                <div class="col-md-12" style="margin: auto">
{{--                   -- {{$consultation_files}}----}}
{{--                    -- {{$preloadedFiles}}----}}


                    {{--                    // data-fileuploader-files='{{@$preloadedFiles}}'--}}
                    <input type="file" name="product_files" id="files" data-fileuploader-files='{{@$preloadedFiles}}'>
                </div>
            </div>
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
                $(document).ready(function() {
                    // enable fileuploader plugin
                    // enable fileuploader plugin
                    $('input[name="product_files"]').fileuploader({
                        extensions: null,
                        changeInput: ' ',
                        theme: 'thumbnails',
                        enableApi: true,
                        addMore: true,
                        // limit: 1,
                        thumbnails: {
                            // box: '<div class="fileuploader-items ">' +
                            //     '<ul class="fileuploader-items-list">' +
                            //     '<li class="fileuploader-thumbnails-input " style="width: 150px !important;max-height: 150px !important"><div class="fileuploader-thumbnails-input-inner" style="width: 150px !important;max-height: 150px !important"><i>+</i></div></li>' +
                            //     '</ul>' +
                            //     '</div>',
                            // item: '<li class="fileuploader-item" >' +
                            //     '<div class="fileuploader-item-inner " >' +
                            //     '<div class="type-holder">${extension}</div>' +
                            //     '<div class="actions-holder" style="color:#fff;background-color:#00000099 !important;padding: 10px !important;border-radius: 3px">' +
                            //     '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                            //     '<button type="button" class="fileuploader-action fileuploader-action-sort" title="${captions.sort}"><i class="fileuploader-icon-sort"></i></button>' +
                            //     '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                            //     // '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                            //     '</div>' +
                            //     '<div class="thumbnail-holder">' +
                            //     '${image}' +
                            //     '<span class="fileuploader-action-popup"></span>' +
                            //     '</div>' +
                            //     '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                            //     '<div class="progress-holder">${progressBar}</div>' +
                            //     '</div>' +
                            //     '</li>',
                            item2: '<li class="fileuploader-item" style="border: 1px solid #d4d4d4;border-radius: 5px">' +
                                '<div class="fileuploader-item-inner">' +
                                // '<div class="type-holder">${extension}</div>' +
                                // '<div class="actions-holder" style="color:#fff;background-color:#00000099 !important;padding: 10px !important;border-radius: 3px">' +
                                // '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                                // '<button type="button" class="fileuploader-action fileuploader-action-sort" title="${captions.sort}"><i class="fileuploader-icon-sort"></i></button>' +
                                // '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                // '</div>' +
                                '<div class="thumbnail-holder">' +
                                '${image}' +
                                '<span class="fileuploader-action-popup"></span>' +
                                '</div>' +
                                // '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                                '<div class="progress-holder">${progressBar}</div>' +
                                '</div>' +
                                '</li>',
                            startImageRenderer: true,
                            canvasImage: false,
                            _selectors: {
                                list: '.fileuploader-items-list',
                                item: '.fileuploader-item',
                                start: '.fileuploader-action-start',
                                retry: '.fileuploader-action-retry',
                                // remove: '.fileuploader-action-remove'
                            },
                            // onSuccess: function(data, item) {
                            //     item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                            //
                            //     setTimeout(function() {
                            //         item.html.find('.progress-holder').hide();
                            //         item.renderThumbnail();
                            //
                            //         item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
                            //         item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-sort" title="Sort"><i class="fileuploader-icon-sort"></i></button>');
                            //     }, 400);
                            // },
                            onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                    api = $.fileuploader.getInstance(inputEl.get(0));



                                plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                                if(item.format == 'image') {
                                    item.html.find('.fileuploader-item-icon').hide();
                                }

                                // setTimeout(function() {
                                //     // item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                                //     item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-sort" title="Sort"><i class="fileuploader-icon-sort"></i></button>');
                                //     // item.html.find('.progress-holder').hide();
                                //     // item.renderThumbnail();
                                //     //
                                //     // item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
                                //     // item.html.find('.fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-sort" title="Sort"><i class="fileuploader-icon-sort"></i></button>');
                                // }, 400);


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
                        sorter: {
                            selectorExclude: null,
                            placeholder: null,
                            scrollContainer: window,
                            onSort: function(list, listEl, parentEl, newInputEl, inputEl) {
                                var api = $.fileuploader.getInstance(inputEl.get(0)),
                                    fileList = api.getFileList(),
                                    _list = [];

                                $.each(fileList, function(i, item) {
                                    _list.push({
                                        name: item.name,
                                        index: item.index
                                    });
                                });

                                // $.post('php/ajax_sort_files.php', {
                                //     _list: JSON.stringify(_list)
                                // });
                            }
                        },


                    });
                });
            </script>


{{--                        @foreach ($consultation_files as $file)--}}

{{--                <img class="zoom_it" src='{{asset(Config::get('app.upload'))}}/{{$file->file}}'--}}
{{--                     style="width: 170px;height: 170px;border: 1px solid #00000055;padding: 2px">--}}

{{--            @endforeach--}}
        </div>
    </div>
</div>




