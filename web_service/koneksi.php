
<?php
error_reporting(0);
$host = "localhost";
$user = "root";      
$password = "";      
$database = "presensiface";   
	
  $konek_db = mysql_connect($host, $user,$password);	
  $find_db = mysql_select_db($database) ;
if(! $konek_db )
{
  die('Gagal Koneksi: ' . mysql_error());
}


?>


