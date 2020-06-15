<?php
    error_reporting(0);
    session_start();
  include  "config/koneksi.php";
   $nama = $_SESSION['username'];
   $user_level = $_SESSION['level'];
  if(!isset($_SESSION['username'])){
  
    header('location:index.php');
  }

 //simpan
    if (isset($_POST['submit'])) {

      $cekusername=mysql_num_rows(mysql_query("SELECT * from user where username='$_POST[username]'"));

      if ($cekusername<1) {
         $password=md5($_POST[password]);
      mysql_query("INSERT INTO user ( `username`, `password`, `nama`, `id_level`,`alamat`,`phone`,`TanggalBuat`,`Verifikasi`) values ('$_POST[username]','$password','$_POST[nama]','$_POST[level]','$_POST[alamat]','$_POST[phone]',NOW(),'Y')");


 echo "<script>window.alert('Penambahan User Berhasil !!!')
                                                window.location='media.php?module=biodata'</script>";
      }else{
         
 echo "<script>window.alert('Gagal,username sudah ada!!')
                                                window.location='media.php?module=biodata'</script>";

      }

    
    }elseif ($_GET[delete]=="y") {
      mysql_query("DELETE FROM `user` WHERE id='$_GET[id]'");

      header('location:media.php?module=biodata');
    }elseif (isset($_POST[simpanedit])) {

     
      if (empty($_FILES["fileToUpload"]["name"])) {
        

     mysql_query("UPDATE `user` SET `nama`='$_POST[nama]',`phone`='$_POST[phone]',`alamat`='$_POST[alamat]' WHERE username='$_POST[username]'");


        echo "<script>window.alert('File berhasil diupdate !!!')
        window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";


      }

      
              $target_dir = "assets/foto/";
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
                  
     

        echo "<script>window.alert('File Sudah ada !!!')
        window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";

                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                 
 

        echo "<script>window.alert('File Terlalu Besar !!!')
        window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";

                  $uploadOk = 0;
              }
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {

               echo "<script>window.alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed. !!!')
                      window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";
                 
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "<script>window.alert('Sorry, your file was not uploaded. !!!')
                      window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";
               
              // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                     echo "<script>window.alert('File  berhasil disimpan. !!!')
                      window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";

                      $brkas=$_FILES['fileToUpload']['name'];

                      
     mysql_query("UPDATE `user` SET `Foto`='$brkas',`nama`='$_POST[nama]',`phone`='$_POST[phone]',`alamat`='$_POST[alamat]' WHERE username='$_POST[username]'");



                  } else {
                     echo "<script>window.alert('Sorry, there was an error uploading your file. !!!')
                      window.location='media.php?module=biodata&username=$_SESSION[username]'</script>";
                     
                  }
              }

       

    

















     
    }


    if ($_GET[verifikasi]=="y") {
      mysql_query("UPDATE user set Verifikasi='Y' where id='$_GET[id]'");
    }else{
 mysql_query("UPDATE user set Verifikasi='N' where id='$_GET[id]'");
    }


    $edit=mysql_fetch_assoc(mysql_query("SELECT * from user WHERE username='$_GET[username]'"));

    switch($_GET[act]){
       default:
       ?>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Biodata</h2>
                                           <hr/>

                                          <form method="post" action="" enctype="multipart/form-data">
                          <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?php echo $edit[nama]; ?>">
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
                                                <label for="cc-number" class="control-label mb-1">Level</label>
                                                <?php
                                                 
                     
                    $sql = mysql_query("SELECT * from user_level ");
                      echo "<select class=\"form-control\" name=\"level\">";
                      echo "<option > Pilih Level  </option>";


                    while ($r = mysql_fetch_array($sql)) {

                          echo "$edit[id_level]";
                          echo "sdfds";
                          
                        if ($edit[id_level]==$r[id]) {
                        echo "<option value='$r[id]' selected>  $r[level] </option>";
                             }else{
                        echo "<option value='$r[id]'>  $r[level] </option>";
                              } 
                          }
                  
                         
                    echo '</select>';
    
                    ?>
                                               
                                            </div>

                                                <div class="form-group">
                            <label class="form-label">Gambar Awal </label><br/>
                           <img src="assets/foto/<?php echo $edit[Foto]; ?>" width=100px>
                          </div>
                           

                  <div class="form-group">
                            <label class="form-label">Ganti Foto</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                          </div>
                          




                    <button type="submit" name="simpanedit" class="mt-2 btn btn-block btn-success mt-1 mb-1">Simpan</button>
               </form>

                </div>


       <?php
        break;
      

    
    
    }

?>



              