<?php
session_start();
include "header2.php";
$_SESSION['login_user'] = '';
header("location: index.php");
unset($_SESSION['login_user']);
session_unset();
session_destroy();
;

?>


<?php
include "footer.php";
?>