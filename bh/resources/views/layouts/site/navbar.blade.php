<?php

use Illuminate\Support\Facades\Route;
use App\Models\Consultation;

?>


<nav class="navbar navbar-expand-lg navbar-white2" style="background-color: {{ $settings->primary_color }}">
    <div class="navbar-inner brc-info-l1">
        <div class="container">

            <button type="button"
                    class="navbar-toggler btn btn-burger burger-times static d-flex d-lg-none ml-2 collapsed"
                    data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
                    aria-label="Toggle navbar menu">
                <span class="bars text-dark-tp3"></span>
            </button><!-- mobile navbar toggler button -->

            <div class="navbar-intro w-auto justify-content-xl-between border-0">
                <a class="navbar-brand text-dark-tp3 text-180" href="#">
                    <a class="navbar-brand" href="#"><img
                            src="{{asset(Config::get('app.upload'))}}/{{ $settings->{'logo_'.app()->getLocale()} }}"
                            style="width: 140px;height: 50px;"></a>

                </a><!-- /.navbar-brand -->
            </div><!-- /.navbar-intro -->

            <div class="navbar-menu navbar-collapse navbar-backdrop collapse" id="navbarMenu" style="">
                <div class="navbar-nav">
                    <ul class="nav nav-compact-3">
                        <li class="nav-item dropdown mx-1px">
                            <a href="{{url(app()->getLocale()."/")}}" class="btn  border-0 text-white">
                                {{ __('site.home') }}
                            </a>
                        </li>

                        <li class="nav-item  mx-1px">
                            <a href="{{url(app()->getLocale()."/whous")}}" class="btn text-white border-0">
                                {{ __('site.whous') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-hover ">
                            <a href="#" class="nav-link dropdown-toggle text-white " id="dropdown-a"
                               data-toggle="dropdown">    {{ __('site.specialties') }}
                                <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                            </a>
                            <div class="dropdown-menu " aria-labelledby="dropdown-a">
                                @foreach ($specialties as $specialty)
                                    <a href="{{url(app()->getLocale()."/specialties/$specialty->id")}}"
                                       class="dropdown-item"
                                       style="text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ">
                                        {{$specialty->{"name_".app()->getLocale()} }}
                                    </a>
                                @endforeach
                            </div>

                        </li>
                        <li class="nav-item ml-xl-2">
                            <a href="{{url(app()->getLocale()."/how-we-work")}}" class="btn text-white border-0">
                                {{ __('site.how_we_work') }}
                            </a>
                        </li>
                        <li class="nav-item ml-xl-2">
                            <a href="{{url(app()->getLocale()."/contacts")}}" class="btn text-white border-0">
                                {{ __('site.contactus') }}
                            </a>
                        </li>

                        @if(Auth::guard('doctor')->user())

                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                   style="color: #fff;">
                                    @if(Auth::guard('doctor')->user()->personal_image)
                                        <img
                                            class=" d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2"
                                            src="{{asset(Config::get('app.upload'))}}/{{Auth::guard('doctor')->user()->personal_image}}"
                                            alt="" style="width: 30px;height:30px">
                                    @else
                                        <img
                                            class=" d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2"
                                            src="{{asset('/all/img/user.jpg')}}" style="width: 30px;height:30px">
                                    @endif
                                    &nbsp Dr.
                                    {{ Auth::guard('doctor')->user()->name}}
                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>

                                    &nbsp&nbsp


                                </a>
                                <div class="dropdown-menu  sm-menu "
                                     style="padding: 5px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ">

                                    <a class="dropdown-item"
                                       href="{{url(app()->getLocale()."/doctors/consultations/open")}}">
                                        {{ __('site.open_consultations') }}
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{url(app()->getLocale()."/doctors/consultations/closed")}}"> {{ __('site.closed_consultations') }}
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{url(app()->getLocale()."/doctors/edit-in-site")}}">
                                        {{__("site.account_settings")}}</a>
                                    <a class="dropdown-item" href="{{url(app()->getLocale()."/doctors/logout")}}">
                                        {{__("site.logout")}}</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                   style="border-right: 1px solid #ccc;border-left: 1px solid #ccc;color: #fff;">
                                    <i class="fa fa-bell icon-animated-bell text-white "
                                       style="font-size: 16px;margin-top: 2px;"></i>
                                    <span class="bgc-danger text-white  border-1 brc-white" style="
                                        border-radius: 30px;
                                        height: 20px;
                                        width: 20px;
                                        text-align:center !important;
                                        margin-top: -20px">
                                           @php
                                               $notifications = \App\Models\Notification::
                                                         where('doctor_id',@Auth::guard('doctor')->user()->id)
                                                         -> where('to','doctor')
                                                        ->where('read',"no")
                                                        ->count();
                                                          echo $notifications;
                                           @endphp
                                    </span>
                                    &nbsp&nbsp
                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                                    &nbsp&nbsp
                                </a>
                                <div class="dropdown-menu "
                                     style="padding: 0px;width:350px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;">
                                    @foreach ($doctor_notes as $note)



                                        <a href="{!! str_replace(['/ar', '/en'], ["/".app()->getLocale(), "/".app()->getLocale()], $note->link) !!}"  note_id="{{$note->id}}"
                                           class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary read_btn ">
                                            <i class="fab fa-circle bgc-blue-tp1 text-white text-110  radius-5"></i>
                                            <span class="text-muted">

{{--                                                {{$note->notification}}--}}



                                                {{ str_replace(
                                                    [
                                                        ' the_patient ',
                                                        ' the_doctor ',
                                                        ' has_asked_for_an_appointment ',
                                                        ' has_determine_appointments_to_choose_one ',
                                                        ' has_confirmed_final_appointment ',
                                                        ' has_released_report ',


                                                     ],
                                                     [
                                                      __("site.the_patient"),
                                                      __("site.the_doctor"),
                                                      __("site.has_asked_for_an_appointment"),
                                                      __("site.has_determine_appointments_to_choose_one"),
                                                      __("site.has_confirmed_final_appointment"),
                                                      __("site.has_released_report"),
                                                      ],
                                                          $note->notification )}}


                                            </span>

                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-md-6" style="text-align: center">
                                                    <span class="text-muted float-left">{{$note->created_at}}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="float-right badge badge-danger radius-round text-80">Read:{{$note->read}}</span>
                                                </div>
                                            </div>
                                        </a>


                                    @endforeach
                                        <hr class="mt-1 mb-1px brc-info-m4">
                                        <a href="#" class="mb-0 py-3 border-0 list-group-item text-blue-m2 text-uppercase text-center text-85 font-bold">
{{--                                            See All Notifications--}}
                                            <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                        </a>
                                </div>
                            </li>



                        @endif


                        @if(Auth::guard('patient')->user() )
                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                   style="border-right: 1px solid #ccc;border-left: 1px solid #ccc;color: #fff;">

                                    @if(Auth::guard('patient')->user()->image)
                                        <img id="id-navbar-user-image"
                                             class=" d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2"
                                             src="{{asset(Config::get('app.upload'))}}/{{Auth::guard('patient')->user()->image}}"
                                             alt="" style="width: 30px;height:30px">
                                    @else
                                        <img
                                            class=" d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2"
                                            src="{{asset('/all/img/user.jpg')}}" style="width: 30px;height:30px">
                                    @endif
                                    &nbsp&nbsp
                                    {{ Auth::guard('patient')->user()->name}}
                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>

                                </a>
                                <div class="dropdown-menu"
                                     style="padding: 5px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ">
{{--                                    <a class="dropdown-item" href="{{url(app()->getLocale()."/specialties")}}/1">--}}
{{--                                        {{ __('site.general_doctor_consultation') }}--}}
{{--                                    </a>--}}
                                    <a class="dropdown-item" href="{{url(app()->getLocale()."/specialties")}}">
                                        {{ __('site.doctor_consultation') }}</a>
                                    <a class="dropdown-item"
                                       href="{{url(app()->getLocale()."/patients/consultations/open")}}">
                                        {{ __('site.open_consultations') }}
                                    </a>
                                    <a class="dropdown-item"
                                       href="{{url(app()->getLocale()."/patients/consultations/closed")}}">
                                        {{ __('site.closed_consultations') }} </a>
                                    <a class="dropdown-item" href="{{url(app()->getLocale()."/patients/edit")}}">
                                        {{__("site.account_settings")}}</a>
                                    <a class="dropdown-item" href="{{url(app()->getLocale()."/patients/logout")}}">
                                        {{__("site.logout")}}</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                   style="border-right: 1px solid #ccc;border-left: 1px solid #ccc;color: #fff;">
                                    <i class="fa fa-bell icon-animated-bell text-white "
                                       style="font-size: 16px;margin-top: 2px;"></i>
                                    <span class="bgc-danger text-white  border-1 brc-white" style="
                                        border-radius: 30px;
                                        height: 20px;
                                        width: 20px;
                                        text-align:center !important;
                                        margin-top: -20px">
                                           @php
                                             $notifications = \App\Models\Notification::
                                                     where('to','patient')
                                                      ->where('patient_id',@Auth::guard('patient')->user()->id)
                                                      ->where('read',"no")
                                                      ->count();
                                                        echo $notifications;
                                           @endphp
                                    </span>
                                    &nbsp&nbsp
                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                                    &nbsp&nbsp
                                </a>
                                <div class="dropdown-menu "
                                     style="padding: 0px;width:350px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;">
                                    @foreach ($patient_notes as $note)
{{--                                        {!! str_replace('_', ' ', $note->link) !!}--}}
                                        ;
                                            <a href="{!! str_replace(['/ar', '/en'], ["/".app()->getLocale(), "/".app()->getLocale()], $note->link) !!}" note_id="{{$note->id}}"
                                               class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary read_btn">
                                                <i class="fab fa-circle bgc-blue-tp1 text-white text-110  radius-5"></i>
                                                <span class="text-muted">
{{--                                                    {{$note->notification}}--}}

                                                    {{ str_replace(
                                                   [
                                                       ' the_patient ',
                                                       ' the_doctor ',
                                                       ' has_asked_for_an_appointment ',
                                                       ' has_determine_appointments_to_choose_one ',
                                                       ' has_confirmed_final_appointment ',
                                                       ' has_released_report ',


                                                    ],
                                                    [
                                                           __("site.the_patient"),
                                                     __("site.the_doctor"),
                                                     __("site.has_asked_for_an_appointment"),
                                                     __("site.has_determine_appointments_to_choose_one"),
                                                     __("site.has_confirmed_final_appointment"),
                                                     __("site.has_released_report"),
                                                     ],
                                                         $note->notification )}}




                                                </span>

                                                <div class="row" style="margin-top: 10px;">
                                                    <div class="col-md-6" style="text-align: center">
                                                        <span class="text-muted float-left">{{$note->created_at}}</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="float-right badge badge-danger radius-round text-80">Read:{{$note->read}}</span>
                                                    </div>
                                                </div>



                                            </a>
                                    @endforeach
                                        <hr class="mt-1 mb-1px brc-info-m4">
                                        <a href="#" class="mb-0 py-3 border-0 list-group-item text-blue-m2 text-uppercase text-center text-85 font-bold">
{{--                                            See All Notifications--}}
                                            <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                        </a>
                                </div>
                            </li>
                        @endif

                        @if ( (@Auth::guard('patient')->user()->id) or (@Auth::guard('doctor')->user()->id))
                        @else

                            <li class="nav-item dropdown dropdown-hover">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                   style="border-right: 1px solid #ccc;border-left: 1px solid #ccc;color: #fff;">
                                    {{ __('site.login') }}
                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                                </a>
                                <div class="dropdown-menu "
                                     style="padding: 5px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ">
                                    @if ( @!Auth::guard('patient')->user()->id)
                                        <a class="dropdown-item" href="{{url(app()->getLocale()."/patients/create")}}">
                                            {{ __('site.patient') }}</a>
                                    @endif
                                    @if ( @!Auth::guard('doctor')->user()->id)
                                        <a class="dropdown-item" href="{{url(app()->getLocale()."/doctors/login")}}">
                                            {{ __('site.doctor') }} </a>
                                    @endif
                                </div>
                            </li>
                        @endif

                    </ul><!-- /.navbar-nav menu -->
                </div><!-- /.navbar-nav -->
            </div><!-- /.navbar-menu.navbar-collapse -->

            <button type="button"
                    class="d-style mr-2 px-4 navbar-toggler btn btn-burger static d-flex d-lg-none collapsed"
                    data-toggle="collapse" data-target="#navbarMenu2" aria-controls="navbarMenu2" aria-expanded="false"
                    aria-label="Toggle navbar menu">
                <i class="fa fa-caret-down d-collapsed text-grey-m1 text-80"></i>
                <i class="fa fa-caret-up d-n-collapsed text-grey-m1 text-80"></i>
                <i class=" 	fas fa-list-ul text-orange-d1 ml-2"></i>

            </button><!-- mobile navbar toggler button -->

            <div class="navbar-menu navbar-collapse navbar-backdrop collapse" id="navbarMenu2" style="">
                <div class="navbar-nav">
                    <ul class="nav">
                        @if($contacts->mobile1)
                            <li class="nav-item px-3 border-l-1 brc-default-l1">
                              <span class="d-flex h-100 align-items-center text-grey-d1 py-3">
                                  <i class="fa fa-phone fa-flip-horizontal text-125 text-white mr-1"></i>
                                  <span class="text-90 ml-1 ml-lg-0 d-lg-none d-xl-inline-block">

                                  </span>
                                  <span class="ml-1 text-600 text-white letter-spacing-1 d-lg-none d-xl-inline-block">
                                      {{$contacts->mobile1}}
                                  </span>
                              </span>
                            </li>
                        @endif

                        @foreach (config('app.available_locales') as $locale)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/{{ $locale }}"
                                   @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>
                                    {{ strtoupper($locale) }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
    </div><!-- /.navbar-inner -->
</nav>







