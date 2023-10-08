<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>MVC</title>
  <style>
    
body {
    background-color: white;
    margin: 0; 
}


.container {
    background-color: white; 
    border-radius: 5px; 
}


.jumbotron {
    background-color: white; 
    padding: 20px; 
    border-radius: 5px; 
}


h1, h4 {
    color: #333; 
}


p {
    color: #555; 
}
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg  mb-3">
    <div class="container">
      <a class="navbar-brand font-weight-bold text-dark" href="<?= BASE_URL ?>/home/index">INVENTARIS</a>
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