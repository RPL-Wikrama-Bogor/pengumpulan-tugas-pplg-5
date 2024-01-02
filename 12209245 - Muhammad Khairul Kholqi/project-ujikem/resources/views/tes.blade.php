<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200">
    <form action="{{ route('login.auth') }}" method="post" class="mt-20">
        @csrf
        <div class="relative mx-auto w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
            @if(Session::get('failed'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:text-red-400 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
            <div>{{ Session::get('failed') }}</div>
        </div>
            @endif
                <div class="w-full">
                    <div class="text-center">
                        <h1 class="text-3xl font-bold text-gray-900 font-sans">Welcome back!</h1>
                        <p class="mt-2 text-gray-500">Sign In to access your dashboard,<br>settings and projects</p>
                    </div>
                    <div class="mt-5">
                        <form action="">
                            <div class="relative mt-6">
                                <input type="email" name="email" id="email" placeholder="Email Address" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" value="{{ old('email') }}" required/>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="email" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Email Address</label>
                            </div>
                            <div class="relative mt-6">
                                <input type="password" name="password" id="password" placeholder="Password" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" value="{{ old('password') }}" required/>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="password" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Password</label>
                            </div>
                            <div class="my-6">
                                <button type="submit" class="font-bold w-full rounded-md bg-black px-1 py-1 text-white focus:bg-blue-600 focus:outline-none bg-blue-700 text-lg">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </form>
</body>
</html>


