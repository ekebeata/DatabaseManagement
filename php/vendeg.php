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
            <li><a href="vendeg.php" class="current">Vendég</a></li>
            <li><a href="szobak.php">Szobák</a></li>
            <li><a href="ar.php">Árak</a></li>
            <li><a href="foglalas.php">Foglalás</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<main>
    <form method="POST" action="vendegfelvitel.php" accept-charset="utf-8">
    <fieldset>
        <legend><em>Személyes adatok</em></legend>
        <div class="inputbox">
            <label>Személyi száma: </label>
            <label class="mezok">
                <input type="text" name="szemelyiszam" placeholder="123456AA">
            </label>
        </div>

        <div class="inputbox">
            <label>Név: </label>
            <label>
                <input type="text" name="nev" placeholder="Vezetéknév Keresztnév">
            </label>
        </div>

        <div class="inputbox">
            <label>Lakcím: </label>
            <label>
                <input type="text" name="lakcim" placeholder="6724 Szeged Árpád tér 2">
            </label>
        </div>

        <div class="inputbox">
            <label>Születési idő: </label>
            <label>
                <input type="date" name="szulido">
            </label>
        </div>

        <div class="inputbox">
            <label>Email cím: </label>
            <label>
                <input type="email" name="mail" placeholder="valaki@gmail.com">
            </label>
        </div>

        <div class="inputbox">
            <label>Telefonszám: </label>
            <label>
                <input type="tel" name="tel" placeholder="201234567">
            </label>
        </div>

        <div class="inputbox">
            <label>Árkód: </label>
            <label>
                <select name="arkod">
                    <option value="1">kisbaba</option>
                    <option value="2">gyerek</option>
                    <option value="3">felnőtt</option>
                    <option value="4">nyugdíjas</option>
                </select>
            </label>
        </div>
    </fieldset>
    <div id="two" class="button" >
        <input type="submit" value="Felvitel!" name="felvisz">
    </div>
    </form>
    <fieldset>
        <legend><em>Vendégek listája</em></legend>
        <table border="1">
            <tr>
                <th>Személyi szám</th>
                <th>Név</th>
                <th>Lakcím</th>
                <th>Született</th>
                <th>Email</th>
                <th>Telefonszám</th>
                <th>Árkód</th>
            </tr>

            <?php

            $vendegek = vendeglistaLeker(); // ez egy eredményhalmazt ad vissza

            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($vendegek)) {
                echo '<form action="vendegszerkesztes.php" method="post">';
                echo '<tr>';
                echo '<td>'.$egySor["szemelyiszam"].'</td>';
                echo '<td>'.$egySor["nev"].'</td>';
                echo '<td>'.$egySor["lakcim"].'</td>';
                echo '<td>'.date_format(date_create($egySor["szulido"]),'Y. m .d').'</td>';
                echo '<td>'.$egySor["email"].'</td>';
                echo '<td>'.$egySor["telszam"].'</td>';
                echo '<td>'.$egySor["arkod"].'</td>';
                echo '<td><input type="submit" name="submit" value="Szerkeszt"></td>';
                echo '</tr>';
                echo '<input type="hidden" name="szemelyiszam_kulcs" value="'.$egySor["szemelyiszam"].'">';
                echo '</form>';
            }
            mysqli_free_result($vendegek);
            ?>

        </table>
    </fieldset>
</main>
<div class="footer-dark">
    <?php include "footer.php"; ?>

</div>
</body>
</html>
