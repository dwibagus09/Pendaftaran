<?php
include '../koneksi.php';
if ($_POST['submit']) {
	$uname 	= $_POST['username'];
	$pwd	= $_POST['password'];
	//cek apakah username dan password ada atau tidak
	$cek	= mysqli_query($con,"select * from user where username = '$uname' && password = '$pwd' ");
	if (mysqli_num_rows($cek) > 0) {
		$data = mysqli_fetch_array($cek);
		$_SESSION['username'] = $data['username'];
		echo "<meta http-equiv = 'refresh' content='0; url = ../dashboard'>";
	}
	else
	{
		echo "<script>alert('Ops! Username atau password anda salah')</script>";
		echo "<meta http-equiv = 'refresh' content='0; url = ../login.php'>";
	}

}

?>