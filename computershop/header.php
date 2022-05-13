<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title></title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="main.php" target="CONTENT" class="nav-link px-2 text-white">Головна</a></li>
          <?php
            if ($_SESSION['user']) {
              echo '<li><a href="profile.php" target="CONTENT" class="nav-link px-2 text-white">Особистий кабінет</a></li>';
            }
          ?>
          <li><a href="#" class="nav-link px-2 text-white">Про нас</a></li>
        </ul>
        <div class="text-end">
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <?php
              if(!$_SESSION['user']){
                echo '<li><a href="enter.php" class="btn btn-outline-light" target="_top">Вхід</a>';
                echo ' <a href="register.php" class="btn btn-warning" target="_top">Реєстрація</a></li>';
              }
              if ($_SESSION['user']) {
                echo '<li><a class="nav-link px-2 text-white">' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname'] . '</a></li>';
                echo '<li><a href="vendor/logout.php" class="logout btn btn-outline-light" target="_top">Вихід</a></li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </header>
</body>
</html>