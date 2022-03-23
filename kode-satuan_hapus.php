<?php
	$id = $_GET['id'];
	
	require("koneksi.php");

	$query1 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE id_kode1='$id'");
	$data = mysqli_fetch_array($query1);
	$nama = $data[nama_kode];

	$query = mysqli_query($koneksi, "DELETE from kode_satuan WHERE id_kode1='$id'");
	header("location:kode_menu.php?alert=hapus1&nama=$nama");
	
?>