<?php session_start(); ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>Electronics : Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="container">
        <img src="images/dark-logo.png" class="logo" alt="">
        <form action="login-client.php" method="POST">
            <input type="email" autocomplete="off" id="email" name="email" placeholder="email">
            <input type="password" autocomplete="off" id="password" name="motDePasse" placeholder="password">
            <input class="submit-btn" type="submit" value="login">
        </form>
        <a href="password-reset.php" class="link">forgot your password? Reset in here</a>
        <a href="signup.php" class="link">Register a new membership</a>
        <a href="index.php" class="link">Go to Homepage</a>
    </div>

</body>
</html>