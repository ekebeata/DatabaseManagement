<?php

require_once("fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_szemelyiszam = $_POST['szemelyiszam'];
$v_nev = $_POST['nev'];
$v_lakcim = $_POST['lakcim'];
$v_szulido = $_POST['szulido'];
$v_mail = $_POST['mail'];
$v_tel = $_POST['tel'];
$v_arkod = $_POST['arkod'];

if ( isset($v_szemelyiszam) && isset($v_nev) && isset($v_lakcim) && isset($v_szulido) && isset($v_mail) && isset($v_tel) && isset($v_arkod) ) {

    //adat tisztitas
    $v_tiszta_szemelyiszam = htmlspecialchars($v_szemelyiszam);
    $v_tiszta_nev = htmlspecialchars($v_nev);
    $v_tiszta_lakcim = htmlspecialchars($v_lakcim);
    $v_tiszta_szulido = htmlspecialchars($v_szulido);
    $v_tiszta_mail = htmlspecialchars($v_mail);
    $v_tiszta_tel = htmlspecialchars($v_tel);
    $v_tiszta_arkod = htmlspecialchars($v_arkod);


    // beszúrjuk az új rekordot az adatbázisba
    $sikeres = vendeget_beszur($v_szemelyiszam, $v_nev, $v_lakcim, $v_szulido, $v_mail, $v_tel, $v_arkod);

    if ($sikeres == false) {
        die("Nem sikerült felvinni rekordot");
    } else {
        // visszatérünk az index.php-re
        header("Location: vendeg.php");
    }

} else {
    error_log("Nincs beállítva valamely érték");
}

