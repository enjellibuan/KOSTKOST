  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Menu Dashboar -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-purple"></i> <span>DASHBOARD</span></a></li>
        <!-- Menu kos -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>KOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/kos') ?>"><i class="fa fa-table"></i> Data Kos</a></li>
            <li><a href="<?php echo base_url('admin/kos/tambah') ?>"><i class="fa fa-plus"></i> Tambah Kos</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Kos</a></li>
          </ul>
        </li>

        <!-- MENU USER -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-circle-o"></i> <span>ADMIN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data ADMIN</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah ADMIN</a></li>
          </ul>
        </li>

        <!-- MENU KONFIGURASI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>KONFIGURASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-camera-retro"></i> Konfigurasi Ikon</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">