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
	<link rel="stylesheet" type="text/css" href="kode_edit.css">
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
		<h2>Halaman Edit Kode</h2>
		<div class="form">
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='kode_dobel') {
							echo "<p>Kode sudah ada</p>";
						}
						elseif ($_GET['alert']=='tidakvalid') {
							echo "<p>Kode Tidak Valid, Kode 1, Kode 2, dan Kode 3 Tidak Boleh Sama</p>";
						}
						elseif ($_GET['alert']=='belum_lengkap') {
							echo "<p>Data Kode Belum Lengkap!</p>";
						}
						elseif ($_GET['alert']=='berhasil') {
							echo "<p>Kode Berhasil Diupdate</p>";
						}			
					}
				?>
			</div>
			<?php
	    		include 'koneksi.php';
	    		$id = $_GET['id'];
		    	$query = mysqli_query($koneksi, "SELECT * FROM kode WHERE id_kode='$id'");
		    	$no = 1;
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		    ?>
			<form method="post" action="kode_update.php">
				<a class="kembali" href="kode_menu.php"> Kembali </a>
				<input style="display: none;" type="text" name="id" <?php echo "value='$data[id_kode]'"; ?>>
				<div class="form-row">
					<select id="kode1" name="kode1" >
						<option value="">-Pilih Tipe 1-</option>
						<option <?php if ("$data[kode1]"=="R") {
		        			echo "value='R' selected";			        			
		        		}?> value="R">Realistik</option>
						<option <?php if ("$data[kode1]"=="I") {
		        			echo "value='I' selected";			        			
		        		}?> value="I">Investigatif</option>
						<option <?php if ("$data[kode1]"=="A") {
		        			echo "value='A' selected";			        			
		        		}?> value="A">Artistik</option>
						<option <?php if ("$data[kode1]"=="S") {
		        			echo "value='S' selected";			        			
		        		}?> value="S">Sosial</option>
						<option <?php if ("$data[kode1]"=="E") {
		        			echo "value='E' selected";			        			
		        		}?> value="E">Enterpris</option>
						<option <?php if ("$data[kode1]"=="C") {
		        			echo "value='C' selected";			        			
		        		}?> value="C">Konvensional</option>
					</select>
					
					<select id="kode2" name="kode2" >
						<option value="">-Pilih Tipe 2-</option>
						<option <?php if ("$data[kode2]"=="R") {
		        			echo "value='R' selected";			        			
		        		}?> value="R">Realistik</option>
						<option <?php if ("$data[kode2]"=="I") {
		        			echo "value='I' selected";			        			
		        		}?> value="I">Investigatif</option>
						<option <?php if ("$data[kode2]"=="A") {
		        			echo "value='A' selected";			        			
		        		}?> value="A">Artistik</option>
						<option <?php if ("$data[kode2]"=="S") {
		        			echo "value='S' selected";			        			
		        		}?> value="S">Sosial</option>
						<option <?php if ("$data[kode2]"=="E") {
		        			echo "value='E' selected";			        			
		        		}?> value="E">Enterpris</option>
						<option <?php if ("$data[kode2]"=="C") {
		        			echo "value='C' selected";			        			
		        		}?> value="C">Konvensional</option>
					</select>

					<select id="kode3" name="kode3" >
						<option value="">-Pilih Tipe 3-</option>
						<option <?php if ("$data[kode3]"=="R") {
		        			echo "value='R' selected";			        			
		        		}?> value="R">Realistik</option>
						<option <?php if ("$data[kode3]"=="I") {
		        			echo "value='I' selected";			        			
		        		}?> value="I">Investigatif</option>
						<option <?php if ("$data[kode3]"=="A") {
		        			echo "value='A' selected";			        			
		        		}?> value="A">Artistik</option>
						<option <?php if ("$data[kode3]"=="S") {
		        			echo "value='S' selected";			        			
		        		}?> value="S">Sosial</option>
						<option <?php if ("$data[kode3]"=="E") {
		        			echo "value='E' selected";			        			
		        		}?> value="E">Enterpris</option>
						<option <?php if ("$data[kode3]"=="C") {
		        			echo "value='C' selected";			        			
		        		}?> value="C">Konvensional</option>
					</select>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="jurusan">Jurusan :</label>
					</div>
					<div class="form-control">
						<input type="text" id="jurusan" name="jurusan" <?php echo "value='$data[jurusan]'"; ?> >
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