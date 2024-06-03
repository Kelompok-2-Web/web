<?php
if (isset($_GET['survey_id'])) {
    include_once "model/survey/m_survey.php";
    include_once "model/survey/m_survey_soal.php";

    $survey = new mSurvey();
    $survey = $survey->getDataById($_GET['survey_id'])->fetch_assoc();

    if (!isset($survey)) {
        echo "Survey tidak ditemukan";
        exit();
    }
?>
    <!DOCTYPE html>
    <html lang="en" style="height: auto;">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Survey <?php echo $survey['survey_nama'] ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper,
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer,
            body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
                margin-left: 0px;
            }
        </style>
    </head>

    <body class="sidebar-mini" style="height: auto;">
        <div class="wrapper">
            <div class="content-wrapper" style="min-height: 1345.31px; padding: 0 10% 0 10%;">

                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Form Survey <?php echo $survey['survey_nama'] ?></h1>
                                <p>Deskripsi Survey:<br><?php echo $survey['survey_deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md">
                                <form id="form-biodata">
                                    <input type="hidden" name="responden_tanggal" value="<?= date("Y-m-d") ?>">
                                    <input type="hidden" name="responden_id" id="responden-id-biod">
                                    <input type="hidden" name="survey_id" value="<?= $_GET['survey_id'] ?>">
                                    <input type="hidden" name="jenis_survey" value="<?= $survey['survey_jenis'] ?>">


                                    <div class="card card-primary" id="card-biodata">
                                        <div class="card-header">
                                            <h3 class="card-title">Masukkan data diri Anda!</h3>
                                            <div class="card-tools invisible" id="toggle-biodata">
                                                <!-- Collapse Button -->
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            if ($survey['survey_jenis'] === "alumni" || $survey['survey_jenis'] === "mahasiswa") {
                                            ?>
                                                <div class="form-group">
                                                    <label for="inputNIM">NIM</label>
                                                    <input type="number" class="form-control" id="inputNIM" name="responden_nim" placeholder="Masukkan NIM" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNama">Nama</label>
                                                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputProdi">Prodi</label>
                                                    <input type="text" class="form-control" id="inputProdi" name="responden_prodi" placeholder="Masukkan Prodi" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail" name="responden_email" placeholder="Masukkan Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNoHP">No. HP</label>
                                                    <input type="tel" class="form-control" id="inputNoHP" name="responden_hp" placeholder="Masukkan No. HP" required>
                                                </div>
                                                <?php
                                                if ($survey['survey_jenis'] === "mahasiswa") {
                                                ?>
                                                    <div class="form-group">
                                                        <label for="inputTahunMasuk">Tahun Masuk</label>
                                                        <input type="number" class="form-control" id="inputTahunMasuk" name="tahun_masuk" placeholder="Masukkan tahun Masuk" required>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="form-group">
                                                        <label for="inputTahunLulus">Tahun Lulus</label>
                                                        <input type="number" class="form-control" id="inputTahunLulus" name="tahun_lulus" placeholder="Masukkan tahun Lulus" required>
                                                    </div>
                                                <?php
                                                }
                                            } elseif ($survey['survey_jenis'] === "dosen") {
                                                ?>
                                                <div class="form-group">
                                                    <label for="inputNIP">NIP</label>
                                                    <input type="text" class="form-control" id="inputNIP" name="responden_nip" placeholder="Masukkan NIP" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNama">Nama</label>
                                                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputUnit">Unit</label>
                                                    <input type="text" class="form-control" id="inputUnit" name="responden_unit" placeholder="Masukkan Unit" required>
                                                </div>
                                            <?php
                                            } elseif ($survey['survey_jenis'] === "industri") {
                                            ?>
                                                <div class="form-group">
                                                    <label for="inputNama">Nama</label>
                                                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputJabatan">Jabatan</label>
                                                    <input type="text" class="form-control" id="inputJabatan" name="responden_jabatan" placeholder="Masukkan Jabatan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPerusahaan">Perusahaan</label>
                                                    <input type="text" class="form-control" id="inputPerusahaan" name="responden_perusahaan" placeholder="Masukkan Perusahaan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Email</label>
                                                    <input type="email" class="form-control" id="inputEmail" name="responden_email" placeholder="Masukkan Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNoHP">No. HP</label>
                                                    <input type="tel" class="form-control" id="inputNoHP" name="responden_hp" placeholder="Masukkan No. HP" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputKota">Kota</label>
                                                    <input type="text" class="form-control" id="inputKota" name="responden_kota" placeholder="Masukkan Perusahaan" required>
                                                </div>
                                            <?php
                                            } elseif ($survey['survey_jenis'] === "orang_tua") {
                                            ?>
                                                <div class="form-group">
                                                    <label for="inputNama">Nama</label>
                                                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputJenisKelamin">Jenis Kelamin</label>
                                                    <select name="responden_jk" id="inputJenisKelamin" class="custom-select rounded-1" required>
                                                        <option value="" default>Pilih jenis kelamin</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputUmur">Umur</label>
                                                    <input type="number" class="form-control" id="inputUmur" name="responden_umur" placeholder="Masukkan Nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNoHP">No. HP</label>
                                                    <input type="tel" class="form-control" id="inputNoHP" name="responden_hp" placeholder="Masukkan No. HP" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPedidikan">Pendidikan</label>
                                                    <input type="text" class="form-control" id="inputPedidikan" name="responden_pendidikan" placeholder="Masukkan Pendidikan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPekerjaan">Pekerjaan</label>
                                                    <input type="text" class="form-control" id="inputPekerjaan" name="responden_pekerjaan" placeholder="Masukkan Pekerjaan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPenghasilan">Penghasilan</label>
                                                    <input type="text" class="form-control" id="inputPenghasilan" name="responden_penghasilan" placeholder="Masukkan Penghasilan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMahasiswaNIM">NIM Mahasiswa</label>
                                                    <input type="number" class="form-control" id="inputMahasiswaNIM" name="mahasiswa_nim" placeholder="Masukkan NIM Mahasiswa" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMahasiswaNama">Nama Mahasiswa</label>
                                                    <input type="text" class="form-control" id="inputMahasiswaNama" name="mahasiswa_nama" placeholder="Masukkan Nama Mahasiswa" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputMahasiswaProdi">Prodi Mahasiswa</label>
                                                    <input type="text" class="form-control" id="inputMahasiswaProdi" name="mahasiswa_prodi" placeholder="Masukkan Prodi Mahasiswa" required>
                                                </div>
                                            <?php
                                            } elseif ($survey['survey_jenis'] === "tendik") {
                                            ?>
                                                <div class="form-group">
                                                    <label for="inputNipeg">NIPEG</label>
                                                    <input type="text" class="form-control" id="inputNipeg" name="responden_nipeg" placeholder="Masukkan Nipeg" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputNama">Nama</label>
                                                    <input type="text" class="form-control" id="inputNama" name="responden_nama" placeholder="Masukkan Nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputUnit">Unit</label>
                                                    <input type="text" class="form-control" id="inputUnit" name="responden_unit" placeholder="Masukkan Unit" required>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">Isi Soal</button>
                                        </div>
                                    </div>
                                </form>

                                <form id="form-survey" action="form_action.php" method="post">
                                    <input type="hidden" name="responden_id" id="responden-id-surv">
                                    <input type="hidden" name="jenis_survey" value="<?= $survey['survey_jenis'] ?>">
                                    
                                    <div class="card" id="card-survey">
                                        <div class="card-header">
                                            <h3 class="card-title">Silahkan isi survey berikut</h3>
                                            <div class="card-tools">
                                                <!-- Collapse Button -->
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $soal = new mSurveySoal();

                                            $soal = $soal->getDataBySurveyId($survey['survey_id']);
                                            while ($row = $soal->fetch_assoc()) {
                                                if ($row['soal_jenis'] === 'rating') {
                                            ?>
                                                    <div class="form-group">
                                                        <h5><?php echo $row['no_urut'] . ". " . $row['soal_nama'] ?></h5>
                                                        <br>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="someRadioId1" name="<?= $row['soal_id'] ?>_jawaban" value="1" />
                                                            <label for="someRadioId1">Skor 1</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="someRadioId2" name="<?= $row['soal_id'] ?>_jawaban" value="2" />
                                                            <label for="someRadioId2">Skor 2</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="someRadioId3" name="<?= $row['soal_id'] ?>_jawaban" value="3" />
                                                            <label for="someRadioId3">Skor 3</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="someRadioId4" name="<?= $row['soal_id'] ?>_jawaban" value="4" />
                                                            <label for="someRadioId4">Skor 4</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" id="someRadioId5" name="<?= $row['soal_id'] ?>_jawaban" value="5" />
                                                            <label for="someRadioId5">Skor 5</label>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="form-group">
                                                        <h5><?php echo $row['no_urut'] . ". " . $row['soal_nama'] ?></h5>
                                                        <br>
                                                        <textarea class="form-control" rows="3" name="<?= $row['soal_id'] ?>_jawaban" placeholder="Masukkan jawaban anda"></textarea>
                                                    </div>
                                            <?php
                                                }
                                                echo "<br>";
                                            } ?>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </section>

            </div>

        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright © 2014-2021 <a href="https://adminlte.io/">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>


        <!-- Bootstrap 4 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

        <script>
            $('#card-survey').on('expanded.lte.cardwidget', function(e) {
                $('#card-survey').addClass('card-primary')
            })

            $('#card-survey').on('collapsed.lte.cardwidget', function(e) {
                $('#card-survey').removeClass('card-primary')
            })

            $('#card-biodata').on('expanded.lte.cardwidget', function(e) {
                $('#card-biodata').addClass('card-primary')
            })

            $('#card-biodata').on('collapsed.lte.cardwidget', function(e) {
                $('#card-biodata').removeClass('card-primary')
            })

            $('#card-survey').CardWidget('collapse')

            document.getElementById('form-biodata').addEventListener('submit', function(e) {
                e.preventDefault();
                $('#toggle-biodata').removeClass('invisible')
                $('#card-biodata').CardWidget('collapse')
                $('#card-survey').CardWidget('expand')

                $.ajax({
                    url: "form_action.php",
                    type: "POST",
                    data: $('#form-biodata').serialize(),
                    success: function(resp) {
                        console.log(resp)
                        $('#responden-id-biod').val(resp.responden_id)
                        $('#responden-id-surv').val(resp.responden_id)
                    }
                })
            })

            document.getElementById('form-survey').addEventListener('submit', function(e) {
                e.preventDefault();
                $('#card-survey').CardWidget('collapse')

                $.ajax({
                    url: "form_action.php",
                    type: "POST",
                    data: $('#form-survey').serialize(),
                    success: function(resp) {
                        window.location.href = "index.php"
                    }
                })
            })
        </script>


    </body>

    </html>
<?php
} else {
    header("location: index.php");
}
?>