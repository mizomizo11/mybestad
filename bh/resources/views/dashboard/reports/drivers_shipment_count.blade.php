@extends('layouts.dashboard.master')

@section('breadcrumb')

    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url('/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>

                <li class="breadcrumb-item active text-grey-d1">ادارة الحسابات</li>
            </ol>

            <a href="{{url('/dashboard/accounts/create') }}" type="button" class="btn  btn-sm" style="font-family: font2;background-color: #57b5da;color:#fff">اضافة حساب   </a>

        </div>
    </div><!-- breadcrumbs -->

@endsection


@section('content')

shipments count

@endsection
