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
$id_Students = $_GET["id"];
$Students = $connect->query("SELECT * FROM `students` WHERE `id_Students`= $id_Students");

while ($row = $Students->fetch_assoc()) {
	$id_group = $row["id_ group"];
	$fullname = $row["fullname"];
	$birthdata = $row["birthdata"];
	$place_of_birth = $row["place_of_birth"];
	$adress = $row["adress"];
	$groups = $row["groups"];
	$Start_learning = $row["Start_learning"];
	$graduation = $row["graduation"];
	$Form_of_study = $row["Form_of_study"];
	$Department = $row["Department"];
	$Degree = $row["Degree"];
	$Specialty = $row["Specialty"];
	$program = $row["program"];
	$reckoned = $row["reckoned"];
	$Branch_of_knowledge = $row["Branch_of_knowledge"];
	$Specialty = $row["Specialty"];
	$program = $row["program"];
	$ratingall = $row["ratingall"];
	$RatingExcellent = $row["RatingExcellent"];
	$RatingGood = $row["RatingGood"];
	$RatingSatisfactory = $row["RatingSatisfactory"];
	$DiplomTopic = $row["DiplomTopic"];
	$DiplomGrade = $row["DiplomGrade"];
	$Qualification = $row["Qualification"];
	$Qualificationdata = $row["Qualificationdata"];

}

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
			width: 110px;
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
				width: 65px;
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

		#label {
			display: none;
			width: 100%;
			text-align: center;
			font-weight: 600;
		}

		@media(max-width: 1100px) {
			.resp-tab thead {
				display: none;
			}

			.resp-tab tr {
				display: flex;
				flex-direction: row;
				flex-wrap: wrap;
				margin-bottom: 30px;
			}

			.resp-tab td {
				margin: 0 -1px -1px 0;
				padding-top: 35px;
				position: relative;
				width: 100%;
			}

			.resp-tab td span {
				display: block;
			}

			#idd {
				background: #0088cc;
				color: white;
			}

			#idd1 {
				background: #e9c646;
				text-align: center;

			}

			#label {
				display: block;
			}
		}



		.resp-tab {
			border-radius: 5px;
			font-weight: normal;
			border: none;
			border-collapse: collapse;
			width: 100%;
			max-width: 100%;
		}

		.resp-tab th,
		.resp-tab td {
			padding: 10px 20px;
			font-size: 13px;
			border: none;

			border: 1px solid #337AB7;
			vertical-align: top;
		}

		.resp-tab th {
			color: #FFF;
			background: #0088cc;
			font-weight: bold;
			border: 1px solid #1a4a73;
			text-transform: uppercase;
			text-align: center;
		}

		.resp-tab td span {

			color: #FFF;
			display: none;
			font-size: 11px;
			font-weight: bold;

			text-transform: uppercase;
			padding: 5px 10px;
			position: absolute;
			top: 0;
			left: 0;
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

			<section role="main" class="content-body transition-fade" id="swup">
				<header class="page-header re" style="text-align: center;">


					<script>
						<?php
						//Блок групи
						$qvery = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` BETWEEN 1 AND 4 ");
						while ($row = $qvery->fetch_assoc()) {

							?>
							for (let t = 0; t < 5; t++) {
								let elemp = document.querySelector(".re");
								let a = document.createElement('a');
								a.href = "/semestr1.php?id_group=<?= $id_group ?>&id=<?= $id_Students ?>&kursenum=<?= $row["id_kurse"] ?>";
								a.innerHTML = '<button class="ButKurse"> <?= $row["name"] ?></button>';
								elemp.append(a);
								break;
							}
									<?php
						}
						?>
					</script>
				</header>


				<section class="panel">
					<header class="panel-heading" style="padding: 0;">
						<form action="../word.php" method="post">
							<input type="hidden" name="Students" value="<?= $id_Students ?>">
							<button
								style="height: 40px;width: 100%;background: #0088cc;border: none;color: white;font-size: 20px;cursor: pointer;">Завантажити
								особисту справу</button>
						</form>
					</header>
					<div class="panel-body">
						<div style="text-align: center;"><label
								style="font-size: 18px;font-weight: 600;padding-bottom: 2%;">Індивідуальний навчальний
								план студента</label><br> </div>

						<div class="form-group">
							<label class="col-md-3 control-label">ПІБ:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $fullname ?>" id="fullname">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Дата народження:</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" value="<?= $birthdata ?>" id="birthdata">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Місце народження:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $place_of_birth ?>"
									id="place_of_birth">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Адрес місця проживання:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $adress ?>" id="adress"
									placeholder="Поштовий індекс, область, район,назва населенного пункту,вулиця,№ будинку,№ квартири,номер телефону">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Зарахований(на) наказом від:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $reckoned ?>" id="reckoned">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Група:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $groups ?>" id="groups">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Початок навчання:</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" value="<?= $Start_learning ?>"
										id="Start_learning">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Закінчення навчання:</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" value="<?= $graduation ?>" id="graduation">
								</div>
							</div>
						</div>


						<div class="form-group">
							<label class="col-md-3 control-label">Форма навчання</label>
							<div class="col-md-8">
								<div class="input-group">

									<input type="text" class="form-control" value="<?= $Form_of_study ?>"
										id="Form_of_study">
								</div>
							</div>
						</div>



						<div style="text-align: center;"><label
								style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Загальні
								дані</label><br> </div>
						<div class="form-group">
							<label class="col-md-3 control-label">Відділення:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Department ?>" id="Department">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Освітньо-професійний ступінь:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Degree ?>" id="Degree">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Найменування галузі знань:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Branch_of_knowledge ?>"
									id="Branch_of_knowledge">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Спеціальність:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $Specialty ?>" id="Specialty">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Освітньо-професійна програма:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" value="<?= $program ?>" id="program">
							</div>
						</div>
						<div style="text-align: center;"><label
								style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Підсумкові
								оцінки</label><br> </div>
						<div class="form-group">
							<label class="col-md-3 control-label">Усього:</label>
							<div class="col-md-8" style="display: flex;">
								<input style="width: 60%;" type="text" class="form-control" id="ratingall"
									value="<?= $ratingall ?>">
								<button onclick="sumer()" style="width: 40%; height: 33px;padding-top: 5px;"
									class="ButKurse butt">Розрахувати</button>

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Відмінно:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="RatingExcellent"
									value="<?= $RatingExcellent ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Добре:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="RatingGood" value="<?= $RatingGood ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Задовільно:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="RatingSatisfactory"
									value="<?= $RatingSatisfactory ?>">
							</div>
						</div>

						<div style="text-align: center;"><label
								style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Дипломний
								проєкт</label><br> </div>
						<div class="form-group">
							<label class="col-md-3 control-label">Тема:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="DiplomTopic" value="<?= $DiplomTopic ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Оцінка:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="DiplomGrade" value="<?= $DiplomGrade ?>">
							</div>
						</div>

						<div style="text-align: center;"><label
								style="font-size: 18px;font-weight: 600;padding-bottom: 2%; padding-top: 2%;">Кваліфікація</label><br>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Присвоєна кваліфікація:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="Qualification"
									value="<?= $Qualification ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Присвоєно від:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="Qualificationdata"
									value="<?= $Qualificationdata ?>" placeholder='"___"___________ 20___ року №___'>
							</div>
						</div>
					</div>
				</section>




				<section class="panel">
					<header class="panel-heading" style="text-align: center;">
						<h2 class="panel-title">Накази</h2>
					</header>
					<div class="panel-body">



						<table class="table table-bordered table-striped mb-none resp-tab">
							<thead>
								<tr>
									<th style="width: 10%;text-align: center;">Курс</th>
									<th style="width: 40%;text-align: center;">Номер і дата наказу</th>
									<th style="width: 15%;text-align: center;">Зміст наказу</th>
									<th style="width: 10%;text-align: center;">Дії</th>
								</tr>
							</thead>
							<tbody id="Table">
								<script>
										<?php
										$Student1 = $connect->query("SELECT * FROM `orders` WHERE `id_Students`=$id_Students ORDER BY `id_Orders` ASC");

										while ($row = $Student1->fetch_assoc()) {

											?>
										for (let h = 0; h < 1; h++) {
											let elemp = document.getElementById("Table");
											let tr = document.createElement('tr');
											tr.innerHTML = '<td  style="text-align: center; "> <label id="label" >Курс</label><input type="text" class="form-control" style="text-align: center;" value="<?= $row["kurse"] ?>" readonly id="kurse<?= $row["id_Orders"] ?>"></td><td ><label id="label" >Номер і дата наказу</label><input  type="text" class="form-control" style="text-align: center; " value="<?= $row["name"] ?>" readonly id="data<?= $row["id_Orders"] ?>"> </td><td class="actions" style="text-align: center;"><label id="label" >Зміст наказу</label><input type="text" class="form-control" style="text-align: center;" value="<?= $row["text"] ?>" readonly id="text<?= $row["id_Orders"] ?>"></td><td class="actions" id="idd1"><i class="fa fa-save" onclick="save(<?= $row["id_Orders"] ?>)" id="save<?= $row["id_Orders"] ?>">  </i>     <i class="fa fa-pencil" onclick="pencil(<?= $row["id_Orders"] ?>)" id="pencil<?= $row["id_Orders"] ?>"></i>   <i class="fa fa-trash-o" onclick="trash(<?= $row["id_Orders"] ?>)" id="trash<?= $row["id_Orders"] ?>">  </i>  </td>';
											elemp.append(tr);
											break;
										}

												<?php

										}
										?>
								</script>

							</tbody>
						</table>
						<div style="text-align: end;  margin-top: 6px;">

							<button class="ButKurse butt" onclick="buton3()" id="butt3">Змінити <i
									class="fa fa-pencil"></i></button>
							<br>
							<button class="ButKurse butt" onclick="buton1()" id="butt1">Додати <i
									class="fa fa-plus"></i></button>
						</div>
						<script>
								let i = 1;

							function buton1() {
								document.getElementById("butt1").style.visibility = "hidden";
								document.getElementById("butt3").style.visibility = "visible";
								for (let h = 0; h < 1; h++) {
									let elemp = document.getElementById("Table");
									let tr = document.createElement('tr');
									tr.id = i;
									tr.innerHTML = '<td style="text-align: center; "> <label id="label" >Курс</label><input type="text" class="form-control" style="text-align: center;" id="input1"></td><td style="text-align: center;" ><label id="label" >Номер і дата заказу</label> <input type="text" class="form-control" style="text-align: center;" id="input2"></td><td class="actions" style="text-align: center;"><label id="label" >Зміст наказу</label><input type="text" class="form-control" id="input3"></td>';
									elemp.append(tr);
									i++;
									break;

								}

							}

							function buton3() {
								let input1 = document.getElementById("input1").value;
								let input2 = document.getElementById("input2").value;
								let input3 = document.getElementById("input3").value;
								let student = <?= $id_Students ?>;

								if (input3 == "" && input2 == "" && input1 == "") {
									alert("Не все поля заповнено")
								} else {
									jQuery.ajax({
										url: "vendor/orders.php",
										type: "POST",
										data: {
											input1: input1,
											input2: input2,
											input3: input3,
											student: student

										},
										success: function () {

										},
										error: function () {
											alert("Нет");
										}
									});
									document.getElementById("butt1").style.visibility = "visible";
									document.getElementById("butt3").style.visibility = "hidden";
									window.location.reload();
								}

							}
						</script>

					</div>
				</section>


				<section class="panel">
					<header class="panel-heading" style="text-align: center;">
						<h2 class="panel-title">Практична підготовка</h2>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped mb-none resp-tab">
							<thead>
								<tr>
									<th style="text-align: center;">№</th>
									<th style="text-align: center;">Вид практики</th>
									<th style="text-align: center;">Курс</th>
									<th style="text-align: center;">Семестр</th>
									<th style="text-align: center;">Дата початку</th>
									<th style="text-align: center;">Дата кінця</th>
									<th style="text-align: center;">Годин</th>
									<th style="text-align: center;">Піб викладача</th>
									<th style="text-align: center;">Підсумкова оцінка</th>
									<th style="text-align: center;">Дата</th>
									<th style="text-align: center;">Дії</th>
								</tr>
							</thead>
							<tbody id="Table5">
								<script>
									<?php
									$Student1 = $connect->query("SELECT * FROM `practice` WHERE `id_Students`=$id_Students");
									$num = 1;
									while ($row = $Student1->fetch_assoc()) {

										?>
										for (let h = 0; h < 1; h++) {
											let elemp = document.getElementById("Table5");
											let tr = document.createElement('tr');
											tr.innerHTML = '<td style="text-align: center; "> <input type="text" class="form-control" style="text-align: center;" id="int<?= $row["id_practice"] ?>"  readonly value="<?= $num ?>"></td><td style="text-align: center;"> <label id="label" >Вид практики</label><input type="text" class="form-control" style="text-align: center;"id="namee<?= $row["id_practice"] ?>" value="<?= $row["name"] ?>" readonly></td><td style="text-align: center;"><label id="label" >Курс</label><input type="text" class="form-control" style="text-align: center;"id="id_kurse<?= $row["id_practice"] ?>" value="<?= $row["id_kurse"] ?>" readonly></td><td style="text-align: center;"><label id="label" >Семестр</label><input type="text" class="form-control" style="text-align: center;"id="id_semestr<?= $row["id_practice"] ?>" value="<?= $row["id_semestr"] ?>" readonly></td><td style="text-align: center; "><label id="label" >Дата початку</label><input type="text" class="form-control" style="text-align: center;"id="beginning<?= $row["id_practice"] ?>" value="<?= $row["beginning"] ?>" readonly></td><td style="text-align: center;"><label id="label" >Дата кінця</label> <input type="text" class="form-control" style="text-align: center;"id="end<?= $row["id_practice"] ?>" value="<?= $row["end"] ?>" readonly></td><td style="text-align: center;"><label id="label" >Годин</label><input type="text" class="form-control" style="text-align: center;"id="hourr<?= $row["id_practice"] ?>" value="<?= $row["hour"] ?>" readonly></td><td style="text-align: center; "><label id="label" >ПІБ викладача</label> <input type="text" class="form-control" style="text-align: center;"id="nameteacher<?= $row["id_practice"] ?>" value="<?= $row["nameteacher"] ?>" readonly></td><td style="text-align: center;"><label id="label" >Підсумкова оцінка</label><input type="text" class="form-control" style="text-align: center;"id="ratingg<?= $row["id_practice"] ?>" value="<?= $row["rating"] ?>" readonly></td><td style="text-align: center;"><label id="label" >Дата</label><input type="text" class="form-control" style="text-align: center;"id="dateee<?= $row["id_practice"] ?>" value="<?= $row["date"] ?>" readonly></td><td class="actions" id="idd1" ><i class="fa fa-save" onclick="savepractice(<?= $row["id_practice"] ?>)" id="savepractice<?= $row["id_practice"] ?>">  </i>     <i class="fa fa-pencil" onclick="pencilpractice(<?= $row["id_practice"] ?>)" id="pencilpractice<?= $row["id_practice"] ?>"></i>   <i class="fa fa-trash-o" onclick="trashpractice(<?= $row["id_practice"] ?>)" id="trashpractice<?= $row["id_practice"] ?>">  </i>  </td>';
											elemp.append(tr);
											break;
										}
												<?php
												$num++;
									}
									?>
								</script>

							</tbody>
						</table>
						<div style="text-align: end;  margin-top: 6px;">
							<button class="ButKurse butt" onclick="buton333()" id="buton333">Змінити <i
									class="fa fa-pencil"></i></button>
							<br>
							<button class="ButKurse butt" onclick="buton111()" id="buton111">Додати <i
									class="fa fa-plus"></i></button>
						</div>
						<script>
								function buton111() {
									document.getElementById("buton111").style.visibility = "hidden";
									document.getElementById("buton333").style.visibility = "visible";
									for (let h = 0; h < 1; h++) {
										let elemp = document.getElementById("Table5");

										let tr = document.createElement('tr');
										tr.innerHTML = '<td style="text-align: center; "> <input type="text" class="form-control" style="text-align: center;"   ></td><td style="text-align: center;"><label id="label" >Вид практики</label><input type="text" class="form-control" style="text-align: center;" id="int2"></td><td style="text-align: center;"><label id="label" >Курс</label><input type="text" class="form-control" style="text-align: center;"id="int3"></td><td style="text-align: center;"><label id="label" >Семестр</label><input type="text" class="form-control" style="text-align: center;"id="int4"></td><td style="text-align: center; "><label id="label" >Дата початку</label><input type="text" class="form-control" style="text-align: center;" id="int5"></td><td style="text-align: center;"><label id="label" >Дата кінця</label><input type="text" class="form-control" style="text-align: center;"id="int6"></td><td style="text-align: center;"><label id="label" >Годин</label><input type="text" class="form-control" style="text-align: center;" id="int7"></td><td style="text-align: center; "><label id="label" >ПІБ викладача</label><input type="text" class="form-control" style="text-align: center;"id="int8"></td><td style="text-align: center;"><label id="label" >Підсумкова оцінка</label><input type="text" class="form-control" style="text-align: center;"id="int9"></td><td style="text-align: center;"><label id="label" >Дата</label><input type="text" class="form-control" style="text-align: center;"id="int10"></td>';
										elemp.append(tr);
										break;
									}
								}

							function buton333() {
								let fun = 9;

								let input2 = document.getElementById("int2").value;
								let input3 = document.getElementById("int3").value;
								let input4 = document.getElementById("int4").value;
								let input5 = document.getElementById("int5").value;
								let input6 = document.getElementById("int6").value;
								let input7 = document.getElementById("int7").value;
								let input8 = document.getElementById("int8").value;
								let input9 = document.getElementById("int9").value;
								let input10 = document.getElementById("int10").value;
								let student = <?= $id_Students ?>;
								if (input2 == "" || input3 == "" || input4 == "" || input5 == "" || input6 == "" || input7 == "" || input8 == "" || input9 == "" || input10 == "") {
									alert("Не все поля заповнено")

								} else {
									jQuery.ajax({
										url: "vendor/but.php",
										type: "POST",
										data: {
											fun: fun,
											input2: input2,
											input3: input3,
											input4: input4,
											input5: input5,
											input6: input6,
											input7: input7,
											input8: input8,
											input9: input9,
											input10: input10,
											student: student
										},
										success: function () {

											alert("Дані були успішно записані");
										},
										error: function () {
											alert("Нет");
										}
									});
									document.getElementById("butt1").style.visibility = "visible";
									document.getElementById("butt3").style.visibility = "hidden";
									window.location.reload();
								}

							}
						</script>



						</tbody>
						</table>

					</div>
				</section>


				<section class="panel">
					<header class="panel-heading" style="text-align: center;">
						<h2 class="panel-title">Державна атестація</h2>
					</header>
					<div class="panel-body">
						<table class="table table-bordered table-striped mb-none resp-tab">
							<thead>
								<tr>
									<th style="text-align: center;">№</th>
									<th style="text-align: center;">Назва начальної дисципліни</th>
									<th style="text-align: center;">Оцінка</th>
									<th style="text-align: center;">Дії</th>
								</tr>
							</thead>
							<tbody id="Table4">

								<script>
									<?php
									$Student1 = $connect->query("SELECT * FROM `certification` WHERE `id_Students`=$id_Students");
									$num = 1;
									while ($row = $Student1->fetch_assoc()) {

										?>
										for (let h = 0; h < 1; h++) {
											let elemp = document.getElementById("Table4");
											let tr = document.createElement('tr');
											tr.innerHTML = '<td style="text-align: center; "><input type="text" class="form-control" style="text-align: center;" value="<?= $num ?>" readonly id="num<?= $row["id_certification"] ?>"></td><td ><label id="label" >Назва навчальної дисципліни</label><input  type="text" class="form-control" style="text-align: center; " value="<?= $row["name"] ?>" readonly id="name<?= $row["id_certification"] ?>"> </td><td class="actions" style="text-align: center;"><label id="label" >Оцінка</label><input type="text" class="form-control" style="text-align: center;" value="<?= $row["rating"] ?>" readonly id="rating<?= $row["id_certification"] ?>"></td><td class="actions" id="idd1"><i class="fa fa-save" onclick="savecertification(<?= $row["id_certification"] ?>)" id="savecertification<?= $row["id_certification"] ?>">  </i>     <i class="fa fa-pencil" onclick="pencilcertification(<?= $row["id_certification"] ?>)" id="pencilcertification<?= $row["id_certification"] ?>"></i>   <i class="fa fa-trash-o" onclick="trashcertification(<?= $row["id_certification"] ?>)" id="trashcertification<?= $row["id_certification"] ?>">  </i>  </td>';
											elemp.append(tr);
											break;
										}
												<?php
												$num++;
									}
									?>
								</script>
							</tbody>
						</table>
						<div style="text-align: end;  margin-top: 6px;">
							<button class="ButKurse butt" onclick="buton33()" id="buton33">Змінити <i
									class="fa fa-pencil"></i></button>
							<br>
							<button class="ButKurse butt" onclick="buton11()" id="buton11">Додати <i
									class="fa fa-plus"></i></button>
						</div>
						<script>
								function buton11() {
									document.getElementById("buton11").style.visibility = "hidden";
									document.getElementById("buton33").style.visibility = "visible";
									for (let h = 0; h < 1; h++) {
										let elemp = document.getElementById("Table4");

										let tr = document.createElement('tr');
										tr.innerHTML = '<td style="text-align: center; "><label id="label" >№</label> <input type="text" class="form-control" style="text-align: center;"   id="inputt1"></td><td ><label id="label" >Назва навчальної дисципліни</label><input  type="text" class="form-control" style="text-align: center; "   id="inputt2"> </td><td class="actions" style="text-align: center;" ><label id="label" >Оцінка</label> <input type="text" class="form-control" style="text-align: center;"   id="inputt3"></td>';
										elemp.append(tr);
										break;
									}
								}

							function buton33() {
								let inputt2 = document.getElementById("inputt2").value;
								let inputt3 = document.getElementById("inputt3").value;
								let fun = 4;

								let student = <?= $id_Students ?>;
								if (inputt3 == "" && inputt2 == "") {
									alert("Не все поля заповнено")
								} else {
									jQuery.ajax({
										url: "vendor/but.php",
										type: "POST",
										data: {

											inputt2: inputt2,
											inputt3: inputt3,
											student: student,
											fun: fun

										},
										success: function () {
											alert("Дані успішно записані");

										},
										error: function () {
											alert("Нет");
										}
									});
									document.getElementById("buton11").style.visibility = "visible";
									document.getElementById("buton33").style.visibility = "hidden";
									window.location.reload();
								}

							}
						</script>



						</tbody>
						</table>

					</div>
				</section>
				<div style="text-align: end;  margin-top: 6px;">
					<button class="ButKurse butt" onclick="allbut()">Зберегти</button>
				</div>
				<!-- start: page -->

		</div>

		<script>

		</script>
	</section>

	<script>
		window.onload = function () {
			document.getElementById("butt3").style.visibility = "hidden";
			document.getElementById("buton33").style.visibility = "hidden";
			document.getElementById("buton333").style.visibility = "hidden";
			<?php
			$Student1 = $connect->query("SELECT * FROM `orders` WHERE `id_Students`=$id_Students ORDER BY `id_Orders` ASC");
			while ($row = $Student1->fetch_assoc()) {
				?>
				document.getElementById("save<?= $row["id_Orders"] ?>").style.visibility = "hidden";
				<?php
			}
			?>
			<?php
			$Students1 = $connect->query("SELECT * FROM `certification` WHERE `id_Students`=$id_Students");
			while ($row = $Students1->fetch_assoc()) {
				?>
				document.getElementById("savecertification<?= $row["id_certification"] ?>").style.visibility = "hidden";
				<?php
			}
			?>
			<?php
			$Studentss1 = $connect->query("SELECT * FROM `practice` WHERE `id_Students`=$id_Students");

			while ($row = $Studentss1->fetch_assoc()) {

				?>
				document.getElementById("savepractice" + <?= $row["id_practice"] ?>).style.visibility = "hidden";
				<?php
			}
			?>


		}

		function pencil(id) {

			document.getElementById("save" + id).style.visibility = "visible";
			document.getElementById("pencil" + id).style.visibility = "hidden";
			document.getElementById("trash" + id).style.visibility = "hidden";
			document.getElementById("kurse" + id).readOnly = false;
			document.getElementById("data" + id).readOnly = false;
			document.getElementById("text" + id).readOnly = false;

		}

		function trash(id) {
			let fun = 3;
			result = confirm("Ви дійсно хочете видалити запис?");
			if (result) {
				jQuery.ajax({
					url: "vendor/but.php",
					type: "POST",
					data: {
						id: id,
						fun: fun
					},
					success: function () {
						alert("Запис був успішно видаленний");
					},
					error: function () {
						alert("Помилка");
					}
				});
				window.location.reload();
			}
		}

		function save(id) {

			let fun = 2;
			let kurse = document.getElementById("kurse" + id).value;
			let data = document.getElementById("data" + id).value;
			let text = document.getElementById("text" + id).value;
			jQuery.ajax({
				url: "vendor/but.php",
				type: "POST",
				data: {
					id: id,
					fun: fun,
					kurse: kurse,
					data: data,
					text: text
				},
				success: function () {
					alert("Запис був успішно оновлено");
				},
				error: function () {
					alert("Помилка");
				}
			});
			window.location.reload();
		}

		function pencilcertification(id) {

			document.getElementById("savecertification" + id).style.visibility = "visible";
			document.getElementById("pencilcertification" + id).style.visibility = "hidden";
			document.getElementById("trashcertification" + id).style.visibility = "hidden";
			document.getElementById("name" + id).readOnly = false;
			document.getElementById("rating" + id).readOnly = false;

		}

		function trashcertification(id) {
			let fun = 5;
			result = confirm("Ви дійсно хочете видалити запис?");
			if (result) {
				jQuery.ajax({
					url: "vendor/but.php",
					type: "POST",
					data: {
						id: id,
						fun: fun
					},
					success: function () {
						alert("Запис був успішно видаленний");
					},
					error: function () {
						alert("Помилка");
					}
				});
				window.location.reload();
			}
		}

		function savecertification(id) {

			let fun = 6;
			let name = document.getElementById("name" + id).value;
			let rating = document.getElementById("rating" + id).value;

			jQuery.ajax({
				url: "vendor/but.php",
				type: "POST",
				data: {
					id: id,
					fun: fun,
					name: name,
					rating: rating
				},
				success: function () {
					alert("Запис був успішно оновлено");
				},
				error: function () {
					alert("Помилка");
				}
			});
			window.location.reload();
		}

		function pencilpractice(id) {

			document.getElementById("savepractice" + id).style.visibility = "visible";
			document.getElementById("pencilpractice" + id).style.visibility = "hidden";
			document.getElementById("trashpractice" + id).style.visibility = "hidden";
			document.getElementById("int" + id).readOnly = false;
			document.getElementById("namee" + id).readOnly = false;
			document.getElementById("id_semestr" + id).readOnly = false;
			document.getElementById("id_kurse" + id).readOnly = false;
			document.getElementById("beginning" + id).readOnly = false;
			document.getElementById("end" + id).readOnly = false;
			document.getElementById("hourr" + id).readOnly = false;
			document.getElementById("nameteacher" + id).readOnly = false;
			document.getElementById("ratingg" + id).readOnly = false;
			document.getElementById("dateee" + id).readOnly = false;
		}

		function trashpractice(id) {
			let fun = 7;
			result = confirm("Ви дійсно хочете видалити запис?");
			if (result) {
				jQuery.ajax({
					url: "vendor/but.php",
					type: "POST",
					data: {
						id: id,
						fun: fun
					},
					success: function () {
						alert("Запис був успішно видаленний");
					},
					error: function () {
						alert("Помилка");
					}
				});
				window.location.reload();
			}
		}

		function savepractice(id) {

			let fun = 8;
			let student = <?= $id_Students ?>;
			let namee = document.getElementById("namee" + id).value;
			let id_semestr = document.getElementById("id_semestr" + id).value;
			let id_kurse = document.getElementById("id_kurse" + id).value;
			let beginning = document.getElementById("beginning" + id).value;
			let end = document.getElementById("end" + id).value;
			let hourr = document.getElementById("hourr" + id).value;
			let nameteacher = document.getElementById("nameteacher" + id).value;
			let ratingg = document.getElementById("ratingg" + id).value;
			let dateee = document.getElementById("dateee" + id).value;
			jQuery.ajax({
				url: "vendor/but.php",
				type: "POST",
				data: {
					id: id,
					fun: fun,
					namee: namee,
					id_semestr: id_semestr,
					id_kurse: id_kurse,
					beginning: beginning,
					end: end,
					hourr: hourr,
					nameteacher: nameteacher,
					ratingg: ratingg,
					dateee: dateee,
					student: student
				},
				success: function () {
					alert("Запис був успішно оновлено");
				},
				error: function () {
					alert("Помилка");
				}
			});
			window.location.reload();
		}
		function sumer() {
			let rating0 = document.getElementById("ratingall");
			let Rating1 = Number(document.getElementById("RatingExcellent").value);
			let Rating2 = Number(document.getElementById("RatingGood").value);
			let Rating3 = Number(document.getElementById("RatingSatisfactory").value);
			if (Rating1 == "" && Rating2 == "" && Rating3 == "") {
				alert("Не всі поля заповнено");
			}
			else {
				let sum = Rating1 + Rating2 + Rating3;
				rating0.value = sum;
			}

		}
		function allbut() {
			let student = <?= $id_Students ?>;
			let fun = 10;
			let fullname = document.getElementById("fullname").value;
			let birthdata = document.getElementById("birthdata").value;
			let place_of_birth = document.getElementById("place_of_birth").value;
			let adress = document.getElementById("adress").value;
			let reckoned = document.getElementById("reckoned").value;
			let groups = document.getElementById("groups").value;
			let Start_learning = document.getElementById("Start_learning").value;
			let graduation = document.getElementById("graduation").value;
			let Form_of_study = document.getElementById("Form_of_study").value;
			let Department = document.getElementById("Department").value;
			let Degree = document.getElementById("Degree").value;
			let Branch_of_knowledge = document.getElementById("Branch_of_knowledge").value;
			let Specialty = document.getElementById("Specialty").value;
			let program = document.getElementById("program").value;
			let ratingall = document.getElementById("ratingall").value;
			let RatingExcellent = document.getElementById("RatingExcellent").value;
			let RatingGood = document.getElementById("RatingGood").value;
			let RatingSatisfactory = document.getElementById("RatingSatisfactory").value;
			let DiplomTopic = document.getElementById("DiplomTopic").value;
			let DiplomGrade = document.getElementById("DiplomGrade").value;
			let Qualification = document.getElementById("Qualification").value;
			let Qualificationdata = document.getElementById("Qualificationdata").value;

			jQuery.ajax({
				url: "vendor/but1.php",
				type: "POST",
				data: {
					fun: fun,
					fullname: fullname,
					birthdata: birthdata,
					place_of_birth: place_of_birth,
					adress: adress,
					reckoned: reckoned,
					groups: groups,
					Start_learning: Start_learning,
					graduation: graduation,
					Form_of_study: Form_of_study,
					Department: Department,
					Degree: Degree,
					Branch_of_knowledge: Branch_of_knowledge,
					Specialty: Specialty,
					program: program,
					ratingall: ratingall,
					RatingExcellent: RatingExcellent,
					RatingGood: RatingGood,
					RatingSatisfactory: RatingSatisfactory,
					DiplomTopic: DiplomTopic,
					DiplomGrade: DiplomGrade,
					Qualification: Qualification,
					Qualificationdata: Qualificationdata,
					student: student
				},
				success: function () {
					alert("Запис був успішно оновлено");
				},
				error: function () {
					alert("Помилка");
				}
			});
			window.location.reload();
		}
	</script>
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