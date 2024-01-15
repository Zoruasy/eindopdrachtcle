<?php
/** @var mysqli $db */

//checken of post isset, doet anders niks
if (isset($_POST['submit'])) {
    //database connectie openen
    require_once "db/database.php";

    //postback data
    $name = mysqli_escape_string($db, $_POST['name']);
    $adress = mysqli_escape_string($db, $_POST['adress']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $info = mysqli_escape_string($db, $_POST['info']);
    $phone = mysqli_escape_string($db, $_POST['phone']);
    $zip = mysqli_escape_string($db, $_POST['zip']);

    //form-validation ophalen
    require_once "includes/form-validation.php";


    if (empty($errors)) {
        //reservering plaatsen in database
        $query = "INSERT INTO reservations (name, adress, email, info, phone, zip)
                  VALUES ('$name', '$adress', '$email', '$info', '$phone', '$zip')";
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
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            rel="icon"
            href=""
    />
    <title>Reserveren</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Mansalva&display=swap"
          rel="stylesheet">

    <script>
        function submitForm() {
            alert("Als het formulier succesvol is ingevuld wordt u gestuurd naar een andere pagina.");
        }
    </script>

</head>
<nav>
    <div class="bigZoom"><a href="index.html">Home</a></div>
    <div class="bigZoom"><a href="reservation.php">Reserveren</a></div>
    <div class="bigZoom"><a href="about.php">Over ons</a></div>
    <div class="bigZoom"><a href="login.php">Login</a></div>
</nav>
<header><h1>Reserveren</h1></header>
<body style="text-align:center">
<section>
    <h3>Plaats een reservering</h3>
    <?php if (isset($errors['db'])) { ?>
        <div><span class="errors"><?= $errors['db']; ?></span></div>
    <?php } ?>

    <!-- enctype="multipart/form-data" no characters will be converted -->
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
            <input id="adress" type="text" name="adress" placeholder="Dierenstraat 12" maxlength="75"
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
            <input id="info" type="text" name="info" placeholder="Datum en tijd + info over betreffende dieren"
                   value="<?= isset($info) ? htmlentities($info) : '' ?>"/>
            <span class="errors"><?= isset($errors['info']) ? $errors['info'] : '' ?></span>
        </div>
        <div class="data-submit smallZoom">
            <input type="submit" onclick="submitForm();" name="submit" value="Reservering plaatsen"/>
        </div>
    </form>
</section>
</body>
</html>
