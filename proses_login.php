 <?php
session_start();
include"koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($connect,"select * from admin where username='".$username."' and password='".$password."'");

  $rows = mysqli_num_rows($query);
   if ($rows == 1) {
    $_SESSION['login_user']=$username;
    header("location: homeadmin.php");
    } else {
    echo "Username atau Password belum terdaftar";
    }