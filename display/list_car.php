<?php
include('header.php');
include('../backend/connect.php');

$id = $_GET['id_fix'];
$n = 1;
// $idcar = $_GET['id_car'];
$sql = "SELECT * FROM car WHERE id_fix = '$id'";
$query = mysqli_query($mysqli, $sql);
$carquery = mysqli_query($mysqli, $sql);
while ($car = mysqli_fetch_array($carquery)) {
    $idcar = $car['id_car'];
}
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                รถยนต์
                            </h1>
                            <div class="page-header-subtitle">
                                รายละเอียดรถยนต์ของลูกค้าสร้างใหม่หรือตรวจเช็คสภาพรถยนต์
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">รายละเอียดข้อมูลรถยนต์ &nbsp; <a href="insert_car.php?id_fix=<?= $id; ?>" class="btn btn-outline-warning shadow lift" type="button">+ เพิ่มรถยนต์</a></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>เลขทะเบียน</th>
                                    <th>รุ่น/ยี่ห้อ</th>
                                    <th>สาเหตุ</th>
                                    <th>รูป</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>เลขทะเบียน</th>
                                    <th>รุ่น/ยี่ห้อ</th>
                                    <th>สาเหตุ</th>
                                    <th>รูป</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                    $idcar = $row[0];
                                ?>
                                    <tr>
                                        <td class="text-danger">#00<?= $row['id_fix']; ?></td>
                                        <td><?= $row['c_number']; ?></td>
                                        <td><?= $row['c_series']; ?>/<?= $row['c_gen']; ?></td>
                                        <td class="text-danger">
                                            <?php
                                            $sql_info = "SELECT * FROM infocar WHERE id_car = '$row[0]'";
                                            $qty_info = mysqli_query($mysqli, $sql_info);
                                            while ($row_info = mysqli_fetch_array($qty_info)) {
                                            ?>
                                                <label class="text-dark"><?=$n++;?>.</label><?= $row_info['info_name']; ?>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($row['c_pic'] == NULL) {
                                                echo "ไม่มีรูป";
                                            } else { ?>
                                                <img src="assets/img/car/<?= $row['c_pic']; ?>" class="rounded" alt="" width="85px" height="85px"><br>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-warning btn-sm shadow lift" type="button" data-bs-toggle="modal" data-bs-target="#infocar">+เพิ่มสาเหตุ</button>
                                            <a href="detail.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-info btn-sm shadow-lg lift" role="button">รายละเอียด</a>
                                            <a href="insert_car.php?id_fix=<?= $row['id_fix']; ?>" class="btn btn-dark btn-sm shadow-lg lift " role="button">ระงับ</a>
                                            <!-- <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button> -->
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="infocar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="add_infocar.php?id_fix=<?=$id;?>&id_car=<?=$idcar;?>" method="post">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="">สาเหตู/อาการ:</label><br>
                                                                <input type="text" class="form-control" name="infocar" required />
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-secondary shadow lift" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadow lift" type="submit">บันทึก</button></form>
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