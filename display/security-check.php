<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <title></title>

</head>

<body>
    <?php
    session_start();
    include("../backend/connect.php");

    $erros = array();
    if (isset($_POST['btn'])) {
        $password = mysqli_real_escape_string($mysqli, $_POST['inputPassword']);

        if (empty($password)) {
            array_push($erros, "กรุณาใส่รหัสผ่าน");
        }
        if (count($erros) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM user WHERE user_password = '$password' ";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_num_rows($result);
            $res = mysqli_fetch_array($result);

            if ($row == 1) {
                $_SESSION['username'] = $res[1];
                $_SESSION['password'] = $res[2];
                $_SESSION['email'] = $res[3];
                $_SESSION['fname'] = $res[4];
                $_SESSION['address'] = $res[5];
                $_SESSION['tel'] = $res[6];
                $_SESSION['facebook'] = $res[7];
                $_SESSION['success'] = "เข้าสู่ระบบเรียบร้อย";
                header('location: setting-account.php');
            } else {
                array_push($erros, "รหัสผ่านไม่ถูกต้อง");
                $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง กรุณาใส่อีกครั้ง!";
                header("location: security.php");
            }
        }
    }
    ?>
    <script>
        Swal.fire({
            //   position: 'top-end',
            icon: 'success',
            title: 'เข้้าสู่ระบบสำเร็จ',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
</body>

</html>