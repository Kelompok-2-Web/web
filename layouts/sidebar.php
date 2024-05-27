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
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

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
              <i class="right fas fa-angle-left"></i>
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

        <li class="nav-item">
          <a href="?pages=responden" class="nav-link <?php echo ($menu == 'responden') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Responden
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?pages=jawaban" class="nav-link <?php echo ($menu == 'jawaban') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-voicemail"></i>
            <p>
              Jawaban
            </p>
          </a>
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

        <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Layout Options
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation + Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Boxed</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Navbar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-footer.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Footer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collapsed Sidebar</p>
                  </a>
                </li>
              </ul>
            </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>