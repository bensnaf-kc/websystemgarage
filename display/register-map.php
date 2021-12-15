<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
$user = $_SESSION['code'];
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhs-KT6Dy-glgYxUn8PxLKr91BF47p-hA&callback=initMap"></script>
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
                                        <div class="step-item active">
                                            <a class="step-item-link " href="#!">ตั้งค่าตำแหน่งที่ตั้ง</a>
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
                                    <form class="was-validated" action="add_map.php?user_code=<?=$user?>" method="POST">
                                        <!-- Form Row-->
                                        <!-- <div class="row gx-3"> -->
                                        <!-- Form Group (first name)-->
                                        <div class="mb-3">
                                            <label class="fs-1 mb-1 text-black" for="infname">เลือกตำแหน่งที่ตั้งอู่/ศูนย์บริการ</label>
                                            <hr>
                                            <label for="" class="form-label">ที่อยู่ตำแหน่งที่ตั้ง:</label><label class="text-sm text-blue">เช่น 64 หมู่ 3 ตำบลบางรักใหญ่ อำเภอบางบัวทอง จังหวัดนนทบุรี</label>
                                            <input class="form-control"  name="address" type="text" placeholder="กรุณาใส่ข้อมูล" required/>
                                            <label for="" class="form-label">ละติจูด : Latitude</label>
                                            <input class="form-control" name="lat"  id="lat" type="text"  placeholder="กรุณาใส่ข้อมูล" disabled required/>
                                            <label for="" class="form-label">ลองจิจูด : Longitude</label>
                                            <input class="form-control"  name="log" id="log" type="text" placeholder="กรุณาใส่ข้อมูล" disabled required/><br>
                                        </div><hr>
                                        <div align="center">
                                        <label for="" class="form-label fs-1 mb-1 text-blue">ตำแหน่งของฉัน</label>
                                        <div id="geo_data"></div>
                                            <div id="map_canvas" style="background: #f5f5f5; height: 500px;; width: 700px;" align="center"></div><br>
                                        <label for="" class="form-label text-red">หมายเหตุ : ทำการลากจุดสีแดงไปยังตำแหน่งที่ต้องการ</label>
                                        </div>
                                        <div align="right">
                                    <button class="btn btn-success btn-block btn-lg shadow-lg lift" name="reg-user" type="submit">ต่อไป</button>
                                </div>
                                </form>
                                </div><br>
                                
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
    <script type="text/javascript">
        var initialLocation;
        var bangkok = new google.maps.LatLng(13.755716, 100.501589);

        function initialize() {
            var myOptions = {
                zoom: 15,
                //center: latlng,
                mapTypeControl: false,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map_canvas"),
                myOptions);


            // detect geolocation lat/lng หาตำแหน่งทางภูมิศาสตร์
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(location) {
                    var location = location.coords;
                    $("#geo_data").html('<label for="" class="form-label">ละติจูด (Latitude) :</label>  <label class="text-red">' + location.latitude + '</label><br /><label for="" class="form-label">ลองจิจูด  (Longitude) :</label> <label class="text-red"> ' + location.longitude + '</label>');
                    initialLocation = new google.maps.LatLng(location.latitude, location.longitude);
                    map.setCenter(initialLocation);
                    setMarker(initialLocation);
                    
                    $.ajax({
                        url: "add_map.php",
                        data: "value=" + latitude + longitude,
                        type: 'POST',
                        dataType: 'html'

                    });
                });
            }

            // set marker
            function setMarker(initialName) {
                var marker = new google.maps.Marker({
                    draggable: true,
                    position: initialName,
                    map: map,
                    title: "คุณอยู่ที่นี่."
                });
                google.maps.event.addListener(marker, 'dragend', function(event) {
                    $("#geo_data").html('<label for="" class="form-label">ละติจูด (Latitude) :</label> <label class="text-red">' + marker.getPosition().lat() + '</label><br /><label for="" class="form-label">ลองจิจูด  (Longitude) :</label><label class="text-red">  ' + marker.getPosition().lng()) + '</label>';
                    document.getElementById("lat").value = marker.getPosition().lat();
                    document.getElementById("log").value = marker.getPosition().lng();
                });
            }
        }

        $(document).ready(function() {
            initialize();
        });
    </script>
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