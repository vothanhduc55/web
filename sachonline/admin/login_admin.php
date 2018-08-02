<?php
	$conn = mysqli_connect("localhost","root","","bookonline") or die("cant connect");
	mysqli_select_db($conn,"bookonline") or die("no database");
	if(isset($_POST['submit'])){
						$taikhoan=$_POST['txtuser'];
						$password=$_POST['txtpassword'];
						 // mã hóa md5
					if(empty($taikhoan) || empty($password) ){
							echo "Tài khoản và mật khẩu không được để trống.";
						}
					else{
						$sql= "SELECT * FROM admin WHERE admin_username = '$taikhoan' and admin_password = '$password' ";
                          $result=mysqli_query($conn, $sql) or die ("Không thể thực hiện câu truy vấn!!");
                          if(mysqli_fetch_array($result)){
                         
                          	header('location: index.php'); //chuyển về trang chủ 
                          }
                          else
                          { 
                          	 	echo "Tài khoản hoặc mật khẩu không chính xác.";		
                          }
                          
						}
					}

	mysqli_close($conn);

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<title>Đăng nhập</title>
</head>
<body>
	<div class="container-fluid">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4">
			<div class="jumbotron" style="margin-top: 150px"><h3>Đăng nhập hệ thống quản trị website</h3><br>
			<form action="" method="POST">
				<div class="form-group">
					<input type="text" name="txtuser" class="form-control" placeholder="Enter username">
				</div>
				<div class="form-group">
					<input type="password" name="txtpassword" class="form-control" placeholder="Enter password">
				</div>
				<input type="submit" name="submit" class="btn-primary form-control">
			</form>
		</div>
		<div class="col-lg-4">		
		</div>
	</div>
</body>
</html>
