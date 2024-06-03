<?php
$tipe = isset($_GET['tipe']) ? $_GET['tipe'] : '';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="." class="brand-link">
    <img src="assets/logo_poltek.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Survey Polinema</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['nama'] ?>&background=random" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['nama'] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="." class="nav-link <?php echo ($menu == 'index') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?pages=soal" class="nav-link <?php echo ($menu == 'soal') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-question"></i>
            <p>
              Soal Survey
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?pages=survey" class="nav-link <?php echo ($menu == 'survey') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-clipboard"></i>
            <p>
              Survey
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview <?php echo ($menu == 'responden') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?php echo ($menu == 'responden') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Responden
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=responden&sub_menu=responden_dosen" class="nav-link <?php echo ($sub_menu == 'responden_dosen') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=responden&sub_menu=responden_alumni" class="nav-link <?php echo ($sub_menu == 'responden_alumni') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Alumni</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=responden&sub_menu=responden_industri" class="nav-link <?php echo ($sub_menu == 'responden_industri') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Industri</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=responden&sub_menu=responden_tendik" class="nav-link <?php echo ($sub_menu == 'responden_tendik') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tendik</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=responden&sub_menu=responden_mahasiswa" class="nav-link <?php echo ($sub_menu == 'responden_mahasiswa') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahasiswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=responden&sub_menu=responden_orang_tua" class="nav-link <?php echo ($sub_menu == 'responden_orang_tua') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Orang Tua</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview <?php echo ($menu == 'jawaban') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?php echo ($menu == 'jawaban') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-voicemail"></i>
            <p>
              Jawaban
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=jawaban&sub_menu=jawaban_dosen" class="nav-link <?php echo ($sub_menu == 'jawaban_dosen') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=jawaban&sub_menu=jawaban_alumni" class="nav-link <?php echo ($sub_menu == 'jawaban_alumni') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Alumni</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=jawaban&sub_menu=jawaban_industri" class="nav-link <?php echo ($sub_menu == 'jawaban_industri') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Industri</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=jawaban&sub_menu=jawaban_tendik" class="nav-link <?php echo ($sub_menu == 'jawaban_tendik') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tendik</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=jawaban&sub_menu=jawaban_mahasiswa" class="nav-link <?php echo ($sub_menu == 'jawaban_mahasiswa') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahasiswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=jawaban&sub_menu=jawaban_orang_tua" class="nav-link <?php echo ($sub_menu == 'jawaban_orang_tua') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Orang Tua</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="?pages=kategori" class="nav-link <?php echo ($menu == 'kategori') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Kategori
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?pages=pengguna" class="nav-link <?php echo ($menu == 'pengguna') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>