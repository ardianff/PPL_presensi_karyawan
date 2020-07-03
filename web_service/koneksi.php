
<?php
error_reporting(0);
$host = "localhost";
$user = "root";      
$password = "";      
$database = "face";   
	
  $konek_db = ($GLOBALS["___mysqli_ston"] = mysqli_connect($host,  $user, $password));	
  $find_db = mysqli_select_db($GLOBALS["___mysqli_ston"], $database) ;
if(! $konek_db )
{
  die('Gagal Koneksi: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}


?>


