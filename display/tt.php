<?php
function simpleRandString($length=6, $list="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"){
  mt_srand((double)microtime()*1000000);
  $newstring="";

  if($length>0){
      while(strlen($newstring)<$length){
          $newstring.=$list[mt_rand(0, strlen($list)-1)];
      }
  }
  return $newstring;
}
$rs = simpleRandString();

function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}

	$strDate = "2008-08-14 13:42:44";
	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
echo $rs;
echo "<br>";
echo $cur;