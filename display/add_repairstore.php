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
    $store = $_GET['store_id'];
    $list = $_POST['list'];
    $amot = $_POST['amot'];

    $sql_product = "SELECT * FROM store WHERE store_id = '$store'";
    $qty_product = mysqli_query($mysqli, $sql_product);
    $ste = mysqli_fetch_array($qty_product);
    $count = $ste['s_amount'];
    if ($amot <= $count) {
        $amount = $ste['s_amount'] - $amot;
        $sql_update = "UPDATE store SET s_amount = '$amount'";
        $qty_update = mysqli_query($mysqli, $sql_update);

        $price = $ste['s_price'] * $amot;

        $sql = "INSERT INTO parts (pt_id, id_car, p_name, p_price, p_amount) 
                VALUES (NULL,'$idcar','$list','$price','$amot')";
        $query = mysqli_query($mysqli, $sql);

        if ($query) {
            header("refresh:1;url=list-repair.php?id_fix=" . $id . "&id_car=" . $idcar);
        } else {
            echo '<script type="text/javascript">
            swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
            </script>';
            echo $sql;
        }
    } else {
        echo "<br><br><br>
        <div col-md-6><div class='alert alert-danger' role='alert'>
        สินค้าในคลังไม่เพียงพอต่อความต้องการ!
        <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>
        </div></div>";
        header("refresh:3;url=list-repair.php?id_fix=" . $id . "&id_car=" . $idcar);
    }



    ?>
    <script>
        Swal.fire({
            //   position: 'top-end',
            icon: 'success',
            title: 'การเพิ่มสำเร็จ',
            showConfirmButton: false,
            timer: 750
        })
    </script>
</body>

</html>