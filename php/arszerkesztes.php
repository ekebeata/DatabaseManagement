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
            <li><a href="foglalas.php">Foglalás</a></li>
            <li><a href="szobak.php">Szobák</a></li>
            <li><a href="ar.php" class="current">Árak</a></li>
            <li><a href="kezdooldal.php">Fő oldal</a></li>
        </ul>
    </nav>
</header>
<?php
//vendegadatok
$v_arkod = $_POST["arkod"];
$v_arkod = htmlspecialchars($v_arkod);
$aradat = aradatot_leker($v_arkod);
?>
<main>
    <form method="POST" action="armodosit.php" accept-charset="utf-8">
        <fieldset>
            <legend><em>Áraink</em></legend>
            <div class="inputbox">
                <label>Árkód: </label>
                <label class="mezok">
                    <?php
                    echo '<input type="text" name="arkod" value="'.$v_arkod.'">'
                    ?>
                </label>
            </div>

            <div class="inputbox">
                <label>Megnevezés: </label>
                <label>
                    <?php
                    echo '<input type="text" name="megnevezes" value="'.$aradat["megnevezes"].'">'
                    ?>
                </label>
            </div>

            <div class="inputbox">
                <label>Díj: </label>
                <label>
                    <?php
                    echo '<input type="text" name="dij" value="'.$aradat["dij"].'">'
                    ?>
                </label>
            </div>
        </fieldset>
        <div id="two" class="button" >
            <input type="submit" value="Módosít!" name="modosit">
        </div>
    </form>
    <form action="artorles.php" method="POST">
        <?php
        echo '<input type="hidden" name="arkod" value="'.$v_arkod.'">';
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
