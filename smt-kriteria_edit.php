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
	<link rel="stylesheet" type="text/css" href="smt-kriteria_edit.css">
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
		<h2>Halaman Edit Kriteria</h2>
		<div class="form">
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='kriteria_dobel') {
							echo "<p>Kriteria sudah ada</p>";
						}
						elseif ($_GET['alert']=='belum_lengkap') {
							echo "<p>Data Kriteria Belum Lengkap!</p>";
						}
						elseif ($_GET['alert']=='berhasil') {
							echo "<p>Kriteria Berhasil Diupdate</p>";
						}			
					}
				?>
			</div>
			<?php
	    		include 'koneksi.php';
	    		$id_kriteria = $_GET['id'];
		    	$query = mysqli_query($koneksi, "SELECT * FROM smt_kriteria WHERE id_kriteria='$id_kriteria'");
		    	$no = 1;
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		    ?>
			<form method="post" action="smt-kriteria_update.php">
				<a class="kembali" href="smart_menu.php"> Kembali </a>
				<input style="display: none;" type="text" name="id" <?php echo "value='$data[id_kriteria]'"; ?>>
				<div class="form-row">
					<div class="form-label">
						<label for="kriteria">Kriteria :</label>
					</div>
					<div class="form-control">
						<input type="text" id="kriteria" name="kriteria" <?php echo "value='$data[kriteria]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="bobot">Bobot :</label>
					</div>
					<div class="form-control">
						<input type="text" id="bobot" name="bobot" <?php echo "value='$data[bobot]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<button class="submit" type="submit" name="submit">Simpan</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</div>
</body>
</html>