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
<html lang="en">
script>
// fill the month table with column headings
function day_title(day_name) {
document.write("<div class='c-cal__col'>" + day_name + "</div>");
}
// fills the month table with numbers
function fill_table(month, month_length, indexMonth) {
day = 1;
// begin the new month table
document.write("<div class='c-main c-main-" + indexMonth + "'>");
    //document.write("<b>"+month+" "+year+"</b>")

    // column headings
    document.write("<div class='c-cal__row'>");
        day_title("Sun");
        day_title("Mon");
        day_title("Tue");
        day_title("Wed");
        day_title("Thu");
        day_title("Fri");
        day_title("Sat");
        document.write("</div>");

    // pad cells before first day of month
    document.write("<div class='c-cal__row'>");
        for (var i = 1; i < start_day; i++) {
        if (start_day > 7) {
        } else {
        document.write("<div class='c-cal__cel'></div>");
        }
        }

        // fill the first week of days
        for (var i = start_day; i < 8; i++) {
        document.write(
        "<div data-day='2022-" +
          indexMonth +
          "-0" +
          day +
          "'class='c-cal__cel'><p>" +
                day +
                "</p></div>"
        );
        day++;
        }
        document.write("</div>");

    // fill the remaining weeks
    while (day <= month_length) {
    document.write("<div class='c-cal__row'>");
        for (var i = 1; i <= 7 && day <= month_length; i++) {
        if (day >= 1 && day <= 9) {
        document.write(
        "<div data-day='2022-" +
              indexMonth +
              "-0" +
              day +
              "'class='c-cal__cel'><p>" +
                day +
                "</p></div>"
        );
        day++;
        } else {
        document.write(
        "<div data-day='2022-" +
              indexMonth +
              "-" +
              day +
              "' class='c-cal__cel'><p>" +
                day +
                "</p></div>"
        );
        day++;
        }
        }
        document.write("</div>");
    // the first day of the next month
    start_day = i;
    }

    document.write("</div>");
}
</script>
<header>
    <div class="wrapper">
        <div class="c-monthyear">
            <div class="c-month">
                <span id="prev" class="prev fa fa-angle-left" aria-hidden="true"></span>
                <div id="c-paginator">
                    <span class="c-paginator__month">JANUARY</span>
                    <span class="c-paginator__month">FEBRUARY</span>
                    <span class="c-paginator__month">MARCH</span>
                    <span class="c-paginator__month">APRIL</span>
                    <span class="c-paginator__month">MAY</span>
                    <span class="c-paginator__month">JUNE</span>
                    <span class="c-paginator__month">JULY</span>
                    <span class="c-paginator__month">AUGUST</span>
                    <span class="c-paginator__month">SEPTEMBER</span>
                    <span class="c-paginator__month">OCTOBER</span>
                    <span class="c-paginator__month">NOVEMBER</span>
                    <span class="c-paginator__month">DECEMBER</span>
                </div>
                <span id="next" class="next fa fa-angle-right" aria-hidden="true"></span>
            </div>
            <span class="c-paginator__year">2022</span>
        </div>
        <div class="c-sort">
            <a class="o-btn c-today__btn" href="javascript:;">TODAY</a>
        </div>
    </div>
</header>
<div class="wrapper">
    <div class="c-calendar">
        <div class="c-calendar__style c-aside">
            <a class="c-add o-btn js-event__add" href="javascript:;">add event <span class="fa fa-plus"></span></a>
            <div class="c-aside__day">
                <span class="c-aside__num"></span> <span class="c-aside__month"></span>
            </div>
            <div class="c-aside__eventList">
            </div>
        </div>
        <div class="c-cal__container c-calendar__style">
            <script>

                // CAHNGE the below variable to the CURRENT YEAR
                year = 2022;

                // first day of the week of the new year
                today = new Date("January 1, " + year);
                start_day = today.getDay() + 1;
                fill_table("January", 31, "01");
                fill_table("February", 28, "02");
                fill_table("March", 31, "03");
                fill_table("April", 30, "04");
                fill_table("May", 31, "05");
                fill_table("June", 30, "06");
                fill_table("July", 31, "07");
                fill_table("August", 31, "08");
                fill_table("September", 30, "09");
                fill_table("October", 31, "10");
                fill_table("November", 30, "11");
                fill_table("December", 31, "12");
            </script>
        </div>
    </div>

    <div class="c-event__creator c-calendar__style js-event__creator">
        <a href="javascript:;" class="o-btn js-event__close">CLOSE <span class="fa fa-close"></span></a>
        <form id="addEvent">
            <input placeholder="Event name" type="text" name="name">
            <input type="date" name="date">
            <textarea placeholder="Notes" name="notes" cols="30" rows="10"></textarea>
            <select name="tags">
                <option value="event">event</option>
                <option value="important">important</option>
                <option value="birthday">birthday</option>
                <option value="festivity">festivity</option>
            </select>
        </form>
        <br>
        <a href="javascript:;" class="o-btn js-event__save">SAVE <span class="fa fa-save"></span></a>
    </div>
</div>
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

    <script>
        function submitForm() {
            alert("Als het formulier succesvol is ingevuld wordt u gestuurd naar een andere pagina.");
        }
    </script>

</head>
<nav>
    <div class="bigZoom"><a href="index.html">Home</a></div>
    <div class="bigZoom"><a href="reservation.php">Reserveren</a></div>
    <div class="bigZoom"><a href="Contact.php">Contact
        </a></div>
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
            <input id="address" type="text" name="address" placeholder="Straat" maxlength="75"
                   value="<?= isset($address) ? htmlentities($address) : '' ?>"/>
            <span class="errors"><?= isset($errors['address']) ? $errors['address'] : '' ?></span>
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
