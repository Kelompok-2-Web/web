<?php

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: index.php");
}


# Handle form biodata responden
if (isset($_POST['responden_tanggal']) && isset($_POST['jenis_survey'])) {

    if ($_POST['jenis_survey'] === 'alumni') {
        include_once "model/responden/t_responden_alumni.php";

        $data = [
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id'],
            'responden_nim' => $_POST['responden_nim'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_prodi' => $_POST['responden_prodi'],
            'responden_email' => $_POST['responden_email'],
            'responden_hp' => $_POST['responden_hp'],
            'tahun_lulus' => $_POST['tahun_lulus']
        ];

        $responden = new tRespondenAlumni();
    } elseif ($_POST['jenis_survey'] === 'dosen') {
        include_once "model/responden/t_responden_dosen.php";

        $data = [
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id'],
            'responden_nip' => $_POST['responden_nip'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_unit' => $_POST['responden_unit']
        ];

        $responden = new tRespondenDosen();
    } elseif ($_POST['jenis_survey'] === 'industri') {
        include_once "model/responden/t_responden_industri.php";

        $data = [
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_jabatan' => $_POST['responden_jabatan'],
            'responden_perusahaan' => $_POST['responden_perusahaan'],
            'responden_email' => $_POST['responden_email'],
            'responden_hp' => $_POST['responden_hp'],
            'responden_kota' => $_POST['responden_kota'],
        ];

        $responden = new tRespondenIndustri();
    } elseif ($_POST['jenis_survey'] === 'mahasiswa') {
        include_once "model/responden/t_responden_mahasiswa.php";

        $data = [
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id'],
            'responden_nim' => $_POST['responden_nim'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_prodi' => $_POST['responden_prodi'],
            'responden_email' => $_POST['responden_email'],
            'responden_hp' => $_POST['responden_hp'],
            'tahun_masuk' => $_POST['tahun_masuk']
        ];

        $responden = new tRespondenMahasiswa();
    } elseif ($_POST['jenis_survey'] === 'orang_tua') {
        include_once "model/responden/t_responden_ortu.php";

        $data = [
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_jk' => $_POST['responden_jk'],
            'responden_umur' => $_POST['responden_umur'],
            'responden_hp' => $_POST['responden_hp'],
            'responden_pendidikan' => $_POST['responden_pendidikan'],
            'responden_pekerjaan' => $_POST['responden_pekerjaan'],
            'responden_penghasilan' => $_POST['responden_penghasilan'],
            'mahasiswa_nim' => $_POST['mahasiswa_nim'],
            'mahasiswa_nama' => $_POST['mahasiswa_nama'],
            'mahasiswa_prodi' => $_POST['mahasiswa_prodi']
        ];

        $responden = new tRespondenOrtu();
    } elseif ($_POST['jenis_survey'] === 'tendik') {
        include_once "model/responden/t_responden_tendik.php";

        $data = [
            'responden_tanggal' => $_POST['responden_tanggal'],
            'survey_id' => $_POST['survey_id'],
            'responden_nipeg' => $_POST['responden_nipeg'],
            'responden_nama' => $_POST['responden_nama'],
            'responden_unit' => $_POST['responden_unit'],
        ];

        $responden = new tRespondenTendik();
    }

    if (isset($_POST['responden_id']) && $_POST['responden_id'] != null) {
        $responden->updateData($_POST['responden_id'], $data);
        $ret['responden_id'] = $_POST['responden_id'];
    } else {
        $ret['responden_id'] = $responden->insertData($data);
    }

    header('Content-type: application/json');
    echo json_encode($ret);

    exit();
}

if (isset($_POST['responden_id']) && isset($_POST['jenis_survey'])) {

    $data = [];

    if ($_POST['jenis_survey'] === 'alumni') {
        include_once "model/jawaban/t_jawaban_alumni.php";

        $data += [
            'responden_alumni_id' => $_POST['responden_id']
        ];

        $jawaban = new tJawabanAlumni();
    } elseif ($_POST['jenis_survey'] === 'dosen') {
        include_once "model/jawaban/t_jawaban_dosen.php";

        $data += [
            'responden_dosen_id' => $_POST['responden_id']
        ];

        $jawaban = new tJawabanDosen();
    } elseif ($_POST['jenis_survey'] === 'industri') {
        include_once "model/jawaban/t_jawaban_industri.php";

        $data += [
            'responden_industri_id' => $_POST['responden_id']
        ];

        $jawaban = new tJawabanIndustri();
    } elseif ($_POST['jenis_survey'] === 'mahasiswa') {
        include_once "model/jawaban/t_jawaban_mahasiswa.php";

        $data += [
            'responden_mahasiswa_id' => $_POST['responden_id']
        ];

        $jawaban = new tJawabanMahasiswa();
    } elseif ($_POST['jenis_survey'] === 'orang_tua') {
        include_once "model/jawaban/t_jawaban_ortu.php";

        $data += [
            'responden_ortu_id' => $_POST['responden_id']
        ];

        $jawaban = new tJawabanOrtu();
    } elseif ($_POST['jenis_survey'] === 'tendik') {
        include_once "model/jawaban/t_jawaban_tendik.php";

        $data += [
            'responden_tendik_id' => $_POST['responden_id']
        ];

        $jawaban = new tJawabanTendik();
    }

    foreach ($_POST as $key => $value) {
        if ($key == 'responden_id' || $key == 'jenis_survey') {
            continue;
        }

        $soal_id = str_replace("_jawaban", "", $key);
        $data += [
            'soal_id' => $soal_id,
            'jawaban' => $value
        ];

        $jawaban->insertData($data);
    }

    exit();
}
