<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/styles.css">
	<title></title>
</head>
<body>
<div class="mainDiv">
	<h1 align="center">Комп'ютерний магазин</h1>
	<br>
	<p align="center">Ласкаво просимо, це тестовий сайт на якому буде можливість переглядати покупки, що вас цікавлять.</p>
  <div class="row" style="justify-content: center;">
		<div class="card inCard">
		<img src="uploads\graphic_card.png" class="card-img-top" alt="..." width="230px" height="200px">
			<div class="card-body">
			<h5 class="card-title">Вiдеокарти</h5>
		   <a href="productList.php?id=1" class="btn btn-warning">Перейти</a>
		   <?php
		   	if($_SESSION['user']['role'] == 'ADMIN')
		   	{
		   		echo '<a href="add_tovar1.php" class="btn btn-success" target="_top">Добавити</a>';
		   	}
		   ?>
			</div>
		</div>
		<div class="card inCard">
		<img src="uploads\mother_board.png" class="card-img-top" alt="..." width="230px" height="200px">
			<div class="card-body">
			<h5 class="card-title">Материнські плати</h5>
		   <a href="productList.php?id=2" class="btn btn-warning">Перейти</a>
		   <?php
		   	if($_SESSION['user']['role'] == 'ADMIN')
		   	{
		   		echo '<a href="add_tovar2.php" class="btn btn-success" target="_top">Добавити</a>';
		   	}
		   ?>
			</div>
		</div>
		<div class="card inCard">
		<img src="uploads\CPU.png" class="card-img-top" alt="..." width="230px" height="200px">
			<div class="card-body">
			<h5 class="card-title">Процесори</h5>
		   <a href="productList.php?id=3" class="btn btn-warning">Перейти</a>
		   <?php
		   	if($_SESSION['user']['role'] == 'ADMIN')
		   	{
		   		echo '<a href="add_tovar3.php" class="btn btn-success" target="_top">Добавити</a>';
		   	}
		   ?>
			</div>
		</div>
		<div class="card inCard">
		<img src="uploads\RAM.png" class="card-img-top" alt="..." width="230px" height="200px">
			<div class="card-body">
			<h5 class="card-title">Оперативна пам'ять</h5>
		   <a href="#" class="btn btn-warning disabled">Перейти</a>
			</div>
		</div>
		<div class="card inCard">
		<img src="uploads\case.png" class="card-img-top" alt="..." width="230px" height="200px">
			<div class="card-body">
			<h5 class="card-title">Корпуси</h5>
		   <a href="#" class="btn btn-warning disabled">Перейти</a>
			</div>
		</div>
		<div class="card inCard">
		<img src="uploads\block.jpg" class="card-img-top" alt="..." height="200px">
			<div class="card-body">
			<h5 class="card-title">Блоки живлення</h5>
		   <a href="#" class="btn btn-warning disabled">Перейти</a>
			</div>
		</div>
  </div>
</div>
</body>
</html>