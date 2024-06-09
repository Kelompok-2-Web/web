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
  <style>
    body {
      background-image: url("assets/polinema.jpg");
      background-size: cover;
      /* Mengatur gambar agar selalu mencakup seluruh area latar belakang */
      background-position: center;
      /* Mengatur posisi gambar latar belakang ke tengah */
      background-repeat: no-repeat;
      /* Mencegah gambar latar belakang diulang */
    }

    .login-box {
      max-width: 600px;
      /* Memperbesar lebar maksimal */
      width: 100%;
      margin: 7% auto;
    }

    .card-body {
      padding: 2.5rem;
    }

    .login-box-msg {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }

    .card-header {
      padding: 1.5rem 1rem;
    }

    .card-header .h1 {
      font-size: 2.2rem;
    }

    .daftar,
    .daftardua {
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    .daftar a,
    .daftardua a {
      color: #007bff;
      text-decoration: none;
      margin: 0 10px;
    }

    .daftar a:hover,
    .daftardua a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php if (isset($_GET['pesan'])) { ?>
      <div class="alert <?= strpos($_GET['pesan'], "berhasil") ? 'alert-success' : 'alert-danger' ?> alert-dismissible">
        <?php echo $_GET['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Survey</b>Kepuasan</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Pilih dan Isi</p>

        <!-- Form login untuk admin -->
        <form action="cek_login.php" method="post">
          <input type="hidden" name="jenis_login" value="admin">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username Admin" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password Admin" name="password" required>
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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>