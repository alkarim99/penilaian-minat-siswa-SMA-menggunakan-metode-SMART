<?php
	$id = $_GET['id'];
	
	require("koneksi.php");

	$query1 = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$id'");
	$data = mysqli_fetch_array($query1);
	$nomor = $data[nomor];
	$tipe = $data[tipe];

	$query = mysqli_query($koneksi, "DELETE from soal WHERE id_soal='$id'");
	header("location:soal_menu.php?alert=hapus&nomor=$nomor&tipe=$tipe");
	
?>