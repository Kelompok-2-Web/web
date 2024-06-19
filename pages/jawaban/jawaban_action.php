<?php

$act = $_GET['act'];

switch ($_GET['sub_menu']) {
   case 'dosen':
      include_once "model/jawaban/t_jawaban_dosen.php";

      $resp_key = "responden_dosen_id";

      $jawaban = new tJawabanDosen();
      break;

   case 'alumni':
      include_once "model/jawaban/t_jawaban_alumni.php";

      $resp_key = "responden_alumni_id";

      $jawaban = new tJawabanAlumni();
      break;

   case 'industri':
      include_once "model/jawaban/t_jawaban_industri.php";

      $resp_key = "responden_industri_id";

      $jawaban = new tJawabanIndustri();
      break;

   case 'tendik':
      include_once "model/jawaban/t_jawaban_tendik.php";

      $resp_key = "responden_tendik_id";

      $jawaban = new tJawabanTendik();
      break;

   case 'mahasiswa':
      include_once "model/jawaban/t_jawaban_mahasiswa.php";

      $resp_key = "responden_mahasiswa_id";

      $jawaban = new tJawabanMahasiswa();
      break;

   case 'orang_tua':
      include_once "model/jawaban/t_jawaban_ortu.php";

      $resp_key = "responden_ortu_id";

      $jawaban = new tJawabanOrtu();
      break;

   default:
      # code...
      break;
}

if ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      'jawaban' => $_POST['jawaban'],
      "$resp_key" => $_POST[$resp_key],
      'soal_id' => $_POST['soal_id']
   ];

   $jawaban->updateData($id, $data);

   header('location: ?pages=jawaban&sub_menu=' . $_GET['sub_menu'] . '&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
   $id = $_GET['id'];

   $jawaban->deleteData($id);

   header('location: ?pages=jawaban&sub_menu=' . $_GET['sub_menu'] . '&status=sukses&message=Data berhasil dihapus');
}
