<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="tes.css">
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
									<li><a href='user_edit.php'>Profil</a></li><hr>
									<li><a href='hasil.php'>Lihat Hasil</a></li><hr>
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
		<?php
			$id = $_SESSION['id'];
			$query = mysqli_query($koneksi, "SELECT * FROM hasil WHERE id_user = '$id'");
			$cek = mysqli_num_rows($query);
			$data = mysqli_fetch_array($query);
			if ($cek>0) {
				$id_hasil = "$data[id_hasil]";
				echo "Anda sudah mengerjakan tes RIASEC <a class='hasil' href='hasil.php' role='button'> Lihat Hasil </a> <br>
					Anda ingin mengerjakan ulang tes RIASEC? <a class='ulang' href='tes_ulang.php' role='button'> Tes Ulang RIASEC </a>
				";
			}
			else{
		?>
		<h1>Halaman Tes Riasec</h1>
		<a class="kembali" href="panduan.php"> Kembali </a>
		<form method="post" action="hasil_tes.php">
			<?php
				include 'koneksi.php';
				date_default_timezone_set('Asia/Jakarta');
				$tanggaltes = date('l, d M Y');
				$tanggal = date('Y-m-d');
				$waktu_mulai = date('H:i:s');
			?>
				<input style="display: none;" type="text" name="waktu_mulai" <?php echo "value= '$waktu_mulai'"; ?>>
				<input style="display: none;" type="text" name="tanggaltes" <?php echo "value= '$tanggaltes'"; ?>>
				<input style="display: none;" type="text" name="tanggal" <?php echo "value= '$tanggal'"; ?>>
			<?php
			  	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Realistik' ORDER BY nomor");
			  	$no = 1;
			  	echo "
					<div class='form-row'>
						<h3>Realistik</h3>
					</div>
					";
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					echo "
						<div class='form-row'>
							<div class='form-question'>
								<p>$data[nomor]. $data[pertanyaan]</p>
							</div>
							<div class='form-answer'>
								<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya' required>
								<label for='iya$data[tipe]$data[nomor]'>Iya</label>
							</div>
							<div class='form-answer'>
								<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak' required>
								<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
							</div>
						</div>
					";
					$no++;
				}
				$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Investigatif' ORDER BY nomor");
			  	$no = 1;
			  	echo "
					<div class='form-row'>
						<h3>Investigatif</h3>
					</div>
					";
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					echo "
						<div class='form-row'>
							<div class='form-question'>
								<p>$data[nomor]. $data[pertanyaan]</p>
							</div>
							<div class='form-answer'>
								<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya' required>
								<label for='iya$data[tipe]$data[nomor]'>Iya</label>
							</div>
							<div class='form-answer'>
								<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak' required>
								<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
							</div>
						</div>
					";
					$no++;
				}
				$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Artistik' ORDER BY nomor");
			  	$no = 1;
			  	echo "
					<div class='form-row'>
						<h3>Artistik</h3>
					</div>
					";
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					echo "
						<div class='form-row'>
							<div class='form-question'>
								<p>$data[nomor]. $data[pertanyaan]</p>
							</div>
							<div class='form-answer'>
								<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya' required>
								<label for='iya$data[tipe]$data[nomor]'>Iya</label>
							</div>
							<div class='form-answer'>
								<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak' required>
								<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
							</div>
						</div>
					";
					$no++;
				}
				$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Sosial' ORDER BY nomor");
			  	$no = 1;
			  	echo "
					<div class='form-row'>
						<h3>Sosial</h3>
					</div>
					";
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					echo "
						<div class='form-row'>
							<div class='form-question'>
								<p>$data[nomor]. $data[pertanyaan]</p>
							</div>
							<div class='form-answer'>
								<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya' required>
								<label for='iya$data[tipe]$data[nomor]'>Iya</label>
							</div>
							<div class='form-answer'>
								<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak' required>
								<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
							</div>
						</div>
					";
					$no++;
				}
				$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Enterpris' ORDER BY nomor");
			  	$no = 1;
			  	echo "
					<div class='form-row'>
						<h3>Enterpris</h3>
					</div>
					";
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					echo "
						<div class='form-row'>
							<div class='form-question'>
								<p>$data[nomor]. $data[pertanyaan]</p>
							</div>
							<div class='form-answer'>
								<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya' required>
								<label for='iya$data[tipe]$data[nomor]'>Iya</label> 
							</div>
							<div class='form-answer'>
								<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak' required>
								<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
							</div>
						</div>
					";
					$no++;
				}
				$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Konvensional' ORDER BY nomor");
			  	$no = 1;
			  	echo "
					<div class='form-row'>
						<h3>Konvensional</h3>
					</div>
					";
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
					echo "
						<div class='form-row'>
							<div class='form-question'>
								<p>$data[nomor]. $data[pertanyaan]</p>
							</div>
							<div class='form-answer'>
								<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya' required>
								<label for='iya$data[tipe]$data[nomor]'>Iya</label>
							</div>
							<div class='form-answer'>
								<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak' required>
								<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
							</div>
						</div>
					";
					$no++;
				}
			?>
			<div class="form-row">
				<button class="submit" type="submit" name="submit">Submit</button>
			</div>
		<?php } ?>
		</form>
	</div>
</body>
</html>