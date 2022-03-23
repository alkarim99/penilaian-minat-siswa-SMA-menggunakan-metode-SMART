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
	<link rel="stylesheet" type="text/css" href="soal_tambah.css">
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
		<h2>Halaman Tambah Soal</h2>
		<div class="form">
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='nomor_dobel') {
							echo "<p>Nomor soal sudah digunakan, Pilih nomor lain</p>";
						}
						elseif ($_GET['alert']=='belum_lengkap') {
							echo "<p>Data Soal Belum Lengkap!</p>";
						}
						elseif ($_GET['alert']=='berhasil') {
							echo "<p>Soal Berhasil Ditambahkan</p>";
						}			
					}
				?>
			</div>
			<form method="post" action="soal_simpan.php">
				<a class="kembali" href="soal_menu.php"> Kembali </a>
				<div class="form-row">
					<div class="form-label">
						<label for="nomor">Nomor :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nomor" name="nomor" >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="tipe">Tipe :</label>
					</div>
					<div class="form-control">
						<select id="tipe" name="tipe" >
							<option value="">-Pilih Tipe-</option>
							<option value="Realistik">Realistik</option>
							<option value="Investigatif">Investigatif</option>
							<option value="Artistik">Artistik</option>
							<option value="Sosial">Sosial</option>
							<option value="Enterpris">Enterpris</option>
							<option value="Konvensional">Konvensional</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="pertanyaan">Pertanyaan :</label>
					</div>
					<div class="form-control">
						<input type="text" id="pertanyaan" name="pertanyaan" >
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