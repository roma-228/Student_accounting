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

        .centerr {
            display: flex;
            justify-content: center;
        }

        #numberr {
            font-weight: 400;
            font-size: 20px;
        }

        @media screen and (max-width:500px) and (min-width:350px) {
            #numberr {
                font-size: 15px;
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
            <?php include 'component/menu_admin.php'; ?>
            <!-- end: sidebar -->

            <section role="main" class="content-body transition-fade" id="swup">
                <header class="page-header">
                    <h2>Машинобудівний коледж СумДУ</h2>


                </header>
                <div class="row kursePanel">
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
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
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
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
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
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
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
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
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
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
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
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-24 col-xl-24"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style=" background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $numer ?> ос.</strong></div></div></div></div></div></section> <input type="hidden" name="perem" value="<?= $row["id_kurse"] ?>"></button>';
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
    <!-- Vendor -->
    <?php include 'component/scripts.php'; ?>
</body>

</html>