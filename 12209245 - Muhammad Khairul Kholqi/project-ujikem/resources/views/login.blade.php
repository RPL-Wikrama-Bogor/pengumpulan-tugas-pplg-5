<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>App keterlambatan | Login</title>
</head>
<body>
    <div class="container-login">
        <div class="login-left">
            <img src="{{asset('image/login-animate.png')}}" alt="" draggable="false">
        </div>
        <div class="login-right">
            <form action="{{ route('login.auth') }}" method="post">
                @csrf
                <div class="title-ket">
                    <h1>Welcome back!</h1>
                    <p class="mt-2 text-gray-500">Sign In to access your dashboard,<br>settings and projects</p>
                </div>
                <center>
                    @if(Session::get('failed'))
                        <div class="salah">{{ Session::get('failed') }}</div>
                    @endif
                    <br>
                    <input type="email" name="email" id="email" placeholder="Email address" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <button type="submit">Sign In</button>
                </center>
            </form>
        </div>
    </div>
<style>
    .container-login {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        padding: 80px 5%;
        gap: 120px;
    }
    
    .login-left img {
        width: 400px;
    }
    
    .login-right {
        border-radius: 10px;
        padding: 30px;
        margin-top: -50px;
    }
    
    .title-ket {
        text-align: center;
    }
    
    .title-ket h1 {
        font-family: sans-serif;
    }
    
    .title-ket p {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        margin-bottom: 50px;
    }

    input {
        width: 100%;
        height: 30px;
        padding-left: 5px;
    }

    button {
        width: 105%;
        height: 30px;
        background-color: #005EEE;
        border: none;
        cursor: pointer;
        color: #FFF;
        font-size: 16px;
    }

    button:hover {
        background-color: blue;
    }

    .salah {
        background-color: rgba(255, 0, 0, 0.2); 
        padding: 7px;
        font-size: 13px;
        font-family: Arial, Helvetica, sans-serif;
        border-radius: 5px;
        text-align: center;
    }

    @media (max-width: 918px) {
        .login-right {
            margin-top: -100px;
        }
    }

    @media (max-width: 440px) {
        .login-left img {
            width: 250px;
        }
    }
</style>
</body>
</html>