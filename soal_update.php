<?php 
	include 'koneksi.php';
	$id = $_POST['id'];
	if (($_POST['nomor']!='') and ($_POST['tipe']!='') and ($_POST['pertanyaan']!='')) {
		$nomor = $_POST['nomor'];
		$tipe = $_POST['tipe'];
		$pertanyaan = $_POST['pertanyaan'];

		$cari = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='$tipe' and nomor='$nomor'");
		$cek = mysqli_num_rows($cari);
		$data = mysqli_fetch_array($cari);

		if ($cek>0 and ($id!=$data['id_soal'])) {
			header("location:soal_edit.php?alert=nomor_dobel&id=$id");
		}
		else{
			mysqli_query($koneksi, "UPDATE soal set nomor='$nomor', tipe='$tipe', pertanyaan='$pertanyaan' WHERE id_soal='$id'");
			header("location:soal_edit.php?alert=berhasil&id=$id");
		}
	}
	else{
		header("location:soal_edit.php?alert=belum_lengkap&id=$id");
	}
?>