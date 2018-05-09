 <?php include"koneksi.php";
include "header2.php";
session_start();
?>
<body>

  <form method="POST" action="proses_login.php">
  <table class="form">
   <tr>&nbsp;<td>Username:</td><td><input type="text" name="username" placeholder="Username" ></td><td>&nbsp;</td></tr>
   <tr>&nbsp;<td> Password : </td><td><input type="password" name="password" placeholder="Password"></td><td>&nbsp;</td></tr>
    <td>
     <br>
     <input class="submit" type="submit" name="login" value="Login">
    </td>
   </tr>
  </form>
  
  
 </div>
</table>
</form>
</body>

<?php
include "footer.php";
?>