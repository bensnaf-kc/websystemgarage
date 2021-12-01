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
echo $rs;
echo "<br>";
echo $cur;