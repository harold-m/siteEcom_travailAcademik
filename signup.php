<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1.0">
    <title>Electronics : Create Account</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>

    <img src="images/loader.gif" class="loader" alt="">

    <div class="alert-box">
        <img src="images/error.png" class="alert-img" alt="">
        <p class="alert-msg">Error message</p>
    </div>
    <div class="container">
        <img src="images/dark-logo.png" class="logo" alt="">
        <form action="register-client.php" method="post">
            <input type="text" autocomplete="off" name="prenom" placeholder="prenom" required>
            <input type="text" autocomplete="off" name="nom" placeholder="nom" required>
            <input type="email" autocomplete="off" name="email" placeholder="email" required>
            <input type="password" autocomplete="off" name="motDePasse" placeholder="motDePasse" required>
            <input type="text" autocomplete="off" name="ville" placeholder="ville" required>
            <input type="text" autocomplete="off" name="adresse" placeholder="adresse" required>
            <input type="text" autocomplete="off" name="telephone" placeholder="Phone Number" required>
            <input type="checkbox" checked class="checkbox" name="terms-and-cond">
            <label for="terms-and-cond">agree to our <a href="">terms and conditions</a></label>
            <br>
            <input type="checkbox" class="checkbox" name="notification">
            <label for="notification">receive upcoming offers and events mails</label>
            <input class="submit-btn" type="submit" name="signup" value="Create acccount">
        </form>
        <a href="login.php" class="link">already have an acoount? Login in here</a>
        <a href="index.php" class="link">Go to Homepage</a>
    </div>

</body>
</html>