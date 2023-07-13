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
$id_group = $_GET["id_group"];
$id_Students = $_GET["id"];
$kursenum = $_GET["kursenum"];

?>

<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Машинобудівний коледж СумДУ</title>


	<style>
		.ClassForm {

			font-size: 14px;
			font-weight: 400;
			color: white;
			text-align: center;
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
				font-size: 12px;
				padding-top: 12px;
				padding-bottom: 16px;
				border-radius: 5px;
				margin-right: 10px;
				width: 85px;
			}

			.butt {
				border: none;
				background: #0088cc;
				color: white;
				font-size: 14px;
				padding-top: 12px;
				padding-bottom: 16px;
				border-radius: 5px;
				margin-right: 10px;
				width: 100px;
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
				<header class="page-header re" style="text-align: center;">
					<script>
						<?php
						//Блок групи
						$qvery = $connect->query("SELECT * FROM `semestr` WHERE `id_kurse`=$kursenum ");
						$i = 1;
						while ($row = $qvery->fetch_assoc()) {

							$id_semestr[$i] = $row["id_semestr"];
							$name[$i] = $row["name"];

							$i++;
						}
						?>
					</script>
					<a href="/semestr1.php?id_group=<?= $id_group ?>&id=<?= $id_Students ?>&kursenum=<?= $kursenum ?>"><button
							class="ButKurse">
							<?= $name[1] ?>
						</button></a>
					<a href="/semestr2.php?id_group=<?= $id_group ?>&id=<?= $id_Students ?>&kursenum=<?= $kursenum ?>"><button
							class="ButKurse">
							<?= $name[2] ?>
						</button></a>
				</header>

				<script>
					<?php

					$Ky = $connect->query("SELECT * FROM `groups` WHERE `id_ group`=$id_group");
					while ($row = $Ky->fetch_assoc()) {
						$name = $row["name"];
					}
					$str = substr($name, 1);
					$kurs = $kursenum . $str;
					//Блок групи
					$KyrsePanel1 = $connect->query("SELECT COUNT(*) as COUNT FROM `subjects` WHERE `id_ group`=(SELECT `id_ group` FROM `groups` WHERE `name` LIKE '%$kurs%') and `id_semestr`=$id_semestr[2] ORDER by `id_Subjects`");
					while ($row = $KyrsePanel1->fetch_assoc()) {
						$num = $row["COUNT"];
					}
					$KyrsePa = $connect->query("SELECT * FROM `subjects` WHERE `id_ group`=(SELECT `id_ group` FROM `groups` WHERE `name` LIKE '%$kurs%') and `id_semestr`=$id_semestr[2] ORDER by `id_Subjects`");

					while ($row = $KyrsePa->fetch_assoc()) {

						?>
						for (let h = 0; h < 5; h++) {
							let elemp = document.querySelector(".kursePanel");
							let div = document.createElement('section');
							div.classList.add('panel');
							div.innerHTML = '<header class="panel-heading"><div class="panel-actions"><a  class="fa fa-caret-down"id="a"></a></div><h2 class="panel-title" id="id<?= $row["id_Subjects"] ?>"><?= $row["name"] ?></h2></header><div class="panel-body"><form class="form-horizontal form-bordered" method="get"><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Годин</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["hour"] ?>" readonly></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Кредитів</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["ESTS"] ?>"readonly></div></div>	<div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Семестровий контроль</label><div class="col-md-8"><input type="text" class="form-control"  id="Rating<?= $row["id_Subjects"] ?>" ></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">Дата складання</label><div class="col-md-8"><div class="input-group"> <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span><input type="date" class="form-control"  id="Datee<?= $row["id_Subjects"] ?>" ></div></div></div><div class="form-group"><label class="col-md-3 control-label" for="inputDefault">ПІБ викладача</label><div class="col-md-8"><input type="text" class="form-control" id="inputDefault" value="<?= $row["Teacher"] ?>" readonly></div></div><div style="text-align: right;"></div></form></div>';
							elemp.append(div);
							break;
						}
										<?php
					}

					?>
				</script>
				<!-- start: page -->
				<Div style="text-align: right;">
					<button class="ButKurse butt" onclick="but()"> Зберегти</button>
				</Div>
		</div>
		<script>
				function but() {

					<?php
					$KyrsePanel2 = $connect->query("SELECT * FROM `subjects` WHERE `id_ group`=(SELECT `id_ group` FROM `groups` WHERE `name` LIKE '%$kurs%') and `id_semestr`=$id_semestr[2] ORDER by `id_Subjects`");
					while ($row = $KyrsePanel2->fetch_assoc()) {
						?>

						var students = <?php echo $id_Students ?>;
						var id_Subjects = <?php echo $row["id_Subjects"] ?>;
						var semestr = <?php echo $id_semestr[2] ?>;

						for (let k = 0; k < 1; k++) {
							var Rating = document.getElementById("Rating<?= $row["id_Subjects"] ?>").value;
							var Datee = document.getElementById("Datee<?= $row["id_Subjects"] ?>").value;

							jQuery.ajax({
								url: "server.php",
								type: "POST",
								data: {
									id_Subjects: id_Subjects,
									Rating: Rating,
									Datee: Datee,
									students: students,
									semestr: semestr
								},
								success: function () {

								},
								error: function () {
									alert("Нет");
								}
							});

						}
						<?php
					}
					?>
					alert("Данні були успішно надісланні");
				}
		</script>

	</section>
	<script>


		window.onload = function () {
			<?php
			$KyrsePane = $connect->query("SELECT * FROM `evaluation` WHERE `id_Students`=$id_Students and `id_semestr`=$id_semestr[2] ORDER by `id_Subjects`");
			while ($rowe = $KyrsePane->fetch_assoc()) {

				if ($rowe["Evaluation"] == null) {
					$evalu = 'null';
				} else {
					$evalu = $rowe["Evaluation"];
				}
				?>
				var val = document.getElementById("Rating<?= $rowe["id_Subjects"] ?>");

				val.value = <?= $evalu ?>;

				var rut = document.getElementById("Datee<?= $rowe["id_Subjects"] ?>");
				rut.value = "<?= $rowe["data"] ?>";

				<?php
			}
			?>
		}
	</script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Vendor -->
	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Specific Page Vendor -->
	<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
	<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
	<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
	<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
	<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
	<script src="assets/vendor/flot/jquery.flot.js"></script>
	<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
	<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
	<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
	<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
	<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
	<script src="assets/vendor/raphael/raphael.js"></script>
	<script src="assets/vendor/morris/morris.js"></script>
	<script src="assets/vendor/gauge/gauge.js"></script>
	<script src="assets/vendor/snap-svg/snap.svg.js"></script>
	<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
	<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
	<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
	<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
	<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="assets/javascripts/theme.init.js"></script>


	<!-- Examples -->
	<script src="assets/javascripts/dashboard/examples.dashboard.js"></script>
</body>

</html>