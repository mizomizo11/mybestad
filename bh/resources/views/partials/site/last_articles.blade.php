
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h1  style="text-align: center;font-size: 45px;color: {{$settings->primary_color}};border-bottom:1px solid {{$settings->primary_color}};padding:10px;">
                {{ __('site.last_articles') }}
            </h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-6 col-sm-6" data-aos="@php
                $my_array1 = array("zoom-in");
                shuffle($my_array1);
                echo    $my_array1[0];
            @endphp" data-aos-mirror="true">
                <div class="row" style="border: 1px solid #e3e3e3;margin: 2px;padding: 10px 5px">
                    <div class="col-md-4 " style="padding: 5px">
                        <a href="#" >
                            @if ($article->image)
                                <img class="zoom_it" src= "{{asset(Config::get('app.upload'))}}/{{$article -> image}}" style="height: 160px;width: 100%;border:1px solid #ccc;padding: 2px">
                            @else
                                <img src= "{{asset(Config::get('app.no_image'))}}" style="height: 160px;width: 100%;border:1px solid #ccc;padding: 2px">
                            @endif
                        </a>
                    </div>
                    <div class="col-md-8 " style="padding: 3px">
                        <div class="">
                            <h3 class="" style="margin: 5px">    {{$article->{"name_".app()->getLocale()} }}</h3>
                            <h6 class="" style="margin: 5px">    {{@$article->category->{"name_".app()->getLocale()} }} </h6>
                            <h6 class="" style="margin: 5px">    {{@$article->created_at }} </h6>
                            <p class="" style="margin: 5px">    {{@$article->{"summary_".app()->getLocale()} }} </p>
                            <div style="padding: 10px;text-align: center">
                                <input type="hidden" name="doctor_id" id="doctor_id"  value="{{$article->id}}"><br>
                                <a href="{{url(app()->getLocale()."/articles")}}/{{$article->id }}"  class="btn btn-sm "     style="width: 120px;color:#fff;margin:auto;background-color: {{ $settings->primary_color }}">{{ __('site.show_more') }}   </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        @endforeach
    </div>
</div>


