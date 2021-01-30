<?php

function openConn(){
    $dbHost = "localHost";
    $dbUser = "root";
    $dbPass = "";
    $db = "db_reserveringssysteem";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $db) or die("Connection failed; %s\n" .
    $conn -> error);

    if ($conn -> connect_error){
        die("Connection failed: " . $conn -> connect_error);
    }
    echo "Connected succesfully" . "<br>";
    return $conn;
}
function closeConn($conn){
    $conn -> close();
}
?>