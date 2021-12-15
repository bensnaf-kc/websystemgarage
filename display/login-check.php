<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <title></title>

</head>

<body>
    <?php
   session_start();
   include("../backend/connect.php");

   $erros = array();
   if(isset($_POST['btn-login'])){
      $username = mysqli_real_escape_string($mysqli, $_POST['inputuser']);
      $password = mysqli_real_escape_string($mysqli, $_POST['inputPassword']);

      if(empty($username)){
         array_push($erros,"กรุณาใส่ผู้ใช้งาน");
      }
      if(empty($password)){
         array_push($erros,"กรุณาใส่รหัสผ่าน");
      }
      if(count($erros) == 0){
         $password = md5($password);
         $query = "SELECT * FROM user WHERE user_name = '$username' and user_password = '$password' ";
         $result = mysqli_query($mysqli,$query);
         $row = mysqli_num_rows($result); 
         $res = mysqli_fetch_array($result);

         if($row == 1){
            $_SESSION['id'] = $res[0];
            $_SESSION['user_code'] = $res[1];
            $_SESSION['username'] = $res[2];
            $_SESSION['email'] = $res[4];
            $_SESSION['fname'] = $res[5];
            $_SESSION['address'] = $res[6];
            $_SESSION['tel'] = $res[7];
            $_SESSION['success'] = "เข้าสู่ระบบเรียบร้อย";
            header('location: index.php');

         }else{
            array_push($erros, "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
            $_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาใส่อีกครั้ง!";
            header("location: login.php");
         }
      }
   }
?>
    <script>
    Swal.fire({
        //   position: 'top-end',
        icon: 'success',
        title: 'เข้้าสู่ระบบสำเร็จ',
        showConfirmButton: false,
        timer: 1500
    })
    </script>
</body>

</html>