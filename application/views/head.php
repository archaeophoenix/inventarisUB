<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- change style "sidebar-collapse"-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Universitas</b>&nbsp;Bakrie</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  Admin
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php $path = explode('/',$_SERVER['PATH_INFO']);?>
        <li <?php echo ($path[1] == 'purchase' || $path[1] == 'report' && $path[2] != 'supplier') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>purchase"><i class="fa fa-th"></i> <span>Purchase</span></a></li>
        <li <?php echo ($path[1] == 'vendor') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>vendor"><i class="fa fa-group"></i><span>Vendor</span></a></li>
        <li <?php echo ($path[1] == 'barang') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>barang"><i class="fa fa-cubes"></i><span>Barang</span></a></li>
        <li <?php echo ($path[1] == 'harga') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>harga"><i class="fa fa-money"></i><span>Harga</span></a></li>
        <li <?php echo ($path[1] == 'report' && $path[2] == 'supplier') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>report/supplier"><i class="fa fa-edit"></i><span>Kinerja Vendor</span></a></li>
        <li <?php echo ($path[1] == 'pengguna') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>pengguna"><i class="fa fa-user"></i><span>Pengguna</span></a></li>
        <li <?php echo ($path[1] == 'biro') ? 'class="active"' : '' ; ?>><a href="<?php echo base_url(); ?>biro"><i class="fa fa-flag"></i><span>Biro</span></a></li>
        <li <?php echo ($path[1] == 'inventaris') ? 'class="active"' : '' ; ?> "><a href="<?php echo base_url(); ?>report/inventaris"><i class="fa fa-cube"></i><span>Inventaris</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <input type="hidden" value="<?php echo base_url(); ?>" id="base">