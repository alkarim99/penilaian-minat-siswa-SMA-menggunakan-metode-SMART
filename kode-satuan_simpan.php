<?php 
	include 'koneksi.php';
	if (($_POST['kode']!='') and ($_POST['nama']!='') and ($_POST['keterangan']!='')) {
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$keterangan = $_POST['keterangan'];

		$cari = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode'");
		$cek = mysqli_num_rows($cari);

		if ($cek>0) {
			header("location:kode-satuan_tambah.php?alert=kode_dobel");
		}
		else{
			mysqli_query($koneksi, "INSERT INTO kode_satuan (kode_huruf, nama_kode, keterangan) VALUES ('$kode', '$nama', '$keterangan')");
			header("location:kode-satuan_tambah.php?alert=berhasil");
		}
	}
	else{
		header("location:kode-satuan_tambah.php?alert=belum_lengkap");
	}

?>