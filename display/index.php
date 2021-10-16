<?php 
include('../backend/connect.php'); 
include('header.php'); 

$sqlwait = "SELECT * FROM fixcar WHERE type_idfix = '1'";
$resultwait = mysqli_query($mysqli,$sqlwait);
$countwait = mysqli_num_rows($resultwait);
$sql_wait = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '1'";
$result_wait = mysqli_query($mysqli,$sql_wait);
// $count_wait = mysqli_num_rows($result_wait);

$sqlfix = "SELECT * FROM fixcar WHERE type_idfix = '2'";
$resultfix = mysqli_query($mysqli,$sqlfix);
$countfix = mysqli_num_rows($resultfix);
$sql_fix = "SELECT * FROM fixcar INNER JOIN type_fixcar
            ON fixcar.type_idfix=type_fixcar.type_idfix
            WHERE fixcar.type_idfix = '2'";
$result_fix = mysqli_query($mysqli,$sql_fix);

$sqlpay = "SELECT * FROM fixcar WHERE type_idfix = '4'";
$resultpay = mysqli_query($mysqli,$sqlpay);
// $countpay = mysqli_num_rows($resultpay);
$sql_pay = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '4'";
$result_pay = mysqli_query($mysqli,$sql_pay);
// $countpay = mysqli_num_rows($result_pay);
$sqlbath = "SELECT * FROM price INNER JOIN fixcar
            ON price.id_fix=fixcar.id_fix
            WHERE fixcar.type_idfix = '4'
            ";
    $rebath = mysqli_query($mysqli,$sqlbath);
    $countpay = mysqli_num_rows($resultpay);

$sqlday = "SELECT * FROM fixcar WHERE type_idfix = '5'";
$resultday = mysqli_query($mysqli,$sqlday);
$countday = mysqli_num_rows($resultday);
$sql_day = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '5'";
$result_day = mysqli_query($mysqli,$sql_day);

$sqlbath = "SELECT * FROM price INNER JOIN fixcar
            ON price.id_fix=fixcar.id_fix
            ";
$rebath = mysqli_query($mysqli,$sqlbath);
// $rw = mysqli_fetch_array($rebath);

$sqlfixsu = "SELECT * FROM fixcar WHERE type_idfix = '3'";
$resultfixsu = mysqli_query($mysqli,$sqlfixsu);
$countfixsu = mysqli_num_rows($resultfixsu);
$sql_fixsu = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '3'";
$result_wait = mysqli_query($mysqli,$sql_fixsu);

$sqlsus = "SELECT * FROM fixcar WHERE type_idfix = '6'";
$resultsus = mysqli_query($mysqli,$sqlsus);
$countsus = mysqli_num_rows($resultsus);
$sql_sus = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '6'";
$result_sus = mysqli_query($mysqli,$sql_sus);
$n = 1;
$b = 1;
$v = 1;
$c = 1;
$nn = 1;
?>
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                สถานะการซ่อม
                            </h1>
                            <div class="page-header-subtitle">
                            </div>
                        </div>
                        <!-- <div class="col-12 col-xl-auto mt-4 ">
                            <div class="input-group input-group-joined border-0 lift lift-sm" style="width: 16.5rem">
                                <span class="input-group-text"><i class="text-primary"
                                        data-feather="calendar"></i></span>
                                <input class="form-control ps-0 pointer" id="litepickerRangePlugin"qq`sdfk socket_recvfrom
                                    placeholder="Select date range..." />
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4 mt-n10">
            <!-- <div class="card">
                <div class="card-body h-100 p-5">
                </div>
            </div> -->
            <!-- Example Colored Cards for Dashboard Demo-->
            <div class="row">
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card h-100 lift">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3"><br>
                                    <div class="text-lg fw-bold text-primary">ลูกค้าติดต่อเดือนนี้</div>
                                    <div class="text-75 fs-3">จำนวน<span class="badge bg-white text-dark"><label for="" class="fs-3 text-danger"><?= $countwait ?></label></span></label></div>
                                </div>
                                <i class="feather-xl text-primary-50" data-feather="calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card  h-100 lift">
                        <div class="card-body"><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                <div class="text-lg fw-bold text-primary">งานซ่อมใหม่วันนี้</div>
                                    <div class="text-75 fs-3">จำนวน <span class="badge bg-white text-dark"><label  class="text-danger fs-3"><label class="fs-3 text-danger"><?= $countfix ?></label></span></label></div>
                                </div>
                                <i class="feather-xl text-black-50" data-feather="calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card  h-100 lift">
                        <div class="card-body"><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                <div class="text-lg fw-bold text-primary">งานที่กำลังซ่อม</div>
                                    <div class="text-75">จำนวน <label for="" class="text-danger">0</label></div>
                                </div>
                                <i class="feather-xl text-black-50" data-feather="calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-4">
                    <div class="card  h-100 lift">
                        <div class="card-body"><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                <div class="text-lg fw-bold text-primary">ประเมินซ่อมเสร็จวันนี้</div>
                                    <div class="text-75">จำนวน <label for="" class="text-danger">0</label></div>
                                </div>
                                <i class="feather-xl text-black-50" data-feather="calendar"></i>
                            </div>
                        </div>
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