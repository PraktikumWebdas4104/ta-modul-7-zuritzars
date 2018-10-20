<?php

	$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");
	$nim = $_GET['nim'];

	$query = mysqli_query($koneksi, "SELECT * FROM daftar WHERE nim = '".$nim."'");
	$row = mysqli_fetch_array($query);

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

	if($hsl=$hasil->fetch_array()){		
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
	}
?>
<form method="POST">
	<table>
		<tr>
			<td colspan="3"> EDIT</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim" value="<?php echo $row['nim']; ?>"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><input type="radio" name="jeniskelamin" value="pr"> Perempuan </td>
			<td><input type="radio" name="jeniskelamin" value="lk"> Laki-Laki </td>
		</tr>
		<tr>
			<td>Program Studi </td>
			<td>:</td>
			<td><select name="programstudi" required>
				<option value="dsi"> D3 Sistem Informasi</option>
				<option value="dtektel"> D3 Teknologi Telekomunikasi </option>
				<option value="drpla"> D3 Rekayasa Perangkat Lunak Aplikasi </option>
				<option value="dkv"> S1 Desain Komunikasi Visual</option>
				<option value="ds"> S1 Desain Produk</option>
				<option value="di"> S1 Desain Interior</option>
				<option value="adbis"> S1 Administrasi Bisnis</option>
				<option value="ilkom"> S1 Ilmu Komunikasi</option>
				<option value="mbti"> S1 MBTI </option>
				<option value="aku"> S1 Akutansi</option>
			</select></td>
		</tr>
		<tr>
			<td>Fakultas </td>
			<td>:</td>
			<td><select name="fakultas" required>
				<option value="fit"> Fakultas Ilmu Terapan</option>
				<option value="fik"> Fakultas Industri Kreatif</option>
				<option value="fkb"> Fakultas Komunikasi dan Bisnis</option>
				<option value="feb"> Fakultas Ekonomi Bisnis</option>
			</select></td>
		</tr>
		<tr>
			<td> Asal </td>
			<td>:</td>
			<td><input type="text" name="asal" value="<?php echo $row['asa']; ?>"></td>
		</tr>
		<tr>
			<td>Motto Hidup</td>
			<td>:</td>
			<td><textarea name="mottohidup" <?php echo $row['mottohidup']; ?>></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ubah" value="ubah"></td>
			<td><a href="cari.php">CARI DATA</a></td>
		</tr>
	</table>
</form>
<?php
error_reporting(0)
if (isset($_POST['ubah'])) {
	include"koneksi.php";
		if ($conn) {
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$jeniskelamin = $_POST['jeniskelamin'];
			$programstudi= $_POST['programstudi'];
			$fakultas = $_POST['fakultas'];
			$asal = $_POST['asal'];
			$mottohidup = $_POST['mottohidup'];

			$qrySelect = mysqli_query($conn, "SELECT * FROM data WHERE nim = '".$nim."'");
			$row = mysqli_fetch_array($qrySelect);
			if ($nim !== $row['nim']) {

				$sql = mysqli_query($koneksi, "INSERT INTO `data` VALUES ('".$nim."','".$nama."','".$jeniskelamin."','".$programstudi."','".$fakultas."','".$asal."','".$mottohidup."')");
				echo "Berhasil Menambahkan Data<br>";
			}
			else{
				echo "NIM telah digunakan mahasiswa lain";
			}
	}	
?>