<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url()?>static/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>static/css/flat-ui.min.css">
    <link rel="stylesheet" href="<?=base_url()?>static/css/mi.css">
	<script src="<?=base_url()?>static/js/vendor/jquery.min.js"></script>
    <title>Login pelis 24</title>
</head>
<body>
  <div class="imagen"> </div>
  <div class="center">
    <form class="form-signin"  method="post" action="index.php/login"> 
          <div class="title" >
              <img src="static\img\logeo.svg" id="logo" alt="Logeo"/>
            <h1>Login</h1>
        </div>
        <div>
           <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
           <label for="inputEmail" class="sr-only">Email address</label>
           <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
           <label for="inputPassword" class="sr-only">Password</label>
           <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        </div>
        <div class="checkbox mb-3">
          <label>
          <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <div>
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ingresar" name="logeate">
            <a Class="lcolor" href="">Sign Up For Free</a>
            <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
         </div>
    </form>
  </div>

</body>
</html>