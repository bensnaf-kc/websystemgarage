<?php
include('header.php');
include('../backend/connect.php');
$idcar = $_GET['id_car'];
$id = $_GET['id_fix'];
$n = 1;
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
        </header>
        <div class="container-fluid px-4 mt-n10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <?php
                        $sql = "SELECT * FROM insurance WHERE id_car = '$idcar'";
                        $qty = mysqli_query($mysqli, $sql);
                        ?>
                        <div class="card bg-light mb-3">
                            <div class="card-header"><b>เพิ่มข้อมูลประกันภัย/เครม</b></div>
                            <div class="card-body">
                                <?php
                                while ($row = mysqli_fetch_array($qty)) {
                                ?>
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4">
                                            <label for="insr">บริษัทประกันภัย</label><br>
                                            <input type="text" value="<?= $row['sr_name']; ?>" class="form-control" disabled>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="number">หมายเลขกรมธรรม์</label><br>
                                            <input type="text" class="form-control" id="number" name="number" value="<?= $row['sr_number']; ?>" disabled>
                                        </div>
                                    </div><br>
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4">
                                            <label for="datein">วันที่เริ่มคุ้มครอง</label><br>
                                            <input type="date" class="form-control" id="datein" name="datein" value="<?= $row['sr_datecom']; ?>" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dateout">วันที่หมดอายุ</label><br>
                                            <input type="date" class="form-control" id="dateout" name="dateout" value="<?= $row['sr_dateout']; ?>" disabled>
                                        </div>
                                    </div><br>
                                    <div class="row gx-4 md-4">
                                        <div class="col-md-4">
                                            <label for="numbercam">หมายเลขเคลม</label><br>
                                            <input type="text" class="form-control" id="numbercam" name="numbercam" value="<?= $row['sr_numbery']; ?>" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="peolpel">ฝั่งผู้เอาประกัน</label><br>
                                            <input type="text" value="<?= $row['sr_or']; ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                    $qty = mysqli_query($mysqli, $sql);
                                    $res = mysqli_num_rows($qty);
                                    if ($res == 0) {
                                    ?>
                                    

                                        <Label>รายการสาเหตุ:</Label>
                                        <?php
                                                    $sql_inn = "SELECT * FROM infocar WHERE id_car = '$idcar'";
                                                    $qty_inn = mysqli_query($mysqli,$sql_inn);
                                                    $text = "";
                                                    while($infocarn = mysqli_fetch_array($qty_inn)){
                                                        $textn .= $infocarn['info_name'].',';
                                                   
                                                     } 
                                                ?>
                                        <div class="col-md-4">
                                            <input type="text" value="<?=$textn?> " class="form-control">
                                        </div>
                                        
                                        <br>
                                        <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่มอะไหล่</button>
                                    <?php } else { ?>
                                        <br>
                                        
                                            
                                                <label for="">รายการสาเหตุ: </label>
                                                <?php
                                                    $sql_in = "SELECT * FROM infocar WHERE id_car = '$idcar'";
                                                    $qty_in = mysqli_query($mysqli,$sql_in);
                                                    $text = "";
                                                    while($infocar = mysqli_fetch_array($qty_in)){
                                                        $text .= $infocar['info_name'].',';
                                                    }
                                                  
                                                ?>
                                                
                                           
                                            <div class="col-md-4">
                                            <input type="text" value="<?=$text?> " class="form-control">
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="">รายการเปลี่ยนอะไหล่: </label>
                                                <form action="" method="post">
                                                    <?php
                                                    $sql = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                                    $qty = mysqli_query($mysqli, $sql);
                                                    $res = mysqli_num_rows($qty);
                                                    ?>
                                                    <div class="row gx-4 ">
                                                        <div class="col">
                                                            <?php while ($row_insu = mysqli_fetch_array($qty)) { ?>

                                                                <label for="" class="text-xs text-red">รายการที่ <?= $n++; ?></label><input type="text" value="<?= $row_insu['infois_name']; ?>" class="form-control" disabled>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">จำนวน:</label>
                                                <?php
                                                $sql_amot = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                                $qty_amot = mysqli_query($mysqli, $sql);
                                                ?>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <?php while ($row_amot = mysqli_fetch_array($qty_amot)) { ?>
                                                            <label for="" class="text-xs text-red"></label><input type="text" value="<?= $row_amot['infois_amount']; ?>" class="form-control" disabled>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">ราคา:</label>
                                                <?php
                                                $sql_price = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                                $qty_price = mysqli_query($mysqli, $sql_price);
                                                $res = mysqli_num_rows($qty_price);
                                                ?>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <?php while ($row_price = mysqli_fetch_array($qty_price)) { ?>
                                                            <label for="" class="text-xs text-red"></label><input type="text" value="<?= $row_price['infois_price']; ?>" class="form-control" disabled>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่ม</button>
                                            </div>
                                            <br>
                                        <?php } ?>
                                        <br>
                                    <?php } ?>
                                    <br>
                                        </div>
                            </div>
                            <div>
                                <a href="detail.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" class="btn btn-primary shadow lift" type="button">บันทึก</a>
                                <button type="reset" class="btn btn-secondary shadow lift" data-dismiss="modal">ล้าง</button>
                                </form>
                            </div>
                        </div>
                    </table>
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
<script>
    function autoTab(obj) {
        /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
        หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
        4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
        รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
        หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
        ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
        */
        var pattern = new String("___-___-____"); // กำหนดรูปแบบในนี้
        var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        var returnText = new String("");
        var obj_l = obj.value.length;
        var obj_l2 = obj_l - 1;
        for (i = 0; i < pattern.length; i++) {
            if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                returnText += obj.value + pattern_ex;
                obj.value = returnText;
            }
        }
        if (obj_l >= pattern.length) {
            obj.value = obj.value.substr(0, pattern.length);
        }
    }
    
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">รายการเปลี่ยนอะไหล่</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="add_insuinfo.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
            <div class="modal-body " id="dyc">
                <div class="row">
                        <div class="col-md-4">
                            <label for="list">รายการ / อะไหล่:</label><br>
                        </div>
                        <div class="col-md-2">
                            <label for="">จำนวน:</label>
                        </div>
                        <div class="col-md-2">
                            <label for="">ราคา:</label>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            let i = 1;
                            $("#add").click(function() {
                                i++;
                                $("#dyc").append('<div class="row" id="row' + i + '"><div class="col-md-4"><input type="text" class="form-control name_list" name="list[]" id="list" placeholder="กรุณาใส่ข้อมูล" required></div><div class="col-md-2"><input type="number" class="form-control" name="amot[]" placeholder="0" min="1" required></div><div class="col-md-2"><input type="number" class="form-control" name="price[]" placeholder="0.00" min="1" required></div><div class="col-md-2"><button type="button" class="btn btn-danger shadow lift btn-sm btn_remove" name="remove" id="' + i + '">-</button></div></div>')
                            })
                            $(document).on('click', '.btn_remove', function() {
                                let btn_id = $(this).attr('id');
                                $('#row' + btn_id + '').remove();
                            })
                        })
                    </script>
                    <div class="row" id="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control name_list" name="list[]" id="list" placeholder="กรุณาใส่ข้อมูล" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="amot[]" placeholder="0" min="1" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="price[]" placeholder="0.00" min="1" required>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-warning shadow lift btn-sm" name="add" id="add">+</button>
                        </div>
                    </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit" name="btn">บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
