<?php
include('../backend/connect.php');
include('header.php');

$id = $_SESSION['id'];
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
                <a href="setting.php" type="button" class="btn btn-red btn-icon shadow lift"><i
                        class="fas fa-arrow-circle-left"></i>&nbsp;</a>
                <a class="nav-link active" href="setting-account.php">ชื่อผู้ใช้งาน</a>
                <a class="nav-link" href="setting-financial.php">ธุรกรรมทางการเงิน</a>
            </nav>
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-lg-4">
                    <!-- Change password card-->
                    <div class="card mb-4">
                        <div class="card-header">เปลี่ยนชื่อผู้ใช้งาน</div>
                        <?php if (isset($_SESSION['error-acc'])) :?>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert" align="center">
                            <h6>
                                <?php
                                            echo $_SESSION['error-acc'];
                                            unset($_SESSION['error-acc']);
                                            ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </h6>
                        </div>
                        <?php endif ?>
                        <?php if (isset($_SESSION['suc-acc'])) :?>
                        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert" align="center">
                            <h6>
                                <?php
                                            echo $_SESSION['suc-acc'];
                                            unset($_SESSION['suc-acc']);
                                            ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </h6>
                        </div>
                        <?php endif ?>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">ชื่อผู้ใช้งานเดิม</label>
                                <?php
                                        $sql = "SELECT * FROM user WHERE user_id = '$id'";
                                        $qty = mysqli_query($mysqli,$sql);
                                        while ($row = mysqli_fetch_array($qty)){
                                    ?>
                                <input class="form-control" value="<?=$row['user_name'];?>" disabled />
                                <?php } ?>
                            </div>
                            <form action="edit-acc.php?id=<?=$id;?>" method="post">
                                <!-- Form Group (current password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="currentPassword">ใส่ชื่อผู้ใช้งาน</label><label
                                        for="" class="text-xs text-red">หมายเหตุ:ภาษาอังกฤษเท่านั้น</label>
                                    <input class="form-control" id="currentPassword" type="text"
                                        placeholder="กรุณาใส่ชื่อผู้ใช้งาน" name="user" required />
                                </div>
                                <!-- Form Group (new password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="newPassword">ยืนยันชื่อผู้ใช้งาน</label>
                                    <input class="form-control" id="newPassword" type="text"
                                        placeholder="กรุณาใส่ชื่อผู้ใช้งาน" name="conuser" required />
                                </div>
                                <button class="btn btn-primary shadow lift" type="submit" name="btn">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Change password card-->
                    <div class="card mb-4">
                        <div class="card-header">เปลี่ยนรหัสผ่าน</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Group (current password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="currentPassword">รหัสผ่านเดิม</label>
                                    <input class="form-control" id="currentPassword" type="password"
                                        placeholder="กรุณาใส่รหัสผ่าน" />
                                </div>
                                <!-- Form Group (new password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="newPassword">รหัสผ่านใหม่</label>
                                    <input class="form-control" id="newPassword" type="password"
                                        placeholder="กรุณาใส่รหัสผ่าน" />
                                </div>
                                <!-- Form Group (confirm password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="confirmPassword">ยืนยันรหัสผ่านใหม่</label>
                                    <input class="form-control" id="confirmPassword" type="password"
                                        placeholder="กรุณาใส่รหัสผ่าน" />
                                </div>
                                <button class="btn btn-primary shadow lift" type="submit"
                                    name="btn-pass">บันทึก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer-admin mt-auto footer-light">
        <div class="container-xl px-4">
            <div class="row">
                <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
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