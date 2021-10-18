<?php
include('../backend/connect.php');
include('header.php');
$id = $_SESSION['id'];
?>
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                ตั้งค่าผู้ใช้งาน - ความปลอดภัย
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
            <a href="setting.php" type="button" class="btn btn-red btn-icon shadow lift" ><i class="fas fa-arrow-circle-left"></i>&nbsp;</a>
                <a class="nav-link" href="setting-account.php">ชื่อผู้ใช้งาน</a>
                <a class="nav-link active" href="setting-financial.php">ธุรกรรมทางการเงิน</a>
                <button class="btn btn-primary lift" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+เพิ่มธนาคาร</button>
                
            </nav>
            <hr class="mt-0 mb-4" />
            <?php
                $sql = "SELECT * FROM bank WHERE user_id = '$id'";
                $qty = mysqli_query($mysqli,$sql);
                while($row = mysqli_fetch_array($qty)){

            ?>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Email notifications preferences card-->
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            <label for="">รายละเอียดบัญชี</label><label for="" class="text-xs text-red">หมายเหตุ:สามารถแก้ไขข้อมูลในช่องได้เลย</label>
                            <div class="form-check form-switch">
                                <!-- <input type="checkbox" checked data-toggle="toggle" data-size="lg"> -->
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label text-red" for="flexSwitchCheckChecked">ปิด</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (default email)-->
                                <div class="mb-3">
                                    <div class="col-md-10">
                                        <label class="small mb-1" for="inputNotificationEmail">ชื่อธนาคาร</label>
                                        <input class="form-control" id="inputNotificationEmail" type="email" value="<?=$row['bank_npay']?>"  />
                                    </div>
                                </div>
                                <!-- Form Group (email updates checkboxes)-->
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="small mb-1" for="inputNotificationEmail">ชื่อบัญชี</label>
                                        <input class="form-control" id="inputNotificationEmail" type="email" value="<?=$row['bank_nowner']?>"  />
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small mb-1" for="inputNotificationEmail">เลขบัญชี</label>
                                        <input class="form-control" id="inputNotificationEmail" type="email" value="<?=$row['bank_numower']?>"  />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>
            </div>
            <?php
                }
            ?>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="add_bank.php?user_id=<?=$id;?>" method="post">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">ชื่อธนาคาร</label>
                        <select name="bank" id="bank" class="form-control">
                            <option value="">เลือกธนาคาร</option>
                            <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                            <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                            <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                            <option value="ธนาคารทหารไทยธนชาต">ธนาคารทหารไทยธนชาต</option>
                            <option value="	ธนาคารไทยพาณิชย์">	ธนาคารไทยพาณิชย์</option>
                            <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                            <option value="ธนาคารเกียรตินาคินภัทร">ธนาคารเกียรตินาคินภัทร</option>
                            <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
                            <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
                            <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                            <option value="ธนาคารแลนด์ แอนด์ เฮ้าส์">ธนาคารแลนด์ แอนด์ เฮ้าส์</option>
                            <option value="	ธนาคารไอซีบีซี (ไทย)">	ธนาคารไอซีบีซี (ไทย)</option>
                            <option value="ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
                            <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                            <option value="ธนาคารอาคารสงเคราะห์">ธนาคารอาคารสงเคราะห์</option>
                            <option value="ธนาคารอิสลามแห่งประเทศไทย">ธนาคารอิสลามแห่งประเทศไทย</option>
                            <option value="ธนาคารซิตี้แบงค์">ธนาคารซิตี้แบงค์</option>
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">ชื่อผู้ใช้บัญชี</label>
                        <input type="text" name="nameowner" id="" class="form-control" />
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">เลขบัญชีธนาคาร</label>
                        <input type="text" name="numowner" onkeyup="autoTab(this)" id="" class="form-control" placeholder="xxx-x-xxxxx-x" />
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">ปิด</button><button class="btn btn-primary shadow lift" type="submit">บันทึก</button></form></div>
        </div>
    </div>
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
        var pattern = new String("___-_-____-_"); // กำหนดรูปแบบในนี้
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

    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')

    function alert(message, type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
        alertTrigger.addEventListener('click', function() {
            alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาใส่อีกครั้ง!', 'error')
        })
    }
    
    </script>