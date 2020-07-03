<?php
		error_reporting(0);
		include "koneksi.php";
	 $response = array();
         $result = mysqli_query($GLOBALS["___mysqli_ston"], "Select * from slider  order by id_slider desc");

         $cekdata=mysqli_num_rows($result);
        
        if ($cekdata <1) {
             
            $response["success"] = 0;
            $response["message"] = "kosong";
            die(json_encode($response));
        }
        else{ 
            while($row = mysqli_fetch_array($result)){
        	

        		$tmp = array();
       			$tmp["id"] = $row["id_slider"];
             	$tmp["Nama"] = $row["Nama"];
            
                $tmp["image"] = $row["Slider"];
           	 $tmp["url"] = $row["Url"];
                $tmp["message"] = "ada";
        		
        
        array_push($response, $tmp);

    }
  
    }

   
    header('Content-Type: application/json');
    echo json_encode($response);    
    


