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
                    <i class="fa fa-bars" aria-label="Toggle sidebar" style="padding-top: 8px;"></i>
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
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Меню
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                        data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="/profileAdmin.php">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Головна сторінка</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-align-left" aria-hidden="true"></i>
                                        <span>Студенти</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>1 Курс</a>
                                            <ul class="nav nav-children kurse1">
                                                <script>
                                                    <?php
                                                    //Четвертий курс
                                                    $Kyrse1 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 1");
                                                    while ($row = $Kyrse1->fetch_assoc()) {
                                                        ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse1");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                            <?php
                                                    }
                                                    ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>2 Курс</a>
                                            <ul class="nav nav-children kurse2">
                                                <script>
                                                        <?php
                                                        //Четвертий курс
                                                        $Kyrse2 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 2");
                                                        while ($row = $Kyrse2->fetch_assoc()) {
                                                            ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse2");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                            <?php
                                                        }
                                                        ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>3 Курс</a>
                                            <ul class="nav nav-children kurse3">
                                                <script>
                                                        <?php
                                                        //Четвертий курс
                                                        $Kyrse3 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 3");
                                                        while ($row = $Kyrse3->fetch_assoc()) {
                                                            ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse3");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                            <?php
                                                        }
                                                        ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a>4 Курс</a>
                                            <ul class="nav nav-children kurse4">
                                                <script>
                                                        <?php
                                                        //Четвертий курс
                                                        $Kyrse4 = $connect->query("SELECT * FROM `groups` WHERE `id_kurse` = 4");
                                                        while ($row = $Kyrse4->fetch_assoc()) {
                                                            ?>
                                                        for (let h = 0; h < 1; h++) {
                                                            let elemp = document.querySelector(".kurse4");
                                                            let li = document.createElement('li');
                                                            let form = document.createElement('form');
                                                            form.classList.add('ClassForm');
                                                            form.classList.add('ClassForm:hover');
                                                            form.innerHTML = "<button style='border:none; background: none; color: fff; width: 100%;'><p ><?= $row["name"] ?></p> <input type='hidden' name='perem' value='<?= $row["id_ group"] ?>'></button>";
                                                            form.setAttribute("method", "get");
                                                            form.setAttribute("action", "/groupstudent.php");

                                                            li.append(form);
                                                            elemp.append(li);
                                                            break;
                                                        }
                                                            <?php
                                                        }
                                                        ?>
                                                </script>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="not_translated.php?perem=5">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        <span>Не переведенні</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Graduates.php?perem=6">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        <span>Випускники</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="settings.php">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>
                                        <span>Налаштування</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <hr class="separator" />



                        <hr class="separator" />


                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body transition-fade" id="swup">
                <header class="page-header">
                    <h2>Машинобудівний коледж СумДУ</h2>


                </header>


                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Перевести
                            <?= $nameGroup ?>
                        </h2>
                    </header>
                    <div class="panel-body">

                        <table class="table table-bordered table-striped mb-none">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th style="text-align: center;">ПІБ</th>

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
                                            tr.innerHTML = '<td style="text-align: center;"> <input type="checkbox" name="student" value="<?= $row["id_Students"] ?>" checked></td>  <td>  <a href="/student.php?id=<?= $row["id_Students"] ?>" style="padding-top: 1%;padding-bottom: 1%;padding-right: 50%;color: #777;"><?= $row["fullname"] ?></a></td> ';
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
                                    <select name="select" id="sel">
                                        <script>
                                                <?php

                                                $Student7 = $connect->query("SELECT * FROM `groups` WHERE  `id_ group`!=12 and `id_ group`!=13 ORDER by `name`");
                                                while ($row = $Student7->fetch_assoc()) {
                                                    ?>
                                                for (let t = 0; t < 5; t++) {
                                                    let elemp = document.getElementById("sel");
                                                    let tr = document.createElement("Option");
                                                    tr.id = <?= $row["id_ group"] ?>;

                                                    tr.innerHTML = '<?= $row["name"] ?>';
                                                    elemp.append(tr);
                                                    break;
                                                }
                                                <?php
                                                }
                                                ?>
                                        </script>
                                    </select>
                                    <button class="btn btn-primary " id="but">Перевести групу<i
                                            class="fa fa-cog fa-spin fa-1x fa-fw"></i></button>
                                    <script>
                                        document.getElementById("but").onclick = function () {

                                            <?php
                                            $Student = $connect->query("SELECT `id_kurse` FROM `groups` WHERE `id_ group` = $kursePerem");

                                            while ($row = $Student->fetch_assoc()) {
                                                $group = $row["id_kurse"];
                                            }
                                            ?>
                                            let valr = <?= $group ?>;
                                            if (valr == 4) {
                                                var mark = document.getElementsByName("student");
                                                for (var checkbox of mark) {
                                                    if (checkbox.checked) {

                                                        jQuery.ajax({
                                                            url: "checform.php",
                                                            type: "POST",
                                                            data: {
                                                                id_Subjects: checkbox.value
                                                            },
                                                            success: function () {

                                                            },
                                                            error: function () {
                                                                alert("Нет");
                                                            }
                                                        });
                                                    } else {

                                                        jQuery.ajax({
                                                            url: "checform.php",
                                                            type: "POST",
                                                            data: {
                                                                id_Subjectsnot: checkbox.value

                                                            },
                                                            success: function () {

                                                            },
                                                            error: function () {
                                                                alert("Нет");
                                                            }
                                                        });

                                                    }


                                                }
                                                alert("Група успішно переведена");
                                                window.location.reload();
                                            }

                                            else {


                                                var ops = document.getElementById("sel").value;
                                                result = prompt("Ви хочете перевести групу до ", ops);

                                                if (result) {
                                                    var mark = document.getElementsByName("student");
                                                    for (var checkbox of mark) {
                                                        if (checkbox.checked) {

                                                            jQuery.ajax({
                                                                url: "checform2.php",
                                                                type: "POST",
                                                                data: {
                                                                    id_Subjects: checkbox.value,
                                                                    result: ops


                                                                },
                                                                success: function () {

                                                                },
                                                                error: function () {
                                                                    alert("Нет");
                                                                }
                                                            });
                                                        } else {

                                                            jQuery.ajax({
                                                                url: "checform2.php",
                                                                type: "POST",
                                                                data: {
                                                                    id_Subjectsnot: checkbox.value,
                                                                    result: ops

                                                                },
                                                                success: function () {

                                                                },
                                                                error: function () {
                                                                    alert("Нет");
                                                                }
                                                            });
                                                        }
                                                    }
                                                    alert("Група успішно переведена");
                                                    window.location.reload();
                                                } else {
                                                    alert("Група не була переведена");
                                                }


                                            }


                                        }
                                    </script>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- start: page -->

        </div>

        <script>
            window.onload = function () {
                <?php
                $Students = $connect->query("SELECT `id_kurse` FROM `groups` WHERE `id_ group` = $kursePerem");

                while ($row = $Students->fetch_assoc()) {
                    $group = $row["id_kurse"];
                }
                ?>
                let valr1 = <?= $group ?>;
                if (valr1 == 4) {

                    document.getElementById("sel").style.visibility = "hidden";
                } else {
                    document.getElementById("sel").style.visibility = "visible";
                    //document.getElementById('but').setAttribute('disabled', true);
                }

            }
        </script>
    </section>

    <!-- Vendor -->
    <?php include 'component/scripts.php'; ?>
</body>

</html>