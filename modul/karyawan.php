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





      $cekusername=mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan where username='$_POST[username]'"));

      if ($cekusername<1) {
         $password=md5($_POST[password]);
      mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO karyawan ( `username`, `password`, `nama`, `id_level`,`alamat`,`phone`,`TanggalBuat`,`tanggallahir`,`Ktp`) values ('$_POST[username]','$password','$_POST[nama]','$_POST[level]','$_POST[alamat]','$_POST[phone]','$_POST[tanggallahir]',NOW(),'$_POST[ktp]')");


 echo "<script>window.alert('Penambahan User Berhasil !!!')
                                                window.location='media.php?module=karyawan'</script>";
      }else{

 echo "<script>window.alert('Gagal,username sudah ada!!')
                                                window.location='media.php?module=karyawan'</script>";

      }


    }elseif ($_GET[delete]=="y") {
      mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM `karyawan` WHERE id='$_GET[id]'");

      header('location:media.php?module=karyawan');
    }elseif (isset($_POST[simpanedit])) {





     mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `karyawan` SET `nama`='$_POST[nama]',`phone`='$_POST[phone]',`alamat`='$_POST[alamat]',`Ktp`='$_POST[ktp]', `tanggallahir`='$_POST[tanggallahir]' WHERE username='$_POST[username]'");
echo '<script type="text/javascript">
           window.location = "media.php?module=karyawan"
      </script>';

    }


    switch($_GET[act]){
       default:
       ?>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">

                                        <div class="card-body">

                                          <h2 class="mb-0">Master karyawan</h2>
                                           <hr/>

                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Tambah Data</button><br/><br/>


                                           <div class="table-responsive">
                          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                              <!-- <th class="wd-15p">ID</th> -->
                              <th class="wd-15p">Username</th>
                              <th class="wd-20p">Nama</th>
                              <th class="wd-20p">No.phone</th>
                              <th class="wd-20p">Alamat</th>
                              <th class="wd-20p">Tanggal Lahir</th>
                              <th class="wd-15p">Level</th>

                         <th class="wd-10p">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $query=mysqli_query($GLOBALS["___mysqli_ston"], "select a.*,b.Level as NamaLevel,b.id as idlevel from karyawan a
left join user_level b on a.id_level=b.id where a.id_level='2'");
                            $no;
                            while ($q=mysqli_fetch_array($query)) {
                              $no++;


                             echo "
                              <tr>
                              <td>$no</td>

                                <td>$q[username]</td>
                                <td>$q[nama] </td>
                                <td>$q[phone] </td>
                                <td>$q[alamat] </td>
                                <td>$q[tanggallahir] </td>
                                <td>$q[NamaLevel] </td>

                                <td>
                                <a href=\"media.php?module=karyawan&act=edit&id=$q[id]\" ><span class=\"badge badge-warning\">Edit</span></a>
                                <a href=\"media.php?module=karyawan&delete=y&id=$q[id]\" ><span class=\"badge badge-danger\">Hapus</span></a>
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
                      <h2 class="modal-title" id="largeModalLabel">Tambah User</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form method="post" action="">


                          <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"  placeholder="Nama" name="nama">
                          </div>
                          <div class="form-group">
                          <label class="form-label">Tanggal Lahir</label>
                          <input type="date" id="tanggal" name="tanggallahir" class="form-control ">
                        </div>
                           <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control"  placeholder="Username" name="username" >
                          </div>
                           <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control"  placeholder="Password" name="password">
                          </div>

                          <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control"  placeholder="Alamat" name="alamat" >
                          </div>

                          <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control"  placeholder="Phone" name="phone" >
                          </div>

                           <div class="form-group">
                            <label class="form-label">Ktp</label>
                            <input type="text" class="form-control"  placeholder="Ktp" name="ktp" >
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
                             }else{
                        echo "<option value='$r[id]'>  $r[level] </option>";
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
      $edit=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM karyawan WHERE id='$_GET[id]'"));



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

    }

?>

<script>
$(function(){
            $("#tanggal").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
  </script>
