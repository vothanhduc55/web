<?php include("include/header.php") ?>
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
                  <i class="fa fa-dashboard"></i>  <a href="">Quản lí truyện tranh</a>
               </li>
            </ol>
            <table class="table">
               <tr style="color: red;">
                  <td> Mã sách</td>
                  <td> Loại sách </td>
                  <td> Tên sách</td>
                  <td> Tác giả</td>
                  <td>Số Lượng </td>
                  <td> Đơn giá</td>
                  <td> Nhà xuất bản</td>
                  <td>Hình ảnh</td>
                  <td> Xóa</td>
                  <td> Sửa</td>
               </tr>
               <tr>
                  
               </tr>
               <!--phân trang sp-->
               <?php
                  include("ketnoi.php");
                  if (isset($_GET['trang'])) {
                      $get_trang = $_GET['trang'];
                  } else {
                      $get_trang = "";
                  }
                  
                  if ($get_trang == "" || $get_trang == 1) {
                      $trang1 = 0;
                      
                  } else {
                      $trang1 = ($get_trang * 8) - 8;
                  }
                  $sql = "SELECT * FROM book, type, punisher where type.book_type=book.book_type and type.book_type ='TT'and punisher.punisher_id = book.punisher_id limit $trang1,8";	
                  $result = mysqli_query($conn, $sql) or die("không thể thực hiện câu truy vấn 1");
                  
                  ?>
               <?php
                  while ($row = mysqli_fetch_array($result)) {
                      
                  ?>
               <tr>
                  <td > <?php echo $row['book_id']?> </td>
                  <td> <?php echo "{$row['type_name']}";?> </td>
                  <td> <?php echo "{$row['book_name']}";?></td>
                  <td><?php echo "{$row['book_author']}";?></td>
                  <td><?php echo "{$row['book_amount']}";?> </td>
                  <td> <?php echo "{$row['book_UnitPrice']}";?></td>
                  <td> <?php echo "{$row['punisher_name']}";?> </td>
                  <td><img src="../img/<?php echo "{$row['book_image']}";?>" > </td>
                  <td>
                     <a class="delete" href="xoasachkithuat.php?book_id=<?php echo $row['book_id']; ?> "  ><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                  <td> 
                     <a href="sua.php?book_id=<?php echo $row['book_id']; ?> "  ><i class="glyphicon glyphicon-wrench"></i></a>
                  </td>
               </tr>
               <?php
                  }
                  ?> 
            </table>
            <div class="col-md-12" >
               <ul class="pagination" style="padding-left: 600px;">
               <!--số trang-->
               <?php
                  $sql = "SELECT * FROM book where book_type='kt'";
                  $result = mysqli_query($conn, $sql) or die("Không thể thực hiện câu truy vấn 2");
                  $sodulieu = mysqli_num_rows($result);
                  $a        = ceil($sodulieu / 8);
                  
                  for ($b = 1; $b <= $a; $b++) {
                      
                      echo "<li><a href='?trang={$b}'>{$b}</a></li>";
                      
                  }
                  ?>  
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include("include/footer.php") ?>