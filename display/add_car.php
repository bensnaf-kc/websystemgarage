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
    include('../backend/connect.php');
    // $pro_name = $_POST['p_name'];
    $id = $_GET['id_fix'];
    $numbercar = $_POST['numbercar'];
    $type = $_POST['type'];
    $series = $_POST['series'];
    $gen = $_POST['gen'];
    $color = $_POST['color'];
    $pic_tmp =$_FILES["pic"]["tmp_name"];
    $pic_name =$_FILES["pic"]["name"];

    $sql = "INSERT INTO car (id_car, id_fix, c_number, c_series, c_gen, c_color, c_log, c_pic, type_idfix) 
            VALUES (NULL,'$id','$numbercar','$series', '$gen','$color','$type','$pic_name','1' )
            ";

    if ($mysqli->query($sql) === TRUE) {
        copy($pic_tmp,"assets/img/car/$pic_name");
        header("refresh:1;url=list_car.php?id_fix=".$id);  
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
        title: 'การเพิ่มรถยนต์สำเร็จ',
        showConfirmButton: false,
        timer: 1000
    })
    </script>
</body>
</html>