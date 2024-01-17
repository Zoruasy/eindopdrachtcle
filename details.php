<?php
session_start();

//login check algemeen
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

//database connectie openen
/** @var $db */
require_once "database.php";

//als er geen id is gegeven terug naar index
if (!isset($_GET['id']) || $_GET['id'] === '') {
    header('Location: index.php');
    exit;
}

//id ophalen en opslaan
$userId = $_GET['id'];

//info ophalen uit database
$query = "SELECT * FROM reservations WHERE id = '$userId'";
$result = mysqli_query($db, $query);

//als het album niet bestaat terug sturen naar index
if (mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit;
}

//info opslaan in array
$user = mysqli_fetch_assoc($result);

//connectie sluiten
mysqli_close($db);
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
    <title>Details | <?= $user['name'] ?></title>
    <link rel="stylesheet" href="../admin.css?v=<?= time(); ?>">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href=""
          rel="stylesheet">
</head>
<body>
<section>
    <h3>#<?= $user['id'] ?> <?= $user['name']; ?> - Details</h3>
    <ul>
        <li>E-Mail adres:
            <?= $user['email']; ?>
        </li>
        <li>Telefoonnummer:
            <?= $user['phone']; ?>
        </li>
        <li>Adres:
            <?= $user['adress']; ?> - <?= $user['zip']; ?>
        </li>
        <li>Info:
            <?= $user['info']; ?>
        </li>
    </ul>

</section>
<div>
    <section><a href="index.php">Terug naar de index</a></section>
</div>
</body>
</html>
