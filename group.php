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

        @media screen and (min-width: 1600px) {
            .col-xl-6 {
                width: 95%;
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


                <div class="row kursePanel ">
                    <script>
                        <?php
                        //Блок групи
                        $KyrsePanel1 = $connect->query("SELECT t.`name`,t.`Identifier`,t.`id_ group`,tn.`Color`,tn.`id_kurse` FROM `groups` t,`kurse` tn  WHERE t.`id_kurse`=tn.`id_kurse` and t.`id_kurse`= $Perem");
                        while ($row = $KyrsePanel1->fetch_assoc()) {
                            $id_group = $row["id_ group"];
                            $KyrsePanel3 = $connect->query("SELECT count(*) as 'count' FROM `students` WHERE `id_ group`= $id_group");
                            while ($roww = $KyrsePanel3->fetch_assoc()) {
                                $count = $roww["count"];
                            }
                            ?>
                            for (let h = 0; h < 5; h++) {
                                let elemp = document.querySelector(".kursePanel");
                                let div = document.createElement('div');
                                div.classList.add('centerr');
                                let form = document.createElement('form');
                                form.style.margin = '0px';
                                div.innerHTML = '<button style="border:none; background: none; color: fff;" class="col-md-12 col-lg-12 col-xl-6"><section class="panel panel-featured-left panel-featured-primary"><div class="panel-body centerr"><div class="widget-summary"><div class="widget-summary-col widget-summary-col-icon"><div class="summary-icon bg-primary style" style="    background: <?= $row["Color"] ?>;"><i style="font-family: Times new Roman;font-style: normal;font-weight: 600;font-size: 50px;"><?= $row["id_kurse"] ?></i></div></div><div class="widget-summary-col"><div class="summary"><h4 class="title" style="font-size:30px;    padding-bottom: 2%; "><?= $row["name"] ?></h4><div class="info"><strong class="amount" id="numberr" >Всього студентів на курсі : <?= $count ?> ос.</strong></div></div></div></div></div></section><input type="hidden" name="perem" value="<?= $row["id_ group"] ?>"></button>';
                                form.setAttribute("method", "GET");
                                form.setAttribute("action", "groupstudent.php?perem=<?= $row["id_ group"] ?>");
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