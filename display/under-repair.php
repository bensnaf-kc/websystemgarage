<?php
include('header.php');
include('../backend/connect.php');

$sql = "SELECT * FROM car WHERE type_idfix = '2' AND user_id = '$user'";
$query = mysqli_query($mysqli, $sql);
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
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
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-car"></i></div>
                            รถยนต์ที่กำลังทำการซ่อม
                        </h1>

                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">รายละเอียดการซ่อม</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสรถยนต์</th>
                                    <th>เลขทะเบียน</th>
                                    <th>รุ่น/ยี่ห้อ</th>
                                    <th>ผู้รับผิดชอบ</th>
                                    <th>วันนัดรับรถ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสรถยนต์</th>
                                    <th>เลขทะเบียน</th>
                                    <th>รุ่น/ยี่ห้อ</th>
                                    <th>ผู้รับผิดชอบ</th>
                                    <th>วันนัดรับรถ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td class="text-danger"><?= $row['c_id']; ?></td>
                                        <td><?= $row['c_number']; ?></td>
                                        <td><?= $row['c_series']; ?>/<?= $row['c_gen']; ?></td>
                                        <?php
                                            $sql_respon = "SELECT * FROM oder_repair WHERE id_car = '$row[0]'";
                                            $qty_respon = mysqli_query($mysqli, $sql_respon);
                                            $respon = mysqli_fetch_array($qty_respon);
                                        ?>
                                        <td class="text-blue"><?=$c++;?>.<?= $respon['or_name']; ?></td>
                                        <td><?= $respon['dateout']; ?></td>
                                        <td class="text-center">
                                            <!--  -->
                                            <a href="list_car.php?id_fix=<?= $row['id_fix']; ?>" class="btn btn-warning btn-sm shadow-lg lift" role="button">รถยนต์</a>
                                            <a href="suspend_car.php?id_car=<?= $row['id_car']; ?>" class="btn btn-dark btn-sm shadow-lg lift " role="button">ระงับ</a>
                                            <!-- <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button> -->
                                        </td>
                                    </tr>
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