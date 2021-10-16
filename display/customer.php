<?php 
include('header.php'); 
include('../backend/connect.php');

$sql = "SELECT * FROM fixcar WHERE type_idfix = '1'";
$query = mysqli_query($mysqli,$sql);
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
                                ลูกค้าที่มาติดต่อ
                            </h1>
                            <div class="page-header-subtitle">
                                รายละเอียดลูกค้าที่ทำการมาติดต่อขอการซ่อมหรือตรวจเช็คสภาพรถยนต์</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">รายะลเอียดข้อมูลลูกค้า</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>วันที่มาติดต่อ</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>วันที่มาติดต่อ</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                            while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                <tr>
                                    <td class="text-danger">#00<?=$row['id_fix'];?></td>
                                    <td><?=$row['f_name'];?></td>
                                    <td><?=$row['f_datecom'];?></td>
                                    <td><?=$row['f_tel'];?></td>
                                    <td class="text-center">
                                        <!--  -->
                                        <a href="list_car.php?id_fix=<?=$row['id_fix'];?>"
                                            class="btn btn-warning btn-sm shadow-lg lift"
                                            role="button">รถยนต์</a>
                                        <a href="list_car.php?id_fix=<?=$row['id_fix'];?>"
                                            class="btn btn-dark btn-sm shadow-lg lift "
                                            role="button">ระงับ</a>
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