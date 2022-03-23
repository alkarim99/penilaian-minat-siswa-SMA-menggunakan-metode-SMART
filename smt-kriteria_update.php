<?php 
	include 'koneksi.php';
	$id_kriteria = $_POST['id'];
	if (($_POST['kriteria']!='') and ($_POST['bobot']!='')) {
		$kriteria = $_POST['kriteria'];
		$bobot = $_POST['bobot'];

		$cari = mysqli_query($koneksi, "SELECT * FROM smt_kriteria WHERE kriteria='$kriteria'");
		$cek = mysqli_num_rows($cari);
		$data = mysqli_fetch_array($cari);

		if (($cek>0) and ($id_kriteria!=$data['id_kriteria'])) {
			header("location:smt-kriteria_edit.php?alert=kriteria_dobel&id=$id_kriteria");
		}
		else{
			mysqli_query($koneksi, "UPDATE smt_kriteria set kriteria='$kriteria', bobot='$bobot' WHERE id_kriteria='$id_kriteria'");
			header("location:smt-kriteria_edit.php?alert=berhasil&id=$id_kriteria");
		}
	}
	else{
		header("location:smt-kriteria_edit.php?alert=belum_lengkap&id=$id_kriteria");
	}
?>