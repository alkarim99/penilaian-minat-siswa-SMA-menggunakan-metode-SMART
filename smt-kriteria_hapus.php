<?php
	$id_kriteria = $_GET['id'];
	
	require("koneksi.php");

	$query1 = mysqli_query($koneksi, "SELECT * FROM smt_kriteria WHERE id_kriteria='$id_kriteria'");
	$data = mysqli_fetch_array($query1);
	$kriteria = $data[kriteria];

	$query = mysqli_query($koneksi, "DELETE from smt_kriteria WHERE id_kriteria='$id_kriteria'");
	header("location:smart_menu.php?alert=hapus_kriteria&kriteria=$kriteria");
	
?>