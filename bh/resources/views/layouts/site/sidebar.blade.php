

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

            <div class="sidebar-section my-2">
                <div class="sidebar-section-item fadeable-left">

                    <div class="fadeinable sidebar-shortcuts-mini">
                        <span class="btn btn-success p-0"></span>
                        <span class="btn btn-info p-0"></span>
                        <span class="btn btn-warning p-0"></span>
                        <span class="btn btn-danger p-0"></span>
                    </div>

                    <div class="fadeable">
                        <div class="sub-arrow"></div>
                        <div>
                            <a class="btn btn-smd btn-info" href="{{url('/dashboard/shipments/new')}}">
                                <i class="fa fa-edit"></i> اضافة شحنة جديدةثثث
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav has-active-border col-md-12" role="navigation" aria-label="Main">
                @php
                    if (in_array("cp_manage", session('permissions_array')))
                    {
                @endphp
                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/')}}" class="nav-link"  >
                        <i class="nav-icon nav-icon fas fa-th nav-icon-round bgc-primary-tp1"></i>
                        <span class="nav-text fadeable">
                               	  <span>  لوحة التحكم  </span>
                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                @php
                    }
                @endphp



                @php
                    if (in_array("shipment_manage", session('permissions_array')))
                       {
                @endphp
                <li class="nav-item">
                    <a   href="{{url('/dashboard/categories')}}" class="nav-link ">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <span class="nav-text fadeable">
                           	  <span>   ادارة التصنيفات </span>
                           	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                @php
                    }
                @endphp




                <li class="nav-item">
                    <a   href="{{url('/dashboard/categories/order')}}" class="nav-link ">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <span class="nav-text fadeable">
                           	  <span>   ترتيب التصنيفات </span>
                           	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>



                @php
                   // if (in_array("addresses_manage", session('permissions_array')))
                    //   {
                @endphp


                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/companies')}}" class="nav-link">
                        <i class="nav-icon 	far fa-address-book"></i>
                        <span class="nav-text fadeable\">
                               	  <span>  ادارة الشركات </span>

                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                @php
                  //  }
                @endphp


                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/companies')}}" class="nav-link">
                        <i class="nav-icon 	far fa-address-book"></i>
                        <span class="nav-text fadeable\">
                               	  <span>  ادارة اللوغو </span>

                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/companies')}}" class="nav-link">
                        <i class="nav-icon 	far fa-address-book"></i>
                        <span class="nav-text fadeable\">
                               	  <span>  ادارة الكلمات المفتاحية </span>

                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>




                @php
                    if (in_array("users_manage", session('permissions_array')))
                    {
                @endphp
                        <li class="nav-item " style="text-align: right">
                            <a href="{{url('/dashboard/users/')}}" class="nav-link"  @php if (session(['exit'=>"yes"])) echo "data-toggle='modal' data-target='#warningModal'" @endphp>
                                <i class="nav-icon fas fa-user-friends"></i>
                                <span class="nav-text fadeable">
                                          <span>  ادارة المستخدمين    </span>
                                         </span>
                            </a>
                            <b class="sub-arrow"></b>
                        </li>
               <?php
                }
                ?>





                <li class="nav-item">
                    <a href="{{url('/dashboard/contacts/')}}" class="nav-link" >
                        <i class="nav-icon far fa-circle"></i>
                        <span class="nav-text">
                           <span>ادارة معلومات الاتصال   </span>
                         </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/dashboard/whous/')}}" class="nav-link" >
                        <i class="nav-icon far fa-circle"></i>
                        <span class="nav-text">
                           <span>ادارة  من نحن   </span>
                         </span>
                    </a>
                </li>

                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/privacy_policy')}}" class="nav-link"  @php if (session(['exit'=>"yes"])) echo "data-toggle='modal' data-target='#warningModal'" @endphp>
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <span class="nav-text fadeable">
                                               	  <span>   سياسة الخصوصية  </span>
                                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>
                <li class="nav-item " style="text-align: right">
                    <a href="{{url('/dashboard/usage_conditions')}}" class="nav-link" @php if (session(['exit'=>"yes"])) echo "data-toggle='modal' data-target='#warningModal'" @endphp>
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <span class="nav-text fadeable">
                                               	  <span>  شروط  الاستخدام </span>
                                               	 </span>
                    </a>
                    <b class="sub-arrow"></b>
                </li>














            </ul>

        </div><!-- /.sidebar scroll -->


    </div>
</div><!-- /#sidebar -->
