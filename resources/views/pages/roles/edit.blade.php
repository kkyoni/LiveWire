@extends('layouts.master')
@section('title')
    {{ __('messages.Roles Management - Edit') }}
@endsection
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('messages.Edit Roles From') }}</h3>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('dashboard') }}">{{ __('messages.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('roles.index') }}">{{ __('messages.Roles') }}</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        {{ __('messages.Edit Roles') }}
                    </li>
                </ol>
            </nav>
        </div>
        <div class="block-content block-content-full">
            {!! Form::model($roles, ['method' => 'post', 'files' => true, 'route' => ['roles.update', $roles->id]]) !!}
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    @include('pages.roles.form')
                    <div class="hr-line-dashed"></div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-8 col-sm-offset-8">
                                <button class="btn btn-success btn-sm" type="submit">{{ __('messages.Update') }}</button>
                                <a href="{{ route('roles.index') }}"
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
