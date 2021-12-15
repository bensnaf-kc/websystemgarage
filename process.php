<?php
  $db = mysqli_connect('localhost', 'root', '', 'mini');
  if(isset($_POST['username_check'])){
    $username = $_POST['username'];
    $sql = "SELECT * FROM user WHERE user_name = '$username'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
      echo "taken";
    }else{
      echo "not_taken";
    }
    exit();
  }
  if(isset($_POST['save'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
      echo "exits";
      exit();
    }else{

    }
  }
?>
