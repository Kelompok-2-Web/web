<?php
// ob_start();
include_once 'model/survey/m_survey.php';
include_once 'model/m_user_model.php';

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Survey</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Survey</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<!-- Tempus Dominus -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <a href="?pages=survey&act=tambah" class="btn btn-sm btn-primary">Tambah Survey</a>
            </div>
        </div>
        <div class="card-body">
            <?php
            $act = (isset($_GET['act'])) ? $_GET['act'] : '';

            if ($act == 'tambah') {
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Survey</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        <form action="?pages=survey/survey_action.php&act=simpan" method="post" id="form-tambah">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                            <div class="form-group">
                                <label for="jenis_survey">Jenis Survey</label>
                                <select class="custom-select rounded-1" name="jenis_survey">
                                    <option value="pilgan">Pilgan</option>
                                    <option value="essay">Essay</option>
                                    <option value="parameter">Parameter</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_survey">Kode Survey</label>
                                <input required type="text" name="kode_survey" id="kode_survey" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama_survey">Nama Survey</label>
                                <input required type="text" name="nama_survey" id="nama_survey" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Deksripsi Survey</label>
                                <textarea class="form-control" name="deskripsi_survey" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="datetimepicker">Choose a date</label>
                                <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                    <input type="text" name="tanggal_survey" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="?pages=survey" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } else if ($act == 'edit') { ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Soal Survey</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        <?php
                        $id = $_GET['id'];
                        $bank_soal = new mSurvey();
                        $data = $bank_soal->getDataById($id);
                        $data = $data->fetch_assoc();
                        ?>
                        <form action="?pages=survey/survey_action.php&act=edit&id=<?= $id ?>" method="post" id="form-tambah">
                            <div class="form-group">
                                <label for="jenis_survey">Jenis Survey</label>
                                <!-- Perlu implementasi!! -->
                                <select class="custom-select rounded-1" name="jenis_survey">
                                    <option value="pilgan" <?= $data['survey_jenis'] == 'pilgan' ? 'selected' : '' ?>>Pilgan</option>
                                    <option value="essay" <?= $data['survey_jenis'] == 'essay' ? 'selected' : '' ?>>Essay</option>
                                    <option value="parameter" <?= $data['survey_jenis'] == 'parameter' ? 'selected' : '' ?>>Parameter</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id">Pembuat</label>
                                <!-- Perlu implementasi!! -->
                                <select class="custom-select rounded-1" name="user_id">
                                    <?php
                                    $user = new User();
                                    $user = $user->getData();

                                    while ($row = $user->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $row['user_id'] ?>"><?php echo $row['username'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id">Kode Survey</label>
                                <input required type="text" name="user_id" id="user_id" class="form-control" value="<?= $data['user_id'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="kode_survey">Kode Survey</label>
                                <input required type="text" name="kode_survey" id="kode_survey" class="form-control" value="<?= $data['survey_kode'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_survey">Nama Survey</label>
                                <input required type="text" name="nama_survey" id="nama_survey" class="form-control" value="<?= $data['survey_nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Deksripsi Survey</label>
                                <textarea class="form-control" name="deskripsi_survey" rows="3"><?= $data['survey_deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="datetimepicker">Choose a date</label>
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input type="text" name="tanggal_survey" class="form-control datetimepicker-input" data-target="#datetimepicker" value="<?= $data['survey_tanggal'] ?>" />
                                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="?pages=survey" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <?php
                if ($status == 'sukses') {
                    echo '<div class="alert alert-success">
                      ' . $message . '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                }
                ?>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Survey</th>
                            <th>Pembuat</th>
                            <th>Jenis Survey</th>
                            <th>Kode Survey</th>
                            <th>Nama Survey</th>
                            <th>Deskripsi Survey</th>
                            <th>Tanggal Survey</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $bank = new mSurvey();
                        $user = new User();
                        $list = $bank->getData();

                        $i = 1;
                        while ($row = $list->fetch_assoc()) {
                            $user_res = $user->getDataById($row['user_id']);
                            $user_row = $user_res->fetch_assoc();
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['survey_id'] ?></td>
                                <td><a href="?pages=pengguna&user_id=<?= $row['user_id'] ?>"><?= $user_row['username'] ?></a></td>
                                <td><?= $row['survey_jenis'] ?></td>
                                <td><?= $row['survey_kode'] ?></td>
                                <td><?= $row['survey_nama'] ?></td>
                                <td><?= $row['survey_deskripsi'] ?></td>
                                <td><?= $row['survey_tanggal'] ?></td>
                                <td>
                                    <a title="Edit Data" href="?pages=survey&act=edit&id=<?= $row['survey_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=soal/soal_action.php&act=hapus&id=<?= $row['survey_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
    </div>
</section>

<!-- Tempus Dominus Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- jQuery Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_id.min.js"></script>


</section>

<script>
    document.getElementById('form-tambah').addEventListener("submit", function(event) {
        console.log("apalah");
    });
</script>

<script>
    $(function() {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'id'
        });
    });
</script>