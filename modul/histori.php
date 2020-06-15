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
    if (isset($_POST['submit'])) {

      mysql_query("INSERT INTO `jadwal`(`Hari`, `JamMasuk`, `JamPulang`, `TanggalBuat`) VALUES ('$_POST[hari]','$_POST[jammasuk]','$_POST[jampulang]',NOW())");

    echo '<script type="text/javascript">
           window.location = "media.php?module=jadwal"
      </script>';
     
    }elseif ($_GET[delete]=="y") {
      mysql_query("DELETE FROM `jadwal` WHERE id='$_GET[id]'");

       echo '<script type="text/javascript">
           window.location = "media.php?module=jadwal"
      </script>';
    }elseif (isset($_POST[simpanedit])) {
     mysql_query("UPDATE `jadwal` SET `Hari`='$_POST[hari]',`JamMasuk`='$_POST[jammasuk]',`JamPulang`='$_POST[jampulang]' WHERE id='$_GET[id]'");

       echo '<script type="text/javascript">
           window.location = "media.php?module=jadwal"
      </script>';
    }




    switch($_GET[act]){
       default:
       ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Master Data Presensi</h2>
                                           <hr/>
                                        <!-- 
                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Export Data Presensi</button><br/><br/> -->


                                           <div class="table-responsive">
                         <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                              <th class="wd-15p">Karyawan</th>
                               <th class="wd-15p">Hari</th>
                                <th class="wd-15p">Presensi Masuk </th>
                                <th class="wd-15p">Presensi Keluar </th>
                                 <th class="wd-15p">Tanggal Presensi </th>

                                   <th class="wd-15p">Tipe </th>

                             
                         <th class="wd-10p">Selfi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $query=mysql_query("SELECT * from datapresensi order by TanggalPresensi DESC");
                            $no;
                            while ($q=mysql_fetch_array($query)) {
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
                                 <td>$q[Tipe] </td>";
                                  ?>

                                 <td><a href="" onclick="gambar('web_service/foto/<?php echo $q[Foto] ?>')" data-toggle="modal" data-target="#ambilgambar"><center><img src="web_service/foto/<?php echo $q[Foto] ?>" width='90px'></center></a></td>

                                 <?php echo"


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
       <?php
       break;


        


}

?>

<script language="javascript" type="text/javascript">
  function gambar(gambarnya){
    var maincontent = "";
    maincontent = "<p><img src='" + gambarnya + "' width=\"400px\"></p>";
    document.getElementById("gbr").innerHTML = maincontent;
  }
</script>