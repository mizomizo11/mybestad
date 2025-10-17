@extends('layouts.site.master')
@section('content')

    <div class="container" style="margin-top: 50px;direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">

        <div class="row">
            <div class="col-md-12">
                <h3  style="text-align: center;color: #ce8728;border-bottom:1px solid #ff8c0b;padding:10px;color: #ffca08;">
                    {{ __('site.privacy_policy') }}
                </h3>
            </div>
        </div>

        <div class="row"  >
            <div class="col-md-12">
                @if(App::getLocale() == 'ar') {!! $privacy_policy->details_ar !!}  @else  {!! $privacy_policy->details_en !!}  @endif
            </div>
        </div>

    </div>


@endsection
