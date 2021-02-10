<?php

//function to open a connection to the database
function openConn(){
    $dbHost = "localHost";
    $dbUser = "root";
    $dbPass = "";
    $db = "db_reserveringssysteem";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $db) or die("Connection failed; %s\n" .
    $conn -> error);

    //if the connection could not be made display a message
    if ($conn -> connect_error){
        die("Connection failed: " . $conn -> connect_error);
    }
    echo "Connected succesfully" . "<br>";
    return $conn;
}

//function to close the connection
function closeConn($conn){
    $conn -> close();
}
?>