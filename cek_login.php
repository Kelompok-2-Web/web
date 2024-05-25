<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include_once "model/m_user_model.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $result = $user->loginUser($username, $password);

    // jika tidak ditemukan
    if ($result === null) {
        header("Location: login.php?pesan=Login gagal. Username tidak ditemukan.");
        // echo "tidak ketemu";

        // jika password salah
    } elseif ($result === false) {
        header("Location: login.php?pesan=Login gagal. Password salah.");
        // echo "salah";

        // jika password benar
    } else {
        $_SESSION['username'] = $result['username'];
        $_SESSION['nama'] = $result['nama'];
        $_SESSION['user_id'] = $result['user_id'];
        header('Location: index.php');
    }
    exit();
}
