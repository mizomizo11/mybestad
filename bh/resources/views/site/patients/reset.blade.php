@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')



    <div class="container" style="direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-4 " style="margin: auto">
                <h4>{{ __('site.reset_password') }}</h4><hr>
                <form action="{{ route('patient.reset.password',['locale'=>App()->getLocale()]) }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @csrf
                    <input type="hidden" name="token" size="100" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email">{{ __('site.email') }}</label>
                        <input type="text" class="form-control" name="email" style="direction: ltr;text-align: left" placeholder="Enter email address"
                               value="{{ $email ?? old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('site.new_password') }}</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" style="direction: ltr;text-align: left" value="{{ old('password') }}">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('site.confirm_new_password') }}</label>
                        <input type="password" class="form-control" name="password_confirmation" style="direction: ltr;text-align: left" placeholder="Enter password" value="{{ old('password_confirmation') }}">
                        <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">{{ __('site.reset_password') }}</button>
                    </div>
                    <br>
                    <a href="{{ route('patient.create',['locale'=>App()->getLocale()]) }}">{{ __('site.login') }}</a>
                </form>
            </div>
        </div>
    </div>

@endsection


