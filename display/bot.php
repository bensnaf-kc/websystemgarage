<?php
include('../backend/connect.php');
require "vendor/autoload.php";
// include "admin/config.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$access_token = "Yc7epxagkTDtxlDZVmNicqE921hrLs3jn6fH/IWym3c1Wf7wHTuG7CfHoSuROOXiq0QGv37GiIHuMZvYVbAfcySjFifvh2kFd4/5azEHb1ZzyFvkFI6gQKR9JfBN1gdxwopvrIqeGf2hS1JD1BJ2eQdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$events = json_decode($content, true);

if (!is_null($events['events'])) {
	foreach ($events['events'] as $event) {

		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

			error_log($event['message']['text']);
			$text = $event['message']['text'];
			$replyToken = $event['replyToken'];
			$messages = setFind($text, $mysqli);
			sentToLine($replyToken, $access_token, $messages);
		}
	}
}


function setText($text)
{
	$messages = '{
		"type" : "text",
		"text" : "' . $text . '"
	}';
	return $messages;
}

function setFind($text, $mysqli)
{
	if ($mysqli->connect_errno) {
		$messages = '{
		"type" : "text",
		"text" : "Failed to connect"
		}';
		return $messages;
	} else {
		if ($text == "status") {
			$messages = '{
				"type" : "text",
				"text" : "ตรวจสอบสถานะรถยนต์กรุณาพิมพ์ \n เบอร์ติดต่อ หรือ ไอดีไลน์ ของผู้ลูกค้า \n ตัวอย่างเบอร์ติดต่อ : 0xx-xxx-xxxx"
			}';
			return $messages;
		}
		elseif($text == "pay"){
			$sql_pay = "SELECT * FROM bank";
			$qty_pay = $mysqli->query($sql_pay);
			while($pay = mysqli_fetch_array($qty_pay)){
				$bank_name = $pay['bank_npay'];
				$bank_owner = $pay['bank_nowner'];
				$bank_numowner = $pay['bank_numower'];

			$messages = '{
				"type" : "text",
				"text" : "รายละเอียดช่องทางการชำระเงิน \n ธนาคาร : '.$bank_name.' \n ชื่อบัญชี : '.$bank_owner.' \n เลขบัญชี : '.$bank_numowner.'"
			}';
			
		}
		return $messages;
			
		}
		elseif($text == "map"){
			
		}
		elseif($text == "contact"){
			
		}
		else{

			$sql = "SELECT * FROM fixcar WHERE f_tel = '$text' or f_line = '$text'";
			$qty = $mysqli->query($sql);

			if ($qty) {
				while ($row = mysqli_fetch_array($qty)) {
					$result = $row['id_fix'];
		
				}
				$sql_car = "SELECT * FROM car WHERE id_fix = '$result'";
				$qty_car = $mysqli->query($sql_car);
				while($car = mysqli_fetch_array($qty_car)){
					$numbercar = $car['c_number'];
					$numbercar_log = $car['c_log'];
					$series = $car['c_series'];
					$gen = $car['c_gen'];
					$status_car = $car['type_idfix'];
				}
				$countcar = mysqli_num_rows($qty_car);
				if ($status_car == 1) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n จำนวนรถยนต์ :'.$countcar.' \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : กำลังดำเนินการ"
					}';
					return $messages;
				} elseif ($status_car == 2) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n จำนวนรถยนต์ :'.$countcar.' \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : กำลังซ่อม"
					}';
					return $messages;
				} elseif ($status_car == 3) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n จำนวนรถยนต์ :'.$countcar.' \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : ซ่อมเสร็จเรียบร้อย"
					}';
					return $messages;
				} elseif ($result == 4) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n จำนวนรถยนต์ :'.$countcar.' \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : รอการชำระเงิน"
					}';
					return $messages;
				} elseif ($result == 5) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n จำนวนรถยนต์ :'.$countcar.' \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : ชำระเงินเรียบร้อย"
					}';
					return $messages;
				} elseif ($result == 6) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n จำนวนรถยนต์ :'.$countcar.' \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : ระงับการใช้งาน"
					}';
					return $messages;
				}
			} else {
				$messages = '{
					"type" : "text",
					"text" : "ไม่ถูกต้องกรุณาใส่อีกครั้ง 01"
				}';
				return $messages;
			}
			$messages = '{
				"type" : "text",
				"text" : "hhhhhhhh'.$text.'"
			}';
			return $messages;
			
		}

		// if ($result->num_rows > 0) {
		// 	while($row = $result->fetch_assoc()) {
		// 		if($row['type_idfix'] == 1){
		// 			$messages = '{
		// 				"type" : "text",
		// 				"text" : "รอดำเนินการ"
		// 			}';
		// 			return $messages;
		// 		}
		// 		else if($row['type_idfix'] == 2){
		// 			$messages = '{
		// 				"type" : "text",
		// 				"text" : "กำลังซ่อม"
		// 			}';
		// 			return $messages;
		// 		}
		// 		else if($row['type_idfix'] == 3){
		// 			$messages = '{
		// 				"type" : "text",
		// 				"text" : "ซ่อมสำเร็จ"
		// 			}';
		// 			return $messages;
		// 		}
		// 		else if($row['type_idfix'] == 4){
		// 			$messages = '{
		// 				"type" : "text",
		// 				"text" : "รอการชำระเงิน"
		// 			}';
		// 			return $messages;
		// 		}
		// 		else if($row['type_idfix'] == 5){
		// 			$messages = '{
		// 				"type" : "text",
		// 				"text" : "ชำระเงินเรียบร้อย"
		// 			}';
		// 			return $messages;
		// 		}
		// 		else if($row['type_idfix'] == 6){
		// 			$messages = '{
		// 				"type" : "text",
		// 				"text" : "ระงับ"
		// 			}';
		// 			return $messages;
		// 		}
		// 	}
		// } else {
		// 	$messages = '{
		// 		"type" : "text",
		// 		"text" : "กรุณาพิมพ์ใหม่!"
		// 	}';
		// }
		$mysqli->close();
	}
}

function sentToLine($replyToken, $access_token, $messages)
{
	error_log("send");
	$url = 'https://api.line.me/v2/bot/message/reply';

	$data = '{
		"replyToken" : "' . $replyToken . '" ,
		"messages" : [' . $messages . ']
	}';
	$post = $data;

	error_log($post);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";
	error_log($result);
	error_log("send ok");
}
