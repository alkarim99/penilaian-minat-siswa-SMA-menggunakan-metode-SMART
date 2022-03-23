<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="panduan.css">
</head>
<body>
	<?php
		session_start();
		include 'koneksi.php';
		if ($_SESSION['status']!='login') {
			header('location:login.php?alert=belum_login');
		}
		$id = $_SESSION['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM hasil WHERE id_user = '$id'");
		$cek = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		if ($cek>0) {
			$id_hasil = "$data[id_hasil]";
			echo "
				<div class='navbar'>
					<a href='index.php'><h1>Aplikasi Penelusuran Minat</h1></a>
					<div class='menu'>
						<img src='fotoprofil/".$_SESSION['foto']."'>
						<p class='nama'>".$_SESSION['nama']."</p>
						<div class='submenu'>
							<ul>
								<li><a href='user_edit.php'>Profil</a></li><hr>
								<li><a href='hasil.php'>Lihat Hasil</a></li><hr>
								<li><a href='logout.php'>Keluar</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class='container-sudah'>
					Anda sudah mengerjakan tes RIASEC <a class='hasil' href='hasil.php' role='button'> Lihat Hasil </a> <br>
					Anda ingin mengerjakan ulang tes RIASEC? <a class='ulang' href='tes_ulang.php' role='button'> Tes Ulang RIASEC </a>
				</div>
			";
		}
		else{
	?>
	<div class="container">
		<a class="kembali" href="index.php"> Kembali </a>
		<h1>Panduan Tes RIASEC</h1>
		<p class="panduan">Waktu yang dibutuhkan untuk menyelesaikan tes ini berkisar 10-15 menit. Agar mendapatkan hasil yang maksimal, disarankan agar pada saat melaksanakan tes anda berada di tempat yang kondusif, sehingga nyaman bagi anda untuk menjawab soal-soal yang diberikan.</p>
		<p class="panduan">Tes RIASEC ini memuat soal-soal tentang minat anda dalam beberapa hal. Untuk menjawab soal-soal tersebut diberikan dua pilihan jawaban, yaitu "Iya" dan "Tidak". Pilih "Iya" jika minat anda sesuai dengan pernyataan soal, jika tidak sesuai maka pilih "Tidak". Berikut di bawah ini adalah contoh pertanyaan dan contoh menjawab. Setelah selesai menjawab semua pertanyaan, tekan tombol "Submit" untuk mengetahui hasilnya.</p>
		<form method="" action="#">
			<div class="form-row">
				<div class="form-question">
					<p>Saya suka memperbaiki peralatan listrik?</p>
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
		</form>
		<a class="mulai" href="tes.php"> Mulai Sekarang </a>
	</div>
	<?php } ?>
</body>
</html>