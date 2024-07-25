@extends('layouts.app')

@section('content')
    <style>
        @media (max-width: 767.98px) {
            .border-sm-start-none {
                border-left: none !important;
            }
        }

        .pt-5,
        .py-5 {
            padding-top: 5rem !important;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .filter-bar {
            background-color: #fff;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
            margin-top: 24px;
        }

        .filter-bar h4 {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .filter-bar .form-group {
            margin-bottom: 10px;
        }

        .filter-bar .btn-filter {
            font-size: 0.875rem;
            padding: 8px 16px;
        }

        .filter-bar .btn-filter:hover {
            background-color: #0056b3;
        }

        .card-body {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .custom-navbar .nav .item .link {
            color: #6c757d;
        }

        .custom-navbar .hamburger .hamburger-inner,
        .custom-navbar .hamburger .hamburger-inner::before,
        .custom-navbar .hamburger .hamburger-inner::after {
            background: #6c757d;
        }
    </style>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <!-- Filter Bar -->

            <!-- Ads List -->
            <div class="row justify-content-center mb-3">
                @if($ads->isEmpty())
                <div class="col-12 text-center">
                    <h4 class="font-weight-bold">No Ads Available Now</h4>
                </div>
            @else
                @foreach ($ads as $ad)
                    <div class="col-md-12 col-xl-10 mb-4">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            @if ($ad->getFirstImage())
                                                <img src="{{ asset($ad->getFirstImage()->image_path) }}" class="w-100"
                                                    alt="{{ $ad->title }}" />
                                            @else
                                                <img src="{{ asset('default.png') }}" class="w-100"
                                                    alt="{{ $ad->title }}" />
                                            @endif
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                        style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>{{ $ad->title }}</h5>
                                        <div class="d-flex flex-row">
                                            <span>{{ $ad->ad_type }}</span>
                                        </div>
                                        <div class="mt-1 mb-0 text-muted small">
                                            <span>{{ $ad->residence_type }}</span>
                                            <span class="text-primary"> • </span>
                                            <span>{{ $ad->city->name }}, {{ $ad->country->name }}</span>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <span>{{ $ad->location_description }}</span>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0">{{ $ad->description }}</p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">${{ $ad->budget }}</h4>
                                        </div>
                                        <h6 class="text-success">Available from {{ $ad->availability_date }}</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-primary btn-sm">
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
