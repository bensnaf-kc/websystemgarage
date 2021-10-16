<?php
include('header.php');
include('../backend/connect.php');
$bmw;
$mercedes;
$toyota;
$honda;
$isuzu;
$mazda;
$mitsubishi;
$ford;
$hyundai;
$volkswagen;
$chevrolet;
$suzuki;
$mg;
$kawasaki;
$lexus;
$ducati;
$proton;
$id = $_GET['id_fix'];
?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        </header>
        <div class="container-fluid px-4 mt-n10">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <div class="card bg-light mb-3">
                            <div class="card-header"><b>เพิ่มข้อมูลรถยนต์</b></div>
                            <div class="card-body">
                                <form action="add_car.php?id_fix=<?= $id; ?>" class="was-validated" method="POST" enctype="multipart/form-data" id="myform1">
                                    <div class="row gx-4 mb-4">
                                        <div class="col-md-3">
                                            <label for="numbercar" class="col-form-label">หมายเลขทะเบียน:</label>
                                            <input class="form-control" id="numbercar" type="text" placeholder="" name="numbercar" required />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="type" class="col-form-label">จังหวัดเลขทะเบียน:
                                            </label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="">เลือกจังหวัด</option>
                                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                                <option value="กระบี่">กระบี่ </option>
                                                <option value="กาญจนบุรี">กาญจนบุรี </option>
                                                <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                                <option value="กำแพงเพชร">กำแพงเพชร </option>
                                                <option value="ขอนแก่น">ขอนแก่น</option>
                                                <option value="จันทบุรี">จันทบุรี</option>
                                                <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                                <option value="ชัยนาท">ชัยนาท </option>
                                                <option value="ชัยภูมิ">ชัยภูมิ </option>
                                                <option value="ชุมพร">ชุมพร </option>
                                                <option value="ชลบุรี">ชลบุรี </option>
                                                <option value="เชียงใหม่">เชียงใหม่ </option>
                                                <option value="เชียงราย">เชียงราย </option>
                                                <option value="ตรัง">ตรัง </option>
                                                <option value="ตราด">ตราด </option>
                                                <option value="ตาก">ตาก </option>
                                                <option value="นครนายก">นครนายก </option>
                                                <option value="นครปฐม">นครปฐม </option>
                                                <option value="นครพนม">นครพนม </option>
                                                <option value="นครราชสีมา">นครราชสีมา </option>
                                                <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                                <option value="นครสวรรค์">นครสวรรค์ </option>
                                                <option value="นราธิวาส">นราธิวาส </option>
                                                <option value="น่าน">น่าน </option>
                                                <option value="นนทบุรี">นนทบุรี </option>
                                                <option value="บึงกาฬ">บึงกาฬ</option>
                                                <option value="บุรีรัมย์">บุรีรัมย์</option>
                                                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                                <option value="ปทุมธานี">ปทุมธานี </option>
                                                <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                                <option value="ปัตตานี">ปัตตานี </option>
                                                <option value="พะเยา">พะเยา </option>
                                                <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                                <option value="พังงา">พังงา </option>
                                                <option value="พิจิตร">พิจิตร </option>
                                                <option value="พิษณุโลก">พิษณุโลก </option>
                                                <option value="เพชรบุรี">เพชรบุรี </option>
                                                <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                                <option value="แพร่">แพร่ </option>
                                                <option value="พัทลุง">พัทลุง </option>
                                                <option value="ภูเก็ต">ภูเก็ต </option>
                                                <option value="มหาสารคาม">มหาสารคาม </option>
                                                <option value="มุกดาหาร">มุกดาหาร </option>
                                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                                <option value="ยโสธร">ยโสธร </option>
                                                <option value="ยะลา">ยะลา </option>
                                                <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                                <option value="ระนอง">ระนอง </option>
                                                <option value="ระยอง">ระยอง </option>
                                                <option value="ราชบุรี">ราชบุรี</option>
                                                <option value="ลพบุรี">ลพบุรี </option>
                                                <option value="ลำปาง">ลำปาง </option>
                                                <option value="ลำพูน">ลำพูน </option>
                                                <option value="เลย">เลย </option>
                                                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                                <option value="สกลนคร">สกลนคร</option>
                                                <option value="สงขลา">สงขลา </option>
                                                <option value="สมุทรสาคร">สมุทรสาคร </option>
                                                <option value="สมุทรปราการ">สมุทรปราการ </option>
                                                <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                                <option value="สระแก้ว">สระแก้ว </option>
                                                <option value="สระบุรี">สระบุรี </option>
                                                <option value="สิงห์บุรี">สิงห์บุรี </option>
                                                <option value="สุโขทัย">สุโขทัย </option>
                                                <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                                <option value="สุรินทร์">สุรินทร์ </option>
                                                <option value="สตูล">สตูล </option>
                                                <option value="หนองคาย">หนองคาย </option>
                                                <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                                <option value="อุดรธานี">อุดรธานี </option>
                                                <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                                <option value="อุทัยธานี">อุทัยธานี </option>
                                                <option value="อุบลราชธานี">อุบลราชธานี</option>
                                                <option value="อ่างทอง">อ่างทอง </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="series" class="col-form-label">ยี่ห้อ:
                                            </label>
                                            <select class="form-control" id="series" name="series" placeholder="sdss" searchable="true" required>
                                                <option value='Alfa Romeo'>Alfa Romeo</option>
                                                <option value='Aston Martin'>Aston Martin</option>
                                                <option value='Audi'>Audi</option>
                                                <option value='Bentley'>Bentley</option>
                                                <option value='BMW'>BMW</option>
                                                <option value='Chery'>Chery</option>
                                                <option value='Chevrolet'> Chevrolet</option>
                                                <option value='Citroen'> Citroen</option>
                                                <option value='Deva'> Deva</option>
                                                <option value='DFSK'> DFSK</option>
                                                <option value='Ferrari'> Ferrari</option>
                                                <option value='Fiat'> Fiat</option>
                                                <option value='Ford'> Ford</option>
                                                <option value='Foton'> Foton</option>
                                                <option value='Honda'> Honda</option>
                                                <option value='Hyundai'> Hyundai</option>
                                                <option value='Isuzu'> Isuzu</option>
                                                <option value='Jaguar'> Jaguar</option>
                                                <option value='Jeep'> Jeep</option>
                                                <option value='KIA'> KIA</option>
                                                <option value='Lamborghini'> Lamborghini</option>
                                                <option value='Land Rover'> Land Rover</option>
                                                <option value='Lexus'> Lexus</option>
                                                <option value='Lotus'> Lotus</option>
                                                <option value='Maserati'> Maserati</option>
                                                <option value='Mazda'> Mazda</option>
                                                <option value='Mercedes-benz'> Mercedes-benz</option>
                                                <option value='MG'> MG</option>
                                                <option value='Mini'> Mini</option>
                                                <option value='Mitsubishi'> Mitsubishi</option>
                                                <option value='Mitsuoka'> Mitsuoka</option>
                                                <option value='Morgan'> Morgan</option>
                                                <option value='MTM'> MTM</option>
                                                <option value='Nissan'> Nissan</option>
                                                <option value='Peugeot'> Peugeot</option>
                                                <option value='Porsche'> Porsche</option>
                                                <option value='Proton'> Proton</option>
                                                <option value='Rolls-Royce'> Rolls-Royce</option>
                                                <option value='RUF'> RUF</option>
                                                <option value='Skoda'> Skoda</option>
                                                <option value='SpeedART'> SpeedART</option>
                                                <option value='Spyker'> Spyker</option>
                                                <option value='Ssangyong'> Ssangyong</option>
                                                <option value='Subaru'> Subaru</option>
                                                <option value='Suzuki'> Suzuki</option>
                                                <option value='TATA'> TATA</option>
                                                <option value='Tesla'> Tesla</option>
                                                <option value='Thairung'> Thairung</option>
                                                <option value='Toyota'> Toyota</option>
                                                <option value='Volkswagen'> Volkswagen</option>
                                                <option value='Volvo'> Volvo</option>
                                                <option value='Wiesmann'> Wiesmann</option>
                                                <option value='Wuling'> Wuling</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="gen" class="col-form-label">รุ่น: </label>
                                            <input class="form-control" type="text" name="gen" id="gen" required />
                                        </div>
                                    </div>
                                    <div class="row gx-4">
                                        <div class="col-md-3">
                                            <label for="color" class="col-form-label">สี: </label>
                                            <select name="color" id="color" class="form-control" required>
                                                <option value="">เลือกสี</option>
                                                <option value="สีแดง">
                                                    สีแดง<i class="fas fa-circle"></i></option>
                                                <option value="สีขาว">สีขาว</option>
                                                <option value="สีเทา">สีเทา</option>
                                                <option value="สีดำ">สีดำ</option>
                                                <option value="สีบรอนซ์เงิน">สีบรอนซ์เงิน</option>
                                                <option value="สีบรอนซ์ทอง">สีบรอนซ์ทอง</option>
                                                <option value="สีเหลือง">สีเหลือง</option>
                                                <option value="สีเหลืองอ่อน">สีเหลืองอ่อน</option>
                                                <option value="สีเหลืองแก่">สีเหลืองแก่</option>
                                                <option value="สีชมพู">สีชมพู</option>
                                                <option value="สีโอโรส">สีโอโรส</option>
                                                <option value="สีเขียว">สีเขียว</option>
                                                <option value="สีฟ้า">สีฟ้า</option>
                                                <option value="สีน้ำเงิน">สีน้ำเงิน</option>
                                                <option value="สีม่วง">สีม่วง</option>
                                            </select>
                                        </div><br>
                                        <div class="col-md-3">
                                            <label for="">รูปรถยนต์:</label>
                                            <input type="file" name="pic" id="" class="form-control" required />
                                        </div>
                                    </div>
                                    <div align="center">
                                        <button class="btn btn-primary" type="submit">ต่อไป</button>
                                        <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                </div>
                </table>
            </div>
        </div>
</div>
</main>
<footer class="footer-admin mt-auto footer-light">
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
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

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
</script>
<?php include('footer.php'); ?>