<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>System Garage Management</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <p></p>
                        <center>
                            <p class="">
                            <h1 style="color: white;">SYSTEM GARAGE MANAGEMENT</h1>
                            </p>
                        </center>
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4 text-center">การลงทะเบียนเสร็จสิ้นเป็นที่เรียบร้อย</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <!-- Form Group (email address)-->
                                    <div class="text-center">
                                        <label class="fs-3  text-center">กรุณาบันทึกข้อมูลด้านล่างนี้</label><br>
                                        <label class="fs-3  text-center">เพื่อใช้เข้าสู่ระบบในโอกาศต่อไป</label>
                                    </div><br>
                                    <!-- Form Group (password)-->
                                    <div class="card-body text-center fs-4 bg-gray-400">
                                        <label class="text-primary">ชื่อผู้ใช้งาน</label><br>
                                        <label class="text-white"><?php echo $_SESSION['username']; ?></label><br>
                                        <label class="text-primary">อีเมล์</label><br>
                                        <label class="text-white"><?php echo $_SESSION['email']; ?></label>
                                    </div><br>
                                    <div class="text-center">
                                        <label class="fs-6 text-center">เพื่อความสะดวกในการจดจำ
                                            เราได้ส่งข้อความนี้ไปที่อีเมล์</label>
                                        <label class="fs-6 text-center"><?php echo $_SESSION['email']; ?> เป็นที่เรียบร้อย</label>
                                    </div><br>
                                    <!-- Form Group (login box)-->
                                    <div class="" align="center">
                                        <a href="login.php"><button
                                                class="btn btn-primary shadow-lg lift align-items-center">เข้าสู่ระบบ</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
    </div>
</body>
</html>