<?php

$act = $_GET['act'];

switch ($_GET['sub_menu']) {
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

if ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      "survey_id" => $_POST['survey_id'],
      "responden_tanggal" => $_POST['responden_tanggal']
   ];

   switch ($_GET['sub_menu']) {
      case 'dosen':
         $data += [
            "responden_dosen_id" => $_POST['responden_dosen_id'],
            "responden_nip" => $_POST['responden_nip'],
            "responden_nama" => $_POST['responden_nama'],
            "responden_unit" => $_POST['responden_unit']
         ];
         break;

      case 'alumni':
         $data += [
            "responden_nim" => $_POST['responden_nim'],
            "responden_nama" => $_POST['responden_nama'],
            "responden_prodi" => $_POST['responden_prodi'],
            "responden_email" => $_POST['responden_email'],
            "responden_hp" => $_POST['responden_hp'],
            "tahun_lulus" => $_POST['tahun_lulus']
         ];
         break;

      case 'industri':
         $data += [
            "responden_nama" => $_POST['responden_nama'],
            "responden_jabatan" => $_POST['responden_jabatan'],
            "responden_perusahaan" => $_POST['responden_perusahaan'],
            "responden_email" => $_POST['responden_email'],
            "responden_hp" => $_POST['responden_hp'],
            "responden_kota" => $_POST['responden_kota']
         ];
         break;

      case 'tendik':
         $data += [
            "responden_nipeg" => $_POST['responden_nipeg'],
            "responden_nama" => $_POST['responden_nama'],
            "responden_unit" => $_POST['responden_unit']
         ];
         break;

      case 'mahasiswa':
         $data += [
            "responden_nim" => $_POST['responden_nim'],
            "responden_nama" => $_POST['responden_nama'],
            "responden_prodi" => $_POST['responden_prodi'],
            "responden_email" => $_POST['responden_email'],
            "responden_hp" => $_POST['responden_hp'],
            "tahun_masuk" => $_POST['tahun_masuk']
         ];
         break;

      case 'orang_tua':
         $data += [
            "responden_nama" => $_POST['responden_nama'],
            "responden_jk" => $_POST['responden_jk'],
            "responden_umur" => $_POST['responden_umur'],
            "responden_hp" => $_POST['responden_hp'],
            "responden_pendidikan" => $_POST['responden_pendidikan'],
            "responden_pekerjaan" => $_POST['responden_pekerjaan'],
            "responden_penghasilan" => $_POST['responden_penghasilan'],
            "mahasiswa_nim" => $_POST['mahasiswa_nim'],
            "mahasiswa_nama" => $_POST['mahasiswa_nama'],
            "mahasiswa_prodi" => $_POST['mahasiswa_prodi']
         ];
         break;
   }

   $responden->updateData($id, $data);

   header('location: ?pages=responden&sub_menu=' . $_GET['sub_menu'] . '&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
   $id = $_GET['id'];

   $responden->deleteData($id);

   header('location: ?pages=responden&sub_menu=' . $_GET['sub_menu'] . '&status=sukses&message=Data berhasil dihapus');
}
