@extends('layouts.site.master')
@section('breadcrumb')
@endsection
@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;">
{{--                    {{ __('site.doctors_in_specialty') }}--}}
                    تحديد المواعيد الجديدة
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="table-responsive-md">
                <table class="table table-bordered text-primary-m1">
                    <thead>
                    <tr class="bgc-info-l3">
                        <th>اسم المريض</th>
                        <th>الموعدالاول</th>
                        <th>الموعد الثاني</th>
                        <th>الموعد الثالث</th>
                        <th>الموعد الرابع</th>
                        <th>الموعد الخامس</th>
                        <th> اعتماد</th>
                    </tr>
                    </thead>
                    <tbody>

                            @foreach ($consultations as $appointment)
{{--                                //@if($appointment->consultation->isNotEmpty())--}}
                                        <form  method="POST"   action="{{url(app()->getLocale()."/appointments/confirm-five-dates")}}"  enctype="multipart/form-data"  style="">
                                            @csrf
                                            <input type="hidden" name="appointment_id" value="{{$appointment->appointment->id}}" class="btn btn-sm btn-light-info " >
                                            <tr>
                                            <td>{{@$appointment->patient->name}}</td>
                                            <td><input type="datetime-local" name="appointment1" class="btn btn-sm btn-light-info " required></td>
                                            <td><input type="datetime-local" name="appointment2" class="btn btn-sm btn-light-info " ></td>
                                            <td><input type="datetime-local" name="appointment3" class="btn btn-sm btn-light-info " ></td>
                                            <td><input type="datetime-local" name="appointment4" class="btn btn-sm btn-light-info " ></td>
                                            <td><input type="datetime-local" name="appointment5" class="btn btn-sm btn-light-info " ></td>
                                            <td><input type="submit" value="اعتماد" class="btn btn-light-success btn-h-light-info btn-a-light-primary fs--outline"></td>
                                        </tr>
                                        </form>
{{--                                    @else--}}
{{--                                    <tr>--}}
{{--                                        <td colspan="7">لا يوجد مواعيد حاليا</td>--}}

{{--                                    </tr>--}}
{{--                                @endif--}}
                            @endforeach



                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>









@endsection




