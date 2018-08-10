<?php include('include/header.php') ?>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <ol class="breadcrumb">
               <legend>Thêm sản phẩm vào cơ sở dữ liệu</legend>
               <div class="form-group">
                  <form method="POST" action="" enctype="multipart/form-data">
                  <label>Loại sách</label>
                  <!-- Đổ dữ liệu trong bảng type -->
                  <select name="inputLoaisach"  class="form-control width_form" required="required">
                  <?php
                     include('ketnoi.php');
                     $sql = "select * from type";
                     $result = mysqli_query($conn,$sql) or die('không thể thực hiện câu truy vấn');
                     while ($row = mysqli_fetch_array($result)) {
                     	# code...
                     	echo "<option value ='".$row['book_type']."'>".$row['type_name']."</option>"."<br>";
                     }
                     ?>
                  </select>
                  <label>Tên sách</label>
                  <input type="text" class="form-control width_form" name="tensach" placeholder="Nhập tên sách">
                  <label>Tên tác giả</label>
                  <input type="text" class="form-control width_form" name="tentacgia" placeholder="Nhập tên tác giả">
                  <label>Số lượng sách</label>
                  <input type="number" class="form-control width_form" name="soluong" placeholder="Nhập số lượng sách">
                  <label>Đơn giá</label>
                  <input type="number" class="form-control width_form" name="dongia" placeholder="Nhập đơn giá">
                  <label>Nhà xuất bản</label>
                  <!-- Đổ dữ liệu trong bảng punisher -->
                  <select name="inputNXB"  class="form-control width_form" required="required">
                  <?php
                     include('ketnoi.php');
                     $sql = "select * from punisher";
                     $result = mysqli_query($conn,$sql) or die('không thể thực hiện câu truy vấn');
                     while ($row = mysqli_fetch_array($result)) {
                     	# code...
                     	echo "<option value ='".$row['punisher_id']."'>".$row['punisher_name']."</option>"."<br>";
                     }
                     ?>
                  </select>
                  <label>Hình ảnh</label>
                  <input type="file" class="form-control width_form" name="hinhanh">
                  <button type="submit" class="btn btn-primary" name="submit" value="">Thêm</button>
               </div>
               
               <div>
                  
               </div>
               <?php
                  include('ketnoi.php');
                  if(isset($_POST['submit'])){
                  
                  	$loaisach = $_POST['inputLoaisach'];
                  	$tensach = $_POST['tensach'];
                  	$tentacgia = $_POST['tentacgia'];
                  	$soluong = $_POST['soluong'];
                  	$dongia = $_POST['dongia'];
                  	$nhaxuatban = $_POST['inputNXB'];
                  	/*$hinhanh = $_POST['hinhanh'];
                  	$link = "/bookonline/img/$hinhanh";*/


                  	/*thêm hình ảnh sách vào database*/
                     if(isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != ""){
                        $image = $_FILES['hinhanh']['name'];
                        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
                        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../img/";
                        $uploadDirectory .= $image;
                        move_uploaded_file($_FILES['hinhanh']['tmp_name'], $uploadDirectory);
                     }
                  if ($loaisach==null|| $tensach==null|| $tentacgia==null || $soluong==null|| $dongia==null || $nhaxuatban==null){
                  
                  echo " Bạn vui lòng nhập đầy đủ thông tin!!";

                  }
                  else{
                  $sql_insert="INSERT INTO book(book_type, book_name, book_author, book_amount, book_UnitPrice ,punisher_id, book_image) VALUES('{$loaisach}', '{$tensach}', '{$tentacgia}', '{$soluong}', '{$dongia}', '{$nhaxuatban}', '{$image}')";
                  mysqli_query($conn, $sql_insert) or die ("không thể thực hiện câu truy vấn.!!");
                          
                  echo "Chúc mừng bạn đã thêm sản phẩm thành công.!!";
                    
                  }
               }
                  
                  ?>
               </form>
               <!-- Kiểm tra người quản trị có bấm nút thêm hay không -->
            </ol>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include('include/footer.php') ?>