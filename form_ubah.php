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
	<h1>Ubah Data karyawan</h1>
	
	<?php
	include "koneksi.php";
	
	$nip = $_GET['nip'];
	
	
	$query = "SELECT * FROM karyawan WHERE nip='".$nip."'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	?>
	
	<form method="post" action="proses_ubah.php?nip=<?php echo $nip; ?>" enctype="multipart/form-data">
	<div class="table-responsive">
    <table class="table table-bordered table-striped">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
		<?php
		if($data['jenis_kelamin'] == "Laki-laki"){
			echo "<input type='radio' name='jenis_kelamin' value='laki-laki' checked='checked'> Laki-laki";
			echo "<input type='radio' name='jenis_kelamin' value='perempuan'> Perempuan";
		}else{
			echo "<input type='radio' name='jenis_kelamin' value='laki-laki'> Laki-laki";
			echo "<input type='radio' name='jenis_kelamin' value='perempuan' checked='checked'> Perempuan";
		}
		?>
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
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
		<td>
			<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			<input type="file" name="foto">
		</td>
	</tr>
	</table>
	</div>
	<hr>
	<input type="submit" value="Ubah">
	<a href="data_karyawan.php"><input type="button" value="Batal"></a>
	</form>

<?php
}
include "footer.php";
?>