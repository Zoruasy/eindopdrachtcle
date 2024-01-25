<?php
session_start();

//algemene check
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: ../index.html");
    exit;
}

//admin check
$email = $_SESSION['loggedInUser']['email'];
if ($email != 'admin') {
    header("Location: ../index.html");
    exit;
}

//connectie database
/** @var $db */
require_once "database.php";

//info ophalen uit database
$query = "SELECT * FROM reservations";
$result = mysqli_query($db, $query);

//door alle kolommen gaan om een array te maken
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

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
            href="https://cdn.glitch.me/dd3e24be-0f5e-4407-ac88-7e0d7057b1ff%2Ficonadmin.png?v=1638789158835"
    />
    <title>DVV | Index</title>
    <link rel="stylesheet" href="../admin.css?v=<?= time(); ?>">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Mansalva&display=swap"
          rel="stylesheet">
</head>
<body>
<section><h3>Reservations - Index</h3></section>
<section><a href="../reservation.php">Manually add appointment / Go back to site</section>
</a>
<section>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tfoot>
        </tfoot>
</body>
<?php foreach ($users as $user) { ?>
    <tr>
        <td>
            <?= $user['id'] ?>
        </td>
        <td>
            <?= $user['name']; ?>
        </td>
        <td>
            <a href="details.php?id=<?= $user['id'] ?>">Details appointment</a>
        </td>
        <td>
            <a href="edit.php?id=<?= $user['id'] ?>">Edit appointment</a>
        </td>
        <td>
            <a href="delete.php?id=<?= $user['id'] ?>">Delete appointment</a>
        </td>
    </tr>
<?php } ?>

