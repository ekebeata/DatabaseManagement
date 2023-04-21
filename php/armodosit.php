<?php

require_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket
$v_arkod = $_POST['arkod'];
$v_megnevezes = $_POST['megnevezes'];
$v_dij = $_POST['dij'];


if ( isset($v_arkod) && isset($v_megnevezes) && isset($v_dij) ) {

    //adat tisztitas
    $v_tiszta_arkod = htmlspecialchars($v_arkod);
    $v_tiszta_megnevezes = htmlspecialchars($v_megnevezes);
    $v_tiszta_dij = htmlspecialchars($v_dij);

    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = ar_modosit($v_tiszta_arkod, $v_tiszta_megnevezes, $v_tiszta_dij);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: ar.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

