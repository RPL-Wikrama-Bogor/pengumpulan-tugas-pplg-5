<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>App Keterlambatan</title>
</head>
<body style="background-color: #F5F7F8;">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-white left-[-300px] shadow-sm ">
        <div class="block justify-center p-[20px] rounded-[5px]" style="background-image: url('{{ asset('image/bg.jpg') }}'); background-size: cover">
            @if(Auth::check())
            @if(Auth::user()->role == 'admin')
                <div class="flex justify-center">
                    <img class="w-[60px] p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{ asset('image/admin1.png') }}" alt="Bordered avatar" draggable="false">
                </div>
            @elseif(Auth::user()->role == 'ps')
                <div class="flex justify-center">
                    <img class="w-[60px] p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{ asset('image/guru.png') }}" alt="Bordered avatar" draggable="false">
                </div>
            @endif
            
            @if(Auth::user()->role == 'admin')
                <h1 class="mt-4 font-bold text-[20px] text-blue-800">Administrator</h1>
            @elseif(Auth::user()->role == 'ps')
                <h1 class="mt-4 text-blue-800 font-bold text-[20px]">{{ Auth::user()->name }}</h1>
            @endif
            
        </div>
        <div class="text-gray-100 text-x1">
            <div class="p-2.5 mt-1 flex items-center">
                <h1 class="font-bold text-black text-[20px] ml-3">Rekapitulasi</h1>
                <i class="bi bi-x-lg ml-[100px] cursor-pointer lg:hidden text-black bg-blue-600 p-[10px] rounded-[5px] text-white" onclick="Open()"></i>
            </div>
            <hr class="my-2 text-gray-600">
        </div>
        @if(Auth::user()->role == "admin")
        <a href="/dashboard">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-columns-gap text-black"></i>
                <span class="text-[15px] ml-4 text-black font-bold">Dashboard</span>
            </div>
        </a>
         @else
         <a href="/dashboard-pemb">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-columns-gap text-black"></i>
                <span class="text-[15px] ml-4 text-black font-bold">Dashboard</span>
            </div>
        </a>
        @endif
        @if(Auth::user()->role == "admin")
        <a href="{{ route('lates.index') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-book text-black"></i>
                <span class="text-[15px] ml-4 text-black font-bold">Data Keterlambatan</span>
            </div>
        </a>
        @else
        <a href="{{ route('pembimbing.telat') }}">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-book text-black"></i>
                <span class="text-[15px] ml-4 text-black font-bold">Data Keterlambatan</span>
            </div>
        </a>
        @endif

        {{-- @if(Auth::User()->role == "admin") --}}
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="dropdown()">
            <i class="bi bi-folder2-open text-black"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-black font-bold">Data Master</span>
                <span class="text-sm rotate-180" id="arrow">
                    <i class="bi bi-caret-down-fill text-black"></i>
                </span>
            </div>
        </div>
        {{-- @endif  --}}
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-black" id="submenu">
            @if(Auth::User()->role == "admin")
            <a href="{{ route('rombel.index') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-700 rounded-md mt-1 hover:text-white">Data Rombel</h1>
            </a>
            <a href="{{ route('rayon.index') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-700 rounded-md mt-1 hover:text-white">Data Rayon</h1>
            </a>
            @endif
            @if(Auth::user()->role == "admin")
            <a href="{{ route('students.index') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-700 rounded-md mt-1 hover:text-white">Data Siswa</h1>
            </a>
            @else
            <a href="{{ route('pembimbing.siswa') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-700 rounded-md mt-1 hover:text-white">Data Siswa</h1>
            </a>
            @endif
            @if(Auth::User()->role == "admin")
            <a href="{{ route('user.index') }}">
                <h1 class="cursor-pointer p-2 hover:bg-blue-700 rounded-md mt-1 hover:text-white">Data User</h1>
            </a>
            @endif 
        </div>
        <hr class="my-2 text-gray-600">
        <a href="{{ route("logout") }}">
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right text-black"></i>
            <span class="text-[15px] ml-4 text-black font-bold">Log Out</span>
        </div>
        </a>
        @endif  
    </div>
    <div class="container">
        @yield('content')
    </div>
    <script>
        function dropdown() {
            document.querySelector('#submenu').classList.toggle('hidden');
            document.querySelector('#arrow').classList.toggle('rotate-0');
        }
        dropdown()
        function Open() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }
    </script>
</body>
</html>