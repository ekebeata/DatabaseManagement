<?php
require_once("fuggvenyek.php");
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Eke Beáta" />

    <title>Szálloda</title>
    <link rel="icon" href="../img/logo1.jpg" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/tablazat.css" />

</head>
<body>
<header>
    <div id="cim">
        <h1>Adatok aktualizálása</h1>
    </div>
    <nav>
        <ul>
            <li><a href="vendeg.php">Vendég</a></li>
            <li><a href="szobak.php" class="current">Szobák</a></li>
            <li><a href="ar.php">Árak</a></li>
            <li><a href="foglalas.php">Foglalás</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<main>
    <form method="POST" action="szobafelvitel.php" accept-charset="utf-8">
    <fieldset>
        <legend><em>Új szoba</em></legend>
        <div class="inputbox">
            <label>Szobaszám: </label>
            <label class="mezok">
                <input type="text" name="szobaszam" placeholder="1-">
            </label>
        </div>

        <div class="inputbox">
            <label>Szobatípus</label>
            <label>
                <select name="szobatipus">
                    <option value="fracia">francia</option>
                    <option value="csaladi">csaladi</option>
                    <option value="kulonagyas">kulonagyas</option>
                </select>
            </label>
        </div>

        <div class="inputbox">
            <label>Hány fős? </label>
            <label>
                <input type="text" name="fo" placeholder="1-4">
            </label>
        </div>
    </fieldset>
    <div id="two" class="button" >
        <input type="submit" value="Felvitel!" name="felvisz">
    </div>
    </form>
    <fieldset>
        <legend><em>Szobák listája</em></legend>
        <table border="1">
            <tr>
                <th>Szobaszám</th>
                <th>Szobatípus</th>
                <th>Fő</th>
            </tr>

            <?php

            $szobak = szobalistaLeker(); // ez egy eredményhalmazt ad vissza

            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($szobak)) {
                echo '<form action="szobaszerkesztes.php" method="POST">';
                echo '<tr>';
                echo '<td>'.$egySor["szobaszam"].'</td>';
                echo '<td>'.$egySor["szobatipus"].'</td>';
                echo '<td>'.$egySor["fo"].'</td>';
                echo '<td><input type="submit" value="Szerkeszt"></td>';
                echo '</tr>';
                echo '<input type="hidden" name="szobaszam" value="'.$egySor["szobaszam"].'">';
                echo '</form>';
            }
            mysqli_free_result($szobak);
            ?>
        </table>
    </fieldset>
</main>
<div class="footer-dark">
    <?php include "footer.php"; ?>

</div>
</body>
</html>
