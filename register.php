<?php
//connectie maken met database
if(isset($_POST['submit'])) {
    require_once "DB/database.php";

    /** @var mysqli $db */

    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $errors = [];
    if($email == '') {
        $errors['email'] = 'Voer een gebruikersnaam in';
    }
    if($password == '') {
        $errors['password'] = 'Voer een wachtwoord in';
    }

    //password hashen
    if(empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);



        $result = mysqli_query($db, $query)
        or die('Db Error: '.mysqli_error($db).' with query: '.$query);

        if ($result) {
            header('Location: login.php');
            exit;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
            rel="icon"
            href="https://image.cdn2.seaart.ai/2023-08-22/15094119452964869/3514f3e2a650050b5d50803bdae262e3f7c15aa0_high.webp"
    />
    <link rel="stylesheet" href="CSS/registercss.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>


<nav> <!-- De navigatiebar -->
    <div class="naastElkaar2">
        <div>
            <img class="logo" src="images/logo.png" alt="Afbeelding-logo">
        </div>


        <div class="naastElkaar">
            <a class="navText" href="index.html">Home</a>
            <div class="navText">
                <div class="naastElkaar2">
                    <div><img class="reserveringsicoon" src="images/reserveringsicoon.png"
                              alt="Afbeelding-reserveringsicoon"></div>
                    <div> <a href="reservation.php">Reserveren</a></div>
                </div>
            </div>

            <a class="navText" href="about.php">Over ons</a>
            <a class="navText" href="login.php">Log in</a>
        </div>
    </div>


</nav>

<body style="text-align:center">


</div>
<section class="invulveld">
    <div class="new-user">
        <h3>Nieuwe gebruiker registeren</h3>
    </div>
    <form action="" method="post" class="styled-form">
        <div class="data-field">
            <label for="email">E-mailadres</label>
            <input id="email" type="email" name="email" value="<?= $email ?? '' ?>" />
            <span class="errors"><?= $errors['email'] ?? '' ?></span>
        </div>
        <div class="data-field">
            <label for="password">Wachtwoord</label>
            <input id="password" type="password" name="password" value="<?= $password ?? '' ?>" />
            <span class="errors"><?= $errors['password'] ?? '' ?></span>
        </div>
        <div class="data-submit smallZoom">
            <input type="submit" name="submit" value="Registreren" />
        </div>
    </form>
</section>
<a class="teruggaan" href="index.html">Terug naar site</a>

<div class="content">
    <p>Of ga door met</p>
    <div class="social-icons">
        <a> <img src="images/apple.png" alt="Apple_link"></a>
        <a> <img src="images/facebook.png" alt="facebook_link"></a>
        <a> <img src="images/gmail.png" alt="Gmail_link" ></a>
    </div>
    </div>

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