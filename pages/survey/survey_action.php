<?php
include_once('model/survey/m_survey.php');

$act = $_GET['act'];

if ($act == 'simpan') {
   $data = [
      'user_id' => $_POST['user_id'],
      'survey_jenis' => $_POST['jenis_survey'],
      'survey_kode' => $_POST['kode_survey'],
      'survey_nama' => $_POST['nama_survey'],
      'survey_deskripsi' => $_POST['deskripsi_survey'],
      'survey_tanggal' => $_POST['tanggal_survey']
   ];

   $insert = new mSurvey();
   $insert->insertData($data);

   header('location: ?pages=soal&status=sukses&message=Data berhasil ditambah');
} elseif ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      'user_id' => $_POST['user_id'],
      'survey_jenis' => $_POST['jenis_survey'],
      'survey_kode' => $_POST['kode_survey'],
      'survey_nama' => $_POST['nama_survey'],
      'survey_deskripsi' => $_POST['deskripsi_survey'],
      'survey_tanggal' => $_POST['tanggal_survey']
   ];

   $update = new mSurvey();
   $update->updateData($id, $data);

   header('location: ?pages=soal&status=sukses&message=Data berhasil diedit');
} elseif ($act == 'hapus') {
   $id = $_GET['id'];

   $hapus = new mSurvey();
   $hapus->deleteData($id);

   header('location: ?pages=soal&status=sukses&message=Data berhasil dihapus');
}
