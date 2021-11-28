<?php
include('header.php');
include('../backend/connect.php');
$idcar = $_GET['id_car'];
$id = $_GET['id_fix'];

$sql = "SELECT * FROM oder_repair WHERE id_car = '$idcar'";
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
                            ดำเนินการซ่อม #00<?= $id; ?>
                        </div>
                        <div class="col" align="right">
                            <!-- Button repair -->
                            <button class="btn btn-warning shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#list-repair"><i class="fas fa-plus"></i>&nbsp;เพิ่มผู้รับผิดชอบ/ช่าง</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>แผนก</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>$</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>แผนก</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $n++; ?></td>
                                        <td><?= $row['or_name']; ?></td>
                                        <td>
                                            <?php
                                            if ($row['or_depart'] == 1) {
                                                echo "<div class='badge bg-red text-while rounded-pill' type=''>ช่างเครื่องยนต์</div>";
                                            } elseif ($row['or_depart'] == 2) {
                                                echo "<div class='badge bg-cyan text-while rounded-pill' type=''>ช่างไฟฟ้า</div>";
                                            } elseif ($row['or_depart'] == 3) {
                                                echo "<div class='badge bg-indigo text-while rounded-pill' type=''>ช่างช่วงล่าง</div>";
                                            } elseif ($row['or_depart'] == 4) {
                                                echo "<div class='badge bg-dark text-while rounded-pill' type=''>ช่างการยาง</div>";
                                            } elseif ($row['or_depart'] == 5) {
                                                echo "<div class='badge bg-teal text-while rounded-pill' type=''>ช่วงตรวจสภาพ</div>";
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <!-- edit listrepair -->
                                            <button class="btn btn-outline-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $row[0]; ?>">แก้ไข</button>
                                        </td>
                                    </tr>
                                    <!-- edit repair -->
                                    <div class="modal fade" id="edit<?= $row[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้รับผิดชอบ/ช่าง</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="edit_confixcar.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>&or_id=<?= $row[0]; ?>" method="post">
                                                        <div class="row">
                                                            <?php
                                                            $sql_repair = "SELECT * FROM oder_repair WHERE or_id = '" . $row[0] . "'";
                                                            $qty_repair = mysqli_query($mysqli, $sql_repair);
                                                            $result = mysqli_fetch_array($qty_repair);
                                                            ?>
                                                            <div class="col-md-10">
                                                                <label for="">ผู้รับผิดชอบ/ช่าง:</label><br>
                                                                <input type="text" class="form-control" name="tech" value="<?= $result['or_name']; ?>">
                                                            </div><br>
                                                            <div class="col-md-10">
                                                                <label for="">แผนก:</label><br>
                                                                <select name="dep" id="dep" class="form-control" required>
                                                                    <?php
                                                                        if ($row['or_depart'] == 1) {
                                                                            echo "<option value='1'>ช่างเครื่องยนต์</option>";
                                                                        } elseif ($row['or_depart'] == 2) {
                                                                            echo "<option value='2'>ช่างไฟฟ้า</option>";
                                                                        } elseif ($row['or_depart'] == 3) {
                                                                            echo "<option value='3'>ช่างช่วงล่าง</option>";
                                                                        } elseif ($row['or_depart'] == 4) {
                                                                            echo "<option value='4'>ช่างการยาง</option>";
                                                                        } elseif ($row['or_depart'] == 5) {
                                                                            echo "<option value='5'>ช่วงตรวจสภาพ</option>";
                                                                        }
                                                                    ?>
                                                                    <option value=""></option>
                                                                    <option value="1">ช่างเครื่องยนต์</option>
                                                                    <option value="2">ช่างไฟฟ้า</option>
                                                                    <option value="3">ช่างช่วงล่าง</option>
                                                                    <option value="4">ช่างการยาง</option>
                                                                    <option value="5">ช่วงตรวจสภาพ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">เพิ่ม</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer" align="right">
                    <div><button class="btn btn-success shadow lift" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">ต่อไป&nbsp;<i class="fas fa-arrow-circle-right"></i></button></div>
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
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้รับผิดชอบ/ช่าง</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_confixcar.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="">ผู้รับผิดชอบ/ช่าง:</label><br>
                            <select name="tech" id="tech" class="form-control" required>
                                <?php
                                $sql_tec = "SELECT * FROM technician";
                                $qty_tec = mysqli_query($mysqli, $sql_tec);
                                while ($row_tec = mysqli_fetch_array($qty_tec)) {;
                                ?>
                                    <option value="<?= $row_tec['tc_name']; ?>"><?= $row_tec['tc_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div><br>
                        <div class="col-md-10">
                            <label for="">แผนก:</label><br>
                            <select name="dep" id="dep" class="form-control" required>
                                <option value="1">ช่างเครื่องยนต์</option>
                                <option value="2">ช่างไฟฟ้า</option>
                                <option value="3">ช่างช่วงล่าง</option>
                                <option value="4">ช่างการยาง</option>
                                <option value="5">ช่วงตรวจสภาพ</option>
                            </select>
                        </div>
                    </div><br>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <label for="">วันรับรถยนต์:</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                    </div> -->
            </div>
            <div class="modal-footer"><button class="btn btn-light shadow lift" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">เพิ่ม</button></form></div>
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
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-success shadow lift" type="submit">เสร็จสิ้น</button></form></div>
        </div>
    </div>
</div>