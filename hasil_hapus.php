<?php
	session_start();
	if ($_SESSION['status']!='login') {
		header('location:login.php?alert=belum_login');
	}
	$id = $_GET['id'];
	
	require("koneksi.php");

	$query = mysqli_query($koneksi, "DELETE from hasil WHERE id_hasil='$id'");
	header("location:hasil.php?alert=hapus");
	
?>