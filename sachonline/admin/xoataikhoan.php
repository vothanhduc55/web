<?php
	include"ketnoi.php";
	$user=$_GET['admin'];
	
	$lenh="delete from user where user_id='$user'";
	$kq=mysqli_query($conn,$lenh);
	header('Location:index.php?admin=qltaikhoan');
?>