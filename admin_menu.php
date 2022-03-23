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
	<link rel="stylesheet" type="text/css" href="admin_menu.css">
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
		<h2>Halaman Kelola Admin</h2>
		<div class="alert">
			<?php
				if (isset($_GET['alert'])) {
					if ($_GET['alert']=='hapus') {
						$nama = $_GET['nama'];
						echo "<p>Admin $nama berhasil dihapus</p>";
					}
					elseif ($_GET['alert']=='berhasil') {
						echo "<p>Admin berhasil ditambah</p>";
					}
				}
			?>
		</div>
		<a class="kembali" href="index.php"> Kembali </a>
		<a class="tambah" href="admin_tambah.php"> Tambah </a>
		<table>
		    <thead>
		        <tr>				          
		        	<th>No.</th>
		         	<th>Id</th>
		         	<th>Email</th>
		         	<th>Nama</th>
		         	<th class="aksi">Aksi</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		$id_user = $_SESSION['id'];
		    		include 'koneksi.php';	    		
			    	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE peran='admin' AND id_user!='$id_user' ");
			    	$no = 1;
					while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
						echo "<tr>";
					   	echo "<td>$no.</td>";
					   	echo "<td>$data[id_user]</td>";
					   	echo "<td>$data[email]</td>";
					   	echo "<td>$data[nama]</td>";
						echo "<td>
								<a class='edit' href='admin_edit.php?id=$data[id_user]' role='button'> Edit </a>
								<a class='hapus' href='admin_hapus.php?id=$data[id_user]' role='button'> Hapus </a>
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