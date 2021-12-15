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
        error_reporting(0);
        include("../backend/connect.php");
        $errors = array();
       
        if(isset($_POST['reg-user'])){
            print("<pre>");
            print_r($_POST);
            print("</pre>");
            $infname = mysqli_escape_string($mysqli,$_POST['infname']);
            $inusername = mysqli_escape_string($mysqli,$_POST['username']);
            $inemail = mysqli_escape_string($mysqli,$_POST['inemail']);
            $intel = mysqli_escape_string($mysqli,$_POST['intel']);
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
            $user_check = "SELECT * FROM user WHERE user_name = '$inusername' OR email = '$inemail' OR name = '$infname'";
            $que = mysqli_query($mysqli, $user_check);
            $result = mysqli_fetch_array($que);

            if($result != NULL){ // เช็คว่ามี user ในระบบไหม
                if($result['user_name'] === $inusername){
                    array_push($errors,"ขณะนี้มีผู้ใช้งานในระบบ");
                    $_SESSION['error_register'] = "ขณะนี้มีผู้ใช้งานในระบบ!";
                    header("location: register.php");
                }
                if($result['email'] === $inemail){
                    array_push($errors,"ขณะนี้มีอีเมล์ในระบบ");
                    $_SESSION['error_register'] = "ขณะนี้มีอีเมล์ในระบบ!";
                    header("location: register.php");
                }
                if($result['name'] === $infname){
                    array_push($errors,"ขณะนี้มีชื่ออู่หรือศูนย์บริการในระบบ!");
                    $_SESSION['error_register'] = "ขณะนี้มีชื่ออู่หรือศูนย์บริการในระบบ!";
                    header("location: register.php");
                }
            }else{
                $password = md5($inputPassword);

                function simpleRandString($length = 4, $list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ")
                {
                    mt_srand((float)microtime() * 1000000);
                    $newstring = "";

                    if ($length > 0) {
                        while (strlen($newstring) < $length) {
                            $newstring .= $list[mt_rand(0, strlen($list) - 1)];
                        }
                    }
                    return $newstring;
                }
                $rs = simpleRandString();

                $sql = "INSERT INTO user (user_id, user_code, user_name, user_password, email, name, address, tel, user_pic, user_logo, web_type) 
                VALUES (NULL, '$rs', '$inusername','$password', '$inemail', '$infname', '$inaddress', '$intel', '', '','1')";
                $result = mysqli_query($mysqli,$sql);
                $sql_code = "SELECT * FROM user WHERE user_code = '$rs'";
                $qty_code = mysqli_query($mysqli,$sql_code);
                $row_code = mysqli_fetch_array($qty_code);
       
                if($result != NULL){
                   $_SESSION['code'] = $row_code[1];
                   
                   header('location: register-personal.php');
                }else{
                //    array_push($erros, "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
                //    $_SESSION['error'] = "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาใส่อีกครั้ง!";
                //    header("location: login.php");
                echo $sql;
                }
            }
            // if(count($errors) == 0){
            //     $password = md5($inputPassword);
            //     $sql = "INSERT INTO user (user_id, user_name, user_password, email, name, address, tel, id_line, facebook) 
            //     VALUES (NULL, '$inusername','$password', '$inemail', '$infname', '$inaddress', '$intel', '', '')";
        
            //     if($mysqli->query($sql) === TRUE){
            //         $_SESSION['username'] = $inusername;
            //         $_SESSION['email'] = $inemail;
            //         $_SESSION['fname'] = $infname;
            //         $_SESSION['success'] = "เข้าสู่ระบบเรียบร้อย";
            //         header('location: checkuser.php');
        
            //     }else{
            //         echo $re;
            //         array_push($erros, "ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง");
            //         $_SESSION['error_register'] = "ชื่อผู้ใช้งานหรืออีเมล์ไม่ถูกต้องไม่ถูกต้อง กรุณาใส่อีกครั้ง!";
            //         header("location: register.php");
            //      }
            // }
            
        }
    ?>
</body>
</html>