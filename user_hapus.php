<?php 
	include 'koneksi.php';
	session_start();
	$id = $_SESSION['id'];
	
	$cari = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
	$data = mysqli_fetch_array($cari);
	$nama = $data[nama];

	$hapus_user = mysqli_query($koneksi, "DELETE from user WHERE id_user='$id'");
	$hapus_hasil = mysqli_query($koneksi, "DELETE from hasil WHERE id_user='$id'");
	session_destroy();
	header("location:index.php?alert=hapus_data&nama=$nama");
?>