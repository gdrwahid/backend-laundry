<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('petugas/dasbor')?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E Laundry</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
        <?php echo $level_petugas ?>
      </div>
      <!-- Nav Item - Dashboard -->
      
      <li class="<?php if ($isi == "petugas/dasbor/list") { echo "nav-item active"; } ?> nav-item">
        <a class="nav-link" href="<?= base_url('petugas/dasbor')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Menu Administrator -->
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="<?php if ($isi == "petugas/user/list" or $isi == "petugas/user/tambah" or $isi == "petugas/user/edit" or $isi == "petugas/petugas/list" or $isi == "petugas/petugas/tambah" or $isi == "petugas/petugas/edit" or $isi == "petugas/customer/list" or $isi == "petugas/customer/tambah" or $isi == "petugas/customer/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Master User</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('petugas/user')?>">Data User</a>
            <a class="collapse-item" href="<?= base_url('petugas/petugas')?>">Data Petugas</a>
            <a class="collapse-item" href="<?= base_url('petugas/customer')?>">Data Customer</a>
          </div>
        </div>
      </li>
  
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Wilayah
      </div>

       <li class="<?php if ($isi == "petugas/kecamatan/list" or $isi == "petugas/kecamatan/tambah" or $isi == "petugas/kecamatan/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('petugas/kecamatan')?>">
          <i class="fas fa-fw fa-globe"></i>
          <span>Kecamatan</span></a>
      </li>

      <li class="<?php if ($isi == "petugas/kelurahan/list" or $isi == "petugas/kelurahan/tambah" or $isi == "petugas/kelurahan/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('petugas/kelurahan')?>">
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
      <li class="<?php if ($isi == "petugas/kategori/list" or $isi == "petugas/kategori/tambah" or $isi == "petugas/kategori/edit" or $isi == "petugas/jenis/list" or $isi == "petugas/jenis/tambah" or $isi == "petugas/jenis/edit" or $isi == "petugas/paket/list" or $isi == "petugas/paket/tambah" or $isi == "petugas/paket/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master Laundry</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('petugas/kategori')?>">Kategori Laundry</a>
            <a class="collapse-item" href="<?= base_url('petugas/jenis')?>">Jenis Laundry</a>
            <a class="collapse-item" href="<?= base_url('petugas/paket')?>">Paket Laundry</a>
            <a class="collapse-item" href="<?= base_url('petugas/item')?>">Item Laundry</a>
          </div>
        </div>
      </li>
      <li class="<?php if ($isi == "kurir/pemesanan/list" or $isi == "kurir/pemesanan/tambah" or $isi == "kurir/pemesanan/edit" ) { echo "nav-item active";} ?> nav-item">
        <a class="nav-link" href="<?= base_url('kurir/pemesanan')?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Pemesanan</span></a>
      </li>

     <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Logout
      </div>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/logoutkurir')?>">
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