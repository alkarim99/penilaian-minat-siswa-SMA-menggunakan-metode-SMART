<?php
	$id_alternatif = $_GET['id'];
	
	require("koneksi.php");

	$query1 = mysqli_query($koneksi, "SELECT * FROM smt_alternatif WHERE id_alternatif='$id_alternatif'");
	$data = mysqli_fetch_array($query1);
	$alternatif = $data[alternatif];

	$query = mysqli_query($koneksi, "DELETE from smt_alternatif WHERE id_alternatif='$id_alternatif'");
	header("location:smart_menu.php?alert=hapus_alternatif&alternatif=$alternatif");
	
?>