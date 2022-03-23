<?php
	session_start();
	if ($_SESSION['status']!='login') {
		header('location:login.php?alert=belum_login');
	}
	include 'koneksi.php';
	$id = $_POST['id'];

	if (($_POST['username']!='') and ($_POST['password']!='') and ($_POST['nama']!='') and ($_POST['email']!='') and ($_POST['tempatlahir']!='') and ($_POST['tanggallahir']!='')) {
		$peran = "admin";
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
			header("location:admin_edit.php?alert=username_dobel&id=$id");
		}
		else{
			if ($filename=='') {
				mysqli_query($koneksi, "UPDATE user SET peran='$peran', username='$username', password='$password', nama='$nama', email='$email', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir' WHERE id_user='$id' ");
				if ($_SESSION['id']==$id) {
					header("location:admin_edit.php?alert=berhasil&id=$id");
					$_SESSION['nama'] = "$nama";
					$_SESSION['peran'] = "$peran";
				}
				else{
					header("location:admin_edit.php?alert=berhasil&id=$id");
				}
				// $_SESSION['nama'] = "$nama";
				// $_SESSION['peran'] = "$peran";
			}
			elseif (!in_array($ext, $ekstensi)) {
				header("location:admin_edit.php?alert=gagal_ekstensi&id=$id");
			}
			else{
				if ($ukuran<1044070) {
					$xx = $rand.'_'.$filename;
					move_uploaded_file($_FILES['foto']['tmp_name'], 'fotoprofil/'.$rand.'_'.$filename);
					mysqli_query($koneksi, "UPDATE user SET peran='$peran', username='$username', password='$password', nama='$nama', email='$email', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', foto='$xx' WHERE id_user='$id' ");
					if ($_SESSION['id']==$id) {
						header("location:admin_edit.php?alert=berhasil&id=$id");
						$_SESSION['nama'] = "$nama";
						$_SESSION['peran'] = "$peran";
						$_SESSION['foto'] = "$xx";
					}
					else{
						header("location:admin_edit.php?alert=berhasil&id=$id");
					}
					// $_SESSION['nama'] = "$nama";
					// $_SESSION['peran'] = "$peran";
					// $_SESSION['foto'] = "$xx";
				}
				else{
					header("location:admin_edit.php?alert=gagal_ukuran&id=$id");
				}
			}
		}
	}
	else{
		header("location:admin_edit.php?alert=belum_lengkap&id=$id");
	}
?>