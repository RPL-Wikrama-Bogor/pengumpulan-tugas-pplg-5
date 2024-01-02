@extends('layouts.template')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <title>Document</title>
    </head>
    <body>
        <div class="ml-[350px] mt-[50px]">
            <h1 class="text-[50px] font-bold">Dashboard</h1>
            <p class="ml-[5px]">Home | <span class="font-bold">Dashboard</span></p>
        </div>
        <div class="flex flex-wrap justify-center py-[50px] ml-[290px] gap-[50px] ">
            <div class="w-[300px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg" src="{{ asset('image/student.jpg') }}" alt="" />
            <div class="p-2">
                <div class="block">
                    @if(Auth::user()->role == 'ps')
                        <h1 class="mb-2 font-bold tracking-tight text-[15px]">Peserta Didik Rayon {{ Auth::user()->name }}</h1>
                    @endif
                    <h1 class="mb-2 text-2xl font-bold tracking-tight ml-[5px]">{{ $totalSswPs }}</h1>
                </div>
                <a href="{{ route('pembimbing.siswa') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                     <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            </div>

            <div class="w-[300px] bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg" src="{{ asset('image/admin.jpg') }}" alt="" />
            <div class="p-2">
                <div class="block">
                    @if(Auth::user()->role == 'ps')
                        <h1 class="mb-2 font-bold tracking-tight text-[15px]">Keterlambatan {{ Auth::user()->name }} Hari Ini</h1>
                    @endif
                    <h1 class="mb-2 text-[30px] font-bold tracking-tight ml-[5px]">{{ $totalKeterlambatanHariIni }}</h1>
                </div>
            </div>
            </div>
        </div>
    </body>
    </html>
@endsection

<style>
    .konten-card {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-left: -100px
    }

    .card-ket {
        margin: 10px;
        padding: 12px;
        background-color: #fff;
        border-radius: 5px;
    }

    .konten-title {
        margin-left: 20px
    }

    .card-ket h1 {
        font-size: 20px;
        color: blue;    
    }
</style>
