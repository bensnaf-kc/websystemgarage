<?php 
include('header.php'); 
include('../backend/connect.php');

if ($_POST['check']!="") {
    $check = $_POST["check"];
    $sql = "SELECT * FROM car WHERE c_number = '$check'";
    $result = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id_fix'];
    }
}else{

}
?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        </header>
        <div class="container-fluid px-4 mt-n10">
            <?php if(!$result || mysqli_num_rows($result) == 0){ ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <div class="card bg-light mb-3">
                            <div class="card-header"><b>สร้างงานติดต่อ</b></div>
                            <div class="card-body">
                                <form  action="insert_customers.php" method="post" >
                                    <label for=""
                                        class="text-danger">หากลูกค้าเคยมาใช้บริการและมีข้อมูลอยู่ในระบบอยู่แล้ว
                                        ระบบสามารถค้นหาและดึงข้อมูลมาจากใบสั่งงานเก่าได้ กรุณากรอกข้อมูลเบื้องต้น
                                    </label>
                                    <label class="text-danger"> หมายเหตุ:
                                        ระบบสามารถค้นหาจากส่วนหนึ่งของหมายเลขทะเบียนได้ เช่น ค้นหา "2345"
                                        จากเลขทะเบียน "1กข2345"</label><br>
                                    <div class="col-md-4 mb-3">
                                        <label for="">หมายเลขทะเบียน:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder=""
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                name="check" id="check">
                                            <div class="input-group-append">

                                                <button class="btn btn-primary" type="submit">ค้นหา</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class='alert alert-warning' role='alert'>
                            <i class="fas fa-exclamation"></i>&nbsp;ไม่พบรายการเก่าที่มีข้อมูลตรงกับที่ระบุ
                            กรุณากรอกข้อมูลด้านล่างเพื่อสร้างแจ้งซ่อมใหม่
                        </div>
                        <!-- enctype="multipart/form-data" -->
                        <div class="card card-body">
                            <form action="add_fix.php" class="was-validated" method="POST"
                                enctype="multipart/form-data" id="myform1">
                                <div class="row gx-4 mb-3">
                                    <div class="col-md-4">
                                        <label for="name" class="col-form-label">ชื่อลูกค้า:</label>
                                        <input class="form-control" id="name" type="text" placeholder="" name="name"
                                            required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email" class="col-form-label">อีเมล์: </label> <label for=""
                                            class="text-primary">name@email.com</label>
                                        <input type="email" class="form-control" id="email" placeholder="" name="email"
                                            required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tel" class=" col-form-label">เบอร์โทร: </label> <label for=""
                                            class="text-primary">0xx-xxx-xxxx</label>
                                        <input type="text" class="form-control" id="tel" placeholder="" name="tel"
                                            onkeyup="autoTab(this)" required />
                                    </div>
                                </div>
                                <div class="row gx-4 mb-3">
                                    <div class="col-md-8">
                                        <label for="address" class=" col-form-label">ที่อยู่:</label>
                                        <input type="text" class="form-control" id="address" placeholder=""
                                            name="address" required>
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for="idline" class=" col-form-label">ไอดีไลน์:</label>
                                        <input type="text" class="form-control" id="idline" placeholder="" name="idline"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row">
                                </div>
                                <div align="center">
                                    <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                    <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
                                </div>
                        </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        <?php
            }else{
                echo "<div class='alert alert-success' role='alert'>
                      <i class='fas fa-check-circle'></i>&nbspมีข้อมูลในระบบแล้วแล้ว
                      </div>";
        ?>
        <?php 
            }
        ?>
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