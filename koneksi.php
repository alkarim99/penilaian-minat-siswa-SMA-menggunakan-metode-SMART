<?php 
	$koneksi = new mysqli("localhost","root", "", "minat");
	if ($koneksi->error)
	{	die("Koneksi gagal: " . $koneksi->error);
	}
?>