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
    session_start();
    $user = $_SESSION['id'];
    include('../backend/connect.php');
    $id = $_GET['id_tc'];
    $name = $_POST['name'];
    $add = $_POST['add'];
    $tel = $_POST['tel'];
    $type = $_POST['type'];
    $rand = mt_rand();
    $pic_tmp = $_FILES["pic"]["tmp_name"];
    $pic_name = $_FILES["pic"]["name"];
    $newname = $rand . $pic_name;

    if ($pic_name == NULL) {
        $sql = "UPDATE technician 
                SET  tc_name = '$name', tc_address = '$add', tc_tel = '$tel', type_iddmt = '$type'
                WHERE id_tc = '$id'";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            // copy($pic_tmp, "assets/img/product/$newname");
            header("refresh:1; url=employee.php");
        } else {
            echo '<script type="text/javascript">
                        swal("","ไม่สามารถแก้ไขได้", "error");
                            </script>';
            // header("refresh:1; url=index-detail.php");
        }
    } else {
        $sql = "UPDATE technician 
                SET  tc_name = '$name', tc_address = '$add', tc_tel = '$tel', type_iddmt = '$type',
                tc_pic = '$newname'
                WHERE id_tc = '$id'";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            copy($pic_tmp, "assets/img/emp/$newname");
            header("refresh:1; url=employee.php");
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