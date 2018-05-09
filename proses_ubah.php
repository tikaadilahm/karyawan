<?php
include "koneksi.php";

$nip = $_GET['nip'];

$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$bagian = $_POST['bagian'];

if(isset($_POST['ubah_foto'])){ 
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	$fotobaru = date('dmYHis').$foto;
	
	$path = "images/".$fotobaru;

	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM karyawan WHERE nip='".$nip."'";
		$sql = mysqli_query($connect, $query); 
		$data = mysqli_fetch_array($sql); 

		if(is_file("images/".$data['foto'])) 
			unlink("images/".$data['foto']); 

		$query = "UPDATE karyawan SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', alamat='".$alamat."', bagian='".$bagian."', foto='".$fotobaru."' WHERE nip='".$nip."'";
		$sql = mysqli_query($connect, $query); 

		if($sql){ 
			header("location: data_karyawan.php"); 
		}else{
			
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
		}
	}else{
		
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ 
	$query = "UPDATE karyawan SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', alamat='".$alamat."', bagian='".$bagian."' WHERE nip='".$nip."'";
	$sql = mysqli_query($connect, $query); 

	if($sql){ 
		header("location: data_karyawan.php"); 
	}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}
?>
