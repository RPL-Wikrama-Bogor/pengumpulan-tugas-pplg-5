<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>MVC</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  <style>
    body{background-image: url(https://cdn.wallpapersafari.com/50/60/r0UINB.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position-y: -200px;

    }
    nav{
     
background-image: url(https://cimss.ssec.wisc.edu/satmet/modules/6_sat_winds/images/aircraft.gif);
      background-size: contain;
      background-repeat: no-repeat;
      background-position-x: 250px;

      
      height: 110px;
      
    }
    a{
      font-weight: 900;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg  mb-3">
    <div class="container">
      <a class="navbar-brand font-weight-bold text-dark" href="<?= BASE_URL ?>/home/index">INVENTARIS🏁</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>/home/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL ?>/home/page">Peminjaman</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>