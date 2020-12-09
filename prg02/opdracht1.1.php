<?php

//phpinfo();
$welcomeText = "Hello there!";
$hour = date(format:`6`);
echo "<b> Opdracht 1.1 </b>" . "</b>";
echo $welcomeText . "</br>";
echo "Vandaag is het" . date(format: `d F Y`) . "</br>";
echo "Het is vandaag" . date(format: "d/m/y") . "</br>";
echo "Het is nu" . date("h:m:s") . ;
echo "</br>";
echo "<b> Opdracht 1.2 </b>" . "</br>";
    if ($hour >= 5 && $hour <= 11) {
        echo "Goede morgen!";
    }
    else if ($hour >= 12 && $hour <= 18){
        echo "Goede middag!";
    }
    else if ($hour >= 19 || $hour <= 4) {
        echo "Goede avond!";
    }
    echo "<b> Opdracht 1.3 </b>" . "</br>";

    $albums = array(
        "artist" => array("Joyner Lucas"),
        "albumName" => array("ADHD"),
        "releaseYear" => array("2019"),
        "totalTracks" => array("12"),
        "genre" => array("Hip hop"),
    );

    ?>
    <!doctype html>
    <html lang="en">
    <style type ="text/css">
