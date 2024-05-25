<?php
include_once('model/survey/m_survey_soal.php');

$act = $_GET['act'];

if ($act == 'simpan') {
   echo '<pre>';
   $data = [
      'soal_id' => $_POST['soal_id'],
      'soal_nama' => $_POST['soal_nama']
   ];

   $insert = new mSurveySoal();
   $insert->insertData($data);

   header('location: ?pages=soal&status=sukses&message=Data berhasil disimpan');
} elseif ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      'soal_id' => $_POST['soal_id'],
      'soal_nama' => $_POST['soal_nama']
   ];

   $update = new mSurveySoal();
   $update->updateData($id, $data);

   header('location: ?pages=soal&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
   $id = $_GET['id'];

   $hapus = new mSurveySoal();
   $hapus->deleteData($id);

   header('location: ?pages=soal&status=sukses&message=Data berhasil dihapus');
}
