<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Modern Login Page</title>
</head>

<body>
    <div class="topbar">
        <div class="wrapper">
          <div class="topbar_inner">
            <div class="logo">
              <a href="{{route('welcome')}}"><img src="{{ asset('assets/about-logo.png') }}" alt="" /></a>
            </div>
            <div class="brand-name">
                RYAN BARBERKING
            </div>
          </div>
        </div>
      </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1>CREATE ACCOUNT</h1>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="phone" name="phone" placeholder="Phone" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('processLogin') }}">
                @csrf
                <h1>SIGN IN</h1>
                <span>Use your email password</span>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <a>Forget Your Password? Ur Business</a>
                <button type="submit">SIGN IN</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">SIGN IN</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>HELLO, FRIEND!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">SIGN UP</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>



    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jplugins.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
</body>

</html>
