<?php
    session_start();
    include('../backend/connect.php');
    $id = $_GET['id_fix'];
    $idcar = $_GET['id_car'];
    $codeuser = $_SESSION['user_code'];
    $iduser = $_SESSION['id'];
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
    <title></title>
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
        <div align="center">
        <?php
                    $sql = "SELECT * FROM user WHERE user_id = '$iduser'";
                    $qty = mysqli_query($mysqli, $sql);
                    $logo = mysqli_fetch_array($qty);
                    if($logo['user_logo'] == NULL){
        ?>
            <img src="assets/img/logo/favicon.png" alt="" style="width: 85px; height: 85px;">
        <?php }else{ ?>
        <img src="assets/img/logo/<?=$logo['user_logo']?>" alt="" style="width: 85px; height: 85px;">
        <?php } ?>
            
                
            </div>
            <br>
            <div class="row">
                <div class="col-8">
                    
                    บริษัท <?php echo $_SESSION['fname']; ?><br>
                    <label class="text-sm"><?php echo $_SESSION['address']; ?></label>
                </div>
                <div class="col-4" align="right">
                    <h3>ใบแจ้งหนี้</h3>
                    <?php
                    $sq = "SELECT * FROM fixcar WHERE id_fix='$id'";
                    $re = mysqli_query($mysqli,$sq);
                    while ($row = mysqli_fetch_array($re)) {
                ?>
                    #0000 <?php echo $row[0]; ?>
                    <?php } ?>
                    <br>
                    <?php
                    $sqs = "SELECT * FROM car WHERE id_fix='$id'";
                    $res = mysqli_query($mysqli,$sqs);
                    while ($row = mysqli_fetch_array($res)) {
                ?>
                    เลขที่ใบ#00 <?php echo $row['id_car']; ?>
                <?php } ?>
                </div>
            </div>
            <div class="row" width="50%">
                <div class="col border">
                    <?php
                    $sqss = "SELECT * FROM fixcar WHERE id_fix='$id'";
                    $ress = mysqli_query($mysqli,$sqss);
                    while ($row = mysqli_fetch_array($ress)) {
                ?>
                    คุณ :<label for=""><?=$row['f_name'];?></label> <br>
                    ที่อยู่ :<label for=""><?=$row['f_address'];?></label> <br>
                    เบอร์ติดต่อ :<label for=""><?=$row['f_tel'];?></label> <br>
                    อีเมล์ :<label for=""><?=$row['f_email'];?></label> <br>
                    <?php } ?>
                </div>&nbsp;
                <div class="col border">
                    <?php
                    $sqssz = "SELECT * FROM car WHERE id_fix='$id'";
                    $ressz = mysqli_query($mysqli,$sqssz);
                    while ($row = mysqli_fetch_array($ressz)) {
                ?>
                    รุ่น/ยี่ห้อรถ :<label for=""><?=$row['c_series'];?>&nbsp;<?=$row['c_gen'];?></label> <br>
                    สี :<label for=""><?=$row['c_color'];?></label> <br>
                    เลขทะเบียน :<label for=""><?=$row['c_number'];?></label> <br>
                    <?php } ?>
                </div>&nbsp;
                <div class="col border">
                    <?php
                    $s = "SELECT * FROM fixcar WHERE id_fix='$id'";
                    $r = mysqli_query($mysqli,$s);
                    while ($row = mysqli_fetch_array($r)) {
                ?>
                    วันที่เข้าซ่อม :<label for=""><?=$row['f_datecom'];?></label> <br>
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
                                $se = "SELECT * FROM parts WHERE id_car='$idcar'";
                                $re = mysqli_query($mysqli,$se);
                                $sum_t = 0;
                                while($rtt = mysqli_fetch_array($re)){
                                    $sum_t += $rtt['p_amount']*$rtt['p_price'];
                                    // $total = $power + $parts;
                                    // $tax = ($total * 0.07);
                                    // $result = ($total + $tax);
                                }
                            ?>
                            <?= $sum_t ?>.00
                           
                            </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sz = "SELECT * FROM parts WHERE id_car='$idcar'";
                        $rz = mysqli_query($mysqli,$sz);
                        while ($row = mysqli_fetch_array($rz)) {
                    ?>
                        <tr>
                            <td><?=$n++;?></td>
                            <td><?=$row['p_name'];?></td>
                            <td align="center"><?=$row['p_amount'];?></td>
                            <td align="center"><?=$row['p_price'];?>.00</td>
                            <td align="right"><?=$row['p_amount']*$row['p_price'];?>.00</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row " width="100%">
                <div class="col-7 " align="right">

                </div>
                <div class="col-3 p-3 mb-2 bg-light text-dark border" align="right">
                    ภาษีมูลค่าเพิ่ม / VAT 7%
                </div>
                <div class="col-2 p-3 mb-2 bg-light text-dark border" align="right">
                <?php
                    $price = ($sum_t*7)/100;
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
                    <?= $sum_t+$price ?>.00 บาท
                </div>
            </div><br>
            <div class="row">
                <div class="col">
                <label class="">
                    ข้าพเจ้าในฐานะเจ้าของรถหรือตัวแทน
                    ได้นำรถเข้าติดต่อเพื่อประสงค์จัดซ่อมตามรายการที่แจ้งไว้และทราบถึงตำหนิต่างๆขนตัวรถ
                    อีกทั้งได้นำทรัพย์สินมีค่าออกจากรถหมดแล้ว ตามที่อู่แจ้ง
                    หากเกิดการสูญหายทางอู่จะไม่รับผิดชอบใดๆทั้งสิ้น
                </label><br> <br>
                    <?php
                $so = "SELECT * FROM com WHERE user_code = '$codeuser'";
                $ro = mysqli_query($mysqli,$so);
                if($ro != NULL){
                while ($row_b = mysqli_fetch_array($ro)){
            ?>
            *ช่องทางการโอนเงิน <?= $row['1']; ?><br>
            เลขบัญชี   <?= $row_b['bank_numowner']; ?> ชื่อบัญชี  <?= $row_b['bank_nowner']; ?>
            <?php }} ?>
                </div>
            </div>
            <br><br><br><br><br><br>
            <div class="row">
                <div class="col">
                    <label for="">______________________________</label>
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    <label for="">______________________________</label>
                </div>
           </div>
           <div class="row" align="center">
                <div class="col">
                    <label for="">ผู้รับรถยนต์</label>
                </div>
                <div class="col">
                    
                </div>
                <div class="col">
                    <label for="">เจ้าหน้าที่</label>
                </div>
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