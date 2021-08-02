<?php 
if (!isset($_SESSION)) {

    session_start();
    
    }
error_reporting(0);
include "koneksi.php";
$username=$_POST['Signin'];
$password=$_POST['Password'];


if(!empty($username)&& !empty($password)){
	$select = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan  WHERE username='$username' and `password`=md5('$password')  limit 1");
	// and id_level='3'  and Verifikasi='Y'
	$sql = mysqli_fetch_array($select);
	if(empty($sql)){
		$response["success"] = 0;
		$response["message"] = "User Atau Password Mungkin Salah!";
		die(json_encode($response));
  
	}else{

		    mysqli_query($GLOBALS["___mysqli_ston"], "INSERT into lastlogin (id_user,TanggalBuat) values ('$sql[id]',NOW())");
		
		$response['level']        = $sql['id_level'];
		$response['id'] 		  = $sql['id'];
		$response["success"]      = 1;
		$response["message"]      = "Login Berhasil";
		die(json_encode($response));
      
	}
}
         

?>
