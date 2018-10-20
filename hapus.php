<?php
	$conn = mysqli_connect("localhost", "root", "", "mahasiswa");
	$nim = $_GET['nim'];

	mysqli_query($conn, "DELETE FROM daftar WHERE nim = '".$nim."'");
	header("location:cari.php?pesan=*Berhasil Menghapus Data");

?>