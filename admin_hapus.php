<?php
	session_start();
	if ($_SESSION['status']!='login') {
		header('location:login.php?alert=belum_login');
	}
	require("koneksi.php");

	$id = $_GET['id'];	

	if ($id==$_SESSION['id']) {
		$query = mysqli_query($koneksi, "DELETE from user WHERE id_user='$id'");
		session_destroy();
		header("location:index.php");
	}
	else{
		$query1 = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
		$data = mysqli_fetch_array($query1);
		$nama = $data[nama];

		$query = mysqli_query($koneksi, "DELETE from user WHERE id_user='$id'");
		header("location:admin_menu.php?alert=hapus&nama=$nama");
	}

	
?>