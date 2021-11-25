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
                                    $qty_result = mysqli_query($mysqli,$sql_result);
                                    $sum = mysqli_fetch_array($qty_result);
                                        if($sum == 0){
                                            echo "<label class='badge bg-red text-while rounded-pill'>0.00 บาท</label>";
                                        }else{
                                            echo "<label class='badge bg-red text-while rounded-pill'>".$sum[0].".00 บาท</label>";
                                        }
                                ?>
                        </div>
                        <div class="col" align="right">
                            <!-- Button repair -->
                            <button class="btn btn-warning shadow lift btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#list-repair"><i class="fas fa-plus"></i>&nbsp;เพิ่มรายการซ่อม</button>
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
                                                    <form action="edit_repair.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>&pt_id=<?=$row[0];?>" method="post">
                                                        <div class="row">
                                                        <?php
                                                            $sql_repair = "SELECT * FROM parts WHERE pt_id = '".$row[0]."'";
                                                            $qty_repair = mysqli_query($mysqli,$sql_repair);
                                                            $result = mysqli_fetch_array($qty_repair);
                                                        ?>
                                                            <div class="col-md-10">
                                                                <label for="list">รายการ / อะไหล่:</label><br>
                                                                <input type="text" class="form-control" name="list" id="list" value="<?=$result[2];?>" required>
                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">จำนวน:</label>
                                                                <input type="number" class="form-control" name="amot" value="<?=$result[4];?>" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">ราคา:</label>
                                                                <input type="number" class="form-control" name="price" value="<?=$result[3];?>" required>
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