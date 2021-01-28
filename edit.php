<?php

require_once "DB_Connect.php";

$conn = openConn();

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    //TODO variabele volgens form waar name=tijd
    $id = mysqli_escape_string($conn, $_POST['id']);
    $datum = mysqli_escape_string($conn, $_POST['Datum']);
    $tijd = mysqli_escape_string($conn, $_POST['Tijd']);
    $voornaam = mysqli_escape_string($conn, $_POST['Voornaam']);
    $achternaam = mysqli_escape_string($conn, $_POST['Achternaam']);
    $email = mysqli_escape_string($conn, $_POST['Email']);
    $telefoonnummer = mysqli_escape_string($conn, $_POST['Telefoonnummer']);
    $opmerkingen = mysqli_escape_string($conn, $_POST['Opmerkingen']);

    //Require the form validation handling
    require_once "form-validation.php";
    //TODO afspraak array variabelem toevoegen, maken met variabelen hierboven
    //Save variables to array so the form won't break
    $afspraak = [
        'Datum' => $datum,
        'tijd' => $tijd,
        'Voornaam' => $voornaam,
        'Achternaam' => $achternaam,
        'Email' => $email,
        'Telefoonnummer' => $telefoonnummer,
        'Opmerkingen' => $opmerkingen,
    ];

    if (empty($errors)) {
        //TODO query fixen
        $query = "UPDATE albums
                  SET datum = '$datum', tijd = '$tijd', voornaam = '$voornaam', achternaam = '$achternaam', email = '$email', telefoonnummer = '$telefoonnummer', opmerkingen = '$opmerkingen'
                  WHERE id = '$id'";
        echo $query;
        exit;
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: indexJesper.php');
            exit;
        } else {
            $errors[] = 'Er ging iets mis in je database query: ' . mysqli_error($conn);
        }

    }
} else if (isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $id = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM reserveer WHERE id = " . mysqli_escape_string($conn, $id);
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $afspraak = mysqli_fetch_assoc($result);
    } else {
        // redirect when db returns no result
        header('Location: indexJesper.php');
        exit;
    }
}

//Close connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="styleJesper.css"/>
</head>
<body>
<div id="center">
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        //TODO form maken zoals tijd
        ?>

        <div class="data-field">
            <label for="datum">Datum</label>
            <br>
            <input id="datum" type="date" name="datum" value="<?= $afspraak['datum']; ?>"/>
            <span class="errors"><?= isset($errors['datum']) ? $errors['datum'] : '' ?></span>
        </div>
        <br>
        <div class="data-field">
            <label for="tijd">Tijd</label>
            <br>
            <input id="tijd" type="time" name="tijd" value="<?= $afspraak['tijd']; ?>"/>
            <span class="errors"><?= isset($errors['tijd']) ? $errors['tijd'] : '' ?></span>
        </div>
        <br>
        <div class="data-field">
            <label for="voornaam">Voornaam</label>
            <br>
            <input id="voornaam" type="text" name="voornaam" value="<?= $afspraak['voornaam']; ?>"/>
            <span class="errors"><?= isset($errors['voornaam']) ? $errors['voornaam'] : '' ?></span>
        </div>
        <br>
        <div class="data-field">
            <label for="achternaam">Achternaam</label>
            <br>
            <input id="achternaam" type="text" name="achternaam" value="<?= $afspraak['achternaam']; ?>"/>
            <span class="errors"><?= isset($errors['tijd']) ? $errors['tijd'] : '' ?></span>
        </div>
        <br>
        <div class="data-field">
            <label for="email">Email</label>
            <br>
            <input id="email" type="text" name="email" value="<?= $afspraak['email']; ?>"/>
            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        </div>
        <br>
        <div class="data-field">
            <label for="telefoonnummer">Telefoonnummer</label>
            <br>
            <input id="telefoonnummer" type="text" name="telefoonnummer" value="<?= $afspraak['telefoonnummer']; ?>"/>
            <span class="errors"><?= isset($errors['telefoonnummer']) ? $errors['telefoonnummer'] : '' ?></span>
        </div>
        <br>
        <div class="data-field">
            <label for="opmerkingen">Opmerkingen</label>
            <br>
            <input id="opmerkingen" type="text" name="opmerkingen" value="<?= $afspraak['opmerkingen']; ?>"/>
            <span class="errors"><?= isset($errors['opmerkingen']) ? $errors['opmerkingen'] : '' ?></span>
        </div>
        <br>
        <div class="data-submit">
            <input type="hidden" name="id" value="<?= $id; ?>"/>
            <br>
            <input type="hidden" name="current-image" value="<?= $afspraak['image']; ?>"/>
            <input type="submit" name="submit" value="Opslaan"/>
        </div>
    </form>
</div>
<div>
    <a href="indexJesper.php">Go back to the list</a>
</div>
</body>
</html>
