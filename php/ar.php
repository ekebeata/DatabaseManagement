<?php
require_once("fuggvenyek.php");
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
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
            <li><a href="szobak.php">Szobák</a></li>
            <li><a href="ar.php" class="current">Árak</a></li>
            <li><a href="foglalas.php">Foglalás</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<main>
    <form method="POST" action="arfelvitel.php" accept-charset="utf-8">
        <fieldset>
            <legend><em>Új ár</em></legend>
            <div class="inputbox">
                <label>Árkód: </label>
                <label class="mezok">
                    <input type="text" name="arkod" placeholder="1-">
                </label>
            </div>

            <div class="inputbox">
                <label>Megnevezés: </label>
                <label>
                    <input type="text" name="megnevezes" placeholder="kiscica">
                </label>
            </div>

            <div class="inputbox">
                <label>Díj: </label>
                <label>
                    <input type="text" name="dij" placeholder="5000">
                </label>
            </div>
        </fieldset>
        <div id="two" class="button" >
            <input type="submit" value="Felvitel!" name="felvisz">
        </div>
    </form>
    <fieldset>
        <legend><em>Jelenlegi áraink</em></legend>
        <table border="1">
            <tr>
                <th>Árkód</th>
                <th>Megnevezés</th>
                <th>Ft</th>
            </tr>

            <?php

            $arak = arlistaLeker(); // ez egy eredményhalmazt ad vissza

            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($arak)) {
                echo '<form action="arszerkesztes.php" method="post">';
                echo '<tr>';
                echo '<td>'.$egySor["arkod"].'</td>';
                echo '<td>'.$egySor["megnevezes"].'</td>';
                echo '<td>'.$egySor["dij"].'</td>';
                echo '<td><input type="submit" name="submit" value="Szerkeszt"></td>';
                echo '</tr>';
                echo '<input type="hidden" name="arkod" value="'.$egySor["arkod"].'">';
                echo '</form>';
            }
            mysqli_free_result($arak);
            ?>

        </table>
    </fieldset>
</main>
<div class="footer-dark">
    <?php include "footer.php"; ?>

</div>
</body>
</html>
