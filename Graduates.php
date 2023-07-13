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
                    <h2>Машинобудівний коледж СумДУ</h2>


                </header>


                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Випускники <br><br><button class="btn btn-primary " onclick="trach()"
                                id="but">Видалити усіх</button></h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped mb-none">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">№</th>
                                    <th style="text-align: center;">ПІБ</th>

                                    <th style="text-align: center;">Група</th>

                                </tr>
                            </thead>
                            <tbody id="Table">

                                <script>
                                    <?php
                                    $Student = $connect->query("SELECT `id_Students`,`fullname`,`groups` FROM `students` WHERE `id_ group`=13 order BY `fullname`");
                                    $num = 1;
                                    while ($row = $Student->fetch_assoc()) {

                                        ?>
                                        for (let h = 0; h < 1; h++) {
                                            let elemp = document.getElementById("Table");
                                            let tr = document.createElement('tr');
                                            tr.innerHTML = '<td style="text-align: center; width: 5%;"> <?= $num ?></td><td> <a href="/student.php?id=<?= $row["id_Students"] ?>" style="padding-top: 1%;padding-bottom: 1%;padding-right: 50%;color: #777;"><?= $row["fullname"] ?></a></td>           <td class="actions" style="text-align: center;"><?= $row["groups"] ?></td> ';
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
                <!-- start: page -->

        </div>

        <script>
                function trach() {
                    var fun = 22;
                    if (confirm("Ви хочете видалити усіх студентів ?") == true) {
                        <?php
                        $Student = $connect->query("SELECT `id_Students`,`fullname`,`groups` FROM `students` WHERE `id_ group`=13 order BY `fullname`");
                        while ($row = $Student->fetch_assoc()) {
                            ?>
                            var stu = <?= $row["id_Students"] ?>



                            jQuery.ajax({
                                url: "Recover.php",
                                type: "POST",
                                data: {
                                    stu: stu,
                                    fun: fun
                                },
                                success: function () {

                                },
                                error: function () {
                                    alert("Помилка");
                                }
                            });
                            <?php
                        }
                        ?>
                        alert("Усіх студентів було успішно видалено");
                        window.location.reload();
                    }
                }
        </script>
    </section>

    <?php include 'component/scripts.php'; ?>
</body>

</html>