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
        <?php
        $idweb = $_SESSION['id'];
        $sql_color = "SELECT * FROM user WHERE user_id = '$idweb'";
        $qty_color = mysqli_query($mysqli, $sql_color);
        while ($color = mysqli_fetch_array($qty_color)) {
            $type = $color['web_type'];

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
            </header>
            <div class="container-fluid px-4 mt-n10"><br><br>
                <div class="card-body" width="400px" height="300px">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="400px" height="450px" cellspacing="0">
                            <div class="card bg-light mb-3">
                                <div class="card bg-light">
                                    <div class="card-header text-primary bg-light">งานติดต่อ <label class="text-dark">#00<?= $id; ?></label></div>
                                    <div class="card-body bg-gray-500">
                                        <div class="container">
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                <div class="row">
                                                    <div class="col" align="center">
                                                        <?php
                                                        if ($row['c_pic'] == 0) {
                                                            echo "<label>ยังไม่มีรูป</label>";
                                                        } else { ?>
                                                            <img src="assets/img/car/<?= $row['c_pic']; ?>" class="rounded mx-auto d-block" width="300px" height="300px" >
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="" class="fs-6  text-white form-label">รุ่น</label><br>
                                                                    <label for="" class="text-primary text-xl form-label"><?= $row['c_series']; ?></label>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="" class="fs-6 text-white form-label">ยี่ห้อรถ</label><br>
                                                                    <label for="" class="text-primary text-xl form-label"><?= $row['c_gen']; ?></label>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="" class="fs-6 text-white form-label">เลขทะเบียน</label><br>
                                                                    <label for="" class="text-primary text-xl form-label"><?= $row['c_number']; ?></label>
                                                                </div>
                                                                
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col ">
                                                                    <?php while ($rw = mysqli_fetch_array($customer)) { ?>
                                                                        <label for="" class="fs-6 text-white form-label">ชื่อลูกค้า</label><br>
                                                                        <label for="" class="text-primary text-lg form-label"><?= $rw['f_name']; ?></label>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="" class="fs-6 text-white form-label">ประกันภัย</label><br>
                                                                    <?php
                                                                    $sqlinsr = "SELECT * FROM insurance WHERE id_car = '$idcar'";
                                                                    $resultinsr = mysqli_query($mysqli, $sqlinsr);
                                                                    $rrow_in = mysqli_fetch_array($resultinsr);
                                                                    if ($rrow_in == 0) {
                                                                        echo "ว่าง";
                                                                    } else {
                                                                    ?>
                                                                        <label for="" class="text-primary text-lg form-label"><?= $rrow_in['sr_name']; ?></label>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col">
                                                                    <?php
                                                                    $sq = "SELECT * FROM fixcar WHERE id_fix = '$id'";
                                                                    $res = mysqli_query($mysqli, $sq);
                                                                    while ($in = mysqli_fetch_array($res)) {
                                                                    ?>
                                                                        <label for="" class="fs-6 text-white form-label">วันที่ติดต่อ</label>
                                                                        <label for="" class="text-primary text-lg form-label"><?= $in['f_datecom']; ?></label>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row" align="center">
                                                                <label for="" class="fs-6 text-white form-label">ยอดสุทธิ(บ.)</label>
                                                                <?php
                                                                $sqs = "SELECT SUM(p_price) FROM parts WHERE id_car = '$idcar'";
                                                                $res = mysqli_query($mysqli, $sqs);

                                                                $sql_sr = "SELECT SUM(infois_sum) FROM info_insurance WHERE id_car = '$idcar'";
                                                                $qty_sr = mysqli_query($mysqli, $sql_sr);
                                                                $row_sr = mysqli_fetch_array($qty_sr);
                                                                if ($res) {
                                                                    while ($ro = mysqli_fetch_array($res)) {
                                                                        if ($ro[0] == 0) {
                                                                            echo "<label class='text-primary text-xl form-label'>0.00 บาท</label>";
                                                                        } else { ?>
                                                                            <label for="" class="text-primary text-xl form-label"><?= $ro[0]; ?>.00</label>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    <?php }
                                                                } elseif ($qty_sr) {
                                                                    if ($row_sr[0] == NULL) {
                                                                        echo "<label class='text-primary text-xl form-label'>0.00 บาท</label>";
                                                                    } else { ?>
                                                                        <label for="" class="text-primary text-xl form-label"><?= $row_sr[0]; ?>.00</label>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" align="center">
                                                        <label for="" class="fs-6 text-white form-label">สถานะงาน</label><br>

                                                        <?php
                                                        if ($row['type_idfix'] == 1) {
                                                            echo "<div class='badge bg-warning text-white rounded text-xl'>รอดำเนินการ</div>";
                                                        } else if ($row['type_idfix'] == 2) {
                                                            echo "<div class='badge bg-warning text-white rounded text-xl'>กำลังซ่อม</div>";
                                                        } else if ($row['type_idfix'] == 3) {
                                                            echo "<div class='badge bg-warning text-white rounded text-xl'>ซ่อมเสร็จ</div>";
                                                        } else if ($row['type_idfix'] == 4) {
                                                            echo "<div class='badge bg-warning text-white rounded text-xl'>รอการชำระ</div>";
                                                        } else if ($row['type_idfix'] == 5) {
                                                            echo "<div class='badge bg-warning text-white rounded text-xl'>ชำระเรียบร้อย</div>";
                                                        } else if ($row['type_idfix'] == 6) {
                                                            echo "<div class='badge bg-warning text-white rounded text-xl'>ระงับ</div>";
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="col">

                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php
                                if ($type == 1) {
                                    echo "<div class='card-footer bg-gradient-default'>";
                                }
                                if ($type == 2) {
                                    echo "<div class='card-footer bg-gradient-sunset'>";
                                }
                                if ($type == 3) {
                                    echo "<div class='card-footer bg-gradient-subtle'>";
                                }
                                if ($type == 4) {
                                    echo "<div class='card-footer bg-gradient-emerald'>";
                                }
                            }
                                ?>
                                <div class="row gx-4 md-4">
                                    <div class="col-md-6" align="left">
                                        <?php
                                        $sql_bill = "SELECT * FROM car WHERE id_car = '$idcar'";
                                        $qty_bill = mysqli_query($mysqli, $sql_bill);
                                        $bill = mysqli_fetch_array($qty_bill);
                                        if ($bill['type_idfix'] == 4) {
                                        ?>
                                            <a href="bill.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-light  text-end shadow lift" type="button"><label class="text-info"><i class="fas fa-print"></i></label>&nbsp;&nbsp;พิมพ์ใบเสนอราคา</a>
                                        <?php } else { ?>
                                            <button class="btn btn-light  text-end shadow lift" disabled><label class="text-info"><i class="fas fa-print"></i></label>&nbsp;&nbsp;พิมพ์ใบเสนอราคา</button>
                                        <?php } ?>
                                        <a href="list-repair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-info  text-white  shadow lift"><i class="fas fa-search"></i>&nbsp;รายการซ่อม</a>
                                    </div>
                                    <div class="col-md-6" align="right">
                                        <div class="dropdown">
                                            <label for="" class="text-xs text-light">บันทึกข้อมูลและเปลี่ยนสถานะงานเป็น</label>
                                            <button class="btn btn-light dropdown-toggle shadow lift" id="dropdownFadeIn" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สถานะงาน</button>
                                            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownFadeIn">
                                                <a class="dropdown-item" href="update1.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">สร้างใหม่</a>
                                                <a class="dropdown-item" href="list-repair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ทำการซ่อม</a>
                                                <a class="dropdown-item" href="update3.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ซ่อมสำเร็จ</a>
                                                <a class="dropdown-item" href="update4.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ออกใบแจ้งหนี้</a>
                                                <hr>
                                                <a class="dropdown-item" href="update5.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>">ระงับการใช้งาน</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="" class="text-red text-xs">หมายเหตุ :
                        การตรวจเช็คขั้นต้นไปที่ปุ่ม รายการซ่อม เพื่อเพิ่มรายการซ่อมและทำการสร้างใบเสนอราคา</label><br><br>
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

<!-- รายการซ่อม -->
<div class="modal fade" id="list-repair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">รายการซ่อม <a href="list-repair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-warning btn-sm shadow lift">+เพิ่มรายการซ่อม</a></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div>

                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-dark" type="button" data-bs-dismiss="modal">ปิด</button></div>
        </div>
    </div>
</div>

<!-- Modal insert -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="edit_piccar.php" method="post" enctype="multipart/form-data">
                    <div class="row gx-4 md-4">
                        <div class="col-md-6">
                            <label for="">ชื่อ:</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>
                    <div class="row gx-4 md-4">
                        <div class="col-md-4">
                            <label for="">ราคา:</label>
                            <input class="form-control" type="number" name="price" placeholder="0.00" required>
                        </div>
                        <div class="col-md-4">
                            <label for="">จำนวน:</label>
                            <input class="form-control" type="number" name="amo" value="1" required>
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
                            <input class="form-control" type="file" name="pic" id="pic" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">บันทึก</button></div>
            </form>
        </div>
    </div>
</div>