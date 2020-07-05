<?php
    error_reporting(0);
    session_start();
  include  "config/koneksi.php";
 
  if(!isset($_SESSION['username'])){
  
    header('location:index.php');
  }


    if (isset($_POST['submit'])) {


              $target_dir = "assets/karyawan/";
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
        window.location='media.php?module=karyawan'</script>";
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                 
 echo "<script>window.alert('File terlalu besar !!!')
        window.location='media.php?module=karyawan'</script>";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {

               echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed. !!!')
                      window.location='media.php?module=karyawan'</script>";
                 
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "<script>window.alert('Sorry, your file was not uploaded. !!!')
                      window.location='media.php?module=karyawan'</script>";
               
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                     echo "<script>window.alert('File  berhasil disimpan. !!!')
                      window.location='media.php?module=karyawan'</script>";

                      $brkas=$_FILES['fileToUpload']['name'];
                      $password=md5($_POST[password]);

                      mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO `karyawan`(`nama`, `username`,`password`,`alamat`,`phone`,`id_level`,`tanggallahir`,`Ktp`,`Foto`,`TanggalBuat`) VALUES ('$_POST[nama]','$_POST[username]','$password','$_POST[alamat]','$_POST[phone]','$_POST[level]','$_POST[tanggallahir]','$_POST[ktp]','$brkas',NOW())");
                      
                  } else {
                     echo "<script>window.alert('Sorry, there was an error uploading your file. !!!')
                      window.location='media.php?module=karyawan'</script>";
                     
                  }
              }
        

      }elseif ($_GET[delete]=="y") {
      mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM `karyawan` WHERE id='$_GET[id]'");

     echo "<script>window.alert('Data Berhasil dihapus. !!!')
                      window.location='media.php?module=karyawan'</script>";
    }elseif (isset($_POST[simpanedit])) {

      if (empty($_FILES["fileToUpload"]["name"])) {
        mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `karyawan` SET `nama`='$_POST[nama]',`tanggallahir`='$_POST[tanggallahir]',`phone`='$_POST[phone]',`Ktp`='$_POST[ktp]',`alamat`='$_POST[alamat]' WHERE id='$_GET[id]'");
        echo "<script>window.alert('Data BErhasil Diupdate. !!!')
                      window.location='media.php?module=karyawan'</script>";
      }

      
              $target_dir = "assets/karyawan/";
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
        window.location='media.php?module=karyawan'</script>";
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                 
 echo "<script>window.alert('File terlalu besar !!!')
        window.location='media.php?module=karyawan'</script>";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {

               echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed. !!!')
                      window.location='media.php?module=karyawan'</script>";
                 
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "<script>window.alert('Sorry, your file was not uploaded. !!!')
                      window.location='media.php?module=karyawan'</script>";
               
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                     echo "<script>window.alert('File  berhasil disimpan. !!!')
                      window.location='media.php?module=karyawan'</script>";

                      $brkas=$_FILES['fileToUpload']['name'];

                       mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `karyawan` SET `nama`='$_POST[nama]',`Foto`='$brkas',`tanggallahir`='$_POST[tanggallahir]',`phone`='$_POST[phone]',`Ktp`='$_POST[ktp]' WHERE id='$_GET[id]'");
                  } else {
                     echo "<script>window.alert('Sorry, there was an error uploading your file. !!!')
                      window.location='media.php?module=karyawan'</script>";
                     
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

                                          <h2 class="mb-0">Data Karyawan</h2>
                                           <hr/>

                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Tambah User</button><br/><br/>


                                           <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                              <th class="wd-20p">Foto</th>
                              <th class="wd-15p">Nama</th>
                              <th class="wd-20p">Alamat</th>
                              <th class="wd-15p">Level</th>
                             
                              
                         <th class="wd-10p">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                           if ($_SESSION[level]=="1") {
                              $query=mysqli_query($GLOBALS["___mysqli_ston"], "select a.*,b.Level as NamaLevel,b.id as idlevel from karyawan a
left join user_level b on a.id_level=b.id where a.id_level='2'");
                            }
                            $no;
                            while ($q=mysqli_fetch_array($query)) {
                              $no++;
                             

                             echo "
                              <tr>
                              <td>$no</td>";
                                  ?>

                                 <td><a href="" onclick="gambar('assets/karyawan/<?php echo $q[Foto] ?>')" data-toggle="modal" data-target="#ambilgambar"><center><img src="assets/karyawan/<?php echo $q[Foto] ?>" width='100px'></center></a></td>

                                 <?php echo"
                                <td>$q[nama]</td>
                                <td>$q[alamat] </td>
                                <td>$q[NamaLevel]</td>
                                 
                                ";

                                  
                                
                                echo"<td><a href=\"media.php?module=karyawan&act=edit&id=$q[id]\" ><span class=\"badge badge-warning\">Edit</span></a> <a href=\"media.php?module=karyawan&delete=y&id=$q[id]\" ><span class=\"badge badge-danger\">Hapus</span></a>
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
                      <h2 class="modal-title" id="largeModalLabel">Tambah User</h2>
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
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" id="tanggal" class="form-control" name="tanggallahir" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control"  placeholder="Username" name="username" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control"  placeholder="Password" name="password" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control"  placeholder="Alamat" name="alamat" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control"  placeholder="Phone" name="phone" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">KTP</label>
                            <input type="text" class="form-control"  placeholder="KTP" name="Ktp" required="">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Pilih File</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                          </div>

                          <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Level</label>
                            <?php 
                            $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from user_level where id='2'");
                            echo "<select class=\"form-control\" name=\"level\" >";
                            echo "<option > Pilih Level  </option>";
                            while ($r = mysqli_fetch_array($sql)) {
                              if ($tampil[Nama]==$r[level]) {
                                echo "<option value='$r[id]' selected>  $r[level] </option>";
                              }
                              else {
                                echo "<option value='$r[id]'>  $r[level] </option>";
                              }
                            } 
                            echo "</select>";
                            ?>
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
      $edit=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan WHERE id='$_GET[id]'"));

     

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
                            <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?php echo $edit[nama]; ?>">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Foto Awal </label><br/>
                           <img src="assets/karyawan/<?php echo $edit[Foto]; ?>" width=100px>
                          </div>

                          <div class="form-group">
                            <label class="form-label">Ganti Foto</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" id="tanggal" name="tanggallahir" class="form-control" value="<?php echo $edit[tanggallahir]; ?>">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" readonly  placeholder="Username" name="username" value="<?php echo $edit[username]; ?> ">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control"  placeholder="Alamat" name="alamat" value="<?php echo $edit[alamat]; ?>">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control"  placeholder="Phone" name="phone" value="<?php echo $edit[phone]; ?>">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Ktp</label>
                            <input type="text" class="form-control"  placeholder="Ktp" name="ktp" value="<?php echo $edit[Ktp]; ?>">
                          </div>

                          <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Level</label>
                              <?php


                            $sql = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from user_level where id='2'");
                              echo "<select class=\"form-control \" name=\"level\" readonly>";
                              echo "<option > Pilih Level  </option>";
                            while ($r = mysqli_fetch_array($sql)) {

                            if ($edit[id_level]==$r[id]) {
                            echo "<option value='$r[id]' selected>  $r[level] </option>";
                             }else{
                            echo "<option value='$r[id]'>  $r[level] </option>";
                              }
                            }


                              echo '</select>';

                            ?>

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