<?php 
	include 'koneksi.php';
	if (($_POST['kode1']!='') and ($_POST['kode2']!='') and ($_POST['kode3']!='') and ($_POST['jurusan']!='')) {
		$kode1 = $_POST['kode1'];
		$kode2 = $_POST['kode2'];
		$kode3 = $_POST['kode3'];
		$kode = $kode1.$kode2.$kode3;
		$jurusan = $_POST['jurusan'];

		if (($kode1==$kode2) or ($kode2==$kode3) or ($kode1==$kode3)) {
			header("location:kode_tambah.php?alert=tidakvalid");
		}
		else{
			$cari = mysqli_query($koneksi, "SELECT * FROM kode WHERE kode='$kode'");
			$cek = mysqli_num_rows($cari);

			if ($cek>0) {
				header("location:kode_tambah.php?alert=kode_dobel");
			}
			else{
				mysqli_query($koneksi, "INSERT INTO kode (kode, kode1, kode2, kode3, jurusan) VALUES ('$kode', '$kode1', '$kode2', '$kode3', '$jurusan')");
				header("location:kode_tambah.php?alert=berhasil");
			}
		}
	}
	else{
		header("location:kode_tambah.php?alert=belum_lengkap");
	}

?>