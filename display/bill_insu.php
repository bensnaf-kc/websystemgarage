<?php
    session_start();
    include('../backend/connect.php');
    $id = $_GET['id_fix'];
    $idcar = $_GET['id_car'];
    $n=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    @font-face {
        font-family: 'THSarabunNew';
        src: url('thsarabunnew-webfont.eot');
        src: url('thsarabunnew-webfont.eot?#iefix') format('embedded-opentype'),
            url('thsarabunnew-webfont.woff') format('woff'),
            url('thsarabunnew-webfont.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    body {
        font-family: 'THSarabunNew', sans-serif;
        font-size: 1em;
    }
    </style>
</head>

<body>
    <div class="container border">
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-8">
                    <?php
                    $sql = "SELECT * FROM user"
                ?>
                    <?php echo $_SESSION['fname']; ?> <br>
                    สำนักงานใหญ่
                </div>
                <div class="col-4" align="right">
                    <h3>ใบแจ้งหนี้</h3>
                    <?php
                    $sq = "SELECT * FROM fixcar WHERE id_fix='$id'";
                    $re = mysqli_query($mysqli,$sq);
                    while ($row = mysqli_fetch_array($re)) {
                ?>
                    เลขที่ #NF00 <?php echo $row[0]; ?>
                    <?php } ?>
                    <br>
                </div>
            </div>
            <div class="row" width="50%">
                <div class="col-8 border">
                    <?php
                    $sqss = "SELECT * FROM insurance WHERE id_car='$idcar'";
                    $ress = mysqli_query($mysqli,$sqss);
                    while ($row = mysqli_fetch_array($ress)) {
                ?>
                    ลูกค้า บริษัท <?=$row['sr_name'];?> จำกัด (มหาชน) สำนักงานใหญ <br>
                    ที่อยู่ :<label for="">25 ถนนสาทรใต้ แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120</label> <br>
                    
                    <?php } ?>
                </div>
        
                <div class="col-4 border">
                    <?php
                    $s = "SELECT * FROM insurance WHERE id_car='$idcar'";
                    $r = mysqli_query($mysqli,$s);
                    while ($row = mysqli_fetch_array($r)) {
                    ?>
                    วันที่ :<label for=""><?=$row['sr_date'];?>           
                    </label> <br>
                    เครม# <label for=""><?=$row['sr_numbery'];?></label> <br>
                    กรมธรรม์# <label for=""><?=$row['sr_number'];?></label> <br>
                    <?php } ?>
                    <?php
                    $sz = "SELECT * FROM car WHERE id_car='$idcar'";
                    $rz = mysqli_query($mysqli,$sz);
                    while ($row = mysqli_fetch_array($rz)) {
                    ?>
                    รุ่น/ยี่ห้อรถ# <label for=""><?=$row['c_series'];?>&nbsp;<?=$row['c_gen'];?></label> <br>
                    ทะเบียน# <label for=""><?=$row['c_number'];?></label> <br>
                    <?php } ?>
                </div>
            </div><br>
            <div class="row" align="center">
                <table class="table table-bordered" width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th class="text-left">รายการ</th>
                            <th class="text-center">จำนวน/ต่อหน่วย</th>
                            <th class="text-center">ราคา/ต่อหน่วย</th>
                            <th class="text-right">ราคารวม</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light">
                        <tr>
                            <th></th>
                            <th class="text-left"></th>
                            <th class="text-center"></th>
                            <th class="text-right">ราคาทั้งสิ้น</th>
                            <th class="text-right">
                            <?php
                                $se = "SELECT * FROM info_insurance WHERE id_car='$idcar'";
                                $re = mysqli_query($mysqli,$se);
                                $sum_sum = 0;
                                while ($rtt = mysqli_fetch_array($re)) {
                                    $sum_sum += $rtt['infois_amount'] * $rtt['infois_price'];
                                   
                                    // $total = $power + $parts;
                                    // $tax = ($total * 0.07);
                                    // $result = ($total + $tax);
                            ?>
                            
                            <?php } ?>
                            <?=$sum_sum;?>.00 บาท
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sz = "SELECT * FROM info_insurance WHERE id_car='$idcar'";
                        $rz = mysqli_query($mysqli,$sz);
                        while ($row = mysqli_fetch_array($rz)) {
                            $sum = $row['infois_amount'] * $row['infois_price'];
                    ?>
                        <tr>
                            <td><?=$n++;?></td>
                            <td><?=$row['infois_name'];?></td>
                            <td align="center"><?=$row['infois_amount'];?></td>
                            <td align="center"><?=$row['infois_price'];?>.00</td>
                            <td align="right"><?=$sum;?>.00</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row " width="100%">
                <div class="col-7 " align="right">

                </div>
                <div class="col-3 p-3 mb-2 bg-light text-dark border" align="right">
                ภาษี(VAT-OUT)
                </div>
                <div class="col-2 p-3 mb-2 bg-light text-dark border" align="right">
                <?php
                    $price = ($sum_sum*7)/100; 
                        // $total = $power + $parts;
                        // $tax = ($total * 0.07);
                        // $result = ($total + $tax);
                ?>
                    <?= $price ?>.00 บาท
                </div>
            </div>
            <div class="row">
                <div class="col-7" align="right">

                </div>
                <div class="col-3 p-3 mb-2 bg-light text-dark border" align="right">
                    ยอดสุทธิ
                </div>
                <div class="col-2 p-3 mb-2 bg-light text-dark border" align="right">
                <?php echo$sum_sum+$price; ?>.00 บาท
                </div>
            </div><br>
            <div class="row">
                <div class="col text-danger">
                    *ข้าพเจ้าในฐานะเจ้าของรถหรือตัวแทน
                    ได้นำรถเข้าติดต่อเพื่อประสงค์จัดซ่อมตามรายการที่แจ้งไว้และทราบถึงตำหนิต่างๆขนตัวรถ
                    อีกทั้งได้นำทรัพย์สินมีค่าออกจากรถหมดแล้ว ตามที่อู่แจ้ง
                    หากเกิดการสูญหายทางอู่จะไม่รับผิดชอบใดๆทั้งสิ้น
                </div>
            </div>
        </div>
    </div>

    <!-- Open first dialog -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="vendor/dataTable.button.min.js"></script>
    <script src="vendor/buttons.print.min.js"></script>
    <script src="vendor/buttons.dataTables.min.css"></script>
    <script src="vendor/jquery.dataTables.min.css"></script>
</body>
<script>
window.print();
</script>
</html>