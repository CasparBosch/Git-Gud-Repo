<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($datum == "") {
    $errors['datum'] = 'Date cannot be empty'; //Alternative for errors behind input and not in summary
}
if (!is_numeric($tijd) || strlen($tijd) != 4) {
    $errors['tijd'] = 'Time needs to be a number with the length of 4';
}
if ($voornaam == "") {
    $errors['genre'] = 'Firstname cannot be empty';
}
if ($achternaam == "") {
    $errors['year'] = 'Lastname cannot be empty';
}
if ($email == "") {
    $errors['email'] = 'email cannot be empty';
}
if (!is_numeric($telefoonnummer)) {
    $errors['telefoonnummer'] = 'opmerkingen needs to be a number';
}
if ($opmerkingen == "") {
    $errors['opmerkingen'] = 'opmerkingen cannot be empty';
}
?>