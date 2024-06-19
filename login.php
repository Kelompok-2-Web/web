<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Survey Polinema | Masuk</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">

    <?php
    if (isset($_GET['pesan'])) {
    ?>
      <div class="alert alert-danger">
        <?php echo $_GET['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index2.html" class="h1"><b>Web</b> Survey</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Isi</p>

        <!-- Form login untuk admin -->
        <form action="cek_login.php" method="post">
          <input type="hidden" name="jenis_login" value="admin">
          <div class="input-group mb-3">
            <!-- <label for="jenis_login">Masuk sebagai siapa</label> -->
            <select class="custom-select rounded-1" name="jenis_login" required>
              <option value="">Masuk sebagai siapa?</option>
              <option value="admin">Admin</option>
              <option value="alumni">Alumni</option>
              <option value="dosen">Dosen</option>
              <option value="industri">Industri</option>
              <option value="orang_tua">Orang Tua</option>
              <option value="tendik">Tendik</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <input type="username" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block mb-4">Login Admin</button>
            </div>
          </div>

          <!-- Tombol untuk pengguna non-admin -->
          <div class="text-center">
            <p class="mb-3"><u>Link Survey</u></p>
            <p class="daftar">
              <a href="form.php?role=mahasiswa">Mahasiswa</a> |
              <a href="form.php?role=dosen">Dosen</a> |
              <a href="form.php?role=orangtua">Orang Tua</a>
            </p>
            <p class="daftardua">
              <a href="form.php?role=tendik">Tendik</a> |
              <a href="form.php?role=industri">Industri</a> |
              <a href="form.php?role=alumni">Alumni</a>
            </p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>
