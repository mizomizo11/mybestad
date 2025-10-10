
<style type="text/css">

    [class*='sidebar-dark-'] .nav-treeview > .nav-item > .nav-link.active, [class*='sidebar-dark-'] .nav-treeview > .nav-item > .nav-link.active:hover, [class*='sidebar-dark-'] .nav-treeview > .nav-item > .nav-link.active:focus {
        background-color: #5099c3a6;
        color: #343a40;
</style>
<script type="text/javascript">
    $(document).ready(function() {

        var CurrentUrl= document.URL;
        var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
        //  alert(CurrentUrlEnd);


        $( "li a" ).each(function() {
            var ThisUrl = $(this).attr('href');
            var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();
            if(ThisUrlEnd == CurrentUrlEnd)
            {
                // alert("ddddd");
                $(this).parent().parent().parent().addClass( "active menu-open show" ).css({"color": "red", "border-left": "2px solid #fff"});

                $(this).addClass('active').css({"color": "#01263c", "border-left": "4px solid #ffffff77","border-radius":"0px"});

                $(this).parents('li').addClass('active');
            }

        });

    });

</script>

<div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-default d-none d-xl-block" >
    <div class="sidebar-inner">

        <div class="ace-scroll flex-grow-1" ace-scroll>


            <ul class="nav has-active-border col-md-12" role="navigation" aria-label="Main">


{{--               @if (in_array("cp_manage",  Auth::guard('doctor')->user()->permissions) or in_array("administrator", Auth::guard('doctor')->user()->permissions))--}}


                <li class="nav-item " style="text-align: right">
                    <a href="{{url(app()->getLocale().'/dashboard/index')}}" class="nav-link" @if (session("exit_warning")=="yes") data-toggle='modal' data-target='#warningModal' @endif >
                        <i class="nav-icon nav-icon fas fa-th nav-icon-round bgc-info"></i>
                                 <span class="nav-text fadeable">
                               	  <span>  لوحة التحكم  </span>
                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>


                    <li class="nav-item " style="text-align: right">
                        <a href="{{url(app()->getLocale().'/dashboard/doctors/')}}" class="nav-link" >
                            <i class="nav-icon fas fa-user-friends text-info"></i>
                            <span class="nav-text fadeable">
                                  <span>  ادارة الاطباء المشتركين    </span>
                        </span>

                            <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('doctors') ->count()    }}
                         </span>
                        </a>
                        <b class="sub-arrow"></b>
                    </li>



                <li class="nav-item " style="text-align: right">
                    <a href="{{url(app()->getLocale().'/dashboard/patients/')}}" class="nav-link" >
                        <i class="nav-icon 	far fa-circle text-info"></i>
                        <span class="nav-text fadeable\">
                               	  <span>ادارة  المرضى المشتركين</span>
                	        </span>
                        <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('patients') ->count()    }}
                         </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>

                    <li class="nav-item " style="text-align: right">
                        <a href="{{url(app()->getLocale().'/dashboard/users/')}}" class="nav-link" >
                            <i class="nav-icon fas fa-user-friends text-info"></i>
                            <span class="nav-text fadeable">
                                  <span>  ادارة المستخدمين    </span>
                        </span>
                            <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('doctors') ->count()    }}
                         </span>
                        </a>
                        <b class="sub-arrow"></b>
                    </li>


                <li class="nav-item " style="text-align: right">
                    <a href="{{url(app()->getLocale().'/dashboard/specialties/')}}" class="nav-link" >
                        <i class="nav-icon fa fa-tachometer-alt text-info"></i>
                        <span class="nav-text fadeable">
                                  <span>  ادارة الاختصاصات   </span>
                                 </span>
                        <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('specialties') ->count()    }}
                         </span>

                    </a>
                    <b class="sub-arrow"></b>
                </li>

                <li class="nav-item">
                    <a href="{{url('/dashboard/carousels')}}" class="nav-link"  >
                        <i class="nav-icon far fa-circle text-info"></i>
                        <span class="nav-text">
                           				  <span>ادارة الصورة المتحركة1  </span>
                           				 </span>

                        <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('carousels') ->count()    }}
                         </span>

                    </a>
                </li>
                <li class="nav-item " style="text-align: right">
                    <a href="{{url(app()->getLocale().'/dashboard/services/')}}" class="nav-link" >
                        <i class="nav-icon fa fa-tachometer-alt text-info"></i>
                        <span class="nav-text fadeable">
                                  <span>  ادارة الخدمات   </span>
                                 </span>
                        <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('services') ->count()    }}
                         </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>


                <li class="nav-item " style="text-align: right">
                    <a href="{{url(app()->getLocale().'/dashboard/orders/')}}" class="nav-link" >
                        <i class="nav-icon 	far fa-circle text-info"></i>
                        <span class="nav-text fadeable\">
                               	  <span>  ادارة  الاستشارات  </span>
                        </span>
                        <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('consultations') ->count()    }}
                         </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>





                <li class="nav-item">
                    <a href="{{url(app()->getLocale().'/dashboard/countries/')}}" class="nav-link" >
                        <i class="nav-icon far fa-circle text-info"></i>
                        <span class="nav-text">
                            <span>  ادارة الدول</span>
                         </span>
                        <span class="badge badge-primary   radius-round text-90 ml-1 mr-2px badge-sm ">
                           {{  DB::table('countries') ->count()    }}
                         </span>

                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('/dashboard/contacts')}}" class="nav-link" >
                        <i class="nav-icon far fa-circle text-info"></i>
                        <span class="nav-text">
                           				  <span>ادارة معلومات الاتصال   </span>
                           				 </span>
                    </a>
                </li>

                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/whous')}}" class="nav-link" >
                        <i class="nav-icon fa fa-tachometer-alt text-info"></i>
                        <span class="nav-text fadeable">
                                           	  <span>    من نحن  </span>
                                       </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                <li class="nav-item " style="text-align: right">
                    <a href="{{url(app()->getLocale().'/dashboard/disclaimer/')}}" class="nav-link" >

                        <i class="nav-icon fa fa-tachometer-alt text-info"></i>
                        <span class="nav-text fadeable">
                                           	  <span>   ادارة اخلاء المسؤولية  </span>
                                       </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/privacy_policy')}}" class="nav-link"  >
                        <i class="nav-icon fa fa-tachometer-alt text-info"></i>
                        <span class="nav-text fadeable">
                                               	  <span>   سياسة الخصوصية  </span>
                                        </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>















            </ul>

        </div><!-- /.sidebar scroll -->


    </div>
</div><!-- /#sidebar -->

