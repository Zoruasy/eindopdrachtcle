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

<?php
if (isset($_GET['date'])) {
    $selectedDate = $_GET['date'];
} else {
    $selectedDate = date('Y-m-d'); // Set a default date if not provided
}
?>


<!doctype html>
<html lang="en">

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon"
          href="https://image.cdn2.seaart.ai/2023-10-31/21370751556810757/108f40244f0ae6d0568c924fe00f39e0eca8212a_high.webp" />
    <title>Login</title>
    <link rel="stylesheet" href="CSS/doorsturencss.css">
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

<h1>Gegevensformulier</h1>

<form action="" method="post">
    <h1>Geselecteerde Datum</h1>
    <p>De geselecteerde datum is: <?php echo $selectedDate; ?></p>
    <!-- Naam -->
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required>

    <!-- Adres -->
    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" required>

    <!-- Postcode -->
    <label for="postcode">Postcode:</label>
    <input type="text" id="postcode" name="postcode" required>

    <!-- Telefoonnummer -->
    <label for="telefoon">Telefoonnummer:</label>
    <input type="tel" id="telefoon" name="telefoon" pattern="[0-9]{10}" placeholder="0123456789" required>

    <!-- E-mailadres -->
    <label for="email">E-mailadres:</label>
    <input type="email" id="email" name="email" required>

    <!-- Extra informatie -->
    <label for="extraInfo">Extra informatie:</label>
    <textarea id="extraInfo" name="extraInfo" rows="4" cols="50"></textarea>

    <!-- Verzenden knop -->
    <input type="submit" value="Verzenden">
</form>


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