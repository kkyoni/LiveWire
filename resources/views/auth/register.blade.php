@extends('layouts.masterAuth')
@section('title')
    {{ __('messages.Sign Up') }}
@endsection
@section('contentAuth')
    <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-extra-light">
        <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
            <div class="w-100">
                <div class="text-center mb-5">
                    <p class="mb-3">
                        <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                    </p>
                    <h1 class="fw-bold mb-2">{{ __('messages.Sign Up') }}</h1>
                </div>
                <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-4">
                        <form class="js-validation-signup" action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="text" placeholder="{{ __('messages.First Name') }}"
                                    class="form-control form-control-lg py-3" id="signup-username" name="first_name"
                                    autofocus>
                                <span class="help-block">
                                    <font color="red">
                                        {{ $errors->has('first_name') ? '' . $errors->first('first_name') . '' : '' }}
                                    </font>
                                </span>
                            </div>
                            <div class="mb-4">
                                <input type="text" placeholder="{{ __('messages.Last Name') }}"
                                    class="form-control form-control-lg py-3" id="signup-username" name="last_name"
                                    autofocus>
                                <span class="help-block">
                                    <font color="red">
                                        {{ $errors->has('last_name') ? '' . $errors->first('last_name') . '' : '' }} </font>
                                </span>
                            </div>
                            <div class="mb-4">
                                <input type="text" placeholder="{{ __('messages.Email') }}" id="signup-email"
                                    class="form-control form-control-lg py-3" name="email" autofocus>
                                <span class="help-block">
                                    <font color="red">
                                        {{ $errors->has('email') ? '' . $errors->first('email') . '' : '' }}
                                    </font>
                                </span>
                            </div>
                            <div class="mb-4">
                                <input type="password" placeholder="{{ __('messages.Password') }}" id="signup-password"
                                    class="form-control form-control-lg py-3" name="password" autofocus>
                                <span class="help-block">
                                    <font color="red">
                                        {{ $errors->has('password') ? '' . $errors->first('password') . '' : '' }} </font>
                                </span>
                            </div>
                            <div class="mb-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember">{{ __('messages.Remember Me') }} </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <button type="submit" class="btn btn-dark btn-lg">
                                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i>{{ __('messages.Sign Up') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between fs-sm text-center text-sm-start">
            <p class="fw-medium text-black-50 py-2 mb-0">
                <strong>FEEI</strong> &copy; <span data-toggle="year-copy"></span>
            </p>
        </div>
    </div>
@endsection
