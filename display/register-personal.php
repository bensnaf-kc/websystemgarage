<!DOCTYPE html>
<html lang="en">
<?php session_start();
$code = $_SESSION['code'];
include("../backend/connect.php")
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>System Garage Management</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="bank.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        div.a {
            font-size: 12px;
            color: #7B113A;
            color: rgba(0, 0, 0, 0.5);
        }

        #map_canvas {
            width: 650px;
            height: 500px;
            margin: auto;
            margin-top: 50px;
        }

        img {
            max-width: 180px;
        }

        input[type=file] {
            padding: 10px;
            background: white;
        }

        .dd-selected {
            color: black;
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
                                        <div class="step-item active">
                                            <a class="step-item-link" href="#!">ตั้งค่าผู้ใช้งาน</a>
                                        </div>
                                        <div class="step-item">
                                            <a class="step-item-link disabled" href="#!">ตั้งค่าตำแหน่งที่ตั้ง</a>
                                        </div>
                                        <div class="step-item">
                                            <a class="step-item-link disabled" href="#!" tabindex="-1" aria-disabled="true">เพิ่มพนักงาน</a>
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
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form class="" action="register-check-2.php?user_code=<? $code ?>" method="POST" enctype="multipart/form-data">
                                        <!-- Form Row-->
                                        <!-- <div class="row gx-3"> -->
                                        <!-- Form Group (first name)-->
                                        <div>
                                            <label class="fs-1 mb-1 text-black" for="infname">โปรไฟล์ผู้ใช้งาน</label>&nbsp;<label class="text-red text-sm" align="center">หมายเหตุ : ถ้าหากไม่เปลี่ยนรูปภาพไม่ต้องทำการใดๆ</label>
                                        </div>
                                        <div class="mb-3" align="center">
                                            <br>
                                            <p><img id="blah1" src="assets/img/illustrations/profiles/profile-4.png" style="width: 100px; height: 100px;" alt="your image" /></p>
                                            <label for="">เปลี่ยนรูปโปรไฟล์ :</label>
                                            <div class="col-md-4">
                                                <input type='file' class='form-control' onchange="readURL1(this);" name="pic_profile" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mb-3" align="center">
                                            <p></p>
                                        </div>
                                        <div>
                                            <label class="fs-1 mb-1 text-black" for="infname">โลโก้ อู่/ศูนย์บริการ</label>&nbsp;<label class="text-red text-sm" align="center">หมายเหตุ : ถ้าหากไม่เปลี่ยนรูปภาพไม่ต้องทำการใดๆ</label>
                                        </div>
                                        <div class="mb-3" align="center">
                                            <br>
                                            <p><img id="blah2" src="assets/img/favicon.png" style="width: 100px; height: 100px;" alt="your image" /></p>
                                            <label for="">เปลี่ยนรูปโปรไฟล์ :</label>
                                            <div class="col-md-4">
                                                <input type='file' class='form-control' onchange="readURL2(this);" name="pic_logo" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="fs-1 mb-1 text-black">
                                            ธุรกรรมทางการเงิน
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+ เพิ่มบัญชีธนาคาร</button>
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM bank WHERE user_code = '$code'";
                                        $qty = mysqli_query($mysqli, $sql);
                                        while ($row = mysqli_fetch_array($qty)) {
                                            if ($row != NULL) {
                                        ?>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <!-- Email notifications preferences card-->
                                                        <div class="card card-header-actions mb-4">
                                                            <div class="card-header">
                                                                <label for="">รายละเอียดบัญชี</label>
                                                                <div class="form-check form-switch">
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="col-md-10">
                                                                        <label class="small mb-1" for="namebank">ชื่อธนาคาร</label>
                                                                        <input class="form-control" value="<?= $row['bank_npay'] ?>" type="text" disabled />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <label class="small mb-1" for="nameowner">ชื่อบัญชี</label>
                                                                        <input class="form-control" value="<?= $row['bank_nowner'] ?>" type="text" disabled />
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <label class="small mb-1" for="numberowner">เลขบัญชี</label>
                                                                        <input class="form-control" value="<?= $row['bank_numower'] ?>" type="text" disabled />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                        <?php } else {
                                            }
                                        } ?>
                                        <div align="right">
                                            <button class="btn btn-success btn-block btn-lg shadow-lg lift" name="reg-user" type="submit">ต่อไป</button>
                                        </div>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="add_bank.php?user_code=<?= $code ?>" method="post">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">เลือกธนาคาร</label>
                                    <select name="bank" id="img-bank" onchange="imgBank()" class="form-control" required>
                                        <option value="">เลือกธนาคาร</option>
                                        <option value="bangkok.png"> ธนาคารกรุงเทพ</option>
                                        <option value="kbank.png">ธนาคารกสิกรไทย</option>
                                        <option value="krungthai.png">ธนาคารกรุงไทย</option>
                                        <option value="tmb.png">ธนาคารทหารไทย</option>
                                        <option value="scb.png"> ธนาคารไทยพาณิชย์</option>
                                        <option value="krungsri.png">ธนาคารกรุงศรีอยุธยา</option>
                                        <option value="cimb.png">ธนาคารซีไอเอ็มบีไทย</option>
                                        <option value="uob.png">ธนาคารยูโอบี</option>
                                        <option value="aomsin.png">ธนาคารออมสิน</option>
                                        <option value="kiatnakin.png">ธนาคารเกียรตินาคินภัทร</option>
                                        <option value="tnc.png">ธนาคารธนชาติ</option>
                                        <option value="baac.png">ธนาคารธ.ก.ศ</option>
                                        <option value="citi.png">ธนาคารซิตี้แบงก์</option>
                                    </select>
                                    <div id="img-preview">
                                    </div>
                                </div>
                                <div id="selected" name="selected"></div>
                            </div>
                    </div><br>
                    <div class="form-group">
                        <div class="col">

                            <label for="nameowner">ชื่อบัญชีธนาคาร</label>
                            <input type="text" name="nameowner" id="nameowner" class="form-control" placeholder="กรุณาใส่ชื่อบัญชี" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label for="numberowner">เลขบัญชีธนาคาร</label>
                            <input type="text" onkeyup="autoTab(this)" name="numberowner" id="numberowner" placeholder="กรุณาใส่เลขบัญชี" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">บันทึก</button></form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/prashantchaudhary/ddslick/master/jquery.ddslick.min.js"></script>
    <script>
        function autoTab(obj) {
            /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
            หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
            4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
            รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
            หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
            ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
            */
            var pattern = new String("___-_-____-_"); // กำหนดรูปแบบในนี้
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

        function imgBank() {
            var img = document.getElementById("img-bank").value;
            var img_pre = document.getElementById("img-preview");
            var textimg = ""
            textimg = "<img src='assets/img/bank/" + img + "' style='width:100px; height:100px;'>";
            img_pre.innerHTML = textimg;
            console.log(textimg)
        }
    </script>
    <script>
        $('#bank').ddslick({
            width: "100%",
            imagePosition: "left",
            selectText: "เลือกธนาคาร",
            onSelected: function(data) {
                $('#bank').html(data.selectedData.value);
            }
        })
    </script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
        var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
        var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
        function initialize() { // ฟังก์ชันแสดงแผนที่
            GGM = new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
            // กำหนดจุดเริ่มต้นของแผนที่
            var my_Latlng = new GGM.LatLng(13.761728449950002, 100.6527900695800);
            // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
            var my_DivObj = $("#map_canvas")[0];
            // กำหนด Option ของแผนที่
            var myOptions = {
                zoom: 12, // กำหนดขนาดการ zoom
                center: my_Latlng, // กำหนดจุดกึ่งกลาง
                mapTypeId: GGM.MapTypeId.ROADMAP, // กำหนดรูปแบบแผนที่
                mapTypeControlOptions: { // การจัดรูปแบบส่วนควบคุมประเภทแผนที่
                    position: GGM.ControlPosition.TOP, // จัดตำแหน่ง
                    style: GGM.MapTypeControlStyle.DROPDOWN_MENU // จัดรูปแบบ style 
                }
            };
            map = new GGM.Map(my_DivObj, myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

            // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี  
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var myPosition_lat = position.coords.latitude; // เก็บค่าตำแหน่ง latitude  ปัจจุบัน
                    var myPosition_lon = position.coords.longitude; // เก็บค่าตำแหน่ง  longitude ปัจจุบัน
                    // สรัาง LatLng ตำแหน่ง สำหรับ google map
                    var pos = new GGM.LatLng(position.coords.latitude, position.coords.longitude);
                    $.post("save_location.php", { // ส่งค่าตำแหน่งปัจจุบัน บันทึกลงฐานข้อมูล
                        myPosition_lat: myPosition_lat, // ส่งค่า latitude
                        myPosition_lon: myPosition_lon // ส่งค่า longitude
                    }, function() {
                        map.panTo(pos); // เลื่อนแผนที่ไปตำแหน่งปัจจุบัน
                        map.setCenter(pos); // กำหนดจุดกลางของแผนที่เป็น ตำแหน่งปัจจุบัน                                   
                    });
                }, function() {
                    // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน  
                });
            } else {
                // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง  
            }


        }
        $(function() {
            // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
            // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
            // v=3.2&sensor=false&language=th&callback=initialize
            //  v เวอร์ชัน่ 3.2
            //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
            //  language ภาษา th ,en เป็นต้น
            //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
            $("<script/>", {
                "type": "text/javascript",
                src: "//maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
            }).appendTo("body");
        });
    </script>
    <script type="text/javascript">
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "process.php",
                data: 'userName=' + $("#RegUser").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
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
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah1')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>