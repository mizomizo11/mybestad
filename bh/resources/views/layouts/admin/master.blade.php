<!doctype html>
<html class="rtl" style="font-size: 0.88rem;">

@include('layouts.admin.head')
<body>
<div class="body-container">
    @include('layouts.admin.navbar')
<div class="main-container">

    @include('layouts.admin.sidebar')
    <div role="main" class="main-content">

{{--       @include('layout.breadcrumb')--}}
        @section('breadcrumb')



        @show

        <div class="page-content container">
            <div class="row">
                <div class="col-12 ">


                    @yield('content')

                    <!-- Check user is logged in -->
{{--                        @if(Auth::check())--}}
{{--                            <div class='dash'>You are logged in as  : {{\Auth::user()->email}} ,  <a href="{{url('/admin/logout')}}"> Logout</a></div>--}}
{{--                        @else--}}
{{--                            <div class='dash '>--}}
{{--                                <div class='error'> You are not logged in  </div>--}}
{{--                                <div>  <a href="{{url('login')}}">Login</a> | <a href="{{url('register')}}">Register</a> </div>--}}
{{--                            </div>--}}

{{--                        @endif--}}
                    <!-- Check user is logged in -->


                        {{--    dd($permissions_array);--}}
{{--                        {{Auth::user()->permissions}}--}}
{{--                        @php--}}

{{--                            echo "====".in_array("cp_manage", $permissions_array)."------";--}}
{{--                            //   dd($permissions_array);--}}
{{--                               // if (in_array("shipment_manage", $permissions_array))--}}
{{--                                //{--}}
{{--                                    //$permissions_array--}}
{{--                                  //  echo"rrrrrrrrrrrrr===$permissions_array[0]";--}}
{{--                               // }--}}
{{--                        @endphp--}}


                </div>
            </div>
        </div><!-- /.page-content -->
    </div><!-- /main-content -->

</div>{{--/main-container--}}

</div>{{--/body-container--}}

@include('layouts.admin.footer')

</body>
</html>



