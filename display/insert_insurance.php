<?php 
include('header.php'); 
include('../backend/connect.php');
$idcar = $_GET['id_car'];
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
                            <div class="card-header"><b>เพิ่มข้อมูลประกันภัย/เครม</b>   <a href="detail.php?id_fix=<?=$id;?>&id_car=<?=$idcar;?>" type="button" class="btn btn-danger shadow lift btn-sm">ย้อนกลับ</a></div>
                            <div class="card-body">
                                <form action="add_insurance.php?id_fix=<?=$id;?>&id_car=<?=$idcar;?>" method="post" enctype="multipart/form-data">
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4">
                                            <label for="insr">บริษัทประกันภัย</label><br>
                                            <select name="insr" id="insr" class="form-control" search="true" required>
                                                <option value="กรุงเทพประกันภัย">กรุงเทพประกันภัย</option>
                                                <option value="เมืองไทยประกันภัย">
                                                    เมืองไทยประกันภัย<i class="fas fa-circle"></i></option>
                                                <option value="อาคเนย์ประกันภัย">อาคเนย์ประกันภัย</option>
                                                <option value="ทิพยประกันภัย">ทิพยประกันภัย</option>
                                                <option value="เมืองไทยประกันชีวิต">เมืองไทยประกันชีวิต</option>
                                                <option value="วิริยะประกันภัย">วิริยะประกันภัย</option>
                                                <option value="สินมั่นคงประกันภัย">สินมั่นคงประกันภัย</option>
                                                <option value="แอลเอ็มจีประกันภัย">แอลเอ็มจีประกันภัย</option>
                                                <option value="เอ็ม เอส ไอ จี">เอ็ม เอส ไอ จี</option>
                                                <option value="สินทรัพย์ประกันภัย">สินทรัพย์ประกันภัย</option>
                                                <option value="มิตรแท้ประกันภัย">มิตรแท้ประกันภัย</option>
                                                <option value="เทเวศประกันภัย">เทเวศประกันภัย</option>
                                                <option value="แอกซ่าประกันภัย">แอกซ่าประกันภัย</option>
                                                <option value="ประกันภัยไทยวิวัฒน์">ประกันภัยไทยวิวัฒน์</option>
                                                <option value="เจนเนอราลี่ประกันภัย">เจนเนอราลี่ประกันภัย</option>
                                                <option value="เคเอสเคประกันภัย">เคเอสเคประกันภัย</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="number">หมายเลขกรมธรรม์</label><br>
                                            <input type="text" class="form-control" id="number" name="number" required>
                                        </div>
                                    </div><br>
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4">
                                            <label for="datein">วันที่เริ่มคุ้มครอง</label><br>
                                            <input type="date" class="form-control" id="datein" name="datein" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dateout">วันที่หมดอายุ</label><br>
                                            <input type="date" class="form-control" id="dateout" name="dateout" required>
                                        </div>
                                    </div><br>
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4">
                                            <label for="numbercam">หมายเลขเคลม</label><br>
                                            <input type="text" class="form-control" id="numbercam" name="numbercam"
                                                required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="peolpel">ฝั่งผู้เอาประกัน</label><br>
                                            <select name="peolpel" id="peolpel" class="form-control" required>
                                                <option value="">เลือก</option>
                                                <option value="ผู้เอาประกัน">ผู้เอาประกัน</option>
                                                <option value="คู่กรณี">คู่กรณี</option>
                                            </select>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">รูปภาพใบเครม</label>
                                            <input type="file" name="pic" id="pic" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary shadow lift">ต่อไป</button>
                                <button type="reset" class="btn btn-secondary shadow lift" data-dismiss="modal">ล้าง</button>
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