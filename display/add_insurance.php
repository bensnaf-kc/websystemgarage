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
    $id_fix = $_GET['id_car'];
    $id = $_GET['id_fix'];
    $insr = $_POST['insr'];
    $number = $_POST['number'];
    $datein = $_POST['datein'];
    $dateout = $_POST['dateout'];
    $numbercam = $_POST['numbercam'];
    $peolpel = $_POST['peolpel'];

    $pic_tmp =$_FILES["pic"]["tmp_name"];
    $pic_name =$_FILES["pic"]["name"];

    if ($pic_name == NULL) {
        $sql = "INSERT INTO insurance (id_sr, id_car, sr_name, sr_number, sr_datecome, sr_dateout, sr_numbery, sr_or , sr_date, sr_pic) 
                VALUES (NULL,'$id_fix','$insr','$number','$datein','$dateout','$numbercam','$peolpel',current_timestamp(),'')";
        if ($mysqli->query($sql) === TRUE) {
            echo '<script type="text/javascript">
            swal("","เพิ่มการซ่อมสำเร็จ", "success");
                </script>';
            header("refresh:1; url=insert_insru.php?id_car=".$id_fix."&id_fix=".$id); 
        }else{
            echo '<script type="text/javascript">
            swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
                </script>';
            echo $sql;
        }
    }else{
        $sql = "INSERT INTO insurance (id_sr, id_car, sr_name, sr_number, sr_datecome, sr_dateout, sr_numbery, sr_or , sr_date, sr_pic) 
                VALUES (NULL,'$id_fix','$insr','$number','$datein','$dateout','$numbercam','$peolpel',current_timestamp(),'$pic_name')";
        if ($mysqli->query($sql) === TRUE) {
            copy($pic_tmp,"assets/img/insu/$pic_name");
            echo '<script type="text/javascript">
            swal("","เพิ่มการซ่อมสำเร็จ", "success");
                </script>';
            header("refresh:1; url=insert_insru.php?id_car=".$id_fix."&id_fix=".$id); 
        }else{
            echo '<script type="text/javascript">
            swal("","เพิ่มการซ่อมไม่สำเร็จ", "error");
                </script>';
            echo $sql;
        }
    }
?>
</body>
</html>