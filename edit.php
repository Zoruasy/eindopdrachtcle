<?php
session_start();

//algemene check
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: ../login.php");
    exit;
}

//admin check
$email = $_SESSION['loggedInUser']['email'];
if ($email != 'admin') {
    header("Location: ../login.php");
    exit;
}

/** @var mysqli $db */

//als er geen id is gegeven terug sturen naar index
if (!isset($_GET['id']) || $_GET['id'] === '') {
    header('Location: index.php');
    exit;
}

//id opslaan in var
$userId = $_GET['id'];

//connectie database
require_once "database.php";

//info ophalen uit database voor input value
$query2 = "SELECT * FROM reservations WHERE id = '$userId'";
$result2 = mysqli_query($db, $query2);

//opslaan in array
$user = mysqli_fetch_assoc($result2);

//kijken of post isset, anders niks doen
if (isset($_POST['submit'])) {

    //Postback data
    $name = mysqli_escape_string($db, $_POST['name']);
    $adress = mysqli_escape_string($db, $_POST['adress']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $info = mysqli_escape_string($db, $_POST['info']);
    $phone = mysqli_escape_string($db, $_POST['phone']);
    $zip = mysqli_escape_string($db, $_POST['zip']);

    //form-validation ophalen
    require_once "../includes/form-validation.php";

    if (empty($errors)) {
        //reservering aanpassen
        $query = "UPDATE reservations
                  SET name='$name', adress='$adress', email='$email', info='$info', phone='$phone', zip='$zip'
                  WHERE id = " . $userId;
        $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);

        if ($result) {
            header('Location: details.php');
            exit;
        } else {
            $errors['db'] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }


        //connectie sluiten
        mysqli_close($db);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            rel="icon"
            href=""
    />
    <title>Edit | <?= $userId ?></title>
    <link rel="stylesheet" href="../admin.css?v=<?= time(); ?>">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href=""
          rel="stylesheet">
</head>
<body style="text-align:center">

<div>
    <section>
        <h3>#<?= $user['id'] ?> <?= $user['name']; ?> - Edit</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="data-field">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name" maxlength="64" value="<?= $user['name'] ?>"/>
                <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="email">E-Mail</label>
                <input id="email" type="email" name="email" maxlength="64" value="<?= $user['email'] ?>"/>
                <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="phone">Telefoonnummer</label>
                <input id="phone" type="text" name="phone" placeholder="<?= $user['phone'] ?>" pattern="[0-9]{10}"
                       maxlength="10" value="<?= $user['phone'] ?>"/>
                <span class="errors"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="adress">Adres</label>
                <input id="adress" type="text" name="adress" maxlength="75" value="<?= $user['adress'] ?>"/>
                <span class="errors"><?= isset($errors['adress']) ? $errors['adress'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="zip">Postcode</label>
                <input id="zip" type="text" name="zip" pattern="[0-9]{4}[A-Z]{2}" maxlength="6"
                       value="<?= $user['zip'] ?>"/>
                <span class="errors"><?= isset($errors['zip']) ? $errors['zip'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="info">Info</label>
                <input id="info" type="text" name="info" value="<?= $user['info'] ?>"/>
                <span class="errors"><?= isset($errors['info']) ? $errors['info'] : '' ?></span>
            </div>
            <div class="data-submit smallZoom">
                <input type="submit" onclick="submitForm();" name="submit" value="Uw Reservering aanpassen"/>
            </div>
        </form>
    </section>
</div>
<div>
    <section><a href="index.php">Terug naar de index</a></section>
</div>
</body>
</html>

