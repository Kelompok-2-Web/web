<?php
$pkg = glob('model/responden/*.*');
foreach($pkg as $file){
   include_once($file);
}

$act = $_GET['act'];
$role = $_GET['role'];

if ($act == 'simpan') {
   if($role == 'dosen'){
      echo '<pre>';
      $data = [
         'survey_id' => $_POST['survey_id'],
         'responden_tanggal' => $_POST['responden_tanggal'],
         'responden_nip' => $_POST['responden_nip'],
         'responden_nama' => $_POST['responden_nama'],
         'responden_unit' => $_POST['responden_unit']
      ];

      $insert = new tRespondenDosen();
      $insert->insertData($data);

      header('location: ?pages=responden&sub_menu=responden_dosen&status=sukses&message=Data berhasil disimpan');
   } else if($role == 'alumni'){

   } else if($role == 'industri'){

   } else if($role == 'tendik'){

   } else if($role == 'mahasiswa'){

   } else if($role == 'ortu'){

   }
} elseif ($act == 'edit') {
   if($role == 'dosen'){

   } else if($role == 'alumni'){

   } else if($role == 'industri'){

   } else if($role == 'tendik'){

   } else if($role == 'mahasiswa'){

   } else if($role == 'ortu'){

   }
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
   if($role == 'dosen'){

   } else if($role == 'alumni'){

   } else if($role == 'industri'){

   } else if($role == 'tendik'){

   } else if($role == 'mahasiswa'){

   } else if($role == 'ortu'){

   }
   $id = $_GET['id'];

   $hapus = new mSurveySoal();
   $hapus->deleteData($id);

   header('location: ?pages=soal&status=sukses&message=Data berhasil dihapus');
}
