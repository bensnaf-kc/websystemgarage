<?php
include('../backend/connect.php');
$sql_pay = "SELECT * FROM bank";
$qty_payy = mysqli_query($mysqli,$sql_pay);
// $qty_pay = $mysqli->query($sql_pay);
while($pay = mysqli_fetch_array($qty_payy)){
    $bank_name = $pay['bank_npay'];
    $bank_owner = $pay['bank_nowner'];
    $bank_numowner = $pay['bank_numower'];

$messages = '{
    "type" : "text",
    "text" : "รายละเอียดช่องทางการชำระเงิน \n ธนาคาร : '.$bank_name.' \n ชื่อบัญชี : '.$bank_owner.' \n เลขบัญชี : '.$bank_numowner.'" }';
}

echo $messages;
?>