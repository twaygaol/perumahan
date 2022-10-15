 <?php
 session_start();
    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = 'index.php'</script>";
    }else{
echo"success!! akun anda adalah : " . @$_GET['nama'] ;
}
?>    