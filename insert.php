<?php

require_once "DB_Connect.php";
$voornaam = "Voornaam". "<br>";
$achternaam = "Achternaam". "<br>";
$telefoonnummer = "Telefoonnummer". "<br>";
$email = "Email". "<br>";
$afspraak = "Type Afspraak". "<br>";
$weeknummer = "Weeknummer". "<br>";
$datum = "Datum". "<br>";
$tijd = "Tijd". "<br>";
$opmerkingen = "Opmerkingen". "<br>";
$wachtwoord = "Password". "<br>";
?>

<html lang="html">
<body>
<?php echo $_POST["Voornaam"]; ?>!<br>
<?php echo $_POST["Achternaam"]; ?>!<br>
<?php echo $_POST["Telefoonnummer"]; ?>!<br>
<?php echo $_POST["Email"]; ?>!<br>
<?php echo $_POST["Type Afspraak"]; ?>!<br>
<?php echo $_POST["Weeknummer"]; ?>!<br>
<?php echo $_POST["Datum"]; ?>!<br>
<?php echo $_POST["Tijd"]; ?>!<br>
<?php echo $_POST["Opmerkingen"]; ?>!<br>
<?php echo $_POST["Password"]; ?>!<br>
</body>
</html>
