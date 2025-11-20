@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="" href="{{url(app()->getLocale().'/admins')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1">ادارة مدراء النظام</li>
            </ol>
{{--            @if(in_array("users_add", session('permissions_array')) or in_array("administrator", session('permissions_array')))--}}
                <a href="{{url(app()->getLocale().'/admins/admins/create') }}" type="button" class="btn btn-info btn-sm" >اضافة    </a>
{{--            @else--}}
{{--                <a href="#" type="button" class="btn btn-lighter-secondary btn-sm show_error_message" >اضافة    </a>--}}
{{--            @endif--}}



        </div>
    </div><!-- breadcrumbs -->
@endsection
@section('content')

    <table id="example" class="table table-hover table-bordered table-striped responsive nowrap" style="width:100%">
        <thead>
            <tr style="background-color: #57b5da;color:#fff;">
                <td data-priority="1">ID</td >
                <td data-priority="2">اسم المستخدم </td >
                <td> الموبايل </td>
                <td> الايميل </td>
                <td>  كلمة المرور	 </td>
                <td>صورة</td>
                <td>     تاريخ الاضافة </td>
                <td> تاريخ اخر تحديث </td>
                <td data-priority="3" style="background-color: #efae43">تحديث </td>
                <td data-priority="4" style="background-color: #dd6a57">حذف </td>
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
                     <td style="background-color: #efae4322"> <a   href="{{URL("/")}}/{{app()->getLocale()}}/admins/admins/edit/{{$user->id}}"  class='btn btn-warning btn-sm '  >تحديث</a></td>
                    @if($user->id !='1')
                       <td style="background-color: #dd6a5722"> <a  data_id="{{$user->id}}"  href="#"   class='btn btn-danger btn-sm delete_btn ' >حذف</a></td>
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
    <script>
        $(document).ready(function(){



            $(document).on('click', '.delete_btn', function(e){
                e.preventDefault();
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "هل انت متاكد؟",
                    text: "لن تستطيع التراجع عن هذه الخطوة ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        var data_id = $(this).attr("data_id");
                        $.ajax({
                            beforeSend: function() {
                                Swal.showLoading();
                            },
                            url:"{{url(app()->getLocale().'/admins/admins/destroy/')}}/data_id",
                            method:"GET",
                            data:{"_token": "{{ csrf_token() }}",id:data_id, },
                            success:function(data)
                            {
                                if(data.status === "true" )
                                {
                                    swal.close();
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success",
                                        timer: 2000,
                                        timerProgressBar: true,
                                    });
                                    // Lobibox.notify('success', {
                                    //     continueDelayOnInactiveTab: true,
                                    //     position: 'bottom left',
                                    //     size: 'mini',
                                    //     delay: 2000,
                                    //     msg: '<h5 >تم الحذف بنجاح..!</h5>'
                                    // });
                                }else{
                                    // alert("error")
                                }

                                //$('#example').DataTable().ajax.reload();

                                setTimeout(function(){ location.reload(); }, 3000);
                            }
                        })


                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "تم الالغاء",
                            text: "..",
                            icon: "error"
                        });
                    }
                });


            });



        });
    </script>
@endsection
