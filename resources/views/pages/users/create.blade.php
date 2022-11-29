@extends('layouts.master')
@section('title')
    {{ __('messages.Users Management - Create') }}
@endsection
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('messages.Add Notes From') }}</h3>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('dashboard') }}">{{ __('messages.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('users.index') }}">{{ __('messages.Users') }}</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Add Users
                    </li>
                </ol>
            </nav>
        </div>
        <div class="block-content block-content-full">
            {!! Form::open(['route' => ['users.store'], 'id' => '', 'files' => 'true']) !!}
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    @include('pages.users.form')
                    <div class="hr-line-dashed"></div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-8 col-sm-offset-8">
                                <button class="btn btn-success btn-sm" type="submit">{{ __('messages.Save') }}</button>
                                <a href="{{ route('users.index') }}"
                                    class="btn btn-danger btn-sm">{{ __('messages.Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
