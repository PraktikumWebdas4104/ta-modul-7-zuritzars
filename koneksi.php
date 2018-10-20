<?php
	$server="localhost";
	$username="root";
	$password="";
	$koneksi="mahasiswa";

	$conn= mysqli_connect("localhost", "root", "", "mahasiswa");

	if(!$conn){
		echo "koneksi gagal!";
	}else{
		echo "koneksi berhasil";
	}
?>