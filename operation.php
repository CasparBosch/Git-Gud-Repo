<?php
//refereer naar de connectfunctie om te gebruiken zonder alles elk bestand opnieuw te schrijven
require_once "DB_Connect.php";
$conn = openConn();

function createData(){
    //variabelen aanmaken en input controleren
    $voornaam = textboxValue("Voornaam");
    $achternaam = textboxValue("Achternaam");
    $email = textboxValue("Email");
    $telefoonnummer = textboxValue("Telefoonnummer");
    $datum = textboxValue("Datum");
    $tijd = textboxValue("Tijd");
    $opmerkingen = textboxValue("Opmerkingen");

    // Variabelen naar de database
    if ($datum&&$tijd&&$voornaam&&$achternaam&&$email&&$telefoonnummer&&$opmerkingen){
        $sql = "INSERT INTO contact(Datum, Tijd, Voornaam, Achternaam, Woonplaats, Adres, Email, Telefoonnummer, Opmerkingen) 
        VALUES('$datum', '$tijd', '$voornaam', '$achternaam', '$email', '$telefoonnummer', '$opmerkingen')";
        if(mysqli_query($GLOBALS['conn'], $sql)){
            TextNode("succes", "Afpraak is succesvol toegevoegd!");
        }else{
            echo "Error";
        }
    }else{
        TextNode("error", "Voer alle gegevens in");   }
}


//checking textbox value and mysql injections
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['conn'], trim($_POST[$value] ));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styleJesper.css">
</head>
</html>