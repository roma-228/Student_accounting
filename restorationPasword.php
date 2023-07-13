<?php
include 'vendor/connect.php';
if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Відновлення паролю</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
    @media screen and (max-width: 800px) {
        form{
            width: 70%;
        } 
    }
</style>
</head>
<body>
<Main id="swup" class="transition-fade">
<div class="Back" data-tooltip="Попередня сторінка"><a href="/restoration.php"><img class="BackImg" src="https://cdn-icons-png.flaticon.com/512/2223/2223615.png" ></a></div>

<!-- Форма зміни паролю -->
    <form action="vendor/restorationPasswordForm.php" method="post">
    <p class="RestorationText"> Зміна пароля</p>
        <label>Новий пароль</label>
        <input type="password" name="password" placeholder="Введіть новий пароль">
        <label>Підтвердження паролю</label>
        <input type="password" name="passwordConfirmation" placeholder="Підтвердіть новий пароль">
        <button  type="submit">Змінити</button>
        
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</Main>
</body>
</html>