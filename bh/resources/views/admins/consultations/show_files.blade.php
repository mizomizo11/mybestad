@extends('layouts.admin.master')
@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="text-blue" href="{{url(app()->getLocale()."/admins")}}"> الصفحة الرئيسية  </a>
                </li>
                <li class="breadcrumb-item active text-grey-d1" ><a href="{{url(app()->getLocale().'/admins/patients') }}">ادارة  </a></li>
                <li class="breadcrumb-item  text-grey-d1" >تحديث   </li>
            </ol>
        </div>
    </div><!--breadcrumbs-->
@endsection
@section('content')
    <table id="example" class="table table-hover table-bordered table-striped responsive" style="width: 100%" >
        <thead>
        <tr style="background-color: #57b5da;color:#fff;">
            <td >ID</td >

            <td> صورة </td>


            <td style="background-color: #dd6a57">حذف </td>
        </tr>
        </thead>
        <tbody>

        @foreach ($consultation->files as $file)
            <tr style="font-size: 0.85rem;">
                <td >{{ $file->id }}</td >
                <td>



                    @if(Str::endsWith($file -> file, ['.jpg', '.png']))
                        <img class="zoom_it" src="{{asset(Config::get('app.upload'))}}/{{  $file -> file }}" style="width:40px;height:30px">
                    @else

                        <a href="{{asset(Config::get('app.upload'))}}/{{  $file -> file }}">pdf</a>
                        @endif




                </td>
                           <td style="background-color: #dd6a5722"> <a data_id="{{$file->id}}"   href="#"   class='btn btn-danger btn-sm delete_btn '  style='color:#fff'>حذف</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr style="background-color: #57b5da;color:#fff">
            <td >ID</td >

            <td> صورة </td>



            <td style="background-color: #dd6a57">حذف </td>

        </tr>
        </tfoot>
    </table>

    <script>
        $(document).ready( function () {
            $('#example').DataTable({
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
                            url:"{{url(app()->getLocale().'/consultations-files/destroy/')}}",
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
@stop
