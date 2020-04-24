<?php
class Template{
  static function showHeader($title){
    ?>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>
  <div class="container">
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container">
	<div align="right">
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signup.php';">Sign Up</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signin.php';">Sign In</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signout.php';">Sign Out</button>
	</div>
</nav>
    <h1><?= $title ?></h1> 
  <?php
  }
  
  static function showFooter(){
    ?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<?php

  }
  
  static function showDetailHeader(){
    ?>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  </head>
  <body>
  <div class="container">
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container">
	<div align="right">
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signup.php';">Sign Up</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signin.php';">Sign In</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signout.php';">Sign Out</button>
	</div>
</nav>
  <?php
  }
  
  static function showManagerHeader($title) {
	 ?>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <base href="" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>
  <div class="container">
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container">
	<div align="right">
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth/admin_signin.php';">Admin Sign In</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='../auth_new/signout.php';">Sign Out</button>
	</div>
</nav>
    <h1><?= $title ?></h1> 
  <?php
  } 
  }