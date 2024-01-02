<x-app-layout>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .pala{
            width: 100%;
            position: relative;
            display: flex;
            justify-content: center;
           
        }
        .pala::after{
            content: "";
            width: 100%;
            height: 100vh;
            background: #000000;
            opacity: 0.2;
            position: absolute;
            top: 0;
        }
        #bg-video{
            width: 100%;
            height: 100vh;
            position: absolute;
            object-fit: cover;
        }
        .video-info{
            z-index: 9;
            position: relative;
            color: white;
            text-align: center;
            margin-top: 10%;
        }
        .potek{
            display: flex;
            text-align: center;
font-size: 90px;

        }
        .alert{
            color: red;
            font-weight: 800;
            font-size: 20px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12"> --}}
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}
       
        <div class="pala">
            <video id="bg-video" autoplay muted loop>
                <source src="{{ asset('bit.mp4') }}" type="video/mp4">
            </video>
            <div class="video-info">
                       @if(Session::get('failed'))
                            
                            <div class="alert" role="alert">
                             <marquee behavior="" direction="y">  <p >{{Session::get('failed')}}</p></marquee> 
                              </div>
                       @endif
                        <div class="potek"><h1>Potek-A</h1>   <img src="{{ asset('ad.png') }}" alt="Deskripsi Gambar" style="height: 60px"></div>
              
                <p>Mau ngobat tapi gak ada duit?tenang Potek-A menyediakan obat yang murah meriah dengan harga yang pas dikantong potek-A menyediakan kualitas terbaik</p>
            </div>
        </div>
    </div>
</x-app-layout>
