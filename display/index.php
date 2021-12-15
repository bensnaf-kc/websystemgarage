<?php
include('../backend/connect.php');
include('header.php');

$sqlwait = "SELECT * FROM fixcar WHERE type_idfix = '1' AND user_id = '$user'";
$resultwait = mysqli_query($mysqli, $sqlwait);
$countwait = mysqli_num_rows($resultwait);
$sql_wait = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '1'";
$result_wait = mysqli_query($mysqli, $sql_wait);
// $count_wait = mysqli_num_rows($result_wait);

$sqlfix = "SELECT * FROM fixcar WHERE type_idfix = '2' AND user_id = '$user'";
$resultfix = mysqli_query($mysqli, $sqlfix);
$countfix = mysqli_num_rows($resultfix);
$sql_fix = "SELECT * FROM fixcar INNER JOIN type_fixcar
            ON fixcar.type_idfix=type_fixcar.type_idfix
            WHERE fixcar.type_idfix = '2'";
$result_fix = mysqli_query($mysqli, $sql_fix);

$sqlpay = "SELECT * FROM fixcar WHERE type_idfix = '4' AND user_id = '$user'";
$resultpay = mysqli_query($mysqli, $sqlpay);
// $countpay = mysqli_num_rows($resultpay);
$sql_pay = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '4'";
$result_pay = mysqli_query($mysqli, $sql_pay);
// $countpay = mysqli_num_rows($result_pay);
$sqlbath = "SELECT * FROM price INNER JOIN fixcar
            ON price.id_fix=fixcar.id_fix
            WHERE fixcar.type_idfix = '4'
            ";
$rebath = mysqli_query($mysqli, $sqlbath);
$countpay = mysqli_num_rows($resultpay);

$sqlday = "SELECT * FROM fixcar WHERE type_idfix = '5' AND user_id = '$user'";
$resultday = mysqli_query($mysqli, $sqlday);
$countday = mysqli_num_rows($resultday);
$sql_day = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '5'";
$result_day = mysqli_query($mysqli, $sql_day);

$sqlbath = "SELECT * FROM price INNER JOIN fixcar
            ON price.id_fix=fixcar.id_fix
            ";
$rebath = mysqli_query($mysqli, $sqlbath);
// $rw = mysqli_fetch_array($rebath);

$sqlfixsu = "SELECT * FROM fixcar WHERE type_idfix = '3' AND user_id = '$user'";
$resultfixsu = mysqli_query($mysqli, $sqlfixsu);
$countfixsu = mysqli_num_rows($resultfixsu);
$sql_fixsu = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '3'";
$result_wait = mysqli_query($mysqli, $sql_fixsu);

$sqlsus = "SELECT * FROM fixcar WHERE type_idfix = '6' AND user_id = '$user'";
$resultsus = mysqli_query($mysqli, $sqlsus);
$countsus = mysqli_num_rows($resultsus);
$sql_sus = "SELECT * FROM fixcar INNER JOIN type_fixcar
         ON fixcar.type_idfix=type_fixcar.type_idfix
         WHERE fixcar.type_idfix = '6'";
$result_sus = mysqli_query($mysqli, $sql_sus);
$n = 1;
$b = 1;
$v = 1;
$c = 1;
$nn = 1;

function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
	}
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$day = $thai_day_arr[date("w",$strDate)];
$a = date("A");
$t = date("d-m-Y h:i:s");
	$strDate = $t;
	$display = DateThai($strDate);
?>
<div id="layoutSidenav_content">
    <main>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Custom page header alternative example-->
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                <div class="me-4 mb-3 mb-sm-0">
                <h1 class="page-header-title fs-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                                        <line x1="18" y1="20" x2="18" y2="10"></line>
                                        <line x1="12" y1="20" x2="12" y2="4"></line>
                                        <line x1="6" y1="20" x2="6" y2="14"></line>
                                    </svg>
                                สถานะการซ่อม
                            </h1>
                    <div class="small">
                        <span class="fw-500 text-primary"><?=$day?></span>
                        <?=$display?>&nbsp; <?=$a?>
                    </div>
                </div>
                <!-- Date range picker example-->
                <!-- <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg></span>
                    <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range...">
                </div> -->
            </div>
            <!-- Illustration dashboard card example-->
            <div class="card card-waves mb-4 mt-5">
                <div class="card-body p-5">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                           
                        </div>
                        <div class="col">
                           
                        </div><div class="col">
                           
                           </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 1-->
                    <div class="card border-start-lg border-start-primary h-100 lift">
                        <div class="card-body"><br>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                <div class="me-3">
                                    <div class="text-lg fw-bold text-primary">ลูกค้าที่มาติดต่อวันนี้</div>
                                    <div class="text-75 fs-3">จำนวน <span class="badge bg-white text-dark"><label class="text-danger fs-3"><label class="fs-3 text-danger"><?=$countwait?></label></label></span></div>
                                </div>
                                </div>
                                <div class="ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar feather-xl text-black-50">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> Font Awesome fontawesome.com -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 2-->
                    <div class="card border-start-lg border-start-secondary h-100 lift">
                    <div class="card-body"><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-lg fw-bold text-primary">งานซ่อมใหม่วันนี้</div>
                                    <div class="text-75 fs-3">จำนวน <span class="badge bg-white text-dark"><label class="text-danger fs-3"><label class="fs-3 text-danger">0</label></label></span></div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar feather-xl text-black-50">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 3-->
                    <div class="card border-start-lg border-start-success h-100 lift">
                    <div class="card-body"><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-lg fw-bold text-primary">งานที่กำลังซ่อม</div>
                                    <div class="text-75">จำนวน <label for="" class="text-danger">0</label></div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar feather-xl text-black-50">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!-- Dashboard info widget 4-->
                    <div class="card border-start-lg border-start-info h-100 lift">
                    <div class="card-body"><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-lg fw-bold text-primary">ประเมินซ่อมเสร็จวันนี้</div>
                                    <div class="text-75">จำนวน <label for="" class="text-danger">0</label></div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar feather-xl text-black-50">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
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
                <div class="col-md-6 small">Copyright © CMD25</div>
                <div class="col-md-6 text-md-end small">
                    <a href="#!">Privacy Policy</a>
                    ·
                    <a href="#!">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php include('footer.php'); ?>