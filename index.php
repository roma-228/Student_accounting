<?php


include 'vendor/connect.php';

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація </title>
    <link rel="stylesheet" href="assets/css/main.css">
    
</head>
<style>
    @media screen and (max-width: 800px) {
        form{
            width: 70%;
        } 
    }
</style>
<body >
<Main id="swup" class="transition-fade">
<!-- Форма авторизации -->
    <form action="vendor/signin.php" method="post">
        <label>Логін</label>
        <input type="text" name="login" placeholder="Введіть свій логін">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введіть пароль">
        <button  type="submit">Увійти</button>
        <p>
            <a href="/restoration.php">Забули логін або пароль?</a>
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</Main>
<script src="/script/swup/swup.min.js"></script>
    <script>
        const swup = new Swup();
    </script>
</body>
</html>