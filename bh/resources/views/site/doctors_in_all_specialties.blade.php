@extends('layouts.site.master')

@section('breadcrumb')
@endsection





@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;">

                    الاطباء في كافة الاختصاصات

                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($doctors as $doctor)
                <div class="col-md-3 col-sm-6" style="text-align: center;;padding: 3px">
                    <div style="margin: 4px;border: 1px solid #bdd7ea">
                        <div  style="margin: 5px">
                            <a href="#" class="image">
                               @if ($doctor->personal_image)
                                    <img src= "{{asset(Config::get('app.upload'))}}/{{$doctor -> personal_image}}" style="height: 120px;width: 120px;border-radius: 50%;border:2px solid #bdd7ea">
                                @else
                                    <img src= "{{asset(Config::get('app.no_image'))}}" style="height: 120px;width: 120px;border-radius: 50%;border:2px solid #bdd7ea">
                                @endif
                            </a>
                        </div>
                        <div class="product-content">
                            <h5 class="text-primary" style="margin: 5px">   {{ __('site.name') }} : {{$doctor->name}}</h5>
                            <h6 class="text-primary" style="margin: 5px">   {{ __('site.specialty') }} : {{@$doctor->specialty->{"name_".app()->getLocale()} }} </h6>
                            <h6 class="text-primary" style="margin: 5px">   {{ __('site.current_place_of_work') }} : {{@$doctor->place_of_work }} </h6>
                            <h6 class="text-primary" style="margin: 5px">   {{ __('site.years_of_experience') }} : {{@$doctor->years_of_experience }} </h6>

                            <div style="padding: 10px">
                                <form  method="post" action="{{url(app()->getLocale()."/patients/steps")}}">
                                    <a   class="btn btn-sm  modal_btn btn-light-primary"  data-id="{{$doctor->id}}"   style="width: 200px;margin-bottom: 3px">{{ __('site.doctor_details') }} </a>
                                    @csrf
                                    <input type="hidden" name="doctor_id" id="doctor_id"  value="{{$doctor->id}}"><br>
                                    @if(Auth::guard('patient')->user())
                                        <button type="submit"  class="btn btn-sm   btn-light-primary"  name="login_btn" id="login_btn"   style="width: 200px">{{ __('site.request_a_consultation') }} </button>
                                    @else
                                        <a href="{{url(app()->getLocale()."/patients/create")}}" class="btn btn-sm btn-light-primary  "  > {{ __('site.request_a_consultation') }}   <i class="fa fa-calendar ml-1"></i></a>
                                    @endif
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .product-grid{
            font-family: 'Poppins', sans-serif;
            text-align: center;
            border: 1px solid transparent;
            transition: all 0.4s ease-out 0s;
        }
        .product-grid:hover{
            border-color: #940a5d;
            box-shadow: 0 0 0 7px rgba(148,10,93,0.1);
        }
        .product-grid .product-image{
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        .product-grid .product-image a.image{display: block; }
        .product-grid .product-image img{
            width: 100%;
            height: auto;
        }
        .product-grid .product-sale-label{
            color: #fff;
            background: #f24148;
            font-size: 14px;
            font-weight: 500;
            text-transform: capitalize;
            line-height: 45px;
            width: 45px;
            height: 45px;
            box-shadow: 0 0 15px -3px rgba(0,0,0,0.3);
            border-radius: 50px;
            position: absolute;
            top: 10px;
            left: 10px;
            transition: all 500ms ease;
        }
        .product-grid .product-content{ padding: 15px; }
        .product-grid .title{
            font-size: 16px;
            font-weight: 600;
            text-transform: capitalize;
            margin: 0 0 10px;
        }
        .product-grid .title a{
            color: #555;
            transition: all 0.3s ease 0s;
        }
        .product-grid .title a:hover{ color: #940a5d; }
        .product-grid .price{
            color: #940a5d;
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 11px;
        }
        .product-grid .price span{
            color: #888;
            font-size: 13px;
            font-weight: 400;
            text-decoration: line-through;
        }
        .product-grid .product-links{
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .product-grid .product-links li{
            margin: 0 2px;
            display: inline-block;
        }
        .product-grid .product-links li a{
            color: #f24148;
            background: #fff;
            font-size: 16px;
            line-height: 36px;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            box-shadow: 0 0 10px -3px rgba(242,65,72,0.9);
            display: block;
            transition: all 500ms ease;
        }
        .product-grid .product-links li a:hover{
            color: #fff;
            background:#940a5d;
        }
        @media screen and (max-width: 990px){
            .product-grid{ margin-bottom: 30px; }
        }
    </style>


    <div class="container" style="direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;">
        <div class="row" style="padding: 25px">
            <div id="showresults" class="col-md-8" style="margin: auto;">

            </div>
        </div>
    </div>
    <script>

    </script>




    <script>
        $(document).ready(function() {
            $(document).on('click', '.modal_btn', function (e) {


                var id = $(this).attr("data-id");
                myPanel = jsPanel.modal.create({
                    id: "jsPanel-1111111111111111",
                    closeOnBackdrop: true, // see notes below
                    closeOnEscape: true,
                    headerControls: {
                        minimize: 'remove',
                        size: "lg"
                    },
                    theme: 'info',
                    headerLogo: '<i class="fad fa-home-heart ml-2"></i>',
                    headerTitle: '<span style="margin: 0;font-size: 16px;font-family: font2">{{ __('site.doctor_details') }} </span>',
                    headerToolbar: '<span class=" " style="font-family: font2;text-align: center">' + name + ' </span>',
                    show: 'fadeIn',
                    // container: 'body',
                    borderRadius: '5px',
                    boxShadow: 5,
                    panelSize: {
                        width: () => {
                            return Math.min(600, window.innerWidth * 0.9);
                        },
                        height: () => {
                            return Math.min(450, window.innerHeight * 0.6);
                        }
                    },
                    // contentSize: 'auto auto',
                    contentSize: {width: '400px', height: '100px'}, // must be object
                    position: 'center-top 0 150 ',
                    // animateIn: 'jsPanelFadeIn',
                    animateIn: 'animate__animated animate__fadeIn',
                    // animateOut: 'animate__animated animate__bounceOut',
                    contentAjax: {
                        method: 'get',
                        url: "{{url(app()->getLocale().'/doctors/show/') }}/" + id,
                        beforeSend: function () {
                            this.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        },
                        done: (xhr, panel) => {
                            // panel.content.innerHTML = xhr.responseText;
                            //  panel.contentRemove();
                            panel.content.append(jsPanel.strToHtml(xhr.responseText));
                            $('.fa-spinner').hide();
                            //Prism.highlightAll();
                        }
                    },
                }).headertoolbar.style.border = '0px solid #fff';


            });


        })

</script>
@endsection




