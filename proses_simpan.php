<?php
include "koneksi.php";


$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$bagian = $_POST['bagian'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
	
$fotobaru = date('dmYHis').$foto;

$path = "images/".$fotobaru;

if(move_uploaded_file($tmp, $path)){
	$query = "INSERT INTO karyawan VALUES('".$nip."', '".$nama."', '".$jenis_kelamin."', '".$alamat."', '".$bagian."', '".$fotobaru."')";
	$sql = mysqli_query($connect, $query); 

	if($sql){
		header("location: data_karyawan.php"); 
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}else{
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>
