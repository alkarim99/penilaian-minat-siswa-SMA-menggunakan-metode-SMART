<?php
	session_start();
	include 'koneksi.php';
	$id = $_SESSION['id'];

	if (($_POST['username']!='') and ($_POST['password']!='') and ($_POST['nama']!='') and ($_POST['email']!='') and ($_POST['tempatlahir']!='') and ($_POST['tanggallahir']!='')) {
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
		$data = mysqli_fetch_array($cari);

		if (($cek>0) and ($id!=$data['id_user'])) {
			header("location:user_edit.php?alert=username_dobel");
		}
		else{
			if ($filename=='') {
				mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', nama='$nama', email='$email', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir' WHERE id_user='$id' ");
				header("location:user_edit.php?alert=berhasil");
				$_SESSION['nama'] = "$nama";
			}
			elseif (!in_array($ext, $ekstensi)) {
				header("location:user_edit.php?alert=gagal_ekstensi");
			}
			else{
				if ($ukuran<1044070) {
					$xx = $rand.'_'.$filename;
					move_uploaded_file($_FILES['foto']['tmp_name'], 'fotoprofil/'.$rand.'_'.$filename);
					mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', nama='$nama', email='$email', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', foto='$xx' WHERE id_user='$id' ");
					$_SESSION['nama'] = "$nama";
					$_SESSION['foto']="$xx";
					header("location:user_edit.php?alert=berhasil");
				}
				else{
					header("location:user_edit.php?alert=gagal_ukuran");
				}
			}
		}
	}
	else{
		header("location:user_edit.php?alert=belum_lengkap");
	}
?>