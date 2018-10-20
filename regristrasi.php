<form method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="text" name="nim"></td>
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
			<td><input type="text" name="asal" value="asal"></td>
		</tr>
		<tr>
			<td>Motto Hidup</td>
			<td>:</td>
			<td><textarea name="mottohidup"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Daftar"></td>
		</tr>
	</table>
</form>
<?php
error_reporting(0)
if (isset($_POST['submit'])) {
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