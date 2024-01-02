@extends('layouts.template')
@section('content')
<div class=" ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Detail Data Keterlambatan</h1>
    <p class=" mt-[10px] mb-[10px]" >Home | Data Keterlambatan | <span class="font-bold">Detail Data Keterlambatan</span></p>
</div>
<div class="kartu-show ml-[300px] mt-[50px]">
    @foreach($lates as $item => $late)
    <div class="show-card">
        <div class="title-ket">
            <p class="text-[20px] font-bold">Keterlambatan ke: {{ $item+1 }}</p>
        </div>
        <div class="title-time mt-[10px] text-red-700 font-bold"> 
            <p>{{ $late['date_time_late'] }}</p>
        </div>
        <div class="alesan text-blue-600 mt-[10px] font-bold">
            <p>{{ $late['information'] }}</p>
        </div>
        <div class="img-kartu mt-[10px]">
            <img src="{{ asset('images/' . $late['bukti']) }}" alt="">
        </div>
    </div>
    @endforeach
</div>
@endsection

<style>
    .kartu-show {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .show-card {
        margin: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 20px #ddd;
        padding: 15px;
    }

    .img-kartu img {
        width: 80px
    }

    /* .title-ket p {
        color: blue;
        font-size: 15px;
    }
    
    .title-time p {
        font-size: 13px;
    }

    .alesan p {
        color: red;
        font-size: 13px;
    } */
</style>