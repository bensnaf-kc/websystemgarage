<?php
session_start();

include('../backend/connect.php');
require "vendor/autoload.php";
// include "admin/config.php";
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

		$test = substr($text, 0, 4);
		
		// ========================================================
		if ($text == "status") {
			$messages = '{
				"type" : "text",
				"text" : "ตรวจสอบสถานะรถยนต์กรุณาพิมพ์ :\nรหัสรถยนต์\nหากไม่ทราบรหัสรถยนต์กรุณาพิมพ์  : เบอร์โทร หรือ ไอดีไลน์\nตัวอย่างการพิมพ์เฉพาะเบอร์โทร : 0xx-xxx-xxxx"
			}';
			return $messages;
		}
		elseif($text == "pay"){
			// $sql = "SELECT * FROM user";
			// $qty = $mysqli->query($sql);
			// $textz = "";
			// while($row = mysqli_fetch_array($qty)){
			// 	$textz .= $row['name'].' :\nรหัส '.$row['user_code'].'\n';
			// }
			$messages = '{
				"type" : "text",
				"text" : "ช่องทางกาารชำระเงิน $\nกรุณาพิมพ์: pay-ชื่ออู่ที่ต้องการ\n-------------------------------\nหรือถ้าจำชื่อออู่ไม่ได้ กรุณาพิมพ์ : ดูรายชื่ออู่"
			}';
			return $messages;
			
		}
		elseif($text == "ดูรายชื่ออู่"){
			$sql = "SELECT * FROM user";
			$qty = $mysqli->query($sql);
			$textz = "";
			while($row = mysqli_fetch_array($qty)){
				$textz .= $row['name'].' :\nรหัส '.$row['user_code'].'\n';
			}
			$messages = '{
				"type" : "text",
				"text" : "'.$textz.'"
			}';
			return $messages;
			
		}
		elseif($test == "pay-"){
			$pattern = "/[-\s:]/";
			$components = preg_split($pattern, $text);
			$t_service = $components[1];

			$sql = "SELECT * FROM user WHERE name = '$t_service'";
			$qty = $mysqli->query($sql);
			$rw = mysqli_fetch_array($qty);
			$usercode = $rw[1];
			$sql_pay = "SELECT * FROM bank WHERE user_code = '$usercode'";
			$qty_pay = mysqli_query($mysqli, $sql_pay);
			
			$textz = "";
			while($row = mysqli_fetch_array($qty_pay)){
				$number = mysqli_real_escape_string($mysqli, $row['bank_numower']);
				$textz .= 'ชื่อธนาคาร : '.$row['bank_npay'].'\nชื่อบัญชี : '.$row['bank_nowner'].'\nเลขบัญชี : '.$row['bank_numower'];
			}
			$messages = '{
				"type" : "text",
				"text" : "'.$t_service.'"
			}';
			return $messages;
			
		}
		elseif($text == "map"){

			$sql = "SELECT * FROM user";
			$qty = $mysqli->query($sql);
			$textz = "";
			while($row = mysqli_fetch_array($qty)){
				$textz .= $row['name'].' : รหัส '.$row['user_id'].'\n';
			}
			$messages = '{
				"type" : "text",
				"text" : "ชื่ออู่/ศูนย์บริการ : รหัสอู่/ศูนย์บริการ \n'.$textz.'\nกรุณาพิมพ์ ห รหัส อู่/ศูนย์บริการ เพื่อทำการแสดงตำแหน่งที่ตั้ง"
			}';
			return $messages;
		}
		elseif($text == "contact"){

			$sql = "SELECT * FROM user";
			$qty = $mysqli->query($sql);
			$textz = "";
			while($row = mysqli_fetch_array($qty)){
				$textz .= $row['name'].' : '.$row['tel'].'\n';
				// $tel .= $row['tel'].'\n';
			}
			$messages = '{
				"type" : "text",
				"text" : "ชื่ออู่/ศูนย์บริการ:\n'.$textz.'\nกรุณาพิมพ์ ชื่อร้านอู่/ศูนย์บริการ"
			}';
			return $messages;
		}else{
			$sql_map = "SELECT * FROM map WHERE user_id = '$text'";
			$qty_map = $mysqli->query($sql_map);
			while($map = mysqli_fetch_array($qty_map)){
				$idmap = $map['map_id'];
				$map_name = $map['map_name'];
				$lat = $map['map_lat'];
				$lng = $map['map_lng'];
				$add = $map['map_address'];
			}

			$sql_bank = "SELECT * FROM bank WHERE user_code = '$text'";
			$qty_bank = $mysqli->query($sql_bank);
			while($map = mysqli_fetch_array($qty_bank)){
				$idbank = $map['bank_id'];
				// $map_name = $map['map_name'];
				// $lat = $map['map_lat'];
				// $lng = $map['map_lng'];
				// $add = $map['map_address'];
			}

			$sql = "SELECT * FROM fixcar WHERE f_tel = '$text' OR f_line = '$text'";
			$qty = $mysqli->query($sql) or die("error");
			while ($row = mysqli_fetch_array($qty)) {
				$result = $row['id_fix'];
			}

			if ($result != NULL) {
				
				$sql_car = "SELECT * FROM car WHERE id_fix = '$result'";
				$qty_car = $mysqli->query($sql_car);
				while($car = mysqli_fetch_array($qty_car)){
					$codecar = $car['c_id'];
				}
				if($codecar != NULL){
					$messages = '{
						"type" : "text",
						"text" : "รหัสรถยนต์ของคุณ : '.$codecar.'"
					}';
					return $messages;
				}else{
					$messages = '{
						"type" : "text",
						"text" : "รหัสรถยนต์ของคุณ : ยังไม่มีรถยนต์ในระบบ"
					}';
					return $messages;
				}
			} else {

				$sql_check = "SELECT * FROM car WHERE c_id = '$text'";
				$qty_check = $mysqli->query($sql_check);
				while($car = mysqli_fetch_array($qty_check)){
					$numbercar = $car['c_number'];
					$numbercar_log = $car['c_log'];
					$series = $car['c_series'];
					$gen = $car['c_gen'];
					$status_car = $car['type_idfix'];
				}
				if ($status_car == 1) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ\nเลขทะเบียน :'.$numbercar.'\nจังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : กำลังดำเนินการ"
					}';
					return $messages;
				} elseif ($status_car == 2) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : กำลังซ่อม"
					}';
					return $messages;
				} elseif ($status_car == 3) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : ซ่อมเสร็จเรียบร้อย"
					}';
					return $messages;
				} elseif ($status_car == 4) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : รอการชำระเงิน"
					}';
					return $messages;
				} elseif ($status_car == 5) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : ชำระเงินเรียบร้อย"
					}';
					return $messages;
				} elseif ($status_car == 6) {
					$messages = '{
						"type" : "text",
						"text" : "สถานะการซ่อมของคุณ \n เลขทะเบียน :'.$numbercar.' \n จังหวัด :'.$numbercar_log.' \n ยี่ห้อ :'.$series.' \n รุ่น :'.$gen.' \n สถานะตอนนี้ : ระงับการใช้งาน"
					}';
					return $messages;
				}
			}
			if($idmap != NULL){
				$messages = '{
					"type" : "location",
					"title" : "ชื่ออู่/ศูนย์บริการ :'.$map_name.'",
					"address": "'.$add.'",
					"latitude": '.$lat.',
					"longitude": '.$lng.'
				}';
				return $messages;
			}
			if($idbank != NULL){
				$sql_pay = "SELECT * FROM bank WHERE user_code = '$text'";
				$qty_pay = $mysqli->query($sql_pay);
				$text_pay = "";
				while($pay = mysqli_fetch_array($qty_pay)){
					$text_pay .= 'ธนาคาร : '.$pay['bank_npay'].'\n ชื่อบัญชี : '.$pay['bank_nowner'].'\n เลขบัญชี : '.$pay['bank_numower'].'\n';
					
				$messages = '{
					"type" : "text",
					"text" : "รายละเอียดช่องทางการชำระเงิน \n '.$text_pay.'"
				}';
				
			}
			return $messages;
			}
			$messages = '{
				"type" : "text",
				"text" : "กรุณาใส่ข้อมูลให้ถูกต้อง'.$result.'"
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
