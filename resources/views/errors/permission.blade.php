@extends('layouts.master')
@section('title')
    {{ __('messages.Permission denied') }}
@endsection
@section('content')
    <div class="hero-inner text-center">
        <div class="bg-body-extra-light">
            <div class="content content-full overflow-hidden">
                @if (isset($message))
                    <div class="py-4">
                        <h1 class="display-1 fw-bolder text-city">
                            404
                        </h1>
                        <h2 class="font-bold">{{ __('messages.Permission denied') }}</h2>
                        <h2 class="h4 fw-normal text-muted mb-5 alert alert-danger">
                            {{ $message }}
                        </h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
