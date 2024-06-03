<?php
// var_dump($_POST);

// echo "<br><br>";

// print_r($_POST);

// echo "<br><br>";

// $kolomDihilangkan = ['Nama', 'Nomor_Induk_Mahasiswa', 'Program_Studi', 'Email', 'Nomor_Handphone', 'Tahun_Lulus'];
// // Membuat array baru yang berisi kolom-kolom selain yang ada di $kolomDihilangkan
// $dataTableLain = array_diff_key($_POST, array_flip($kolomDihilangkan));
// var_dump($dataTableLain);

// echo "<br><br>";

// echo $_POST['1'];
// echo $_POST['2'];

include_once('model/survey/t_responden_soal_alumni.php');

$act = $_GET['act'];

if ($act == 'simpan') {
   echo '<pre>';
   $data = [
      'survey_id' => $_POST['id'],
      'responden_nama' => $_POST[1],
      'responden_nim' => $_POST[2],
      'responden_prodi' => $_POST[3],
      'responden_email' => $_POST[4],
      'responden_hp' => $_POST[5],
      'tahun_lulus' => $_POST[6]
   ];

   $insert = new tRespondenAlumni();
   $insert->insertData($data);

   header('location: ?pages=form&status=sukses&message=Data berhasil disimpan');
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

   header('location: ?pages=soal&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
   $id = $_GET['id'];

   $hapus = new mSurveySoal();
   $hapus->deleteData($id);

   header('location: ?pages=soal&status=sukses&message=Data berhasil dihapus');
}

