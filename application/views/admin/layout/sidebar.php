<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dasbor')?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E Laundry</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
        <?php echo $level ?>
      </div>
      <!-- Nav Item - Dashboard -->
      
      <li class="<?php if ($isi == "admin/dasbor/list") { echo "nav-item active"; } ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/dasbor')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <?php if($level === "Administrator") { ?>
      <!-- Menu Administrator -->
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="<?php if ($isi == "admin/user/list" or $isi == "admin/user/tambah" or $isi == "admin/user/edit" or $isi == "admin/petugas/list" or $isi == "admin/petugas/tambah" or $isi == "admin/petugas/edit" or $isi == "admin/customer/list" or $isi == "admin/customer/tambah" or $isi == "admin/customer/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Master User</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('admin/user')?>">Data User</a>
            <a class="collapse-item" href="<?= base_url('admin/petugas')?>">Data Petugas</a>
            <a class="collapse-item" href="<?= base_url('admin/customer')?>">Data Customer</a>
          </div>
        </div>
      </li>
  
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Wilayah
      </div>

       <li class="<?php if ($isi == "admin/kecamatan/list" or $isi == "admin/kecamatan/tambah" or $isi == "admin/kecamatan/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/kecamatan')?>">
          <i class="fas fa-fw fa-globe"></i>
          <span>Kecamatan</span></a>
      </li>

      <li class="<?php if ($isi == "admin/kelurahan/list" or $isi == "admin/kelurahan/tambah" or $isi == "admin/kelurahan/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/kelurahan')?>">
          <i class="fas fa-fw fa-globe"></i>
          <span>Kelurahan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Laundry
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="<?php if ($isi == "admin/kategori/list" or $isi == "admin/kategori/tambah" or $isi == "admin/kategori/edit" or $isi == "admin/jenis/list" or $isi == "admin/jenis/tambah" or $isi == "admin/jenis/edit" or $isi == "admin/paket/list" or $isi == "admin/paket/tambah" or $isi == "admin/paket/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master Laundry</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('admin/kategori')?>">Kategori Laundry</a>
            <a class="collapse-item" href="<?= base_url('admin/jenis')?>">Jenis Laundry</a>
            <a class="collapse-item" href="<?= base_url('admin/paket')?>">Paket Laundry</a>
            <a class="collapse-item" href="<?= base_url('admin/item')?>">Item Laundry</a>
          </div>
        </div>
      </li>
      <li class="<?php if ($isi == "admin/pemesanan/list" or $isi == "admin/pemesanan/tambah" or $isi == "admin/pemesanan/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/pemesanan')?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Pemesanan</span></a>
      </li>

      <?php } else { ?>

      <!-- Menu Owner -->
      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        User
      </div>

      <li class="<?php if ($isi == "admin/user/list" or $isi == "admin/user/tambah" or $isi == "admin/user/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/user')?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Data User</span></a>
      </li>

      <li class="<?php if ($isi == "admin/petugas/list" or $isi == "admin/petugas/tambah" or $isi == "admin/petugas/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/petugas')?>">
          <i class="fas fa-fw fa-male"></i>
          <span>Data Petugas</span></a>
      </li>

       <li class="<?php if ($isi == "admin/customer/list" or $isi == "admin/customer/tambah" or $isi == "admin/customer/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/customer')?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Customer</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
       <div class="sidebar-heading">
        Laporan
      </div>

      <li class="<?php if ($isi == "admin/user/list" or $isi == "admin/user/tambah" or $isi == "admin/user/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('admin/user')?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Lap. Penjualan</span></a>
      </li>
      <?php } ?>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Logout
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logout')?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->