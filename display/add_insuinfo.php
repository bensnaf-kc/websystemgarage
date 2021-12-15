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
    $list_c = count($_POST['list']);
    $amot_c = count($_POST['amot']);
    $price_c = count($_POST['price']);
    $list = $_POST['list'];
    $amot = $_POST['amot'];
    $price = $_POST['price'];
    

    if ($list_c >= 1) {
        for ($i = 0; $i < $list_c; $i++) {
            if (trim($_POST['list'][$i]) != NULL && $_POST['amot'][$i] != NULL && $_POST['price'][$i] != NULL) {
                $sum[$i] += $_POST['amot'][$i] * $_POST['price'][$i];
                $sql = "INSERT INTO info_insurance (infois_id, id_car, infois_name, infois_amount, infois_price, infois_sum) 
                    VALUES (NULL,'$id_car','$list[$i]','$amot[$i]','$price[$i]','$sum[$i]')";
                $qty = mysqli_query($mysqli, $sql);
            }
        }
        
        header("location: insert_insru.php?id_fix=" . $id . "&id_car=" . $id_car);
    } else {
        $sum = $_POST['amot'] * $_POST['price'];
        $sql = "INSERT INTO info_insurance (infois_id, id_car, infois_name, infois_amount, infois_price, infois_sum) 
            VALUES (NULL,'$id_car','$list','$amot','$price','$sum')";
        $query = mysqli_query($mysqli, $sql);

        if ($query) {
            header("location: insert_insru.php?id_fix=" . $id . "&id_car=" . $id_car);
        } else {
            echo '<script type="text/javascript">
        swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
  		</script>';
            echo $sql;
        }
    }
    
?>
</body>
</html>
