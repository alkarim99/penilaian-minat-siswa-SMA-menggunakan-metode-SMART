<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aplikasi Penelusuran Minat</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="password_lupa.css">
</head>
<body>
	<div class="container">
		<div class="judul">
			<a href="index.php"><button>Kembali</button></a>
			<h1>Lupa Password</h1>
			<p>Isi data disamping</p>
			<div class="alert">
				<?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert']=='gagal') {
							echo "<p>Akun Tidak Ditemukan</p>";
						}
					}
				?>
			</div>
		</div>
		<div class="form">
			<form method="post" action="password_ganti.php">
				<div class="form-row">
					<div class="form-label">
						<label for="username">Username :</label>
					</div>
					<div class="form-control">
						<input type="text" name="username" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="username">Email :</label>
					</div>
					<div class="form-control">
						<input type="text" name="email" required>
					</div>
				</div>
				<div class="form-row">
					<div class="form-label">
						<label for="tanggallahir">Tanggal Lahir :</label>
					</div>
					<div class="form-control">
						<input type="text" name="tanggallahir" id="tanggallahir" required>
					</div>
				</div>
				<div class="form-row">
					<button class="submit" type="submit" name="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>

	<script>
		$("#tanggallahir").datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			yearRange: "1985:2021"
		});

		// Getter
		var dateFormat = $( "#tanggallahir" ).datepicker( "option", "dateFormat" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "dateFormat", "yy-mm-dd" );

		// Getter
		var changeMonth = $( "#tanggallahir" ).datepicker( "option", "changeMonth" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "changeMonth", true );

		// Getter
		var changeYear = $( "#tanggallahir" ).datepicker( "option", "changeYear" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "changeYear", true );

		// Getter
		var yearRange = $( "#tanggallahir" ).datepicker( "option", "yearRange" );
		// Setter
		$( "#tanggallahir" ).datepicker( "option", "yearRange", "1985:2021" );
	</script>
</body>
</html>