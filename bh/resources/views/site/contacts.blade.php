@extends('layouts.site.master')



@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1     style="text-align: center;padding:10px;">
                    {{ __('site.contactus') }}
                </h1>
            </div>
        </div>
    </div>
    <div class="container"
         style="direction:@if(App::getLocale() == 'ar') rtl @else ltr @endif  ;text-align:@if(App::getLocale() == 'ar') right @else left @endif  ;
             ">
        <div class="row">
            <div class="col-md-6">
        @if (session('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
            </div>
        </div>
        <form method="POST" id="form-5" action="{{url(app()->getLocale()."/send-to-mail")}}"
              enctype="multipart/form-data" >
            @csrf
            <div class='row' style="margin-top: 10px">
                <div class=' col-md-5' style="margin: auto">
                    <div class="row">
                        <div class="col-md-12">
                            <label style="font-weight: bold">{{__('site.name')}}</label>
                            <input type="text" class="form-control form-control-md" name="name" placeholder="{{__('site.name')}}" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="font-weight: bold">{{__('site.subject')}}</label>
                            <input type="text" class="form-control form-control-md" name="subject" placeholder="{{__('site.subject')}}" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="font-weight: bold">{{__('site.mobile')}}</label>
                            <input type="text" class="form-control form-control-md" name="mobile" placeholder="{{__('site.mobile')}}" required/>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12' style="margin: auto">
                            <label style="font-weight: bold">{{__('site.email')}}</label>
                            <input type="text" class="form-control form-control-md" name="email" placeholder="{{__('site.email')}}" required/>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-12" style="margin: auto">
                            <div>
                                <label style="font-weight: bold">{{__('site.message') }} </label>
                                <div style="direction: ltr;text-align: left">
                                     <textarea name="message" id="message"  rows="5" class="form-control form-control-sm col-md-12"
                                               style="border-radius:5px" required="">
                                     </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row' style="margin-top: 25px;">
                        <div class='col-sm-12' style="text-align: center;margin: 0">
                            <button class="btn btn-lg btn-lighter-secondary " name="Submit" type="Submit" style="width: 200px;">{{__('site.submit') }}
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>


    </div>

@endsection
