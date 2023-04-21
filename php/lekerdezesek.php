<?php
include_once("fuggvenyek.php");
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Eke Beáta" />

    <title>Szálloda</title>
    <link rel="icon" href="../img/logo1.jpg" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/lekerdezes.css" />

</head>
<body>
<header>
    <div id="cim">
        <h1>Lekérdezések</h1>
    </div>
    <nav>
        <ul>
            <li ><a href="lekerdezesek.php" class="current">Lekérdezések</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<main>
    <fieldset>
        <legend><em>TV-s szobaszamok listája</em></legend>
        <table border="1">
            <tr>
                <th>Szobaszamok</th>
            </tr>

            <?php
            $tvszobak = tvlistaLeker(); // ez egy eredményhalmazt ad vissza

            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($tvszobak)) {
                echo '<tr>';
                echo '<td>'.$egySor["szobaszam"].'</td>';
                echo '</tr>';
            }
            mysqli_free_result($tvszobak);
            ?>
        </table>
    </fieldset>
    <fieldset>
        <legend><em>Két fős különálló szobák száma</em></legend>
        <table border="1">
            <tr>
                <th>Szobaszamok</th>
                <th>Szobatipus</th>
            </tr>

            <?php
            $ketfos = ketfoslistaLeker(); // ez egy eredményhalmazt ad vissza
            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($ketfos)) {
                echo '<tr>';
                echo '<td>'.$egySor["szobaszam"].'</td>';
                echo '<td>'.$egySor["szobatipus"].'</td>';
                echo '</tr>';
            }
            mysqli_free_result($ketfos);
            ?>
        </table>
    </fieldset>
    <fieldset>
        <legend><em>Vendégeink!</em></legend>
        <table border="1">
            <tr>
                <th>Megnevezés</th>
                <th>Árkód</th>
                <th>db</th>
            </tr>

            <?php
            $osszetett = osszetettlistaLeker(); // ez egy eredményhalmazt ad vissza
            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($osszetett)) {
                echo '<tr>';
                echo '<td>'.$egySor["megnevezes"].'</td>';
                echo '<td>'.$egySor["arkod"].'</td>';
                echo '<td>'.$egySor["db"].'</td>';
                echo '</tr>';
            }
            mysqli_free_result($osszetett);
            ?>
        </table>
    </fieldset>
    <fieldset>
        <legend><em>Ki a legidősebb?</em></legend>
        <table border="1">
            <tr>
                <th>Név</th>
                <th>Megnevezés</th>
                <th>Életkor</th>
            </tr>

            <?php
            $legidosebb = legidosebblistaLeker(); // ez egy eredményhalmazt ad vissza
            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($legidosebb)) {
                echo '<tr>';
                echo '<td>'.$egySor["nev"].'</td>';
                echo '<td>'.$egySor["megnevezes"].'</td>';
                echo '<td>'.$egySor["eletkor"].'</td>';
                echo '</tr>';
            }
            mysqli_free_result($legidosebb);
            ?>
        </table>
    </fieldset>
</main>
<div class="footer-dark">
    <?php include "footer.php"; ?>

</div>
</body>
</html>
