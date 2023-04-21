<?php

function szalloda_csatlakozas() {

    $conn = mysqli_connect("localhost", "recepciós", "Belépek123") or die("Csatlakozási hiba");
    if ( false == mysqli_select_db($conn, "szalloda" )  ) {
        return null;
    }

    // a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
    mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, 'SET character_set_results=utf8');
    mysqli_set_charset($conn, 'utf8');

    return $conn;

}
function vendeget_beszur($szemelyiszam, $nev, $lakcim, $szulido, $mail, $tel, $arkod) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO vendegek(szemelyiszam, nev, lakcim, szulido, email, telszam, arkod) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "ssssssi", $szemelyiszam, $nev, $lakcim, $szulido, $mail, $tel, $arkod);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }
    header("Location: vendeg.php");
    /** @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection */
    mysql_close($conn);
    return $success;
}
function szobat_beszur($szobaszam, $szobatipus, $fo) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO szoba(szobaszam, szobatipus, fo) VALUES (?, ?, ?)");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "isi", $szobaszam, $szobatipus, $fo);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }
    header("Location: szobak.php");
    /** @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection */
    mysql_close($conn);
    return $success;
}
function foglalast_beszur($szemelyiszam, $szobaszam, $mettol, $meddig) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO foglal(szemelyiszam, szobaszam, mettol, meddig) VALUES (?, ?, ?, ?)");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "siss", $szemelyiszam, $szobaszam, $mettol, $meddig);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }
    header("Location: foglalas.php");
    /** @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection */
    mysql_close($conn);
    return $success;
}
function ar_beszur($arkod, $megnevezes, $dij) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO ar (arkod, megnevezes, dij) VALUES (?, ?, ?)");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "isi", $arkod, $megnevezes, $dij);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }
    header("Location: ar.php");
    /** @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection */
    mysql_close($conn);
    return $success;
}
function vendeglistaLeker() {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT szemelyiszam, nev, lakcim, szulido, email, telszam, arkod FROM vendegek")or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function szobalistaLeker() {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT szobaszam, fo, szobatipus FROM szoba")or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function foglalaslistaLeker() {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT szemelyiszam, szobaszam, mettol, meddig FROM foglal")or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function arlistaLeker() {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT arkod, megnevezes, dij FROM ar")or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function vendeget_modosit($szemelyiszam, $nev, $lakcim, $szulido, $mail, $tel, $arkod) {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"UPDATE vendegek SET nev=?, lakcim=?, szulido=?, email=?, telszam=?, arkod=? WHERE szemelyiszam = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "ssssiis", $nev, $lakcim, $szulido, $mail, $tel, $arkod, $szemelyiszam);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }

    /** @noinspection PhpElementIsNotAvailableInCurrentPhpVersionInspection */
    mysqli_close($conn);
    return $success;
}
function szobat_modosit($szobaszam, $szobatipus, $fo) {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"UPDATE szoba SET szobatipus=?, fo=? WHERE szobaszam = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "sii", $szobatipus, $fo, $szobaszam);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }

    mysqli_close($conn);
    return $success;
}
function foglalast_modosit($szemelyiszam, $szobaszam, $mettol, $meddig) {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"UPDATE foglal SET szobaszam=?, mettol=?, meddig=? WHERE szemelyiszam = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "isss", $szobaszam, $mettol, $meddig, $szemelyiszam);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }
    mysqli_close($conn);
    return $success;
}
function ar_modosit($arkod, $megnevezes, $dij) {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"UPDATE ar SET megnevezes=?, dij=? WHERE arkod = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "sii", $megnevezes, $dij, $arkod);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }
    mysqli_close($conn);
    return $success;
}
function vendegadatot_leker($szemelyiszam) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"SELECT szemelyiszam, nev, lakcim, szulido, email, telszam, arkod FROM vendegek WHERE szemelyiszam=?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $szemelyiszam);

    $result = mysqli_stmt_execute($stmt);
    if ($result == false) {
        die(mysqli_errno($conn));
    }

    //minden eredmeny oszlophoz egy valtozot rendelunk
    mysqli_stmt_bind_result($stmt, $szemelyiszam, $nev, $lakcim, $szulido, $mail, $tel, $arkod);

    $reader = array();
    mysqli_stmt_fetch($stmt);
    $reader["szemelyiszam"] = $szemelyiszam;
    $reader["nev"] = $nev;
    $reader["lakcim"] = $lakcim;
    $reader["szulido"] = $szulido;
    $reader["email"] = $mail;
    $reader["telszam"] = $tel;
    $reader["arkod"] = $arkod;

    mysqli_close($conn);
    return $reader;
}
function szobaadatot_leker($szobaszam) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"SELECT szobaszam, szobatipus, fo arkod FROM szoba WHERE szobaszam=?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "i", $szobaszam);

    $result = mysqli_stmt_execute($stmt);
    if ($result == false) {
        die(mysqli_errno($conn));
    }

    //minden eredmeny oszlophoz egy valtozot rendelunk
    mysqli_stmt_bind_result($stmt, $szobaszam, $szobatipus, $fo);

    $reader = array();
    mysqli_stmt_fetch($stmt);
    $reader["szobaszam"] = $szobaszam;
    $reader["szobatipus"] = $szobatipus;
    $reader["fo"] = $fo;


    mysqli_close($conn);
    return $reader;

}
function foglaltadatot_leker($szemelyiszam) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"SELECT szemelyiszam, szobaszam, mettol, meddig FROM foglal WHERE szemelyiszam=?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "i", $szemelyiszam);

    $result = mysqli_stmt_execute($stmt);
    if ($result == false) {
        die(mysqli_errno($conn));
    }

    //minden eredmeny oszlophoz egy valtozot rendelunk
    mysqli_stmt_bind_result($stmt, $szemelyiszam, $szobaszam, $mettol, $meddig);

    $reader = array();
    mysqli_stmt_fetch($stmt);
    $reader["szemelyiszam"] = $szemelyiszam;
    $reader["szobaszam"] = $szobaszam;
    $reader["mettol"] = $mettol;
    $reader["meddig"] = $meddig;

    mysqli_close($conn);
    return $reader;

}
function aradatot_leker($arkod) {

    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"SELECT arkod, megnevezes, dij FROM ar WHERE arkod=?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "i", $arkod);

    $result = mysqli_stmt_execute($stmt);
    if ($result == false) {
        die(mysqli_errno($conn));
    }
    //minden eredmeny oszlophoz egy valtozot rendelunk
    mysqli_stmt_bind_result($stmt, $arkod, $megnevezes, $dij);

    $reader = array();
    mysqli_stmt_fetch($stmt);
    $reader["arkod"] = $arkod;
    $reader["megnevezes"] = $megnevezes;
    $reader["dij"] = $dij;

    mysqli_close($conn);
    return $reader;
}
function vendeget_torol($szemelyiszam){
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM vendegek WHERE szemelyiszam = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $szemelyiszam);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }

    mysqli_close($conn);
    return $success;
}
function szobat_torol($szobaszam){
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM szoba WHERE szobaszam = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "i", $szobaszam);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }

    mysqli_close($conn);
    return $success;
}
function foglalast_torol($szemelyiszam){
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM foglal WHERE szemelyiszam = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "s", $szemelyiszam);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }

    mysqli_close($conn);
    return $success;
}
function arat_torol($arkod){
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"DELETE FROM ar WHERE arkod = ?");

    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "i", $arkod);

    // lefuttatjuk az SQL utasitast
    $success = mysqli_stmt_execute($stmt);
    // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
    // vegrehajtani az utasitast
    if ($success == false) {
        die(mysqli_errno($conn));
    }

    mysqli_close($conn);
    return $success;
}
function szabad_szemelyiszamokat_listaz(){
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    $result = mysqli_query($conn,"SELECT szemelyiszam, nev FROM vendegek WHERE szemelyiszam NOT IN(SELECT szemelyiszam FROM foglal WHERE fizetve IS NULL)") or die(mysqli_error());

    if ($result == false) {
        die(mysqli_errno($conn));
    }

    mysqli_close($conn);
    return $result;
}

//lekerdezesek
function tvlistaLeker() {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT szobaszam FROM felszerelt WHERE tv LIKE 'van'")or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function ketfoslistaLeker() {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT szobaszam, szobatipus FROM  szoba WHERE fo = 2 AND szobatipus LIKE 'kulonagyas'")or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function osszetettlistaLeker() {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT ar.megnevezes, vendegek.arkod, COUNT(*) AS db FROM vendegek, ar WHERE vendegek.arkod = ar.arkod GROUP BY vendegek.arkod")
    or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
function legidosebblistaLeker() {
    if ( !($conn = szalloda_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }

    // elokeszitjuk az utasitast
    $result = mysqli_query( $conn,"SELECT vendegek.nev, ar.megnevezes, MAX(YEAR( FROM_DAYS( DATEDIFF(CURRENT_DATE , vendegek.szulido) ) )) AS eletkor 
FROM vendegek, ar WHERE vendegek.arkod = ar.arkod GROUP BY ar.megnevezes;")
    or die("Hibás lekérdezés".mysqli_error($conn));

    mysqli_close($conn);
    return $result;
}
?>