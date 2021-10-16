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
    $name = $_POST['name'];
    $price = $_POST['price'];
    $amo = $_POST['amo'];
    $type = $_POST['type'];
    $rand = mt_rand();
    $pic_tmp = $_FILES["pic"]["tmp_name"];
    $pic_name = $_FILES["pic"]["name"];
    $newname = $rand . $pic_name;

    if ($pic_name == NULL) {
        $sql = "INSERT INTO store (store_id, s_name, s_price, s_amount, s_type, s_pic) 
                VALUES (null,'$name','$price','$amo','$type','')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            // copy($pic_tmp, "assets/img/product/$newname");
            header("refresh:1; url=store.php");
        } else {
            echo '<script type="text/javascript">
                        swal("","ไม่สามารถแก้ไขได้", "error");
                            </script>';
            // header("refresh:1; url=index-detail.php");
        }
    } else {
        $sql = "INSERT INTO store (store_id, s_name, s_price, s_amount, s_type, s_pic) 
            VALUES (null,'$name','$price','$amo','$type','$newname')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            copy($pic_tmp, "assets/img/product/$newname");
            header("refresh:1; url=store.php");
        } else {
            echo '<script type="text/javascript">
                swal("","ไม่สามารถแก้ไขได้", "error");
                    </script>';
            // header("refresh:1; url=index-detail.php");
        }
    }
    ?>
</body>

</html>