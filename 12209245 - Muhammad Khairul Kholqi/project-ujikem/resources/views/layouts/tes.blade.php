{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App-Keterlambatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
.navbar {
        box-shadow: 0px 1px 15px #ddd;
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
    }

.logo p {
        text-align: center;
        font-family: 'Roboto', sans-serif;
        margin-top: 10px;
    }

    .navbar-nav {
        justify-content: spacace-between;
    }

        html,
        body {
            height: 100%;
            font-family: 'Ubuntu', sans-serif;
        }

        .mynav {
            color: black;
        }

        .mynav li a {
            color: black;
            text-decoration: none;
            width: 100%;
            display: block;
            border-radius: 5px;
            padding: 8px 5px;
        }

        .mynav li a.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .mynav li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .mynav li a i {
            width: 25px;
            text-align: center;
        }

        .notification-badge {
            background-color: rgba(255, 255, 255, 0.7);
            float: right;
            color: #222;
            font-size: 14px;
            padding: 0px 8px;
            border-radius: 2px;
        }

        .dropdown-menu {
            background-color: transparent;
            border: none;
            position: absolute;
        }
    </style>
</head>
<body>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <div class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand mr-auto" style="color: #3081D0; font-weight: bold; margin-left: 50px" href="/dashboard">Rekap <span style="color: #5FBDFF;">Keterlambatan</span></a>
        
    </div>

    <div class="container-fluid p-0 d-flex h-100" >
        <div id="bdSidebar"
            class="d-flex flex-column flex-shrink-0 p-3 text-black offcanvas-md offcanvas-start"
            style="width: 280px;">
            <a href="#" class="navbar-brand" style="justify-content: center; display: block;">
                <center><img src="{{ asset('image/logo.jpg') }}" alt="" style="width: 60px;" class="mt-3"></center>
                <center><p class="mt-3">SMK WIKRAMA <br> BOGOR</p></center>
            </a>
            <hr>
            <ul class="mynav nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="/dashboard" class="active" style="color: blue;"> 
                        <i class="fa-solid fa-wave-square"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('lates.index') }}" class="" style="color: blue;">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Data Keterlambatan
                    </a>
                </li>
                <li class="nav-item mb-1 dropdown">
                    <a href="#" class="dropdown-toggle" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: blue;">
                    <i class="fa-solid fa-bell"></i>
                    Data Master
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('rombel.index') }}">Data Rombel</a>
                        <a class="dropdown-item" href="{{ route('rayon.index') }}">Data Rayon</a>
                        <a class="dropdown-item" href="{{ route('students.index') }}">Data Siswa</a>
                        <a class="dropdown-item" href="{{ route('user.index') }}">Data User</a>
                    </div>
                </li>
            </ul>  
            <hr>
            <div class="admin-btn" style="margin-bottom: -50px;">
                <center><button type="button" class="btn btn-info mb-3"><a href="{{ route("logout") }}" style="color: #fff; text-decoration: none">LogOut</a></button></center>
            </div>
        </div>

        <div class="bg-light flex-fill">
            <div class="p-4">
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('script')
</body>

</html>  --}}