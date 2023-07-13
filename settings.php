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
            width: 270px;
        }

        @media screen and (max-width:550px) {
            .ButKurse {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 9px;
                padding-top: 12px;
                padding-bottom: 16px;
                border-radius: 5px;

                width: 140px;
            }
        }

        @media screen and (max-width:870px) and (min-width:500px) {
            .ButKurse {
                border: none;
                background: #0088cc;
                color: white;
                font-size: 9px;
                padding-top: 12px;
                padding-bottom: 16px;
                border-radius: 5px;

                width: 160px;
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

            <section role="main" class="content-body transition-fade" id="swup">
                <header class="page-header">
                    <a href="/settings.php"><button class="ButKurse" id="but">Налаштування груп <i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>
                    <a href="/settings1.php"> <button class="ButKurse" id="but">Налаштування предметів<i
                                class="fa fa-cog fa-spin fa-1x fa-fw"></i></button></a>


                </header>


                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Налаштування</h2>
                    </header>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped mb-none">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">№</th>
                                    <th style="text-align: center;">Назва групи</th>
                                    <th style="text-align: center;">Курс</th>
                                    <th style="text-align: center;">Дії</th>
                                </tr>
                            </thead>
                            <tbody id="Table">

                                <script>
                                    <?php
                                    $Student = $connect->query("SELECT * FROM `groups` WHERE `id_ group` != 12 and `id_ group` != 13 ORDER by `name`");
                                    $num = 1;
                                    while ($row = $Student->fetch_assoc()) {

                                        ?>
                                        for (let h = 0; h < 1; h++) {
                                            let elemp = document.getElementById("Table");
                                            let tr = document.createElement('tr');
                                            tr.innerHTML = '<td style="text-align: center; width: 5%;"> <?= $num ?></td><td ><input class="form-control"  id="name<?= $row["id_ group"] ?>" value="<?= $row["name"] ?>" readonly> </td><td style="width: 20%;   "><input style="text-align: center;" class="form-control"  id="kurse<?= $row["id_ group"] ?>" value="<?= $row["id_kurse"] ?>" readonly> </td> <td class="actions" style="text-align: center;"><i class="fa fa-pencil" onclick = "pencil(<?= $row["id_ group"] ?>)" id="pencil<?= $row["id_ group"] ?>"></i> <i class="fa fa-trash-o" id="trash<?= $row["id_ group"] ?>" onclick = "trach(<?= $row["id_ group"] ?>)"></i> <i class="fa fa-save" onclick="save(<?= $row["id_ group"] ?>)" id="save<?= $row["id_ group"] ?>">  </i></td> ';
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
                    $Studentt1 = $connect->query("SELECT * FROM `groups` WHERE `id_ group` != 12 and `id_ group` != 13");
                    while ($row = $Studentt1->fetch_assoc()) {
                        ?>
                        document.getElementById("save<?= $row["id_ group"] ?>").style.visibility = "hidden";
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
                    tr.innerHTML = '<td style="text-align: center; width: 5%;"> </td><td ><input class="form-control"  id="name" > </td> <td class="actions" style="text-align: center;"><input style="text-align: center;" class="form-control"  id="kurse" ></td><td class="actions" style="text-align: center;"></td>';
                    elemp.append(tr);
                    break;
                }
            }

            function pencil(id) {
                document.getElementById("save" + id).style.visibility = "visible";
                document.getElementById("pencil" + id).style.visibility = "hidden";
                document.getElementById("trash" + id).style.visibility = "hidden";
                document.getElementById("name" + id).readOnly = false;
                //Yfdocument.getElementById("kurse" + id).readOnly = false;


            }

            function save(id) {
                var name = document.getElementById("name" + id).value;

                var stu = id;
                var fun = 1;

                if (confirm("Ви хочете змінити назву групи ?") == true) {

                    jQuery.ajax({
                        url: "vendor/settingbut.php",
                        type: "POST",
                        data: {
                            stu: stu,
                            fun: fun,
                            name: name
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
            }

            function trach(id) {
                var fun = 2;
                var stu = id;
                if (confirm("Ви хочете видалити групу?") == true) {
                    if (confirm("!!!!Ви точно хочете видалити групу?!!!!") == true) {
                        jQuery.ajax({
                            url: "vendor/settingbut.php",
                            type: "POST",
                            data: {
                                stu: stu,
                                fun: fun
                            },
                            success: function () {
                                alert("Групу було видалено");
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
                var name = document.getElementById("name").value;
                var kurse = document.getElementById("kurse").value;
                let fun = 3;
                if (name == "" && kurse == "") {
                    alert("Не все поля заповнено")
                } else {
                    jQuery.ajax({
                        url: "vendor/settingbut.php",
                        type: "POST",
                        data: {

                            name: name,
                            kurse: kurse,
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

    </section>

    <!-- Vendor -->
    <?php include 'component/scripts.php'; ?>
</body>

</html>