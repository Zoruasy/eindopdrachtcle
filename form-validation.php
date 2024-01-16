<?php
/** @var $name */
/** @var $adress */
/** @var $info */
/** @var $zip */
/** @var $phone */
/** @var $email */

//checken of de form wel is ingevuld
$errors = [];
if ($name == "") {
    $errors['name'] = 'Naam kan niet leeg zijn.';
}
if ($adress == "") {
    $errors['adress'] = 'Adres kan niet leeg zijn.';
}
if ($info == "") {
    $errors['info'] = 'Info kan niet leeg zijn.';
}
if ($zip == "") {
    $errors['zip'] = 'Postcode kan niet leeg zijn.';
}
if ($phone == "") {
    $errors['phone'] = 'Telefoonnummer kan niet leeg zijn.';
}
if ($email == "") {
    $errors['email'] = 'E-Mail kan niet leeg zijn.';
}
