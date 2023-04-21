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
        <h1>Szobák módosítása</h1>
    </div>
    <nav>
        <ul>
            <li><a href="vendeg.php">Vendég</a></li>
            <li><a href="foglalas.php">Foglalás</a></li>
            <li><a href="szobak.php" class="current">Szobák</a></li>
            <li><a href="vendeg.php">Vissza</a></li>
        </ul>
    </nav>
</header>
<?php
//vendegadatok
$v_szobaszam = $_POST["szobaszam"];
$v_szobaszam = htmlspecialchars($v_szobaszam);
$szobaadat = szobaadatot_leker($v_szobaszam);
?>
<main>
    <form method="POST" action="szobamodosit.php" accept-charset="utf-8">
        <fieldset>
            <legend><em>Személyes adatok</em></legend>
            <div class="inputbox">
                <label>Szoba szám: </label>
                <label class="mezok">
                    <?php
                    echo '<input type="text" name="szobaszam" value="'.$v_szobaszam.'">'
                    ?>
                </label>
            </div>

            <div class="inputbox">
                <label>Szobatípus</label>
                <label>
                    <select name="szobatipus">
                        <?php
                        if ($szobaadat["szobatipus"] == "francia"){
                            echo '<option value="fracia" selected>francia</option>';
                            echo '<option value="csaladi">csaladi</option>';
                            echo '<option value="kulonagyas">kulonagyas</option>';
                        } elseif ($szobaadat["szobatipus"] == "csaladi"){
                            echo '<option value="fracia">francia</option>';
                            echo '<option value="csaladi" selected>csaladi</option>';
                            echo '<option value="kulonagyas">kulonagyas</option>';
                        } else {
                            echo '<option value="fracia">francia</option>';
                            echo '<option value="csaladi">csaladi</option>';
                            echo '<option value="kulonagyas" selected>kulonagyas</option>';
                        }

                        ?>
                    </select>
                </label>
            </div>

            <div class="inputbox">
                <label>Hány fős? </label>
                <label>
                    <?php
                    echo '<input type="text" name="fo" value="'.$szobaadat["fo"].'">'
                    ?>
                </label>
            </div>

        </fieldset>
        <div id="two" class="button" >
            <input type="submit" value="Módosít!" name="modosit">
        </div>
    </form>
    <form action="szobatorles.php" method="POST">
        <?php
        echo '<input type="hidden" name="szobaszam" value="'.$v_szobaszam.'">';
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
