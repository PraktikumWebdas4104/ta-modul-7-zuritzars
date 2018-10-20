<?php 
	session_start();
?>
<center>
<table border="1" width="550">
	<tr>
		<th width="100"><a href="form.php">FORM</a></th>
	</tr>
</table>
</center><br><br>

<form method="POST">
	<center><H1>Cari Data</H1></center><br><br>
	<table>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="number" name="nim" length="10" value="<?php echo $_SESSION['nim'];?>"></td>
		</tr>
		<tr>
			<td>NAMA</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $_SESSION['nama'];?>"></td>
		</tr>
	</table>
	<br>
	<input type="submit" name="update" value="update"> &nbsp; <a href="form.php"> <input type="button" name="kembali" value="Kembali"></a>
	
</form>
<?php
	error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");
if (isset($_POST['cari'])) {
	$cariNim = $_POST['cariNim'];
	$query = mysqli_query($conn, "SELECT * FROM daftar WHERE nim = '".$cariNim."'");
	echo "Hasil Pencarian '<b>".$cariNim."</b>' :";
	echo "<table border=1>
	<tr>
		<th>NIM</th>
		<th>NAMA</th>
		<th>AKSI</th>
	</tr>";

	foreach ($query as $qry) {
		echo "<tr>
		<td>".$qry['nim']."</td>
		<td>".$qry['nama']."</td>
		<td><a href='hapus.php?nim=".$qry['nim']."'>Hapus</a> |
		<a href='daftar.php?nim=".$qry['nim']."'>Daftar</a></td>
		</tr>";
	}
}

		else{
		echo "<h2>SEMUA DATA</h2>";
		$tampil = mysqli_query($conn, "SELECT * FROM daftar");
		echo "<table border=1>
				<tr style='background: grey;'>
					<th>Nama</th>
					<th>NIM</th>
					<th>Jenis Kelamin</th>
					<th>Program Studi</th>
					<th>fakultas</th>
					<th>Asal</th>
					<th>Motto Hidup</th>
				</tr>";

	foreach ($tampil as $qt) {
		echo "<tr>
				<td>".$hsl['nama']."</td>
				<td>".$hsl['nim']."</td>
				<td>".$hsl['jeniskelamin']."</td>
				<td>".$hsl['programstudi']."</td>
				<td>".$hsl['fakultas']."</td>
				<td>".$hsl['asal']."</td>
				<td>".$hsl['mottohidup']."</td>
				<td><a href='detailbarang.php'>view</a> | 
				    <a href='editbarang.php'>edit</a> | 
				    <a href='updatestokbrg.php'>+stok</a> | 
				    <a href='hapusbarang.php'>hapus</a></td>
			  </tr>";	
		echo "</table>";
		$pesan = $_GET['pesan'];
		echo $pesan;
	}
?>