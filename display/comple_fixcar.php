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
    $idcar = $_GET['id_car'];
    $id = $_GET['id_fix'];
    $date = $_POST['date'];
    

    $sql = "UPDATE oder_repair
            SET dateout = '$date'
            WHERE id_car = '$idcar'";
    $query = mysqli_query($mysqli,$sql);

    $sql_update = "UPDATE car
    SET type_idfix = '2'
    WHERE id_car = '$idcar'";
    $qty_update = mysqli_query($mysqli,$sql_update);

    if ($qty_update) {
        header("refresh:1;url=detail.php?id_fix=".$id."&id_car=".$idcar);  
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
        title: 'ดำเนินการสำเร็จ',
        showConfirmButton: false,
        timer: 650
    })
    </script>
</body>
</html>