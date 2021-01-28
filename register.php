<?php
session_start();

$email = '';
$password = '';

//If our session doesn't exist, redirect & exit script
if (isset($_SESSION['loggedInUser'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    //Require database in this file & image helpers
    /** @var mysqli $db */
    require_once "includes/database.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    $errors = [];
    if ($email == '') {
        $errors['email'] = 'The email cannot be empty';
    }
    if ($password == '') {
        $errors['password'] = 'The password cannot be empty';
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (email, password) VALUES('$email', '$password')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registreer</title>
    <link rel="stylesheet" href="styleJesper.css">
</head>
<body>

<header>
    <nav>
        <div><a href="https://www.uu.nl/">Homepagina</a></div>
        <div><a href="https://www.uu.nl/organisatie/contact">Contact Opnemen</a></div>
        <div><a href="https://www.uu.nl/informatie-coronavirus">Coronavirus</a></div>
        <div><a href="https://www.uu.nl/organisatie/werken-bij-de-universiteit-utrecht/vacatures">Vacatures</a></div>
    </nav>
    <div id="header-image"></div>
</header>

<h1>Nieuwe gebruiker registeren</h1>
<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="email">email</label>
        <br>
        <input id="email" type="email" name="email" value="<?= $email ?>"/>
        <br>
        <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        <br>
        <label for="password">Wachtwoord</label>
        <br>
        <input id="password" type="password" name="password"/>
        <br>
        <span class="errors"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
        <br>
        <input type="submit" name="submit" value="Registreer"/>
    </div>
</form>
</body>
</html>