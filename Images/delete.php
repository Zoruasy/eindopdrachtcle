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

//connectie database
require_once 'database.php';
/** @var mysqli $db */

//id ophalen en checken
if (!isset ($_GET['id']) || $_GET['id'] === "") {
    header('Location: index.php');
    exit;
}
//id opslaan in var
$userId = mysqli_escape_string($db, $_GET['id']);

//query DELETE info uit tabel
$query = "DELETE FROM reservations WHERE id = '$userId'";

//uitvoeren delete
$result = mysqli_query($db, $query)
or die('Error: ' . mysqli_error($db) . ' - Query: ' . $query);

//connectie sluiten
mysqli_close($db);

//terug sturen naar index
header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            rel="icon"
            href=""
    />
    <title>HELP??????</title>
    <link rel="stylesheet" href="../admin.css">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href=""
          rel="stylesheet">
</head>
<body>

</body>
</html>
