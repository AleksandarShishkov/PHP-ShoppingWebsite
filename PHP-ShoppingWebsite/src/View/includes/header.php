<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online shopping place</title>

        <link rel="stylesheet" type="text/css" href="../../Public/Style/style.css">
        <link rel="stylesheet" type="text/css" href="../../Public/Style/style_images.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <?php if(isset($_SESSION['user_id'])) { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/PHP-ShoppingWebsite/src/View/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PHP-ShoppingWebsite/src/View/Users/edit.php">Edit profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PHP-ShoppingWebsite/src/View/Products/index.php">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              LogOut
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="http://localhost/PHP-ShoppingWebsite/src/View/Users/Auth/logout.php">LogOut</a></li>
            </ul>
          </li>
        <?php } else {?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/PHP-ShoppingWebsite/src/View/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="http://localhost/PHP-ShoppingWebsite/src/View/Users/Auth/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PHP-ShoppingWebsite/src/View/Users/Auth/register.php">Register</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
    <body style="background-image: url('https://img.freepik.com/free-photo/black-friday-elements-assortment_23-2149074076.jpg?w=2000&t=st=1689172272~exp=1689172872~hmac=ad01f433247ebb824be8d6d567e953df1bac04c598579cdb77b6c2e5626a7272'); background-size: cover;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
