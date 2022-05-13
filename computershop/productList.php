<?php 
require_once 'vendor/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/styles.css">
	<title></title>
</head>
<body>
					<div class="mainDiv position-relative" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
						<?php
							$id_check = $_GET['id'];
							$basic_table = mysqli_query($connect, "SELECT `id`, `name`, `mark`, `price`, `photo` FROM `basic` WHERE `access_id`=$id_check");
							$basic_table = mysqli_fetch_all($basic_table);
							
							foreach ($basic_table as $product) {
								echo '
									<div class="card mb-3" id="card">
									  <div class="row g-0">
									    <div class="col-md-4">
									      <img src="'.$product[4].'" class="img-fluid rounded-start" alt="...">
									    </div>
									    <div class="col-md-8">
									      <div class="card-body">
									        <h5 class="card-title">' . $product[1] . '</h5>
									        <p class="card-text">' . $product[2] . '<img src="uploads\star.jpg" width="30px" height="30px"></p>
									        <a href="tovar.php?id='.$product[0].'" class="btn btn-success btn-lg col-4">' . $product[3] . '$</a>
									      </div>
									    </div>
									  </div>
									</div>
								';
							}
						?>
						
					</div>
</body>
</html>