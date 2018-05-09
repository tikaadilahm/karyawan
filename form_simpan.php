<?php
include "header.php";
session_start();

if (!isset($_SESSION['login_user']))
{
    header("location: login.php");
}


else {
    $username=$_SESSION['login_user'];
    
?>
<body>
	<h1>Tambah Data karyawan</h1>
	<form method="post" action="proses_simpan.php" enctype="multipart/form-data">
	<div class="table-responsive">
    <table class="table table-bordered table-striped">
	<tr>
		<td>NIP</td>
		<td><input type="text" name="nip"></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
		<input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
		<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><input type="text" name="alamat"></td>
	</tr>
	<tr>
		<td>Bagian</td>
		<td>
			<select name="bagian" >
     <option value="Produksi"> Produksi</option>
     <option value="Pemasaran">Pemasaran</option>
     <option value="Hrd" selected>Hrd</option>
 </select>
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Simpan">
	<a href="data_karyawan.php"><input type="button" value="Batal"></a>
	</form>
</div>

<?php
} 
include "footer.php";
?>