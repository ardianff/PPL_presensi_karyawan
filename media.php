<!DOCTYPE html>
<html>

<head>
    <?php
  error_reporting(0);
  include"config/koneksi.php";
  include"atas.php";

  session_start();

      $username=$_SESSION['username'] ;
      $nama = $_SESSION['username'];
      $p=mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from user where username='$username' and nama='$nama'"));




  if(!isset($_SESSION['username'])){

    header('location:login.php');

  }
  ?>

        <body>
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left"><a href="media.php?module=home" class="logo"><span><img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm"> </span><span><img src="assets/images/logo.png" alt="logo-large" class="logo-lg logo-light"> </span></a></div>
                <!--end logo-->
                <!-- Navbar -->
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-nav float-right mb-0">

                        <li class="dropdown notification-list"><a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">

                                <div class="slimscroll notification-list">
                                    <!-- item--><a href="#" class="dropdown-item py-3"><small class="float-right text-muted pl-2">2 min ago</small><div class="media"><div class="avatar-md bg-primary"><i class="la la-cart-arrow-down text-white"></i></div><div class="media-body align-self-center ml-2 text-truncate"><h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6><small class="text-muted mb-0">Dummy text of the printing and industry.</small></div><!--end media-body--></div><!--end media--> </a>
                                    <!--end-item-->
                                    <!-- item--><a href="#" class="dropdown-item py-3"><small class="float-right text-muted pl-2">10 min ago</small><div class="media"><div class="avatar-md bg-success"><i class="la la-group text-white"></i></div><div class="media-body align-self-center ml-2 text-truncate"><h6 class="my-0 font-weight-normal text-dark">Meeting with designers</h6><small class="text-muted mb-0">It is a long established fact that a reader.</small></div><!--end media-body--></div><!--end media--> </a>
                                    <!--end-item-->
                                    <!-- item--><a href="#" class="dropdown-item py-3"><small class="float-right text-muted pl-2">40 min ago</small><div class="media"><div class="avatar-md bg-pink"><i class="la la-list-alt text-white"></i></div><div class="media-body align-self-center ml-2 text-truncate"><h6 class="my-0 font-weight-normal text-dark">UX 3 Task complete.</h6><small class="text-muted mb-0">Dummy text of the printing.</small></div><!--end media-body--></div><!--end media--> </a>
                                    <!--end-item-->
                                    <!-- item--><a href="#" class="dropdown-item py-3"><small class="float-right text-muted pl-2">1 hr ago</small><div class="media"><div class="avatar-md bg-warning"><i class="la la-truck text-white"></i></div><div class="media-body align-self-center ml-2 text-truncate"><h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6><small class="text-muted mb-0">It is a long established fact that a reader.</small></div><!--end media-body--></div><!--end media--> </a>
                                    <!--end-item-->
                                    <!-- item--><a href="#" class="dropdown-item py-3"><small class="float-right text-muted pl-2">2 hrs ago</small><div class="media"><div class="avatar-md bg-info"><i class="la la-check-circle text-white"></i></div><div class="media-body align-self-center ml-2 text-truncate"><h6 class="my-0 font-weight-normal text-dark">Payment Successfull</h6><small class="text-muted mb-0">Dummy text of the printing.</small></div><!--end media-body--></div><!--end media--> </a>
                                    <!--end-item-->
                                </div>
                                <!-- All--><a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a></div>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><span class="ml-1 nav-user-name hidden-sm">Halo, Selamat Datang <?php echo $nama; ?><i class="mdi mdi-chevron-down"></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="coba.php"><i class="ti-user text-muted mr-2"></i> Profile</a>
                                <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="logout.php"><i class="ti-power-off text-muted mr-2"></i> Logout</a></div>
                        </li>
                    </ul>
                    <!--end topbar-nav-->
                    <ul class="list-unstyled topbar-nav mb-0">
                        <li>
                            <button class="nav-link button-menu-mobile waves-effect waves-light"><i class="ti-menu nav-icon"></i></button>
                        </li>
                        <!-- <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" id="AllCompo" placeholder="Search..." class="form-control"> <a href="#"><i class="fas fa-search"></i></a></form>
                        </li> -->
                    </ul>
                </nav>
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->
            <!-- Left Sidenav -->
            <div class="left-sidenav">
                <ul class="metismenu left-sidenav-menu">
                    <li <?php if ($_GET[module]=="home") {
                     echo 'class="mm-active"';
                    } ?> >
                      <a href="media.php?module=home"><i class="ti-bar-chart"></i><span>Dashboard</span></a>

                    </li>

                    <li <?php if ($_GET[module]=="histori") {
                     echo 'class="mm-active"';
                    } ?> >
                      <a href="media.php?module=histori"><i class="ti-share"></i><span>Histori Presensi</span></a>

                    </li>

                    <li <?php if ($_GET[module]=="karyawan") {
                     echo 'class="mm-active"';
                    } ?> >
                      <a href="media.php?module=karyawan"><i class="ti-user"></i><span>Karyawan</span></a>

                    </li>
                    <li <?php if ($_GET[module]=="laporanpresensi") {
                     echo 'class="mm-active"';
                    } ?>><a href="javascript: void(0);"><i class="ti-printer"></i><span>Laporan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li class="nav-item"><a class="nav-link" href="media.php?module=laporanpresensi"><i class="ti-printer"></i>Laporan Presensi</a></li>

                        </ul>
                    </li>

                    <li <?php if ($_GET[module]=="mstadmin"||$_GET[module]=="slider"||$_GET[module]=="notif") {
                     echo 'class="mm-active"';
                    } ?>><a href="javascript: void(0);"><i class="ti-layers-alt"></i><span>Master Data</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item"><a class="nav-link" href="media.php?module=mstadmin"><i class="ti-control-record"></i>Data Admin</a></li>
                            <li class="nav-item"><a class="nav-link" href="media.php?module=slider"><i class="ti-control-record"></i>Slider</a></li>
                            <li class="nav-item"><a class="nav-link" href="media.php?module=notif"><i class="ti-control-record"></i>Notifikasi</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
            <!-- end left-sidenav-->
            <div class="page-wrapper">
                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">

                                    <h4 class="page-title">Dashboard</h4></div>
                                <!--end page-title-box-->
                            </div>
                            <!--end col-->
                        </div>
                        <!-- end page title end breadcrumb -->

                   <?php include "content.php" ?>

                 </div>

               </div>
                    </div>


                    <?php

include "bawah.php";
    ?>
