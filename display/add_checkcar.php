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
    $name = $_POST['name'];
    $p_part = $_POST['p_part'];
    $amo = $_POST['amo'];
    $total = $p_part * $amo;
    $sql = "INSERT INTO parts (pt_id, id_car, p_name, p_price, p_amount) 
            VALUES (null,'$idcar','$name','$p_part','$amo')";
    $query = mysqli_query($mysqli,$sql);
    if($query){
            echo '<script type="text/javascript">
            swal("","บันทึกสำเร็จ", "success");
          		</script>';
            header("refresh:1; url=insert_checkcar.php?id_car=".$idcar."&id_fix=".$id);
        }else{
            echo '<script type="text/javascript">
            swal("","ไม่สามารถแก้ไขได้", "error");
          		</script>'.$id_fix;
            header("refresh:1; url=index-detail.php");
        }
?>  
</body>
</html>