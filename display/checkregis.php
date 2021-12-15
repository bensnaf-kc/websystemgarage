<?php
include("../backend/connect.php");
if(isset($_POST['userName']) && $_POST['userName']!="" && strlen($_POST['userName'])>=4) {
   if ($stmt = $mysqli->prepare('SELECT user_name FROM user WHERE user_name = ?')) {
       $stmt->bind_param('s', $_POST['userName']);
       $stmt->execute();
       $stmt->store_result();
       $numRows = $stmt->num_rows;
       if ($numRows > 0) {
           echo "<span class=''> มีชื่อผู้ใช้นี้อยู่แล้ว</span>";
       } else {
           echo "<span class=''> สามารถใช้ชื่อนี้ได้</span>";
       }
   }
}
?>