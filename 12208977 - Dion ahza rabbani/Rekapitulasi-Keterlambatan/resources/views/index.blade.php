@extends('layouts.template')
@section('content')
    <h1>WebKeterlambatan</h1>

    <div class="card-container">
        <div class="card">
            <h4>Peserta Didik</h4>
            <img src="img/{{$image}}" alt="">
            <h3>{{ $jumlahPesertaDidik }}</h3>
        </div>
        <div class="card">
            <h4>Administrator</h4>
            <img src="img/{{$image}}" alt="">
            <h3>{{ $jumlahAdministrator }}</h3>
        </div>
        <div class="card">
            <h4>Pembimbing</h4>
            <img src="img/{{$image}}" alt="">
            <h3>{{ $jumlahPembimbingsiswa }}</h3>
        </div>
        <div class="card">
            <h4>Rombel</h4>
            <img src="img/{{$flag}}" alt="">
            <h3>{{ $jumlahRombel }}</h3>
        </div>
        <div class="card">
            <h4>Rayon</h4>
            <img src="img/{{$flag}}" alt="">
            <h3>{{ $jumlahRayon }}</h3>
        </div>
    </div>
    
    <style>
        /* Your existing CSS styles */

        /* Additional styles to arrange cards horizontally */
        .card-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            flex: 0 0 calc(20% - 20px);
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card h4 {
            margin-bottom: 15px;
            color: #333;
        }

        .card img {
            max-width: 50px;
            margin-bottom: 10px;
            margin-left:54px; 
        }

        .card h3 {
            font-size: 32px;
            margin: 0;
            color: #555;
        }
    </style>
@endsection
