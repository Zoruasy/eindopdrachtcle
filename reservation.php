

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link
            rel="icon"
            href="https://image.cdn2.seaart.ai/2023-10-31/21370751556810757/108f40244f0ae6d0568c924fe00f39e0eca8212a_high.webp"
    />
    <title>Reserveren</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/c7b1d33b1c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Mansalva&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/7acb2867d6.js" crossorigin="anonymous"></script>

    <script>
        function submitForm() {
            alert("Als het formulier succesvol is ingevuld wordt u gestuurd naar een andere pagina.");
        }
    </script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="CSS/calendarcss.css" />

    <!-- FONTAWESOME -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <title>Mini Calendar</title>
</head>

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

<div class="container">
    <div class="calendar">
        <div class="header">
            <div class="month"></div>

            <div class="btns">
                <div class="btn today-btn">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="btn prev-btn">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="btn next-btn">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div class="weekdays">
            <div class="day">Sun</div>
            <div class="day">Mon</div>
            <div class="day">Tue</div>
            <div class="day">Wed</div>
            <div class="day">Thu</div>
            <div class="day">Fri</div>
            <div class="day">Sat</div>
        </div>
        <div class="days" id="days">

        </div>

    </div>
</div>




<!-- SCRIPT -->
<script src="includes/script.js">
    </script>
