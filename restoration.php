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
    <title>Відновлення</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
    @media screen and (max-width: 800px) {
        form{
            width: 70%;
        } 
    }
</style>
</head>
<body >
<Main id="swup" class="transition-fade">
    <!-- Відновлення логіна або пароля -->
<div class="Back" data-tooltip="Попередня сторінка"><a href="/index.php"><img class="BackImg" src="https://cdn-icons-png.flaticon.com/512/2223/2223615.png" ></a></div>
    <form action="vendor/restorationForm.php" method="post" >
        <p class="RestorationText"> Відновлення логіна або пароля</p>
        <label>Пошта</label>
        <input type="email" name="email" placeholder="Введіть адрес своєї електронної пошти">
        <button type="submit">Далі</button>
        
        <?php
            if ($_SESSION['message']) {
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