@extends('layouts.dashboard.master')

@section('breadcrumb')
    <div class="content-nav mb-1 bgc-grey-l4">
        <div class="d-flex justify-content-between align-items-center">
            <ol class="breadcrumb pl-2">
                <li class="breadcrumb-item active text-grey">
                    <i class="fa fa-home text-dark-m3 mr-1"></i>
                    <a class="" href="{{url(app()->getLocale().'/dashboard/index')}}">
                        الصفحة الرئيسية
                    </a>
                </li>
           </ol>
        </div>
    </div><!-- breadcrumbs -->
@endsection


@section('content')


    <div class="row">

        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                   <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('doctors') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110">الاطباء المشتركين</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                   <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('patients') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110">المرضى المشتركين</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                    <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('users') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110"> ادارة المستخدمين</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                    <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="fa fa-tachometer-alt text-primary text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('specialties') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110">ادارة الاختصاصات</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                  <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('carousels') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110"> الصور المتحركة</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                   <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('services') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110"> الخدمات</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0" style="margin-top: 10px">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                   <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('consultations') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110">الاستشارات </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 px-2 mb-1 mb-md-0" style="margin-top: 10px">
            <div class="pos-rel d-flex flex-column text-center  px-2 py-3 radius-1 shadow-sm h-100" style="background-color: #bdd7ea">
                <div class="mb-1">
                  <span class="d-inline-block bgc-info-l2 p-3 radius-round">
                        <i class="	fas fa-user text-primary-m1 text-180 w-4"></i>
                    </span>
                </div>
                <div class="mt-2px">
                    <div class="text-dark-tp4 text-180">  {{  DB::table('countries') ->count()    }}</div>
                    <div class="text-dark-tp5 text-110"> الدول</div>
                </div>
            </div>
        </div>


    </div>

@endsection
