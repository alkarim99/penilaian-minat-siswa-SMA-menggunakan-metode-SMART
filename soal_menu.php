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
	<link rel="stylesheet" type="text/css" href="soal_menu.css">
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
		<h2>Halaman Kelola Soal</h2>
		<div class="alert">
			<?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert']=='hapus') {
						$nomor = $_GET['nomor'];
						$tipe = $_GET['tipe'];
						echo "<p>Soal tipe $tipe, nomor $nomor berhasil dihapus</p>";
					}
				}
			?>
		</div>
		<a class="kembali" href="index.php"> Kembali </a>
		<a class="tambah" href="soal_tambah.php"> Tambah </a>

		<h1>Soal Tipe Realistik</h1>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		        	<th class="tipe">Tipe</th>
		         	<th>Pertanyaan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Realistik' ORDER BY nomor");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$data[nomor].</td>";
					   	echo "<td>$data[tipe]</td>";
					   	echo "<td>$data[pertanyaan]</td>";
						echo "<td>
								<a class='' href='soal_edit.php?id=$data[id_soal]' role='button'> Edit </a>
								<a class='' href='soal_hapus.php?id=$data[id_soal]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
					   	$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h1>Soal Tipe Investigatif</h1>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		        	<th class="tipe">Tipe</th>
		         	<th>Pertanyaan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Investigatif' ORDER BY nomor");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$data[nomor].</td>";
					   	echo "<td>$data[tipe]</td>";
					   	echo "<td>$data[pertanyaan]</td>";
						echo "<td>
								<a class='' href='soal_edit.php?id=$data[id_soal]' role='button'> Edit </a>
								<a class='' href='soal_hapus.php?id=$data[id_soal]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
					   	$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h1>Soal Tipe Artistik</h1>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		        	<th class="tipe">Tipe</th>
		         	<th>Pertanyaan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Artistik' ORDER BY nomor");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$data[nomor].</td>";
					   	echo "<td>$data[tipe]</td>";
					   	echo "<td>$data[pertanyaan]</td>";
						echo "<td>
								<a class='' href='soal_edit.php?id=$data[id_soal]' role='button'> Edit </a>
								<a class='' href='soal_hapus.php?id=$data[id_soal]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
					   	$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h1>Soal Tipe Sosial</h1>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		        	<th class="tipe">Tipe</th>
		         	<th>Pertanyaan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Sosial' ORDER BY nomor");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$data[nomor].</td>";
					   	echo "<td>$data[tipe]</td>";
					   	echo "<td>$data[pertanyaan]</td>";
						echo "<td>
								<a class='' href='soal_edit.php?id=$data[id_soal]' role='button'> Edit </a>
								<a class='' href='soal_hapus.php?id=$data[id_soal]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
					   	$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h1>Soal Tipe Enterpris</h1>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		        	<th class="tipe">Tipe</th>
		         	<th>Pertanyaan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Enterpris' ORDER BY nomor");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$data[nomor].</td>";
					   	echo "<td>$data[tipe]</td>";
					   	echo "<td>$data[pertanyaan]</td>";
						echo "<td>
								<a class='' href='soal_edit.php?id=$data[id_soal]' role='button'> Edit </a>
								<a class='' href='soal_hapus.php?id=$data[id_soal]' role='button'> Hapus </a>
							</td>";
					   	echo "</tr>";
					   	$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h1>Soal Tipe Konvensional</h1>
		<table>
		    <thead>
		        <tr>				          
		        	<th class="no">No.</th>
		        	<th class="tipe">Tipe</th>
		         	<th>Pertanyaan</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM soal WHERE tipe='Konvensional' ORDER BY nomor");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$data[nomor].</td>";
					   	echo "<td>$data[tipe]</td>";
					   	echo "<td>$data[pertanyaan]</td>";
						echo "<td>
								<a class='' href='soal_edit.php?id=$data[id_soal]' role='button'> Edit </a>
								<a class='' href='soal_hapus.php?id=$data[id_soal]' role='button'> Hapus </a>
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