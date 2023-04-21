<?php
include_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,

$v_szemelyiszam = $_POST['szemelyiszam'];
$v_szobaszam = $_POST['szobaszam'];
$v_mettol = $_POST['mettol'];
$v_meddig = $_POST['meddig'];
// ellenőrizzük azt is, hogy kaptak-e értéket
if ( isset($v_szemelyiszam) && isset($v_szobaszam) && isset($v_mettol) && isset($v_meddig) ) {

    //adat tisztitas
    $v_tiszta_szemelyiszam = htmlspecialchars($v_szemelyiszam);
    $v_tiszta_szobaszam = htmlspecialchars($v_szobaszam);
    $v_tiszta_mettol = htmlspecialchars($v_mettol);
    $v_tiszta_meddig = htmlspecialchars($v_meddig);

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = foglalast_modosit($v_tiszta_szemelyiszam, $v_tiszta_szobaszam, $v_tiszta_mettol, $v_tiszta_meddig);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: foglalas.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

