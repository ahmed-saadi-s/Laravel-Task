  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Responsive Login Form | CodingLab</title>
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
    .user-details .input-box input, .user-details .input-box select {
  box-sizing:border-box;
 }
</style>
<body style="height: 100vh; ">
  <header class="header">
    <a href="{{ url('/') }}">
        <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="logo">
    </a>
  </header>
  <div class="container" style="max-width:400px">
    <div class="title">Login</div>
    <div class="content">
      <form method="POST" action="{{ url('/login') }}">
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
          <div class="input-box" style="width:100%;">
            <span class="details"><i class="fas fa-envelope fa-fw"></i> Email</span>
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
            @error('email')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="input-box" style="width:100%;">
            <span class="details"><i class="fas fa-lock fa-fw"></i> Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
            @error('password')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Login">
          <a href="{{url('/register') }}">Create Account</a>
        </div>

      </form>
    </div>
  </div>
</body>
</html>
