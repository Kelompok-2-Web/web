<?php
include_once 'model/survey/m_form.php';
include_once 'model/survey/m_survey_soal.php';
include_once 'model/survey/t_responden_soal_alumni.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : ""
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
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php //include_once "layouts/header.php" 
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php //include_once "layouts/sidebar.php" 
        ?>

        <div class="content-wrapper">
            <!-- Content Wrapper. Contains page content -->

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Survey <?php echo $_SESSION['role'] ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                $act = (isset($_GET['act'])) ? $_GET['act'] : '';
                if ($act == 'kerjakan') { ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">INI BUAT PAGE NGERJAIN BOS</h3>
                        </div>
                        <div class="card-body">
                        <form action="?hasil.php&act=simpan" method="post" id="simpan">
                            <?php
                            $bank = new mSurveySoal();
                            $surveyId = $_GET['id'];
                            $list = $bank->getDataBySurveyId($surveyId);

                            while ($row = $list->fetch_assoc()) { ?>
                                <input type="hidden" name="soal_id" value="<?= $row['soal_id'] ?>">
                                <div class="form-group">
                                    <label for="<?= $row['soal_nama'] ?>"><?= $row['soal_nama'] ?></label>
                                    <?php
                                    if ($row['soal_jenis'] == 'essay') { ?>
                                        <input required type="text" name="<?= $row['soal_id'] ?>" id="<?= $row['soal_id'] ?>" class="form-control">
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="<?= $row['soal_id'] ?>" id="<?= $row['soal_id'] ?>" value="Sangat Tidak Puas">
                                                <label class="form-check-label">Sangat Tidak Puas</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="<?= $row['soal_id'] ?>" id="<?= $row['soal_id'] ?>" value="Tidak Puas">
                                                <label class="form-check-label">Tidak Puas</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="<?= $row['soal_id'] ?>" id="<?= $row['soal_id'] ?>" value="Netral">
                                                <label class="form-check-label">Netral</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="<?= $row['soal_id'] ?>" id="<?= $row['soal_id'] ?>" value="Puas">
                                                <label class="form-check-label">Puas</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="<?= $row['soal_id'] ?>" id="<?= $row['soal_id'] ?>" value="Sangat Puas">
                                                <label class="form-check-label">Sangat Puas</label>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan">Simpan</button>
                                <a href="form.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                <?php } else { ?>
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Survey Yang Tersedia</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Survey</th>
                                        <th>Deskripsi Survey</th>
                                        <th>Tanggal Survey</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bank = new mForm();
                                    $role = $_SESSION['role'];
                                    $list = $bank->getData($role);

                                    $i = 1;
                                    while ($row = $list->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row['survey_nama'] ?></td>
                                            <td><?= $row['survey_deskripsi'] ?></td>
                                            <td><?= $row['survey_tanggal'] ?></td>
                                            <td>
                                                <a title="kerjakan survey" href="?pages=form&act=kerjakan&id=<?= $row['survey_id'] ?>">Kerjakan</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

            </section>
        <?php } ?>
        </div>

        <?php //include_once "layouts/footer.php" 
        ?>

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
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

</body>

</html>