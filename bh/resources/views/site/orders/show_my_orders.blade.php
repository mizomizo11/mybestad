@extends('layouts.site.master')

@section('breadcrumb')
@endsection






@section('content')



    <div class="container">
        <div class="row radius-1 shadow-md overflow-hidden">


            <table class="table table-bordered text-dark-m1" style="margin-top: 20px">
                <thead>
                <tr class="bgc-secondary-l3">
                    <th>ID</th>
                    <th>اسم العميل</th>
                    <th>تاريخ الطلب</th>
                    <th> عنوان الشحن</th>
                    <th>  المبلغ الكلي</th>
                    <th>   الحالة</th>
                    <th>    تفاصيل الطلب </th>

                </tr>
                </thead>

                <tbody>


            @foreach ($orders as $orders)
                <tr>
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->customer_name}}</td>
                    <td>{{$orders->created_at}}</td>
                    <td>{{$orders->delivery_address}}</td>
                    <td>{{$orders->total_price}}</td>
                    <td>{{$orders->state}}</td>
                    <th>
                        <a  href="{{url(app()->getLocale()."/orders")}}/{{$orders->id}}" class="btn btn-sm btn-info "  style="color: #fff"> تفاصيل الطلب  <i class="fa fa-shopping-cart ml-1"></i></a>
                    </th>
                </tr>
            @endforeach
                </tbody>
            </table>


        </div>
    </div>











@endsection

