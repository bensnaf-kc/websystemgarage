<?php
include('../backend/connect.php');
error_reporting(0);
if (isset($_POST['userName'])) {
    $idcheck_user = strlen($_post['userName']);
    if (preg_match("/^[a-zA-Z0-9]+$/", $_POST['userName']) == 1) {
        if (isset($_POST['userName']) && $_POST['userName'] != "" && strlen($_POST['userName']) >= 6) {
            if ($stmt = $mysqli->prepare('SELECT * FROM user WHERE user_name = ?')) {
                $stmt->bind_param('s', $_POST['userName']);
                $stmt->execute();
                $stmt->store_result();
                $numRows = $stmt->num_rows;
                if ($numRows > 0) {
                    echo "<span class='text-red'> มีชื่อผู้ใช้นี้อยู่แล้ว</span>";
                } else {
                    echo "<span class='text-green'> สามารถใช้ชื่อนี้ได้</span>";
                }
            }
        }else{
            echo "<span class='text-red'>กรุณากรอกข้อมูลมากกว่า 6 ตัวอักษร หรืออักอักษรเป็นภาษาไทย </span>";
        }
    } else{
        echo "<span class='text-red'>กรุณากรอกข้อมูลมากกว่า 6 ตัวอักษร หรืออักอักษรเป็นภาษาไทย </span>";
    }
}

if (isset($_POST['Email'])) {
    $idcheck_user = strlen($_post['Email']);
    if (preg_match("/\S+@\S+.\S+/", $_POST['Email']) == 1) {
        if (isset($_POST['Email']) && $_POST['Email'] != "" && strlen($_POST['Email']) >= 6) {
            if ($stmt = $mysqli->prepare('SELECT * FROM user WHERE email = ?')) {
                $stmt->bind_param('s', $_POST['Email']);
                $stmt->execute();
                $stmt->store_result();
                $numRows = $stmt->num_rows;
                if ($numRows > 0) {
                    echo "<span class='text-red'> มีอีเมล์ผู้ใช้นี้อยู่แล้ว</span>";
                } else {
                    echo "<span class='text-green'> สามารถใช้อีเมล์นี้ได้</span>";
                }
            }
        }
    } else {
        echo "ไม่ตรงตามรูปแบบอีเมล์";
    }
    //สามารถเงื่อนไขเพิ่มได้
}
if (isset($_POST['name'])) {
        if (isset($_POST['name']) && $_POST['name'] != "" && strlen($_POST['name']) >= 6) {
            if ($stmt = $mysqli->prepare('SELECT * FROM user WHERE name = ?')) {
                $stmt->bind_param('s', $_POST['name']);
                $stmt->execute();
                $stmt->store_result();
                $numRows = $stmt->num_rows;
                if ($numRows > 0) {
                    echo "<span class='text-red'> มีชื่อนี้อยู่ในระบบแล้วแล้ว</span>";
                } else {
                    echo "<span class='text-green'> สามารถใช้ชื่อนี้ได้</span>";
                }
            }
        }
    
    //สามารถเงื่อนไขเพิ่มได้
}
if (isset($_POST['password']) && isset($_POST['password2'])) {
    if ($_POST['password'] == $_POST['password2']) {
        echo "<span class='text-green'> สามารถใช้งานได้</span>";
    } else {
        echo "<span class='text-red'> รหัสผ่านไม่ตรงกัน</span>";
    }
}
