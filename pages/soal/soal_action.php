<?php
include_once('model/survey/m_survey_soal.php');

$act = $_GET['act'];
$location = "location: ?pages=soal" . isset($_GET['survey_id']) ? '&survey_id=' . $_GET['survey_id'] : '';

if ($act == 'simpan') {
   echo '<pre>';
   $data = [
      'survey_id' => $_POST['survey_id'],
      'kategori_id' => $_POST['kategori_id'],
      'no_urut' => $_POST['no_urut'],
      'soal_jenis' => $_POST['soal_jenis'],
      'soal_nama' => $_POST['soal_nama']
   ];

   $insert = new mSurveySoal();
   $insert->insertData($data);

   header($location . 'status=sukses&message=Data berhasil disimpan');
} elseif ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      'survey_id' => $_POST['survey_id'],
      'kategori_id' => $_POST['kategori_id'],
      'no_urut' => $_POST['no_urut'],
      'soal_jenis' => $_POST['soal_jenis'],
      'soal_nama' => $_POST['soal_nama']
   ];

   $update = new mSurveySoal();
   $update->updateData($id, $data);

   header($location . '&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
   $id = $_GET['id'];

   $hapus = new mSurveySoal();
   $hapus->deleteData($id);

   header($location . '&status=sukses&message=Data berhasil dihapus');
}
