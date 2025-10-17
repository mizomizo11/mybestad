<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h1  style="text-align: center;font-size: 45px;color: {{$settings->primary_color}};border-bottom:1px solid {{$settings->primary_color}};padding:10px;">
                {{ __('site.services') }}
            </h1>
        </div>
    </div>
</div>


<style>

    /*//4197ba*/
    :root{ --main-color:#2178a0; }
    .serviceBox{
        font-family:'Poppins', sans-serif;
        text-align: center;
        padding: 25px 15px;
        margin: 0 30px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        position: relative;
        z-index: 1;
        min-height: 300px;
    }
    .serviceBox:before,
    .serviceBox:after{
        content: "";
        background-color: var(--main-color);
        height: 100%;
        width: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        position: absolute;
        left: -15px;
        top: 0;
        z-index: -1;
        clip-path: polygon(100% 0, 100% 100%, 0 76%);
    }
    .serviceBox:after{
        transform: rotateY(180deg);
        left: auto;
        right: -15px;
    }
    .serviceBox .service-icon{
        color: var(--main-color);
        font-size: 40px;
        margin: 0 0 20px;
    }
    .serviceBox .title{
        font-size: 18px;
        font-weight: 600;
        text-transform: capitalize;
        letter-spacing: 0.5px;
        margin: 0 0 10px;
    }
    .serviceBox .description{
        font-size: 13px;
        font-weight: 300;
        line-height: 22px;
        letter-spacing: 0.5px;
        text-align: center;
        margin: 0;
    }
    /*.serviceBox.green{ --main-color: #7DB000; }*/
    /*.serviceBox.yellow{ --main-color: #FDA111; }*/
    /*.serviceBox.pink{ --main-color: #F34489; }*/
    @media only screen and (max-width: 1199px){
        .serviceBox{ margin: 0 15px 30px; }
    }
</style>
<div class="container" style="margin-bottom: 0">
    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-3 col-sm-6" data-aos="@php
                $my_array1 = array("flip-right","flip-left","fade-right","fade-right","fade-up","fade-down");
                shuffle($my_array1);
                echo    $my_array1[0];
            @endphp" data-aos-mirror="true" style="margin: 20px 0">
                <div class="serviceBox"       >
                    <div class="service-icon" style="color: #8b0304">
                        <img src="{{asset(Config::get('app.upload'))}}/{{$service->image}}" style="width: 200px;height: 200px;">
                    </div>
                    <h3 class="title" style="margin-top: 15px">
                        {{$service->{"name_".App::getLocale()}  }}
                    </h3>
                    <p class="description">
                        {{$service->{"summary_".App::getLocale()}  }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

