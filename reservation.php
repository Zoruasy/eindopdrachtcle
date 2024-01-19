<?php
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
<nav>
    <div class="bigZoom"><a href="index.html">Home</a></div>
    <div class="bigZoom"><a href="reservation.php">Reserveren</a></div>
    <div class="bigZoom"><a href="Contact.php">Contact
        </a></div>
    <div class="bigZoom"><a href="login.php">Login</a></div>
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
        <div class="days">

        </div>
    </div>
</div>

    </a>
</div>

<!-- SCRIPT -->
<script src="includes/script.js"></script>
</head>

<header><h1>Reserveren</h1></header>
<body style="text-align:center">
</body>
</html>
