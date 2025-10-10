<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h1  style="text-align: center;border-bottom:1px solid #ff8c0b;padding:10px;">
                {{ __('site.articles_categories') }}
            </h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3" style="" data-aos="@php
                $my_array1 = array("zoom-in");
                shuffle($my_array1);
                echo    $my_array1[0];
            @endphp" data-aos-mirror="true">
                <a href="#" >
                    @if ($category->image)
                        <img class="zoom_it" src= "{{asset(Config::get('app.upload'))}}/{{$category -> image}}" style="height: 200px;width: 100%;border:1px solid #ccc;padding: 2px">
                    @else
                        <img src= "{{asset(Config::get('app.no_image'))}}" style="height: 200px;width: 100%;border:1px solid #ccc;padding: 2px">
                    @endif
                </a>
                <div >
                    <h3  style="margin: 5px">    {{$category->{"name_".app()->getLocale()} }}</h3>
                    <h6  style="margin: 5px">    {{$category->{"name_".app()->getLocale()} }} </h6>
                    <h6  style="margin: 5px">    {{$category->created_at }} </h6>
                    <p  style="margin: 5px">    {{$category->{"summary_".app()->getLocale()} }} </p>
                    <div style="padding: 10px;text-align: center">
                        <input type="hidden" name="doctor_id" id="doctor_id"  value="{{$category->id}}"><br>
                        <a href="{{url(app()->getLocale()."/categories")}}/{{$category->id }}"  class="btn btn-sm "     style="width: 120px;color:#fff;margin:auto;background-color: {{ $settings->primary_color }}">{{ __('site.show_more') }}   </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

