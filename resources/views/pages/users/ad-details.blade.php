@extends('layouts.app')

@section('content')
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" as="style" onload="this.rel='stylesheet'" href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Work+Sans%3Awght%40400%3B500%3B700%3B900" />
    <title>Ad Details</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
</head>
<style>
    .image-wrapper {
        width: 100%;
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;
    }

    .image-wrapper img {
        width: auto;
        height: 100%;
        object-fit: contain;
        cursor: pointer;
    }

    .modal-img {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
    }
    .custom-navbar .nav .item .link {
        color:#6c757d;
    }
    .custom-navbar .hamburger .hamburger-inner, .custom-navbar .hamburger .hamburger-inner::before, .custom-navbar .hamburger .hamburger-inner::after {
        background: #6c757d;
    }
    small, .small {
    font-size: 0.875rem;
}
</style>
<body>
    <div class="d-flex flex-column min-vh-100 bg-white" style='font-family: "Work Sans", "Noto Sans", sans-serif;'>
        <div class="container my-5">

            <div class="px-3 d-flex justify-content-center">
                <div class="w-100" style="max-width: 960px;">
                    <h3 class="text-dark tracking-light fs-4 fw-bold px-4 text-left pb-2 pt-5">Title : {{$ad->title}}</h3>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 p-4">
                        @forelse($ad->images as $index => $image)
                        <div class="col">
                            <div class="image-wrapper" data-bs-toggle="modal" data-bs-target="#imageModal{{ $index }}">
                                <img src="{{ asset($image->image_path ?? 'default.png') }}" alt="Ad Image">
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="imageModal{{ $index }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $index }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel{{ $index }}">Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset($image->image_path ?? 'default.png') }}" class="modal-img" alt="Ad Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col">
                        <div class="image-wrapper" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="{{ asset('default.png') }}" alt="Ad Image">
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('default.png') }}" class="modal-img" alt="Default Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforelse

                    </div>
                    <h2 class="text-dark fs-5 fw-bold tracking-[-0.015em] px-4 pb-3 pt-5">Details</h2>
                    <div class="row p-4 g-3">
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small mb-1">Posted by:</p>
                                <p class="text-dark small mb-0">
                                    <a
                                        href="{{ route('user.profile', ['id' => $ad->user->id]) }}"
                                        class="btn btn-dark btn-sm rounded-pill"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="View Profile">
                                        {{ $ad->user->first_name }} {{ $ad->user->last_name }}
                                    </a>
                                </p>
                            </div>

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Status</p>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="small" style="color: {{ $ad->status === 'open' ? '#28a745' : '#dc3545' }}; background-color: {{ $ad->status === 'open' ? 'rgba(40, 167, 69, 0.1)' : 'rgba(220, 53, 69, 0.1)' }}; padding: 5px 10px; border-radius: 0.25rem;">
                                        <span class="inline-block rounded-circle" style="background-color: {{ $ad->status === 'open' ? '#28a745' : '#dc3545' }}; margin-right: 5px; width: 12px; height: 12px;"></span>
                                        {{ ucfirst($ad->status) }}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Ad Type</p>
                                <p class="text-dark small">{{ $ad->ad_type }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Residence Type</p>
                                <p class="text-dark small">{{ $ad->residence_type }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">{{ $ad->ad_type == 'roommate' ? 'Monthly Rent' : 'Budget' }}</p>
                                <p class="text-dark small">{{ $ad->budget }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Availability Date</p>
                                <p class="text-dark small">Availability From {{ $ad->availability_date }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Country</p>
                                <p class="text-dark small">{{ $ad->country->name }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">City</p>
                                <p class="text-dark small">{{ $ad->city->name }}</p>
                            </div>
                        </div>
                        @if($ad->location_description)
                        <div class="col-12  col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Location Description</p>
                                <p class="text-dark small">{{ $ad->location_description }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Contact Phone</p>
                                <p class="text-dark small">{{ $ad->contact_phone }}</p>
                            </div>
                        </div>
                        @if($ad->furnished !== null)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Furnished</p>
                                <p class="text-dark small">{{ $ad->furnished ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->room_size)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Room Size</p>
                                <p class="text-dark small">{{ $ad->room_size }} sq. meters</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->number_of_rooms)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Number of Rooms</p>
                                <p class="text-dark small">{{ $ad->number_of_rooms }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->number_of_bathrooms)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Number of Bathrooms</p>
                                <p class="text-dark small">{{ $ad->number_of_bathrooms }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->smoking_allowed !== null)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Smoking Allowed</p>
                                <p class="text-dark small">{{ $ad->smoking_allowed ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->pets_allowed !== null)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Pets Allowed</p>
                                <p class="text-dark small">{{ $ad->pets_allowed ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->partner_age_min && $ad->partner_age_max)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Partner Age Range</p>
                                <p class="text-dark small">{{ $ad->partner_age_min }} - {{ $ad->partner_age_max }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->partner_gender)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Partner Gender</p>
                                <p class="text-dark small">{{ $ad->partner_gender }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->contact_email)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Contact Email</p>
                                <p class="text-dark small">{{ $ad->contact_email }}</p>
                            </div>
                        </div>
                        @endif
                        @if($ad->notes)
                        <div class="col-12 col-md-6">
                            <div class="border-top pt-3">
                                <p class="text-secondary small">Notes</p>
                                <p class="text-dark small">{{ $ad->notes }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
