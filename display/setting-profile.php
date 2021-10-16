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
                                ตั้งค่าผู้ใช้งาน - โปรไฟล์
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
                <a class="nav-link active ms-0" href="setting-profile.php">โปรไฟล์</a>
                <a class="nav-link" href="security.php">ความปลอดภัย</a>
                <a class="nav-link" href="account-notifications.html"></a>
            </nav>
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">รูปภาพโปรไฟล์</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <?php
                                $sql = "SELECT * FROM user WHERE user_id = '$id'";
                                $qty = mysqli_query($mysqli,$sql);
                                while ($row = mysqli_fetch_array($qty)){
                            ?>
                            <img class="img-account-profile rounded-circle mb-2" src="assets/img/illustrations/profiles/<?=$row['user_pic'];?>" alt="" />
                            <?php
                                }
                            ?>
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG หรือ PNG มีขนาดไม่เกิน 5 MB</div>
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary shadow lift" type="button">อัพโหลดรูปภาพ</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">รายละเอียดผู้ใช้งาน</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col">
                                        <label class="small mb-1" for="inputFirstName">ชื่ออู่หรือศูนย์บริการ</label>
                                        <input class="form-control" id="inputFirstName" type="text" value="<?php echo $_SESSION['fname']; ?>" />
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col">
                                        <label class="small mb-1" for="inputOrgName">ที่อยู่อู่หรือศูนย์บริการ</label>
                                        <input class="form-control" id="inputOrgName" type="text"  value="<?php echo $_SESSION['address']; ?>" />
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">อีเมล์</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $_SESSION['email']; ?>" />
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">เบอร์ติดต่อ</label>
                                        <input class="form-control" id="inputPhone" type="text" value="<?php echo $_SESSION['tel']; ?>" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Facebook Fanpages</label>
                                        <input class="form-control" id="inputPhone" type="facebook"   />
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary shadow lift" type="submit">บันทึก</button>
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