@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="color_red" href="{{url(app()->getLocale().'/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة المستخدمين</li>
            </ol>

            @if(in_array("users_add", session('permissions_array')) or in_array("administrator", session('permissions_array')))
                <a href="{{url(app()->getLocale().'/dashboard/users/create') }}" type="button" class="btn btn-info btn-sm" >اضافة    </a>
            @else
                <a href="#" type="button" class="btn btn-lighter-secondary btn-sm show_error_message" >اضافة    </a>
            @endif



        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')

    <table id="example" class="table table-hover table-bordered table-striped responsive nowrap" style="width:100%">
        <thead>
            <tr style="background-color: #57b5da;color:#fff;">
                <td>ID</td >
                <td>اسم المستخدم </td >

                <td> الموبايل </td>
                <td> الايميل </td>
                <td>  كلمة المرور	 </td>
                <td>صورة</td>
                <td>     تاريخ الاضافة </td>
                <td> تاريخ اخر تحديث </td>
                <td style="background-color: #efae43">تحديث </td>
                <td style="background-color: #dd6a57">حذف </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td >
                    <td>{{ $user->name }}</td >

                    <td style="direction: ltr;text-align: left">{{ $user->mobile }}  </td>
                    <td style="direction: ltr;text-align: left">{{ $user->email }}  </td>
                    <td style="direction: ltr;text-align: left">{{ $user->password }}  </td>
                    <td >

                        @if($user->image)
                             <img class='zoom_it'  src='/{{Config::get('app.upload')}}{{ $user->image }}' style='width:40px;height:30px'>


                        @else
                        <img class="zoom_it" src="{{asset('/all/img/user.jpg')}}" style="width: 50px;height: 50px;border-radius: 50%">
                        @endif
                    </td>
                    <td style="direction: ltr;text-align: left">{{ $user->created_at }}  </td>
                    <td style="direction: ltr;text-align: left">{{ $user->updated_at }}  </td>



                        <td style="background-color: #efae4322"> <a   href="{{URL("/")}}/{{app()->getLocale()}}/dashboard/users/edit/{{$user->id}}"  class='btn btn-warning btn-sm '  >تحديث</a></td>



                    @if($user->id !='1')


                            <td style="background-color: #dd6a5722"> <a   href="{{URL("/")}}/{{app()->getLocale()}}/dashboard/users/destroy/{{$user->id}}"   class='btn btn-danger btn-sm ' >حذف</a></td>

                    @else
                        <td style="background-color: #dd6a5722"> </td>
                    @endif



                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff;">
            <td>ID</td >
            <td>اسم المستخدم </td >

            <td> الموبايل </td>
            <td> الايميل </td>
            <td>  كلمة المرور	 </td>
            <td>صورة</td>
            <td>     تاريخ الاضافة </td>
            <td>     تاريخ التحديث </td>
            <td style="background-color: #efae43">تحديث </td>
            <td style="background-color: #dd6a57">حذف </td>
        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready( function () {
            $('#example').DataTable({
                stateSave: true,
                "order": [[ 0, "desc" ]],
                    language: {
                        url: '{{asset('all/json/Arabic.json')}}'

                    }
                }

            );
        });
    </script>
@endsection
