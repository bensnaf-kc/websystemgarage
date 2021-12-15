<!DOCTYPE html>
<html lang="en">
<?php session_start();
include('../backend/connect.php');
$user = $_SESSION['code'];
$id = $_SESSION['id'];
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>System Garage Management</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        div.a {
            font-size: 12px;
            color: #7B113A;
            color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main><br><br><br>
                <h1 class="fw-bold my-4 text-white text-center " style="font: size 100px;">ลงทะเบียนผู้ใช้อู่/ศูนย์บริการ</h1>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-3">
                                <div class="card-header justify-content-center"><br>
                                    <!-- <h3 class="fw-bold my-4 text-blue ">ลงทะเบียนผู้ใช้อู่/ศูนย์บริการ</h3> -->
                                    <!-- Step Success Example-->
                                    <div class="step step-success mb-5">
                                        <div class="step-item">
                                            <a class="step-item-link" href="#!">ข้อมูลอู่/ศูนย์บริการ</a>
                                        </div>
                                        <div class="step-item ">
                                            <a class="step-item-link" href="#!">ตั้งค่าผู้ใช้งาน</a>
                                        </div>
                                        <div class="step-item">
                                            <a class="step-item-link " href="#!">ตั้งค่าตำแหน่งที่ตั้ง</a>
                                        </div>
                                        <div class="step-item active">
                                            <a class="step-item-link" href="#!" tabindex="-1" aria-disabled="true">เพิ่มพนักงาน</a>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['error_register'])) : ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert" align="center">
                                            <h6>
                                                <?php
                                                echo $_SESSION['error_register'];
                                                unset($_SESSION['error_register']);
                                                ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </h6>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="fs-1 mb-1 text-black">
                                <button class="btn btn-primary shadow lift" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่มพนักงาน</button>
                                        </div>
                                <div class="card-body">
                                    
                                    <?php
                                        $sql = "SELECT * FROM technician WHERE user_id = '$id'";
                                        $qty = mysqli_query($mysqli, $sql);
                                        $row = mysqli_fetch_array($qty);
                                        
                                        while($row = mysqli_fetch_array($qty)){
                                            if($row != NULL){
                                    ?>
                                    <div class="row">
                                    
                                        <div class="col-lg-8">
                                            <!-- Email notifications preferences card-->
                                            <div class="card card-header-actions mb-4">
                                                <div class="card-header">
                                                    <label for="">รายละเอียดพนักงาน</label>
                                                    <div class="form-check form-switch">
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="assets/img/emp/<?=$row['tc_pic']?>" style="width: 200px; height: 200px">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">แผนก</label>
                                                        <input class="form-control" type="text" value="<?=$row['tc_name']?>" disabled />
                                                    </div>
                                                
                                                        <div class="col-md-5">
                                                            <label class="small mb-1" for="namebank">ชื่อพนักงาน</label>
                                                            <input class="form-control" type="text" value="<?=$row['tc_name']?>" disabled />
                                                        </div>
                                                        </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label class="small mb-1" for="nameowner">ที่อยู่</label>
                                                            <input class="form-control" type="text" value="<?=$row['tc_address']?>" disabled />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label class="small mb-1" for="numberowner">เบอร์ติดต่อ</label>
                                                            <input class="form-control" type="text" value="<?=$row['tc_tel']?>"disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <?php }} ?>
                                    <div align="right">
                                        <button class="btn btn-success btn-block btn-lg shadow-lg lift" name="reg-user" type="submit">ต่อไป</button>
                                    </div>

                                </div>
                                <br>

                            </div>
                            <div class="card-footer text-center">
                                <div class="fs-3"><a href="login.php">คลิ๊กที่นี่หากคุณมีบัญชีผู้ใช้แล้ว
                                        กรุณาเข้าสู่ระบบ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer-admin mt-auto footer-dark">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; CMD25</div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <!-- เพิ่มพนักงาน -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มพนักงาน</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_emps.php?user_code=<?=$user?>" class="was-validated" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10">
                            <label class="form-label">ชื่อพนักงาน:</label>
                            <input type="text" name="name" required class="form-control is-invalid">
                        </div>
                        <div class="col-md-10 mt-1">
                            <label class="form-label">ที่อยู่:</label>
                            <input type="text" name="add" required class="form-control is-invalid">
                        </div>
                        <div class="col-md-10 mt-1">
                            <label class="form-label">เบอร์ติดต่อ:</label>
                            <input type="text" name="tel" required onkeyup="autoTab(this)" class="form-control is-invalid">
                        </div>
                        <div class="col-md-10 mt-1">
                        <label class="form-label">แผนก:</label>
                        <select class="form-control" name="type" id="type" required="">
                                    <option value="">เลือกแผนก</option>
                                    <option value="ช่างเครื่องยนต์">ช่างเครื่องยนต์</option>
                                    <option value="ช่างไฟฟ้า">ช่างไฟฟ้า</option>
                                    <option value="ช่างช่วงล่าง">ช่างช่วงล่าง</option>
                                    <option value="ช่างการยาง">ช่างการยาง</option>
                                    <option value="ช่วงตรวจสภาพ">ช่วงตรวจสภาพ</option>
                                </select>
                        </div>
                        <div class="col-md-10 mt-1">
                            <label class="form-label">รูปพนักงาน:</label>
                            <input type="file" name="pic" onchange="readURL(this);" required class="form-control"><br>
                            <img src="assets/img/emp/emp.png" id="blah"  style="width: 100px; height: 100px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light lift" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadow lift" type="submit">บันทึก</button></form></div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function autoTab(obj) {
            /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
            หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
            4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
            รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
            หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
            ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
            */
            var pattern = new String("___-___-____"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            var returnText = new String("");
            var obj_l = obj.value.length;
            var obj_l2 = obj_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += obj.value + pattern_ex;
                    obj.value = returnText;
                }
            }
            if (obj_l >= pattern.length) {
                obj.value = obj.value.substr(0, pattern.length);
            }
        }

        var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        var alertTrigger = document.getElementById('liveAlertBtn')

        function alert(message, type) {
            var wrapper = document.createElement('div')
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

            alertPlaceholder.append(wrapper)
        }

        if (alertTrigger) {
            alertTrigger.addEventListener('click', function() {
                alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาใส่อีกครั้ง!', 'error')
            })
        }
    </script>
</body>

</html>