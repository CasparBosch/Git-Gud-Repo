<?php
require_once "DB_Connect.php";

/** @var $conn */

$query = "SELECT Datum, Tijd, Voornaam, Achternaam, Email, Telefoonnummer FROM reserveer";
$result = $conn->query($query);
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="styleJesper.css"/>
<table>
    <thead>
    <tr>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
        <th>Telefoonnummer</th>
    </tr>
    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td>
            <?= $row["Datum"]?>
        </td>
        <td>
            <?= $row["Tijd"]?>
        </td>
        <td>
            <?= $row["Voornaam"]?>
        </td>
        <td>
            <?= $row["Achternaam"]?>
        </td>
        <td>
            <?= $row["Email"]?>
        </td>
        <td>
            <?= $row["Telefoonnummer"]?>
        </td>
    </tr>
<?php }
    }?>
</table>
</body>
</html>
