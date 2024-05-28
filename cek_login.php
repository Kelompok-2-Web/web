<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include_once "model/m_user_model.php";
    $jenis_login = $_POST['jenis_login'];
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    // Untuk peran selain admin, lewati validasi username dan password
    if ($jenis_login !== 'admin') {
        $_SESSION['username'] = $jenis_login; // Menetapkan nama peran sebagai username untuk sesi
        $_SESSION['nama'] = $jenis_login; // Atau menetapkan nama default
        $_SESSION['user_id'] = 0; // Atau beberapa ID pengguna default
        $_SESSION['role'] = $jenis_login;
        header('Location: index.php');
    } else {
        $user = new User();
        $result = $user->loginUser($username, $password);

        // jika tidak ditemukan
        if ($result === null) {
            header("Location: login.php?pesan=Login gagal. Username tidak ditemukan.");
        // jika password salah
        } elseif ($result === false) {
            header("Location: login.php?pesan=Login gagal. Password salah.");
        // jika password benar
        } else {
            $_SESSION['username'] = $result['username'];
            $_SESSION['nama'] = $result['nama'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['role'] = $jenis_login;
            header('Location: index.php');
        }
    }
    exit();
}
?>
