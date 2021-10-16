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
    $id_car = $_GET['id_car'];
    $id = $_GET['id_fix'];
    $detail = $_POST['detail'];
    $amount = $_POST['amount'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO info_insurance (infois_id, id_car, infois_name, infois_amount, infois_price) 
            VALUES (NULL,'$id_car','$detail','$amount','$price')";
    if ($mysqli->query($sql) === TRUE) {
        echo '<script type="text/javascript">
        swal("","การเพิ่มสำเร็จ", "success");
  		</script>';
        header("refresh:0; url=insert_insru.php?id_car=".$id_car."&id_fix=".$id); 
    }else{
        echo '<script type="text/javascript">
        swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
  			</script>';
        echo $sql;
    }
?>
</body>
</html>