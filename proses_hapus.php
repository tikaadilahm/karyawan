<?php
include "koneksi.php";

$nip = $_GET['nip'];

$query = "SELECT * FROM karyawan WHERE nip='".$nip."'";
$sql = mysqli_query($connect, $query);
$data = mysqli_fetch_array($sql);


if(is_file("images/".$data['foto'])) 
	unlink("images/".$data['foto']); 

$query2 = "DELETE FROM karyawan WHERE nip='".$nip."'";
$sql2 = mysqli_query($connect, $query2); 

if($sql2){ 
	header("location: data_karyawan.php");
}else{
	echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>
