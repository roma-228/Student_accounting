<?php
include 'vendor/connect.php';
include 'component/link.php';
if (!$_SESSION['user']) {
	header('Location: /');
} elseif ($_SESSION['user']['SuperAdmin'] === 0) {
	header('Location: profile.php');
}

if ($_SESSION['user']['SuperAdmin'] != 0) {
	$adminName = "Суперадміністратор";
} else {
	$adminName = "Адміністратор";
}


$Perem = $_GET["perem"];

?>

<!doctype html>
<html class="fixed">

<head>

	<title>Машинобудівний коледж СумДУ</title>

	<style>
		.ClassForm {
			padding-left: 30%;
			font-size: 14px;
			font-weight: 400;
			color: white;
		}

		.ClassForm:hover {
			background-color: white;
			color: black;
		}

		.ButKurse {
			border: none;
			background: #0088cc;
			color: white;
			font-size: 18px;
			padding-top: 12px;
			padding-bottom: 16px;
			border-radius: 5px;
			margin-right: 10px;
			width: 100px;
		}

		@media screen and (max-width:550px) {
			.ButKurse {
				border: none;
				background: #0088cc;
				color: white;
				font-size: 14px;
				padding-top: 12px;
				padding-bottom: 16px;
				border-radius: 5px;
				margin-right: 10px;
				width: 60px;
			}
		}
	</style>
</head>

<body>
	<section class="body">

		<!-- start: header -->
		<?php include 'component/header.php'; ?>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<?php include 'component/menu.php'; ?>
			<!-- end: sidebar -->

			<section role="main" class="content-body kursePanel ">
				<header class="page-header" style="text-align: center;">

					<a href="google.com"><button class="ButKurse"> 1 Семестр</button></a>
					<a href="google.com"><button class="ButKurse"> 2 Семестр</button></a>
				</header>

				<script>
					<?php
					//Блок групи
					$KyrsePanel1 = $connect->query("SELECT COUNT(*) as COUNT FROM `subjects` WHERE `Semester`=1 and `id_ group`=9");
					while ($row = $KyrsePanel1->fetch_assoc()) {
						$num = $row["COUNT"];
					}
					$KyrsePanel1 = $connect->query("SELECT * FROM `subjects` WHERE `Semester`=1 and `id_ group`=9");
					while ($row = $KyrsePanel1->fetch_assoc()) {
						?>
						for (let h = 0; h < 5; h++) {
							let elemp = document.querySelector(".kursePanel");
							let div = document.createElement('section');
							div.classList.add('panel');
							div.innerHTML = '<header class="panel-heading"><div class="panel-actions"><a href="#" class="fa fa-caret-down"id="a"></a></div><h2 class="panel-title"><?= $row["name"] ?></h2></header><div class="panel-body"><form class="form-horizontal form-bordered" method="get"><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Годин</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["hour"] ?>"></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Кредитів</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["ESTS"] ?>"></div></div>	<div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Семестровий контроль</label><div class="col-md-8"><input type="text" class="form-control" id="Rating"></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Дата складання</label><div class="col-md-8"><input type="data" class="form-control" id="inputDefault" value="<?= $row["date"] ?>"></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">ПІБ викладача</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["Teacher"] ?>"></div></div><div style="text-align: right;"></div></form></div>';
							elemp.append(div);
							break;
						}
									<?php
					}
					?>
				</script>
				<!-- start: page -->
				<Div style="text-align: right;">
					<button class="ButKurse button"> Зберегти</button>
				</Div>
		</div>
		<script>
				jQuery(document).ready(function () {
					jQuery(".button").bind("click", function () {
						let Rating = document.getElementById("Rating").value;
						alert(Rating);
						jQuery.ajax({
							url: "server.php",
							type: "POST",
							data: {
								Rating: Rating

							},
							success: function () {
								alert("Да");
							},
							error: function () {
								alert("Нет");
							}
						});

					});
				});

		</script>

	</section>

	<?php include 'component/scripts.php'; ?>
</body>

</html>