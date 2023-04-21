<?php
require_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <meta name="author" content="Eke Beáta" />

    <title>Szálloda</title>
    <link rel="icon" href="../img/logo1.jpg" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>
<body>
<header>
    <div id="cim">
        <h1>Vendég adatainak módosítása</h1>
    </div>
    <nav>
        <ul>
            <li><a href="vendeg.php" class="current">Vendég</a></li>
            <li><a href="foglalas.php">Foglalás</a></li>
            <li><a href="szobak.php">Szobák</a></li>
            <li><a href="vendeg.php">Vissza</a></li>
        </ul>
    </nav>
</header>
<?php
    //vendegadatok
    $v_szemelyiszam = $_POST["szemelyiszam_kulcs"];
    $v_szemelyiszam = htmlspecialchars($v_szemelyiszam);
    $vendegadat = vendegadatot_leker($v_szemelyiszam);
?>
<main>
    <form method="POST" action="vendegmodosit.php" accept-charset="utf-8">
    <fieldset>
        <legend><em>Személyes adatok</em></legend>
        <div class="inputbox">
            <label>Személyi száma: </label>
            <label class="mezok">
                <?php
                echo '<input type="text" name="szemelyiszam" value="'.$v_szemelyiszam.'">'
                ?>
            </label>
        </div>

        <div class="inputbox">
            <label>Név: </label>
            <label>
                <?php
                echo '<input type="text" name="nev" value="'.$vendegadat["nev"].'">'
                ?>
            </label>
        </div>

        <div class="inputbox">
            <label>Lakcím: </label>
            <label>
                <?php
                echo '<input type="text" name="lakcim" value="'.$vendegadat["lakcim"].'">'
                ?>
            </label>
        </div>

        <div class="inputbox">
            <label>Születési idő: </label>
            <label>
                <?php
                echo '<input type="text" name="szulido" value="'.$vendegadat["szulido"].'">'
                ?>
            </label>
        </div>

        <div class="inputbox">
            <label>Email cím: </label>
            <label>
                <?php
                echo '<input type="text" name="mail" value="'.$vendegadat["email"].'">'
                ?>
            </label>
        </div>

        <div class="inputbox">
            <label>Telefonszám: </label>
            <label>
                <?php
                echo '<input type="text" name="tel" value="'.$vendegadat["telszam"].'">'
                ?>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend><em>Árkód</em></legend>
        <div class="inputbox">
            <label>
                <select name="arkod">
                    <?php
                        for ($i=1; $i<5; $i++){
                            if ($vendegadat["arkod"] == $i){
                                echo '<option value="'.$i.'" selected>'.$i.'</option>';
                            } else {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        }
                    ?>
                </select>
            </label>
        </div>
    </fieldset>
    <div id="two" class="button" >
        <input type="submit" value="Módosít!" name="modosit">
    </div>
    </form>
    <form action="vendegtorles.php" method="POST">
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
