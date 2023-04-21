<?php
include_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,

$v_szemelyiszam = $_POST['szemelyiszam'];

// ellenőrizzük azt is, hogy kaptak-e értéket
if ( isset($v_szemelyiszam)) {

    //adat tisztitas
    $v_tiszta_szemelyiszam = htmlspecialchars($v_szemelyiszam);

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = vendeget_torol($v_tiszta_szemelyiszam);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: vendeg.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

