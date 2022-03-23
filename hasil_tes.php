<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="hasil_tes.css">
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
	<?php
		$datetime1 = new DateTime($_POST['waktu_mulai']);//start time
		$datetime2 = new DateTime($waktu_selesai);//end time
		$durasi = $datetime1->diff($datetime2);	



		$r_iya = $r_tidak = $i_iya = $i_tidak = $a_iya = $a_tidak = $s_iya = $s_tidak = $e_iya = $e_tidak = $k_iya = $k_tidak = 0;
		
		$query = mysqli_query($koneksi, "SELECT * FROM soal ORDER BY tipe, nomor");
		while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
			$no = 1;
			$jwb = $_POST["$data[tipe]$data[nomor]"];
			if ("$data[tipe]"=='Realistik'){
				if ($jwb=='iya') {
					$r_iya = $r_iya + 1;
				}
				else{
					$r_tidak = $r_tidak + 1;
				}
			}
			if ("$data[tipe]"=='Investigatif'){
				if ($jwb=='iya') {
					$i_iya = $i_iya + 1;
				}
				else{
					$i_tidak = $i_tidak + 1;
				}
			}
			if ("$data[tipe]"=='Artistik'){
				if ($jwb=='iya') {
					$a_iya = $a_iya + 1;
				}
				else{
					$a_tidak = $a_tidak + 1;
				}
			}
			if ("$data[tipe]"=='Sosial'){
				if ($jwb=='iya') {
					$s_iya = $s_iya + 1;
				}
				else{
					$s_tidak = $s_tidak + 1;
				}
			}
			if ("$data[tipe]"=='Enterpris'){
				if ($jwb=='iya') {
					$e_iya = $e_iya + 1;
				}
				else{
					$e_tidak = $e_tidak + 1;
				}
			}
			if ("$data[tipe]"=='Konvensional'){
				if ($jwb=='iya') {
					$k_iya = $k_iya + 1;
				}
				else{
					$k_tidak = $k_tidak + 1;
				}
			}
			$no++;
		}

		$r = $r_iya / ($r_iya + $r_tidak);
		$i = $i_iya / ($i_iya + $i_tidak);
		$a = $a_iya / ($a_iya + $a_tidak);
		$s = $s_iya / ($s_iya + $s_tidak);
		$e = $e_iya / ($e_iya + $e_tidak);
		$c = $k_iya / ($k_iya + $k_tidak);

		if (($r==$i) and ($i==$a) and ($a==$s) and ($s==$e) and ($e==$c)) {
			$sama = true;
		}
		else{
			$sama = false;
			mysqli_query($koneksi, "UPDATE smt_kriteria SET bobot='$r' WHERE id_kriteria='1' ");
			mysqli_query($koneksi, "UPDATE smt_kriteria SET bobot='$i' WHERE id_kriteria='2' ");
			mysqli_query($koneksi, "UPDATE smt_kriteria SET bobot='$a' WHERE id_kriteria='3' ");
			mysqli_query($koneksi, "UPDATE smt_kriteria SET bobot='$s' WHERE id_kriteria='4' ");
			mysqli_query($koneksi, "UPDATE smt_kriteria SET bobot='$e' WHERE id_kriteria='5' ");
			mysqli_query($koneksi, "UPDATE smt_kriteria SET bobot='$c' WHERE id_kriteria='6' ");

			//-- query untuk mendapatkan semua data kriteria di tabel smt_kriteria
			$sql = 'SELECT * FROM smt_kriteria';
			$result = $koneksi->query($sql);
			//-- menyiapkan variable penampung berupa array
			$kriteria=array();
			//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
			while ($row = $result->fetch_assoc()) {
			    $kriteria[$row['id_kriteria']]=array($row['kriteria'],$row['bobot']);
			}

			//-- query untuk mendapatkan semua data kriteria di tabel smt_alternatif
		    $sql = 'SELECT * FROM smt_alternatif';
		    $result = $koneksi->query($sql);
		    //-- menyiapkan variable penampung berupa array
		    $alternatif=array();
		    //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
		    while($row=$result->fetch_assoc()) {
		        $alternatif[$row['id_alternatif']]=$row['alternatif'];
		    }

		    //-- query untuk mendapatkan semua data sample penilaian di tabel smt_data
		    $sql = 'SELECT * FROM smt_data ORDER BY id_alternatif,id_kriteria';
		    $result = $koneksi->query($sql);
		    //-- menyiapkan variable penampung berupa array
		    $sample=array();
		    //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
		    while($row=$result->fetch_assoc()) {
		        //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
		        //-- $row['id_alternatif'] adalah id kandidat/alternatif
		        if (!isset($sample[$row['id_alternatif']])) {
		            $sample[$row['id_alternatif']] = array();
		        }
		        $sample[$row['id_alternatif']][$row['id_kriteria']] = $row['nilai'];
		    }

		    //-- inisialisasi variabel array bobot
		    $bobot=array();
		    foreach($kriteria as $k=>$vk){
		        $bobot[$k]=$vk["1"];
		    }
		    //-- menghitung nilai total bobot
		    $jml_bobot=array_sum($bobot);
		    //-- inisialisasi variabel array w (bobot ternormalisasi)
		    $w=array();
		    //-- normalisasi bobot
		    foreach($bobot as $k=>$b){
		        $w[$k]=$b/$jml_bobot;
		    }

		    //-- inisialisasi variabel array tranpose_d untuk menyimpan data tranpose dari data sample
		    $tranpose_d=array();
		    foreach($alternatif as $a=>$v){
		        foreach($kriteria as $k=>$v_k){
		            if(!isset($tranpose_d[$k]))$tranpose_d[$k]=array();
		            $tranpose_d[$k][$a]=$sample[$a][$k];
		        }
		    }
		    //-- inisialisasi variabel array c_max dan c_min 
		    $c_max=array();
		    $c_min=array();
		    //-- mencari nilai max dan min utk tiap-tiap kriteria
		    foreach($kriteria as $k=>$v){
		        $c_max[$k]=max($tranpose_d[$k]);
		        $c_min[$k]=min($tranpose_d[$k]);
		    }
		    //-- inisialisasi variabel array U
		    $U=array();
		    //-- menghitung nilai utility utk masing-masing alternatif dan kriteria
		    foreach($kriteria as $k=>$v){
		        foreach($alternatif as $a=>$a_v){
		            if(!isset($U[$a])) $U[$a]=array();
		            $U[$a][$k]=($sample[$a][$k]-$c_min[$k])/($c_max[$k]-$c_min[$k]);
		        }
		    }

		    //-- inisialisasi variabel array V
		    $V=array();
		    //-- melakukan iterasi utk setiap alternatif 
		    foreach($U as $a=>$a_u){
		        $V[$a]=0;
		        //-- perhitungan nilai Preferensi V untuk tiap-tiap kriteria
		        foreach($a_u as $k=>$u){
		            $V[$a]+=$u*$w[$k];
		        }
		    }

		    //--mengurutkan data secara descending dengan tetap mempertahankan key/index array-nya 
		    arsort($V); 
		    //-- mendapatkan key/index item array yang pertama 
		    $index=key($V); 
		    //-- menampilkan hasil akhir: 
		    // echo "Hasilnya adalah alternatif <b>{$alternatif[$index]}</b> "; 
		    // echo "dengan nilai akhir <b>{$V[$index]}</b> yang terpilih";
			
			$kode = $alternatif[$index];
			
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
			
			$tanggal = $_POST['tanggal'];
			$durasisimpan = $durasi->format('%h:%i:%s');
			$id = $_SESSION['id'];
			if ($sama==false) {
				mysqli_query($koneksi, "INSERT INTO hasil (id_user, tanggaltes, R, I, A, S, E, C, kode, durasi) VALUES ('$id', '$tanggal', '$r', '$i', '$a', '$s', '$e', '$c', '$kode', '$durasisimpan')");
			}
		}
	?>

	<div class="content">
		<h1>Halaman Hasil Tes Riasec</h1>
		<a class="kembali" href="index.php"> Kembali </a>
		<a class="kembali" href="hasil.php"> Hasil </a>

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
				<p class="data"><?php echo $_POST['tanggaltes'] ?></p>
			</div>
			<div class="identitas-row">
				<p class="label">Durasi Tes: </p>
				<p class="data"><?php echo $durasi->format('%h jam %i menit %s detik')?></p>
			</div>
		</div>

		<?php 
			if ($sama==true) {
				echo "<h1>Tidak Dapat Ditentukan Minat, Silahkan Tes Ulang</h1> <a class='ulang' href='tes_ulang.php' role='button'> Tes Ulang RIASEC </a>";
			}
			else{
		?>
			<div class="hasil">
				<p class="kode1"><?php echo $kode1;?></p>
				<p class="kode2"><?php echo $kode2;?></p>
				<p class="kode3"><?php echo $kode3;?></p>
			</div>

			<?php
				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$kode1'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";

				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$kode2'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";

				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$kode3'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";

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
				echo "<br>";
				echo "<h5>3 Kode Lainnya : </h5>";
				
				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$kode4'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";

				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$kode5'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";

				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$kode6'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";
			?>

		<?php
			}
		?>
	</div>
</body>
</html>