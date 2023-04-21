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
            <li><a href="szobak.php">Szobák</a></li>
            <li><a href="ar.php">Árak</a></li>
            <li><a href="foglalas.php" class="current">Foglalás</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<main>
    <form method="POST" action="foglalasfelvitel.php" accept-charset="utf-8">
    <fieldset>
        <legend><em>Foglalás</em></legend>
        <div class="inputbox">
            <label>Személyi száma: </label>
            <label class="mezok">
                <select name="szemelyiszam">
                    <?php
                    $szabadSzemelyiszamok = szabad_szemelyiszamokat_listaz();
                    if (mysqli_num_rows($szabadSzemelyiszamok) > 0) {
                        while ($egySor = mysqli_fetch_assoc($szabadSzemelyiszamok)) {
                            echo '<option value="'.$egySor["szemelyiszam"].'">' .
                                $egySor["szemelyiszam"].'--'.
                                $egySor["nev"].'</option>';
                        }
                    } else {
                        echo '<option value="">---Nincs választható szoba---</option>';
                    }
                    mysqli_free_result($szabadSzemelyiszamok);
                    ?>
                </select>
            </label>
        </div>

        <div class="inputbox">
            <label>Szobaszám: </label>
            <label>
                <select name="szobaszam">
                    <?php
                    $szobak = szobalistaLeker();
                    if (mysqli_num_rows($szobak) > 0) {
                        while ($egySor = mysqli_fetch_assoc($szobak)) {
                            echo '<option value="'.$egySor["szobaszam"].'">' .
                                $egySor["szobaszam"]. '-'.
                                $egySor["szobatipus"]. '-'.
                                $egySor["fo"].'</option>';
                        }
                    } else {
                        echo '<option value="">---Nincs választható szoba---</option>';
                    }
                    mysqli_free_result($szobak);
                    ?>
                </select>
            </label>
        </div>

        <div class="inputbox">
            <label>Mettől: </label>
            <label>
                <input type="date" name="mettol">
            </label>
        </div>
        <div class="inputbox">
            <label>Meddig: </label>
            <label>
                <input type="date" name="meddig">
            </label>
        </div>
    </fieldset>
    <div id="two" class="button" >
        <input type="submit" value="Felvitel!" name="felvisz">
    </div>
    </form>
    <fieldset>
        <legend><em>Foglalasok listája</em></legend>
        <table border="1">
            <tr>
                <th>Személyi szám</th>
                <th>Szobaszám</th>
                <th>Mettől</th>
                <th>Meddig</th>
            </tr>

            <?php

            $foglalsok = foglalaslistaLeker(); // ez egy eredményhalmazt ad vissza

            // soronként dolgozzuk fel az eredményt
            // minden sort egy asszociatív tömbben kapunk meg
            while ($egySor = mysqli_fetch_assoc($foglalsok)) {
                echo '<tr>';
                echo '<td>'.$egySor["szemelyiszam"].'</td>';
                echo '<td>'.$egySor["szobaszam"].'</td>';
                echo '<td>'.date_format(date_create($egySor["mettol"]),'Y. m .d').'</td>';
                echo '<td>'.date_format(date_create($egySor["meddig"]),'Y. m .d').'</td>';
                echo '<td><form method="POST" action="foglalastorles.php">
                        <input type="hidden" name="toroltfoglalas" value="'.$egySor["szemelyiszam"].'"/>
                        <input type="submit" value="Fizetve"/>
                        </form></td>';
                echo '</tr>';
            }
            mysqli_free_result($foglalsok);
            ?>

        </table>
    </fieldset>
</main>
<div class="footer-dark">
    <?php include "footer.php"; ?>

</div>
</body>
</html>
