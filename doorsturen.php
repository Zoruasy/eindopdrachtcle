<?php
// Check if the 'date' parameter is set in the URL
if (isset($_GET['date'])) {
    // Retrieve the date parameter from the URL
    $selectedDate = $_GET['date'];



} else {
    // Handle the case when the 'date' parameter is not set
    echo "Date parameter not set.";
}


/** @var mysqli $db */

//checken of post isset, doet anders niks
if (isset($_POST['submit'])) {
    //database connectie openen
    require_once "db/database.php";


    //postback data
    $name = mysqli_escape_string($db, $_POST['name']);
    $address = mysqli_escape_string($db, $_POST['address']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $info = mysqli_escape_string($db, $_POST['info']);
    $phone = mysqli_escape_string($db, $_POST['phone']);
    $zip = mysqli_escape_string($db, $_POST['zip']);

    //form-validation ophalen
    require_once "includes/form-validation.php";

    if (empty($errors)) {
        //reservering plaatsen in database
        $query = "INSERT INTO reservations (name, address, email, info, phone, zip)
                  VALUES ('$name', '$address', '$email', '$info', '$phone', '$zip')";
        $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);

        if ($result) {
            header('Location: success.php');
            exit;
        } else {
            $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //connectie sluiten
        mysqli_close($db);
    }

}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doorsturencss.css">

    <script>
        function submitForm() {
            alert("Als het formulier succesvol is ingevuld wordt u gestuurd naar een andere pagina.");
        }
    </script>
    <title>Formulier</title>


</head>
<body>


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


<h1>Gegevensformulier</h1>
<?php echo "Selected Date: " . htmlspecialchars($selectedDate);
?>


    <form action="" method="post" enctype="multipart/form-data">
        <div class="data-field">
            <label for="name">Naam</label>
            <input id="name" type="text" name="name" placeholder="Naam + Achternaam" maxlength="64"
                   value="<?= isset($name) ? htmlentities($name) : '' ?>"/>
            <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="email">E-Mail</label>
            <input id="email" type="email" name="email" placeholder="1234@5678.nl" maxlength="64"
                   value="<?= isset($email) ? htmlentities($email) : '' ?>"/>
            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="phone">Telefoonnummer</label>
            <input id="phone" type="text" name="phone" placeholder="0612345678" pattern="[0-9]{10}" maxlength="10"
                   value="<?= isset($phone) ? htmlentities($phone) : '' ?>"/>
            <span class="errors"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="adress">Adres</label>
            <input id="adress" type="text" name="adress" placeholder="Straatnaam" maxlength="75"
                   value="<?= isset($adress) ? htmlentities($adress) : '' ?>"/>
            <span class="errors"><?= isset($errors['adress']) ? $errors['adress'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="zip">Postcode</label>
            <input id="zip" type="text" name="zip" placeholder="1234AB" pattern="[0-9]{4}[A-Z]{2}" maxlength="6"
                   value="<?= isset($zip) ? htmlentities($zip) : '' ?>"/>
            <span class="errors"><?= isset($errors['zip']) ? $errors['zip'] : '' ?></span>
        </div>
        <div class="data-field">
            <label for="info">Info</label>
            <input id="info" type="text" name="info" placeholder="Aanvullende informatie"
                   value="<?= isset($info) ? htmlentities($info) : '' ?>"/>
            <span class="errors"><?= isset($errors['info']) ? $errors['info'] : '' ?></span>
        </div>
        <div class="data-submit smallZoom">
            <!-- Verzenden knop -->
            <input type="submit" value="Verzenden">
        </div>
    </form>

</body>
</html>

<section><a href="login.php">Terug naar site</a></section>

<div class="content">
    <p>Of ga door met</p>
    <div class="social-icons">
        <img src="images/apple.png" alt="Apple_link">
        <img src="images/facebook.png" alt="facebook_link">
        <img src="images/gmail.png" alt="Gmail_link">
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
</div>
</html>