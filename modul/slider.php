<?php
    error_reporting(0);
    session_start();
  include  "config/koneksi.php";
 
  if(!isset($_SESSION['username'])){
  
    header('location:index.php');
  }


    if (isset($_POST['submit'])) {


              $target_dir = "assets/slider/";
              $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      echo "File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      echo "File is not an image.";
                      $uploadOk = 0;
                  }
              }
              // Check if file already exists
              if (file_exists($target_file)) {
                  
        echo "<script>window.alert('File sudah ada !!!')
        window.location='media.php?module=slider'</script>";
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                 
 echo "<script>window.alert('File terlalu besar !!!')
        window.location='media.php?module=slider'</script>";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {

               echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed. !!!')
                      window.location='media.php?module=slider'</script>";
                 
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "<script>window.alert('Sorry, your file was not uploaded. !!!')
                      window.location='media.php?module=slider'</script>";
               
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                     echo "<script>window.alert('File  berhasil disimpan. !!!')
                      window.location='media.php?module=slider'</script>";

                      $brkas=$_FILES['fileToUpload']['name'];

                      mysql_query("INSERT INTO `slider`(`Nama`, `Slider`,`TanggalBuat`) VALUES ('$_POST[nama]','$brkas',NOW())");
                      
                  } else {
                     echo "<script>window.alert('Sorry, there was an error uploading your file. !!!')
                      window.location='media.php?module=slider'</script>";
                     
                  }
              }
        

      }elseif ($_GET[delete]=="y") {
      mysql_query("DELETE FROM `slider` WHERE id_slider='$_GET[id]'");

     echo "<script>window.alert('Data Berhasil dihapus. !!!')
                      window.location='media.php?module=slider'</script>";
    }elseif (isset($_POST[simpanedit])) {

      if (empty($_FILES["fileToUpload"]["name"])) {
         mysql_query("UPDATE `slider` SET `Nama`='$_POST[nama]' WHERE id_slider='$_GET[id]'");
 echo "<script>window.alert('Data BErhasil Diupdate. !!!')
                      window.location='media.php?module=slider'</script>";
      }

      
              $target_dir = "assets/slider/";
              $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              // Check if image file is a actual image or fake image
              if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                      echo "File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      echo "File is not an image.";
                      $uploadOk = 0;
                  }
              }
              // Check if file already exists
              if (file_exists($target_file)) {
                  
        echo "<script>window.alert('File sudah ada !!!')
        window.location='media.php?module=slider'</script>";
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                 
 echo "<script>window.alert('File terlalu besar !!!')
        window.location='media.php?module=slider'</script>";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {

               echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed. !!!')
                      window.location='media.php?module=slider'</script>";
                 
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "<script>window.alert('Sorry, your file was not uploaded. !!!')
                      window.location='media.php?module=slider'</script>";
               
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                     echo "<script>window.alert('File  berhasil disimpan. !!!')
                      window.location='media.php?module=slider'</script>";

                      $brkas=$_FILES['fileToUpload']['name'];

                       mysql_query("UPDATE `slider` SET `Nama`='$_POST[nama]',`Slider`='$brkas' WHERE id_slider='$_GET[id]'");
                  } else {
                     echo "<script>window.alert('Sorry, there was an error uploading your file. !!!')
                      window.location='media.php?module=slider'</script>";
                     
                  }
              }

       

    
     
    }


    switch($_GET[act]){
       default:
       ?>



  <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Master Slider</h2>
                                           <hr/>

                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Tambah Gambar</button><br/><br/>


                                           <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                  
                              <th class="wd-15p">Nama</th>
                              <th class="wd-20p">Foto</th>
                              <th class="wd-15p">Tanggal Buat</th>
                             
                              
                         <th class="wd-10p">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                           if ($_SESSION[level]=="1") {
                              $query=mysql_query("SELECT * from slider  order by id_slider desc");
                            }
                            $no;
                            while ($q=mysql_fetch_array($query)) {
                              $no++;
                             

                             echo "
                              <tr>
                              <td>$no</td>
                              
                                <td>$q[Nama]</td>";
                                  ?>

                                 <td><a href="" onclick="gambar('assets/slider/<?php echo $q[Slider] ?>')" data-toggle="modal" data-target="#ambilgambar"><center><img src="assets/slider/<?php echo $q[Slider] ?>" width='100px'></center></a></td>

                                 <?php echo"
                               
                                <td>$q[TanggalBuat] </td>
                                 
                                ";

                                  
                                
                                echo"<td><a href=\"media.php?module=slider&act=edit&id=$q[id_slider]\" ><span class=\"badge badge-warning\">Edit</span></a> <a href=\"media.php?module=slider&delete=y&id=$q[id_slider]\" ><span class=\"badge badge-danger\">Hapus</span></a>
                                 </td>
                              </tr>";



                              
                            }


                            ?>
                       
                          
                          </tbody>
                        </table>
                </div>



                  <div class="modal fade" id="ambilgambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" id="largeModalLabel">Foto</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                                      
                        <p id="gbr" align="center" ></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                  </div>
                </div>


                  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" id="largeModalLabel">Tambah Slider</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form method="post" action="" enctype="multipart/form-data">
                 <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"  placeholder="Nama" name="nama" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Pilih File</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                          </div>
                          
                          

                          

                  
                   


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                     
                    </div>
                  </div>
                </div>
              </div>
               </form>


       <?php
        break;
      


         case 'edit':
      $edit=mysql_fetch_assoc(mysql_query("SELECT * from slider WHERE id_slider='$_GET[id]'"));

     

        ?>

        

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Edit</h2>
                                           <hr/>
                      <form method="post" action="" enctype="multipart/form-data">

                          <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?php echo $edit[Nama]; ?>">
                          </div>


                          <div class="form-group">
                            <label class="form-label">Gambar Awal </label><br/>
                           <img src="assets/slider/<?php echo $edit[Slider]; ?>" width=100px>
                          </div>
                           

                  <div class="form-group">
                            <label class="form-label">Ganti File</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                          </div>
                          
                          


                    <button type="submit" name="simpanedit" class="mt-2 btn btn-block btn-success mt-1 mb-1">Simpan</button>
               </form>

        <?php
        break;

        case 'detail':
          ?>

         
          <?php
          break;
    
    }

?>


<script language="javascript" type="text/javascript">
  function gambar(gambarnya){
    var maincontent = "";
    maincontent = "<p><img src='" + gambarnya + "' width=\"600px\"></p>";
    document.getElementById("gbr").innerHTML = maincontent;
  }
</script>