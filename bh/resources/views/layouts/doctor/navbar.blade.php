
<nav class="navbar navbar-expand-lg navbar-fixed navbar-default">
    <div class="navbar-inner">

        <div class="navbar-intro justify-content-xl-between">

            <button type="button" class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none"
                    data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar"
                    aria-expanded="false" aria-label="Toggle sidebar">
                <span class="bars"></span>
            </button><!-- mobile sidebar toggler button -->

            <a class="navbar-brand text-white" href="{{url(app()->getLocale().'/dashboard/index')}}">
{{--                <i class="fa fa-leaf"></i>--}}
              <img   src="{{asset('/all/img/logo.jpg')}}"  class=" radius-round border-1 brc-white-tp1 mr-2" style="width: 35px;height: 35px">
                <span style="font-size: 18px"> لوحة التحكم </span>

            </a><!-- /.navbar-brand -->

            <button type="button" class="btn btn-burger text-white mr-2 d-none d-xl-flex" data-toggle="sidebar"
                    data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                <span class="bars" ></span>
            </button><!-- sidebar toggler button -->

        </div><!-- /.navbar-intro -->


        <!-- mobile #navbarMenu toggler button -->
        <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
              <span class="pos-rel">
                  <img class="border-2 brc-white-tp1 radius-round" width="40" height="40" src="/images/{{Auth::guard('doctor')->user()->image}}"
                       alt=""> القائمة

              </span>
        </button>


        <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">

            <div class="navbar-nav">

                <ul class="nav">


                    <li class="nav-item   ">
                        <a class="nav-link" href="{{url("/")}}" target="_blank" @php if (session(['exit'=>"yes"])) echo "data-toggle='modal' data-target='#warningModal'"  @endphp >
                            <span class="nav-user-name">الموقع </span>


                        </a>



                    </li><!-- /.nav-item:last -->






                    <li class="nav-item dropdown order-first order-lg-last">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <img id="id-navbar-user-image"
                                 class=" d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2"
                                 src="/images/{{Auth::guard('doctor')->user()->image}}" alt="" style="width: 45px;height:45px">


                            <span class="d-inline-block d-lg-none d-xl-inline-block">
                                  <span class="text-90" id="id-user-welcome">مرحبا .</span>
                                  <span class="nav-user-name">{{Auth::guard('doctor')->user()->name}}</span>
                              </span>

                            <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                            <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                        </a>

                        <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
                            <div class="d-none d-lg-block d-xl-none">
                                <div class="dropdown-header">
                                    Welcome, <?php echo "SESSION[user_name]";  ?>
                                </div>
                                <div class="dropdown-divider"></div>
                            </div>


                            <div class="dropdown-divider brc-primary-l2"></div>

                            <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary"
                               href="{{url(app()->getLocale().'/doctors/logout')}}">
                                <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </li><!-- /.nav-item:last -->

                </ul><!-- /.navbar-nav menu -->
            </div><!-- /.navbar-nav -->

        </div><!-- /.navbar-menu.navbar-collapse -->

    </div><!-- /.navbar-inner -->
</nav>


