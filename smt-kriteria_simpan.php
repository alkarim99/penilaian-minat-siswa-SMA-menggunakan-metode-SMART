<?php 
	include 'koneksi.php';
	if (($_POST['kriteria']!='') and ($_POST['bobot']!='')) {
		$kriteria = $_POST['kriteria'];
		$bobot = $_POST['bobot'];

		$cari = mysqli_query($koneksi, "SELECT * FROM smt_kriteria WHERE kriteria='$kriteria'");
		$cek = mysqli_num_rows($cari);

		if ($cek>0) {
			header("location:smt-kriteria_tambah.php?alert=kriteria_dobel");
		}
		else{
			mysqli_query($koneksi, "INSERT INTO smt_kriteria (kriteria, bobot) VALUES ('$kriteria', '$bobot')");
			header("location:smt-kriteria_tambah.php?alert=berhasil");
		}
	}
	else{
		header("location:smt-kriteria_tambah.php?alert=belum_lengkap");
	}

?>