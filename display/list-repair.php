<?php
include('header.php');
include('../backend/connect.php');
$idcar = $_GET['id_car'];
$id = $_GET['id_fix'];

$sql = "SELECT * FROM parts WHERE id_car = '$idcar'";
$query = mysqli_query($mysqli, $sql);
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
$n = 1;

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
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <!-- <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                ลูกค้าที่มาติดต่อ
                            </h1>
                            <div class="page-header-subtitle">
                                รายละเอียดลูกค้าที่ทำการมาติดต่อขอการซ่อมหรือตรวจเช็คสภาพรถยนต์</div>
                        </div>
                    </div> -->
            </div>
        </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <a href="detail.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-danger shadow lift"><i class="fas fa-arrow-circle-left"></i>&nbsp;ย้อนกลับ</a>
            <a href="bill_testcar.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-light  text-end shadow lift" type="button"><label class="text-info"><i class="fas fa-print"></i></label>&nbsp;&nbsp;สร้างใบเสนอราคา</a>
            <div class="card mb-4">

                <div class="card-header">
                    <div class="row">
                        <div class="col" align="left">
                            รายการซ่อม #00<?= $id; ?>
                        </div>
                        <div class="col text-dark" align="center">
                            ราคารวม
                            <?php
                            $sql_result = "SELECT SUM(p_price) FROM parts WHERE id_car = '$idcar'";
                            $qty_result = mysqli_query($mysqli, $sql_result);
                            $sum = mysqli_fetch_array($qty_result);
                            if ($sum == 0) {
                                echo "<label class='badge bg-red text-while rounded-pill'>0.00 บาท</label>";
                            } else {
                                echo "<label class='badge bg-red text-while rounded-pill'>" . $sum[0] . ".00 บาท</label>";
                            }
                            ?>
                        </div>
                        <div class="col" align="right">
                            <!-- Button repair -->

                            <button class="btn bg-primary text-white shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#list-repair"><i class="fas fa-plus"></i>&nbsp;เพิ่มอะไหล่</button>
                            <button class="btn btn-primary text-white shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#p-car"><i class="fas fa-plus"></i>&nbsp;เพิ่มค่าแรง</button>
                            <button class="btn bg-primary text-white shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#list-product"><i class="fas fa-plus"></i>&nbsp;เพิ่มอะไหล่ในคลัง</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">

                                <tr>
                                    <th>#</th>
                                    <th>รายการ/อะไหล่</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>$</th>
                                    <th>รายการ/อะไหล่</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $row['p_name']; ?></td>
                                        <td><?= $row['p_amount']; ?></td>
                                        <td><?= $row['p_price']; ?></td>
                                        <td class="text-center">
                                            <!-- edit listrepair -->
                                            <button class="btn btn-outline-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $row[0]; ?>">แก้ไข</button>
                                            <a href="del_listrepair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>&pt_id=<?= $row[0]; ?>" class="btn btn-danger shadow lift btn-sm">ลบ</a>
                                        </td>
                                    </tr>
                                    <!-- edit repair -->
                                    <div class="modal fade" id="edit<?= $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการซ่อม</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                                        <div class="row">
                                                            <?php
                                                            $sql_repair = "SELECT * FROM parts WHERE pt_id = '" . $row[0] . "'";
                                                            $qty_repair = mysqli_query($mysqli, $sql_repair);
                                                            $result = mysqli_fetch_array($qty_repair);
                                                            ?>
                                                            <div class="col-md-10">
                                                                <label for="list">รายการ / อะไหล่:</label><br>
                                                                <input type="text" class="form-control" name="list" id="list" value="<?= $result[2]; ?>" required>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">จำนวน:</label>
                                                                <input type="number" class="form-control" name="amot" value="<?= $result[4]; ?>" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">ราคา:</label>
                                                                <input type="number" class="form-control" name="price" value="<?= $result[3]; ?>" required>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">เพิ่ม</button></form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </tbody>
                        </table>
                        <label class="text-xs text-red">หมายเหตุ : ค่าแรงสามารถเพิ่มในการซ่อมใหม่</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div align="right">
                        <a href="confixcar.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-success shadow lift">ต่อไป&nbsp;<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php include('footer.php'); ?>

<!-- รายการซ่อม -->

<div class="modal fade" id="list-repair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการเปลี่ยนอะไหล่</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="add_repair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post" >
                <div class="modal-body" id="dyc">
                    <!-- <div class="row">
                        <div class="col-md-4">
                            <input type="checkbox" name="list[]" value="ค่าแรง">
                            <label for="">ค่าแรง</label>
                            <input type="text" class="form-control" name="price[]" min="1" placeholder="0.00">
                        </div>
                    </div><hr> -->
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">ภายนอก</label>

                        </div>
                        <div class="col-md-4">
                            <label for="">จำนวน:</label>
                        </div>
                        <div class="col-md-4">
                            <label for="">ราคา:</label>
                        </div>
                    </div>
                    <hr>
                    <div class="row ">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_1" type="checkbox" value="สีรถ" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">สีรถ</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_1"  min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_1" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_2" type="checkbox" value="ยาง" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ยาง</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_2" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_2" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_3" type="checkbox" value="กระจก" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">กระจก</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_3"  min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_3" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_4" type="checkbox" value="ไฟ" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ไฟ</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_4" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_4" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_5" type="checkbox" value="ประตู/กระโปรง" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ประตู/กระโปรง</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_5" min="1" value="1" placeholder="0" disabled >
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_5" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label for="">ภายใน</label>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_6" type="checkbox" value="เบาะ" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">เบาะ</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_6" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_6" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_7" type="checkbox" value="หน้าปัด" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">หน้าปัด</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_7" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_7" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_8" type="checkbox" value="ช่องเก็บของ" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ช่องเก็บของ</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_8" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_8" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_9" type="checkbox" value="คอนโซน" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">คอนโซน</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_9" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_9" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label for="">ระบบไฟฟ้า</label>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_10" type="checkbox" value="ไฟหน้า" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ไฟหน้า</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_10" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_10" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_11" type="checkbox" value="ไฟหลัง" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ไฟหลัง</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_11" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_11" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_12" type="checkbox" value="แอร์" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">แอร์</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_12" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_12" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_13" type="checkbox" value="ที่ปัดน้ำฝน" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">ที่ปัดน้ำฝน</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_13" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_13" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_14" type="checkbox" value="กระจกไฟฟ้า" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">กระจกไฟฟ้า</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_14"  min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_14" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label for="">ห้องเครื่อง</label>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_15" type="checkbox" value="น้ำมันเบรค" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">น้ำมันเบรค</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_15" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_15" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_16" type="checkbox" value="น้ำมันเครื่อง" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">น้ำมันเครื่อง</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_16" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_16" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_17" type="checkbox" value="น้ำมันเกียร์" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">น้ำมันเกียร์</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_17" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_17" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_18" type="checkbox" value="สายพาน" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">สายพาน</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_18" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_18" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" id="chk_19" type="checkbox" value="หม้อน้ำ" name="list[]">
                                <label class="form-check-label" for="flexCheckDefault">หม้อน้ำ</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input type="number" class="form-control" name="amot[]" id="am_19" min="1" value="1" placeholder="0" disabled>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="price[]" id="pr_19" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label for="">อื่นๆ</label>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="list">รายการ / อะไหล่:</label><br>
                        </div>
                        <div class="col-md-2">
                            <label for="">จำนวน:</label>
                        </div>
                        <div class="col-md-2">
                            <label for="">ราคา:</label>
                        </div>
                    </div>

                    <div class="row" id="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control name_list" name="list[]" id="list" placeholder="กรุณาใส่ข้อมูล">

                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="amot[]" placeholder="0" min="1">
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="price[]" placeholder="0.00" min="1">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning shadow lift btn-sm" name="add" id="add">+</button>
                        </div>
                    </div>

                </div>
                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" name="btn-sub" type="submit">เพิ่ม</button>
                </div>
            </form>
            <script>
                //  $(function() {
                //         $("#lt").click(function() { // เมื่อคลิกที่ checkbox id=i_accept
                //             if ($(this).prop("checked") == true) { // ถ้าเลือก
                //                 $("#am").removeAttr("disabled"); // ให้ปุ่ม id=continue_bt ทำงาน สามารถคลิกได้
                //                 $("#pr").removeAttr("disabled");
                //             } else { // ยกเลิกไม่ทำการเลือก
                //                 $("#am").attr("disabled", "disabled");
                //                 $("#pr").attr("disabled", "disabled"); // ให้ปุ่ม id=continue_bt ไม่ทำงาน
                //             }
                //         });
                //     });
                // $(':checkbox').change(function() {
                //     $(this)
                //         .closest(".col-lg-3")
                //         .find("[name=ex_code]")
                //         .prop('disabled', !$(this).is(':checked'));
                //     });
                $(':checkbox').change(function() {
                    var chk_id = $(this).attr('id');
                    var id = chk_id.split("_");
                    var real_id = id[1];
                    if($("#chk_"+real_id).is(':checked')){
                        $("#am_"+real_id).prop('disabled', false);
                        $("#pr_"+real_id).prop('disabled', false);
                    }
                    else {
                        $("#am_"+real_id).prop('disabled', true);
                        $("#pr_"+real_id).prop('disabled', true);
                    }
                });
            </script>
            <script>
                $(document).ready(function() {
                    let i = 1;
                    $("#add").click(function() {
                        i++;
                        $("#dyc").append('<div class="row" id="row' + i + '"><div class="col-md-4"><input type="text" class="form-control name_list" name="list[]" id="list" placeholder="กรุณาใส่ข้อมูล" ></div><div class="col-md-2"><input type="number" class="form-control" name="amot[]" placeholder="0" min="1" ></div><div class="col-md-2"><input type="number" class="form-control" name="price[]" placeholder="0.00" min="1" ></div><div class="col-md-2"><button type="button" class="btn btn-danger shadow lift btn-sm btn_remove" name="remove" id="' + i + '">-</button></div></div>')
                    })
                    $(document).on('click', '.btn_remove', function() {
                        let btn_id = $(this).attr('id');
                        $('#row' + btn_id + '').remove();
                    })
                   
                })
            </script>
        </div>
    </div>
</div>

<!-- สินค้าในคลัง -->
<div class="modal fade" id="list-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการซ่อม</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="add_repairstore.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>&store_id=<?= $store[0] ?>" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="list" class="control-label">เลือกสินค้า/อะไหล่:</label><br>

                            <select name="list" id="list" class="form-control">
                                <?php
                                $sql_store = "SELECT * FROM store";
                                $qty_store = mysqli_query($mysqli, $sql_store);
                                while ($store = mysqli_fetch_array($qty_store)) {
                                ?>
                                    <option value="<?= $store['s_name']; ?>" class="form-control"><?= $store['s_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="control-form-label">จำนวน:</label><br>
                            <input type="number" name="amot" id="amot" required class="form-control" placeholder="0" min="1" value="1">
                        </div>

                    </div><br>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">เพิ่ม</button></form>
            </div>
        </div>
    </div>
</div>

<!-- ต่อไป -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ดำเนินการซ่อม</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="comple_fixcar.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                            <label for="date">วันรับรถยนต์:</label>
                            <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-success shadow lift" type="submit">เสร็จสิ้น</button></form>
            </div>
        </div>
    </div>
</div>

<!-- ค่าแรง -->
<div class="modal fade" id="p-car" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มค่าแรง</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="add_repairs.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                            <label for="date">ค่าแรง:</label>
                            <input type="number" class="form-control" name="p_car" id="p_car" min="1" placeholder="0.00" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">บันทึก</button></form>
            </div>
        </div>
    </div>
</div>