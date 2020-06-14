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
      mysql_query("INSERT INTO user ( `username`, `password`, `nama`, `id_level`,`alamat`,`phone`,`TanggalBuat`) values ('$_POST[username]','$password','$_POST[nama]','$_POST[level]','$_POST[alamat]','$_POST[phone]',NOW())");


 echo "<script>window.alert('Penambahan User Berhasil !!!')
                                                window.location='media.php?module=mstadmin'</script>";
      }else{
         
 echo "<script>window.alert('Gagal,username sudah ada!!')
                                                window.location='media.php?module=mstadmin'</script>";

      }

    
    }elseif ($_GET[delete]=="y") {
      mysql_query("DELETE FROM `user` WHERE id='$_GET[id]'");

      header('location:media.php?module=mstadmin');
    }elseif (isset($_POST[simpanedit])) {

     

        $password=md5($_POST[passwordbaru]);

     mysql_query("UPDATE `user` SET `password`='$password' WHERE username='$_GET[username]'");

 echo "<script>window.alert('Password Berhasil Dirubah !!!')
                                                window.location='media.php?module=reset&username=$_GET[username]'</script>";
     
    }


    switch($_GET[act]){
       default:
       ?>



                            <div class="row">
                                <div class="col-md-12">
                                    

                                          <h2 class="mb-0"></h2>
                                           <hr/>

                                           <?php
  $edit=mysql_fetch_assoc(mysql_query("SELECT * from v_user WHERE username='$_GET[username]'"));

  
        ?>

        

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Reset Password</h2>
                                           <hr/>
                      <form method="post" action="">
                          <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" readonly placeholder="Username" name="nama" value="<?php echo $edit[username]; ?>">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Password Lama</label>
                            <input type="password" class="form-control" readonly  placeholder="Pwdlama" name="Pwdlama" value="<?php echo $edit[password]; ?>">
                          </div>
                           <div class="form-group">
                            <label class="form-label">Password Baru</label>
                            <input type="text" class="form-control"   placeholder="Password Baru" name="passwordbaru" >
                          </div>
                          


                    <button type="submit" name="simpanedit" class="mt-2 btn btn-block btn-success mt-1 mb-1">Simpan</button>
               </form>

       <?php
        break;
      

      case 'edit':
      $edit=mysql_fetch_assoc(mysql_query("SELECT * from v_user WHERE id='$_GET[id]'"));

     

        ?>

        

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Edit</h2>
                                           <hr/>
                      <form method="post" action="">
                         <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" readonly placeholder="Username" name="nama" value="<?php echo $edit[username]; ?>">
                          </div>
                          <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" readonly placeholder="Nama" name="nama" value="<?php echo $edit[nama]; ?>">
                          </div>
                           <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control"   placeholder="Username" name="username" value="<?php echo $edit[username]; ?> ">
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
                                                 
                     
                    $sql = mysql_query("SELECT * from user_level where id='1'");
                      echo "<select class=\"form-control \" name=\"level\" readonly>";
                      echo "<option > Pilih Level  </option>";
                    while ($r = mysql_fetch_array($sql)) {
                          
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
    
    }

?>



              