

<div class="container-fluid" style="background-color: #fff;" >
    <div class="row" style="direction:   @if (app()->getLocale()=='ar') rlt  @else ltr @endif  ;background-color: #273238;">

        <form style="margin: auto;width: 100%" action="/{{app()->getLocale()}}/search" >
            @csrf
        <div class="container" style="text-align: center;padding: 20px;width: 100%">
            <div class="row">
                <div class="col-md-2">
                </div>
                    <div class="col-md-2 col-sm-6">
                            <select name="cat_id" id="cat_id"  id="form-field-select-2" style="height: 40px;border-radius: 10px;width: 100% ">
                                <option value="">{{__('messages.all_gates')}} </option>
{{--                                @foreach ($categories as $category)--}}
{{--                                    @if ($category->parent=='0')--}}
{{--                                        <option value="{{ $category->id }}">--}}
{{--                                            @if (app()->getLocale()=='ar')--}}
{{--                                                {{$category->name}}--}}
{{--                                            @else--}}
{{--                                                {{$category->name_eng }}--}}
{{--                                            @endif--}}
{{--                                        </option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
                            </select>
                    </div>
                    <div class="col-md-2 col-sm-6">


                            <select id="sub_cat_id" name="sub_cat_id"  id="form-field-select-2" style="height: 40px;border-radius: 10px;width: 100%">
                                <option value="">{{__('messages.select_primary_gate_first')}} </option>
                                {{--                                @foreach ($cities as $city)--}}
                                {{--                                    <option value="{{$city -> id}}">{{$city -> name}}</option>--}}
                                {{--                                @endforeach--}}
                                <?php


                                ?>
                            </select>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $( "#cat_id" ).change(function() {
                                        var cat_id = $( "#cat_id" ).val();
                                        //$("#countryid option[value='0']").remove();
                                        $.ajax({
                                           url: "/{{app()->getLocale()}}/get_sub_cat/",
                                            data: {cat_id: cat_id  },
                                            type: 'get',
                                            async: false,
                                            dataType: 'json',
                                            beforeSend: function() {
                                                $('#sender_loading').css("display", "block");
                                            },
                                            success: function(data) {
                                                // alert(data["0"].name);
                                                $('#sub_cat_id').find('option').remove().end();
                                                //	var region = jQuery.parseJSON(data);
                                                for(var i = 0 ; i < data.length ; i++)
                                                {

                                                    $('#sub_cat_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                                                }
                                            },
                                            complete: function(){
                                                setTimeout(function (){
                                                    $('#sender_loading').css("display", "none");
                                                });

                                            }
                                        });

                                    });


                                });

                            </script>
                    </div>
                        <div class="col-md-3">
                            <input class="" type="text" name="search" style="height: 40px;border-radius: 10px;width: 100%">
                        </div>
                    <div class="col-md-2">
                            <button type="submit" class="btn btn-info" style="padding: 0px;height: 38px;border-radius: 10px;width: 60px;">{{__('messages.search')}}</button>
                    </div>
                <div class="col-md-1">
                </div>


            </div>



        </div>
        </form>
    </div>

</div>


<div class="row" style="direction: <?php //echo ($_SESSION['lang']=="arabic" ? 'rtl' :  'ltr') ?>;background-color: #d8fcfc;">
    <div class=" col-md-12" style="padding: 0px;">
        <img src="{{asset('/all/img/flag.png')}}" style="width: 100%;height: 200px;">
        {{--            <img src="images/flag22.png" style="width: 100%;height: 200px;">--}}
    </div>
</div>



