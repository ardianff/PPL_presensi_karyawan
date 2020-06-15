<?php
error_reporting(0);
session_start();
  include"config/config.php";
  include"config/koneksi.php";
 $nama = $_SESSION['username'];
  if(!isset($_SESSION['username'])){
  
   
    error_reporting(0);
  }
  ?>

  <?php
if ($_GET[module]=='home'){

  include "modul/berhasil.php";
  
}

elseif ($_GET[module]=='mstadmin'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/mstadmin.php";
}
}


elseif ($_GET[module]=='reset'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/reset.php";
}
}



elseif ($_GET[module]=='biodata'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/biodata.php";
}
}

elseif ($_GET[module]=='karyawan'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/karyawan.php";
}
}
elseif ($_GET[module]=='mstpengunjung'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/mstpengunjung.php";
}
}

elseif ($_GET[module]=='booking'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/booking.php";
}
}


elseif ($_GET[module]=='harga'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/harga.php";
}
}

elseif ($_GET[module]=='notif'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/notif.php";
}
}

elseif ($_GET[module]=='laporanbooking'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/laporanbooking.php";
}
}

elseif ($_GET[module]=='laporanpresensi'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/laporanpresensi.php";
}
}

elseif ($_GET[module]=='histori'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/histori.php";
}
}

elseif ($_GET[module]=='slider'){
     if ($_SESSION['level']=='1'||$_SESSION['level']=='2'){
    include "modul/slider.php";
}
}


else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}

