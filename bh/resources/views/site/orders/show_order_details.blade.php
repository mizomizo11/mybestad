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
                    <th> طريقة الدفع</th>
                    <th>   الحالة</th>


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
                    <td>{{$orders->payment_method}}</td>
                    <td>{{$orders->state}}</td>

                </tr>
            @endforeach
                </tbody>
            </table>



            <table class="table table-bordered text-dark-m1" style="margin-top: 20px">
                <thead>
                <tr class="bgc-secondary-l3">
                    <th>ID</th>
                    <th>اسم الكتاب</th>
                    <th> السعر</th>
                    <th> الكمية</th>



                </tr>
                </thead>

                <tbody>


                @foreach ($cart as $cart )
                    <tr>
                        <td>{{$cart->id}}</td>
                        <td>{{$cart->product_name}}</td>
                        <td>{{$cart->price}}</td>
                        <td>{{$cart->quantity}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>











@endsection

