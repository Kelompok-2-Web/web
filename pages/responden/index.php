<?php
include_once 'model/survey/m_survey_soal.php';

$status = isset($_GET['status']) ? $_GET['status'] : "";
$message = isset($_GET['message']) ? $_GET['message'] : "";


switch (str_replace("responden_", "", $_GET['sub_menu'])) {
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

    default:
        # code...
        break;
}
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Responden</h1>
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
        <!-- <div class="card-tools">
            <a href="?pages=survey&act=tambah" class="btn btn-sm btn-primary">Tambah Jawaban</a>
        </div> -->
        </div>
        <div class="card-body">
            <?php
            $act = (isset($_GET['act'])) ? $_GET['act'] : '';

            if($act == "detail_responden") {
                $id = $_GET['id'];
                $list = $responden->getDataById($id);
                $row = $list->fetch_assoc();
            switch (str_replace("responden_", "", $_GET['sub_menu'])) {
                case 'dosen': ?>
                    <h3>Responden Dosen Id  : <?php echo $row['responden_dosen_id'] ?> </h3>
                    <h3>Survey ID           : <?php echo $row['survey_id'] ?> </h3>
                    <h3>Responden Tanggal   : <?php echo $row['responden_tanggal'] ?> </h3>
                    <h3>Responden NIP       : <?php echo $row['responden_nip'] ?> </h3>
                    <h3>Responden Nama      : <?php echo $row['responden_nama'] ?> </h3>
                    <h3>Responden Unit      : <?php echo $row['responden_unit'] ?> </h3>
                    <div class="card-tools" style="padding-top: 30px;float: right;">
                        <a href="?pages=responden&sub_menu=<?php echo $_GET['sub_menu'] ?>" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <?php break;
            
                case 'alumni': ?>
                    <h3>Responden Alumni Id : <?php echo $row['responden_alumni_id'] ?> </h3>
                    <h3>Survey ID           : <?php echo $row['survey_id'] ?> </h3>
                    <h3>Responden Tanggal   : <?php echo $row['responden_tanggal'] ?> </h3>
                    <h3>Responden NIM       : <?php echo $row['responden_nim'] ?> </h3>
                    <h3>Responden Nama      : <?php echo $row['responden_nama'] ?> </h3>
                    <h3>Responden Prodi     : <?php echo $row['responden_prodi'] ?> </h3>
                    <h3>Responden Email     : <?php echo $row['responden_email'] ?> </h3>
                    <h3>Responden Hp        : <?php echo $row['responden_hp'] ?> </h3>
                    <h3>Tahun Lulus         : <?php echo $row['tahun_lulus'] ?> </h3>
                    <div class="card-tools" style="padding-top: 30px;float: right;">
                        <a href="?pages=responden&sub_menu=<?php echo $_GET['sub_menu'] ?>" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <?php break;
            
                case 'industri': ?>
                    <h3>Responden Industri Id   : <?php echo $row['responden_industri_id'] ?> </h3>
                    <h3>Survey ID               : <?php echo $row['survey_id'] ?> </h3>
                    <h3>Responden Tanggal       : <?php echo $row['responden_tanggal'] ?> </h3>
                    <h3>Responden Nama          : <?php echo $row['responden_nama'] ?> </h3>
                    <h3>Responden Jabatan       : <?php echo $row['responden_jabatan'] ?> </h3>
                    <h3>Responden Perusahaan    : <?php echo $row['responden_perusahaan'] ?> </h3>
                    <h3>Responden Email         : <?php echo $row['responden_email'] ?> </h3>
                    <h3>Responden Hp            : <?php echo $row['responden_hp'] ?> </h3>
                    <h3>Responden Kota          : <?php echo $row['responden_kota'] ?> </h3>
                    <div class="card-tools" style="padding-top: 30px;float: right;">
                        <a href="?pages=responden&sub_menu=<?php echo $_GET['sub_menu'] ?>" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <?php break;
            
                case 'tendik': ?>
                    <h3>Responden Tendik Id     : <?php echo $row['responden_tendik_id'] ?> </h3>
                    <h3>Survey ID               : <?php echo $row['survey_id'] ?> </h3>
                    <h3>Responden Tanggal       : <?php echo $row['responden_tanggal'] ?> </h3>
                    <h3>Responden Nomor Pegawai : <?php echo $row['responden_nopeg'] ?> </h3>
                    <h3>Responden Nama          : <?php echo $row['responden_nama'] ?> </h3>
                    <h3>Responden Unit          : <?php echo $row['responden_unit'] ?> </h3>
                    <div class="card-tools" style="padding-top: 30px;float: right;">
                        <a href="?pages=responden&sub_menu=<?php echo $_GET['sub_menu'] ?>" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <?php break;
            
                case 'mahasiswa': ?>
                    <h3>Responden Mahasiswa Id  : <?php echo $row['responden_mahasiswa_id'] ?> </h3>
                    <h3>Survey ID               : <?php echo $row['survey_id'] ?> </h3>
                    <h3>Responden Tanggal       : <?php echo $row['responden_tanggal'] ?> </h3>
                    <h3>Responden NIM           : <?php echo $row['responden_nim'] ?> </h3>
                    <h3>Responden Nama          : <?php echo $row['responden_nama'] ?> </h3>
                    <h3>Responden Prodi         : <?php echo $row['responden_prodi'] ?> </h3>
                    <h3>Responden Email         : <?php echo $row['responden_email'] ?> </h3>
                    <h3>Responden Hp            : <?php echo $row['responden_hp'] ?> </h3>
                    <h3>Tahun Masuk             : <?php echo $row['tahun_masuk'] ?> </h3>
                    <div class="card-tools" style="padding-top: 30px;float: right;">
                        <a href="?pages=responden&sub_menu=<?php echo $_GET['sub_menu'] ?>" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <?php break;
            
                case 'orang_tua': ?>
                    <h3>Responden Orang Tua Id  : <?php echo $row['responden_ortu_id'] ?> </h3>
                    <h3>Survey ID               : <?php echo $row['survey_id'] ?> </h3>
                    <h3>Responden Tanggal       : <?php echo $row['responden_tanggal'] ?> </h3>
                    <h3>Responden Nama          : <?php echo $row['responden_nama'] ?> </h3>
                    <h3>Responden Jenis Kelamin : <?php echo $row['responden_jk'] ?> </h3>
                    <h3>Responden Umur          : <?php echo $row['responden_umur'] ?> </h3>
                    <h3>Responden Hp            : <?php echo $row['responden_hp'] ?> </h3>
                    <h3>Responden Pendidikan    : <?php echo $row['responden_pendidikan'] ?> </h3>
                    <h3>Responden Penghasilan   : <?php echo $row['responden_penghasilan'] ?> </h3>
                    <h3>Mahasiswa NIM           : <?php echo $row['mahasiswa_nim'] ?> </h3>
                    <h3>Mahasiswa Nama          : <?php echo $row['mahasiswa_nama'] ?> </h3>
                    <h3>Mahasiswa Prodi         : <?php echo $row['mahasiswa_prodi'] ?> </h3>
                    <div class="card-tools" style="padding-top: 30px;float: right;">
                        <a href="?pages=responden&sub_menu=<?php echo $_GET['sub_menu'] ?>" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <?php break;
            
                default:
                    # code...
                    break;
            }
            ?>
            <?php } else {

                if ($status == 'sukses') { echo '<div class="alert alert-success"> ' . $message . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                }
            ?>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Responden ID</th>
                            <th>Responden Tanggal</th>
                            <th>Responden NAMA</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list = $responden->getData();
                        $i = 1;
                        while ($row = $list->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row[$resp_key] ?></td>
                                <td><?php echo $row['responden_tanggal'] ?></td>
                                <td>
                                    <a href="?pages=responden&act=detail_responden&sub_menu=<?php echo $_GET['sub_menu'] ?>&id=<?php echo $row[$resp_key] ?>"><?php echo $row['responden_nama']?></a>
                                </td>
                                <td>
                                    <a href="?pages=jawaban&act=detail_jawaban&sub_menu=jawaban_<?php echo str_replace("responden_", "", $_GET['sub_menu']) ?>&id=<?php echo $row[$resp_key] ?>">Lihat Detail</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        } ?>
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