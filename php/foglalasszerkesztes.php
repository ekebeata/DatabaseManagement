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
    <link rel="stylesheet" type="text/css" href="../css/lekerdezes.css" />

</head>
<body>
<header>
    <div id="cim">
        <h1>Adatok aktualizálása</h1>
    </div>
    <nav>
        <ul>
            <li><a href="vendeg.php">Vendég</a></li>
            <li><a href="foglalas.php" class="current">Foglalás</a></li>
            <li><a href="szobak.php">Szobák</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<?php
$v_szemelyiszam = $_POST["szemelyiszam"];
$v_szemelyiszam = htmlspecialchars($v_szemelyiszam);
$foglaltadat = foglaltadatot_leker($v_szemelyiszam);
?>
<main>
    <form method="POST" action="foglalastmodosit.php" accept-charset="utf-8">
        <fieldset>
            <legend><em>Foglalás</em></legend>
            <div class="inputbox">
                <label>Személyi száma: </label>
                <label class="mezok">
                    <select name="szemelyiszam">
                        <?php
                        $szabadSzemelyiszamok = vendeglistaLeker();
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
    </form>
    <div id="two" class="button" >
        <input type="submit" value="Módosít!" name="modosit">
    </div>
    </form>
    <form action="foglalastorles.php" method="POST">
        <?php
        echo '<input type="hidden" name="szemelyiszam" value="'.$v_szemelyiszam.'">';
        ?>
        <div id="two" class="button" >
            <input type="submit" value="Töröl!" name="torol">
        </div>
    </form>

</main>
<div class="footer-dark">
    <?php include "footer.php"; ?>

</div>
</body>
</html>
