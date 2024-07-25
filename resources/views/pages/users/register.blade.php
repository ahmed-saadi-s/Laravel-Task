<!DOCTYPE html>
<!-- Designed by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Responsive Registration Form | CodingLab</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  .header {
    display: flex;
        align-items: center;
        padding: 0px 20px;
        position: absolute; /* لتثبيت الشعار في أعلى يسار الصفحة */
        top: 0;
        left: 0;
  }
  .header .logo {
    max-width: 77px;
        height: auto;
  }
  .container {
      margin-top: 60px; /* ترك مساحة أعلى الصفحة للهيدر */
  }

</style>
<body>
 
<header class="header">
  <a href="{{ url('/') }}">
      <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="logo">
  </a>
</header>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="POST" action="{{ url('/register') }}">
        @csrf

        <!-- Display General Errors -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="user-details">
          <div class="input-box">
            <span class="details"><i class="fas fa-user fa-fw"></i> First Name</span>
            <input type="text" name="first_name" placeholder="Enter your first name" value="{{ old('first_name') }}" required>
            @error('first_name')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-user fa-fw"></i> Last Name</span>
            <input type="text" name="last_name" placeholder="Enter your last name" value="{{ old('last_name') }}" required>
            @error('last_name')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-envelope fa-fw"></i> Email</span>
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
            @error('email')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-phone fa-fw"></i> Phone Number</span>
            <input type="number" name="phone_number" placeholder="Enter your number" value="{{ old('phone_number') }}" required>
            @error('phone_number')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="input-box">
            <span class="details"><i class="fas fa-lock fa-fw"></i> Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
            @error('password')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-lock fa-fw"></i> Confirm Password</span>
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
            @error('password_confirmation')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-globe fa-fw"></i> Nationality</span>
            <input type="text" name="nationality" placeholder="Enter your nationality" value="{{ old('nationality') }}" required>
            @error('nationality')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-briefcase fa-fw"></i> Job</span>
            <input type="text" name="job" placeholder="Enter your job" value="{{ old('job') }}" required>
            @error('job')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="input-box">
            <span class="details"><i class="fas fa-user fa-fw"></i> Account Type</span>
            <select name="account_type" required>
                <option value="" disabled selected>Select your Account Type</option>
                <option value="seeking_room" {{ old('account_type') == 'seeking_room' ? 'selected' : '' }}>Seeking Room</option>
                <option value="seeking_roommate" {{ old('account_type') == 'seeking_roommate' ? 'selected' : '' }}>Seeking Roommate</option>
            </select>
            @error('account_type')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
        
          <div class="input-box">
            <span class="details"><i class="fas fa-calendar-alt fa-fw"></i> Date of Birth</span>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
            @error('date_of_birth')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-globe fa-fw"></i> Country</span>
            <select name="country_id" id="country" onchange="fetchCities()" required>
                <option value="" disabled selected>Select your country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
            @error('country_id')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
            <span class="details"><i class="fas fa-city fa-fw"></i> City</span>
            <select name="city_id" id="city" required>
                <option value="" disabled selected>Select your City</option>
            </select>
            @error('city_id')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="input-box">
            <span class="details"><i class="fas fa-heart fa-fw"></i> Marital Status</span>
            <select name="marital_status" required>
                <option value="" disabled selected>Select your marital status</option>
                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Married</option>
                <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Widowed</option>
            </select>
            @error('marital_status')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-box">
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
            <input type="radio" name="gender" id="dot-2" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
            <span class="gender-title"><i class="fas fa-venus-mars fa-fw"></i> Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender"><i class="fas fa-male fa-fw"></i> Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender"><i class="fas fa-female fa-fw"></i> Female</span>
              </label>
            </div>
            @error('gender')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
          
        </div>

        <div class="button">
          <input type="submit" value="Register">
          <a href="{{url('/login') }}">Do you have an account ?</a>

        </div>
      </form>
    </div>
  </div>
</body>
</html>

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
                    citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
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
