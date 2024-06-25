<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Tailwind CSS */
        *, ::after, ::before { box-sizing: border-box; border-width: 0; border-style: solid; border-color: #e5e7eb; }
        ::after, ::before { --tw-content: ''; }
        html { line-height: 1.5; -webkit-text-size-adjust: 100%; -moz-tab-size: 4; tab-size: 4; font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji; font-feature-settings: normal; font-variation-settings: normal; -webkit-tap-highlight-color: transparent; }
        body { margin: 0; line-height: inherit; background-color: #f8f9fa; }
        .navbar { display: flex; justify-content: space-between; align-items: center; background-color: #5b5352; color: white; padding: 10px 20px; }
        .navbar img { height: 50px; width: auto; }
        .navbar .company-name { font-size: 1.5rem; font-weight: 600; }
        .navbar .login-button { margin-left: auto; }
        .login-button { cursor: pointer; background-color: #FFF; color: #5b5352; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; transition: background-color 0.3s; text-decoration: none; }
        .login-button:hover { background-color: #b6a1a0; color: white; }
        .company-logo {margin-right:35px;}
        button { cursor: pointer; background-color: #FF2D20; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-weight: 600; transition: background-color 0.3s; }
        button:hover { background-color: #918281; }
        .company-header { text-align: center; padding: 4rem 0; }
        .company-header img { max-width: 300px; margin: 0 auto; display: block; border-radius: 50%; border: 5px solid #FFF; box-shadow: 0 0 30px rgba(0, 0, 0, 0.2); }
        .company-header h1 { margin-top: 1rem; font-size: 2.5rem; font-weight: 600; color: #333; }
        .button-container { text-align: center; margin-top: 2rem; }
        .button-container .button { background-color: #5b5352; color: white; padding: 1rem 2rem; border-radius: 2rem; font-weight: 600; text-decoration: none; transition: background-color 0.3s; }
        .button-container .button:hover { background-color: #a36f6c; }
        .container { max-width: none; margin: auto; padding: 2rem; }
        input[type="text"], select { width: 100%; padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 0.25rem; }
        .table-container {width: 75%; background-color: white; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); border-radius: 0.25rem; overflow: auto; display: flex; justify-content: center; align-items: center; margin: auto}
        .table {width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 1rem; text-align: left; border-bottom: 1px solid #e5e7eb; }
        .table th { background-color: #f8f9fa; margin: auto; text-align: center; }
        .table tbody tr { background-color: #f3f4f6; text-align: center; }
        .table tbody tr:hover { background-color: #edf2f7; }
        .table-action { display: flex; align-items: center; justify-content: space-around;min-width: 200px; }
        .table-action button { padding: 0.5rem 1rem; margin: 0 0.5rem; border-radius: 0.25rem; transition: background-color 0.3s; margin-right: 5px}
        .table-action button:hover { background-color: #2e2b2a; }
        .success-message { background-color: #f2dede; color: #a94442; padding: 10px; border-radius: 8px; margin: auto; max-width: 72%; text-align: center; }
        .alert {padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; font-size: 16px; font-weight: bold;text-align: center;}
        .alert-success {color: #155724; background-color: #d4edda; border-color: #c3e6cb;}
        .card { max-width: 400px; margin: 2rem auto; padding: 1rem; background-color: white; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); border-radius: 0.5rem; }
        .card img { max-width: 100%; height: auto; border-radius: 0.5rem; }
        .card-content { margin-top: 1rem; }
        .card-content p { margin-bottom: 0.5rem; }
        .content-container {display: flex; flex-direction: column; align-items: center;}
        h2 {margin-bottom: 20px;}
    </style>
</head>
<body>
    <div class="navbar">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('assets/about-logo.png') }}" alt="Company Logo" class="company-logo">
        </a>
        <div class="company-name">Barberman KingRyan</div>
        @if (Route::currentRouteName() == 'welcome')
            <a href="{{route('login')}}" class="login-button">Login</a>
        @endif
    </div>
    @yield('company-header')
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

