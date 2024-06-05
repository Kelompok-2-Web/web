<?php $menu = 'index';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (empty($_SESSION['nama']) && empty($_SESSION['username']) && empty($_SESSION['user_id'])) {
  header("location:login.php");
}

$menu = !empty($_GET['pages']) ? explode('/', $_GET['pages'])[0] : "index";
$sub_menu = !empty($_GET['sub_menu']) ? explode('/', $_GET['sub_menu'])[0] : "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | <?php echo isset($_GET['pages']) ? ucfirst($_GET['pages']) : "Dashboard"  ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- CSS BOX -->
  <link rel="stylesheet" href="style.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="height: 100%;">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once "layouts/header.php" ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once "layouts/sidebar.php" ?>

    <div class="content-wrapper">
      <?php
      if (!empty($_GET['pages'])) {
        include "pages/" . $_GET['pages'] . (!strpos($_GET['pages'], ".php") ? "/index.php" : "");
      } else {
      ?>
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Dashboard</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- box responden -->
          <div class="container-fluid">
            <?php
            include_once "model/m_dashboard.php";

            $obj = new mDashboard();
            ?>
            <div class="row">
              <div class="col-md-2 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $obj->jumlahRespondenDosen()->fetch_assoc()['jumlah'] ?></h3>
                    <p>Responden Dosen</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-tie"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?php echo $obj->jumlahRespondenMahasiswa()->fetch_assoc()['jumlah'] ?></h3>
                    <p>Responden Mahasiswa</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo $obj->jumlahRespondenAlumni()->fetch_assoc()['jumlah'] ?></h3>
                    <p>Responden Alumni</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?php echo $obj->jumlahRespondenOrtu()->fetch_assoc()['jumlah'] ?></h3>
                    <p>Responden Orang Tua</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-friends"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3><?php echo $obj->jumlahRespondenTendik()->fetch_assoc()['jumlah'] ?></h3>
                    <p>Responden Tendik</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-gear"></i>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="small-box bg-secondary">
                  <div class="inner">
                    <h3><?php echo $obj->jumlahRespondenIndustri()->fetch_assoc()['jumlah'] ?></h3>
                    <p>Responden Industri</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-city"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            Start creating your amazing application!
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->

        <!-- /.content-wrapper -->
      <?php
      }
      ?>
    </div>

    <?php include_once "layouts/footer.php" ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>

</html>