<?php
    error_reporting(0);
    session_start();
  include  "config/koneksi.php";
   $nama = $_SESSION['username'];
   $user_level = $_SESSION['level'];
  if(!isset($_SESSION['username'])){
  
    header('location:login.php');
  }

 //simpan
    if (isset($_POST['submit'])){
      
        mysql_query("INSERT INTO `notifikasi`( `judul`, `isi`, `tanggal`, `iduser`, `NA`) VALUES ('$_POST[judul]','$_POST[isi]',NOW(),'$_POST[iduser]','N')");
        
           echo "<script>window.alert('Notif berhasil dikirim!!')
                                                window.location='media.php?module=notif'</script>";
        
    }elseif ($_GET[delete]=="y") {
      mysql_query("DELETE FROM `notifikasi` WHERE id='$_GET[id]'");

      header('location:media.php?module=<?php echo $_GET[module]?>');
    }elseif (isset($_POST[simpanedit])) {
     mysql_query("UPDATE `user` SET`nama`='$_POST[nama]',`alamat`='$_POST[alamat]',`phone`='$_POST[phone]',`id_level`='$_POST[level]' WHERE id='$_GET[id]'");

      header('location:media.php?module=<?php echo $_GET[module]?>');
    }


    switch($_GET[act]){
       default:
       ?>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Master notif</h2>
                                           <hr/>

                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Tambah Data</button><br/><br/>


                                           <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                              <th class="wd-15p">Judul</th>
                              <th class="wd-15p">Isi</th>
                              <th class="wd-20p">User</th>
                              <th class="wd-15p">Tanggal</th>
                             
                         <th class="wd-10p">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $query=mysql_query("select a.*,b.nama from notifikasi a
                              left join karyawan b on a.iduser=b.id");
                            $no;
                            while ($q=mysql_fetch_array($query)) {
                              $no++;
                             

                             echo "
                              <tr>
                              <td>$no</td>
                                <td>$q[judul]  </td>
                                <td>$q[isi]</td>
                                <td>$q[nama] </td>
                                <td>$q[tanggal] </td>
                               

                                <td>
                               
                                <a href=\"media.php?module=notif&delete=y&id=$q[id]\" ><span class=\"badge badge-danger\">Hapus</span></a>
                                 </td>
                              </tr>";



                              
                            }


                            ?>
                          <!--   <tr>
                              <td>Bella</td>
                              <td>Chloe</td>
                              <td>System Developer</td>
                              <td>2018/03/12</td>
                              <td>$654,765</td>
                              <td>b.Chloe@datatables.net</td>
                            </tr> -->
                          
                          </tbody>
                        </table>
                </div>


                  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" id="largeModalLabel">Tambah Notif</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form method="post" action="">


                          <div class="form-group">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control"  placeholder="Judul" name="judul">
                          </div>
                          
                             <div class="form-group mb-0">
                            <label class="form-label">ISI</label>
                            <textarea class="form-control" name="isi" rows="4" placeholder="Isi.."></textarea>
                          </div>
                   


                           <div class="form-group">
                              <label for="cc-number" class="control-label mb-1">User</label>
                                                <?php
                                                 
                     
                    $sql = mysql_query("SELECT * from member where id_level='2' ");
                      echo "<select class=\"form-control\" name=\"iduser\" >";
                      echo "<option > Pilih User  </option>";
                    while ($r = mysql_fetch_array($sql)) {
                          
                        if ($tampil[Nama]==$r[level]) {
                        echo "<option value='$r[id]' selected>  $r[nama] </option>";
                             }else{
                        echo "<option value='$r[id]'>  $r[nama] </option>";
                              } 
                          }
                  
                         
                    echo '</select>';
    
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
      $edit=mysql_fetch_assoc(mysql_query("SELECT a.*,b.level,b.id as idlevel FROM `member` a
                            join user_level b on a.id_level=b.id WHERE a.id='$_GET[id]'"));

     

        ?>

        

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Edit</h2>
                                           <hr/>
                      <form method="post" action="">
                          <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?php echo $edit[nama]; ?>">
                          </div>
                           <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" readonly  placeholder="Username" name="username" value="<?php echo $edit[username]; ?> ">
                          </div>
                           <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" readonly  placeholder="Password" name="password" value="<?php echo $edit[password]; ?>">
                          </div>
                           <div class="form-group">
                            <label class="form-label">No Phone</label>
                            <input type="text" class="form-control"  placeholder="Phone" name="phone" value="<?php echo $edit[phone]; ?>">
                          </div>


                                             <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Level</label>
                                                <?php
                                                 
                     
                    $sql = mysql_query("SELECT * from user_level where id='3' ");
                      echo "<select class=\"form-control select2 w-100\" name=\"level\" >";
                      echo "<option > Pilih Level  </option>";
                    while ($r = mysql_fetch_array($sql)) {
                          
                        if ($edit[idlevel]==$r[id]) {
                        echo "<option value='$r[id]' selected>  $r[level] </option>";
                             }else{
                        echo "<option value='$r[id]'>  $r[level] </option>";
                              } 
                          }
                  
                         
                    echo '</select>';
    
                    ?>
                                               
                                            </div>
                      <div class="form-group mb-0">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat.."><?php echo $edit[alamat];?></textarea>
                          </div>
                   


                    <button type="submit" name="simpanedit" class="mt-2 btn btn-block btn-success mt-1 mb-1">Simpan</button>
               </form>

        <?php
        break;
    
    }

?>



              