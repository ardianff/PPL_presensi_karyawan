<?php
    error_reporting(0);
   include "koneksi.php";
    $response = array();
   
$username=$_GET['username'];
$cari=$_GET['cari'];



   if (empty($cari)||$cari=="") {
     
$result = mysql_query("SELECT * from datapresensi where id_user='$username' order by TanggalPresensi DESC");

   }else{

$result = mysql_query("SELECT * from datapresensi where id_user='$username' and TanggalPresensi like '%$cari%'  order by TanggalPresensi DESC");

   }

   

$cekquery=mysql_num_rows($result);

if ($cekquery<1) {
       $response["success"] = 0;
            $response["message"] = "kosong";
            die(json_encode($response));
    }else{
      while($sql = mysql_fetch_array($result)){
      

        $tmp = array();
       
             
        $tmp['id']         = $sql['id'];
		$tmp['tanggal']     = $sql['TanggalPresensi'];

    if ($sql[PresensiMasuk]=="") {
      $pre=$sql[PresensiKeluar];
    }else{
       $pre=$sql[PresensiMasuk];
    }
		        $tmp['jam']        = $pre;
		        $tmp['tipe']    = $sql['Tipe'];
            $tmp["success"] = 0;
            $tmp["message"] = "ada";
                


              
        
        array_push($response, $tmp);
    }
    }
 

    header('Content-Type: application/json');
    echo json_encode($response);    
    ?>


