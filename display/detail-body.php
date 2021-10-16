<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
            type="button" role="tab" aria-controls="pills-home" aria-selected="true">ข้อมูลรถยนต์</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ข้อมูลลูกค้า</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">ประกันภัย/เครม</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-fix-tab" data-bs-toggle="pill" data-bs-target="#pills-fix" type="button"
            role="tab" aria-controls="pills-fix" aria-selected="false">รายการซ่อม</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-paybuy-tab" data-bs-toggle="pill" data-bs-target="#pills-paybuy"
            type="button" role="tab" aria-controls="pills-paybuy" aria-selected="false">การชำระเงิน</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="card-body">
            <div class="card bg-light">
                <div class="card-header text-dark">รายละเอียดข้อมูลรถยนต์
                    <label for="" class="text-red text-xs">หมายเหตุ: สามารถแก้ไขข้อมูลด้านล่างได้</label>
                </div>
                <div class="card-body">
                    <?php
                    $sql = "SELECT * FROM car WHERE id_fix = '$id' AND id_car = '$idcar'";
                    $resultz = mysqli_query($mysqli, $sql);
                    while ($rowz = mysqli_fetch_array($resultz)) {
                    ?>
                    <form action="updatecar.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="row gx-4 mb-3">
                            <div class="col-md-3">
                                <label for="101">หมายเลขทะเบียน:</label>
                                <input type="text" value="<?= $rowz['c_number']; ?>" id="c_number" name="c_number"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">จังหวัดเลขทะเบียน:</label><br>
                                <select class="form-control" id="c_log" name="c_log">
                                    <option value="<?= $rowz['c_log']; ?>">
                                        <?= $rowz['c_log']; ?></option>
                                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                    <option value="กระบี่">กระบี่ </option>
                                    <option value="กาญจนบุรี">กาญจนบุรี </option>
                                    <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                    <option value="กำแพงเพชร">กำแพงเพชร </option>
                                    <option value="ขอนแก่น">ขอนแก่น</option>
                                    <option value="จันทบุรี">จันทบุรี</option>
                                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                    <option value="ชัยนาท">ชัยนาท </option>
                                    <option value="ชัยภูมิ">ชัยภูมิ </option>
                                    <option value="ชุมพร">ชุมพร </option>
                                    <option value="ชลบุรี">ชลบุรี </option>
                                    <option value="เชียงใหม่">เชียงใหม่ </option>
                                    <option value="เชียงราย">เชียงราย </option>
                                    <option value="ตรัง">ตรัง </option>
                                    <option value="ตราด">ตราด </option>
                                    <option value="ตาก">ตาก </option>
                                    <option value="นครนายก">นครนายก </option>
                                    <option value="นครปฐม">นครปฐม </option>
                                    <option value="นครพนม">นครพนม </option>
                                    <option value="นครราชสีมา">นครราชสีมา </option>
                                    <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                    <option value="นครสวรรค์">นครสวรรค์ </option>
                                    <option value="นราธิวาส">นราธิวาส </option>
                                    <option value="น่าน">น่าน </option>
                                    <option value="นนทบุรี">นนทบุรี </option>
                                    <option value="บึงกาฬ">บึงกาฬ</option>
                                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                    <option value="ปทุมธานี">ปทุมธานี </option>
                                    <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                    <option value="ปัตตานี">ปัตตานี </option>
                                    <option value="พะเยา">พะเยา </option>
                                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                    <option value="พังงา">พังงา </option>
                                    <option value="พิจิตร">พิจิตร </option>
                                    <option value="พิษณุโลก">พิษณุโลก </option>
                                    <option value="เพชรบุรี">เพชรบุรี </option>
                                    <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                    <option value="แพร่">แพร่ </option>
                                    <option value="พัทลุง">พัทลุง </option>
                                    <option value="ภูเก็ต">ภูเก็ต </option>
                                    <option value="มหาสารคาม">มหาสารคาม </option>
                                    <option value="มุกดาหาร">มุกดาหาร </option>
                                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                    <option value="ยโสธร">ยโสธร </option>
                                    <option value="ยะลา">ยะลา </option>
                                    <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                    <option value="ระนอง">ระนอง </option>
                                    <option value="ระยอง">ระยอง </option>
                                    <option value="ราชบุรี">ราชบุรี</option>
                                    <option value="ลพบุรี">ลพบุรี </option>
                                    <option value="ลำปาง">ลำปาง </option>
                                    <option value="ลำพูน">ลำพูน </option>
                                    <option value="เลย">เลย </option>
                                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                    <option value="สกลนคร">สกลนคร</option>
                                    <option value="สงขลา">สงขลา </option>
                                    <option value="สมุทรสาคร">สมุทรสาคร </option>
                                    <option value="สมุทรปราการ">สมุทรปราการ </option>
                                    <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                    <option value="สระแก้ว">สระแก้ว </option>
                                    <option value="สระบุรี">สระบุรี </option>
                                    <option value="สิงห์บุรี">สิงห์บุรี </option>
                                    <option value="สุโขทัย">สุโขทัย </option>
                                    <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                    <option value="สุรินทร์">สุรินทร์ </option>
                                    <option value="สตูล">สตูล </option>
                                    <option value="หนองคาย">หนองคาย </option>
                                    <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                    <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                    <option value="อุดรธานี">อุดรธานี </option>
                                    <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                    <option value="อุทัยธานี">อุทัยธานี </option>
                                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                                    <option value="อ่างทอง">อ่างทอง </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">สี:</label><br>
                                <select name="c_color" id="c_color" class="form-control" required>
                                    <option value="<?= $rowz['c_color']; ?>">
                                        <?= $rowz['c_color']; ?>
                                    </option>
                                    <option value="สีแดง" style="background-color: #FF0000; color: #fff; ">
                                        สีแดง<i class="fas fa-circle"></i></option>
                                    <option value="สีขาว">สีขาว</option>
                                    <option value="สีเทา">สีเทา</option>
                                    <option value="สีดำ">สีดำ</option>
                                    <option value="สีบรอนซ์เงิน">สีบรอนซ์เงิน</option>
                                    <option value="สีบรอนซ์ทอง">สีบรอนซ์ทอง</option>
                                    <option value="สีเหลือง">สีเหลือง</option>
                                    <option value="สีเหลืองอ่อน">สีเหลืองอ่อน</option>
                                    <option value="สีเหลืองแก่">สีเหลืองแก่</option>
                                    <option value="สีชมพู">สีชมพู</option>
                                    <option value="สีโอโรส">สีโอโรส</option>
                                    <option value="สีเขียว">สีเขียว</option>
                                    <option value="สีฟ้า">สีฟ้า</option>
                                    <option value="สีน้ำเงิน">สีน้ำเงิน</option>
                                    <option value="สีม่วง">สีม่วง</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">ยี่ห้อ:</label><br>
                                <input type="text" value="<?= $rowz['c_series']; ?>" class="form-control" id="c_series"
                                    name="c_series">
                            </div>
                            <div class="col-md-3">
                                <label for="">รุ่น:</label><br>
                                <input type="text" value="<?= $rowz['c_gen']; ?>" class="form-control" id="c_gen"
                                    name="c_gen">
                            </div>
                            <br>
                        </div>
                        <div align="right">
                            <button class="btn btn-warning shadow lift" type="submit">แก้ไข</button>
                        </div>
                    </form>
                    <hr>
                    <form action="" method="post">
                        <div class="row gx-4 md-4">
                            <div class="col-md-3">
                                <label for="">สาเหตุ: <button class="btn btn-info shadow lift" type="button"
                                        data-bs-toggle="modal" data-bs-target="#infocar">+
                                        เพิ่มสาเหตุ/อาการ</button></label><br>
                                <?php
                                    $sql_info = "SELECT * FROM infocar WHERE id_car = '$idcar'";
                                    $qty_info = mysqli_query($mysqli, $sql_info);
                                    while ($row_info = mysqli_fetch_array($qty_info)) { ?>
                                <input type="text" value="<?= $row_info['info_name']; ?>" class="form-control"
                                    id="info_car" name="info_car">
                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <label for="">จัดการ:</label>
                                <div class="row gx-4 md-4">
                                    <div class="col-md-2">
                                        <label for=""></label>
                                        <?php
                                            $sql_info_id = "SELECT * FROM infocar WHERE id_car = '$idcar'";
                                            $qty_info_id = mysqli_query($mysqli, $sql_info_id);
                                            while ($row_info_id = mysqli_fetch_array($qty_info_id)) { ?>
                                        <button class="btn btn-outline-warning shadow lift" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#infocar<?= $row_info_id[0]; ?>">แก้ไข</button><br>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="card-body">
            <div class="card bg-light">
                <div class="card-header text-dark">รายละเอียดข้อมูลลูกค้า</div>
                <div class="card-body">
                    <div class="card-body">
                        <?php
                        $sq = "SELECT * FROM fixcar WHERE id_fix = '$id'";
                        $r = mysqli_query($mysqli, $sq);
                        while ($row = mysqli_fetch_array($r)) {
                        ?>
                        <form action="edit_cus.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="row gx-4 md-3">
                                <div class="col-md-3">
                                    <label for="101">ชื่อ:</label>
                                    <input type="text" value="<?= $row[1]; ?>" id="c_name" name="c_name"
                                        class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">อีเมล์:</label><br>
                                    <input type="text" value="<?= $row[5]; ?>" class="form-control" id="c_email"
                                        name="c_email">
                                </div>
                                <br>

                                <div class="col-md-3">
                                    <label for="">เบอร์ติดต่อ:</label><br>
                                    <input type="text" value="<?= $row[3]; ?>" class="form-control"
                                        onkeyup="autoTab(this)" id="c_tel" name="c_tel">
                                </div>
                                <div class="col-md-3">
                                    <label for="">ไอดีไลน์:</label><br>
                                    <input type="text" value="<?= $row[4]; ?>" class="form-control" id="c_idline"
                                        name="c_idline">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">ที่อยู่:</label><br>
                                <input type="text" value="<?= $row[2]; ?>" class="form-control" id="c_add" name="c_add">
                            </div>
                            <br>
                            <div align="right">
                                <button class="btn btn-warning" type="submit">แก้ไข</button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ประกันภัย -->
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="card-body">
            <div class="card bg-light">
                <div class="card-header text-dark">รายละเอียดประกันภัย <a
                        href="insert_insurance.php?id_car=<?= $idcar; ?>&id_fix=<?= $id; ?>"
                        class="btn btn-primary btn-sm">+ เพิ่มประกัน/เครม</a><a
                        href="bill_insu.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" type="button"
                        class="btn btn-info btn-sm shadow lift">พิมพ์</a></div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="edit_insr.php?id_fix=<?= $id ?>&id_car=<?= $idcar; ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php
                            $sqlinsr = "SELECT * FROM insurance WHERE id_car = '$idcar'";
                            $resultinsr = mysqli_query($mysqli, $sqlinsr);
                            while ($row_in = mysqli_fetch_array($resultinsr)) {
                            ?>
                            <div class="row gx-4 md-4">
                                <div class="col-md-3">
                                    <label for="101">บริษัทประกันภัย
                                        :</label>
                                    <input type="text" id="c_name" name="c_name" class="form-control"
                                        value="<?= $row_in[2]; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="">หมายเลขกรมธรรม์
                                        :</label><br>
                                    <input type="text" class="form-control" id="c_add" name="c_add"
                                        value="<?= $row_in[3]; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="">วันที่เริ่มคุ้มครอง
                                        :</label><br>
                                    <input type="date" class="form-control" onkeyup="autoTab(this)" id="c_com"
                                        name="c_com" value="<?= $row_in[4]; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="">วันที่หมดอายุ
                                        :</label><br>
                                    <input type="date" value="<?= $row_in[5]; ?>" class="form-control" id="c_out"
                                        name="c_out">
                                </div>
                            </div><br>
                            <div class="row gx-4 md-4">
                                <div class="col-md-3">
                                    <label for="">หมายเลขเคลม
                                        :</label><br>
                                    <input type="text" value="<?= $row_in[6]; ?>" class="form-control" id="c_num"
                                        name="c_num">
                                </div>
                                <div class="col-md-3">
                                    <label for="">ฝั่งผู้เอาประกัน
                                        :</label><br>
                                    <input type="text" value="<?= $row_in[7]; ?>" class="form-control" id="c_peo"
                                        name="c_peo">
                                </div>
                                <div class="col-md-3">
                                    <label for="">วันที่ออกเอกสาร
                                        :</label><br>
                                    <input type="date" value="<?= $row_in[5]; ?>" class="form-control" id="c_date"
                                        name="c_date">
                                </div>
                            </div>
                            <div align="right">
                                <button class="btn btn-warning shadow lift" type="submit">แก้ไข</button>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="">รายการสาเหตุ:</label>
                                <form action="" method="post">
                                    <?php
                                    $sql = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                    $qty = mysqli_query($mysqli, $sql);
                                    $res = mysqli_num_rows($qty);
                                    if ($res == 0) {
                                    } else { ?>
                                    <div class="row gx-4 ">
                                        <div class="col">
                                            <?php while ($row_insu = mysqli_fetch_array($qty)) { ?>
                                            <label for="" class="text-xs text-red">รายการที่ <?= $n++; ?></label><input
                                                type="text" value="<?= $row_insu['infois_name']; ?>"
                                                class="form-control">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                            </div>
                            <div class="col-md-2">
                                <label for="">จำนวน:</label>
                                <?php
                                $sql_amot = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                $qty_amot = mysqli_query($mysqli, $sql);
                                $res = mysqli_num_rows($qty_amot);
                                if ($res == 0) {
                                } else { ?>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <?php while ($row_amot = mysqli_fetch_array($qty_amot)) { ?>
                                        <label for="" class="text-xs text-red"></label><input type="text"
                                            value="<?= $row_amot['infois_amount']; ?>" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <label for="">ราคา:</label>
                                <?php
                                $sql_price = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                $qty_price = mysqli_query($mysqli, $sql_price);
                                $res = mysqli_num_rows($qty_price);
                                if ($res == 0) {
                                } else { ?>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <?php while ($row_price = mysqli_fetch_array($qty_price)) { ?>
                                        <label for="" class="text-xs text-red"></label><input type="text"
                                            value="<?= $row_price['infois_price']; ?>" class="form-control">
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-1">
                                <label for="">จัดการ:</label>
                                <?php
                                $sql_ma = "SELECT * FROM info_insurance WHERE id_car = '$idcar'";
                                $qty_ma = mysqli_query($mysqli, $sql_ma);
                                $res = mysqli_num_rows($qty_ma);
                                if ($res == 0) {
                                } else { ?>
                                <br>
                                <?php while ($row_ma = mysqli_fetch_array($qty_ma)) { ?>
                                <div class="row gx-4 ">
                                    <div class="col-md-2">
                                        <label for="" class="text-xs text-red"></label><button
                                            class="btn btn-outline-warning shadow lift" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editinsu<?= $row_ma[0]; ?>">แก้ไข</button>
                                    </div>
                                </div>
                                <!-- edit Modal inso_info-->
                                <div class="modal fade" id="editinsu<?= $row_ma[0]; ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="edit_infoinsu.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>"
                                                    method="post">
                                                    <?php
                                                            $sql_edit = "SELECT * FROM info_insurance WHERE infois_id = '$row_ma[0]'";
                                                            $qty_edit = mysqli_query($mysqli, $sql_edit);
                                                            while ($row_edit = mysqli_fetch_array($qty_edit)) {
                                                            ?>
                                                    <div class="row">
                                                        <label for="">รายการ:</label><br>
                                                        <input type="text" class="form-control"
                                                            value="<?= $row_edit['infois_name']; ?>"><br>
                                                        <label for="">จำนวน:</label><br>
                                                        <input type="number" class="form-control"
                                                            value="<?= $row_edit['infois_amount']; ?>"><br>
                                                        <label for="">ราคา:</label><br>
                                                        <input type="number" class="form-control"
                                                            value="<?= $row_edit['infois_price']; ?>"><br>
                                                    </div>
                                                    <?php } ?>

                                            </div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary"
                                                    type="submit">บันทึก</button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div><br><br>
                            <div align="right">
                                <button class="btn btn-primary shadow lift" type="button" data-bs-toggle="modal"
                                    data-bs-target="#insu">เพิ่มสาเหตุ</button>
                            </div>
                            <br>
                            </form>
                        </div>
                        <hr>
                        <div class="row">
                            <label for="">รูปภาพหลักฐาน : ใบเครมลูกค้า <button class="btn btn-warning shadow lift"
                                    type="button" data-bs-toggle="modal" data-bs-target="#insertpic">+
                                    เพิ่มรูปภาพ</button></label><br>
                            <?php
                                if ($row_in['sr_pic'] !== 0) {
                            ?>
                            <br>
                            <img src="assets/img/insu/<?= $row_in['sr_pic']; ?>" alt=""
                                style="width:200px;height:auto;">
                            <?php
                                } else {
                            ?>
                            <label for="" class="text-red fs-4">ไม่มีรูปภาพ</label>
                            <?php
                                }
                            ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- การชำระเงิน -->
    <div class="tab-pane fade" id="pills-paybuy" role="tabpanel" aria-labelledby="pills-paybuy-tab">
        <div class="card-body">
            <div class="card bg-light">
                <div class="card-header text-dark">รายละเอียดการชำระเงิน &nbsp;<button
                        class="btn btn-warning shadow lift" type="button" data-bs-toggle="modal"
                        data-bs-target="#Deposit">+ เพิ่มค่ามัดจำ</button></div>
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">หลักฐานค่ามัดจำ</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab"
                                aria-controls="v-pills-profile" aria-selected="false">หลักฐานค่าซ่อม</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="row gx-4">
                                    <div class="col">
                                        <?php
                                        $sql_pay = "SELECT * FROM pay WHERE id_car = '$idcar'";
                                        $qty_pay = mysqli_query($mysqli, $sql_pay);
                                        $row_pay = mysqli_num_rows($qty_pay);
                                            if ($row_pay == 0) { ?>

                                        <label class="fs-6 text-gray-600">รูปภาพ:</label><br>
                                        <label>ไม่มีรูปภาพ</label>
                                        <button class="btn btn-warning btn-sm shadow lift" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">เพิ่มรูปภาพ</button>
                                    </div>
                                    <div class="col">
                                        <label for="">จำนวนเงิน(บ.):</label><br>
                                        <label for="">0.00</label>
                                    </div>
                                    <div class="col">
                                        <label for="">คงเหลือ(บ.):</label><br>
                                        <label for="">0.00</label>
                                    </div>
                                    <?php
                                        } else { ?>
                                    <label for="" class="fs-6 text-gray-600">รูปภาพ:</label><br>
                                    <img src="assets/img/pay/<?= $row['pay_pic']; ?>"
                                        style="height: auto; width: 150px;"><br><br>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">แก้ไขรูปภาพ</button>
                                </div>
                                <div class="col">
                                    <label for="">จำนวนเงิน(บ.):</label><br>
                                    <label for="">0.00</label>
                                </div>
                                <div class="col">
                                    <label for="">คงเหลือ(บ.):</label><br>
                                    <label for="">0.00</label>
                                </div>
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        456
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="tab-pane fade" id="pills-fix" role="tabpanel" aria-labelledby="pills-fix-tab">
    <div class="card-body">
        <div class="card bg-light">
            <div class="card-header text-dark">รายละเอียดรายการซ่อม &nbsp;<a
                    href="insert_checkcar.php?id_car=<?= $id; ?>&id_fix=<?= $idcar; ?>"
                    class="btn btn-primary btn-sm shadow lift">+เพิ่มข้อมูล</a></div>
            <div class="card-body">
                <form action="edit_insr.php?id_car=<?= $idcar; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row gx-4 md-4">
                        <div class="card-body">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal infocar -->
<div class="modal fade" id="infocar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สาเหตุ/อาการ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_infocars.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                    <div class="row gx-4 md-4">
                        <div class="col-">
                            <label for="">สาเหตุ:</label>
                            <input type="text" name="infocar" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadow lift"
                    type="submit">บันทึก</button></form>
            </div>
        </div>
    </div>
</div>
<!-- Modal insu -->
<div class="modal fade" id="insu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <form action="add_insuinfo.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                        <div class="row gx-4 md-4">
                            <div class="col-8">
                                <label for="detail">รายการสาเหตุ:</label><br>
                                <input type="text" class="form-control" id="detail" name="detail">

                            </div>
                        </div>
                        <div class="row gx-4 md-4">
                            <div class="col-md-2">
                            </div>
                        </div>
                    </form>
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary" type="submit">เพิ่ม</button>
            </div>
        </div>
    </div>
</div>
<!-- insertpic Modal -->
<div class="modal fade" id="insertpic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">เลือกรูปภาพ:</label>
                    <input type="file" name="pic" id="pic" class="form-control">
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save
                    changes</button></div>
        </div>
    </div>
</div>
<!-- Modal fixcar -->
<div class="modal fade" id="fixcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ดำเนินการซ่อม</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="mana_fixed.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post">
                    <label for="">เลือกแผนกช่าง:</label>
                    <select name="" id="">
                        <?php
                        $sql_emp = "SELECT * FROM technician";
                        $qty_emp = mysqli_query($mysqli, $sql_emp);
                        while ($row_emp = mysqli_fetch_array($qty_emp)){
                    ?>
                        <option value="<?=$row_emp['type_iddmt'];?>"><?=$row_emp['type_iddmt'];?></option>
                    </select>
                    <?php
                            if($row_emp['type_iddmt'] == 1){
                                $sql_em1 = "SELECT * FROM technician WHERE type_iddmt = '1'";
                                $qty_em1 = mysqli_query($mysqli, $sql_em1);
                                while($row_em1 = mysqli_fetch_array($qty_em1)){ 
                    ?>
                    <option value="<?=$row_em1['tc_name'];?>"><?=$row_em1['tc_name'];?></option>
                    <?php
                                }
                            }if($row_emp['type_iddmt'] == 2){
                                $sql_em2 = "SELECT * FROM technician WHERE type_iddmt = '2'";
                                $qty_em2 = mysqli_query($mysqli, $sql_em2);
                                while($row_em2 = mysqli_fetch_array($qty_em2)){ 
                    ?>
                    <option value="<?=$row_em2['tc_name'];?>"><?=$row_em2['tc_name'];?></option>
                    <?php
                                }
                            }if($row_emp['type_iddmt'] == 3){
                                $sql_em3 = "SELECT * FROM technician WHERE type_iddmt = '2'";
                                $qty_em3 = mysqli_query($mysqli, $sql_em3);
                                while($row_em3 = mysqli_fetch_array($qty_em3)){ 
                    ?>
                    <option value="<?=$row_em3['tc_name'];?>"><?=$row_em3['tc_name'];?></option>
                    <?php
                                }
                            }if($row_emp['type_iddmt'] == 4){
                                $sql_em4 = "SELECT * FROM technician WHERE type_iddmt = '4'";
                                $qty_em4 = mysqli_query($mysqli, $sql_em4);
                                while($row_em4 = mysqli_fetch_array($qty_em4)){ 
                    ?>
                    <option value="<?=$row_em4['tc_name'];?>"><?=$row_em4['tc_name'];?></option>
                    <?php
                                }
                            }if($row_emp['type_iddmt'] == 5){
                                $sql_em5 = "SELECT * FROM technician WHERE type_iddmt = '5'";
                                $qty_em5 = mysqli_query($mysqli, $sql_em5);
                                while($row_em5 = mysqli_fetch_array($qty_em5)){ 
                    ?>
                    <option value="<?=$row_em5['tc_name'];?>"><?=$row_em5['tc_name'];?></option>
                    <?php } } }?>

            </div>
            <div class="modal-footer"><button class="btn btn-secondary shadow lift" type="button"
                    data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadow lift"
                    type="button">บันทึก</button></form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Deposit -->
<div class="modal fade" id="Deposit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="deposit.php?id_fix=<?= $id; ?>&id_car=<?= $idcar; ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">ราคาค่ามัดจำ</label>
                            <input type="number" name="price" class="form-control" placeholder="0.00" required />
                        </div>
                    </div>
                    <div>
                        <label for="">รูปภาพหลักฐาน</label>
                        <input type="file" name="pic" id="pic" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                    data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadwo lift"
                    type="submit">บันทึก</button></form>
            </div>
        </div>
    </div>
</div>