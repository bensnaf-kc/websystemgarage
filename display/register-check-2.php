<?php


$pic_profile_tmp = $_FILES["pic_profile"]["tmp_name"];
$pic_profile_name = $_FILES["pic_profile"]["name"];
$pic_logo_tmp = $_FILES["pic_logo"]["tmp_name"];
$pic_logo_name = $_FILES["pic_logo"]["name"];

function simpleRandString($length = 4, $list = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ")
                {
                    mt_srand((float)microtime() * 1000000);
                    $newstring = "";

                    if ($length > 0) {
                        while (strlen($newstring) < $length) {
                            $newstring .= $list[mt_rand(0, strlen($list) - 1)];
                        }
                    }
                    return $newstring;
                }
                $rs = simpleRandString();
$newpic = $rs . $pic_profile_name;
$newlogo = $rs . $pic_logo_name;

if($pic_profile_name == NULL && $pic_logo_name == NULL){
    header("location: register-map.php");
}elseif($pic_profile_name != NULL && $pic_logo_name == NULL){

    $sql = "UPDATE user SET user_pic = '$newpic'";
    $qty = mysqli_query($mysqli,$sql);
    if($qty){
        copy($pic_profile_tmp, "assets/img/profile/$newpic");
        header("Location: register-map.php");
    }else{
        echo $sql;
    }
}elseif($pic_profile_name == NULL && $pic_logo_name != NULL){

    $sql = "UPDATE user SET user_pic = '$newlogo'";
    $qty = mysqli_query($mysqli,$sql);
    if($qty){
        copy($pic_logo_tmp, "assets/img/logo/$newlogo");
        header("Location: register-map.php");
    }else{
        echo $sql;
    }
}elseif($pic_profile_name != NULL && $pic_logo_name != NULL){

    $sql = "UPDATE user SET user_pic = '$newlogo', user_logo = '$newlogo'";
    $qty = mysqli_query($mysqli,$sql);
    if($qty){
        copy($pic_profile_tmp, "assets/img/logo/$newpic");
        copy($pic_logo_tmp, "assets/img/logo/$newlogo");
        header("Location: register-map.php");
    }else{
        echo $sql;
    }
}
