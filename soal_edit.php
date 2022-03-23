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
	<link rel="stylesheet" type="text/css" href="soal_edit.css">
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
		<h2>Halaman Edit Soal</h2>
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
							echo "<p>Soal Berhasil Diupdate</p>";
						}			
					}
				?>
			</div>
			<?php
	    		include 'koneksi.php';
	    		$id = $_GET['id'];
		    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$id'");
		    	$no = 1;
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		    ?>
			<form method="post" action="soal_update.php">
				<a class="kembali" href="soal_menu.php"> Kembali </a>
				<input style="display: none;" type="text" name="id" <?php echo "value='$data[id_soal]'"; ?>>
				<div class="form-row">
					<div class="form-label">
						<label for="nomor">Nomor :</label>
					</div>
					<div class="form-control">
						<input type="text" name="nomor" <?php echo "value='$data[nomor]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="tipe">Tipe :</label>
					</div>
					<div class="form-control">
						<select id="tipe" name="tipe" >
							<option <?php if ("$data[tipe]"=="Realistik") {
			        			echo "value='$data[tipe]' selected";
			        		}?>> Realistik </option>
			        		<option <?php if ("$data[tipe]"=="Investigatif") {
			        			echo "value='$data[tipe]' selected";
			        		}?>> Investigatif </option>
			        		<option <?php if ("$data[tipe]"=="Artistik") {
			        			echo "value='$data[tipe]' selected";
			        		}?>> Artistik </option>
			        		<option <?php if ("$data[tipe]"=="Sosial") {
			        			echo "value='$data[tipe]' selected";
			        		}?>> Sosial </option>
			        		<option <?php if ("$data[tipe]"=="Enterpris") {
			        			echo "value='$data[tipe]' selected";
			        		}?>> Enterpris </option>
			        		<option <?php if ("$data[tipe]"=="Konvensional") {
			        			echo "value='$data[tipe]' selected";
			        		}?>> Konvensional </option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="pertanyaan">Pertanyaan :</label>
					</div>
					<div class="form-control">
						<input type="text" name="pertanyaan" <?php echo "value='$data[pertanyaan]'"; ?> >
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