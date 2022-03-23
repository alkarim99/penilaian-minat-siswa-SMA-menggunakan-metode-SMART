<?php
	include 'koneksi.php';	    		
  	$query = mysqli_query($koneksi, "SELECT * FROM soal ORDER BY tipe, nomor");
  	$no = 1;
	while($data = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		echo "
			<div class='form-row'>
				<div class='form-question'>
					<p>$data[pertanyaan]</p>
				</div>
				<div class='form-answer'>
					<input type='radio' id='iya$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='iya'>
					<label for='iya$data[tipe]$data[nomor]'>Iya</label>
				</div>
				<div class='form-question'>
					<input type='radio' id='tidak$data[tipe]$data[nomor]' name='$data[tipe]$data[nomor]' value='tidak'>
					<label for='tidak$data[tipe]$data[nomor]'>Tidak</label>
				</div>
			</div>
		";
		$no++;
	}
?>

AND id_user NOT IN ('$_SESSION['id']')

<div class="form-row">
	<div class="form-question">
		<p>Apakah Suka Olahraga Badminton?</p>
	</div>
	<div class="form-answer">
		<input type="radio" id="iyarealistik1" name="realistik1" value="iya">
		<label for="iyarealistik1">Iya</label>
	</div>
	<div class="form-answer">
		<input type="radio" id="tidakrealistik1" name="realistik1" value="tidak">
		<label for="tidakrealistik1">Tidak</label>
	</div>
</div>
<div class="form-row">
	<button class="submit" type="submit" name="submit">Submit</button>
</div>

// $hasil = array(
// 	array("R",$r),
// 	array("I",$i),
// 	array("A",$a),
// 	array("S",$s),
// 	array("E",$e),
// 	array("C",$c),
// );

// arsort($hasil);
// array_multisort($hasil,SORT_DESC);

// echo "Tipe Pertama = ".$hasil[0][0]." dengan Nilai ".$hasil[0][1]; echo "<br>";
// echo "Tipe Kedua = ".$hasil[1][0]." dengan Nilai ".$hasil[1][1]; echo "<br>";
// echo "Tipe Ketiga = ".$hasil[2][0]." dengan Nilai ".$hasil[2][1]; echo "<br>";
// echo "Tipe Keempat = ".$hasil[3][0]." dengan Nilai ".$hasil[3][1]; echo "<br>";
// echo "Tipe Kelima = ".$hasil[4][0]." dengan Nilai ".$hasil[4][1]; echo "<br>";
// echo "Tipe Keenam = ".$hasil[5][0]." dengan Nilai ".$hasil[5][1]; echo "<br>";

// for ($i=0; $i < 3; $i++) { 
// 	echo $hasil[$i];
// }

// foreach ($hasil as $x => $x_value) {
// 	echo "Tipe = ".$x.", Nilai = ".$x_value;
// 	echo "<br>";
// }

<div>
	<table style="border: solid black 1px;">
	    <thead>
	        <tr>
	        	<th>Soal</th>
	         	<th>Jawaban</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
			    foreach ($jawaban as $x => $x_value) {
					echo "<tr>
						<td>".$x."</td>
						<td>".$x_value."</td>
					</tr>";
				}
			?>
    	</tbody>
	</table>
</div>
<div>
	<table style="border: solid black 1px;">
	    <thead>
	        <tr>
	        	<th>Tipe</th>
	         	<th>Nilai</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
			    foreach ($hasil_hitung as $x => $x_value) {
				echo "<tr>
						<td>".$x."</td>
						<td>".$x_value."</td>
					</tr>";
				}
			?>
    	</tbody>
	</table>
</div>

$jawaban = array(
	'r_iya' => $r_iya,
	'r_tidak' => $r_tidak,
	'i_iya' => $i_iya,
	'i_tidak' => $i_tidak,
	'a_iya' => $a_iya,
	'a_tidak' => $a_tidak,
	's_iya' => $s_iya,
	's_tidak' => $s_tidak,
	'e_iya' => $e_iya,
	'e_tidak' => $e_tidak,
	'k_iya' => $k_iya,
	'k_tidak' => $k_tidak, 
);

<div class="menu">
	<ul>
		<li><a href="user_edit.php">Profil</a></li>
		<li><a href="index.php">Hasil Tes</a></li>
	</ul>
</div>
.container .form .menu{
	position: relative;
	left: 3%;
	/*background-color: green;*/
	width: 350px;
	margin: 0 auto;
}
.container .form .menu ul{
	/*background-color: skyblue;*/
	margin: 0;
}
.container .form .menu ul li{
	display: inline-block;
}
.container .form .menu ul li a{
	position: relative;
	border-radius: 15px;
	background-color: #A3D2CA;
	color: black;
	text-decoration: none;
	padding: 10px 40px;
}
.container .form .menu ul li a:hover{
	background-color: #5EAAA8;
}

<?php
	$id_user;
	$tanggaltes;
	$durasi;
	$kode;
	$kode1;
	$kode2;
	$kode3;
	$nama;
	$tanggallahir;
	nama_kode;
	keterangan;
	pekerjaan;
	jurusan;
?>

<form method="post" action="hasil_download.php" style="display:none;">
	<input type="text" name="id_user" <?php echo "value= '$id'"; ?>>
	<input type="text" name="tanggaltes" <?php echo "value= '$tanggal'"; ?>>
	<input type="text" name="durasi" <?php echo "value= '$durasisimpan'"; ?>>
	<input type="text" name="kode" <?php echo "value= '$kode'"; ?>>
	<input type="text" name="kode1" <?php echo "value= '$kode1'"; ?>>
	<input type="text" name="kode2" <?php echo "value= '$kode2'"; ?>>
	<input type="text" name="kode3" <?php echo "value= '$kode3'"; ?>>
</form>

	<h1>Halaman Hasil Tes Riasec</h1>
	<a class="kembali" href="index.php"> Kembali </a>
	<a class="download" href='hasil_download.php'> Download Hasil </a>
	<?php
		$datetime1 = new DateTime($_POST['waktu_mulai']);//start time
		$datetime2 = new DateTime($waktu_selesai);//end time
		$durasi = $datetime1->diff($datetime2);	
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
			<p class="data"><?php echo $_POST['tanggaltes'] ?></p>
		</div>
		<div class="identitas-row">
			<p class="label">Durasi Tes: </p>
			<p class="data"><?php echo $durasi->format('%h jam %i menit %s detik')?></p>
		</div>
	</div>

	<div class="hasil">
		<p class="kode1"><?php echo $kode1;?></p>
		<p class="kode2"><?php echo $kode2;?></p>
		<p class="kode3"><?php echo $kode3;?></p>
	</div>

	<?php
		$q = 0;
		foreach ($hasil_hitung as $x => $x_value) {
			if ($q<3) {
				$cari = mysqli_query($koneksi,"SELECT * FROM kode_satuan WHERE kode_huruf = '$x'");
				$data = mysqli_fetch_array($cari);
				echo "<div>";
				echo "<h3>".$data['nama_kode']."</h3>";
				echo "<p>".$data['keterangan']."</p>";
				echo "</div>";
			}
			$q++;
		}
		$cari = mysqli_query($koneksi, "SELECT * FROM kode WHERE kode = '$kode'");
		$cek = mysqli_num_rows($cari);
		$no = 1;
		echo "Pekerjaan yang sesuai: <br>";
		if ($cek>0) {
			while($data = mysqli_fetch_array($cari,MYSQLI_ASSOC)){
				// $jurusan = "$data[jurusan]";
				$pekerjaan = "$data[pekerjaan]";
				echo "- ".$pekerjaan; echo "<br>";
			}
			// echo $jurusan; echo "<br>";
		}
		else{
			echo "Tidak Ditemukan Jurusan dengan Kode ".$kode; echo "<br>";
		}
	?>
<?php 
include 'koneksi.php';

	if (($_POST['username']!='') and ($_POST['password']!='') and ($_POST['nama']!='') and ($_POST['email']!='') and ($_POST['tempatlahir']!='') and ($_POST['tanggallahir']!='') and ($_FILES['foto']['name']!='')) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tempatlahir = $_POST['tempatlahir'];
		$tanggallahir = $_POST['tanggallahir'];

		$rand = rand();
		$ekstensi = array('png', 'jpg', 'jpeg', 'gif');	
		$filename = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		$cari = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
		$cek = mysqli_num_rows($cari);

		if ($cek>0) {
			header("location:user_tambah.php?alert=username_dobel");
		}
		else{
			if (!in_array($ext, $ekstensi)) {
				header("location:user_tambah.php?alert=gagal_ekstensi");
			}
			else{
				if ($ukuran<1044070) {
					$xx = $rand.'_'.$filename;
					move_uploaded_file($_FILES['foto']['tmp_name'], 'fotoprofil/'.$rand.'_'.$filename);
					mysqli_query($koneksi, "INSERT INTO user (peran, username, password, email, nama, tempatlahir, tanggallahir, foto) VALUES ('', '$username', '$password', '$email', '$nama', '$tempatlahir', '$tanggallahir', '$xx')");
					header("location:login.php?alert=berhasil");
				}
				else{
					header("location:user_tambah.php?alert=gagal_ukuran");
				}
			}
		}
	}
	else{
		header("location:user_tambah.php?alert=belum_lengkap");
	}
 ?>


 MACAM-MACAM TIPE MINAT:

1. TIPE REALISTIK (R)
Tipe realistik merupakan tipe seseorang yang menyukai aktivitas yang melibatkan kemampuan mekanis dan fisik. Kamu dapat menemukan mereka pada bidang konstruksi, kesehatan dan kebugaran, olahraga dan rekreasi, perbaikan, teknologi dan kegiatan yang serupa. Mereka lebih suka mengerjakan kegiatan menggunakan alat atau menggunakan tangan secara langsung serta berkegiatan di luar ruangan yang banyak petualangan. Mereka lebih berorientasi pada hasil yang nyata dan langsung.

2. TIPE INVESTIGATIF (I)
Tipe investigatif adalah tipe seseorang yang senang dengan kegiatan mengumpulkan, menganalisis, dan menafsirkan informasi, serta mengungkap fakta atau teori baru. Mereka lebih menyukai sesuatu yang berkaitan dengan ilmu pengetahuan dan memiliki rasa ingin tahu. Seseorang dengan tipe investigatif dapat kamu temui di lingkungan akademik atau penelitian yang memungkinkan mereka mengembangkan ide. Mereka lebih senang bekerja sendiri daripada dalam kelompok. Mereka dimotivasi oleh rasa ingin tahu, belajar, dan pengetahuan.

3. TIPE ARTISTIK (A)
Tipe artistik adalah tipe seseorang yang senang dengan nilai estetika dan membutuhkan ekspresi diri. Mereka kurang menyukai hal-hal yang sistematik, teratur, dan rutin. Mereka mengekspresikan diri dengan rekreasi atau kegiatan seni. Motivasi mereka adalah untuk mengekspresikan diri.

4. TIPE SOSIAL (S)
Tipe sosial adalah tipe seseorang yang senang dengan kegiatan yang bekerja dengan orang lain. Pekerjaan yang mereka lakukan biasanya dalam bidang pengajaran, konseling, dan layanan pelanggan. Seseorang dengan tipe sosial dapat kamu temui di lingkungan sosial, yang memungkinkan mereka untuk berinteraksi secara teratur dengan banyak orang, bekerja dalam kelompok, dan memecahkan masalah dengan berbagi pikiran dan perasaan. Motivasi mereka adalah dalam hal membantu orang banyak.

5. TIPE ENTERPRIS (E)
Tipe enterpris adalah tipe seseorang yang menyukai kegiatan dibidang mengelola, mengarahkan, atau membujuk orang lain dalam lingkungan bisnis atau perusahaan. Mereka mencari posisi kepemimpinan, kekuasaan, dan status serta senang membimbing orang lain menuju tujuan organisasi tertentu dan kesuksesan ekonomi. Mereka juga paling mungkin mengambil risiko pribadi dan keuangan. Mereka termotivasi oleh kemampuan mereka untuk membujuk orang lain.

6. TIPE KONVENSIONAL (C)
Tipe konvensional adalah tipe seseorang yang senang dengan kegiatan yang detail, organisasi, dan keakuratan data. Mereka sering menikmati kegiatan matematika dan manajemen data dan dapat ditemukan dalam pekerjaan seperti akuntansi, perbankan investasi, dan asuransi. Mereka senang menertibkan data, informasi, dan objek dan dimotivasi oleh tugas-tugas organisasi.