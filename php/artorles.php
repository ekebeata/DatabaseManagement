<?php
include_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,

$v_arkod = $_POST['arkod'];

// ellenőrizzük azt is, hogy kaptak-e értéket
if ( isset($v_arkod)) {

    //adat tisztitas
    $v_tiszta_arkod = htmlspecialchars($v_arkod);

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = arat_torol($v_tiszta_arkod);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: ar.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

