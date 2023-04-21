<?php

require_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_szemelyiszam = $_POST['szamelyiszam'];
$v_szobaszam = $_POST['szobaszam'];
$v_mettol = $_POST['mettol'];
$v_meddig = $_POST['meddig'];

if ( isset($v_szemelyiszam) && isset($v_szobaszam) && isset($v_mettol) && isset($v_meddig)) {

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = foglalast_beszur($v_szemelyiszam, $v_szobaszam, $v_mettol, $v_meddig);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: foglalas.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

