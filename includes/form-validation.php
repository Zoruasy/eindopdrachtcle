<?php
/** @var $name */
/** @var $address */
/** @var $info */
/** @var $zip */
/** @var $phone */
/** @var $email */

//checken of de form wel is ingevuld
$errors = [];
if ($naam == "") {
    $errors['naam'] = 'Naam kan niet leeg zijn.';
}
if ($adres == "") {
    $errors['adres'] = 'Adres kan niet leeg zijn.';
}
if ($info == "") {
    $errors['info'] = 'Info kan niet leeg zijn.';
}
if ($postcode == "") {
    $errors['postcode'] = 'Postcode kan niet leeg zijn.';
}
if ($telefoonnummer == "") {
    $errors['telefoonnummer'] = 'Telefoonnummer kan niet leeg zijn.';
}
if ($email == "") {
    $errors['email'] = 'E-Mail kan niet leeg zijn.';
}
