<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container">
		<div class="judul">
			<a href="index.php"><button>Kembali</button></a>
			<h1>Silahkan Login</h1>
			<div class="alert">
				<?php
					if (isset($_GET['login'])) {
						if ($_GET['login']=='gagal') {
							echo "<p>Username atau Password anda salah, Coba Lagi!</p>";
						}
						elseif ($_GET['login']=='belum_lengkap') {
							echo "<p>Data Anda Belum Lengkap!</p>";
						}
					}
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='berhasil') {
							echo "<p>Pendaftaran Berhasil, Silahkan Login</p>";
						}
						elseif ($_GET['alert']=='belum_login') {
							echo "<p>Anda Belum Login, Silahkan Login</p>";
						}
						elseif ($_GET['alert']=='berhasil_ganti') {
							echo "<p>Password berhasil diganti, Silahkan Login</p>";
						}
					}
				?>
			</div>
		</div>
		<div class="form">
			<form method="post" action="cek_login.php">
				<div class="form-row">
					<div class="form-label">
						<label for="username">Username :</label>
					</div>
					<div class="form-control">
						<input type="text" name="username" >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="password">Password :</label>
					</div>
					<div class="form-control">
						<input type="password" name="password" >
					</div>
				</div>
				<div class="form-row">
					<button class="submit" type="submit" name="submit">Masuk</button>
				</div>
			</form>
			<div class="form-row">
				<a class="daftar" href="user_tambah.php"><button>Belum Punya Akun</button></a>
			</div>
			<!-- <div class="form-row">
				<a class="lupa" href="password_lupa.php"><button>Lupa Password</button></a>
			</div> -->
		</div>
	</div>
</body>
</html>