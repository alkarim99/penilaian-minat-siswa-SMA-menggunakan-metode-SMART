<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="hasil.css">
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
		<a class="kembali" href="index.php"> Kembali </a><br>
		<h1>Halaman Kumpulan Hasil Tes Riasec</h1>
		<div class="alert">
			<?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert']=='hapus') {
						echo "<p>Hasil Berhasil Dihapus</p>";
					}
				}
			?>
		</div>
	
		<?php
			$id = $_SESSION['id'];
			$query = mysqli_query($koneksi, "SELECT * FROM hasil WHERE id_user = '$id' ORDER BY id_hasil");
			$cek = mysqli_num_rows($query);

			if ($cek>0) {
		?>
				<table>
				    <thead>
				        <tr>				          
				        	<th class="no">Tes Ke</th>
				        	<th class="waktu">Waktu</th>
				        	<th class="kode">Kode</th>
				         	<th>Jurusan</th>
				         	<th class="aksi">Aksi</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php
					    	$no = 1;
							while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
								echo "<tr>";
							   	echo "<td>$no</td>";
							   	echo "<td>$data[tanggaltes]</td>";
							   	echo "<td>$data[kode]</td>";
								$query_2 = mysqli_query($koneksi, "SELECT * FROM kode WHERE kode = '$data[kode]'");
								$cek_2 = mysqli_num_rows($query_2);
								$data_2 = mysqli_fetch_array($query_2,MYSQLI_ASSOC);
								if ($cek_2>0) {
									echo "<td>$data_2[jurusan]</td>";
								}
								else{
									echo "<td>Tidak Ditemukan Jurusan dengan Kode $data[kode]</td>";
								}
								echo "<td>
										<a class='' href='hasil_rinci.php?id=$data[id_hasil]' role='button'> Rincian </a>
										<a class='' href='hasil_hapus.php?id=$data[id_hasil]' role='button'> Hapus </a>
									</td>";
							   	echo "</tr>";
							   	$no++;
							}
					    ?>
			    	</tbody>
				</table>
		<?php 
			}
			else{
				echo "
					Anda Belum Melaksanakan Tes RIASEC, Silahkan Tes Terlebih Dahulu
					<a class='tes' href='panduan.php'> Mulai Tes </a><br>
				";
			}
		?>
	</div>