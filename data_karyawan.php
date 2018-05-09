<?php
include "header.php"; // ini include header
session_start();

if (!isset($_SESSION['login_user']))
{
    header("location: login.php");
}


else {
    $username=$_SESSION['login_user'];
    
?>


<div class="row">
    <div class="col-md-12 articles" id="site-content">
    <article class="posts">
                <div class="content"> 
            <h1>Data Karyawan</h1>
    <a href="form_simpan.php">Tambah Data</a><br><br>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <tr>
        <th>Foto</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Bagian</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
    include "koneksi.php";
    
    $query = "SELECT * FROM karyawan";
    $sql = mysqli_query($connect, $query);
    
    while($data = mysqli_fetch_array($sql)){ 
        echo "<tr>";
        echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
        echo "<td>".$data['nip']."</td>";
        echo "<td>".$data['nama']."</td>";
        echo "<td>".$data['jenis_kelamin']."</td>";
        echo "<td>".$data['alamat']."</td>";
        echo "<td>".$data['bagian']."</td>";
        echo "<td><a href='form_ubah.php?nip=".$data['nip']."'>Ubah</a></td>";
        echo "<td><a href='proses_hapus.php?nip=".$data['nip']."'>Hapus</a> </td>";
        echo "</tr>";
    }
    ?>
    </table>
</div>
        </div>
    </article>   
    </div>


<?php
}
include "footer.php";
?>