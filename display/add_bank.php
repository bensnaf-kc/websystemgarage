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
    $code = $_GET['user_code'];
    $bank = $_POST['bank'];
    $nameowner = $_POST['nameowner'];
    $numberowner = $_POST['numberowner'];

    if ($bank == "bangkok.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารกรุงเทพ','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "kbank.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารกสิกรไทย','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "krungthai.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารทหารไทย','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "tmb.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารไทยพาณิชย์','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "scb.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารไทยพาณิชย์','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "krungsri.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารกรุงศรีอยุธยา','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "cimb.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารซีไอเอ็มบีไทย','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "uob.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารยูโอบี','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "aomsin.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารออมสิน','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "kiatnakin.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารเกียรตินาคินภัทร','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "tnc.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารธนชาติ','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "baac.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารธ.ก.ศ','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    } elseif ($bank == "citi.png") {
        $sql = "INSERT INTO bank (bank_id, user_code, bank_npay, bank_nowner, bank_numower)
        VALUES (NULL,'$code','ธนาคารซิตี้แบงก์','$nameowner','$numberowner')";
        $query = mysqli_query($mysqli, $sql);
        if ($query) {
            header("location: register-personal.php");
        } else {
            echo $sql;
        }
    }
    ?>
</body>

</html>