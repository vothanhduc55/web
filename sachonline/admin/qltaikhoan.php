<?php include('ketnoi.php') ?>
<?php include('include/header.php') ?>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Trang chủ
            </h1>
            <ol class="breadcrumb">
               <li>
                  <i class="fa fa-dashboard"></i>  <a href="">Quản lí tài khoản</a>
               </li>
            </ol>
            <table class="table">
               <tr style="color: red;">
                  <td>Mã tài khoản</td>
                  <td> Tên tài khoản</td>
                  <td> Địa Chỉ</td>
                
                  <td>Thao Tác</td>
               </tr>
               <tr>
                  
               </tr>
               <?php 
                  $sql = "SELECT * FROM user ";	
                  $result = mysqli_query($conn, $sql) or die("không thể thực hiện câu truy vấn 1");
                  
                  ?>
               <?php
                  while ($row = mysqli_fetch_array($result)) {
                      
                  ?>
               <tr>
                  <td > <?php echo "{$row['user_id']}";?> </td>
                  <td><?php echo "{$row['user_name']}";?></td>
                  <td> <?php echo "{$row['user_address']}";?></td>
                  
                  <td><a href="xoataikhoan.php?admin=<?php echo $row['user_id']; ?>"><input type="submit" class="btn btn-primary" value="XÓA"></a></td>
                  
               </tr>
               <?php
                  }
                  ?> 
            </table>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<<?php include('include/footer.php') ?>