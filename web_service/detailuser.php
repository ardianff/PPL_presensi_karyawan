<?php
error_reporting(0);
include "koneksi.php";
include "rupiah.php";
$response = array();

$username=$_GET['username'];




$result = mysqli_query($GLOBALS["___mysqli_ston"], "select * from karyawan where username='$username'");




  $cekquery=mysqli_num_rows($result);

  if ($cekquery<1) {
      $response["success"] = 0;
      $response["message"] = "kosong";
      die(json_encode($response));
  } else {
      while ($sql = mysqli_fetch_array($result)) {
          $tmp = array();


          $tmp['id']         = $sql['id'];
          $tmp['nama']     = $sql['nama'];
          $tmp['alamat']     = $sql['alamat'];
           $tmp['tanggallahir']     = $sql['tanggallahir'];
          $tmp['foto']     = $sql['Foto'];

          $tmp['under']    = "N";
           $tmp['lahir']    = $sql['phone'];
           
          $tmp["success"] = 1;
          $tmp["message"] = "ada";





          array_push($response, $tmp);
      }
  }


  header('Content-Type: application/json');
  echo json_encode($response);
