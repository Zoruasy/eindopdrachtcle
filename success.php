<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
            rel="icon"
            href=""
    />
    <title>Uw reservering is geplaats!!</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Gloria+Hallelujah&family=Mansalva&display=swap"
          rel="stylesheet">
</head>

<body style="text-align:center">
<nav>
    <div class="bigZoom"><a href="index.html">Home</a></div>
    <div class="bigZoom"><a href="reservation.php">Reserveren</a></div>
    <div class="bigZoom"><a href="Contact.php">Over ons</a></div>
    <div class="bigZoom"><a href="login.php">Login</a></div>
</nav>

<header><h1>Het is gelukt!</h1></header>

<main>
    <section>
        <p>
            Dank u wel voor uw reservering!
        </p>
        <br>
        <br>
        <a href="index.html">Terug naar homepage</a>
    </section>


    <script>
        // When the user clicks on div, open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
    </script>
</main>
