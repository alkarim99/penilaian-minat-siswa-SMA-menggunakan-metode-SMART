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
	<link rel="stylesheet" type="text/css" href="smt-alternatif_edit.css">
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
		<h2>Halaman Edit Alternatif</h2>
		<div class="form">
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='berhasil') {
							echo "<p>Alternatif Berhasil Diupdate</p>";
						}
						elseif ($_GET['alert']=='alternatif_dobel') {
							echo "<p>Alternatif sudah ada</p>";
						}
						elseif ($_GET['alert']=='belum_lengkap') {
							echo "<p>Data Alternatif Belum Lengkap!</p>";
						}
					}
				?>
			</div>
			<?php
	    		include 'koneksi.php';
	    		$id_alternatif = $_GET['id'];
		    	$query = mysqli_query($koneksi, "SELECT * FROM smt_alternatif WHERE id_alternatif='$id_alternatif'");

		    	$cariR = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$id_alternatif' and id_kriteria='1'");
		    	$cariI = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$id_alternatif' and id_kriteria='2'");
		    	$cariA = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$id_alternatif' and id_kriteria='3'");
		    	$cariS = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$id_alternatif' and id_kriteria='4'");
		    	$cariE = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$id_alternatif' and id_kriteria='5'");
		    	$cariC = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$id_alternatif' and id_kriteria='6'");

		    	$dataR = mysqli_fetch_array($cariR);
		    	$dataI = mysqli_fetch_array($cariI);
		    	$dataA = mysqli_fetch_array($cariA);
		    	$dataS = mysqli_fetch_array($cariS);
		    	$dataE = mysqli_fetch_array($cariE);
		    	$dataC = mysqli_fetch_array($cariC);

		    	$no = 1;
				while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		    ?>
			<form method="post" action="smt-alternatif_update.php">
				<a class="kembali" href="smart_menu.php"> Kembali </a>
				<input style="display: none;" type="text" name="id" <?php echo "value='$data[id_alternatif]'"; ?>>
				<div class="form-row">
					<div class="form-label">
						<label for="alternatif">Alternatif :</label>
					</div>
					<div class="form-control">
						<input type="text" id="alternatif" name="alternatif" <?php echo "value='$data[alternatif]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nilaiR">Nilai R :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nilaiR" name="nilaiR" <?php echo "value='$dataR[nilai]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nilaiI">Nilai I :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nilaiI" name="nilaiI" <?php echo "value='$dataI[nilai]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nilaiA">Nilai A :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nilaiA" name="nilaiA" <?php echo "value='$dataA[nilai]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nilaiS">Nilai S :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nilaiS" name="nilaiS" <?php echo "value='$dataS[nilai]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nilaiE">Nilai E :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nilaiE" name="nilaiE" <?php echo "value='$dataE[nilai]'"; ?> >
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="nilaiC">Nilai C :</label>
					</div>
					<div class="form-control">
						<input type="text" id="nilaiC" name="nilaiC" <?php echo "value='$dataC[nilai]'"; ?> >
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