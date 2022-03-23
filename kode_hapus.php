<?php
	$id = $_GET['id'];
	
	require("koneksi.php");

	$query1 = mysqli_query($koneksi, "SELECT * FROM kode WHERE id_kode='$id'");
	$data = mysqli_fetch_array($query1);
	$kode = $data[kode];

	$query = mysqli_query($koneksi, "DELETE from kode WHERE id_kode='$id'");
	header("location:kode_menu.php?alert=hapus&kode=$kode");
	
?>