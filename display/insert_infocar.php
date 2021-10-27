<?php 
include('header.php'); 
include('../backend/connect.php');
$idcar = $_GET['id_car'];
$id = $_GET['id_fix'];
?>

<div id="layoutSidenav_content">
    <main>
    <?php
            $idweb = $_SESSION['id'];
            $sql_color = "SELECT * FROM user WHERE user_id = '$idweb'";
            $qty_color = mysqli_query($mysqli,$sql_color);
            while($color = mysqli_fetch_array($qty_color)){ 
                    $type = $color['web_type'];
            }
        ?>
        <?php 
            if($type == 1){
                echo "<header class='page-header page-header-dark bg-gradient-default pb-10'>";
            }
            if($type == 2){
                echo "<header class='page-header page-header-dark bg-gradient-sunset pb-10'>";
            }
            if($type == 3){
                echo "<header class='page-header page-header-dark bg-gradient-subtle pb-10'>";
            }
            if($type == 4){
                echo "<header class='page-header page-header-dark bg-gradient-emerald pb-10'>";
            }
        ?>
        </header>
        <div class="container-fluid px-4 mt-n10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <div class="card bg-light mb-3">
                            <div class="card-header"><b>เพิ่มสาเหตุ/อาการ</b> <a href="detail.php?id_fix=<?=$id;?>&id_car=<?=$idcar;?>" class="btn btn-danger shadow lift">ย้อนกลับ</a></div>
                            <div class="card-body">
                                <form action="add_checkcar.php?id_fix=<?=$id;?>&id_car=<?=$idcar;?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="from-row">
                                        <div class="col-4 col-md-2">
                                            <label for="">สาเหตุ :
                                            </label>
                                            <input type="test" id="name" name="name" class="form-control">
                                            <label for="">ราคา :
                                            </label>
                                            <input type="number" id="p_part" name="p_part" class="form-control" value=""
                                                placeholder="0.00">
                                            <label for="">จำนวนอะไหล่ :
                                            </label>
                                            <input type="number" id="amo" name="amo" class="form-control" value="1">
                                            <br>
                                            <button class="btn btn-primary" type="submit">บันทึก</button>
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