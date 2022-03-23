<?php 
	include 'koneksi.php';
	$id_alternatif = $_POST['id'];
	if (($_POST['alternatif']!='') and ($_POST['nilaiR']!='') and ($_POST['nilaiI']!='') and ($_POST['nilaiA']!='') and ($_POST['nilaiS']!='') and ($_POST['nilaiE']!='') and ($_POST['nilaiC']!='')) {
		$alternatif = $_POST['alternatif'];
		$nilaiR = $_POST['nilaiR'];
		$nilaiI = $_POST['nilaiI'];
		$nilaiA = $_POST['nilaiA'];
		$nilaiS = $_POST['nilaiS'];
		$nilaiE = $_POST['nilaiE'];
		$nilaiC = $_POST['nilaiC'];

		$id_kriteria1 = 1;
		$id_kriteria2 = 2;
		$id_kriteria3 = 3;
		$id_kriteria4 = 4;
		$id_kriteria5 = 5;
		$id_kriteria6 = 6;

		$cari2 = mysqli_query($koneksi, "SELECT * FROM smt_alternatif WHERE alternatif='$alternatif'");
		$data2 = mysqli_fetch_array($cari2);

		if (($data2>0) and ($id_alternatif!=$data2['id_alternatif'])) {
			header("location:smt-alternatif_edit.php?alert=alternatif_dobel&id=$id_alternatif");
		}
		else{
			mysqli_query($koneksi, "UPDATE smt_alternatif set alternatif='$alternatif' WHERE id_alternatif='$id_alternatif'");
			mysqli_query($koneksi, "UPDATE smt_data set nilai='$nilaiR' WHERE id_alternatif='$id_alternatif' and id_kriteria='1'");
			mysqli_query($koneksi, "UPDATE smt_data set nilai='$nilaiI' WHERE id_alternatif='$id_alternatif' and id_kriteria='2'");
			mysqli_query($koneksi, "UPDATE smt_data set nilai='$nilaiA' WHERE id_alternatif='$id_alternatif' and id_kriteria='3'");
			mysqli_query($koneksi, "UPDATE smt_data set nilai='$nilaiS' WHERE id_alternatif='$id_alternatif' and id_kriteria='4'");
			mysqli_query($koneksi, "UPDATE smt_data set nilai='$nilaiE' WHERE id_alternatif='$id_alternatif' and id_kriteria='5'");
			mysqli_query($koneksi, "UPDATE smt_data set nilai='$nilaiC' WHERE id_alternatif='$id_alternatif' and id_kriteria='6'");
			header("location:smt-alternatif_edit.php?alert=berhasil&id=$id_alternatif");
		}
	}
	else{
		header("location:smt-alternatif_edit.php?alert=belum_lengkap&id=$id_alternatif");
	}
?>