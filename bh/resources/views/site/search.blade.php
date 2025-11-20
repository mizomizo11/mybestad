@extends('layouts.site.master')

@section('breadcrumb')
@endsection









@section('content')

    <form id="search_form"  method="POST" action="{{url(app()->getLocale().'/search') }}"   style="margin:auto ;padding: 30px" >
        @csrf
        <div class='row' >
            <div class='col-md-10'>

                <div>
                    <input type="text" name="search"  class="form-control form-control-sm "  style="" required=""  />
                </div>
            </div>
            <div class='col-md-2'>

                <div>
                    <button  class="btn btn-sm btn-info" type="submit"  name="" id="search_btn"   style="">بحث</button>
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row radius-1 shadow-md overflow-hidden">

            @foreach ($products as $product)


                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="#" class="image">
                                <img src= "/{{Config::get('app.upload_image_folder')}}/{{$product -> pic}}" style="height: 400px">
                            </a>
                            <span class="product-sale-label">Sale!</span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#"> {{$product->name}}</a></h3>
                            <h3 class="title"><a href="#"> {{$product->category_name}}</a></h3>
                            <div class="price"> {{$product->price}} <span>{{$product->price}} </span></div>
                            <ul class="product-links">
                                @if(session("customer_id"))
                                    <a class="btn btn-sm btn-success add_to_cart" product_id="{{$product->id}}" store_id="store_id" store_name="store_name" product_name="{{$product->name}}" product_price="{{$product->price}}" style="color: #fff"> اضافة الى السلة  <i class="fa fa-shopping-cart ml-1"></i></a>
                                @else
                                    <a href="{{url(app()->getLocale()."/customers/create")}}" class="btn btn-sm btn-success "  style="color: #fff"> اضافة الى السلة  <i class="fa fa-shopping-cart ml-1"></i></a>
                                @endif

{{--                                <a class="btn btn-sm btn-success add_to_cart" product_id="{{$product->id}}" store_id="store_id" store_name="store_name" product_name="{{$product->name}}" product_price="{{$product->price}}" style="color: #fff"> اضافة الى السلة  <i class="fa fa-shopping-cart ml-1"></i></a>--}}

                            </ul>
                        </div>
                    </div>
                </div>






                {{--              <a style="background-color:#f85062;padding:0px 15px;border-radius:3px;;color:#fff"  class="add_to_cart" product_id="$arr[id]" store_id="$arr[resturant_id]" store_name="$arr2[name]" product_name="$arr[name]" product_price="$price" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i> $lang[add_to_cart] </a>--}}

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









@endsection



