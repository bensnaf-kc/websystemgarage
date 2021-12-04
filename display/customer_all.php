<?php 
include('header.php'); 
include('../backend/connect.php');
$idweb = $_SESSION['id'];

$sql = "SELECT * FROM fixcar WHERE user_id = '$idweb'";
$query = mysqli_query($mysqli,$sql);
// while ($result = mysqli_fetch_array($query)){
//     $id = $result[0];
// }
?>

<div id="layoutSidenav_content">
    <main>
    <?php
            
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
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                ข้อมูลลูกค้าลูกค้า
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
                <div class="card-header">รายละเอียดข้อมูลลูกค้า</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead class="text-dark">
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>ไอดีไลน์</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th>สถานะ</th>
                                    <th class="text-center">ดำเนินการ/ระงับ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>ไอดีไลน์</th>
                                    <th>เบอร์ติดต่อ</th>
                                    <th>สถานะ</th>
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
                                    <td><?=$row['f_line'];?></td>
                                    <td><?=$row['f_tel'];?></td>
                                    <td>
                                        <?php
                                            if ($row['type_idfix'] == 1) {
                                                echo "<div class='badge bg-green text-while rounded-pill'>ใช้บริการ</div>";
                                            } elseif ($row['type_idfix'] == 2) {
                                                echo "<div class='badge bg-dark text-while rounded-pill'>ระงับกาารใช้งาน</div>";
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <!--  -->
                                        <a href="list_car.php?id_fix=<?=$row['id_fix'];?>"
                                            class="btn btn-warning btn-sm shadow-lg lift"
                                            role="button">รถยนต์</a>
                                        <?php
                                            $sql_sus = "SELECT * FROM fixcar WHERE user_id = '$user'";
                                            $qty_sus = mysqli_query($mysqli,$sql_sus);
                                            $sus = mysqli_fetch_array($qty_sus);
                                            if($sus['type_idfix'] == 1){
                                        ?>
                                                <a href="suspend.php?id_fix=<?=$row['id_fix'];?>"
                                                class="btn btn-dark btn-sm shadow-lg lift"
                                                role="button">ระงับ</a>
                                        <?php }else{ ?>
                                            <a href="suspend_ac.php?id_fix=<?=$row['id_fix'];?>"
                                                class="btn btn-success btn-sm shadow-lg lift"
                                                role="button">ใช้งาน</a>
                                        <?php } ?>
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