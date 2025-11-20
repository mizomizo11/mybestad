
@extends('layouts.site.master')

@section('breadcrumb')
@endsection
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                <h4> {{ __('site.forgot_password') }}</h4><hr>
                <form action="{{ route('doctor.forgot.password.link',['locale'=>App()->getLocale()]) }}" method="post">
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
                    <div class="form-group">
                        <label for="email">{{ __('site.email') }}</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address"
                               value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('site.send_reset_password_link') }}</button>
                    </div>
                    <br>
                    <a href="{{ route('doctor_login',['locale'=>App()->getLocale()]) }}">{{ __('site.login') }}</a>
                </form>
            </div>
        </div>
    </div>


@endsection




