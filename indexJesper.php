<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title>Maak een afspraak</title>
    <script>
        function confirmInput() {
            fname = document.forms[0].fname.value;
            alert("Afspraak gemaakt!" + fname + "Je wordt nu weer verwezen naar de homepagina");
        }
    </script>


    <script src="script1.js"></script>
    <link rel="stylesheet" href="styleJesper.css"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">

    <body1>

        <form id="frm1">

        </form>
        <script>
            //reset functie
            function myFunction() {
                document.getElementById("frm1").reset();
            }

        </script>

        <header>
            <nav>
                //links naar main website
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
                        <input type="reset" value="Reset"><br>
                        <br>
                        <input id="Verzenden" type="submit" name="Verzenden" value="Verzenden">
                    </div>
                </form>
            </form>
        </div>
    </body1>


    <body2>


    </body2>
</html>