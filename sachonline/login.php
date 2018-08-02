<?php
	$conn = mysqli_connect("localhost","root","","bookonline") or die("cant connect");
	mysqli_select_db($conn,"bookonline") or die("no database");
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$myusername = mysqli_real_escape_string($conn,$_POST['txtuser']);
		$mypassword = mysqli_real_escape_string($conn,$_POST['txtpassword']);
		$sql = "select * from user where user_name ='$myusername' and user_password = '$mypassword'";
		$result = mysqli_query($conn,$sql) or die("cant do sql");
		while($row = mysqli_fetch_array($result)){
			echo "Tên:{$row['user_name']} -Mật khẩu:{$row['user_password']}";
		}
	}
	mysqli_close($conn);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Đăng nhập</title>
</head>
<body>
	<div class="container-fluid">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4">
			<div class="jumbotron" style="margin-top: 150px"><h3>Xin mời đăng nhập</h3><br>
			<form action="index.php" method="POST">
				<div class="form-group">
					<input type="text" name="txtuser" class="form-control" placeholder="Enter username">
				</div>
				<div class="form-group">
					<input type="passord" name="txtpassword" class="form-control" placeholder="Enter password">
				</div>
				<input type="submit" name="submit" class="btn-primary form-control">
			</form>
		</div>
		<div class="col-lg-4">		
		</div>
	</div>
</body>
</html>