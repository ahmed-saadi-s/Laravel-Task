@extends('layouts.app')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')
<style>
   .avatar-wrapper {
  position: relative;
  height: 200px;
  width: 200px;
  margin: 20px auto;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 1px 1px 15px -5px black;
  transition: all 0.3s ease;
}
.avatar-wrapper:hover {
  transform: scale(1.05);
  cursor: pointer;
}
.avatar-wrapper:hover .profile-pic {
  opacity: 0.5;
}
.avatar-wrapper .profile-pic {
  height: 100%;
  width: 100%;
  transition: all 0.3s ease;
}
.avatar-wrapper .profile-pic:after {
  font-family: FontAwesome;
  content: "";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  font-size: 190px;
  background: #ecf0f1;
  color: #34495e;
  text-align: center;
}
.avatar-wrapper .upload-button {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.avatar-wrapper .upload-button .fa-arrow-circle-up {
  position: absolute;
  font-size: 234px;
  top: -17px;
  left: 0;
  text-align: center;
  opacity: 0;
  transition: all 0.3s ease;
  color: #34495e;
}
.avatar-wrapper .upload-button:hover .fa-arrow-circle-up {
  opacity: 0.9;
}
.custom-navbar .nav .item .link {
    color:#6c757d;
}
.custom-navbar .hamburger .hamburger-inner, .custom-navbar .hamburger .hamburger-inner::before, .custom-navbar .hamburger .hamburger-inner::after {
    background: #6c757d;
}
</style>

<div class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" style="margin-top: 30px;">
                <div class="card-header"  >{{ __('Edit Profile') }}</div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="card-body">
                    <form action="{{ url('/edit-profile') }}" method="POST" enctype="multipart/form-data"  >
                        @csrf
                        @method('PUT')

                        <div class="avatar-wrapper">
                            @if(auth()->user()->profile_picture)
                                <img class="profile-pic" src="{{ asset( auth()->user()->profile_picture) }}" />
                            @else
                                <img class="profile-pic" src="{{ asset('storage/profile_pictures/default.jpg') }}" />
                            @endif
                            <div class="upload-button">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload" type="file" name="profile_picture" accept="image/*"/>
                            @error('profile_picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <!-- First Name -->
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" required autocomplete="last_name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number', auth()->user()->phone_number) }}" required autocomplete="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Birthday -->
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('date_of_birth') }}</label>
                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', auth()->user()->birthday ? auth()->user()->birthday->format('Y-m-d') : '') }}" required autocomplete="date_of_birth">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="male" {{ (old('gender', auth()->user()->gender) == 'male') ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ (old('gender', auth()->user()->gender) == 'female') ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>
                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality', auth()->user()->nationality) }}" required autocomplete="nationality">
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <select id="country" class="form-control @error('country_id') is-invalid @enderror" name="country_id" required onchange="fetchCities()">
                                    <option value="" disabled>Select your Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ (old('country_id', auth()->user()->country_id) == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- City -->
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-6">
                                <select id="city" class="form-control @error('city_id') is-invalid @enderror" name="city_id" required>
                                    @if(isset($city))
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @else
                                        <option value="" disabled>Select your City</option>
                                    @endif
                                </select>
                                @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Account Type -->
                        <div class="form-group row">
                            <label for="account_type" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>
                            <div class="col-md-6">
                                <select id="account_type" class="form-control @error('account_type') is-invalid @enderror" name="account_type" required>
                                    <option value="seeking_room" {{ (old('account_type', auth()->user()->account_type) == 'seeking_room') ? 'selected' : '' }}>Looking for Room</option>
                                    <option value="seeking_roommate" {{ (old('account_type', auth()->user()->account_type) == 'seeking_roommate') ? 'selected' : '' }}>Looking for Roommate</option>
                                </select>
                                @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Job -->
                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Job') }}</label>
                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job', auth()->user()->job) }}" required autocomplete="job">
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Marital Status -->
                        <div class="form-group row">
                            <label for="marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>
                            <div class="col-md-6">
                                <select id="marital_status" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" required>
                                    <option value="single" {{ (old('marital_status', auth()->user()->marital_status) == 'single') ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ (old('marital_status', auth()->user()->marital_status) == 'married') ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ (old('marital_status', auth()->user()->marital_status) == 'divorced') ? 'selected' : '' }}>Divorced</option>
                                    <option value="widowed" {{ (old('marital_status', auth()->user()->marital_status) == 'widowed') ? 'selected' : '' }}>Widowed</option>
                                </select>
                                @error('marital_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Update Profile Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchCities() {
        var country_id = document.getElementById('country').value;
        var citySelect = document.getElementById('city');

        // Clear previous options
        citySelect.innerHTML = '<option value="" disabled selected>Loading cities...</option>';

        // Fetch cities for the selected country
        fetch(`/cities/${country_id}`)
            .then(response => response.json())
            .then(data => {
                citySelect.innerHTML = '<option value="" disabled selected>Select your City</option>';
                data.forEach(city => {
                    var option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    // Check if the city matches the user's selected city_id
                    if (city.id == {{ auth()->user()->city_id }}) {
                        option.selected = true;
                    }
                    citySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching cities:', error);
                citySelect.innerHTML = '<option value="" disabled selected>Error loading cities</option>';
            });
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        var countrySelect = document.getElementById('country');
        if (countrySelect.value) {
            fetchCities();
        }
    });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>


@endsection
