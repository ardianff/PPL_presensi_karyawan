<?php
    error_reporting(0);
    session_start();
  include  "config/koneksi.php";
   include  "rupiah.php";
   $nama = $_SESSION['username'];
   $user_level = $_SESSION['level'];
  if(!isset($_SESSION['username'])){
  
    header('location:index.php');
  }

 //simpan
    if (isset($_POST['submit'])) {

    
      mysql_query("INSERT into harga (Harga) values ('$_POST[Harga]')");

   
 echo "<script>window.alert('Penambahan Harga Berhasil !!!')
                                                window.location='media.php?module=harga'</script>";
    

    
    }elseif ($_GET[delete]=="y") {
      mysql_query("DELETE FROM `harga` WHERE id_harga='$_GET[id]'");

      
 echo "<script>window.alert('Harga Berhasil dihapus !!!')
                                                window.location='media.php?module=harga'</script>";
    
    }elseif (isset($_POST[simpanedit])) {

     



     mysql_query("UPDATE `harga` SET `Harga`='$_POST[Harga]' WHERE id_harga='$_GET[id]'");

 echo "<script>window.alert(' Harga Berhasil Diupdate!!!')
                                                window.location='media.php?module=harga'</script>";
    
     
    }


    switch($_GET[act]){
       default:
       ?>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Master Harga</h2>
                                           <hr/>

                                           <button type="button" class="btn btn-sm btn-primary mt-1 mb-1" data-toggle="modal" data-target="#largeModal">Tambah Data</button><br/><br/>


                                           <div class="table-responsive">
                         <table id="alternative-page-datatable" class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                            <tr>
                              <th class="wd-15p">No</th>
                            
                              <th class="wd-15p">Harga</th>
                              
                              
                         <th class="wd-10p">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $query=mysql_query("SELECT * from harga");
                            $no;
                            while ($q=mysql_fetch_array($query)) {
                              $no++;
                             

                             echo "
                              <tr>
                              <td>$no</td>";

                              ?>

                                <td><?php echo rupiah($q[Harga]); ?></td>
                               
                              
                             
                                
                               <?php
                               echo" <td>
                                <a href=\"media.php?module=harga&act=edit&id=$q[id_harga]\" ><span class=\"badge badge-warning\">Edit</span></a>
                                <a href=\"media.php?module=harga&delete=y&id=$q[id_harga]\" ><span class=\"badge badge-danger\">Hapus</span></a>
                                 </td>
                              </tr>";



                              
                            }


                            ?>
                        
                          
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
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control"  placeholder="Harga" name="Harga">
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
      $edit=mysql_fetch_assoc(mysql_query("select a.*,b.Level as NamaLevel,b.id as idlevel from user a
left join user_level b on a.id_level=b.id  WHERE a.id='$_GET[id]'"));

     

        ?>

        

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box card shadow">
                                        
                                        <div class="card-body">

                                          <h2 class="mb-0">Edit</h2>
                                           <hr/>
                      <form method="post" action="">

                          <div class="form-group">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control"  placeholder="Harga" name="Harga" value="<?php echo $edit[Harga]; ?>">
                          </div>
                           
                  


                    <button type="submit" name="simpanedit" class="mt-2 btn btn-block btn-success mt-1 mb-1">Simpan</button>
               </form>

        <?php
        break;
    
    }

?>



              