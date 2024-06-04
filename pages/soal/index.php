<?php
include_once 'model/survey/m_survey_soal.php';
include_once 'model/survey/m_survey.php';
include_once 'model/survey/m_kategori.php';

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Soal Survey</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Soal Survey</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"></h3>

      <div class="card-tools">
        <a href="?pages=soal&act=tambah" class="btn btn-sm btn-primary">Tambah Soal</a>
      </div>
    </div>
    <div class="card-body">

      <?php
      $act = isset($_GET['act']) ? $_GET['act'] : '';

      if ($act == 'tambah') {
      ?>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Soal Survey</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <form action="?pages=soal/soal_action.php&act=simpan" method="post" id="form-tambah">
              <div class="form-group">
                <label for="survey_id">Survey</label>
                <select class="custom-select rounded-1" name="survey_id">
                  <?php
                  $survey = new mSurvey();
                  $result = $survey->getData();
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?= $row['survey_id'] ?>"><?php echo $row['survey_nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select class="custom-select rounded-1" name="kategori_id">
                  <?php
                  $kategori = new mKategori();
                  $result = $kategori->getData();
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?= $row['kategori_id'] ?>"><?php echo $row['kategori_nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="no_urut">No Urut</label>
                <input required type="number" name="no_urut" id="no_urut" class="form-control">
              </div>
              <div class="form-group">
                <label for="soal_jenis">Soal Jenis</label>
                <select class="custom-select rounded-1" name="soal_jenis">
                  <option value="pilgan">Pilgan</option>
                  <option value="essay">Essay</option>
                  <option value="parameter">Parameter</option>
                </select>
              </div>
              <div class="form-group">
                <label for="soal_nama">Soal</label>
                <input required type="text" name="soal_nama" id="soal_nama" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                <a href="?pages=soal" class="btn btn-warning">Kembali</a>
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

            $soal = new mSurveySoal();
            $data = $soal->getDataById($id)->fetch_assoc();
            ?>

            <form action="?pages=soal/soal_action.php&act=edit&id=<?= $id ?>" method="post" id="form-tambah">
              <div class="form-group">
                <label for="survey_id">Survey</label>
                <select class="custom-select rounded-1" name="survey_id">
                  <?php
                  $survey = new mSurvey();
                  $result = $survey->getData();
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?= $row['survey_id'] ?>" <?= $data['survey_id'] == $row['survey_id'] ? 'selected' : '' ?>><?php echo $row['survey_nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select class="custom-select rounded-1" name="kategori_id">
                  <?php
                  $kategori = new mKategori();
                  $result = $kategori->getData();
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <option value="<?= $row['kategori_id'] ?>" <?= $data['kategori_id'] == $row['kategori_id'] ? 'selected' : '' ?>><?php echo $row['kategori_nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="no_urut">No Urut</label>
                <input required type="number" name="no_urut" id="no_urut" class="form-control" value="<?php echo $data['no_urut'] ?>">
              </div>
              <div class="form-group">
                <label for="soal_jenis">Soal Jenis</label>
                <select class="custom-select rounded-1" name="soal_jenis">
                  <option value="pilgan" <?= $data['soal_jenis'] == 'pilgan' ? 'selected' : '' ?>>Pilgan</option>
                  <option value="essay" <?= $data['soal_jenis'] == 'essay' ? 'selected' : '' ?>>Essay</option>
                  <option value="parameter" <?= $data['soal_jenis'] == 'parameter' ? 'selected' : '' ?>>Parameter</option>
                </select>
              </div>
              <div class="form-group">
                <label for="soal_nama">Soal</label>
                <input required type="text" name="soal_nama" id="soal_nama" class="form-control" value="<?php echo $data['soal_nama'] ?>">
              </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="?pages=soal.php" class="btn btn-warning">Kembali</a>
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
              <th>Soal Id</th>
              <th>Survey</th>
              <th>Kategori</th>
              <th>Nomor Urut</th>
              <th>Soal Jenis</th>
              <th>Soal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $bank = new mSurveySoal();
            $survey = new mSurvey();
            $kategori = new mKategori();

            if (isset($_GET['soal_id'])) {
              $list = $bank->getDataById($_GET['soal_id']);
            } else {
              $list = $bank->getData();
            }

            $i = 1;
            while ($row = $list->fetch_assoc()) {
              $surveyData = $survey->getDataById($row['survey_id'])->fetch_assoc();

              $kategoriData = $kategori->getDataById($row['kategori_id'])->fetch_assoc();
            ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['soal_id'] ?></td>
                <td><a href="?pages=survey&survey_id=<?php echo $row['survey_id'] ?>"><?php echo $surveyData['survey_nama'] ?></a></td>
                <td><a href="?pages=kategori&kategori_id=<?php echo $row['kategori_id'] ?>"><?php echo $kategoriData['kategori_nama'] ?></a></td>
                <td><?php echo $row['no_urut'] ?></td>
                <td><?php echo $row['soal_jenis'] ?></td>
                <td><?php echo $row['soal_nama'] ?></td>
                <td>
                  <a title="Edit Data" href="?pages=soal&act=edit&id=<?php echo $row['soal_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=soal/soal_action.php&act=hapus&id=<?php echo $row['soal_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
</section>

<!-- jQuery Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_id.min.js"></script>

<script>
  $(document).ready(function() {});
</script>