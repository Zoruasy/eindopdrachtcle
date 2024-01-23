<?php
// Check if the 'date' parameter is set in the URL
if (isset($_GET['date'])) {
    // Retrieve the date parameter from the URL
    $selectedDate = $_GET['date'];

    // Process the selected date as needed
    echo "Selected Date: " . $selectedDate;

} else {
    // Handle the case when the 'date' parameter is not set
    echo "Date parameter not set.";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/doorsturencss.css">
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

<form action="/submit" method="post">
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
</body>
</html>