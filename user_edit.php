<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="user_edit.css">
</head>
<body>
	<?php
		include 'koneksi.php';
		session_start();
		if ($_SESSION['status']!='login') {
			header('location:login.php?alert=belum_login');
		}
		$id = $_SESSION['id'];
		$cari = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
		$hasil = mysqli_fetch_array($cari);
	?>
	<h1>Halaman Profil</h1>
	<div class="container">
		<div class="judul">
			<a href="index.php"><button>Kembali</button></a>
			<img src="fotoprofil/<?php echo $hasil['foto'] ?>">
			<div class="alert">
				<?php 
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='gagal_ekstensi') {
							echo "<p style='color:red'>Ekstensi Tidak Diperbolehkan</p>";
						}
						elseif ($_GET['alert']=='gagal_ukuran') {
							echo "<p style='color:red'>Ukuran File Terlalu Besar</p>";
						}
						elseif ($_GET['alert']=='berhasil') {
							echo "<p>Data Berhasil Diupdate</p>";
						}
						elseif ($_GET['alert']=='username_dobel') {
							echo "<p>Username Sudah Digunakan, Pilih Username Lain!</p>";
						}
						elseif ($_GET['alert']=='belum_lengkap') {
							echo "<p>Data Anda Belum Lengkap!</p>";
						}
					}
				?>
			</div>
		</div>		
		<form class="form" method="post" action="user_update.php" enctype="multipart/form-data">
			
			<div class="form-row">
				<div class="form-label">
					<label for="username">Username:</label>
				</div>
				<div class="form-control">
					<input type="text" name="username" <?php echo "value= '$hasil[username]'"; ?> >
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="password">Password:</label>
				</div>
				<div class="form-control">
					<input type="password" name="password" <?php echo "value= '$hasil[password]'"; ?> >
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="nama">Nama:</label>
				</div>
				<div class="form-control">
					<input type="text" name="nama" <?php echo "value= '$hasil[nama]'"; ?> >
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="email">Email:</label>
				</div>
				<div class="form-control">
					<input type="text" name="email" <?php echo "value= '$hasil[email]'"; ?> >
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="tempatlahir">Tempat Lahir:</label>
				</div>
				<div class="form-control">
					<input type="text" name="tempatlahir" <?php echo "value= '$hasil[tempatlahir]'"; ?> >
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="tanggallahir">Tanggal Lahir:</label>
				</div>
				<div class="form-control">
					<input type="text" id="tanggallahir" name="tanggallahir" <?php echo "value= '$hasil[tanggallahir]'"; ?> >
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">
					<label for="foto">Upload Foto:</label>
				</div>
				<div class="form-control">
					<input class="file" type="file" name="foto">
				</div>
			</div>
			<div class="form-row">
				<button class="submit" type="submit" name="submit">Simpan</button>
			</div>
		</form>
		<div class="form-row">
			<a class="hapus" href="user_hapus.php"><button>Hapus Akun</button></a>
		</div>
	</div>

	<script>
		$("#tanggallahir").datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			yearRange: "1985:2021"
		});

		// Getter
		var dateFormat = $( "#tanggallahir" ).datepicker( "option", "dateFormat" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

		// Getter
		var changeMonth = $( "#tanggallahir" ).datepicker( "option", "changeMonth" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "changeMonth", true );

		// Getter
		var changeYear = $( "#tanggallahir" ).datepicker( "option", "changeYear" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "changeYear", true );

		// Getter
		var yearRange = $( "#tanggallahir" ).datepicker( "option", "yearRange" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "yearRange", "1985:2021" );
	</script>
</body>
</html>