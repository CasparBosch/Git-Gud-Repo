<?php

//connect with database
require_once "DB_Connect.php";

//query to insert data into database
$insertQuery = "INSERT INTO reserveer(Datum, Tijd, Voornaam, Achternaam, Email, Telefoonnummer, Opmerkingen) VALUES (Datum, Tijd, Voornaam, Achternaam, Email, Telefoonnummer, Opmerkingen)";
mysqli_query($insertQuery);

if (isset($_POST['submit'])) {
    $insertQuery;
}

?>

<!DOCTYPE html>
<!--Start html-->
<html>

<head>
    <!--title web page-->
    <title>Maak een afspraak</title>
    <script>
        <!--confirmation appointment made-->
        function confirmInput() {
            fname = document.forms[0].fname.value;
            alert("Afspraak gemaakt!" + fname + "Je wordt nu weer verwezen naar de homepagina");
        }
    </script>

    <!--attempt at java script-->
    <script src="script1.js"></script>
    <!--reference stylesheet-->
    <link rel="stylesheet" href="styleJesper.css"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">

    <body>

        <form id="frm1">

        </form>
        <script>
            <!--reset function-->
            function myFunction() {
                document.getElementById("frm1").reset();
            }

        </script>

        <header>
            <nav>
                <!--links to main website UU-->
                <div><a href="https://www.uu.nl/">Homepagina</a></div>
                <div><a href="https://www.uu.nl/organisatie/contact">Contact Opnemen</a></div>
                <div><a href="https://www.uu.nl/informatie-coronavirus">Coronavirus</a></div>
                <div><a href="https://www.uu.nl/organisatie/werken-bij-de-universiteit-utrecht/vacatures">Vacatures</a>
                </div>
            </nav>
            <div id="header-image"></div>
        </header>

        <h1>Maak een Afspraak</h1>
        <div id="center">
            <!--form to make an appointment-->
            <form>
                <form onsubmit="confirmInput()" action="https://www.uu.nl/">
                    <div class="data-field">
                        <label for="dat">Datum:</label>
                        <br>
                        <input type="date" id="dat" name="dat">
                    </div>
                    <br>
                    <div class="data-field">
                        <label for="tijd">Tijd</label>
                        <br>
                        <input type="time" id="tijd" name="tijd"
                    </div>
                    <br>
                    <div class="data-field">
                        <label for="vn">Voornaam:</label>
                        <br>
                        <input id="fname" type="text" size="200">
                    </div>
                    <br>
                    <div class="data-field">
                        <label for="an">Achternaam:</label>
                        <br>
                        <input type="text" id="an" name="an">
                    </div>
                    <br>
                    <div class="data-field">
                        <label for="email">Email-Adres:</label>
                        <br>
                        <input type="email" id="email" name="email">
                    </div>
                    <br>
                    <div class="data-field">
                        <label for="tele">Telefoonnummer:</label>
                        <br>
                        <input type="text" id="tele" name="tele">
                    </div>
                    <br>
                    <div class="data-field">
                        <label for="opm">Opmerkingen:</label>
                        <br>
                        <input type="text" id="opm" name="opm">
                    </div>
                    <br>
                    <div class="data-field">
                        <!--reset button-->
                        <input type="reset" value="Reset"><br>
                        <br>
                        <!--submit button to send the data to the database-->
                        <input id="Verzenden" type="submit" name="Verzenden" value="Verzenden">
                    </div>
                </form>
            </form>
        </div>
    </body>
</html>