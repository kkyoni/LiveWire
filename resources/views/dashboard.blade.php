@extends('layouts.master')
@section('title')
    {{ __('messages.Dashboard') }}
@endsection
@section('content')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-2">{{ __('messages.Dashboard') }}</h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                {{ __('messages.Welcome') }} <a class="fw-semibold"
                    href="{{ route('dashboard') }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>!
            </h2>
        </div>
    </div>

    <div class="row items-push mt-5">
        <div class="col-sm-6 col-xxl-3">
            <div class="block block-rounded d-flex flex-column h-100 mb-0 bg-gradient-x-personen_count white">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ $person_total }}</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium mb-0">{{ __('messages.Personen Total') }}</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="fa fa-users fs-3 text-primary"></i>
                    </div>
                </div>
                <div class="bg-body-light rounded-bottom bg-gradient-x-personen_count white">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between white"
                        href="{{ route('persons.index') }}">
                        <span>{{ __('messages.View all') }}</span>
                        <i class="fa fa-arrow-alt-circle-right ms-1 fs-base"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3">
            <div class="block block-rounded d-flex flex-column h-100 mb-0 bg-gradient-x-organisations_count white">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ $organisations_total }}</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium mb-0">{{ __('messages.Organisations Total') }}</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="fa fa-building fs-3 text-primary"></i>
                    </div>
                </div>
                <div class="bg-body-light rounded-bottom bg-gradient-x-organisations_count white">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between white"
                        href="{{ route('organisations.index') }}">
                        <span>{{ __('messages.View all') }}</span>
                        <i class="fa fa-arrow-alt-circle-right ms-1 fs-base"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3">
            <div class="block block-rounded d-flex flex-column h-100 mb-0 bg-gradient-x-networkpartner_count white">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ $networkpartner_total }}</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium mb-0">{{ __('messages.Network Partners Total') }}</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="fa fa-paw fs-3 text-primary"></i>
                    </div>
                </div>
                <div class="bg-body-light rounded-bottom bg-gradient-x-networkpartner_count white">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between white"
                        href="{{ route('networkpartners.index') }}">
                        <span>{{ __('messages.View all') }}</span>
                        <i class="fa fa-arrow-alt-circle-right ms-1 fs-base"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xxl-3">
            <div class="block block-rounded d-flex flex-column h-100 mb-0 bg-gradient-x-notes_count white">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                        <dt class="fs-3 fw-bold">{{ $note_total }}</dt>
                        <dd class="fs-sm fw-medium fs-sm fw-medium mb-0">{{ __('messages.Notes Total') }}</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                        <i class="fa fa-paper-plane fs-3 text-primary"></i>
                    </div>
                </div>
                <div class="bg-body-light rounded-bottom bg-gradient-x-notes_count white">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between white"
                        href="{{ route('notes.index') }}">
                        <span>{{ __('messages.View all') }}</span>
                        <i class="fa fa-arrow-alt-circle-right ms-1 fs-base"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style type="text/css">
        .white {
            color: #FFF;
        }

        .white:hover {
            color: #FFF;
        }

        .bg-gradient-x-users_count {
            background-image: linear-gradient(to right, #1171ef 0%, #11cdef 100%);
            background-repeat: repeat-x;
        }

        .bg-gradient-x-personen_count {
            background-image: linear-gradient(to right, #8803fc 0%, #cf9afe 100%);
            background-repeat: repeat-x;
        }

        .bg-gradient-x-organisations_count {
            background-image: linear-gradient(to right, #fb6340 0%, #fbb140 100%);
            background-repeat: repeat-x;
        }

        .bg-gradient-x-networkpartner_count {
            background-image: linear-gradient(to right, #2dce89 0%, #2dcecc 100%);
            background-repeat: repeat-x;
        }

        .bg-gradient-x-notes_count {
            background-image: linear-gradient(to right, #5e72e4 0%, #8e9cec 100%);
            background-repeat: repeat-x;
        }
    </style>
@endsection
@section('scripts')
@endsection
