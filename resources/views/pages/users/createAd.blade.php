@extends('layouts.app')

@section('content')
<style>
    .form-section {
        margin-bottom: 30px;
    }
    .optional-fields {
        margin-top: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .btn-submit {
        margin-top: 20px;
    }
    .description {
        font-size: 0.9em;
        color: #6c757d;
        margin-bottom: 10px;
    }
    .card-header {
        font-size: 1.5em;
        font-weight: bold;
    }

    .uploaded_file_view {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }
    .uploaded_img {
        position: relative;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
    }
    .uploaded_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .file_remove {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #aaa;
        color: #fff;
        font-size: 16px;
        line-height: 24px;
        text-align: center;
        cursor: pointer;
    }
    .file_remove:hover {
        background: #222;
    }
    .custom-navbar .nav .item .link {
        color:#6c757d;
    }
    .custom-navbar .hamburger .hamburger-inner, .custom-navbar .hamburger .hamburger-inner::before, .custom-navbar .hamburger .hamburger-inner::after {
        background: #6c757d;
    }
</style>

<div class="container" style="margin-top:70px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->account_type == 'seeking_roommate')
                        {{ __('Create Ad for Roommate') }}
                    @else
                        {{ __('Create Ad for Room') }}
                    @endif
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Mandatory Information Section -->
                        <div class="form-section">
                            <h4>{{ __('Mandatory Information') }}</h4>
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ __('Enter title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_phone">{{ __('Contact Phone') }}</label>
                                <input id="contact_phone" type="text" class="form-control" name="contact_phone" value="{{ old('contact_phone') }}" placeholder="{{ __('Enter contact phone') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="country">{{ __('Country') }}</label>
                                <select name="country_id" id="country" class="form-control" onchange="fetchCities()" required>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ (old('country_id', auth()->user()->country_id) == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city">{{ __('City') }}</label>
                                <select name="city_id" id="city" class="form-control" required>
                                    <option value="" disabled selected>{{ __('Select your City') }}</option>
                                </select>
                                @error('city_id')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="budget">
                                    @if(auth()->user()->account_type == 'seeking_roommate')
                                        Price
                                    @else
                                        Budget
                                    @endif
                                </label>
                                <input id="budget" type="number" step="0.01" class="form-control" name="budget" value="{{ old('budget') }}" placeholder="{{ auth()->user()->account_type == 'seeking_roommate' ? __('Enter the rental price
') : __('Enter the budget amount') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="residence_type">{{ __('Residence Type') }}</label>
                                <select name="residence_type" id="residence_type" class="form-control" required>
                                    <option value="">{{ __('Select Residence Type') }}</option>
                                    <option value="apartment" {{ old('residence_type') == 'apartment' ? 'selected' : '' }}>{{ __('Apartment') }}</option>
                                    <option value="house" {{ old('residence_type') == 'house' ? 'selected' : '' }}>{{ __('House') }}</option>
                                    <option value="shared" {{ old('residence_type') == 'shared' ? 'selected' : '' }}>{{ __('Shared') }}</option>
                                    <option value="studio" {{ old('residence_type') == 'studio' ? 'selected' : '' }}>{{ __('Studio') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="availability_date">{{ __('Preferred Move-In Date') }}</label>
                                <div class="input-group">
                                    <input id="availability_date" type="date" class="form-control" name="availability_date" value="{{ old('availability_date') }}" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary" onclick="setTodayDate()">{{ __('Set Today') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Optional Information Section -->
                        <div class="form-section optional-fields">
                            <h4>{{ __('Optional Information') }}</h4>
                            @if(auth()->user()->account_type == 'seeking_roommate')

                            <div class="form-group">
                                <label for="location_description">{{ __('Location Description') }}</label>
                                <input id="location_description" type="text" class="form-control" name="location_description" value="{{ old('location_description') }}" placeholder="{{ __('Enter location details') }}">
                            </div>
                  
                            <div class="form-group">
                                <label for="room_type">{{ __('Room Type') }}</label>
                                <input id="room_type" type="text" class="form-control" name="room_type" value="{{ old('room_type') }}" placeholder="{{ __('e.g., Single, Double') }}" >
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="furnished">{{ __('Furnished') }}</label>
                                <select name="furnished" id="furnished" class="form-control" >
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="1" {{ old('furnished') == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                    <option value="0" {{ old('furnished') == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                                </select>
                            </div>
                            @if(auth()->user()->account_type == 'seeking_roommate')

                            <div class="form-group">
                                <label for="room_size">{{ __('Room Size (in square meters)') }}</label>
                                <input id="room_size" type="number" step="0.01" class="form-control" name="room_size" value="{{ old('room_size') }}" placeholder="{{ __('Enter room size') }}">
                            </div>

                            <div class="form-group">
                                <label for="number_of_rooms">{{ __('Number of Rooms') }}</label>
                                <input id="number_of_rooms" type="number" class="form-control" name="number_of_rooms" value="{{ old('number_of_rooms') }}" placeholder="{{ __('Enter number of rooms') }}">
                            </div>
                            <div class="form-group">
                                <label for="number_of_bathrooms">{{ __('Number of Bathrooms') }}</label>
                                <input id="number_of_bathrooms" type="number" class="form-control" name="number_of_bathrooms" value="{{ old('number_of_bathrooms') }}" placeholder="{{ __('Enter number of bathrooms') }}">
                            </div>
                           @endif

                            <div class="form-group">
                                <label for="partner_gender">{{ __('Preferred Roommate Gender') }}</label>
                                <select name="partner_gender" id="partner_gender" class="form-control">
                                    <option value="">{{ __('Select Gender') }}</option>
                                    <option value="male" {{ old('partner_gender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                    <option value="female" {{ old('partner_gender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                    <option value="any" {{ old('partner_gender') == 'any' ? 'selected' : '' }}>{{ __('Any') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="age_range">{{ __('Preferred Roommate Age Range') }}</label>
                                <div class="input-group">
                                    <input id="roommate_age_min" type="number" class="form-control" name="partner_age_min" value="{{ old('partner_age_min') }}" placeholder="{{ __('Min Age') }}" min="0">
                                    <span class="input-group-text">-</span>
                                    <input id="roommate_age_max" type="number" class="form-control" name="partner_age_max" value="{{ old('partner_age_max') }}" placeholder="{{ __('Max Age') }}" min="0">
                                </div>
                                <div class="mt-3">
                                    <input type="range" id="age_range" min="0" max="100" value="{{ old('partner_age_min', '') }}" class="custom-range" style="width: 100%;" step="1">
                                    <input type="range" id="age_range_max" min="0" max="100" value="{{ old('partner_age_max', '') }}" class="custom-range" style="width: 100%;" step="1">
                                    <p class="text-center mt-2">
                                        {{ __('Selected Age Range') }}: <span id="age_range_display">-</span>
                                    </p>
                                </div>
                            </div>
                            
                           
                            <div class="form-group">
                                <label for="smoking_allowed">{{ __('Smoking Allowed') }}</label>
                                <select name="smoking_allowed" id="smoking_allowed" class="form-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="1" {{ old('smoking_allowed') == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                    <option value="0" {{ old('smoking_allowed') == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pets_allowed">{{ __('Pets Allowed') }}</label>
                                <select name="pets_allowed" id="pets_allowed" class="form-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="1" {{ old('pets_allowed') == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                    <option value="0" {{ old('pets_allowed') == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact_email">{{ __('Contact Email') }}</label>
                                <input id="contact_email" type="email" class="form-control" name="contact_email" value="{{ old('contact_email') }}" placeholder="{{ __('Enter contact email') }}">
                            </div>
                            <div class="form-group">
                                <label for="notes">{{ __('Notes') }}</label>
                                <textarea id="notes" class="form-control" name="notes" placeholder="{{ __('Enter notes') }}" >{{ old('notes') }}</textarea>
                            </div>
                            @if(auth()->user()->account_type == 'seeking_roommate')
                            <div class="form-group">
                                <label for="images">{{ __('Images') }}</label>
                                <input type="file" id="upload_file" name="images[]" multiple accept="image/*">
                                <div class="uploaded_file_view" id="uploaded_view">
                                    <!-- Existing images preview here -->
                                </div>
                            </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-submit">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for image preview -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">{{ __('Image Preview') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" class="img-fluid" alt="Image Preview">
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const minAgeInput = document.getElementById('roommate_age_min');
        const maxAgeInput = document.getElementById('roommate_age_max');
        const ageRangeMin = document.getElementById('age_range');
        const ageRangeMax = document.getElementById('age_range_max');
        const ageRangeDisplay = document.getElementById('age_range_display');

        function updateRangeDisplay() {
            ageRangeDisplay.textContent = `${minAgeInput.value} - ${maxAgeInput.value}`;
        }

        minAgeInput.addEventListener('input', function() {
            ageRangeMin.value = minAgeInput.value;
            updateRangeDisplay();
        });

        maxAgeInput.addEventListener('input', function() {
            ageRangeMax.value = maxAgeInput.value;
            updateRangeDisplay();
        });

        ageRangeMin.addEventListener('input', function() {
            minAgeInput.value = ageRangeMin.value;
            updateRangeDisplay();
        });

        ageRangeMax.addEventListener('input', function() {
            maxAgeInput.value = ageRangeMax.value;
            updateRangeDisplay();
        });

        updateRangeDisplay();
    });
</script>
<script>

    function fetchCities() {
        var country_id = document.getElementById('country').value;
        var citySelect = document.getElementById('city');

        // Clear previous options
        citySelect.innerHTML = '<option value="" disabled selected>{{ __('Loading cities...') }}</option>';

        // Fetch cities for the selected country
        fetch(`/cities/${country_id}`)
            .then(response => response.json())
            .then(data => {
                citySelect.innerHTML = '<option value="" disabled selected>{{ __('Select your City') }}</option>';
                data.forEach(city => {
                    var option = document.createElement('option');
                    option.value = city.id;
                    option.text = city.name;
                    option.selected = city.id == {{ old('city_id', auth()->user()->city_id) }}; // Set default city
                    citySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching cities:', error);
            });
    }

    // Load cities for the default country when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        fetchCities();
    });

    function setTodayDate() {
        // الحصول على تاريخ اليوم
        var today = new Date().toISOString().split('T')[0];
        // تعيين تاريخ اليوم لحقل الإدخال
        document.getElementById('availability_date').value = today;
    }

    document.getElementById('upload_file').addEventListener('change', function() {
    var files = this.files;
    var previewContainer = document.getElementById('uploaded_view');

    // Clear the existing previews
    previewContainer.innerHTML = '';

    Array.from(files).forEach(file => {
        var reader = new FileReader();
        reader.onload = function(event) {
            var imgElement = document.createElement('div');
            imgElement.className = 'uploaded_img';
            imgElement.innerHTML = `
                <img src="${event.target.result}" alt="Uploaded Image" onclick="showImage('${event.target.result}')">
                <span class="file_remove" onclick="removeImage(this)">&times;</span>
            `;
            previewContainer.appendChild(imgElement);
        }
        reader.readAsDataURL(file);
    });
});

    function removeImage(element) {
        element.parentElement.remove();
    }

    function showImage(src) {
        var modalImage = document.getElementById('modalImage');
        modalImage.src = src;
        $('#imageModal').modal('show');
    }
</script>

@endsection