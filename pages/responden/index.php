<?php
include_once 'model/survey/m_survey.php';

$sub_menu = str_replace("responden_", "", $_GET['sub_menu']);
$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";


switch ($sub_menu) {
  case 'dosen':
    include_once "model/responden/t_responden_dosen.php";

    $resp_key = "responden_dosen_id";

    $responden = new tRespondenDosen();
    break;

  case 'alumni':
    include_once "model/responden/t_responden_alumni.php";

    $resp_key = "responden_alumni_id";

    $responden = new tRespondenAlumni();
    break;

  case 'industri':
    include_once "model/responden/t_responden_industri.php";

    $resp_key = "responden_industri_id";

    $responden = new tRespondenIndustri();
    break;

  case 'tendik':
    include_once "model/responden/t_responden_tendik.php";

    $resp_key = "responden_tendik_id";

    $responden = new tRespondenTendik();
    break;

  case 'mahasiswa':
    include_once "model/responden/t_responden_mahasiswa.php";

    $resp_key = "responden_mahasiswa_id";

    $responden = new tRespondenMahasiswa();
    break;

  case 'orang_tua':
    include_once "model/responden/t_responden_ortu.php";

    $resp_key = "responden_ortu_id";

    $responden = new tRespondenOrtu();
    break;
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Responden <?= ucfirst($sub_menu)  ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Responden <?= ucfirst($sub_menu) ?></li>
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
        $data = $responden->getDataById($_GET['id'])->fetch_assoc();

        $survey = new mSurvey();
        $survey = $survey->getDataById($data['survey_id'])->fetch_assoc();
      ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Responden</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <form action="?pages=responden/responden_action.php&act=edit&id=<?= $_GET['id'] ?>&sub_menu=<?= $sub_menu ?>" method="post" id="form-tambah">
              <input type="hidden" name="<?= $resp_key ?>" value="<?= $data[$resp_key] ?>">
              <input type="hidden" name="survey_id" value="<?= $data['survey_id'] ?>">
              <div class="form-group">
                <label for="survey">Survey</label>
                <input required type="text" id="nama_survey" class="form-control" value="<?= $survey['survey_nama'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="datetimepicker">Responden Tanggal</label>
                <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                  <input type="text" name="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" value="<?= $data['responden_tanggal'] ?>" />
                  <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <?php
              switch ($survey['survey_jenis']) {
                case 'mahasiswa':
                case 'alumni':
              ?>
                  <div class="form-group">
                    <label for="inputNIM">NIM</label>
                    <input type="number" class="form-control" id="inputNIM" name="responden_nim" placeholder="Masukkan NIM" value="<?= $data['responden_nim'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" value="<?= $data['responden_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputProdi">Prodi</label>
                    <input type="text" class="form-control" id="inputProdi" name="responden_prodi" placeholder="Masukkan Prodi" value="<?= $data['responden_prodi'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="responden_email" placeholder="Masukkan Email" value="<?= $data['responden_email'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputNoHP">No. HP</label>
                    <input type="tel" class="form-control" id="inputNoHP" name="responden_hp" placeholder="Masukkan No. HP" value="<?= $data['responden_hp'] ?>">
                  </div>
                  <?php
                  if ($survey['survey_jenis'] === "mahasiswa") {
                  ?>
                    <div class="form-group">
                      <label for="inputTahunMasuk">Tahun Masuk</label>
                      <input type="number" class="form-control" id="inputTahunMasuk" name="tahun_masuk" placeholder="Masukkan tahun Masuk" value="<?= $data['tahun_masuk'] ?>">
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-group">
                      <label for="inputTahunLulus">Tahun Lulus</label>
                      <input type="number" class="form-control" id="inputTahunLulus" name="tahun_lulus" placeholder="Masukkan tahun Lulus" value="<?= $data['tahun_lulus'] ?>">
                    </div>
                  <?php
                  }
                  break;
                case "dosen":
                  ?>
                  <div class="form-group">
                    <label for="inputNIP">NIP</label>
                    <input type="text" class="form-control" id="inputNIP" name="responden_nip" placeholder="Masukkan NIP" value="<?= $data['responden_nip'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" value="<?= $data['responden_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputUnit">Unit</label>
                    <input type="text" class="form-control" id="inputUnit" name="responden_unit" placeholder="Masukkan Unit" value="<?= $data['responden_unit'] ?>">
                  </div>
                <?php
                  break;
                case "industri":
                ?>
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" value="<?= $data['responden_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputJabatan">Jabatan</label>
                    <input type="text" class="form-control" id="inputJabatan" name="responden_jabatan" placeholder="Masukkan Jabatan" value="<?= $data['responden_jabatan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputPerusahaan">Perusahaan</label>
                    <input type="text" class="form-control" id="inputPerusahaan" name="responden_perusahaan" placeholder="Masukkan Perusahaan" value="<?= $data['responden_perusahaan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="responden_email" placeholder="Masukkan Email" value="<?= $data['responden_email'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputNoHP">No. HP</label>
                    <input type="tel" class="form-control" id="inputNoHP" name="responden_hp" placeholder="Masukkan No. HP" value="<?= $data['responden_hp'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputKota">Kota</label>
                    <input type="text" class="form-control" id="inputKota" name="responden_kota" placeholder="Masukkan Kota" value="<?= $data['responden_kota'] ?>">
                  </div>
                <?php
                  break;
                case "orang_tua":
                ?>
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" value="<?= $data['responden_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputJenisKelamin">Jenis Kelamin</label>
                    <select name="responden_jk" id="inputJenisKelamin" class="custom-select rounded-1">
                      <option value="" default>Pilih jenis kelamin</option>
                      <option value="L" <?= $data['responden_jk'] == "L" ? 'selected' : '' ?>>Laki-Laki</option>
                      <option value="P" <?= $data['responden_jk'] == "P" ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputUmur">Umur</label>
                    <input type="number" class="form-control" id="inputUmur" name="responden_umur" placeholder="Masukkan Nama" value="<?= $data['responden_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputNoHP">No. HP</label>
                    <input type="tel" class="form-control" id="inputNoHP" name="responden_hp" placeholder="Masukkan No. HP" value="<?= $data['responden_hp'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputPedidikan">Pendidikan</label>
                    <input type="text" class="form-control" id="inputPedidikan" name="responden_pendidikan" placeholder="Masukkan Pendidikan" value="<?= $data['responden_pendidikan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputPekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="inputPekerjaan" name="responden_pekerjaan" placeholder="Masukkan Pekerjaan" value="<?= $data['responden_pekerjaan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputPenghasilan">Penghasilan</label>
                    <input type="text" class="form-control" id="inputPenghasilan" name="responden_penghasilan" placeholder="Masukkan Penghasilan" value="<?= $data['responden_penghasilan'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputMahasiswaNIM">NIM Mahasiswa</label>
                    <input type="number" class="form-control" id="inputMahasiswaNIM" name="mahasiswa_nim" placeholder="Masukkan NIM Mahasiswa" value="<?= $data['mahasiswa_nim'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputMahasiswaNama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="inputMahasiswaNama" name="mahasiswa_nama" placeholder="Masukkan Nama Mahasiswa" value="<?= $data['mahasiswa_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputMahasiswaProdi">Prodi Mahasiswa</label>
                    <input type="text" class="form-control" id="inputMahasiswaProdi" name="mahasiswa_prodi" placeholder="Masukkan Prodi Mahasiswa" value="<?= $data['mahasiswa_prodi'] ?>">
                  </div>
                <?php
                  break;
                case "tendik":
                ?>
                  <div class="form-group">
                    <label for="inputNipeg">NIPEG</label>
                    <input type="text" class="form-control" id="inputNipeg" name="responden_nipeg" placeholder="Masukkan Nipeg" value="<?= $data['responden_nipeg'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" value="<?= $data['responden_nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputUnit">Unit</label>
                    <input type="text" class="form-control" id="inputUnit" name="responden_unit" placeholder="Masukkan Unit" value="<?= $data['responden_unit'] ?>">
                  </div>
              <?php
              }
              ?>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                <a href="?pages=responden&sub_menu=<?= $sub_menu ?>" class="btn btn-warning">Kembali</a>
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
              <th>Id Responden</th>
              <th>Survey</th>
              <th>Tanggal</th>
              <?php
              switch ($sub_menu) {
                case 'dosen':
              ?>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Unit</th>
                <?php
                  break;

                case 'alumni':
                ?>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Email</th>
                  <th>No. HP</th>
                  <th>Tahun Lulus</th>
                <?php
                  break;

                case 'industri':
                ?>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Perusahaan</th>
                  <th>Email</th>
                  <th>No. HP</th>
                  <th>Kota</th>
                <?php
                  break;

                case 'tendik':
                ?>
                  <th>NIPEG</th>
                  <th>Nama</th>
                  <th>Unit</th>
                <?php
                  break;

                case 'mahasiswa':
                ?>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Prodi</th>
                  <th>Email</th>
                  <th>No. HP</th>
                  <th>Tahun Masuk</th>
                <?php
                  break;

                case 'orang_tua':
                ?>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>No. HP</th>
                  <th>Pendidikan</th>
                  <th>Pekerjaan</th>
                  <th>Penghasilan</th>
                  <th>NIM Mahasiswa</th>
                  <th>Nama Mahasiswa</th>
                  <th>Prodi Mahasiswa</th>
              <?php
                  break;
              }
              ?>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $survey = new mSurvey();

            if (isset($_GET['responden_id'])) {
              $list = $responden->getDataByRespondenId($_GET['responden_id']);
            } else {
              $list = $responden->getData();
            }

            $i = 1;
            while ($row = $list->fetch_assoc()) {
              $survey_resp = $survey->getDataById($row['survey_id'])->fetch_assoc();
            ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $row[$resp_key] ?></td>
                <td><a href="?pages=survey&survey_id=<?= $row['survey_id'] ?>"><?= ucfirst($survey_resp['survey_nama']) ?></a></td>
                <td><?= explode(" ", $row['responden_tanggal'])[0] ?></td>
                <?php
                switch ($sub_menu) {
                  case 'dosen':
                ?>
                    <td><?= $row['responden_nip'] ?></td>
                    <td><?= $row['responden_nama'] ?></td>
                    <td><?= $row['responden_unit'] ?></td>
                  <?php
                    break;

                  case 'alumni':
                  ?>
                    <td><?= $row['responden_nim'] ?></td>
                    <td><?= $row['responden_nama'] ?></td>
                    <td><?= $row['responden_prodi'] ?></td>
                    <td><?= $row['responden_email'] ?></td>
                    <td><?= $row['responden_hp'] ?></td>
                    <td><?= $row['tahun_lulus'] ?></td>
                  <?php
                    break;

                  case 'industri':
                  ?>
                    <td><?= $row['responden_nama'] ?></td>
                    <td><?= $row['responden_jabatan'] ?></td>
                    <td><?= $row['responden_perusahaan'] ?></td>
                    <td><?= $row['responden_email'] ?></td>
                    <td><?= $row['responden_hp'] ?></td>
                    <td><?= $row['responden_kota'] ?></td>
                  <?php
                    break;

                  case 'tendik':
                  ?>
                    <td><?= $row['responden_nipeg'] ?></td>
                    <td><?= $row['responden_nama'] ?></td>
                    <td><?= $row['responden_unit'] ?></td>
                  <?php
                    break;

                  case 'mahasiswa':
                  ?>
                    <td><?= $row['responden_nim'] ?></td>
                    <td><?= $row['responden_nama'] ?></td>
                    <td><?= $row['responden_prodi'] ?></td>
                    <td><?= $row['responden_email'] ?></td>
                    <td><?= $row['responden_hp'] ?></td>
                    <td><?= $row['tahun_masuk'] ?></td>
                  <?php
                    break;

                  case 'orang_tua':
                  ?>
                    <td><?= $row['responden_nama'] ?></td>
                    <td><?= $row['responden_jk'] == "L" ? "Laki-Laki" : "Perempuan" ?></td>
                    <td><?= $row['responden_umur'] ?></td>
                    <td><?= $row['responden_hp'] ?></td>
                    <td><?= $row['responden_pendidikan'] ?></td>
                    <td><?= $row['responden_pekerjaan'] ?></td>
                    <td><?= $row['responden_penghasilan'] ?></td>
                    <td><?= $row['mahasiswa_nim'] ?></td>
                    <td><?= $row['mahasiswa_nama'] ?></td>
                    <td><?= $row['mahasiswa_prodi'] ?></td>
                <?php
                    break;
                }
                ?>
                <td>
                  <a title="Lihat Jawaban" href="?pages=jawaban&sub_menu=<?= $sub_menu ?>&responden_id=<?= $row[$resp_key] ?>" class="btn btn-primary btn-sm"><i class="fa fa-comment"></i></a>
                  <a title="Edit Data" href="?pages=responden&sub_menu=<?= $sub_menu ?>&act=edit&id=<?= $row[$resp_key] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&sub_menu=<?= $sub_menu ?>&act=hapus&id=<?= $row[$resp_key] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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