<?php 
include('header.php'); 
include('../backend/connect.php');
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
                                <?php 
                                    $sql = "SELECT * FROM car WHERE id_fix = '$id'";
                                    $qty = mysqli_query($mysqli,$sql);
                                    while($row = mysqli_fetch_array($qty)){
                                ?>
                                <form action="add_car.php?id_fix=<?=$id;?>" class="was-validated" method="POST"
                                    enctype="multipart/form-data" id="myform1">
                                    <div class="row gx-4 mb-4">
                                        <div class="col-md-3">
                                            <label for="numbercar" class="col-form-label">หมายเลขทะเบียน:</label>
                                            <input class="form-control" value="<?=$row['c_number'];?>" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="type" class="col-form-label">จังหวัดเลขทะเบียน:
                                            </label>
                                            <input type="text" value="<?=$row['c_log'];?>" class="form-control" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="series" class="col-form-label">ยี่ห้อ:
                                            </label>
                                            <input type="text" value="<?=$row['c_series'];?>" class="form-control" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="gen" class="col-form-label">รุ่น: </label>
                                            <input class="form-control" type="text" value="<?=$row['c_gen'];?>" disabled />
                                        </div>
                                    </div>
                                    <div class="row gx-4 mb-3">
                                        <div class="col-md-3">
                                            <label for="color" class="col-form-label">สี: </label>
                                            <input type="text" value="<?=$row['c_color'];?>" class="form-control" disabled>
                                        </div>
                                        <div class="col-4">
                                            <label for="">รูปรถยนต์:</label>
                                            <img src="assets/img/car/<?=$row['c_pic'];?>" alt="" style="width: 150px; height:auto;">
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <?php 
                                            $sql_info = "SELECT * FROM infocar WHERE id_car = '$id'"
                                        ?>
                                        <div class="col-md-3">
                                        <label for="">สาเหตุ/อาการ รถยนต์</label>
                                        <button class="btn btn-warning shadow lift" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่มข้อมูล</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">สาเหตุ/อาการ รถยนต์</label>
                                            <input type="text" name="info" class="form-control" required>
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