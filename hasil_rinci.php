<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="hasil_rinci.css">
</head>
<body>
	<div class="navbar">
		<a href="index.php"><h1>Aplikasi Penelusuran Minat</h1></a>
		<?php
			session_start();
			date_default_timezone_set('Asia/Jakarta');
			$waktu_selesai = date('H:i:s');
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
		<h1>Halaman Hasil Tes Riasec</h1>
		<?php
			if (isset($_GET['id'])) {
				$id_hasil = $_GET['id'];
			}
			$cari = mysqli_query($koneksi, "SELECT * FROM hasil WHERE id_hasil = '$id_hasil'");
			$data = mysqli_fetch_array($cari);
		?>
		<a class="kembali" href="hasil.php"> Kembali </a>
		<?php
			echo "<a class='download' href='hasil_download.php?id_hasil=$data[id_hasil]'> Download Hasil </a>";
		?>

		<div class="identitas">
			<div class="identitas-row">
				<p class="label">Nama: </p>
				<p class="data"><?php echo $_SESSION['nama']; ?></p>
			</div>
			<div class="identitas-row">
				<p class="label">Tanggal Lahir: </p>
				<p class="data"><?php echo $_SESSION['tanggallahir']; ?></p>
			</div>
			<div class="identitas-row">
				<p class="label">Tanggal Tes: </p>
				<p class="data"><?php echo $data['tanggaltes'] ?></p>
			</div>
			<div class="identitas-row">
				<p class="label">Durasi Tes: </p>
				<p class="data"><?php echo $data['durasi'];?></p>
			</div>
		</div>
		
		<?php
			$kode = $data['kode'];
			$kode1 = substr($kode, 0, 1);
			$kode2 = substr($kode, 1, 1);
			$kode3 = substr($kode, 2, 1);

			$kode_riasec = array('R', 'I', 'A', 'S', 'E', 'C');
			$kode_hasil = array($kode1, $kode2, $kode3);
			$kode_lain = array_diff($kode_riasec, $kode_hasil);
			$kode_lain2 = array();

			foreach ($kode_lain as $a => $b) {
				if ($b!='') {
					$kode_lain2[] = $b;
				}
			}

			$kode4 = $kode_lain2[0];
			$kode5 = $kode_lain2[1];
			$kode6 = $kode_lain2[2];

			$cari_kode1 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode1'");
			$data_kode1 = mysqli_fetch_array($cari_kode1);
			$cari_kode2 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode2'");
			$data_kode2 = mysqli_fetch_array($cari_kode2);
			$cari_kode3 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode3'");
			$data_kode3 = mysqli_fetch_array($cari_kode3);
			$cari_kode4 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode4'");
			$data_kode4 = mysqli_fetch_array($cari_kode4);
			$cari_kode5 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode5'");
			$data_kode5 = mysqli_fetch_array($cari_kode5);
			$cari_kode6 = mysqli_query($koneksi, "SELECT * FROM kode_satuan WHERE kode_huruf='$kode6'");
			$data_kode6 = mysqli_fetch_array($cari_kode6);
		?>

		<div class="hasil">
			<p class="kode1"><?php echo $kode1; ?></p>
			<p class="kode2"><?php echo $kode2; ?></p>
			<p class="kode3"><?php echo $kode3; ?></p>
		</div>

		<div class="keterangan-1">
			<h3>Tipe <?php echo $data_kode1['nama_kode']; ?></h3>
			<p><?php echo $data_kode1['keterangan']; ?></p>
		</div>
		<div class="keterangan-2">
			<h3>Tipe <?php echo $data_kode2['nama_kode']; ?></h3>
			<p><?php echo $data_kode2['keterangan']; ?></p>
		</div>
		<div class="keterangan-3">
			<h3>Tipe <?php echo $data_kode3['nama_kode']; ?></h3>
			<p><?php echo $data_kode3['keterangan']; ?></p>
		</div>
		<div class="keterangan-4">
			<h3>Tipe <?php echo $data_kode4['nama_kode']; ?></h3>
			<p><?php echo $data_kode4['keterangan']; ?></p>
		</div>
		<div class="keterangan-5">
			<h3>Tipe <?php echo $data_kode5['nama_kode']; ?></h3>
			<p><?php echo $data_kode5['keterangan']; ?></p>
		</div>
		<div class="keterangan-6">
			<h3>Tipe <?php echo $data_kode6['nama_kode']; ?></h3>
			<p><?php echo $data_kode6['keterangan']; ?></p>
		</div>
		
		<?php
			$cari = mysqli_query($koneksi, "SELECT * FROM kode WHERE kode = '$kode'");
			$cek = mysqli_num_rows($cari);
			$no = 1;
			echo "Jurusan yang sesuai: <br>";
			if ($cek>0) {
				$data = mysqli_fetch_array($cari,MYSQLI_ASSOC);
				$jurusan = "$data[jurusan]";
				echo $jurusan;
				// while($data = mysqli_fetch_array($cari,MYSQLI_ASSOC)){
				// 	$pekerjaan = "$data[pekerjaan]";
				// 	echo "- ".$pekerjaan; echo "<br>";
				// }
			}
			else{
				echo "Tidak Ditemukan Jurusan dengan Kode ".$kode; echo "<br>";
			}
		?>
	</div>
</body>
</html>