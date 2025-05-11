<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = mysqli_connect("localhost", "root", "", "praktikum5");

if ($db->connect_error) {
    echo "Koneksi Database Rusak";
    die("Error!");
}

?>