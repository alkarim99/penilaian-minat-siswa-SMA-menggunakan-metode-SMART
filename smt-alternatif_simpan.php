<?php 
	include 'koneksi.php';

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

		if ($data2>0) {
			header("location:smt-alternatif_tambah.php?alert=alternatif_dobel");
		}
		else{
			mysqli_query($koneksi, "INSERT INTO smt_alternatif (alternatif) VALUES ('$alternatif')");
			$cari = mysqli_query($koneksi, "SELECT * FROM smt_alternatif where alternatif='$alternatif'");
			$data = mysqli_fetch_array($cari);
			$id_alternatif = $data["id_alternatif"];

			mysqli_query($koneksi, "INSERT INTO smt_data (id_alternatif, id_kriteria, nilai) VALUES ('$id_alternatif', '$id_kriteria1', '$nilaiR')");
			mysqli_query($koneksi, "INSERT INTO smt_data (id_alternatif, id_kriteria, nilai) VALUES ('$id_alternatif', '$id_kriteria2', '$nilaiI')");
			mysqli_query($koneksi, "INSERT INTO smt_data (id_alternatif, id_kriteria, nilai) VALUES ('$id_alternatif', '$id_kriteria3', '$nilaiA')");
			mysqli_query($koneksi, "INSERT INTO smt_data (id_alternatif, id_kriteria, nilai) VALUES ('$id_alternatif', '$id_kriteria4', '$nilaiS')");
			mysqli_query($koneksi, "INSERT INTO smt_data (id_alternatif, id_kriteria, nilai) VALUES ('$id_alternatif', '$id_kriteria5', '$nilaiE')");
			mysqli_query($koneksi, "INSERT INTO smt_data (id_alternatif, id_kriteria, nilai) VALUES ('$id_alternatif', '$id_kriteria6', '$nilaiC')");

			header("location:smt-alternatif_tambah.php?alert=berhasil");
		}
	}
	else{
		header("location:smt-alternatif_tambah.php?alert=belum_lengkap");
	}
?>