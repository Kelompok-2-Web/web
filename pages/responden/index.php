<?php
include_once 'model/survey/m_survey_soal.php';
include_once 'model/survey/m_survey.php';
$pkg = array_merge(glob('model/responden/*.*'), glob('model/jawaban/*.*'));
foreach ($pkg as $file) {
  include_once($file);
}

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $_GET['sub_menu'] ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Responden</li>
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
    </div>
    <div class="card-body">

      <?php
      $act = (isset($_GET['act'])) ? $_GET['act'] : '';

      if ($act == 'tambah') {
        $role = (isset($_GET['role'])) ? $_GET['role'] : '';

        if ($role == 'dosen') { ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Responden Dosenssss</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=simpan&role=dosen" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" id="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nip">Responen NIP</label>
                  <input required type="number" name="responden_nip" id="responden_nip" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_unit">Responen Unit</label>
                  <input required type="text" name="responden_unit" id="responden_unit" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_dosen" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } else if ($role == 'alumni') { ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Alumni</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=simpan&role=alumni" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nim">Responen NIM</label>
                  <input required type="number" name="responden_nim" id="responden_nim" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_prodi">Responen Prodi</label>
                  <input required type="text" name="responden_prodi" id="responden_prodi" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_email">Responen Email</label>
                  <input required type="email" name="responden_email" id="responden_email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_hp">Responen Hp</label>
                  <input required type="number" name="responden_hp" id="responden_hp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="tahun_lulus">Tahun Lulus</label>
                  <input required type="number" name="tahun_lulus" id="tahun_lulus" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_alumni" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } else if ($role == 'industri') { ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Alumni</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=simpan&role=industri" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_jabatan">Responen Jabatan</label>
                  <input required type="text" name="responden_jabatan" id="responden_jabatan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_perusahaan">Responen Perusahaan</label>
                  <input required type="text" name="responden_perusahaan" id="responden_perusahaan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_email">Responen Email</label>
                  <input required type="email" name="responden_email" id="responden_email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_hp">Responen Hp</label>
                  <input required type="number" name="responden_hp" id="responden_hp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_kota">Responden Kota</label>
                  <input required type="text" name="responden_kota" id="responden_kota" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_industri" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } else if ($role == 'tendik') { ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Alumni</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=simpan&role=tendik" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nopeg">Responen Nopeg</label>
                  <input required type="number" name="responden_nopeg" id="responden_nopeg" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_unit">Responen Unit</label>
                  <input required type="text" name="responden_unit" id="responden_unit" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_tendik" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } else if ($role == 'mahasiswa') { ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Alumni</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=simpan&role=mahasiswa" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nim">Responen NIM</label>
                  <input required type="number" name="responden_nim" id="responden_nim" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_prodi">Responen Prodi</label>
                  <input required type="text" name="responden_prodi" id="responden_prodi" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_email">Responen Email</label>
                  <input required type="email" name="responden_email" id="responden_email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_hp">Responen Hp</label>
                  <input required type="number" name="responden_hp" id="responden_hp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="tahun_masuk">Tahun Masuk</label>
                  <input required type="number" name="tahun_masuk" id="tahun_masuk" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_mahasiswa" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } else if ($role == 'ortu') { ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Alumni</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=simpan&role=ortu" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <!-- <div class="form-group">
                  <label for="responden_jabatan">Responen Jenis Kelamin</label>
                  <input required type="text" name="responden_jabatan" id="responden_jabatan" class="form-control">
                </div> -->
                <div class="form-group">
                <label for="responden_jabatan">Responen Jenis Kelamin</label>
                  <select class="custom-select rounded-1" name="responden_jk" id="responden_jabatan" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="responden_umur">Responen Umur</label>
                  <input required type="number" name="responden_umur" id="responden_umur" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_hp">Responen Hp</label>
                  <input required type="number" name="responden_hp" id="responden_hp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_pendidikan">Responen Pendidikan</label>
                  <input required type="text" name="responden_pendidikan" id="responden_pendidikan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_pekerjaan">Responden Pekerjaan</label>
                  <input required type="text" name="responden_pekerjaan" id="responden_pekerjaan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_penghasilan">Responden Penghasilan</label>
                  <input required type="number" name="responden_penghasilan" id="responden_penghasilan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mahasiswa_nim">Mahasiswa NIM</label>
                  <input required type="number" name="mahasiswa_nim" id="mahasiswa_nim" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mahasiswa_nama">Mahasiswa Nama</label>
                  <input required type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mahasiswa_prodi">Mahasiswa Prodi</label>
                  <input required type="text" name="mahasiswa_prodi" id="mahasiswa_prodi" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_industri" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php }
        ?>

      <?php } else if ($act == 'edit') { ?>
        <?php
        $role = (isset($_GET['role'])) ? $_GET['role'] : '';

        if ($role == 'dosen') { ?>
        <?php
        $id = (isset($_GET['id'])) ? $_GET['id'] : '';
          $bank = new tRespondenDosen();
          $list = $bank->getDataById($id);
          $row = $list->fetch_assoc();
        ?>
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Tambah Responden Dosenssss</h3>
              <div class="card-tools"></div>
            </div> -->
            <div class="card-body">
              <form action="?pages=responden/responden_action.php&act=edit&role=dosen&id=<?php $id ?>" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_id">Survey ID</label>
                  <input required type="number" name="survey_id" id="survey_id" class="form-control">
                </div>
                <div class="form-group">
                  <label for="datetimepicker">Pilih tanggal</label>
                  <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                    <input type="text" name="responden_tanggal" id="responden_tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="responden_nip">Responen NIP</label>
                  <input required type="number" name="responden_nip" id="responden_nip" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Responen Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_unit">Responen Unit</label>
                  <input required type="text" name="responden_unit" id="responden_unit" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="?pages=responden&sub_menu=responden_dosen" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } else if ($role == 'alumni') { ?>

        <?php } else if ($role == 'industri') { ?>

        <?php } else if ($role == 'tendik') { ?>

        <?php } else if ($role == 'mahasiswa') { ?>

        <?php } else if ($role == 'ortu') { ?>

        <?php }
        ?>

        <!-- <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Pengguna</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">

            <?php
            $id = $_GET['id'];

            $bank_soal = new User();
            $data = $bank_soal->getDataById($id);

            $data = $data->fetch_assoc();
            ?>

            <form action="?pages=pengguna/pengguna_action.php&act=edit&id=<?= $id ?>" method="post" id="form-tambah">
              <div class="form-group">
                <label for="username">Username</label>
                <input required type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input required type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="*hanya diisi jika hendak mengubah password">
              </div>
              <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                <a href="?pages=pengguna" class="btn btn-warning">Kembali</a>
              </div>
            </form>
          </div>
        </div> -->

        <?php } else if ($act == 'detail_jawaban') {
        $role = (isset($_GET['role'])) ? $_GET['role'] : '';

        if ($role == 'dosen') { ?>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawaban Dosen ID</th>
                <th>Responden Dosen ID</th>
                <th>Soal ID</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = (isset($_GET['id'])) ? $_GET['id'] : '';
              $bank = new tJawabanDosen();
              $list = $bank->getDataByRespondenId($id);
              $i = 1;
              while ($row = $list->fetch_assoc()) { ?>
                <tr>
                  <td> <?php $i ?></td>
                  <td> <?php echo $row['jawaban_dosen_id'] ?></td>
                  <td> <?php echo $row['responden_dosen_id'] ?></td>
                  <td> <?php echo $row['soal_id'] ?></td>
                  <td> <?php echo $row['jawaban'] ?></td>
                </tr>
              <?php }
              ?>
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php } else if ($role == 'alumni') { ?>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawaban Alumni ID</th>
                <th>Responden Alumni ID</th>
                <th>Soal ID</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = (isset($_GET['id'])) ? $_GET['id'] : '';
              $bank = new tJawabanAlumni();
              $list = $bank->getDataByRespondenId($id);
              $i = 1;
              while ($row = $list->fetch_assoc()) { ?>
                <tr>
                  <td> <?php $i ?></td>
                  <td> <?php echo $row['jawaban_alumni_id'] ?></td>
                  <td> <?php echo $row['responden_alumni_id'] ?></td>
                  <td> <?php echo $row['soal_id'] ?></td>
                  <td> <?php echo $row['jawaban'] ?></td>
                </tr>
              <?php }
              ?>
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php } else if ($role == 'industri') { ?>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawaban Industri ID</th>
                <th>Responden Industri ID</th>
                <th>Soal ID</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = (isset($_GET['id'])) ? $_GET['id'] : '';
              $bank = new tJawabanIndustri();
              $list = $bank->getDataByRespondenId($id);
              $i = 1;
              while ($row = $list->fetch_assoc()) { ?>
                <tr>
                  <td> <?php $i ?></td>
                  <td> <?php echo $row['jawaban_industri_id'] ?></td>
                  <td> <?php echo $row['responden_industri_id'] ?></td>
                  <td> <?php echo $row['soal_id'] ?></td>
                  <td> <?php echo $row['jawaban'] ?></td>
                </tr>
              <?php }
              ?>
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php } else if ($role == 'tendik') { ?>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawaban Tendik ID</th>
                <th>Responden Tendik ID</th>
                <th>Soal ID</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = (isset($_GET['id'])) ? $_GET['id'] : '';
              $bank = new tJawabanTendik();
              $list = $bank->getDataByRespondenId($id);
              $i = 1;
              while ($row = $list->fetch_assoc()) { ?>
                <tr>
                  <td> <?php $i ?></td>
                  <td> <?php echo $row['jawaban_tendik_id'] ?></td>
                  <td> <?php echo $row['responden_tendik_id'] ?></td>
                  <td> <?php echo $row['soal_id'] ?></td>
                  <td> <?php echo $row['jawaban'] ?></td>
                </tr>
              <?php }
              ?>
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php } else if ($role == 'mahasiswa') { ?>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawaban Mahasiswa ID</th>
                <th>Responden Mahasiswa ID</th>
                <th>Soal ID</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = (isset($_GET['id'])) ? $_GET['id'] : '';
              $bank = new tJawabanMahasiswa();
              $list = $bank->getDataByRespondenId($id);
              $i = 1;
              while ($row = $list->fetch_assoc()) { ?>
                <tr>
                  <td> <?php $i ?></td>
                  <td> <?php echo $row['jawaban_mahasiswa_id'] ?></td>
                  <td> <?php echo $row['responden_mahasiswa_id'] ?></td>
                  <td> <?php echo $row['soal_id'] ?></td>
                  <td> <?php echo $row['jawaban'] ?></td>
                </tr>
              <?php }
              ?>
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php } else if ($role == 'ortu') { ?>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawaban Orang Tua ID</th>
                <th>Responden Orang Tua ID</th>
                <th>Soal ID</th>
                <th>Jawaban</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = (isset($_GET['id'])) ? $_GET['id'] : '';
              $bank = new tJawabanOrtu();
              $list = $bank->getDataByRespondenId($id);
              $i = 1;
              while ($row = $list->fetch_assoc()) { ?>
                <tr>
                  <td> <?php $i ?></td>
                  <td> <?php echo $row['jawaban_ortu_id'] ?></td>
                  <td> <?php echo $row['responden_ortu_id'] ?></td>
                  <td> <?php echo $row['soal_id'] ?></td>
                  <td> <?php echo $row['jawaban'] ?></td>
                </tr>
              <?php }
              ?>
              <tr>
                <td></td>
              </tr>
            </tbody>
          </table>
        <?php } ?>

        <?php } else if ($act == 'detail_responden') {
        $role = (isset($_GET['role'])) ? $_GET['role'] : '';

        if ($role == 'dosen') { ?>

        <?php } else if ($role == 'alumni') { ?>

        <?php } else if ($role == 'industri') { ?>

        <?php } else if ($role == 'tendik') { ?>

        <?php } else if ($role == 'mahasiswa') { ?>

        <?php } else if ($role == 'ortu') { ?>

        <?php } ?>

      <?php } else { ?>

        <?php
        if ($status == 'sukses') {
          echo '<div class="alert alert-success">' . $message . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
        }
        ?>
        <?php
        $sub_menu = (isset($_GET['sub_menu'])) ? $_GET['sub_menu'] : '';
        ?>
        <?php if ($sub_menu == 'responden_dosen') { // sub menu dosen start 
        ?>
          <div class="card-tools">
            <a href="?pages=responden&act=tambah&role=dosen&sub_menu=Tambah_Responden_Dosen" class="btn btn-sm btn-primary">Tambah Responden Dosen</a>
            <br><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Responden Dosen ID</th>
                <th>Survey ID</th>
                <th>Responden Tanggal</th>
                <th>Responden NIP</th>
                <th>Responden NAMA</th>
                <th>Responden UNIT</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bank = new tRespondenDosen();
              $list = $bank->getData();
              $i = 1;
              while ($row = $list->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['responden_dosen_id'] ?></td>
                  <td><?php echo $row['survey_id'] ?></td>
                  <td><?php echo $row['responden_tanggal'] ?></td>
                  <td><?php echo $row['responden_nip'] ?></td>
                  <td><?php echo $row['responden_nama'] ?></td>
                  <td><?php echo $row['responden_unit'] ?></td>
                  <td><a href="?pages=responden&act=detail_jawaban&role=dosen&sub_menu=Detail_Jawaban_Dosen&id=<?php echo $row['responden_dosen_id'] ?>">Lihat Detail</a></td>
                  <td> <a title="Edit Data" href="?pages=responden&act=edit&id=<?php echo $row['responden_dosen_id'] ?>&role=dosen" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&act=hapus&id=<?php echo $row['responden_dosen_id'] ?>&role=dosen" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        <?php } else if ($sub_menu == 'responden_alumni') { //sub menu alumni start 
        ?>
          <div class="card-tools">
            <a href="?pages=responden&act=tambah&role=alumni&sub_menu=Tambah_Responden_Alumni" class="btn btn-sm btn-primary">Tambah Responden Alumni</a>
            <br><br>
          </div>

          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Responden Alumni ID</th>
                <th>Survey ID</th>
                <th>Responden Tanggal</th>
                <th>Responden NIM</th>
                <th>Responden NAMA</th>
                <th>Responden PRODI</th>
                <th>Responden EMAIL</th>
                <th>Responden HP</th>
                <th>Tahun Lulus</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bank = new tRespondenAlumni();
              $list = $bank->getData();
              $i = 1;
              while ($row = $list->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['responden_alumni_id'] ?></td>
                  <td><?php echo $row['survey_id'] ?></td>
                  <td><?php echo $row['responden_tanggal'] ?></td>
                  <td><?php echo $row['responden_nim'] ?></td>
                  <td><?php echo $row['responden_nama'] ?></td>
                  <td><?php echo $row['responden_prodi'] ?></td>
                  <td><?php echo $row['responden_email'] ?></td>
                  <td><?php echo $row['responden_hp'] ?></td>
                  <td><?php echo $row['tahun_lulus'] ?></td>
                  <td><a href="?pages=responden&act=detail_jawaban&role=alumni&sub_menu=Detail_Jawaban_Alumni&id=<?php echo $row['responden_alumni_id'] ?>">Lihat Detail</a></td>
                  <td> <a title="Edit Data" href="?pages=responden&act=edit&id=<?php echo $row['responden_alumni_id'] ?>&role=alumni" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&act=hapus&id=<?php echo $row['responden_alumni_id'] ?>&role=alumni" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        <?php } else if ($sub_menu == 'responden_industri') { //sub menu industri start 
        ?>
          <div class="card-tools">
            <a href="?pages=responden&act=tambah&role=industri&sub_menu=Tambah_Responden_Industri" class="btn btn-sm btn-primary">Tambah Responden Industri</a>
            <br><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Responden Industri ID</th>
                <th>Survey ID</th>
                <th>Responden Tanggal</th>
                <th>Responden NAMA</th>
                <th>Responden JABATAN</th>
                <th>Responden PERUSAHAAN</th>
                <th>Responden EMAIl</th>
                <th>Responden HP</th>
                <th>Responden KOTA</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bank = new tRespondenIndustri();
              $list = $bank->getData();
              $i = 1;
              while ($row = $list->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['responden_industri_id'] ?></td>
                  <td><?php echo $row['survey_id'] ?></td>
                  <td><?php echo $row['responden_tanggal'] ?></td>
                  <td><?php echo $row['responden_nama'] ?></td>
                  <td><?php echo $row['responden_jabatan'] ?></td>
                  <td><?php echo $row['responden_perusahaan'] ?></td>
                  <td><?php echo $row['responden_email'] ?></td>
                  <td><?php echo $row['responden_hp'] ?></td>
                  <td><?php echo $row['responden_kota'] ?></td>
                  <td><a href="?pages=responden&act=detail_jawaban&role=industri&sub_menu=Detail_Jawaban_Industri&id=<?php echo $row['responden_industri_id'] ?>">Lihat Detail</a></td>
                  <td> <a title="Edit Data" href="?pages=responden&act=edit&id=<?php echo $row['responden_industri_id'] ?>&role=industri" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&act=hapus&id=<?php echo $row['responden_industri_id'] ?>&role=industri" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        <?php } else if ($sub_menu == 'responden_tendik') { //sub menu tendik start 
        ?>
          <div class="card-tools">
            <a href="?pages=responden&act=tambah&role=tendik&sub_menu=Tambah_Responden_Tendik" class="btn btn-sm btn-primary">Tambah Responden Tendik</a>
            <br><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Responden Tendik ID</th>
                <th>Survey ID</th>
                <th>Responden Tanggal</th>
                <th>Responden NOPEG</th>
                <th>Responden NAMA</th>
                <th>Responden UNIT</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bank = new tRespondenTendik();
              $list = $bank->getData();
              $i = 1;
              while ($row = $list->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['responden_tendik_id'] ?></td>
                  <td><?php echo $row['survey_id'] ?></td>
                  <td><?php echo $row['responden_tanggal'] ?></td>
                  <td><?php echo $row['responden_nopeg'] ?></td>
                  <td><?php echo $row['responden_nama'] ?></td>
                  <td><?php echo $row['responden_unit'] ?></td>
                  <td><a href="?pages=responden&act=detail_jawaban&role=tendik&sub_menu=Detail_Jawaban_Tendik&id=<?php echo $row['responden_tendik_id'] ?>">Lihat Detail</a></td>
                  <td> <a title="Edit Data" href="?pages=responden&act=edit&id=<?php echo $row['responden_tendik_id'] ?>&role=tendik" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&act=hapus&id=<?php echo $row['responden_tendik_id']?>&role=tendik" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        <?php } else if ($sub_menu == 'responden_mahasiswa') { //sub menu mahasiswa start 
        ?>
          <div class="card-tools">
            <a href="?pages=responden&act=tambah&role=mahasiswa&sub_menu=Tambah_Responden_Mahasiswa" class="btn btn-sm btn-primary">Tambah Responden Mahasiswa</a>
            <br><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Responden Mahasiswa ID</th>
                <th>Survey ID</th>
                <th>Responden Tanggal</th>
                <th>Responden NIM</th>
                <th>Responden NAMA</th>
                <th>Responden PRODI</th>
                <th>Responden EMAIl</th>
                <th>Responden HP</th>
                <th>Tahun Masuk</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bank = new tRespondenMahasiswa();
              $list = $bank->getData();
              $i = 1;
              while ($row = $list->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['responden_mahasiswa_id'] ?></td>
                  <td><?php echo $row['survey_id'] ?></td>
                  <td><?php echo $row['responden_tanggal'] ?></td>
                  <td><?php echo $row['responden_nim'] ?></td>
                  <td><?php echo $row['responden_nama'] ?></td>
                  <td><?php echo $row['responden_prodi'] ?></td>
                  <td><?php echo $row['responden_email'] ?></td>
                  <td><?php echo $row['responden_hp'] ?></td>
                  <td><?php echo $row['tahun_masuk'] ?></td>
                  <td><a href="?pages=responden&act=detail_jawaban&role=mahasiswa&sub_menu=Detail_Jawaban_Mahasiswa&id=<?php echo $row['responden_mahasiswa_id'] ?>">Lihat Detail</a></td>
                  <td> <a title="Edit Data" href="?pages=responden&act=edit&id=<?php echo $row['responden_mahasiswa_id'] ?>&role=mahasiswa" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&act=hapus&id=<?php echo $row['responden_mahasiswa_id'] ?>&role=mahasiswa" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        <?php } else if ($sub_menu == 'responden_orang_tua') { //sub menu orang tua start 
        ?>
          <div class="card-tools">
            <a href="?pages=responden&act=tambah&role=ortu&sub_menu=Tambah_Responden_Orang_Tua" class="btn btn-sm btn-primary">Tambah Responden Orang Tua</a>
            <br><br>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Responden Orang Tua ID</th>
                <th>Survey ID</th>
                <th>Responden Tanggal</th>
                <th>Responden NAMA</th>
                <th>Responden JENIS KELAMIN</th>
                <th>Responden UMUR</th>
                <th>Responden HP</th>
                <th>Responden PENDIDIKAN</th>
                <th>Responden PEKERJAAN</th>
                <th>Responden PENGHASILAN</th>
                <th>MAHASISWA NIM</th>
                <th>MAHASISWA NAMA</th>
                <th>MAHASISWA PRODI</th>
                <th>Detail</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $bank = new tRespondenOrtu();
              $list = $bank->getData();
              $i = 1;
              while ($row = $list->fetch_assoc()) {
              ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $row['responden_ortu_id'] ?></td>
                  <td><?php echo $row['survey_id'] ?></td>
                  <td><?php echo $row['responden_tanggal'] ?></td>
                  <td><?php echo $row['responden_nama'] ?></td>
                  <td><?php echo $row['responden_jk'] ?></td>
                  <td><?php echo $row['responden_umur'] ?></td>
                  <td><?php echo $row['responden_hp'] ?></td>
                  <td><?php echo $row['responden_pendidikan'] ?></td>
                  <td><?php echo $row['responden_pekerjaan'] ?></td>
                  <td><?php echo $row['responden_penghasilan'] ?></td>
                  <td><?php echo $row['mahasiswa_nim'] ?></td>
                  <td><?php echo $row['mahasiswa_nama'] ?></td>
                  <td><?php echo $row['mahasiswa_prodi'] ?></td>
                  <td><a href="?pages=responden&act=detail_jawaban&role=ortu&sub_menu=Detail_Jawaban_Orang_Tua&id=<?php echo $row['responden_ortu_id'] ?>">Lihat Detail</a></td>
                  <td> <a title="Edit Data" href="?pages=responden&act=edit&id=<?php echo $row['responden_ortu_id'] ?>&role=ortu&sub_menu=Edit_Data_Responden" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" title="Hapus Data" href="?pages=responden/responden_action.php&act=hapus&id=<?php echo $row['responden_ortu_id'] ?>&role=ortu" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> </td>
                </tr>
              <?php
                $i++;
              } ?>
            </tbody>
          </table>
        <?php } // end of sub menu
        ?>
      <?php } //end action selection
      ?>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->
</section>

<!-- Tempus Dominus Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- jQuery Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_id.min.js"></script>

<script>
  $(document).ready(function() {});
</script>
<script>
  $(function() {
    $('#datetimepicker').datetimepicker({
      format: 'YYYY-MM-DD',
      locale: 'id'
    });
  });
</script>