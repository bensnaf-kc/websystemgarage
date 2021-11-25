<?php 
include('header.php'); 
include('../backend/connect.php');
?>

<div id="layoutSidenav_content">
    <main>
    <?php
        $idweb = $_SESSION['id'];
        $sql_color = "SELECT * FROM user WHERE user_id = '$idweb'";
        $qty_color = mysqli_query($mysqli, $sql_color);
        while ($color = mysqli_fetch_array($qty_color)) {
            $type = $color['web_type'];
        }
        ?>
        <?php
        if ($type == 1) {
            echo "<header class='page-header page-header-dark bg-gradient-default pb-10'>";
        }
        if ($type == 2) {
            echo "<header class='page-header page-header-dark bg-gradient-sunset pb-10'>";
        }
        if ($type == 3) {
            echo "<header class='page-header page-header-dark bg-gradient-subtle pb-10'>";
        }
        if ($type == 4) {
            echo "<header class='page-header page-header-dark bg-gradient-emerald pb-10'>";
        }
        ?>
        </header><br><br>
        <div class="container-fluid px-4 mt-n10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <div class="card bg-light mb-3">
                            <div class="card-header ">สร้างงานติดต่อ</div>
                            <div class="card-body">
                                <form action="insert_customers.php" method="post">
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
                                                name="check" id="check" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">ค้นหา/เพิ่ม</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- <form action="insert_cuss.php" method="post">
                                    <button class="btn btn-primary" type="submit">เพิ่ม</button>
                                </form> -->
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
<?php include('footer.php'); ?>