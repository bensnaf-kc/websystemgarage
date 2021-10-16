<?php 
// session_start();
include('header.php'); 
include('../backend/connect.php');
$idcar = $_GET['id_car'];
$id = $_GET['id_fix'];

$sql = "SELECT*FROM car WHERE id_car = '$idcar'";
$sqli = "SELECT * FROM fixcar WHERE id_fix = '$id'";

$query = mysqli_query($mysqli, $sql);
$customer = mysqli_query($mysqli, $sqli);
$n = 1;
$c = 1;
?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        </header>
        <div class="container-fluid px-4 mt-n10">
            <div class="card-body" width="400px" height="300px">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="400px" height="450px" cellspacing="0">
                        <div class="card bg-light mb-3">
                            <div class="card bg-light">
                                <div class="card-header text-primary bg-light">งานติดต่อ #00<?=$id;?></div>
                                <div class="card-body">
                                    <div class="container overflow-hidden">
                                        <?php while ($row = mysqli_fetch_array($query)){?>
                                        <div class="row gx-5">
                                            <div class="col">
                                                <label for="" class="fs-6 text-gray-600">รุ่น/ยี่ห้อรถ</label><br>
                                                <label for=""
                                                    class="fw-700"><?=$row['c_series'];?>/<?=$row['c_gen'];?></label>
                                            </div>
                                            <div class="col">
                                                <label for="" class="fs-6 text-gray-600">เลขทะเบียน</label><br>
                                                <label for=""><?=$row['c_number'];?></label>
                                            </div>
                                            <div class="col">
                                                <?php while ($rw = mysqli_fetch_array($customer)){ ?>
                                                <label for="" class="fs-6 text-gray-600">ชื่อลูกค้า</label><br>
                                                <label for=""><?=$rw['f_name'];?></label>
                                                <?php } ?>
                                            </div>
                                            <div class="col">
                                                <label for="" class="fs-6 text-gray-600">ประกันภัย</label><br>
                                                <?php 
                                                $sqlinsr = "SELECT * FROM insurance WHERE id_car = '$idcar'";
                                                $resultinsr = mysqli_query($mysqli,$sqlinsr);
                                                while ($rrow_in = mysqli_fetch_array($resultinsr)) {
                                                ?>
                                                <label for=""><?=$rrow_in['sr_name'];?></label>
                                                <?php } ?>
                                            </div>
                                        </div><br>
                                        <div class="row gx-5">
                                            <div class="col">
                                                <?php 
                                            $sq = "SELECT * FROM fixcar WHERE id_fix = '$id'";
                                            $res = mysqli_query($mysqli,$sq);
                                            while ($in = mysqli_fetch_array($res)) {
                                            ?>
                                                <label for="" class="fs-6 text-gray-600">วันที่ติดต่อ</label><br>
                                                <label for=""><?=$in['f_datecom'];?></label>
                                                <?php } ?>
                                            </div>
                                            <div class="col">
                                                <label for="" class="fs-6 text-gray-600">ยอดสุทธิ(บ.)</label><br>
                                                <?php 
                                                $sqs = "SELECT SUM(p_price) FROM parts WHERE id_car = '$idcar'";
                                                $res = mysqli_query($mysqli,$sqs);
                                                while ($ro = mysqli_fetch_array($res)) {
                                                    if ($ro[0] == 0){
                                                        echo "0.00 บาท";
                                                    }else{ ?>
                                                <label for=""><?=$ro[0];?> บาท</label>
                                                <?php
                                                    }
                                                ?>
                                                <?php } ?>
                                            </div>
                                            <div class="col">
                                                <label for="" class="fs-6 text-gray-600">สถานะงาน</label><br>

                                                <?php 
                                                    if ($row['type_idfix'] == 1){
                                                        echo "<label for=''><button class='btn btn-cyan btn-sm'
                                                        type='button'>สร้างใหม่</button></label>";
                                                    }else if ($row['type_idfix'] == 2){
                                                        echo "<label for=''><button class='btn btn-warning btn-sm'
                                                        type='button'>กำลังซ่อม</button></label>";
                                                    }else if ($row['type_idfix'] == 3){
                                                        echo "<label for=''><button class='btn btn-green btn-sm'
                                                        type='button disabled'>ซ่อมเสร็จ</button></label>";
                                                    }else if ($row['type_idfix'] == 4){
                                                        echo "<label for=''><button class='btn btn-orange btn-sm'
                                                        type='button'>รอการชำระ</button></label>";
                                                    }else if ($row['type_idfix'] == 5){
                                                        echo "<label for=''><button class='btn btn-indigo btn-sm'
                                                        type='button'>ชำระเรียบร้อย</button></label>";
                                                    }else if ($row['type_idfix'] == 6){
                                                        echo "<label for=''><button class='btn btn-dark btn-sm'
                                                        type='button'>ระงับ</button></label>";
                                                    }
                                                ?>

                                            </div>
                                        </div>
                                        <br>
                                        <div class="row gx-5" align="center">
                                            <div class="col-md4">
                                                <label for="" class="fs-6 text-gray-600">รูปรถยนต์</label><br>
                                                <?php
                                            if($row['c_pic'] == 0){
                                                echo "<label>ยังไม่มีรูป</label>";
                                            }else{ ?>
                                                <img src="img/car/<?= $row['c_pic']; ?>" class="rounded" width="100px"
                                                    height="100px" style="margin-bottom: 20px;">
                                                <?php
                                                }
                                            ?>
                                                <br>
                                                <a href="" class="btn btn-warning btn-sm" type="button">แก้ไขรูป</a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="card-footer bg-gradient-primary-to-secondary">
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4" align="left">
                                        <a href="" class="btn btn-light btn-sm text-end shadow lift"
                                                type="button">พิมพ์ใบเสนอราคา</a>
                                        </div>
                                        <div class="col-md-8" align="right">
                                        <div class="dropdown">
                                            <label for="" class="text-xs text-light">บันทึกข้อมูลและเปลี่ยนสถานะงานเป็น</label>
                                            <button class="btn btn-light dropdown-toggle btn-sm" id="dropdownFadeIn"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">สถานะงาน</button>
                                            <div class="dropdown-menu animated--fade-in"
                                                aria-labelledby="dropdownFadeIn">
                                                <a class="dropdown-item" href="update1.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">สร้างใหม่</a>
                                                <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#fixcar">ทำการซ่อม</a>
                                                <a class="dropdown-item" href="update3.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ซ่อมสำเร็จ</a>
                                                <a class="dropdown-item" href="update4.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ออกใบแจ้งหนี้</a>
                                                <hr>
                                                <a class="dropdown-item" href="update5.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ระงับการใช้งาน</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal insert -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพ</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="edit_piccar.php" method="post"
                                                    enctype="multipart/form-data">
                                                    <div class="row gx-4 md-4">
                                                        <div class="col-md-6">
                                                            <label for="">ชื่อ:</label>
                                                            <input class="form-control" type="text" name="name"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-4 md-4">
                                                        <div class="col-md-4">
                                                            <label for="">ราคา:</label>
                                                            <input class="form-control" type="number" name="price"
                                                                placeholder="0.00" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">จำนวน:</label>
                                                            <input class="form-control" type="number" name="amo"
                                                                value="1" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">ประเภท:</label>
                                                            <select class="form-control" name="type" id="type" required>
                                                                <option value="1">เครื่องยนต์</option>
                                                                <option value="2">ช่วงล่าง</option>
                                                                <option value="3">ตัวถัง</option>
                                                                <option value="4">ล้อ</option>
                                                                <option value="5">อื่นๆ</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="">รูป:</label>
                                                            <input class="form-control" type="file" name="pic" id="pic"
                                                                required>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary"
                                                    type="submit">บันทึก</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="" class="text-red text-xs">หมายเหตุ :
                            การตรวจเช็คขั้นต้นไปเมนู รายการซ่อม เพื่อทำการสร้างใบเสนอราคา</label><br><br>
                        <!-- detail body -->
                        <?php include('detail-body.php'); ?>
                </div>
                </table>
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