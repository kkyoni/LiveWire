@extends('layouts.master')
@section('title')
    {{ __('messages.Profile') }}
@endsection
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('messages.Profile') }}</h3>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('dashboard') }}">{{ __('messages.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        {{ __('messages.Profile update') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row items-push">
        <div class="col-sm-6">
            <div class="block block-rounded h-100 mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ __('messages.Profile update') }}</h3>
                </div>
                <div class="block-content">
                    {!! Form::open([
                        'route' => 'users.updateProfileDetail',
                        'files' => true,
                    ]) !!}
                    <div class="form-group row {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">{{ __('messages.First Name') }}</label>
                            <input type="text" class="form-control" id="example-text-input-alt"
                                placeholder="{{ __('messages.First Name') }}" value="{{ $user->first_name }}"
                                name="first_name">
                            <span class="help-block">
                                <font color="red">
                                    {{ $errors->has('first_name') ? '' . $errors->first('first_name') . '' : '' }} </font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : '' }}">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">{{ __('messages.Last Name') }}</label>
                            <input type="text" class="form-control" id="example-text-input-alt"
                                placeholder="{{ __('messages.Last Name') }}" value="{{ $user->last_name }}"
                                name="last_name">
                            <span class="help-block">
                                <font color="red">
                                    {{ $errors->has('last_name') ? '' . $errors->first('last_name') . '' : '' }} </font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">{{ __('messages.Email') }}</label>
                            <input type="text" class="form-control" id="example-text-input-alt"
                                placeholder="{{ __('messages.Email') }}" value="{{ $user->email }}" name="email">
                            <span class="help-block">
                                <font color="red"> {{ $errors->has('email') ? '' . $errors->first('email') . '' : '' }}
                                </font>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="mb-4">
                            <button class="btn btn-primary btn-sm"
                                type="submit">{{ __('messages.Update Profile') }}</button>
                            <a href="{{ route('dashboard') }}"
                                class="btn btn-danger btn-sm">{{ __('messages.Cancel') }}</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="block block-rounded h-100 mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ __('messages.Change Password') }}</h3>
                </div>
                <div class="block-content">
                    {!! Form::open([
                        'route' => 'users.updatePassword',
                        'files' => true,
                    ]) !!}
                    <div class="form-group row {{ $errors->has('old_password') ? 'has-error' : '' }}">
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Current Password') }}</label>
                            <input type="password" class="form-control" id="example-text-input-alt"
                                placeholder="{{ __('messages.Current Password') }}" value="{{ old('old_password') }}"
                                name="old_password">
                            <span class="help-block">
                                <font color="red">
                                    {{ $errors->has('old_password') ? '' . $errors->first('old_password') . '' : '' }}
                                </font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.New Password') }}</label>
                            <input type="password" class="form-control" id="example-text-input-alt"
                                placeholder="{{ __('messages.New Password') }}" name="password">
                            <span class="help-block">
                                <font color="red">
                                    {{ $errors->has('password') ? '' . $errors->first('password') . '' : '' }} </font>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <div class="mb-4">
                            <label class="form-label"
                                for="example-text-input-alt">{{ __('messages.Confirm Password') }}</label>
                            <input type="password" class="form-control" id="example-text-input-alt"
                                placeholder="{{ __('messages.Confirm Password') }}" name="password_confirmation">
                            <span class="help-block">
                                <font color="red">
                                    {{ $errors->has('password_confirmation') ? '' . $errors->first('password_confirmation') . '' : '' }}
                                </font>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="mb-4">
                            <button class="btn btn-primary btn-sm"
                                type="submit">{{ __('messages.Update Password') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
