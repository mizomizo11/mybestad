<!doctype html>
<html class="rtl" style="font-size: 0.85rem;direction:@if(App()->getLocale() == 'ar') rtl @else ltr @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">

@include('layouts.site.head')
<body>
<div class="body-container">
    <div class="main-container">
        <div role="main" class="main-content">
            <div class="page-content container">
                <div class="row">
                    <div class="col-8 " style="margin: auto">
                        <div class="container" style=";margin-bottom: 50px;text-align: @if(App::getLocale() == 'ar')  right  @else  left   @endif ;direction: @if(App::getLocale() == 'ar')  rtl  @else  ltr   @endif ">
                            <div class="row" style="background-color: #bdd7ea;margin-top: 150px">
                                <div class="col-md-8" style="margin: auto">
                                    <h1 class="" style="text-align: center;border-bottom:1px solid #df424c;">Admin Control panel</h1>
                                                @if(session('error'))
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                                {{session('error')}}
                                                        </ul>
                                                    </div>
                                                @endif

                                    @if (Session::has('message'))
                                        <div class="alert alert-warning">{{ Session::get('message') }}</div>
                                    @endif
                                    <form method="POST" action="{{ route('admin_login_form', ['locale' => app()->getLocale()]) }}">
                                        @csrf
                                        <div class='row' >
                                            <div class='col-md-12'>
                                                <div>
                                                    <label>*{{ __('site.email') }}</label>
                                                </div>
                                                <div>
                                                    <input type="text" name="email"  class="form-control form-control-lg"  style="direction: ltr;text-align: left" required=""  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row' style="margin-top: 10px;">
                                            <div class='col-md-12'>
                                                <div>
                                                    <label>* {{ __('site.password') }}</label>
                                                    <input type="text" name="password" class="form-control form-control-lg" style="direction: ltr;text-align: left"  required=""  />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="notice">  </div>
                                        <div class='row' style="margin-top: 25px;">
                                            <div class='col-sm-12' style="text-align: center;margin: 0px;">
                                                <button  class="btn btn-md  btn-info "  name="login_btn" id="login_btn"   style="width: 200px">{{ __('site.login') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div><!-- /.page-content -->
        </div><!-- /main-content -->

    </div>{{--/main-container--}}

</div>{{--/body-container--}}

</body>
</html>

