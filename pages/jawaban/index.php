<?php
include_once 'model/survey/m_survey_soal.php';
$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";
switch (str_replace("jawaban_", "", $_GET['sub_menu'])) {
  case 'dosen':
    include_once "model/jawaban/t_jawaban_dosen.php";
    include_once "model/responden/t_responden_dosen.php";
    $jaw_key = "jawaban_dosen_id";
    $resp_key = "responden_dosen_id";
    $jawaban = new tJawabanDosen();
    $responden = new tRespondenDosen();
    break;
  case 'alumni':
    include_once "model/jawaban/t_jawaban_alumni.php";
    include_once "model/responden/t_responden_alumni.php";
    $jaw_key = "jawaban_alumni_id";
    $resp_key = "responden_alumni_id";
    $jawaban = new tJawabanAlumni();
    $responden = new tRespondenAlumni();
    break;
  case 'industri':
    include_once "model/jawaban/t_jawaban_industri.php";
    include_once "model/responden/t_responden_industri.php";
    $jaw_key = "jawaban_industri_id";
    $resp_key = "responden_industri_id";
    $jawaban = new tJawabanIndustri();
    $responden = new tRespondenIndustri();
    break;
  case 'tendik':
    include_once "model/jawaban/t_jawaban_tendik.php";
    include_once "model/responden/t_responden_tendik.php";
    $jaw_key = "jawaban_tendik_id";
    $resp_key = "responden_tendik_id";
    $jawaban = new tJawabanTendik();
    $responden = new tRespondenTendik();
    break;
  case 'mahasiswa':
    include_once "model/jawaban/t_jawaban_mahasiswa.php";
    include_once "model/responden/t_responden_mahasiswa.php";
    $jaw_key = "jawaban_mahasiswa_id";
    $resp_key = "responden_mahasiswa_id";
    $jawaban = new tJawabanMahasiswa();
    $responden = new tRespondenMahasiswa();
    break;
  case 'orang_tua':
    include_once "model/jawaban/t_jawaban_ortu.php";
    include_once "model/responden/t_responden_ortu.php";
    $jaw_key = "jawaban_ortu_id";
    $resp_key = "responden_ortu_id";
    $jawaban = new tJawabanOrtu();
    $responden = new tRespondenOrtu();
    break;
  default:
    # code...
    break;
}
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Jawaban</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Jawaban</li>
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
      <!-- <div class="card-tools">
        <a href="?pages=survey&act=tambah" class="btn btn-sm btn-primary">Tambah Jawaban</a>
      </div> -->
    </div>
    <div class="card-body">
      <?php
      $act = (isset($_GET['act'])) ? $_GET['act'] : '';
      if ($act == 'edit') {
        $data = $jawaban->getDataById($_GET['id'])->fetch_assoc();
        $data_resp = $responden->getDataById($data[$resp_key])->fetch_assoc();
        $soal = new mSurveySoal();
        $soal = $soal->getDataById($data['soal_id'])->fetch_assoc();
      ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Jawaban</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <form action="?pages=jawaban/jawaban_action.php&act=edit&id=<?= $_GET['id'] ?>&sub_menu=<?= $_GET['sub_menu'] ?>" method="post" id="form-tambah">
              <input type="hidden" name="<?= $resp_key ?>" value="<?= $data[$resp_key] ?>">
              <input type="hidden" name="soal_id" value="<?= $data['soal_id'] ?>">
              <div class="form-group">
                <label for="responden">Responden</label>
                <input required type="text" id="responden" class="form-control" value="<?= $data_resp['responden_nama'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="soal">Soal</label>
                <input required type="text" id="nama_survey" class="form-control" value="<?= $soal['soal_nama'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="jawaban">Jawaban</label>
                <textarea class="form-control" id="jawaban" name="jawaban" rows="3"><?= $data['jawaban'] ?></textarea>
              </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                <a href="?pages=jawaban&sub_menu=<?= $_GET['sub_menu'] ?>" class="btn btn-warning">Kembali</a>
              </div>
            </form>
          </div>
        </div>
      <?php } else {
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
              <th>Id Jawaban</th>
              <th>Responden</th>
              <th>Soal</th>
              <th>Jawaban</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $soal = new mSurveySoal();

            $list = $jawaban->getData();
            $id = $_GET['id'];
            $list = $jawaban->getDataByRespondenId($id);

            $i = 1;
            while ($row = $list->fetch_assoc()) {
              $resp_res = $responden->getDataById($row[$resp_key])->fetch_assoc();
              $soal_res = $soal->getDataById($row['soal_id'])->fetch_assoc();
            ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $row[$jaw_key] ?></td>
                <td><a href="?pages=responden&sub_menu=<?= $_GET['sub_menu'] ?>&responden_id=<?= $row[$resp_key] ?>"><?= ucfirst($resp_res['responden_nama']) ?></a></td>
                <td><a href="?pages=soal&soal_id=<?= $row['soal_id'] ?>"><?= ucfirst($soal_res['soal_nama']) ?></a></td>
                <td><?= $row['jawaban'] ?></td>
                <td>
                  <a title="Edit Data" href="?pages=jawaban&sub_menu=<?= $_GET['sub_menu'] ?>&act=edit&id=<?= $row[$jaw_key] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=jawaban/jawaban_action.php&sub_menu=<?= $_GET['sub_menu'] ?>&act=hapus&id=<?= $row[$jaw_key] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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