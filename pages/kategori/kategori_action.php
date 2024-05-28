<?php
include_once('model/survey/m_kategori.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    echo '<pre>';
    $data = [
        'kategori_nama' => $_POST['nama_kategori']
    ];

    $insert = new mKategori();
    $insert->insertData($data);

    header('location: ?pages=kategori&status=sukses&message=Data berhasil disimpan');
} elseif ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'kategori_nama' => $_POST['nama_kategori']
    ];

    $update = new mKategori();
    $update->updateData($id, $data);

    header('location: ?pages=kategori&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new mKategori();
    $hapus->deleteData($id);

    header('location: ?pages=kategori&status=sukses&message=Data berhasil dihapus');
}
