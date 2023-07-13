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

        @media screen and (max-width:508px) {
            #but {
                margin-top: 10px;
            }
        }

        @media screen and (max-width:858px) and (min-width:770px) {
            #but {
                margin-top: 10px;
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
                    <h2>Машинобудівний коледж СумДУ</h2>


                </header>


                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">
                            <?= $nameGroup ?>
                        </h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped mb-none">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">№</th>
                                    <th style="text-align: center;">ПІБ</th>
                                    <th style="width: 15%;text-align: center;">Дії</th>
                                </tr>
                            </thead>
                            <tbody id="Table">

                                <script>
                                    <?php
                                    $Student = $connect->query("SELECT `fullname`,`id_Students` FROM `students` WHERE `id_ group` =$kursePerem ORDER BY `fullname` ASC");
                                    $num = 1;
                                    while ($row = $Student->fetch_assoc()) {

                                        ?>
                                        for (let h = 0; h < 1; h++) {
                                            let elemp = document.getElementById("Table");
                                            let tr = document.createElement('tr');
                                            tr.innerHTML = '<td style="text-align: center; width: 5%;"> <?= $num ?></td><td> <a href="/student.php?id=<?= $row["id_Students"] ?>" style="padding-top: 1%;padding-bottom: 1%;padding-right: 50%;color: #777;"><?= $row["fullname"] ?></a></td><td class="actions" style="text-align: center;"><i class="fa fa-trash-o" onclick = "trach(<?= $row["id_Students"] ?>)"></i> </td>';
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
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-sm-6" style="width: 100%;">
                                <div class="mb-md" style="text-align: right;">
                                    <a href="/Transfer.php?perem=<?= $kursePerem ?>" class="btn btn-primary">Перевести
                                        групу на інший курс <i class="fa fa-cog fa-spin fa-1x fa-fw"></i></a>
                                    <a href="/addstudent.php?perem=<?= $kursePerem ?>" class="btn btn-primary"
                                        id="but">Додати нового студента <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- start: page -->

        </div>

        <script>
                function trach(students) {
                    var fun = 22;
                    var stu = students;
                    if (confirm("Ви хочете видалити студента ?") == true) {
                        jQuery.ajax({
                            url: "Recover.php",
                            type: "POST",
                            data: {
                                stu: stu,
                                fun: fun
                            },
                            success: function () {
                                alert("Студента було видалено");
                            },
                            error: function () {
                                alert("Помилка");
                            }
                        });
                        window.location.reload();
                    }
                }
        </script>
    </section>

    <?php include 'component/scripts.php'; ?>
</body>

</html>