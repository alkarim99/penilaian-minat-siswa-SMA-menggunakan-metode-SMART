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
	<link rel="stylesheet" type="text/css" href="kode_menu.css">
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
		<h2>Halaman Kelola Kode</h2>
		<div class="alert">
			<?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert']=='hapus') {
						$kode = $_GET['kode'];
						echo "<p>Kode $kode berhasil dihapus</p>";
					}
					elseif ($_GET['alert']=='hapus1') {
						$nama = $_GET['nama'];
						echo "<p>Kode Satuan $nama berhasil dihapus</p>";
					}
				}
			?>
		</div>
		<a class="" href="index.php"> Kembali </a>
		<a class="" href="#satuan"> Kode & Jurusan </a>
		<a class="" href="#jurusan"> Kode & Jurusan </a>

		<h2 id="satuan">Kelola Kode dan Keterangan</h2>
		<a class="" href="kode-satuan_tambah.php"> Tambah </a>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		         	<th class="kode">Kode</th>
		         	<th>Nama Kode</th>
		         	<th>Keterangan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM kode_satuan ORDER BY id_kode1");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$no.</td>";
					   	echo "<td>$data[kode_huruf]</td>";
					   	echo "<td>$data[nama_kode]</td>";
					   	echo "<td>$data[keterangan]</td>";
						echo "<td>
								<a class='' href='kode-satuan_edit.php?id=$data[id_kode1]' role='button'> Edit </a>
								<a class='' href='kode-satuan_hapus.php?id=$data[id_kode1]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
						$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h2 id="jurusan">Kelola Kode dan Jurusan</h2>
		<a class="" href="kode_tambah.php"> Tambah </a>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		         	<th class="kode">Kode</th>
		         	<th>Jurusan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM kode ORDER BY kode");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$no.</td>";
					   	echo "<td>$data[kode]</td>";
					   	echo "<td>$data[jurusan]</td>";
						echo "<td>
								<a class='' href='kode_edit.php?id=$data[id_kode]' role='button'> Edit </a>
								<a class='' href='kode_hapus.php?id=$data[id_kode]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
						$no++;
					}
			    ?>
	    	</tbody>
		</table>
	</div>
</body>
</html>