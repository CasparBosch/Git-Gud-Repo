<?php
session_start();
//Require database in this file
require_once "DB_Connect.php";
/** @var $conn */

//Check if user is logged in, else move to secure page
if (isset($_SESSION['loggedInUser'])) {
    header("Location: indexJesper.php");
    exit;
}

//If form is posted, lets validate!
if (isset($_POST['submit'])) {

    //Retrieve values (email safe for query)
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    //Get password & name from DB
    $query = "SELECT *
              FROM users
              WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die('Error: '.$query);
    $user = mysqli_fetch_assoc($result);

    //Check if email exists in database
    $errors = [];

    if ($email == "")  {
        $errors['email'] = "Vul compleet in.";
    }

    if ($password == "")  {
        $errors['password'] = "Vul compleet in.";
    }

    if (empty($errors)) {
        //Validate password
        if (password_verify($password, $user['password'])) {
            //Set email for later use in Session
            $_SESSION['loggedInUser'] = [
                'name' => $user['name'],
                'id' => $user['id']
            ];

            //Redirect to secure.php & exit script
            header("Location: create.php");
            exit;
        } else {
            $errors[] = 'Uw logingegevens zijn onjuist';
        }
    } else {
        $errors[] = 'Uw logingegevens zijn onjuist';
    }
}

$conn->close();
?>
<!doctype html>
<!--start document type html-->
<html lang="en">
<head>
    <!--page title-->
    <title>Log in</title>
    <meta charset="utf-8"/>
    <!--reference stylesheet-->
    <link rel="stylesheet" href="styleJesper.css">
</head>
<body>

<header>
    <nav>
        <!--links to main page-->
        <div><a href="https://www.uu.nl/">Homepagina</a></div>
        <div><a href="https://www.uu.nl/organisatie/contact">Contact Opnemen</a></div>
        <div><a href="https://www.uu.nl/informatie-coronavirus">Coronavirus</a></div>
        <div><a href="https://www.uu.nl/organisatie/werken-bij-de-universiteit-utrecht/vacatures">Vacatures</a></div>
    </nav>
    <div id="header-image"></div>
</header>

<h1>Log in</h1>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<div>
    <!--log in form-->
    <form id="login" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
        <label for="email">E-mail</label>
        <br>
        <input type="email" name="email" id="email" value="<?= (isset($email) ? htmlentities($email) : ''); ?>"/>
        <span class="errors"><?=isset($errors['email']) ? $errors['email'] : ''?></span>
        <br>
        <label for="password">Wachtwoord</label>
        <br>
        <input type="password" name="password" id="password" value="<?= (isset($password) ? htmlentities($password) : ''); ?>"/>
        <span class="errors"><?=isset($errors['password']) ? $errors['password'] : ''?></span>
        <br>
        <input type="submit" name="submit" value="Log in"
        <!--go back to main page when data submitted-->
        <a href="indexJesper.php"/>

    </form>
</div>
<!--link to go to register and main page-->
<a href="register.php">Registreer</a>
<div>
    <a href="indexJesper.php">Maak een afspraak</a>
</div>
</body>
</html>