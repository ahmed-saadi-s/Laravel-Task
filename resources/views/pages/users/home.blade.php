@extends('layouts.app')

@section('content')
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="header-title">Find Your Perfect Roommate or Place to Stay</h1>
                    <p class="header-subtitle">Discover the easiest way to find a roommate or a place to stay. Join our
                        community now!</p>
                    <a href="#contact" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </header>



    <!-- How It Works Section -->
    <section class="section" id="how-it-works">
        <div class="container text-center">
            <h6 class="section-title mb-6">How It Works</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="ti-search"></i>
                        </div>
                        <h6 class="title">Search</h6>
                        <p class="subtitle">Browse through thousands of listings to find the perfect roommate or place to
                            stay.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="ti-user"></i>
                        </div>
                        <h6 class="title">Connect</h6>
                        <p class="subtitle">Connect with potential roommates or landlords to discuss details and arrange
                            viewings.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="ti-home"></i>
                        </div>
                        <h6 class="title">Move In</h6>
                        <p class="subtitle">Finalize your arrangements and move into your new home with ease and confidence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of How It Works section -->

    <!-- Benefits Section -->
    <section class="section bg-light" id="benefits">
        <div class="container text-center">
            <h6 class="section-title mb-6">Benefits</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="icon-wrapper">
                            <i class="ti-wallet"></i>
                        </div>
                        <h6 class="title">Affordable</h6>
                        <p class="subtitle">Find cost-effective housing options and save on rent by sharing with a roommate.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="icon-wrapper">
                            <i class="ti-time"></i>
                        </div>
                        <h6 class="title">Time-Saving</h6>
                        <p class="subtitle">Quickly find a match with our user-friendly search and filtering tools.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="benefit-card">
                        <div class="icon-wrapper">
                            <i class="ti-heart"></i>
                        </div>
                        <h6 class="title">Reliable</h6>
                        <p class="subtitle">Connect with verified users and find trustworthy roommates or landlords.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end of Benefits section -->

    <!-- Offers Section -->
    <!-- Offers Section -->
    <!-- Offers Section -->
    <section class="section" id="offers">
        <div class="container text-center">
            <h6 class="section-title mb-6">Latest Ads</h6>

            <!-- Add New Ad Button -->
            <div class="mb-4 text-right">
                <a href="{{ route('ads.create') }}" class="btn btn-primary" id="createAdButton">Create New Ad</a>
            </div>

            <div class="row">
                @auth
                    @if (auth()->user()->account_type === 'seeking_roommate')
                        <!-- Search for Place -->
                        <div class="col-md-12">
                            <h6 class="offer-title">Search for Place</h6>
                            @foreach ($ads->where('ad_type', 'place') as $ad)
                                <div class="offer-card-container" data-residence-type="{{ $ad->residence_type }}"
                                    data-ad-type="{{ $ad->ad_type }}">
                                    <div class="offer-card">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if ($ad->getFirstImage())
                                                    <img src="{{ asset($ad->getFirstImage()->image_path) }}" class="img-fluid"
                                                        alt="{{ $ad->title }}">
                                                @else
                                                    <img src="{{ asset('default.png') }}" class="img-fluid"
                                                        alt="Default Image">
                                                @endif
                                            </div>
                                            <div class="col-md-8 text-left">
                                                <h6>{{ $ad->title }}</h6>
                                                <p>Residence Type: {{ $ad->residence_type }}</p>
                                                <p>Availability Date: {{ $ad->availability_date }}</p>
                                                <p>Posted By: {{ $ad->user->first_name }} {{ $ad->user->last_name }}</p>
                                                <p>Budget: {{ $ad->budget }}</p>
                                                <div class="mb-4 text-right">
                                                    <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-primary">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif (auth()->user()->account_type === 'seeking_room')
                        <!-- Search for Roommate -->
                        <div class="col-md-12">
                            <h6 class="offer-title">Search for Roommate</h6>
                            @foreach ($ads->where('ad_type', 'roommate') as $ad)
                                <div class="offer-card-container" data-residence-type="{{ $ad->residence_type }}"
                                    data-ad-type="{{ $ad->ad_type }}">
                                    <div class="offer-card">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if ($ad->getFirstImage())
                                                    <img src="{{ asset($ad->getFirstImage()->image_path) }}" class="img-fluid"
                                                        alt="{{ $ad->title }}">
                                                @else
                                                    <img src="{{ asset('ads_images/default.png') }}" class="img-fluid"
                                                        alt="Default Image">
                                                @endif
                                            </div>
                                            <div class="col-md-8 text-left">
                                                <h6>{{ $ad->title }}</h6>
                                                <p>Residence Type: {{ $ad->residence_type }}</p>
                                                <p>Availability Date: {{ $ad->availability_date }}</p>
                                                <p>Posted By: {{ $ad->user->first_name }} {{ $ad->user->last_name }}</p>
                                                <p>Price: {{ $ad->budget }}</p>
                                                <div class="mb-4 text-right">
                                                    <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-primary">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endauth

                <!-- When the user is not logged in -->
                @guest
                    <!-- Search for Roommate -->
                    <div class="col-md-6">
                        <h6 class="offer-title">Search for Roommate</h6>
                        @foreach ($ads->where('ad_type', 'roommate') as $ad)
                            <div class="offer-card-container" data-residence-type="{{ $ad->residence_type }}"
                                data-ad-type="{{ $ad->ad_type }}">
                                <div class="offer-card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($ad->getFirstImage())
                                                <img src="{{ asset($ad->getFirstImage()->image_path) }}" class="img-fluid"
                                                    alt="{{ $ad->title }}">
                                            @else
                                                <img src="{{ asset('ads_images/default.png') }}" class="img-fluid"
                                                    alt="Default Image">
                                            @endif
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h6>{{ $ad->title }}</h6>
                                            <p>Residence Type: {{ $ad->residence_type }}</p>
                                            <p>Availability Date: {{ $ad->availability_date }}</p>
                                            <p>Posted By: {{ $ad->user->first_name }} {{ $ad->user->last_name }}</p>
                                            <p>Price: {{ $ad->budget }}</p>
                                            <div class="mb-4 text-right">
                                                <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Search for Place -->
                    <div class="col-md-6">
                        <h6 class="offer-title">Search for Place</h6>
                        @foreach ($ads->where('ad_type', 'place') as $ad)
                            <div class="offer-card-container" data-residence-type="{{ $ad->residence_type }}"
                                data-ad-type="{{ $ad->ad_type }}">
                                <div class="offer-card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($ad->getFirstImage())
                                                <img src="{{ asset('storage/' . $ad->getFirstImage()->path) }}"
                                                    class="img-fluid" alt="{{ $ad->title }}">
                                            @else
                                                <img src="{{ asset('ads_images/default.png') }}" class="img-fluid"
                                                    alt="Default Image">
                                            @endif
                                        </div>
                                        <div class="col-md-8 text-left">
                                            <h6>{{ $ad->title }}</h6>
                                            <p>Residence Type: {{ $ad->residence_type }}</p>
                                            <p>Availability Date: {{ $ad->availability_date }}</p>
                                            <p>Posted By: {{ $ad->user->first_name }} {{ $ad->user->last_name }}</p>
                                            <p>Budget: {{ $ad->budget }}</p>
                                            <div class="mb-4 text-right">
                                                <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endguest
            </div><!-- end of row -->
        </div><!-- end of container -->
    </section>
    <!-- end of Offers section -->
    <!-- end of Offers section -->
    <!-- end of Offers section -->

    <!-- Contact Section -->
    <section class="section bg-light" id="contact">
        <div class="container text-center">
            <p class="section-subtitle">Want to find a place or a roommate?</p>
            <h6 class="section-title mb-6">Contact Us</h6>
            <div class="row">
                <div class="col-md-8 mx-auto text-left">
                    <form action="">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group col-12">
                                <textarea class="form-control" placeholder="Your Message" rows="4" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block rounded w-lg">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- end of Contact section -->

    <script>
        document.getElementById('createAdButton').addEventListener('click', function() {
            window.location.href = '';
        });

        // Filtering Functionality
        document.getElementById('filterResidenceType').addEventListener('change', filterOffers);
        document.getElementById('filterAdType').addEventListener('change', filterOffers);

        function filterOffers() {
            var residenceType = document.getElementById('filterResidenceType').value.toLowerCase();
            var adType = document.getElementById('filterAdType').value.toLowerCase();
            var offerCards = document.getElementsByClassName('offer-card-container');

            for (var i = 0; i < offerCards.length; i++) {
                var card = offerCards[i];
                var cardResidenceType = card.getAttribute('data-residence-type').toLowerCase();
                var cardAdType = card.getAttribute('data-ad-type').toLowerCase();

                if ((residenceType === "" || cardResidenceType === residenceType) &&
                    (adType === "" || cardAdType === adType)) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }
    </script>

@stop
