<?php
session_start();
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
	<?php
		$id_tov=$_GET['id'];
		$check_tovar = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `basic` WHERE `id` = '$id_tov'"));
	?>
<div class="mainDiv">
	<table width="90%" height=100% align="center">
		<tr>
			<td colspan="2"><h1><?=$check_tovar['name']?></h1></td>
		</tr>
		<tr>
			<td align="center" width="25%" style="vertical-align: top;" rowspan="3"><img src="<?=$check_tovar['photo']?>" alt="Error" width="400px" height="375px"><h2><?=$check_tovar['price']?>$</h2>
				
				<?php
              if ($_SESSION['user']) {
                echo '<button type="button" class="btn btn-success btn-lg col-4">Купить</button>';
              }
            ?>
			</td>
			<td  style="height:20px"><h2 style="padding: 10px 20px;"><?=$check_tovar['mark']?> <img src="uploads\star.jpg" width="30px" height="30px"></h2></td>
		</tr>
		<tr>
			<td style="height:40px"><h4 align="center">Характеристики</h4></td>
		</tr>
		<tr>
			<td class="position-relative"><p class="position-absolute top-0 start-0" style="padding: 10px 20px;">
				<?php
					if($check_tovar['access_id'] === '1')
					{
						$characteristics = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `graphics_card` WHERE `type_id` = '$id_tov'"));
						echo '
							Обсяг пам`яті: '. $characteristics['amount_of_memory'] .'<br>
							Тип пам`яті: '. $characteristics['memory_type'] .'<br>
							Шина пам`яті: '. $characteristics['memory_bus'] .'<br>
							Частота графічного ядра: '. $characteristics['graphics_core_frequency'] .'<br>
							Частота відеопам`яті: '. $characteristics['video_memory_frequency'] .'<br>
							Продуктивність: '. $characteristics['productivity'] .'<br>';
					}
					else if($check_tovar['access_id'] === '2')
					{
						$characteristics = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `motherboard` WHERE `type_id` = '$id_tov'"));
						echo '
							Форм-фактор: '. $characteristics['form_factor'] .'<br>
							Роз`єм процесора (Socket): '. $characteristics['socket'] .'<br>
							Тип: '. $characteristics['type'] .'<br>
							Сумісні ОЗП: '. $characteristics['compatible_RAM'] . '<br>';
					}
					else if($check_tovar['access_id'] === '3')
					{
						$characteristics = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `processor` WHERE `type_id` = '$id_tov'"));
						echo '
							Лінійка: '. $characteristics['line'] .'<br>
							Роз`єм процесора (Socket): '. $characteristics['socket'] .'<br>
							Кількість ядер: '. $characteristics['number_of_cores'] .'<br>
							Інтегрована графіка: '. $characteristics['integrated_graphics'] .'<br>
							Сумісність: '. $characteristics['compatibility'] .'<br>
						';
					}
				?>
		</tr>
	</table>
</div>
</body>
</html>