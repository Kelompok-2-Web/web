<?php
include_once('model/m_user_model.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    echo '<pre>';
    $data = [
        'username' => $_POST['username'],
        'nama' => $_POST['nama'],
        'password' => $_POST['password']
    ];

    $insert = new User();
    $insert->insertData($data);

    header('location: ?pages=pengguna&status=sukses&message=Data berhasil disimpan');
} elseif ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'username' => $_POST['username'],
        'nama' => $_POST['nama'],
        'password' => $_POST['password']
    ];

    $update = new User();
    $update->updateData($id, $data);

    header('location: ?pages=pengguna&status=sukses&message=Data berhasil diubah');
} elseif ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new User();
    $hapus->deleteData($id);

    header('location: ?pages=pengguna&status=sukses&message=Data berhasil dihapus');
}
