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
		if ($text == "01") {
			$messages = '{
				"type" : "text",
				"text" : "ตรวจสอบสถานะรถยนต์กรุณาพิมพ์/n
						  เบอร์ติดต่อ หรือ ไอดีไลน์ ของผู้ลูกค้า/n
						  ตัวอย่างเบอร์ติดต่อ : 0xx-xxx-xxxx"
			}';
			return $messages;
		}
		elseif($text == "time"){
			
		}
		elseif($text == "time"){
			
		}
		elseif($text == "time"){
			
		}
		else{
			$sql = "SELECT * FROM fixcar WHERE f_tel = '$text'";
			$qty = $mysqli->query($sql);

			if ($qty) {
				while ($row = mysqli_fetch_array($qty)) {
					$result = $row['type_idfix'];
				}
				if ($result == 1) {
					$messages = '{
						"type" : "text",
						"text" : "รอดำเนินการ"
					}';
					return $messages;
				} elseif ($result == 2) {
					$messages = '{
						"type" : "text",
						"text" : "ตรวจสอบสถานะรถยนต์กรุณาพิมพ์/n
						เบอร์ติดต่อ หรือ ไอดีไลน์ ของผู้ลูกค้า/n
						ตัวอย่างเบอร์ติดต่อ : 0xx-xxx-xxxx"
					}';
					return $messages;
				} elseif ($result == 3) {
					$messages = '{
						"type" : "text",
						"text" : "' . $result . '"
					}';
					return $messages;
				} elseif ($result == 4) {
					$messages = '{
						"type" : "text",
						"text" : "' . $result . '"
					}';
					return $messages;
				} elseif ($result == 5) {
					$messages = '{
						"type" : "text",
						"text" : "' . $result . '"
					}';
					return $messages;
				} elseif ($result == 6) {
					$messages = '{
						"type" : "text",
						"text" : "' . $result . '"
					}';
					return $messages;
				}
			} else {
				$messages = '{
					"type" : "text",
					"text" : "ไม่ถูกต้องกรุณาใส่อีกครั้ง"
				}';
				return $messages;
			}
			
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
