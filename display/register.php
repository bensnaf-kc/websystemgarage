<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
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
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-3">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-bold my-4 text-blue ">ลงทะเบียนผู้ใช้อู่/ศูนย์บริการ</h3>
                                    <?php if (isset($_SESSION['error_register'])) :?>
                                    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert"
                                        align="center">
                                        <h6>
                                            <?php
                                            echo $_SESSION['error_register'];
                                            unset($_SESSION['error_register']);
                                            ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </h6>
                                    </div>
                                    <?php endif ?>
                                </div>
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form class="was-validated" action="register-check.php" method="POST">
                                        <!-- Form Row-->
                                        <!-- <div class="row gx-3"> -->
                                        <!-- Form Group (first name)-->
                                        <div class="mb-3">
                                            <label class="fs-1 mb-1 text-black"
                                                for="infname">ชื่ออู่/ศูนย์บริการ</label>
                                            <input class="form-control is-invalid" id="infname" name="infname"
                                                type="text" placeholder="" required />
                                        </div>
                                        <div class="a">
                                            เช่น "บริษัท รุ่งเรืองการช่าง จำกัด"
                                            ชื่อนี้จะถูกพิมพ์ในหัวเอกสารต่างๆ เช่น ใบแจ้งหนี้
                                            ใบเสร็จรับเงิน
                                        </div><br>
                                        <!-- Form Group (last name)-->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="fs-1 mb-1 text-black" for="inusername">
                                                    ชื่อผู้ใช้งาน</label>
                                                <input class="form-control is-invalid" id="inusername" name="inusername"
                                                    type="text" placeholder="" required />
                                            </div>
                                        </div>
                                        <div class="a">
                                            จะต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น และมีความยาวไม่น้อยกว่า 6
                                            ตัวอักษรเช่น "mygarage"
                                        </div><br>
                                        <!-- address -->
                                        <div class="mb-3">
                                            <label class="fs-1 mb-1 text-black" for="infname">ที่อยู่</label>
                                            <input class="form-control is-invalid" id="inaddress" name="inaddress"
                                                type="text" placeholder="" required />
                                        </div>
                                        <div class="a">
                                            เช่น "64 หมู่ 3 ตำบลบางรักใหญ่ อำเภอบางบัวทอง จังหวัดนนทบุรี"
                                            ชื่อนี้จะถูกพิมพ์ในหัวเอกสารต่างๆ เช่น ใบแจ้งหนี้
                                            ใบเสร็จรับเงิน
                                        </div><br>
                                        <!-- </div> -->
                                        <!-- email -->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="fs-1 mb-1 text-black" for="inemail">อีเมล์</label>
                                                    <input class="form-control is-invalid" id="inemail" name="inemail"
                                                        type="email" placeholder=""
                                                        required />
                                                </div>
                                                <div class="a">
                                                    ตัวอย่างเช่น mygarage@gmail.com
                                                </div>
                                            </div>
                                            <!-- tel -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="fs-1 mb-1 text-black" for="intel">เบอร์ติดต่อ</label>
                                                    <input class="form-control is-invalid" id="intel" name="intel"
                                                        type="text" placeholder="" onkeyup="autoTab(this)" required />
                                                </div>
                                                <div class="a">
                                                    ตัวอย่างเช่น 0xx-xxx-xxxx
                                                </div>
                                            </div>
                                        </div><br>
                                        <!-- Form Row    -->
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <!-- Form Group (password)-->
                                                <div class="mb-3">
                                                    <label class="fs-1 mb-1 text-black"
                                                        for="inputPassword">รหัสผ่านการใช้งาน</label>
                                                    <input class="form-control is-invalid" id="inputPassword"
                                                        name="inputPassword" type="password" placeholder="" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Form Group (confirm password)-->
                                                <div class="mb-3">
                                                    <label class="fs-1 mb-1 text-black"
                                                        for="inputConfirmPassword">กรุณายืนยันรหัสการใช้งานอีกครั้ง</label>
                                                    <input class="form-control is-invalid" id="inputConfirmPassword2"
                                                        type="password" placeholder="" name="inputPassword2" required />
                                                </div>
                                            </div>
                                            <div class="a">
                                                จะต้องเป็นตัวอักษรภาษาอังกฤษ/ตัวเลข/อักขระพิเศษเท่านั้น
                                                และมีความยาวไม่น้อยกว่า 8 ตัวอักษร
                                            </div>
                                        </div><br>
                                        <button class="btn btn-primary btn-block btn-lg shadow-lg lift" name="reg-user"
                                            type="submit">ลงทะเบียน</button>
                                    </form>
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
    <script>
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