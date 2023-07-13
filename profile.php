<?php
include 'vendor/connect.php';

if (!$_SESSION['user']) {
    header('Location: index.php');
}
if ($_SESSION['user']['SuperAdmin'] != 0) {
    $adminName = "Суперадміністратор";

} else  {
    $adminName = "Адміністратор";

}





?>
<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Машинобудівний коледж СумДУ</title>
    <?php include 'vendor/component.php'; ?>

    
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
    </style>
</head>

<body>
    <section class="body"  >

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a  class="logo">
                    <img src="assets/images/logo.png" height="35" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

            <?php $Search = $_GET['q'];?>
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
                            <img src="assets/images/!logged-user.jpg" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info">
                            <span class="name"><?= $_SESSION['user']['full_name'] ?></span>
                            <span class="role"><?= $adminName ?></span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                           

                            <li>
                                <a role="menuitem" tabindex="-1" href="vendor/logout.php"><i class="fa fa-power-off"></i> Вийти</a>
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
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
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
                <div class="row kursePanel" >
                <script>
                        <?php
                        //Блок першого курсу
                        $KyrsePanel1 = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` = 1");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $KyrsePanel2 = $connect->query("SELECT COUNT(tn.`fullname`) AS 'count' FROM `groups`t, `students`tn WHERE t.`id_kurse`=1 and t.`id_ group`=tn.`id_ group`");
                            while ($roww = $KyrsePanel2->fetch_assoc()) {
                                $numer = $roww["count"];
                            }
                        ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;"  class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style="    background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" style="font-weight: 400;font-size: 20px;">Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
                                form.setAttribute("method", "get");
                                form.setAttribute("action", "/group.php?perem=<?= $row["id_kurse"] ?>");
                                form.append(div);
                                elemp.append(form);
                                break;
                            }
                        <?php
                        }
                        ?>
                    </script>
                    <script>
                        <?php
                        //Блок Другого курсу
                        $KyrsePanel1 = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` = 2");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $KyrsePanel2 = $connect->query("SELECT COUNT(tn.`fullname`) AS 'count' FROM `groups`t, `students`tn WHERE t.`id_kurse`=2 and t.`id_ group`=tn.`id_ group`");
                            while ($roww = $KyrsePanel2->fetch_assoc()) {
                                $numer = $roww["count"];
                            }
                        ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" style="font-weight: 400;font-size: 20px;">Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
                                form.setAttribute("method", "get");
                                form.setAttribute("action", "/group.php?perem=<?= $row["id_kurse"] ?>");
                                form.append(div);
                                elemp.append(form);
                                break;
                            }
                        <?php
                        }
                        ?>
                    </script>
                    <script>
                        <?php
                        //Блок третього курсу
                        $KyrsePanel1 = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` = 3");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $KyrsePanel2 = $connect->query("SELECT COUNT(tn.`fullname`) AS 'count' FROM `groups`t, `students`tn WHERE t.`id_kurse`=3 and t.`id_ group`=tn.`id_ group`");
                            while ($roww = $KyrsePanel2->fetch_assoc()) {
                                $numer = $roww["count"];
                            }
                        ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style="    background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" style="font-weight: 400;font-size: 20px;">Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
                                form.setAttribute("method", "get");
                                form.setAttribute("action", "/group.php?perem=<?= $row["id_kurse"] ?>");
                                form.append(div);
                                elemp.append(form);
                                break;
                            }
                        <?php
                        }
                        ?>
                    </script>
                    <script>
                        <?php
                        //Блок четвертого курсу
                        $KyrsePanel1 = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` = 4");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $KyrsePanel2 = $connect->query("SELECT COUNT(tn.`fullname`) AS 'count' FROM `groups`t, `students`tn WHERE t.`id_kurse`=4 and t.`id_ group`=tn.`id_ group`");
                            while ($roww = $KyrsePanel2->fetch_assoc()) {
                                $numer = $roww["count"];
                            }
                        ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style="    background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" style="font-weight: 400;font-size: 20px;">Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
                                form.setAttribute("method", "get");
                                form.setAttribute("action", "/group.php?perem=<?= $row["id_kurse"] ?>");
                                form.append(div);
                                elemp.append(form);
                                break;
                            }
                        <?php
                        }
                        ?>
                    </script>
                    <script>
                        <?php
                        //Не переведенні
                        $KyrsePanel1 = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` = 5");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $KyrsePanel2 = $connect->query("SELECT COUNT(tn.`fullname`) AS 'count' FROM `groups`t, `students`tn WHERE t.`id_kurse`=5 and t.`id_ group`=tn.`id_ group`");
                            while ($roww = $KyrsePanel2->fetch_assoc()) {
                                $numer = $roww["count"];
                            }
                        ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style="    background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" style="font-weight: 400;font-size: 20px;">Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
                                form.setAttribute("method", "get");
                                form.setAttribute("action", "not_translated.php");
                                form.append(div);
                                elemp.append(form);
                                break;
                            }
                        <?php
                        }
                        ?>
                    </script>
                    <script>
                        <?php
                        //Випускники
                        $KyrsePanel1 = $connect->query("SELECT * FROM `kurse` WHERE `id_kurse` = 6");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $KyrsePanel2 = $connect->query("SELECT COUNT(tn.`fullname`) AS 'count' FROM `groups`t, `students`tn WHERE t.`id_kurse`=6 and t.`id_ group`=tn.`id_ group`");
                            while ($roww = $KyrsePanel2->fetch_assoc()) {
                                $numer = $roww["count"];
                            }

                        ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style="    background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" style="font-weight: 400;font-size: 20px;">Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
                                form.setAttribute("method", "get");
                                form.setAttribute("action", "Graduates.php");
                                form.append(div);
                                elemp.append(form);
                                break;
                            }
                        <?php
                        }
                        ?>
                    </script>

                </div>


                <!-- start: page -->


                <!-- end: page -->
            </section>
        </div>


    </section>
    <script src="/swup.min.js"></script>
    <script>
        const swup = new Swup();
    </script>

</body>

</html>