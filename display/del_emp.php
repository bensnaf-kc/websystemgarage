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
    $id_tc = $_GET['id_tc'];
    $sql = "DELETE FROM technician WHERE id_tc ='$id_tc'";

	if($mysqli->query($sql) === TRUE){
		header("refresh:1;url=employee.php");
	}else{
		echo $sql;
	}
    ?>
    <script>
        Swal.fire({
            //   position: 'top-end',
            icon: 'success',
            title: 'การลบสำเร็จ',
            showConfirmButton: false,
            timer: 750
        })
    </script>
</body>

</html>