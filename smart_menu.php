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
	<link rel="stylesheet" type="text/css" href="smart_menu.css">
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
		<h2>Halaman Kelola SMART</h2>
		<div class="alert">
			<?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert']=='hapus_alternatif') {
						$alternatif = $_GET['alternatif'];
						echo "<p>Alternatif $alternatif berhasil dihapus</p>";
					}
				}
			?>
		</div>
		<a class="kembali" href="index.php"> Kembali </a>
		<a class="kembali" href="#kriteria"> Kriteria </a>
		<a class="kembali" href="#alternatif"> Alternatif </a>

		<h2 id="kriteria">Kriteria SMART</h2>
		<!-- <a class="tambah" href="smt-kriteria_tambah.php"> Tambah </a> -->
		<table>
		    <thead>
		        <tr>
		        	<th>No.</th>
		         	<th>Kriteria</th>
		         	<th>Bobot</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM smt_kriteria");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$no.</td>";
					   	echo "<td>$data[kriteria]</td>";
					   	echo "<td>$data[bobot]</td>";
						echo "<td>
								<a class='edit' href='smt-kriteria_edit.php?id=$data[id_kriteria]' role='button'> Edit </a>
								
							</td>";
					   	echo "</tr>";
						$no++;
					}
			    ?>
	    	</tbody>
		</table>

		<h2 id="alternatif">Alternatif SMART</h2>
		<a class="tambah" href="smt-alternatif_tambah.php"> Tambah </a>
		<table>
		    <thead>
		        <tr>
		        	<th>No.</th>
		         	<th>Alternatif</th>
		         	<?php
			   //  		include 'koneksi.php';	    		
				  //   	$query = mysqli_query($koneksi, "SELECT * FROM smt_kriteria");
				  //   	$no = 1;
						// while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						// 	echo "<th>$data[kriteria]</th>";
						// 	$no++;
						// }
				    ?>
		         	<th>R</th>
		         	<th>I</th>
		         	<th>A</th>
		         	<th>S</th>
		         	<th>E</th>
		         	<th>C</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM smt_alternatif");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$no.</td>";
					   	echo "<td>$data[alternatif]</td>";
				    	$query2 = mysqli_query($koneksi, "SELECT * FROM smt_data WHERE id_alternatif='$data[id_alternatif]'");
				    	$no2 = 1;
					   	while ($data2 = mysqli_fetch_array($query2,MYSQLI_ASSOC)) {
						   	echo "<td>$data2[nilai]</td>";
						   	$no2++;
					   	}
						echo "<td>
								<a class='edit' href='smt-alternatif_edit.php?id=$data[id_alternatif]' role='button'> Edit </a>
								<a class='hapus' href='smt-alternatif_hapus.php?id=$data[id_alternatif]' role='button'> Hapus </a>
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