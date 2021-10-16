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
        $errors = array();
       
        if(isset($_POST['reg-user'])){
            print_r($_POST);
            $infname = mysqli_escape_string($mysqli,$_POST['infname']);
            $inusername = mysqli_escape_string($mysqli,$_POST['inusername']);
            $inemail = mysqli_escape_string($mysqli,$_POST['inemail']);
            $inaddress = mysqli_escape_string($mysqli,$_POST['inaddress']);
            $inputPassword = mysqli_escape_string($mysqli,$_POST['inputPassword']);
            $inputPassword2 = mysqli_escape_string($mysqli,$_POST['inputPassword2']);
            if(empty($infname)){
                array_push($errors,"Name is required");
            }
            if(empty($inusername)){
                array_push($errors,"Username is required");
            }
            if(empty($inemail)){
                array_push($errors,"email is required");
            }
            if(empty($inaddress)){
                array_push($errors,"address is required");
            }
            if(empty($inputPassword)){
                array_push($errors,"Password is required");
            }
            if($inputPassword != $inputPassword2){
                array_push($errors,"รหัสผ่านไม่ตรงกัน");
                $_SESSION['error_register'] = "รหัสผ่านไม่ตรงกัน!";
                header("location: register.php");
            }
            $user_check = "SELECT * FROM user WHERE user_name = '$inusername' or email = '$inemail'";
            $que = mysqli_query($mysqli, $user_check);
            $result = mysqli_fetch_assoc($que);

            if($result){ // เช็คว่ามี user ในระบบไหม
                if($result['user_name'] === $inusername){
                    array_push($errors,"ขณะนี้มีผู้ใช้งานในระบบ");
                    $_SESSION['error_register'] = "ชื่อผู้ใช้งานหรืออีเมล์มีผู้ใช้งาน กรุณาใส่อีกครั้ง!";
                    header("location: register.php");
                }
                if($result['email'] === $inemail){
                    array_push($errors,"ขณะนี้มีอีเมล์ในระบบ");
                    $_SESSION['error_register'] = "ชื่อผู้ใช้งานหรืออีเมล์มีผู้ใช้งาน กรุณาใส่อีกครั้ง!";
                    header("location: register.php");
                }
            }
            if(count($errors) == 0){
                $password = md5($inputPassword);
                $sql = "INSERT INTO user (user_id, user_name, user_password, email, name, address, tel, id_line, facebook) 
                VALUES (NULL, '$inusername','$password', '$inemail', '$infname', '$inaddress', '$intel', '', '')";
        
                if($mysqli->query($sql) === TRUE){
                    $_SESSION['username'] = $inusername;
                    $_SESSION['email'] = $inemail;
                    $_SESSION['fname'] = $infname;
                    $_SESSION['success'] = "เข้าสู่ระบบเรียบร้อย";
                    header('location: checkuser.php');
        
                }else{
                    echo $re;
                    array_push($erros, "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
                    $_SESSION['error_register'] = "ชื่อผู้ใช้งานหรืออีเมล์ไม่ถูกต้องไม่ถูกต้อง กรุณาใส่อีกครั้ง!";
                    header("location: register.php");
                 }
            }
            
        }
    ?>
</body>
</html>