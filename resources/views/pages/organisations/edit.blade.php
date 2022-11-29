@extends('layouts.master')
@section('title')
    {{ __('messages.Organisations Management - Edit') }}
@endsection
@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ __('messages.Edit Organisations From') }}</h3>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('dashboard') }}">{{ __('messages.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="{{ route('organisations.index') }}">{{ __('messages.Organisations') }}</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        {{ __('messages.Edit Organisations') }}
                    </li>
                </ol>
            </nav>
        </div>
        <div class="block-content block-content-full">
            @livewire('organisations.from', ['organisations' => $organisations])
        </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
