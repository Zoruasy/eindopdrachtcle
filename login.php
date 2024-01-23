<?php
session_start();

//checken of user is ingelogd
if (isset($_SESSION['loggedInUser'])) {
    $login = true;
} else {
    $login = false;
}

//connectie met database maken
/** @var mysqli $db */
require_once "DB/database.php";

if (isset($_POST['submit'])) {
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Voer een gebruikersnaam in';
    }
    if ($password == '') {
        $errors['password'] = 'Voer een wachtwoord in';
    }

    if (empty($errors)) {
        //informatie ophalen uit database
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $login = true;

                $_SESSION['loggedInUser'] = [
                    'email' => $user['email'],
                    'id' => $user['id'],
                ];
            } else {
                //error onjuiste inloggegevens
                $errors['loginFailed'] = 'De combinatie van email en wachtwoord is bij ons niet bekend';
            }
        } else {
            //error onjuiste inloggegevens
            $errors['loginFailed'] = 'De combinatie van email en wachtwoord is bij ons niet bekend';
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            rel="icon"
            href="https://image.cdn2.seaart.ai/2023-08-22/15094119452964869/3514f3e2a650050b5d50803bdae262e3f7c15aa0_high.webp"
    />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/inlogcss.css">
</head>

<nav class="main-navigation">
    <div class="logo-container">
        <img src="images/logo.png" alt="Vrolijke_Vee_Oppas" class="logo">
    </div>
    <div class="nav-links-container">
        <div class="nav-item bigZoom"><a href="index.html">Home</a></div>
        <div class="nav-item bigZoom"><a href="reservation.php">Reserveren</a></div>
        <div class="nav-item bigZoom"><a href="Contact.php">Over ons</a></div>
        <div class="nav-item bigZoom"><a href="login.php">Login</a></div>
    </div>
</nav>

<header><h1>Login</h1></header>
<body style="text-align:center">
<section>
    <?php if ($login) { ?>
        <p><h3>Je bent ingelogd!</h3></p>
        <p><a href="logout.php">Uitloggen</a> / <a href="DB/index.php">Naar home page</a></p>
        <img class="imagegallery"
             src=""
        />

    <?php } else { ?>
        <div class="login-space">
            <h3>Inloggen</h3>
        </div>
        <form action="" method="post">
            <div>
                <label for="email">E-mailadres</label>
                <input id="email" type="text" name="email" value="<?= $email ?? '' ?>"/>
                <span class="errors"><?= $errors['email'] ?? '' ?></span>
            </div>
            <div>
                <label for="password">Wachtwoord</label>
                <input id="password" type="password" name="password"/>
                <span class="errors"><?= $errors['password'] ?? '' ?></span>
            </div>
            <div class="doorgaan-container">
                <p class="errors"><?= $errors['loginFailed'] ?? '' ?></p>
                <input type="submit" class="smallZoom" name="submit" value="Doorgaan"/>
            </div>

        </form>
        Nog geen account? <a href="register.php"><u>Registreer hier!</u></a>
    <?php } ?>
    <div class="content">
        <p>Of ga door met</p>
        <div class="social-icons">
            <img src="images/apple.png" alt="Apple_link">
            <img src="images/facebook.png" alt="facebook_link">
            <img src="images/gmail.png" alt="Gmail_link">
        </div>
</section>

<footer>
    <div class="naastElkaarFooter">
        <img class="kleineAfbeelding" src="images/email.png" alt="Afbeelding-email">
        <p>Neem contact op met ons
            <br>
            vrolijkeveeoppas@gmail.com
            <br>
            +31 6 12345678
        </p>

    </div>
</footer>
</body>
</html>