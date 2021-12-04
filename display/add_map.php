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
    $user = $_GET['user_id'];
    $name = $_POST['name'];
    $add = $_POST['add'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    

    $sql = "INSERT INTO map (map_id, user_id, map_name, map_address, map_lat, map_lng) 
            VALUES (NULL,$user,'$name','$add','$lat','$lng')";
    $query = mysqli_query($mysqli,$sql);
    
    if ($query) {
        header("refresh:1;url=setting-profile.php");  
    }else{
        echo '<script type="text/javascript">
        swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
  			</script>';
        echo $sql;
    }
?>
<script>
    Swal.fire({
        //   position: 'top-end',
        icon: 'success',
        title: 'เพิ่มติดสำเร็จ',
        showConfirmButton: false,
        timer: 750
    })
    </script>
</body>
</html>