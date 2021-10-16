<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>System Garage Management</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
</head>
<body>
<?php
    session_start();
    include('../backend/connect.php');
        
        $id = $_GET['id'];
        $username = $_POST['user'];
        $userconf = $_POST['conuser'];
    
        if($username == $userconf){

            $sql = "UPDATE user SET name = '$username' WHERE user_id = '$id'";
            $qty = mysqli_query($mysqli,$sql);
            
            if($qty == TRUE){
                $_SESSION['suc-acc'] = "การแก้ไขไม่สำเร็จ";
                header("location: setting-account.php");
            }
        }
        else{
            $_SESSION['error-acc'] = "ชื่อไม่ตรงกัน กรุณากรอกใหม่!";
            header("location: setting-account.php");
        }
?>
</body>
</html>