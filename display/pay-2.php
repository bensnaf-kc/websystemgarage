<?php 
include('header.php'); 
include('../backend/connect.php');

$sql = "SELECT * FROM `fixcar` WHERE type_idfix = '5'";
$query = mysqli_query($mysqli,$sql);
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
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
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="dollar-sign"></i></div>
                                การชำระเงิน
                            </h1>
                            <div class="page-header-subtitle">
                                รายละเอียดการชำระของลูกค้า</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">รายะลเอียดการชำระเงิน &nbsp;
                <a href="pay_wait.php" class="btn btn-outline-warning shadow lift">รอการชำระ</a>
                <a href="pay_wait.php" class="btn btn-outline-success shadow lift">ชำระเงินเรียบร้อย</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>วันที่มาติดต่อ</th>
                                    <th>สถานะ</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>วันที่มาติดต่อ</th>
                                    <th>สถานะ</th>
                                    <th class="text-center">ดำเนินการ</th>
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
                                    <td>
                                        <?php
                                            if($row['type_idfix'] == 4){
                                                echo "<div class='badge bg-warning text-while rounded-pill'>รอการชำระเงิน</div>";
                                            }elseif($row['type_idfix'] == 5){
                                                echo "<div class='badge bg-success text-while rounded-pill'>ชำระเงินเรียบร้อย</div>";
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--  -->
                                        <a href="list_car.php?id_fix=<?=$row['id_fix'];?>"
                                            class="btn btn-warning btn-sm shadow-lg lift"
                                            role="button">ดำเนินการ</a>
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