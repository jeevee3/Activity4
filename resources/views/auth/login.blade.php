<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://i.pinimg.com/originals/58/6e/51/586e51559dc40f48cd8ce65af9c1522f.gif') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .auth-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            color: #000;
        }

        .auth-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #000;
        }

        .auth-container input[type="email"],
        .auth-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 15px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #000;
        }

        .auth-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .auth-container button:hover {
            background-color: #0056b3;
        }

        .auth-container a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }

        .alert-danger {
            display: block;
            background-color: rgba(255, 0, 0, 0.1);
            padding: 10px;
            border-radius: 8px;
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="auth-container">
    <h2>Activity 4 - Authentication (Login)</h2>

    @if (Session::has('fail'))
        <span class="alert-danger">{{ Session::get('fail') }}</span>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Don't have an account? Register</a>
</div>
</body>
</html>

