<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Survey Polinema | Log in </title>

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
      <div class="alert <?= strpos($_GET['pesan'], "berhasil") ? 'alert-success' : 'alert-danger' ?>">
        <?php echo $_GET['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
      </div>
    <?php
    }
    ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index2.html" class="h1"><b>Web</b> Survey</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Isi</p>

        <form action="cek_login.php" method="post">
          <div class="input-group mb-3">
            <select class="custom-select rounded-1" name="jenis_login" required>
              <option value="">Masuk sebagai siapa?</option>
              <option value="admin">Admin</option>
              <option value="mahasiswa">Mahasiswa</option>
              <option value="alumni">Alumni</option>
              <option value="dosen">Dosen</option>
              <option value="industri">Industri</option>
              <option value="orang_tua">Orang Tua</option>
              <option value="tendik">Tendik</option>
            </select>
          </div>
          <div class="input-group mb-3" id="username-group" style="display: none;">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3" id="password-group" style="display: none;">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select[name="jenis_login"]').on('change', function() {
        if (this.value === 'admin') {
          $('#username-group').show();
          $('#password-group').show();
        } else {
          $('#username-group').hide();
          $('#password-group').hide();
        }
      });
    });
  </script>

</body>

</html>