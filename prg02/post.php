<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<html lang="html">
<body>
<?php echo $_post["Voornaam"]; ?>!<br>
<?php echo $_post["Achternaam"]; ?>!<br>
<?php echo $_post["E-mail"]; ?>!<br>
<?php echo $_post["Telefoonnummer"]; ?>!<br>
<?php echo $_post["Tijdstip"]; ?>
</body>
</html>