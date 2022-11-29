@extends('layouts.masterAuth')
@section('title')
    {{ __('messages.Forget Password') }}
@endsection
@section('contentAuth')
    <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-extra-light">
        <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
            <div class="w-100">
                <div class="text-center mb-5">
                    <p class="mb-3">
                        <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
                    </p>
                    <h1 class="fw-bold mb-2">{{ __('messages.Forget Password') }}</h1>
                </div>
                <div class="row g-0 justify-content-center">
                    <div class="col-sm-8 col-xl-4">
                        <form class="js-validation-reminder" action="{{ route('forget.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <input type="text" class="form-control form-control-lg py-3" id="reminder-credential"
                                    name="email" placeholder="{{ __('messages.Username or Email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-alt-primary">
                                    <i class="fa fa-fw fa-envelope me-1 opacity-50"></i> {{ __('messages.Send Mail') }}
                                </button>
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
