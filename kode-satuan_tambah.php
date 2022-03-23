<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="kode-satuan_tambah.css">
</head>
<body>
	<div class="navbar">
		<a href="index.php"><h1>Aplikasi Penelusuran Minat</h1></a>
		<?php
			session_start();
			include 'koneksi.php';			
			if (isset($_SESSION['status'])) {
				if ($_SESSION['status']=='login') {
					echo "<div class='menu'>
							<img src='fotoprofil/".$_SESSION['foto']."'>
							<p class='nama'>".$_SESSION['nama']."</p>
							<div class='submenu'>
								<ul>
									<li><a href='admin_edit.php'>Profil</a></li><hr>
									<li><a href='logout.php'>Keluar</a></li>
								</ul>
							</div>
						</div>";
				}
			}
			else{
				header('location:login.php?alert=belum_login');
			}

		?>
	</div>
	<div class="content">
		<h2>Halaman Tambah Kode Satuan</h2>
		<div class="form">
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='kode_dobel') {
							echo "<p>Kode sudah digunakan, Pilih kode lain</p>";
						}
						elseif ($_GET['alert']=='belum_lengkap') {
							echo "<p>Data Kode Belum Lengkap!</p>";
						}
						elseif ($_GET['alert']=='berhasil') {
							echo "<p>Kode Berhasil Ditambahkan</p>";
						}			
					}
				?>
			</div>
			<form method="post" action="kode-satuan_simpan.php">
				<a class="kembali" href="kode_menu.php"> Kembali </a>
				<div class="form-row">
					<div class="form-label">
						<label for="kode">Kode :</label>
					</div>
					<div class="form-control">
						<input type="text" id="kode" name="kode" >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nama">Nama Kode :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nama" name="nama" >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="keterangan">Keterangan :</label>
					</div>
					<div class="form-control">
						<input type="text" id="keterangan" name="keterangan" >
					</div>
				</div>
				<div class="form-row">
					<button class="submit" type="submit" name="submit">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>