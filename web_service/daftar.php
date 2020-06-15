<?php 

function hari_ini(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return "<b>" . $hari_ini . "</b>";
 
}
session_start(); 
error_reporting(0);
include "koneksi.php";
$username=$_POST['username'];
$emai=$_POST['emai'];
$jam=$_POST['jam'];


if(!empty($username&&$emai)){

		$tgl=date('Y-m-d');
		
		mysql_query("INSERT INTO `datapresensi`( `id_user`, `id_jadwal`, `TanggalPresensi`, `PresensiMasuk`, `TanggalBuat`, `Email`, `Tipe`) VALUES ('$username','$hari','$tgl','$jam',NOW(),'$emai','Keluar')")
	
		
		$response["success"]      = 1;
		$response["message"]      = "Login Berhasil";
		die(json_encode($response));
      
	
}else{
		$response["success"] = 0;
		$response["message"] = "gagal presensi";
		die(json_encode($response));
}
         

?>
