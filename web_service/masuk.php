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
 
	return $hari_ini;
 
}
session_start(); 
error_reporting(0);
include "koneksi.php";
$username=$_POST['username'];
$emai=$_POST['emai'];
$jam=$_POST['jam'];
$hari=hari_ini();

$namafoto = $_POST['namafoto'];
$foto = $_POST['foto'];


if(!empty($username&&$emai)){
		$tgl=date('Y-m-d');
		$cekemai=mysql_num_rows(mysql_query("SELECT * from datapresensi where   TanggalPresensi='$tgl'  and `emai`='$emai'"));
		
		if ($cekemai==2) {
		$response["success"] = 3;
		$response["message"] = "gagal presensi";
		die(json_encode($response));
		}else{

		$cekmasuk=mysql_num_rows(mysql_query("SELECT * from datapresensi where id_user='$username' and TanggalPresensi='$tgl' and Tipe='Masuk'"));
		
		if ($cekmasuk==1) {
		$response["success"] = 4;
		$response["message"] = "gagal presensi";
		die(json_encode($response));
		}else{

		mysql_query("INSERT INTO `datapresensi`( `id_user`, `Hari`, `TanggalPresensi`, `PresensiMasuk`, `TanggalBuat`, `Emai`, `Tipe`,`Foto`) VALUES ('$username','$hari','$tgl','$jam',NOW(),'$emai','Masuk','$namafoto')");

		$path = "foto/".$namafoto;
		file_put_contents($path,base64_decode($foto));
	
		
		$response["success"]      = 1;
		$response["message"]      = "Absen Berhasil";
		die(json_encode($response));
		}

		
      
		}


	
}else{
		$response["success"] = 0;
		$response["message"] = "gagal presensi";
		die(json_encode($response));
}
         

?>
