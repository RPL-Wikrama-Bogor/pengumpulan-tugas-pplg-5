@extends('layouts.kosongan')
@section('wrapper')
    <div class="not-found">
        <div class="not-left">
            <img src="{{ asset('image/not.png') }}" alt="" draggable="false">
        </div>
        <div class="not-right">
            <h1>Oops! <br>Page Not Found</h1>
            <p>The page you are looking for doesn't exist</p>
            
            @if(Auth::check())
                @if(Auth::user()->role == 'admin')
                    <button><a href="/dashboard">Back to home</a></button>
                @elseif(Auth::user()->role == 'ps')
                    <button><a href="/dashboard-pemb">Back to home</a></button>
                @endif
            @else
                <button><a href="{{ route('login') }}">Back to Sign In</a></button>
            @endif
        </div>
    </div>
@endsection
<style>
    .not-found {
        display: flex;
        justify-content: center;
        padding: 100px 5%;
        flex-wrap: wrap;
        gap: 100px;
    }

    .not-left img {
        width: 500px;
    }

    .not-right {
        margin-top: 20px;
    }

    .not-right h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 40px;
    }

    .not-right p {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 20px;

    }

    button {
        background-color: blue;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        font-size: 15px;
    }

    button:hover {
        background-color: #3559E0;
    }
</style>