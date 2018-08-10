<?php include('include/head.php') ?>
 <?php include('ketnoi.php') ?>
  <?php
    $errors = array();
    if(isset($_POST['submit']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $diachi = $_POST['diachi'];
      

      // check lỗi trống thông tin
        if (empty($username)) 
          {
            array_push($errors, "Vui lòng nhập tài khoản"); 
          }
          else
          {
            if (empty($password)) 
            {
                  array_push($errors, "Vui lòng nhập mật khẩu");  
            }
            else
              {
              if (empty($diachi)) {
                array_push($errors, "Vui lòng nhập địa chỉ");
              }
             
                  // check lỗi kí tự đặc biệt
                else
                {
                  if(!preg_match("/^[A-Za-z0-9_\.]{6,24}$/",$password))
                    {
                      echo '<h2 style="color: #FF0000; text-align: center;">Vui lòng nhập mật khẩu không chứa ký tự đặc biệt! </h2>';
                    }
                      else
                       {
                    if(!preg_match("/^[A-Za-z0-9_\.]{6,32}$/",$password))
                         {
                          echo '<h2 style="color: red; text-align: center;">Vui lòng nhập mật khẩu không chứa ký tự đặc biệt! </h2>';
                        }
                        //insert dữ liệu
                        else 
                        {
                          // kiểm tra tài khoản có tồn tại hay không
                          $sql = "select * from user where user_id = '$username'";
                          $result=mysqli_query($conn,$sql);
                          $resultCheck=mysqli_num_rows($result);
                          if($resultCheck > 0)
                          {
                              echo '<h2 style="color: red; text-align: center;">Tài khoản này đã tồn tại </h2>';
                          }
                          // thêm dữ liệu vào CSDL
                          else
                          {
                            $sql="INSERT INTO user(user_name,user_password,user_address) VALUES('".$username."', '".$password."', '".$diachi."')";
                            $query=mysqli_query($conn,$sql);
                            echo '<h2 style="color: #FF0000; text-align: center;">ĐĂNG KÝ THÀNH CÔNG! VUI LÒNG ĐĂNG NHẬP </h2>';
                          }
                        }
                        
                      }
                    }
                  }
                }
              }

  ?>

<div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">ĐĂNG KÝ</h3>
    
    <form action="" method="POST">
      <label></label>
      <input class="w3-input w3-border" type="text" placeholder="Nhập Tài Khoản" name="username">
      <input class="w3-input w3-section w3-border" type="password" placeholder="Nhập Mật Khẩu" name="password">
      <input class="w3-input w3-section w3-border" type="text" placeholder="Nhập Địa Chỉ" name="diachi">
    
      <input class="w3-button w3-black w3-section" type="submit" name="submit">
        
      </input>
    </form>
  </div>
  <?php include('include/foot.php') ?>