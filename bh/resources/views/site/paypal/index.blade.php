@extends('layouts.site.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Make A Payment</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif



            <center>
{{--                coupon_number:   {{ session()->get('error') }}--}}
                <a href="{{ route('make.payment',['locale'=>app()->getLocale()]) }}" class="w-full bg-indigo-500 uppercase rounded-xl font-extrabold  px-6 h-8">Pay with PayPal👉</a>
            </center>
        </div>
    </div>

@endsection
