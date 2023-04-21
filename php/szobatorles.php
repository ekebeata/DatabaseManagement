<?php
include_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,

$v_szobaszam = $_POST['szobaszam'];

// ellenőrizzük azt is, hogy kaptak-e értéket
if ( isset($v_szobaszam)) {

    //adat tisztitas
    $v_tiszta_szobaszam = htmlspecialchars($v_szobaszam);

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = szobat_torol($v_tiszta_szobaszam);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: szobak.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

