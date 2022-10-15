<!-- Proses Untuk Pengecekan Username dan Password -->
<?php  

if (isset($_POST['submit']))
{
	$link     = mysqli_connect('sql208.epizy.com','epiz_32794488','5SQu2CZ204D','epiz_32794488_db_companyprofile');
	//menampung variable
	$username=$_POST['username'];
	$password=$_POST['password'];

	//Query untuk melakukan pengecekan apakah username dan password telah benar
	$query="select * from tbl_user where username='$username' and password='$password'";
	$login=mysqli_query($link,$query);
	$cek_login=mysqli_num_rows($login);
	$row=mysqli_fetch_array($login);
	
	echo "<br>";
	
	if ($cek_login > 0)	{
	    session_start();		
		$id=$row['id_user'];	
		$nama=$row['fullname'];
		$username=$row['username'];
		$password=$row['password'];

		$_SESSION['id_user']=$id;
		$_SESSION['fullname']=$nama;
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		
		//fungsi untuk membuat waktu session
		login_validate();
		
		header("location:template.php");
		?>
	<?php		
	}else{
		echo "<center style='color:red'>Username & Password yang Anda masukan salah!</center>";
	}
}
?>

<!-- Proses Untuk Logout Otomatis -->
<?php

$tanggal=date("Y-m-d H:i:s");

//fungsi untuk Logout otomatis
function login_validate() {
	//ukuran waktu dalam detik
	$timer=5;
	//untuk menambah masa validasi
	$_SESSION["expires_by"] = time() + $timer;
}

function login_check() {
	//berfungsi untuk mengambil nilai dari session yang pertama
	$exp_time = $_SESSION["expires_by"];
	
	//jika waktu sistem lebih kecil dari nilai waktu session
	if (time() < $exp_time) {
		//panggil fungsi dan tambah waktu session
		login_validate();
		return true; 
	}else{
		//jika waktu session lebih kecil dari waktu session atau lewat batas
		//maka akan dilakukan unset session
		unset($_SESSION["expires_by"]);
		return false; 
	}
}

$logoutbtn = @$_GET['logout'];
if ($logoutbtn == 'y' ){
	session_start();
	session_destroy();
	header('location:index.php');
}
?>

