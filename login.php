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

  <!-- Custom CSS -->
  <style>
    body {
      background: linear-gradient(to right, #89f7fe, #66a6ff);
      font-family: 'Source Sans Pro', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
    }

    .login-box {
      width: 350px;
      margin: auto;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.95);
      padding: 20px;
    }

    .card {
      border-radius: 10px;
      overflow: hidden;
    }

    .card-header {
      background: #66a6ff;
      color: white;
      text-align: center;
      padding: 10px 0;
    }

    .card-header a {
      color: white;
      font-size: 20px;
      font-weight: bold;
    }

    .input-group-text {
      background: #66a6ff;
      color: white;
      border: none;
    }

    .form-control {
      border-radius: 0 5px 5px 0;
      border-left: none;
    }

    .btn-primary {
      background: #66a6ff;
      border: none;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .btn-primary:hover {
      background: #5591ff;
    }

    .custom-select {
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .custom-select:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-box-msg {
      font-size: 18px;
      font-weight: bold;
    }

    .alert {
      border-radius: 5px;
    }

    .text-center {
      text-align: center;
    }

    .icon {
      font-size: 50px;
      color: #66a6ff;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php
    if (isset($_GET['pesan'])) {
    ?>
      <div class="alert alert-danger">
        <?php echo $_GET['pesan'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
      </div>
    <?php
    }
    ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header">
        <div class="text-center">
          <i class="fas fa-smile icon"></i>
          <a href="#" class="h1"><b>Web Survey</b></a>
        </div>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Masuk untuk memulai survey</p>

        <form action="cek_login.php" method="post">
          <div class="input-group mb-3">
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
            <input type="username" class="form-control" placeholder="Username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
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

</body>

</html>
