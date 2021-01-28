<?php
/** @var mysqli $conn */
require_once "DB_Connect.php";

//Retrieve the GET parameter from the 'Super global'
$id = $_GET['id'];

//Remove from the server
$image = $_GET['image'];
deleteImageFile($image);

//Remove from the database
$query = "DELETE FROM reserveer WHERE id = " . mysqli_escape_string($conn, $id);

mysqli_query($conn, $query) or die ('Error: ' . mysqli_error($conn));

//Close connection
mysqli_close($conn);

//Redirect to homepage after deletion & exit script
header("Location: indexJesper.php");
exit;

?>