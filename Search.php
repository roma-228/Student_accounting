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
        <header class="header">
            <div class="logo-container">
                <a class="logo">
                    <img src="assets/images/logo.png" height="35" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">
                <?php $Search = $_GET['q']; ?>
                <form action="Search.php" method="GET" class="search nav-form">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Пошук">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>





                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="assets/images/!logged-user.jpg" class="img-circle"
                                data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info">
                            <span class="name">
                                <?= $_SESSION['user']['full_name'] ?>
                            </span>
                            <span class="role">
                                <?= $adminName ?>
                            </span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>


                            <li>
                                <a role="menuitem" tabindex="-1" href="/vendor/logout.php"><i
                                        class="fa fa-power-off"></i> Вийти</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
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
                                    <th style="text-align: center;">Група</th>

                                </tr>
                            </thead>
                            <tbody id="Table">

                                <script>
                                    <?php
                                    $Student = $connect->query(" SELECT `fullname`,`id_Students`,`groups` FROM `students` WHERE `fullname` like '%$Search%' or `groups` LIKE '%$Search%' ORDER BY `fullname` ASC");
                                    $num = 1;
                                    while ($row = $Student->fetch_assoc()) {

                                        ?>
                                        for (let h = 0; h < 1; h++) {
                                            let elemp = document.getElementById("Table");
                                            let tr = document.createElement('tr');
                                            tr.innerHTML = '<td style="text-align: center; width: 5%;"> <?= $num ?></td><td> <a href="/student.php?id=<?= $row["id_Students"] ?>" style="padding-top: 1%;padding-bottom: 1%;padding-right: 50%;color: #777;"><?= $row["fullname"] ?></a></td><td style="text-align: center; width: 10%;"> <?= $row["groups"] ?></td>';
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

    <!-- Vendor -->
    <?php include 'component/scripts.php'; ?>
</body>

</html>