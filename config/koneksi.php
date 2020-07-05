<?php
error_reporting(0);
$server = "localhost";
$username = "root";
$password = "";
$database = "presensiface";

// Koneksi dan memilih database di server
($GLOBALS["___mysqli_ston"] = mysqli_connect($server, $username, $password)) or die("Koneksi gagal");
mysqli_select_db($GLOBALS["___mysqli_ston"], $database) or die("Database tidak bisa dibuka");

?>
