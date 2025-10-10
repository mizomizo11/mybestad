{{--    {{Helper::show_margin("50")}}--}}
{{--    {{Helper::show_heading1_with_bgimage(__('site.partners'))}}--}}
<div class='container-fluid' style='margin: 20px'>
    <div class='row'>
        <div class='col-md-12'>
            <h1 style='text-align: center;font-size: 25px;text-shadow: 5px 5px 10px #2a2f6e;color:#2a2f6e'>{{__('site.partners')}}</h1>
        </div>
    </div>
</div>
<!-- Set up your HTML -->
{{--    <div class="container-fluid" style="background-image: url('{{asset("/all/img/bg.png")}}');">--}}
<div class="container-fluid" style="">
    <div class="row">
        <div class="col-md-12">
            <div id="dd" class="owl-carousel owl-theme">
                @foreach ($partners as $partner)
                    <div class="item" style="background-color: #ccc;height: 200px;width: 200px">  <img src="{{url(Config::get('app.upload'))}}/{{$partner->image}}" style="width: 100%;height: 100%;;vertical-align: top;">  </div>
                @endforeach
            </div>
        </div>
        {{--            {{Helper::show_margin("50")}}--}}
    </div>
</div>
<script>
    $(document).ready(function(){
        //$(".owl-carousel").owlCarousel();
        $('#dd').owlCarousel({
            // item:4,
            loop:true,
            margin:10,
            rtl:true,
            nav:true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    });
</script>

