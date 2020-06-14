 <?php
 error_reporting(0);
  session_start();
include "atas.php";
 include "./config/koneksi.php";
 

       
                if(isset($_POST['submit'])){
                      $username = $_POST['username'];
                      $password = md5($_POST['password']);
                      
                         mysql_query("INSERT INTO `user`( `nama`, `alamat`, `phone`, `username`, `password`, `id_level`,  `TanggalBuat`) VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[phone]','$_POST[username]','$password','2',NOW())");
                        
    echo "<script>window.alert('Pendaftaran Berhasil!!!')
window.location='login.php'</script>";

                       
                      }




?>
 <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center">
                       
                    </h3>

                    <div class="p-3">
                        <h4 class="font-18 m-b-5 text-center">Daftar</h4>
                        <p class="text-muted text-center">Daftarkan akun anda sekarang</p>

                        <form class="form-horizontal m-t-30" action="" method="post">

                            <div class="form-group">
                                <label for="useremail">Nama </label>
                                <input type="nama" class="form-control" name="nama" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Enter username">
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>

  <div class="form-group">
                                <label for="userpassword">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                            </div>

                              <div class="form-group">
                                <label for="userpassword">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" name="submit" type="submit">Register</button>
                                </div>
                            </div>

                        
                        </form>
                    </div>
  <div class="m-t-40 text-center">
                <p>Already have an account ? <a href="login.php" class="font-500 text-primary"> Login </a> </p>
             
            </div>

                </div>
            </div>

          
        </div>