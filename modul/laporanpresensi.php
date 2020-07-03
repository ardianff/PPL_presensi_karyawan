<?php
    error_reporting(0);
    session_start();
  include  "config/koneksi.php";
   $nama = $_SESSION['username'];
   $user_level = $_SESSION['level'];
  if(!isset($_SESSION['username'])){
  
    header('location:login.php');
  }





    switch($_GET[act]){
       default:
       ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Laporan Data Presensi</h2>
                                           <hr/>
                                        <!-- 
                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Export Data Presensi</button><br/><br/> -->


                                           <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                              <th class="wd-15p">Karyawan</th>
                               <th class="wd-15p">Hari</th>
                                <th class="wd-15p">Presensi Masuk </th>
                                <th class="wd-15p">Presensi Keluar </th>
                                 <th class="wd-15p">Tanggal Presensi </th>

                                   <th class="wd-15p">Tipe </th>

                             
                         <!-- <th class="wd-10p">Aksi</th> -->
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from datapresensi order by TanggalPresensi DESC");
                            $no;
                            while ($q=mysqli_fetch_array($query)) {
                              $no++;
                             

                             echo "
                              <tr>
                              <td>$no</td>
                               
                                <td>$q[id_user]</td>
                                <td>$q[Hari] </td>";
                                if ($q[PresensiMasuk]=="") {
                                  $pre="-";
                                }else{
                                  $pre=$q[PresensiMasuk];
                                }
                                if ($q[PresensiKeluar]=="") {
                                 $kel="-";
                                }else{
                                  $kel=$q[PresensiKeluar];
                                }
                               

                               echo" <td><span class=\"badge badge-success\">$pre </span></td>
                                <td><span class=\"badge badge-success\">$kel </span></td>
                                <td>$q[TanggalPresensi] </td>
                                 <td>$q[Tipe] </td>
                                  </tr>";

                              
                            }


                            ?>
                        
                          
                          </tbody>
                        </table>
                </div>

       <?php
       break;

  case 'edit':
         $edit=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "select * from jadwal where id='$_GET[id]'"));

     

        ?>

        


        <?php
         break;
}

?>
