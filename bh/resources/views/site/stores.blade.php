@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')


    <div class="container" style="margin-top: 10px;">
        <div class="row d-flex justify-content-between align-items-center">
            <img src="{{asset('all/img/banner1.jpg')}}" style="width: 100%;height: 200px;">
        </div>
    </div>



    @include('layouts.site.show_navbar')


    <div class="container" style="margin-top: 10px;border: 1px solid #dbdfe2">
        <div class="row">
            <div class="col-md-2 " style="padding: 0px">

                <div style="" id="sidebar" class="sidebar  expandable sidebar-default">
                    <div class="sidebar-inner">
                        <div class="flex-grow-1 ace-scroll" ace-scroll="">
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
                                            <button class="btn btn-smd btn-success">
                                                <i class="fa fa-signal"></i>
                                            </button>

                                            <button class="btn btn-smd btn-info">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <button class="btn btn-smd btn-warning">
                                                <i class="fa fa-users"></i>
                                            </button>

                                            <button class="btn btn-smd btn-danger">
                                                <i class="fa fa-cogs"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>



                            </div>

                            <ul class="nav has-active-border" role="navigation" aria-label="Main">

                                <li class="nav-item">

                                    <a href="html/dashboard.html" class="nav-link">
                                        <i class="nav-icon fa fa-tachometer-alt"></i>
                                        <span class="nav-text fadeable">
                                          <span>Dashboard</span>
                                         </span>
                                    </a>
                                    <b class="sub-arrow"></b>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>الكلاب</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>قطط</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>خيول</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>طيور</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>اسماك</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>قوارض</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>اغنام</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>جمال</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>ادوات زراعية</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>زواحف</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>نحل</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>نباتات</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>حشرات</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>حمام</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>ابقار</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>ماعز</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>خنازير</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-cube"></i>
                                        <span class="nav-text fadeable">
                                           <span>خيول القفز</span>
                                         </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                    </a>
                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة كلب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اضافة نادي منتج للكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>عرض النوادي المنتجة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الكلاب المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الجراء المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر الولادات المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر خطط التزاوج المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>اخر النوادي المنتجة المسجلة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>كلاب للبيع  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الكلاب الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الولادات الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>بحث  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>خطط التزاوج الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي المنتجة الاكثر مشاهدة  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>متاجر خدمات الكلاب  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>النوادي -الجمعيات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>المقالات  </span>
                                                     </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="html/dashboard-2.html" class="nav-link">
                                                     <span class="nav-text">
                                                      <span>الفعاليات والمسابقات  </span>
                                                     </span>
                                                </a>
                                            </li>



                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>




                                <li class="nav-item-caption">
                                    <span class="fadeable pl-3">OTHER</span>
                                    <span class="fadeinable mt-n2 text-125">…</span>
                                    <!--
                                        OR something like the following (with .hideable text)
                                    -->
                                    <!--
                                        <div class="hideable">
                                            <span class="pl-3">OTHER</span>
                                        </div>
                                        <span class="fadeinable mt-n2 text-125">&hellip;</span>
                                    -->
                                </li>


                                <li class="nav-item">

                                    <a href="#" class="nav-link dropdown-toggle">
                                        <i class="nav-icon fa fa-tag"></i>
                                        <span class="nav-text fadeable">
               	  <span>More Pages</span>
               		  <span class="badge badge-primary radius-round text-90 ml-1 mr-2px badge-sm ">5</span>
               	 </span>

                                        <b class="caret fa fa-angle-left rt-n90"></b>

                                        <!--
                                            <b class="caret caret-shown fa fa-minus text-80"></b>
                                            <b class="caret caret-hidden fa fa-plus text-80"></b>
                                        -->
                                    </a>

                                    <div class="hideable submenu collapse">
                                        <ul class="submenu-inner">

                                            <li class="nav-item">

                                                <a href="html/page-profile.html" class="nav-link">

               				 <span class="nav-text">
               				  <span>Profile</span>
               				 </span>


                                                    <!--
                                                    -->
                                                </a>


                                            </li>


                                            <li class="nav-item">

                                                <a href="html/page-login.html" class="nav-link">

               				 <span class="nav-text">
               				  <span>Login</span>
               				 </span>


                                                    <!--
                                                    -->
                                                </a>


                                            </li>


                                            <li class="nav-item">

                                                <a href="html/page-pricing.html" class="nav-link">

               				 <span class="nav-text">
               				  <span>Pricing</span>
               				 </span>


                                                    <!--
                                                    -->
                                                </a>


                                            </li>


                                            <li class="nav-item">

                                                <a href="html/page-invoice.html" class="nav-link">

               				 <span class="nav-text">
               				  <span>Invoice</span>
               				 </span>


                                                    <!--
                                                    -->
                                                </a>


                                            </li>


                                            <li class="nav-item">

                                                <a href="html/page-error.html" class="nav-link">

               				 <span class="nav-text">
               				  <span>Error</span>
               				 </span>


                                                    <!--
                                                    -->
                                                </a>


                                            </li>

                                        </ul>
                                    </div>

                                    <b class="sub-arrow"></b>


                                </li>

                            </ul>

                        </div><!-- /.sidebar scroll -->


                        <div class="sidebar-section">
                            <div class="sidebar-section-item fadeable-bottom">
                                <div class="fadeinable">
                                    <div class="pos-rel">
                                        <img src="assets/image/avatar/avatar4.jpg" width="42"
                                             class="radius-round float-left mx-2 border-2 px-1px brc-secondary-m2">
                                        <span
                                            class="bgc-success-tp2 radius-round border-2 brc-white p-1 position-tr mr-1"></span>
                                    </div>
                                </div>

                                <div class="fadeable hideable w-100 bg-transparent shadow-none border-0">
                                    <div id="sidebar-footer-bg"
                                         class="bgc-white d-flex align-items-center shadow-sm mx-2 mt-2px py-2 radius-t-1 border-1 border-t-2 border-b-0 brc-primary-m3">
                                        <div class="d-flex mr-auto py-1">
                                            <div class="pos-rel">
                                                <img src="assets/image/avatar/avatar4.jpg" width="42"
                                                     class="radius-round float-left mx-2 border-2 px-1px brc-default-m2">
                                                <span
                                                    class="bgc-success-tp2 radius-round border-2 brc-white p-1 position-tr mr-1 mt-1"></span>
                                            </div>

                                            <div>
                                                <span class="text-blue font-bolder">Alexa</span>
                                                <div class="text-80 text-grey">
                                                    Admin
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" class="btn btn-outline-blue border-0 p-2 mr-2px ml-4" title=""
                                           data-toggle="modal" data-target="#id-ace-settings-modal"
                                           data-original-title="Settings">
                                            <i class="fa fa-cog text-150"></i>
                                        </a>

                                        <a href="html/page-login.html" class="btn btn-outline-warning border-0 p-2 mr-1"
                                           title="" data-original-title="Logout">
                                            <i class="fa fa-sign-out-alt text-150"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-10">

                <div class="d-flex justify-content-between align-items-center bgc-grey-l4" style="margin: 5px 0px;border-radius:5px">
                    <ol class="breadcrumb pl-2">
                        <li class="breadcrumb-item active text-grey">
                            <i class="fa fa-home text-dark-m3 mr-1"></i>
                            <a class=" color_red" href="http://127.0.0.1:8000/dashboard/index">
                                الصفحة الرئيسية
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-grey-d1"><a href="http://127.0.0.1:8000/dashboard/shipments/draft"> الكلاب </a>  </li>

                    </ol>
                </div>

                    <div class="dropdown d-inline-block dd-backdrop dd-backdrop-none-md mt-3">
                        <a class="btn btn-lighter-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           بحث  <i class="fa fa-arrow-down text-110 mt-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-caret dropdown-animated dd-slide-up dd-slide-none-md radius-1" aria-labelledby="dropdownMenuLink3" style="">
                            <div class="dropdown-inner">
                                <a class="dropdown-item" href="#">بحث عن كلب </a>
                                <a class="dropdown-item" href="#">بحث عن خطة تزاوج </a>
                                <a class="dropdown-item" href="#">بحث عن  ولادة </a>
                                <a class="dropdown-item" href="#">بحث عن  نادي منتج </a>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">بحث</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">اضافة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">اضافة نادي منتج</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">عرض النوادي المنتجة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;"> اخر الكلاب المسجلة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;"> اخر الجراء المسجلة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">اخر الولادات المسجلة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;"> اخر خطط التزاوج المسجلة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">اخر النوادي المنتجة المسجلة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">كلاب للبيع </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">الكلاب الاكثر مشاهدة </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">الولادات الاكثر مشاهدة</button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">   <span>خطط التزاوج الاكثر مشاهدة  </span> </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">    <span>النوادي المنتجة الاكثر مشاهدة  </span> </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">       <span>متاجر خدمات الكلاب  </span> </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">      <span>النوادي -الجمعيات  </span>  </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">     <span>المقالات  </span> </button>
                    <button class="btn btn-sm btn-lighter-secondary mb-2px" style="margin-left: 0px !important;">        <span>الفعاليات والمسابقات  </span> </button>


                    <div class="container" style="margin: 20px;padding:10px;border:1px solid #e3e3e3;background-color: #f6f7f7;border-radius: 10px">
                        <form class="noprint" name="form1" method="get" action="http://127.0.0.1:8000/dashboard/reports/shipments_count" >
                            <div class="row " >



                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center  text-blue-m1 brc-blue-m2">
                                        <select class="form-control form-control-md ace-select  shadow-none" style="padding-top: 2px">
                                            <option>في كل السلالات</option>
                                            <option>في كل السلالات</option>
                                            <option>في كل السلالات</option>
                                            <option>في كل السلالات</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="d-flex   text-blue-m1 brc-blue-m2">
                                        <select class="form-control form-control-md ace-select  shadow-none" style="padding-top: 2px">
                                            <option>all breeds</option>
                                            <option>في كل السلالات</option>
                                            <option>في كل السلالات</option>
                                            <option>في كل السلالات</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">اسم الكلب </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3" > تاريخ الميلاد</label>

                                    </div>
                                </div>

                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">رقم الميكروشيب</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">رقم البيدغري</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">القارة</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">البلد</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">الاقليم</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                        <input type="text" class="form-control form-control-md pr-4 shadow-none"  autocomplete="off">
                                        <label class="floating-label text-grey-l1 text-100 ml-n3">المدينة</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row" >
                                <div class="col-md-12" style="text-align: center">

                                    <button class="btn btn-md btn-info "  style="margin: auto"> بحث   </button>
                                    <button class="btn btn-md btn-info" type="button"  style="margin: auto">
                                        <i class="fa fa-check mr-1"></i>
                                        اعادة تهيئة
                                    </button>
                                    <button class="btn btn-md  btn-info " type="reset" style="margin: auto">
                                        <i class="fa fa-undo mr-1"></i>
                                        الغاء
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>














            </div>

        </div>
    </div>






    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="dd add-to-cart"
                    style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #141d86;font-family: font2;font-size: 33px;font-weight: bold;;">
                    <img src="images/logo.png" alt="" style="height: 40px;">
                    {{ __('site.stores') }}
                    <img src="images/logo.png" alt="" style="height: 40px;">
                </h1>
            </div>
        </div>
    </div>


    <div class="container" style="margin-bottom: 50px;margin-top: 20px;">
        <div class="row">
            @foreach ($stores as $store)
                <div class="col-md-3 col-sm-6" style="text-align: center;margin-bottom: 20px">
                    <a href='{{url(app()->getLocale()."/stores/$store->id")}}'>
                        <img class="pic-1" src="{{asset("images/$store->pic")}}" style='height:200px;width: 100%'>
                        <h5 style="margin: 10px">
                            @if(App::getLocale() == 'ar')
                                {{$store->name}}
                            @else
                                {{$store->name_eng}}
                            @endif
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection



