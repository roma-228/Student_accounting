<?php
include 'vendor/connect.php';
include 'component/link.php';
if ($_SESSION['user']['SuperAdmin'] != 0) {
    $adminName = "Суперадміністратор";

} else {
    $adminName = "Адміністратор";
}



$Perem = $_POST["perem"];

?>

<!doctype html>
<html class="fixed">

<head>
    <title>Машинобудівний коледж СумДУ</title>

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

        .panel-body {
            margin-left: 35%;
            width: 460px;
            background: #ecedf0;
        }

        @media screen and (max-width:767px) {
            .panel-body {
                margin-left: 0;
                width: 350px;
            }

        }

        .RestorationText {
            text-align: center;
            padding-bottom: 7%;
            font-size: 20px;
        }

        input {
            margin: 10px 0;
            padding: 10px;
            border: unset;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }

        button {
            padding: 10px;
            background: #e3e3e3;
            border: unset;
            cursor: pointer;
            transition: all 500ms ease;
        }

        button:hover {
            background-color: rgb(0, 162, 220);
            color: white;
        }

        #register {
            margin-top: 3%;
            margin-left: 0%;
            display: flex;
            flex-direction: column;
            width: 400px;
        }

        @media screen and (max-width: 800px) {
            #register {
                width: 70%;
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
                <div class="panel-body" style="display: flex;justify-content: center;">


                    <form id="register" action="vendor/signup.php" method="post">
                        <p class="RestorationText"> Реєстрація нового користувача</p>
                        <label>ПІБ</label>
                        <input type="text" name="full_name" placeholder="Введіть своє ім’я">
                        <label>Логін</label>
                        <input type="text" name="login" placeholder="Введіть свой логін">
                        <label>Пошта</label>
                        <input type="email" name="email" placeholder="Введіть адрес своєї пошти">
                        <label>Пароль</label>
                        <input type="password" name="password" placeholder="Введіть пароль">
                        <label>Підтвердження пароля</label>
                        <input type="password" name="password_confirm" placeholder="Підтвердіть пароль">
                        <label>Зареєструвати коритсувача як Суперaдміна ?</label>
                        <input type="checkbox" id="checkboxAdmin" value="on" name="checkbox">
                        <button type="submit">Зареєструвати</button>
                        <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                        ?>
                    </form>

                </div>
            </section>
    </section>
    </div>


    <script src="/swup.min.js"></script>
    <script>
        const swup = new Swup();
    </script>
    <!-- Vendor -->
    <?php include 'component/scripts.php'; ?>
</body>

</html>