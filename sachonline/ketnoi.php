<?php 
  $conn = mysqli_connect("localhost","root","","bookonline") or die("khong the ket noi");
   mysqli_select_db($conn,"bookonline") or die("chua co CSDL");
   mysqli_set_charset($conn,"utf8");
?>