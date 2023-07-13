<?php
include 'vendor/connect.php';
include 'component/link.php';

if (!$_SESSION['user']) {
    header('Location: /');
}
if ($_SESSION['user']['SuperAdmin'] != 0) {
    $adminName = "Суперадміністратор";
} else {
    $adminName = "Адміністратор";
}




if (isset($_GET["perem"])) {
    $kursePerem = $_GET["perem"];
    $KyrsePanel4 = $connect->query("SELECT * FROM `groups` WHERE `id_ group` =$kursePerem");
    while ($row = $KyrsePanel4->fetch_assoc()) {
        $nameGroup = $row["name"];
        $nameSpesh = $row["Identifier"];
    }
} else {
    //header('Location: index.php');
}
?>

<!doctype html>
<html class="fixed">

<head>

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
            width: 260px;
        }

        @media screen and (max-width:550px) {
            .ButKurse {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 8px;
                padding-top: 12px;
                padding-bottom: 16px;
                border-radius: 5px;

                width: 130px;
            }
        }

        .ButKurse1 {
            border: none;
            background: #0088cc;
            color: white;
            font-size: 18px;
            padding-top: 6px;
            padding-bottom: 6px;
            border-radius: 5px;
            margin-right: 10px;
            width: 120px;
        }

        @media screen and (max-width:561px) {
            .ButKurse1 {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 8px;
                padding-top: 6px;
                padding-bottom: 6px;
                border-radius: 5px;

                width: 60px;
            }
        }

        @media screen and (max-width:890px) and (min-width:500px) {
            .ButKurse {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 10px;
                padding-top: 12px;
                padding-bottom: 16px;
                border-radius: 5px;

                width: 160px;
            }
        }

        @media screen and (max-width:950px) and (min-width:770px) {
            .ButKurse1 {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 13px;
                padding-top: 6px;
                padding-bottom: 6px;
                border-radius: 5px;

                width: 75px;
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
                <header class="page-header">
                    <a href="/settings.php"><button class="ButKurse" id="but">Налаштування груп <i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/settings.php"> <button class="ButKurse" id="but">Налаштування предметів<i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>


                </header>


                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Налаштування</h2>
                    </header>
                    <a href="/settings1.php"> <button class="ButKurse1" id="but">1 курс<i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/settings2.php"> <button class="ButKurse1" id="but">2 курс<i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/settings3.php"> <button class="ButKurse1" id="but">3 курс<i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/settings4.php"> <button class="ButKurse1" id="but">4 курс<i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped mb-none  resp-tab">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">№</th>
                                    <th style="text-align: center;">Назва предмету</th>
                                    <th style="text-align: center; width: 10%;">Група</th>
                                    <th style="text-align: center; width: 10%;">Семестр</th>
                                    <th style="text-align: center; width: 10%;">Години</th>
                                    <th style="text-align: center; width: 10%;">Кредити</th>
                                    <th style="text-align: center;">Вчитель</th>
                                    <th style="text-align: center;">Дії</th>
                                </tr>
                            </thead>
                            <tbody id="Table">


                                <script>
                                    <?php
                                    $Student = $connect->query("SELECT t.`id_ group`, t.`name`,tn.`name` as 'nameSub',tn.`id_Subjects`,tn.`hour`,tn.`ESTS`,tn.`Teacher`,tn.`id_semestr` FROM `groups`t, `subjects`tn WHERE t.`id_kurse`=4 and t.`id_ group`=tn.`id_ group` ORDER BY `id_semestr`");
                                    $num = 1;
                                    while ($row = $Student->fetch_assoc()) {

                                        ?>
                                        for (let h = 0; h < 1; h++) {
                                            let elemp = document.getElementById("Table");
                                            let tr = document.createElement('tr');
                                            tr.innerHTML = '<td id="idd" style="text-align: center; "> <?= $num ?><input type="hidden" id="idgroup<?= $row["id_Subjects"] ?>" value="<?= $row["id_ group"] ?>"> </td><td ><label id="label" >Назва предмету</label><input style="text-align: center;" class="form-control"  id="nameSub<?= $row["id_Subjects"] ?>" value="<?= $row["nameSub"] ?>" readonly> </td> <td ><label id="label" >Група</label><input style="text-align: center;" class="form-control"  id="group<?= $row["id_Subjects"] ?>" value="<?= $row["name"] ?>" readonly> </td> <td ><label id="label" >Семестр</label><input style="text-align: center;" class="form-control"  id="semestr<?= $row["id_Subjects"] ?>" value="<?= $row["id_semestr"] ?>" readonly> </td> <td ><label id="label" >Години</label><input style="text-align: center;" class="form-control"  id="hour<?= $row["id_Subjects"] ?>" value="<?= $row["hour"] ?>" readonly> </td> <td ><label id="label" >Кредити</label><input style="text-align: center;" class="form-control"  id="ESTS<?= $row["id_Subjects"] ?>" value="<?= $row["ESTS"] ?>" readonly> </td> <td ><label id="label" >Вчитель</label><input style="text-align: center;" class="form-control"  id="Teacher<?= $row["id_Subjects"] ?>" value="<?= $row["Teacher"] ?>" readonly> </td> <td id="idd1" class="actions" style="text-align: center;"><i style="cursor: pointer;" class="fa fa-pencil" onclick = "pencil(<?= $row["id_Subjects"] ?>)" id="pencil<?= $row["id_Subjects"] ?>"></i> <i style="cursor: pointer;" class="fa fa-trash-o" id="trash<?= $row["id_Subjects"] ?>" onclick = "trach(<?= $row["id_Subjects"] ?>)"></i> <i style="cursor: pointer;" class="fa fa-save" onclick="save(<?= $row["id_Subjects"] ?>)" id="save<?= $row["id_Subjects"] ?>">  </i></td> ';
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

                    </div>
                </section>
                <button class="btn btn-primary " onclick="buton33()" id="buton33">Змінити <i
                        class="fa fa-pencil"></i></button>

                <button class="btn btn-primary " onclick="buton11()" id="buton11">Додати <i
                        class="fa fa-plus"></i></button>
                <!-- start: page -->

        </div>
        <script>
                window.onload = function() {
                    document.getElementById("buton33").style.visibility = "hidden";
                    <?php
                    $Studentt1 = $connect->query("SELECT t.`id_ group`, t.`name`,tn.`name` as 'nameSub',tn.`id_Subjects`,tn.`hour`,tn.`ESTS`,tn.`Teacher`,tn.`id_semestr` FROM `groups`t, `subjects`tn WHERE t.`id_kurse`=4 and t.`id_ group`=tn.`id_ group` ORDER BY `id_semestr`");
                    while ($row = $Studentt1->fetch_assoc()) {
                        ?>
                        document.getElementById("save<?= $row["id_Subjects"] ?>").style.visibility = "hidden";
                        <?php
                    }
                    ?>
                }

            function buton11() {
                document.getElementById("buton11").style.visibility = "hidden";
                document.getElementById("buton33").style.visibility = "visible";

                for (let h = 0; h < 1; h++) {
                    let elemp = document.getElementById("Table");

                    let tr = document.createElement('tr');
                    tr.innerHTML = '<td id="idd" style="text-align: center; "> <?= $num ?></td><td ><label id="label" >Назва предмету</label><input style="text-align: center;" class="form-control"  id="nameSub"  > </td> <td ><label id="label" >Група</label><input style="text-align: center;" class="form-control"  id="group" > </td> <td ><label id="label" >Семестр</label><input style="text-align: center;" class="form-control"  id="semestr"  > </td> <td ><label id="label" >Години</label><input style="text-align: center;" class="form-control"  id="hour"  > </td> <td ><label id="label" >Кредити</label><input style="text-align: center;" class="form-control"  id="ESTS"  > </td> <td ><label id="label" >Вчитель</label><input style="text-align: center;" class="form-control"  id="Teacher"  > </td> ';
                    elemp.append(tr);
                    break;
                }
            }

            function pencil(id) {
                document.getElementById("save" + id).style.visibility = "visible";
                document.getElementById("pencil" + id).style.visibility = "hidden";
                document.getElementById("trash" + id).style.visibility = "hidden";
                document.getElementById("nameSub" + id).readOnly = false;
                document.getElementById("group" + id).readOnly = false;
                document.getElementById("semestr" + id).readOnly = false;
                document.getElementById("hour" + id).readOnly = false;
                document.getElementById("ESTS" + id).readOnly = false;
                document.getElementById("Teacher" + id).readOnly = false;


            }

            function save(id) {
                var nameSub = document.getElementById("nameSub" + id).value;
                var nameSub = document.getElementById("nameSub" + id).value;
                var group = document.getElementById("group" + id).value;
                var semestr = document.getElementById("semestr" + id).value;
                var hour = document.getElementById("hour" + id).value;
                var ESTSr = document.getElementById("ESTS" + id).value;
                var Teacher = document.getElementById("Teacher" + id).value;

                var stu = id;
                var fun = 5;

                if (semestr == 7 || semestr == 8) {
                    if (confirm("Ви хочете змінити назву предмета ?") == true) {

                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {
                                stu: stu,
                                fun: fun,
                                nameSub: nameSub,
                                group: group,
                                semestr: semestr,
                                hour: hour,
                                ESTSr: ESTSr,
                                Teacher: Teacher
                            },
                            success: function () {
                                alert("Назву було успішно змінено");

                            },
                            error: function () {
                                alert("Помилка");
                            }
                        });
                        window.location.reload();
                    }
                } else {
                    alert("Семестр повинен бути або 7 або 8, відповідно до курсу");
                }
            }

            function trach(id) {
                var fun = 6;
                var stu = id;
                if (confirm("Ви хочете видалити предмет?") == true) {
                    if (confirm("!!!!Ви точно хочете видалити предмет?!!!!") == true) {
                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {
                                stu: stu,
                                fun: fun
                            },
                            success: function () {
                                alert("Предмет було видалено");
                            },
                            error: function () {
                                alert("Помилка");
                            }
                        });
                        window.location.reload();
                    }
                }
            }

            function buton33() {
                var nameSub = document.getElementById("nameSub").value;
                var group = document.getElementById("group").value;
                var semestr = document.getElementById("semestr").value;
                var hour = document.getElementById("hour").value;
                var ESTSr = document.getElementById("ESTS").value;
                var Teacher = document.getElementById("Teacher").value;
                let fun = 7;
                if (semestr == 7 || semestr == 8) {
                    if (nameSub == "" && group == "" && semestr == "" && hour == "" && ESTSr == "" && Teacher == "") {
                        alert("Не все поля заповнено")
                    } else {
                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {

                                fun: fun,
                                nameSub: nameSub,
                                group: group,
                                semestr: semestr,
                                hour: hour,
                                ESTSr: ESTSr,
                                Teacher: Teacher

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
                } else {
                    alert("Семестр повинен бути або 7 або 8, відповідно до курсу");
                }
            }
        </script>

    </section>

    <!-- Vendor -->
    <?php include 'component/scripts.php'; ?>
</body>

</html>