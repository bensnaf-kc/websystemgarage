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
                            <button class="btn bg-orange text-white shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#list-repair"><i class="fas fa-plus"></i>&nbsp;เพิ่มการซ่อมใหม่</button>
                            <button class="btn bg-yellow text-white shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#list-product"><i class="fas fa-plus"></i>&nbsp;เพิ่มสินค้าในคลัง</button>
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
                                                <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">เพิ่ม</button></form>
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
<?php include('footer.php'); ?>

<!-- รายการซ่อม -->
<div class="modal fade" id="list-repair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการซ่อม</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_repair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="list">รายการ / อะไหล่:</label><br>
                            <input type="text" class="form-control" name="list" id="list" placeholder="กรุณาใส่รายการซ่อม" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">จำนวน:</label>
                            <input type="number" class="form-control" name="amot" placeholder="0" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">ราคา:</label>
                            <input type="number" class="form-control" name="price" placeholder="0.00" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">เพิ่ม</button></form>
            </div>
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
                <?php
                $sql_store = "SELECT * FROM store";
                $qty_store = mysqli_query($mysqli, $sql_store);
                while ($store = mysqli_fetch_array($qty_store)) {
                ?>
                    <form action="add_repairstore.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>&store_id=<?= $store[0] ?>" method="post">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="list" class="control-label">เลือกสินค้า/อะไหล่:</label><br>
                                <select name="list" id="list" class="form-control">
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
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">เพิ่ม</button></form>
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