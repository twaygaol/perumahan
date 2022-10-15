<?php
error_reporting(E_ALL^(E_NOTICE | E_WARNING));
if (!isset($_SESSION)){
    @session_start();
}
    //Membuat batasan waktu sesion untuk user di PHP 
    $timeout = 9; // Set timeout menit
    $logout_redirect_url = "index.php"; // Set logout URL

    $timeout = $timeout * 30; // Ubah menit ke detik
    if (isset($_SESSION['start_time'])) {
        $elapsed_time = time() - $_SESSION['start_time'];
        if ($elapsed_time >= $timeout) {
            session_destroy();
            echo "<script>alert('Session Anda Telah Habis, Silahkan Sign In Kembali !'); window.location = '$logout_redirect_url'</script>";
        }
    }
    $_SESSION['start_time'] = time();

?>