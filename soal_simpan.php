<?php 
	include 'koneksi.php';
	if (($_POST['nomor']!='') and ($_POST['tipe']!='') and ($_POST['pertanyaan']!='')) {
		$nomor = $_POST['nomor'];
		$tipe = $_POST['tipe'];
		$pertanyaan = $_POST['pertanyaan'];

		$cari = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='$tipe' and nomor='$nomor'");
		$cek = mysqli_num_rows($cari);

		if ($cek>0) {
			header("location:soal_tambah.php?alert=nomor_dobel");
		}
		else{
			mysqli_query($koneksi, "INSERT INTO soal (nomor, tipe, pertanyaan) VALUES ('$nomor', '$tipe', '$pertanyaan')");
			header("location:soal_tambah.php?alert=berhasil");
		}
	}
	else{
		header("location:soal_tambah.php?alert=belum_lengkap");
	}

?>