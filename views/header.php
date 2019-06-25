<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#"><h5>Twitter</h5></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="?page=explore">Explore</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="?page=profile">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="?page=timeline">Timeline</a>
      </li>
    </ul>
      <?php if ($_SESSION['id'] ) {  ?> 
        <a class="btn btn-outline-success my-2 my-sm-0" href="?function=logout">Logout</a>
      <?php }
        else { ?>
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#signModal">Sign in / Sign up</button>
      <?php } ?>
  </div>
</nav>
<div class="container">
