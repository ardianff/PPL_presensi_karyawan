<?php
error_reporting(0);
include "koneksi.php";

    	   $username=$_GET['username'];

         $id=mysql_fetch_assoc(mysql_query("select id from karyawan where username='$username'"));
         $response = array();
   
    
         $result = mysql_query("SELECT * FROM `notifikasi` WHERE iduser='$id[id]'");
         $count=mysql_num_rows($result);
         
        
        $cekdata=mysql_num_rows($result);
        if ($cekdata <1) {
            $response["success"] = 0;
            $response["message"] = "kosong";
            die(json_encode($response));
        }
        else{ 
         while($row = mysql_fetch_array($result)){
         $tmp = array();
          
           $tmp["judul"] = $row["judul"];
           $tmp["isi"] = $row["isi"];
           $tmp["tanggal"] = $row["tanggal"];
            $tmp["status"] = $row["NA"];
          
           $tmp["message"] = "ada"; 
        array_push($response, $tmp);

    }
   $n++;


    }
    
    header('Content-Type: application/json');
    echo json_encode($response);


