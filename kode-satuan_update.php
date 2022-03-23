<?php 
	include 'koneksi.php';
	$id = $_POST['id'];
	if (($_POST['kode']!='') and ($_POST['nama']!='') and ($_POST['keterangan']!='')) {
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$keterangan = $_POST['keterangan'];

		$cari = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode'");
		$cek = mysqli_num_rows($cari);
		$data = mysqli_fetch_array($cari);

		if ($cek>0 and ($id!=$data['id_kode1'])) {
			header("location:kode-satuan_edit.php?alert=kode_dobel&id=$id");
		}
		else{
			mysqli_query($koneksi, "UPDATE kode_satuan set kode_huruf='$kode', nama_kode='$nama', keterangan='$keterangan' WHERE id_kode1='$id'");
			header("location:kode-satuan_edit.php?alert=berhasil&id=$id");
		}
	}
	else{
		header("location:kode-satuan_edit.php?alert=belum_lengkap&id=$id");
	}
?>