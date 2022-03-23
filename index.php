<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="navbar">
		<a href="index.php"><h1>Aplikasi Penelusuran Minat</h1></a>
		<?php
			session_start();
			include 'koneksi.php';
			if (isset($_SESSION['status'])) {
				if (($_SESSION['status']=='login') and ($_SESSION['peran']=='')) {
					echo "<div class='menu'>
							<img src='fotoprofil/".$_SESSION['foto']."'>
							<p class='nama'>".$_SESSION['nama']."</p>
							<div class='submenu'>
								<ul>
									<li><a href='user_edit.php'>Profil</a></li><hr>
									<li><a href='hasil.php'>Lihat Hasil</a></li><hr>
									<li><a href='logout.php'>Keluar</a></li>
								</ul>
							</div>
						</div>";
				}
				else{
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
				echo "<div class='menu2'>
						<ul>
							<li class='daftar'><a href='user_tambah.php'>Daftar</a></li>
							<li class='masuk'><a href='login.php'>Masuk</a></li>
						</ul>
					</div>";
			}
		?>
	</div>
	<div class="content">
		<div class="jumbotron">
			<div class="overlay"></div>
			<div class="judul">
				<?php
					if (isset($_SESSION['status'])) {
						if ($_SESSION['status']=='login') {
							echo "<h1>Selamat Datang,</h1>";
							echo "<p>".$_SESSION['nama']."</p>";
						}
					}
					else{
						echo "<h1>Selamat Datang</h1>";
					}

					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='hapus_data') {
							echo "<h3>Data ".$_GET['nama']." Berhasil Dihapus</h3>";
						}
					}
				?>
				<p class="pengantar">Aplikasi ini menggunakan teori minat dari John L Holland, yang mengkategorikan minat menjadi 6 kriteria, yaitu Realistik, Investigatif, Artistik, Sosial, Enterpris, dan Konvensional yang umumnya disingkat RIASEC.</p>
			</div>
			<div class="menu">
				<?php
					if (isset($_SESSION['peran'])) {
						if ($_SESSION['peran']=='admin') {
							echo "
							<ul>
								<li class='admin'><a href='admin_menu.php'>Kelola Admin</a></li>
								<li class='soal'><a href='soal_menu.php'>Kelola Soal Tes</a></li>
								<li class='kode'><a href='kode_menu.php'>Kelola Kode RIASEC</a></li>
								<li class='kode'><a href='smart_menu.php'>Kelola SMART</a></li>
							</ul>";
						}
						else{
							echo "<ul>
									<li class='lanjut'><a href='#riasec'>Lebih Lanjut</a></li>
									<li class='panduan'><a href='panduan.php'>Mulai Tes</a></li>
								</ul>";
						}
					}
					else{
						echo "<ul>
								<li class='lanjut'><a href='#riasec'>Lebih Lanjut</a></li>
								<li class='panduan'><a href='panduan.php'>Mulai Tes</a></li>
							</ul>";
					}
				?>
			</div>
		</div>
	</div>
	<?php
		$cariR = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = 'R'");
		$dataR = mysqli_fetch_array($cariR);

		$cariI = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = 'I'");
		$dataI = mysqli_fetch_array($cariI);

		$cariA = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = 'A'");
		$dataA = mysqli_fetch_array($cariA);

		$cariS = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = 'S'");
		$dataS = mysqli_fetch_array($cariS);

		$cariE = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = 'E'");
		$dataE = mysqli_fetch_array($cariE);

		$cariC = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = 'C'");
		$dataC = mysqli_fetch_array($cariC);

		if (isset($_SESSION['peran'])) {
			if ($_SESSION['peran']=='') {
				echo "
				<div class='content'>
					<div class='riasec' id='riasec'>
						<h3 class='judul'>RIASEC</h3>
						<div class='kartu'>
							<h3>Tipe ".$dataR['nama_kode']."</h3>
							<p class='realistik'>".$dataR['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataI['nama_kode']."</h3>
							<p class='investigatif'>".$dataI['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataA['nama_kode']."</h3>
							<p class='artistik'>".$dataA['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataS['nama_kode']."</h3>
							<p class='sosial'>".$dataS['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataE['nama_kode']."</h3>
							<p class='enterpris'>".$dataE['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataC['nama_kode']."</h3>
							<p class='konvensional'>".$dataC['keterangan']."</p>
						</div>
					</div>
				</div>
				<div class='content'>
					<div class='mulai'>
						<h3>Klik 'Mulai Tes' untuk mengetahui tipe minat kamu.</h3>
						<div class='menu'>
							<ul>
								<li class='tes'><a href='panduan.php'>Mulai Tes</a></li>
							</ul>
						</div>
					</div>
				</div>
				";
			}
		}
		else{
			echo "<div class='content'>
					<div class='riasec' id='riasec'>
						<h3 class='judul'>RIASEC</h3>
						<div class='kartu'>
							<h3>Tipe ".$dataR['nama_kode']."</h3>
							<p class='realistik'>".$dataR['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataI['nama_kode']."</h3>
							<p class='investigatif'>".$dataI['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataA['nama_kode']."</h3>
							<p class='artistik'>".$dataA['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataS['nama_kode']."</h3>
							<p class='sosial'>".$dataS['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataE['nama_kode']."</h3>
							<p class='enterpris'>".$dataE['keterangan']."</p>
						</div>
						<div class='kartu'>
							<h3>Tipe ".$dataC['nama_kode']."</h3>
							<p class='konvensional'>".$dataC['keterangan']."</p>
						</div>
					</div>
				</div>
				<div class='content'>
					<div class='mulai'>
						<h3>Klik 'Mulai Tes' untuk mengetahui tipe minat kamu.</h3>
						<div class='menu'>
							<ul>
								<li class='tes'><a href='panduan.php'>Mulai Tes</a></li>
							</ul>
						</div>
					</div>
				</div>";
		}
	?>
	<div class="navbar">
		<p class="footer">Copyright @2021 Aplikasi Penelusuran Minat</p>
	</div>
</body>
</html>