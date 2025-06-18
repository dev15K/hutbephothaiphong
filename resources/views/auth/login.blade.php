@extends('error.master')
@section('title')
    {{ __('auth.page_login') }}
@endsection
@section('content')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <img src="{{ $setting ? $setting->logo : '' }}" alt="">
                                <span class="d-none d-lg-block">{{ $setting ? $setting->home_name : '' }}</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">{{ __('auth.page_login_title') }}</h5>
                                    <p class="text-center small">{{ __('auth.page_login_description') }}</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate action="{{ route('auth.processLogin') }}"
                                      method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="login_request" class="form-label">{{ __('input.Email') }}</label>
                                        <input type="text" name="login_request" class="form-control" id="login_request"
                                               required>
                                        <div class="invalid-feedback">{{ __('input.email_message') }}</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">{{ __('input.Password') }}</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                               required>
                                        <div class="invalid-feedback">{{ __('input.password_message') }}</div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <a class="small" href="#">{{ __('auth.forgot_password') }}</a>
                                    </div>

                                    <input type="hidden" name="url_callback" value="{{ $url_callback }}">

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100"
                                                type="submit">{{ __('auth.page_login') }}</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">{{ __('auth.dont_have_account') }} <a
                                                href="{{ route('auth.register') }}">{{ __('auth.create_account') }}</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            {{ __('error.designed_by') }} <a target="_blank"
                                                             href="{{ $setting ? $setting->author_social : '' }}">{{ $setting ? $setting->author_name : '' }}</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
