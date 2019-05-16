<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Peliculas Online</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?=base_url()?>static/css/flat-ui.min.css">
  <link rel="stylesheet" href="<?=base_url()?>static/css/mi.css">
  <script src="<?=base_url()?>static/js/vendor/jquery.min.js"></script>
</head>
<body>
	<div class="container">
	 
	<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=site_url('renta')?> ">Rentadas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Las favoritas</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Animacion</a>
          <a class="dropdown-item" href="#">Comedia</a>
          <a class="dropdown-item" href="#">Accion</a>
        </div>
      </li>
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="<?=site_url('login/logout')?>">cerrar sesion</a>
      </li>
  </div>
</nav>
	</header>

