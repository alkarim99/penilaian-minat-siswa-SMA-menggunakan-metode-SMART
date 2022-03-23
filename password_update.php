<?php
	include 'koneksi.php';
	if ((isset($_POST['id'])) and (isset($_POST['passwordbaru'])) and (isset($_POST['ulangpassword']))) {
		$id = $_POST['id'];
		$passwordbaru = $_POST['passwordbaru'];
		$ulangpassword = $_POST['ulangpassword'];
		if ($passwordbaru!=$ulangpassword) {
			header("location:password_ganti.php?alert=tidak_sama");
		}
		else{
			mysqli_query($koneksi, "UPDATE user set password='$passwordbaru' WHERE id_user='$id'");
			header("location:login.php?alert=berhasil_ganti");
		}
	}
?>