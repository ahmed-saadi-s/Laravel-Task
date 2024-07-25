@extends('layouts.app')

@section('content')
<style>
    /* تحسينات أساسية لعرض الصورة والنصوص */
    .profile-header {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-info {
        flex: 1;
    }

    .profile-info h1 {
        margin-bottom: 0.5rem;
    }

    .profile-info p {
        margin: 0.25rem 0;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .custom-navbar .nav .item .link {
        color:#6c757d;
    }
    .custom-navbar .hamburger .hamburger-inner, .custom-navbar .hamburger .hamburger-inner::before, .custom-navbar .hamburger .hamburger-inner::after {
        background: #6c757d;
    }
</style>

<div class="container mt-5">
    <div class="bg-white rounded-lg shadow-md p-4">
        <div class="profile-header">
            @if($user->profile_picture)
                <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture" class="profile-picture">
            @else
                <div class="profile-picture bg-gray-300 d-flex align-items-center justify-content-center text-gray-700">
                    <img class="profile-pic" src="{{ asset('profile_pictures/default.jpg') }}" />
                </div>
            @endif
            <div class="profile-info">
                <h1 class="fs-4 fw-bold">{{ $user->first_name }} {{ $user->last_name }}</h1>
                <p class="text-muted">{{ $user->job }}</p>
                <p class="text-muted">{{ $user->account_type }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h2 class="section-title">Contact Information</h2>
            <p>Email: {{ $user->email }}</p>
            <p>Phone: {{ $user->phone_number }}</p>
            <p>Birthday: {{ $user->birthday ? $user->birthday->format('d M Y') : 'N/A' }}</p>
            <p>Gender: {{ ucfirst($user->gender) }}</p>
            <p>Nationality: {{ $user->nationality }}</p>
        </div>

        <div class="mt-4">
            <h2 class="section-title">Location</h2>
            <p>Country: {{ $user->country ? $user->country->name : 'N/A' }}</p>
            <p>City: {{ $user->city ? $user->city->name : 'N/A' }}</p>
        </div>

        <div class="mt-4">
            <h2 class="section-title">Additional Information</h2>
            <p>Marital Status: {{ ucfirst($user->marital_status) }}</p>
        </div>
    </div>
</div>
@endsection
