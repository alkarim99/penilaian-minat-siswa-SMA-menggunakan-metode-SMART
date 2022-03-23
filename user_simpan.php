<?php 
	include 'koneksi.php';

	if (($_POST['username']!='') and ($_POST['password']!='') and ($_POST['nama']!='') and ($_POST['email']!='') and ($_POST['tempatlahir']!='') and ($_POST['tanggallahir']!='') and ($_FILES['foto']['name']!='')) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tempatlahir = $_POST['tempatlahir'];
		$tanggallahir = $_POST['tanggallahir'];

		$rand = rand();
		$ekstensi = array('png', 'jpg', 'jpeg', 'gif');	
		$filename = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		$cari = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
		$cek = mysqli_num_rows($cari);

		if ($cek>0) {
			header("location:user_tambah.php?alert=username_dobel");
		}
		else{
			if (!in_array($ext, $ekstensi)) {
				header("location:user_tambah.php?alert=gagal_ekstensi");
			}
			else{
				if ($ukuran<1044070) {
					$xx = $rand.'_'.$filename;
					move_uploaded_file($_FILES['foto']['tmp_name'], 'fotoprofil/'.$rand.'_'.$filename);
					mysqli_query($koneksi, "INSERT INTO user (peran, username, password, email, nama, tempatlahir, tanggallahir, foto) VALUES ('', '$username', '$password', '$email', '$nama', '$tempatlahir', '$tanggallahir', '$xx')");
					header("location:login.php?alert=berhasil");
				}
				else{
					header("location:user_tambah.php?alert=gagal_ukuran");
				}
			}
		}
	}
	else{
		header("location:user_tambah.php?alert=belum_lengkap");
	}

?>