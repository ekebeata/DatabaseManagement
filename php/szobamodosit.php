<?php
include_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
$v_szobaszam = $_POST['szobaszam'];
$v_szobatipus = $_POST['szobatipus'];
$v_fo = $_POST['fo'];

// ellenőrizzük azt is, hogy kaptak-e értéket
if ( isset($v_szobaszam) && isset($v_szobatipus) && isset($v_fo) ) {

    //adat tisztitas
    $v_tiszta_szobaszam = htmlspecialchars($v_szobaszam);
    $v_tiszta_szobatipus = htmlspecialchars($v_szobatipus);
    $v_tiszta_fo = htmlspecialchars($v_fo);

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = szobat_modosit($v_szobaszam, $v_szobatipus, $v_fo);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: szobak.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

