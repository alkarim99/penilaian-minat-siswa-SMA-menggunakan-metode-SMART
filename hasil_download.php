<?php
	require('fpdf184/fpdf.php');
	include 'koneksi.php';

	session_start();
	if ($_SESSION['status']!='login') {
		header('location:login.php?alert=belum_login');
	}
	// if (isset($_SESSION['status'])) {
	// 	if ($_SESSION['status']!='login') {
	// 		header('location:login.php?alert=belum_login');
	// 	}
	// }

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddFont('Montserrat-Regular','','Montserrat-Regular.php');
	$pdf->AddPage();

	if (isset($_GET['id_hasil'])) {
		$id_hasil = $_GET['id_hasil'];

		$cari = mysqli_query($koneksi, "SELECT * FROM hasil WHERE id_hasil='$id_hasil'");
		$hasil = mysqli_fetch_array($cari);
		$id_user = $hasil['id_user'];
		$tanggaltes = $hasil['tanggaltes'];
		$durasi = $hasil['durasi'];
		$kode = $hasil['kode'];
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

		$cari_user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
		$hasil_user = mysqli_fetch_array($cari_user);
		$nama = $hasil_user['nama'];
		$tanggallahir = $hasil_user['tanggallahir'];

		$pdf->SetTitle('Hasil Tes '.$nama);

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

		$pdf->ln(10);
		$pdf->SetFont('Montserrat-Regular','',26);
		$pdf->Cell(0,10,'Aplikasi Penelusuran Minat',0,2,'C');

		$pdf->SetFontSize(20);
		$pdf->Cell(0,10,'Hasil Tes RIASEC',0,2,'C');

		$pdf->ln(10);
		$pdf->SetFontSize(12);
		$pdf->Cell(35,8,'Nama : ',0,0,'L');
		// $pdf->Cell(80,8,'Abdullah Al-Karim',0,0,'L');
		$pdf->Cell(80,8,$nama,0,0,'L');
		$pdf->Cell(35,8,'Tanggal Lahir : ',0,0,'L');
		$pdf->Cell(35,8,$tanggallahir,0,0,'L');

		$pdf->ln();
		$pdf->Cell(35,8,'Tanggal Tes : ',0,0,'L');
		$pdf->Cell(80,8,$tanggaltes,0,0,'L');
		$pdf->Cell(35,8,'Durasi Tes : ',0,0,'L');
		$pdf->Cell(35,8,$durasi,0,0,'L');

		$pdf->ln(10);
		$pdf->Cell(50);
		$pdf->SetFontSize(30);
		$pdf->Cell(30,30,$kode1,1,0,'C');
		$pdf->Cell(30,30,$kode2,1,0,'C');
		$pdf->Cell(30,30,$kode3,1,0,'C');

		$pdf->ln(40);
		$pdf->SetFontSize(15);
		$pdf->Cell(30,8,$data_kode1['nama_kode'],0,2,'L');
		$pdf->Cell(10);
		$pdf->SetFontSize(10);
		$pdf->MultiCell(0,6,$data_kode1['keterangan'],0,'J');
		$pdf->SetFontSize(15);
		$pdf->Cell(30,8,$data_kode2['nama_kode'],0,2,'L');
		$pdf->SetFontSize(10);
		$pdf->Cell(10);
		$pdf->MultiCell(0,6,$data_kode2['keterangan'],0,'J');
		$pdf->SetFontSize(15);
		$pdf->Cell(30,8,$data_kode3['nama_kode'],0,2,'L');
		$pdf->SetFontSize(10);
		$pdf->Cell(10);
		$pdf->MultiCell(0,6,$data_kode3['keterangan'],0,'J');
		
		$cari_jurusan = mysqli_query($koneksi, "SELECT * FROM kode WHERE kode = '$kode'");
		$hasil_jurusan = mysqli_num_rows($cari_jurusan);
		$no = 1;

		$pdf->SetFontSize(15);
		$pdf->Cell(30,8,'Jurusan yang sesuai :',0,2,'L');
		$pdf->SetFontSize(10);
		$pdf->Cell(10);
		
		if ($hasil_jurusan>0) {
			while($data = mysqli_fetch_array($cari_jurusan,MYSQLI_ASSOC)){
				$jurusan = "$data[jurusan]";
			}
			$pdf->MultiCell(0,6,$jurusan,0,'J');
		}
		else{
			$pdf->MultiCell(0,6,'Jurusan Tidak Ditemukan',0,'J');
		}

		$pdf->SetFontSize(12);
		$pdf->Cell(30,8,'3 Kode Lainnya',0,2,'L');
		$pdf->Cell(30,8,$data_kode4['nama_kode'].', '.$data_kode5['nama_kode'].', '.$data_kode6['nama_kode'],0,2,'L');

		$pdf->Output();
	}
?>