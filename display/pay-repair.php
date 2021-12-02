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
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
    $idcar = $_GET['id_car'];
    $id = $_GET['id_fix'];
    $price = $_POST['price'];
    $name = mt_rand();
    $pic_tmp = $_FILES["pic"]["tmp_name"];
    $pic_name = $_FILES["pic"]["name"];
    $newname = $name . $pic_name;

    $sql = "INSERT INTO pay (pay_id, id_fix, id_car, pay_date, pay_price, pay_pic,pay_type) 
                    VALUES (NULL,'$id','$idcar',current_timestamp(),'$price','$newname','2')";
    $qty = mysqli_query($mysqli,$sql);

    $sql_succ = "UPDATE car SET type_idfix = '5' WHERE id_car = '$idcar'";
    $qty_succ = mysqli_query($mysqli, $sql_succ);

    if ($qty_succ) {
        copy($pic_tmp, "assets/img/pay/$newname");
        echo '<script type="text/javascript">
                    swal("","การเพิ่มสำเสร็จ", "success");
                        </script>';
        header("refresh:1; url=detail.php?id_car=" . $idcar . "&id_fix=" . $id);
    } else {
        echo '<script type="text/javascript">
                    swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
                        </script>';
        echo $sql;
    }

    ?>
</body>

</html>