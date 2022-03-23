<?php 
	include 'koneksi.php';
	$id = $_POST['id'];
	if (($_POST['kode1']!='') and ($_POST['kode2']!='') and ($_POST['kode3']!='') and ($_POST['jurusan']!='')) {
		$kode1 = $_POST['kode1'];
		$kode2 = $_POST['kode2'];
		$kode3 = $_POST['kode3'];
		$kode = $kode1.$kode2.$kode3;
		$jurusan = $_POST['jurusan'];

		if (($kode1==$kode2) or ($kode2==$kode3) or ($kode1==$kode3)) {
			// echo "Tidak Valid";
			header("location:kode_tambah.php?alert=tidakvalid&id=$id");
		}
		else{
			$cari = mysqli_query($koneksi, "SELECT * FROM kode WHERE kode='$kode'");
			$cek = mysqli_num_rows($cari);
			$data = mysqli_fetch_array($cari);

			if (($cek>0) and ($id!=$data['id_kode'])) {
				// echo "Kode Dobel";
				header("location:kode_tambah.php?alert=kode_dobel&id=$id");
			}
			else{
				// echo "Berhasil"; echo "<br>";
				// echo $kode1; echo "<br>";
				// echo $kode2; echo "<br>";
				// echo $kode3; echo "<br>";
				// echo $kode; echo "<br>";
				// echo $jurusan;
				mysqli_query($koneksi, "UPDATE kode set kode1='$kode1', kode2='$kode2', kode3='$kode3', kode='$kode', jurusan='$jurusan' WHERE id_kode='$id'");
				header("location:kode_edit.php?alert=berhasil&id=$id");
			}
		}
	}
	else{
		// echo "Tidak Lengkap";
		header("location:kode_edit.php?alert=belum_lengkap&id=$id");
	}
?>