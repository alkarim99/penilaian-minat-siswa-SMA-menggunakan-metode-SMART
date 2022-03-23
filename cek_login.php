<?php 
	session_start();
	include 'koneksi.php';

	if (($_POST['username']!='') and ($_POST['password'])!='') {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$cekuser = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
		$datauser = mysqli_fetch_array($cekuser);
		$hasiluser = mysqli_num_rows($cekuser);

		$id = $datauser[id_user];
		$peran = $datauser[peran];
		$nama = $datauser[nama];
		$foto = $datauser[foto];
		$tanggallahir = $datauser[tanggallahir];
		
		if ($hasiluser>0) {
			$_SESSION['peran'] = "$peran";
			$_SESSION['nama'] = "$nama";
			$_SESSION['tanggallahir'] = "$tanggallahir";
			$_SESSION['status'] = "login";
			$_SESSION['username'] = "$username";
			$_SESSION['foto'] = "$foto";
			$_SESSION['id'] = "$id";
			header("location:index.php");
		}
		else{
			header("location:login.php?login=gagal");
		}
	}
	else{
		header("location:login.php?login=belum_lengkap");
	}

?>