<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="password_ganti.css">
</head>
<body>
	<div class="container">
		<div class="judul">
			<a href="index.php"><button>Kembali</button></a>
			<h1>Lupa Password</h1>
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='tidak_sama') {
							echo "<p>Password Tidak Sama</p>";
						}
					}
				?>
			</div>
		</div>
		<div class="form">
			<?php
				include 'koneksi.php';
				if ((isset($_POST['username'])) and (isset($_POST['email'])) and (isset($_POST['tanggallahir']))) {
					$username = $_POST['username'];
					$email = $_POST['email'];
					$tanggallahir = $_POST['tanggallahir'];
					$cari = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and email='$email' and tanggallahir='$tanggallahir'");
					$hasil = mysqli_num_rows($cari);
					if ($hasil>0) {
						$data = mysqli_fetch_array($cari);
						// $id = $data['id_user'];
			?>
			<form method="post" action="password_update.php">
				<input style="display: none;" type="text" name="id" <?php echo "value= '$data[id_user]'"; ?>>
				<div class="form-row">
					<div class="form-label">
						<label for="passwordbaru">Password Baru :</label>
					</div>
					<div class="form-control">
						<input type="password" name="passwordbaru" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="ulangpassword">Ulangi :</label>
					</div>
					<div class="form-control">
						<input type="password" name="ulangpassword" required>
					</div>
				</div>
				<div class="form-row">
					<button class="submit" type="submit" name="submit">Submit</button>
				</div>
			</form>
			<?php
					}
					else{
						header("location:password_lupa.php?alert=gagal");
					}
				}
			?>
		</div>
	</div>
</body>
</html>